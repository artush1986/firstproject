<?php 

session_start();
require('connect.php'); 


if (isset($_GET['user_id'])) {
	
$sql= "UPDATE users SET img = 0 WHERE user_id=".$_SESSION['user_id'];
$result = mysqli_query($conn, $sql ); 
}
header('location: http://localhost/test/homepage.php');
 ?>