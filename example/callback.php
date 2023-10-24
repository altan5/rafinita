<?php
use Altan\Rafinita\Payments;

require_once("../vendor/autoload.php");
require_once("ResponseHandler.php");

define("API_URL","");
define("CLIENT_SECRET","");

$payments = new Payments(new ResponseHandler(), API_URL, CLIENT_SECRET);
$payments->readResponse();
