<?php

/*
 * Retrieve webhooks.
 */

require __DIR__  . '/vendor/autoload.php';

// Note: Please remove "SANDBOX" if you're in production environment.
PayMaya\PayMayaSDK::getInstance()->initCheckout('','', 'SANDBOX');

$webhooks = PayMaya\API\Webhook::retrieve();
print_r($webhooks);
echo "\n---\n";