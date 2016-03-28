<?php 

session_start();
require('connect.php'); 


if (isset($_GET['forum_id'])) {
	
	

$sql= "DELETE FROM forum  WHERE forum_id=".$_GET['forum_id'];
$result = mysqli_query($conn, $sql ); 
}
header('location: http://localhost/test/wall.php');
 ?>