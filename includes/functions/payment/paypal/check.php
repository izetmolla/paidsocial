<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    $cmimi = $_GET['cmimi'];
    $lloji = $_GET['lloji'];
    $time = time();
    $paymentId = $_GET['paymentId'];
    $token = $_GET['token'];
    $PayerID = $_GET['PayerID'];
    $userid = $_SESSION['id'];
    
    
    if($_GET['lloji'] == 'coins-shop'){
        $sql = "UPDATE payment SET token='$token', PayerID='$PayerID', confirmed_time='$time', amount='$cmimi', status='confirmed',type='$lloji' WHERE paymentId='$paymentId'";
        if ($link->query($sql) === TRUE) {
            $cointotal = $usersession['coins'] + ($cmimi * $coinprice);
            $sql = "UPDATE users SET coins='$cointotal' WHERE id='$userid'";
            if ($link->query($sql) === TRUE) {
                header("Location: $weburl/shop/?sucsesspaymenth");
            }
        }
    }elseif($_GET['lloji'] == 'model-subscribtion'){
        
    }