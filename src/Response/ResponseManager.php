<?php

namespace Altan\Rafinita\Response;

/**
 * ResponseManager
 */
class ResponseManager
{
    /**
     * createResponse
     *
     * @param  mixed $action
     * @return Response
     */
    public static function createResponse(string $action): Response
    {
        switch ($action) {
            case "SALE":
                return new SaleResponse();
        }
        throw new \Exception("Unknown response action '" . $action . "'");
    }
}
