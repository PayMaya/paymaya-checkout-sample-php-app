<?php

/**
 * This is the actual webhook that handles the processing of the customer's order
 *
 * The basic idea here is to check if the payment status is successful or not.
 * For development purposes, we recommend to install NGROK (https://ngrok.com/)
 * This will create a secure tunnel to your local development machine.
 *
 * Example:
 *
 * Assume that this file is accessible via:
 *
 * http://localhost/handler-webhook-success.php
 *
 * Install NGROK and expose it:
 *
 * ngrok http 80
 *
 * You should be able to get something like this:
 *
 * Session Status                online
 * Account                       Diwa del Mundo (Plan: Free)
 * Version                       2.2.8
 * Region                        United States (us)
 * Web Interface                 http://127.0.0.1:4040
 * Forwarding                    http://709b6b65.ngrok.io -> localhost:80
 * Forwarding                    https://709b6b65.ngrok.io -> localhost:80
 *
 * Copy the secure tunnel and register it as your webhook. See register-webhook.php
 *
 */

$raw_checkout_input = file_get_contents("php://input");
$checkout_json = json_decode($raw_checkout_input);

echo $checkout_json->id; // Access the Checkout ID
echo $checkout_json->status; // Access the Checkout status, e.g. COMPLETED
echo $checkout_json->paymentStatus; // Access the payment status, e.g. PAYMENT_STATUS

if($checkout_json->paymentStatus == "PAYMENT_SUCCESS") {
    // activate the account
}

error_log("---");

error_log($checkout_json->id);
error_log($checkout_json->status);
error_log($checkout_json->paymentStatus);

error_log("---");

