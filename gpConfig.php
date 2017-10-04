<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '45738992287-oepuo6972ukl64iru9vo9uud8hf5c4cr.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'yg5Q5UxsJm46MSHLyOOPvnyK'; //Google client secret
$redirectURL = 'https://rideoutsys.000webhostapp.com/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('RideOut Web application');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>