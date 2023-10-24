<?php

namespace Altan\Rafinita;

/**
 * ResponseReader
 */
class ResponseReader
{
    /**
     * read
     *
     * @return array
     */
    public static function read(): array
    {
        $input = file_get_contents('php://input');
        return json_decode($input, true);
    }
}
