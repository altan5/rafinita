<?php

namespace Altan\Rafinita;

/**
 * HashGenerator
 */
class HashGenerator
{
    /**
     * generate
     *
     * @param  mixed $email
     * @param  mixed $clientSecret
     * @param  mixed $cardNumber
     * @param  mixed $transId
     * @return string
     */
    public static function generate($email, $clientSecret, $cardNumber, $transId = ""): string
    {
        return md5(strtoupper(strrev($email) . $clientSecret .
            strrev(substr($cardNumber, 0, 6) . substr($cardNumber, -4))));
    }
}
