<?php

namespace Altan\Rafinita\Request;

class RequestManager
{
    public static function createRequest(string $action): Request
    {
        switch ($action) {
            case "SALE":
                return new SaleRequest();
        }
        throw new \Exception("Unknown request action '" . $action . "'");
    }
}
