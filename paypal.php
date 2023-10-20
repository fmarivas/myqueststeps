<?php
// print_r($_GET);
// die();
require __DIR__ . '/paypal/vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

// Set up PayPal API context
$clientId = 'Abhdkdx4RuUyLqpu0-zqi4zVljlopmX2ejFTdvOXQ0dwc-7giI_fvX9wnnPcpMfqUZqXrU4xJbF9u0_w';
$clientSecret = 'EG8-PejHv2njLEj1moOVgSIndmlaG8FPokxdz7XjQxYLIIrgknfTUrBu-ci_gW47A_OXguoGYaLVfqNH';
$apiContext = new ApiContext(
    new OAuthTokenCredential($clientId, $clientSecret)
);

// Set up the payment
$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item1 = new Item();
$item1->setName($_GET['plan'])
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice($_GET['price']);

$itemList = new ItemList();
$itemList->setItems([$item1]);

$details = new Details();
$details->setSubtotal($_GET['price']);

$amount = new Amount();
$amount->setCurrency('USD')
    ->setTotal($_GET['price'])
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('Payment description')
    ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('https://techixpert.com/clients/FelixViage/submit_payment.php?id='.$_GET['id'].'&plan='.$_GET['plan'].'&price='.$_GET['price'])
    ->setCancelUrl('https://techixpert.com/clients/FelixViage/generate-response.php');

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions([$transaction])
    ->setRedirectUrls($redirectUrls);

// Create the payment
try {
    $payment->create($apiContext);
    $approvalUrl = $payment->getApprovalLink();

    header("Location: $approvalUrl"."&id=".$_GET['id']);
} catch (\PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
} catch (Exception $ex) {
    die($ex);
}

?>
