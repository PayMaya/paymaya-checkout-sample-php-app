<?php

/*
 * Sample checkout.php code for PayMaya Checkout
 *
 * Note: This script basically creates a Checkout object that provides the
 * payment page. The script needs to be run every time the customer
 * checks out.
 *
 *
 *
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__  . '/vendor/autoload.php';

use PayMaya\API\Checkout;
use PayMaya\Model\Checkout\Buyer;
use PayMaya\Model\Checkout\Item;
use PayMaya\Model\Checkout\ItemAmount;
use PayMaya\Model\Checkout\ItemAmountDetails;
use PayMaya\Model\Checkout\Address;
use PayMaya\Model\Checkout\Contact;

// Note: Please remove "SANDBOX" if you're in production environment.
PayMaya\PayMayaSDK::getInstance()->initCheckout('', '', 'SANDBOX');

if (isset($_POST)) {

    if ($_POST['payment_method'] == 'paymaya' || $_ENV['DEBUG'] == 'yes') {

        $itemCheckout = new PayMaya\API\Checkout();

        $address = new Address();
        $address->line1 = "6th Floor, LaunchPad Building";
        $address->line2 = "Reliance Street";
        $address->city = "Mandaluyong City";
        $address->state = "Metro Manila";
        $address->zipCode = "12345";
        $address->countryCode = "PH";

        $contact = new Contact();
        $contact->phone = "+63(2)1234567890";
        $contact->email = "paymayabuyer1@gmail.com";

        $buyer = new Buyer();
        $buyer->firstName = "Juan";
        $buyer->middleName = "Reyes";
        $buyer->lastName = "Santos";
        $buyer->contact = $contact;
        $buyer->shippingAddress = $address;
        $buyer->billingAddress = $address;

        $itemCheckout->buyer = $buyer;

        $itemAmountDetails = new PayMaya\Model\Checkout\ItemAmountDetails();
        $itemAmountDetails->shippingFee = "0.00";
        $itemAmountDetails->tax = "0.00";
        $itemAmountDetails->subtotal = "2590.00";
        $itemAmountDetails->serviceCharge = "90.00";
        $itemAmount = new PayMaya\Model\Checkout\ItemAmount();
        $itemAmount->currency = "PHP";
        $itemAmount->value = "2590.00";
        $itemAmount->details = $itemAmountDetails;

        $item = new PayMaya\Model\Checkout\Item();
        $item->value = "2500.00";
        $item->name = "Some Item";
        $item->code = $data['firstname'];
        $item->description = "Some Item";
        $item->quantity = "1";
        $item->amount = $itemAmount;
        $item->totalAmount = $itemAmount;

        $itemCheckout->items = array($item);
        $itemCheckout->totalAmount = $itemAmount;

        // The requestReferenceNumber is an identifier for the customer's order.
        $itemCheckout->requestReferenceNumber = "123456789";

        // Redirect URLs are used to direct the customer to the correct
        // page based on the transaction outcome.
        // Redirect URLs should not be used to set the status of an order
        // to "paid" as the customer might quit the browser prior the redirection.
        $itemCheckout->redirectUrl = array(
            "success" => "http://www.yourwebsite.com/success.php?id=123456789",
            "failure" => "http://www.yourwebsite.com/failure.php",
            "cancel" => "http://www.yourwebsite.com/cancel.php"
        );

        $itemCheckout->execute();
        $itemCheckout->retrieve();

        // Uncomment to redirect the user to the Checkout page.
        // header("Location:" . $itemCheckout->url);

        echo "Checkout ID:  $itemCheckout->id \n"; // Checkout ID
        echo "Checkout URL: $itemCheckout->url \n"; // Checkout URL

        exit;

    }

    else {

        echo "Error in creating a Checkout object.";
        header("Location:http://www.yourwebsite.com/page.php");

    }
}