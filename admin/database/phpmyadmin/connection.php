<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "vadhuvuvarudu";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
date_default_timezone_set('Asia/Kolkata');
if (isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION["admin_email"];
} else {
    $admin_email = "No User";
}
?>