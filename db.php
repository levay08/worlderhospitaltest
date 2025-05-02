<?php
$host = "localhost";
$user = "root";
$pass = "Rootpass123!";
$db = "worlder_hospital";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed.");
}
?>
