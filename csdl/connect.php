<?php
$servername = "us-cdbr-east-02.cleardb.com:3306";
$username = "b2da7773acb154";
$password = "381e93f2";
$dbname = "ad_10b697afe7019ad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>