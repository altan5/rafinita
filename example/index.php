<?php
use Altan\Rafinita\Payments;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once("../vendor/autoload.php");
require_once("ResponseHandler.php");

define("API_URL", "https://dev-api.rafinita.com/post");
define("CLIENT_SECRET", "d0ec0beca8a3c30652746925d5380cf3");

$payments = new Payments(new ResponseHandler(), API_URL, CLIENT_SECRET);

$payments->prepareRequest("SALE");
$payments->setData([
    "action"=> "SALE",
    "client_key"=> "5b6492f0-f8f5-11ea-976a-0242c0a85007",
    "order_id"=> "123",
    "order_amount"=> "321.20",
    "order_currency"=> "USD",
    "order_description"=> "Some goods",
    "card_number"=> "4111111111111111",
    "card_exp_month"=> "01",
    "card_exp_year"=> "2025",
    "card_cvv2"=> "000",
    "payer_first_name"=> "John",
    "payer_last_name"=> "Doe",
    "payer_address"=> "Big street",
    "payer_country"=> "UA",
    "payer_city"=> "Kyiv",
    "payer_zip"=> "01001",
    "payer_email"=> "example@gmail.com",
    "payer_phone"=> "+380661234567",
    "payer_ip"=> $_SERVER["REMOTE_ADDR"],
    "term_url_3ds"=> "https://myserver.com/callback.php"
]);
try {
    $payments->submit();
} catch (\Exception $e) {
    echo "Error while sending request: ". $e->getMessage();
}
