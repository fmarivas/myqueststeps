<?php
session_start();
include('config.php');
$darte=date('Y-m-d');
$newdate=date('Y-m-d' ,strtotime("+2 days"));
$Q="INSERT INTO `paymnets`(`q_id`, `user_id`, `paymentId`, `PayerID`, `date`, `ex1`, `ex2`, `ex3`)
VALUES ('".$_GET['id']."','".$_SESSION['user']['id']."','".$_GET['paymentId']."','".$_GET['PayerID']."','$darte','".$_GET['plan']."','".$_GET['price']."','$newdate')";
if(mysqli_query($conn,$Q)){
    echo $_GET['id'];
    $QQ="UPDATE `Questions` SET `status`='1' WHERE `id`='".$_GET['id']."'";
    if(mysqli_query($conn,$QQ)){
        header("location: generate-response.php?payment=successfull");
    }
    
}else{
        header("location: generate-response.php?payment=error");

}
?>