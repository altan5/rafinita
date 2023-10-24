<?php
use Altan\Rafinita\ResponseHandlerInterface;

require_once("../vendor/autoload.php");

class ResponseHandler implements ResponseHandlerInterface
{
    public function handleResponse(string $action, array $data) {
        switch ($action) {
            case "SALE":
                //  TODO
                //  Do some stuff with $data
                if(isset($data["result"]) && ($data["result"] == "REDIRECT")) {
                    header(
                        "Location: ".
                        $data["redirect_url"].
                        "?".http_build_query(json_decode($data["redirect_params"], true)));
                        die;
                }
                print_r($data);
                break;
        }
    }
}