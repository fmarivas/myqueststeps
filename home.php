<?php
require_once 'config.php';
require_once 'vendor/autoload.php'; // Include the Google API Client Library
$code = $_GET['code'];

// Exchange the authorization code for an access token
$token = $google_client->fetchAccessTokenWithAuthCode($code);

// Get user information
$google_oauth = new Google_Service_Oauth2($google_client);
$google_user_info = $google_oauth->userinfo->get();
// print_r($google_user_info);

 $fname=$google_user_info['givenName'];
 $lname=$google_user_info['familyName'];
 $email=$google_user_info['email'];
 $picture=$google_user_info['picture'];

$Q="SELECT * FROM `users` WHERE `email`='$email'";
$re=mysqli_query($conn,$Q);
$date=date('Y-m-d');
if(mysqli_num_rows($re)>0){
    $rows=mysqli_fetch_assoc($re);
    if($rows['source']=='google'){
         session_start();
        $_SESSION['user']=$rows;
        echo "<script> window.location='dashboard.php'</script>";
    }else{
        echo "<script> window.location='login.php?error=available'</script>";
    }
   
}else{
    $QQ="INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `status`, `date`,`source`,`ex1`) VALUES ('$fname','$lname','$email','','1','$date','google','$picture')";
    if(mysqli_query($conn,$QQ)){
        $QQQ="SELECT * FROM `users` WHERE `email`='$email'";
        $res=mysqli_query($conn,$QQQ);
        $row=mysqli_fetch_assoc($res);
        session_start();
        $_SESSION['user']=$row;
                echo "<script> window.location='dashboard.php'</script>";

    }
}
?>