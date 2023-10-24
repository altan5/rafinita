<?php

namespace Altan\Rafinita\Response;

use Altan\Rafinita\HashGenerator;

/**
 * Response
 */
abstract class Response
{
    protected array $data = array();
    /**
     * validate
     *
     * @return bool
     */
    abstract public function validate(): bool;
    /**
     * validateHash
     *
     * @param  mixed $clientSecret
     * @return bool
     */
    public function validateHash($clientSecret): bool
    {
            return $this->data["hash"] == HashGenerator::generate(
                $this->data["payer_email"],
                $clientSecret,
                $this->data["card_number"],
                $this->data["trans_id"] ?? ""
            );
    }

    /**
     * setData
     *
     * @param  mixed $data
     * @return void
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }
    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
