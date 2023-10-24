<?php

namespace Altan\Rafinita;

/**
 * RequestSender
 */
class RequestSender
{
    /**
     * send
     *
     * @param  mixed $apiUrl
     * @param  mixed $data
     * @return array
     */
    public static function send(string $apiUrl, array $data): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}
