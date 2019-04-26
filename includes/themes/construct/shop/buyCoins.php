<?php
session_start();
    ;

    if(isset($_GET['paymentOption'])){
        switch ($_GET['paymentOption']) {
            case "paypal":
                echo 'Working';
                break;
            case "creditCard":
                header("Location: https://pay.albcode.com/pay.php?id=".$_GET['price']."&username=".$_SESSION['username']."");
                break;
            case "coinbase":
                echo "coinbase working";
                break;
        }
    }

    