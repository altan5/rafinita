<?php

namespace Altan\Rafinita;

interface ResponseHandlerInterface
{
    /**
     * handleResponse
     *
     * @param  mixed $action
     * @param  mixed $data
     * @return void
     */
    public function handleResponse(string $action, array $data);
}
