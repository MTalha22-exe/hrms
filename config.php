<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "hrms_db"; // change this to your actual DB name

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
