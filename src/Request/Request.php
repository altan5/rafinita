<?php

namespace Altan\Rafinita\Request;

use Altan\Rafinita\HashGenerator;

/**
 * Request
 */
abstract class Request
{
    protected array $data = array();
    /**
     * validate
     *
     * @return bool
     */
    abstract public function validate(): bool;

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
    /**
     * createHash
     *
     * @param  mixed $clientSecret
     * @return void
     */
    public function createHash($clientSecret): void
    {
        $this->data["hash"] = HashGenerator::generate(
            $this->data["payer_email"],
            $clientSecret,
            $this->data["card_number"]
        );
    }
}
