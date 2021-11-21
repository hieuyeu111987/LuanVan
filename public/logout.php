<?php
// Include configuration file

require_once __DIR__.'/../gconfig.php';

if(isset($_SESSION['user_id'])){
    unset($_SESSION["user_id"]);
}else if(isset($_SESSION['access_token'])){
    // Reset OAuth access token
    $google_client->revokeToken($_SESSION['access_token']);
}

// Destroy entire session data
session_destroy();

// Redirect to homepage
header("Location:home.php");
?>