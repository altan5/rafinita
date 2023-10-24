<?php

namespace Altan\Rafinita;

interface ResponseHandler
{
    public function handleResponse(string $action, array $data);
}
