<?php




//if(isset($_POST['firstname'])){

    //if (strlen($_POST['firstname'])>3) {        
    
//}
//}



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
	//echo "Well";
	//var_dump($_POST);

if (isset($_POST['create']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) ) {

    $dob = $_POST['day'] . '/'. $_POST['month'] . '/' . $_POST['year'];



    $login = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = '" . $login . "'";
    $result = mysqli_query($conn, $sql );
    //var_dump( $sql);exit;
    if(mysqli_num_rows($result)> 0){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    } else {
         $sql = "INSERT INTO users (first_name, last_name, email, password, dob) VALUES (" ."'".$_POST['firstname']."'" ."," ."'".$_POST['lastname']."'" ."," ."'" .$_POST['email']."'" ."," ."'".$_POST['password']."'" ."," ."'" .$dob ."'" .")";

        //var_dump($sql); exit;
        if (mysqli_query($conn, $sql)) {
            header('location: http://localhost/test/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
//exit;
?>




<!DOCTYPE html>
<html>
<head>
	<title>registr</title>
	<link href="registration.css" rel="stylesheet">
	<link href="bootstrap.min.css" rel="stylesheet">

</head>
    <body>

        <div class="container" id="wrap">
	        <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Sign Up in ???????</legend>
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />            
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  />                  
                                </div>
                    </div>
                    <input type="email" name="email" value="" class="form-control input-lg" placeholder="Your Email"  /><input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  />                    <label>Birth Date</label>                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <select name="month" class = "form-control input-lg">


                                <?php
                                    $i=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                        'Octomber', 'November', 'December');
                                
                                    foreach ($i as $key => $i) {                                                                                 
                                        $key +=1;
                                        echo '<option value="'.$key.'">'.$i.'</option>';
                                    }

                                ?>

                                
                            </select>                        
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select name="day" class = "form-control input-lg">

                                <?php
                                
                                    for ($i=1; $i <=31 ; $i++) { 
                                        
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                ?>

                            </select>                        
                        </div>

                        <div class="col-xs-4 col-md-4">
                            <select name="year" class = "form-control input-lg">
                            <?php
                                
                                    for ($i=1930; $i <=2015 ; $i++) { 
                                        
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                ?>

                            </select>                        
                        </div>
                    </div>
                        <button name="create" class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Create my account</button>
            </form>          
          </div>
</div>            
</div>
</div>

</body>
</html>
