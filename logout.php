<?php 

session_start();
require('connect.php'); 

 
$sql= "UPDATE users SET in_site = 0 WHERE user_id=".$_SESSION['user_id'];
$result = mysqli_query($conn, $sql ); 
 



$_SESSION['user_id'] = null;

header('location: http://localhost/test/index.php');

?>