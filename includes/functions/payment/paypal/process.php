<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    $cmimi = $_GET['cmimi'];
    $lloji = $_GET['lloji'];
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require __DIR__  . '/vendor/autoload.php';
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AQRMGXlwVeW4obJFNVxkeRcaPzGSm4GEKl7jV-sEo6jg-jmNFq4kEN_K60Inn7lRIFxRQNPqexFgn0mL',     // ClientID
        'EI6LUEFGOpGuqoEFJ8ceG6pBw6VKw6WV_faYPH37q6fnkw4Z3R01zlpLz3DpG4ApxPjcVD5oD1YdH7AI'      // ClientSecret
    )
);
// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');
$amount = new \PayPal\Api\Amount();
$amount->setTotal($cmimi);
$amount->setCurrency('USD');
$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);
$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("$weburl/pay/check.php?status=sucsess&cmimi=$cmimi&lloji=$lloji")
    ->setCancelUrl("$weburl/shop/?cancelpayment");
$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);
// 4. Make a Create Call and print the values
    $payment->create($apiContext);
        
    //Insert to database
        $userid = $_SESSION['id'];
        $paymentId = $payment->id;
        $time = time();
        $paymenthlink = $payment->getApprovalLink();
    $sql = "INSERT INTO payment (userid, paymentId, status, time, type)
    VALUES ('$userid', '$paymentId', 'draft', '$time','$lloji')";
    if ($link->query($sql) === TRUE) {
        header("Location: $paymenthlink");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
    
    
  
    
    
