<?php

require('connect.php'); 

if (isset($_POST['login'])) {  
      $login = $_POST['email'];
      $pass  = $_POST['password'];

      $sql = " SELECT * FROM users WHERE email='$login' AND password='$pass' ";
      
     //var_dump($sql); exit;

      $result = mysqli_query($conn, $sql ); 

      
      if(mysqli_num_rows ( $result ) > 0) {
        
        session_start();

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user_id']  = $row["user_id"];      
        } 

        $sql= "UPDATE users SET in_site = 1 WHERE user_id=".$_SESSION['user_id'];
        $result = mysqli_query($conn, $sql ); 

        header('location: http://localhost/test/homepage.php');//exit;
      } else {
        echo 'Not correct'; //exit;
      }

}//exit;

?>







<!DOCTYPE html>
<html>
<head>
	<title>log in</title>
		<link href="bootstrap.min.css" rel="stylesheet">
		<link href="index_css.css" rel="stylesheet">
</head>
	<body>

		<div class="container">
        	<div class="card card-container">
            	<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            		<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            		<p id="profile-name" class="profile-name-card"></p>
            	<form action="" class="form-signin" method="post">
                	<span id="reauth-email" class="reauth-email"></span>
                	<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" >
                	<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" >
                		<div id="remember" class="checkbox">
                    		<label>
                        		<input type="checkbox" value="remember-me"> Remember me
                    		</label>
                		</div>
                	<button name="login" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            	</form><!-- /form -->
                	<a href="forgot.php" class="forgot-password">
                		Forgot the password?
                	</a>
                	<a href="registration.php" class="create-new-account">
            			Create new account
            		</a>
            </div><!-- /card-container -->
    	</div><!-- /container -->
	</body>
</html>