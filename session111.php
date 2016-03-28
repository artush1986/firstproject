<?php

session_start();
$_SESSION['username'] = $result;
$result= mysqli_query($conn; $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
// Set session variables

echo "Session variables .'$result' are set.";
?>



</body>
</html>


<?php
if ($_POST['fa fa-sign-out']) {
	unset($_SESSION['user_id'])
	header('locaition:http://localhost/test/index.php')
}

?>