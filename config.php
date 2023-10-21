<?php
error_reporting(0);
require_once 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize the Google API client
$google_client = new Google_Client();
$google_client->setClientId('554841496630-ojifumsm5s68tbc9iqjrtvvjhlndivic.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('https://localhost/QuestSteps/Project/FelixViage/home.php');

$google_client->addScope('email');
$google_client->addScope('profile');

$google_service = new Google_Service_Oauth2($google_client);



$conn=mysqli_connect("db-instance-quest-site.cjq2a6j8eeor.us-east-1.rds.amazonaws.com","admin","Olvinha01","db-test-quest");

?>

