<?php 
session_start();
include('config.php');
// print_r($_POST);
extract($_POST);

$Q="INSERT INTO `Questions`(`user_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `status`, `ex1`)
VALUES ('".$_SESSION['user']['id']."','$q1','$q2','$q3','$q4','$q5','0','')";
if(mysqli_query($conn,$Q)){
    $Q="Select * from Questions where user_id='".$_SESSION['user']['id']."' order by id desc limit 1";
    $re=mysqli_query($conn,$Q);
    $row=mysqli_fetch_assoc($re);
    echo $row['id'];
}else{
    echo 0;
}


?>