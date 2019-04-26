<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
session_start();


if(isset($_GET['usercoins'])){
    $sql = "SELECT coins FROM users WHERE id='".$_SESSION['id']."'";
        $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {echo $row['coins'];}
}

