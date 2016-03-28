

<?php

$servername = "localhost";
$username = "root";
$password_mysqli = "";
$dbname = "social";


// Create connection
$conn = mysqli_connect($servername, $username, $password_mysqli, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}