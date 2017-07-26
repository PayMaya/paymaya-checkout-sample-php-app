<?php

/*
 * Delete an existing webhook.
 */

require __DIR__  . '/vendor/autoload.php';

// Note: Please remove "SANDBOX" if you're in production environment.
PayMaya\PayMayaSDK::getInstance()->initCheckout('', '', 'SANDBOX');

$webhooks = PayMaya\API\Webhook::retrieve();
print_r($webhooks);
echo "\n---\n";

if(isset($webhooks[0])) {
    $webhook = new PayMaya\API\Webhook();
    $webhook->id = $webhooks[0]->id;
    echo "Webhook deleted: ";
    print_r($webhook->delete());
}

echo "\n---\n";