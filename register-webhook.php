<?php

/**
 * How to register a webhook.
 *
 * Note: You only need to register a webhook URL once. The webhook
 * should set the status of a customer's order to "paid" if the
 * payment is successful.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__  . '/vendor/autoload.php';

// Note: Please remove "SANDBOX" if you're in production environment.
PayMaya\PayMayaSDK::getInstance()->initCheckout('', '', 'SANDBOX');

$successWebhook = new PayMaya\API\Webhook();
$successWebhook->name = PayMaya\API\Webhook::CHECKOUT_SUCCESS;

//$successWebhook->callbackUrl = "http://www.yourwebsite.com/site3/success2.php";
// Sample NGROK secure tunnel for development purposes.
$successWebhook->callbackUrl = "https://70d9b6b65.ngrok.io/handler-webhook-success.php";

print_r($successWebhook->register());
echo "\n---\n";
