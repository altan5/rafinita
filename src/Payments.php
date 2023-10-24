<?php

namespace Altan\Rafinita;

use Altan\Rafinita\Request\Request;
use Altan\Rafinita\Request\RequestManager;
use Altan\Rafinita\Response\Response;
use Altan\Rafinita\Response\ResponseManager;

/**
 * Payments
 */
class Payments
{
    private Request $request;
    private Response $response;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        private ResponseHandlerInterface $responseHandler,
        private string $apiUrl,
        private string $clientSecret
    ) {
    }
    /**
     * prepareRequest
     *
     * @param  mixed $action
     * @return void
     */
    public function prepareRequest(string $action): void
    {
        $this->request = RequestManager::createRequest($action);
    }
    /**
     * setData
     *
     * @param  array $data
     * @return void
     */
    public function setData(array $data): void
    {
        $this->request->setData($data);
    }
    /**
     * submit
     *
     * @return void
     */
    public function submit(): void
    {
        if (!$this->request->validate()) {
            throw new \Exception("Wrong request data format");
        }
        $this->request->createHash($this->clientSecret);
        $responseData = RequestSender::send($this->apiUrl, $this->request->getData());
        if (!is_array($responseData)) {
            throw new \Exception("Wrong response data format");
        } elseif (isset($responseData["result"]) && ($responseData["result"] == "ERROR")) {
            throw new \Exception("Error received: " . $responseData["error_message"]);
        } elseif (!isset($responseData["action"])) {
            throw new \Exception("Wrong response data format");
        }
        $this->responseHandler->handleResponse($responseData["action"], $responseData);
    }
    /**
     * readResponse
     *
     * @return void
     */
    public function readResponse(): void
    {
        $responseData = ResponseReader::read();
        $this->response = ResponseManager::createResponse($responseData["action"]);
        $this->response->setData($responseData);
        if (!$this->response->validateHash($this->clientSecret)) {
            throw new \Exception("Wrong response hash");
        }
        if (!$this->response->validate()) {
            throw new \Exception("Wrong response data format");
        }
        $this->responseHandler->handleResponse($responseData["action"], $this->response->getData());
    }
}
