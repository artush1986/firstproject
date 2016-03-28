<?php

session_start();

if(!$_SESSION['user_id']) {
   header('location: http://localhost/test/index.php');

}


require('connect.php');

//exit;
require('header.php');


$sql="SELECT * FROM users ";


$result = mysqli_query($conn, $sql );

if (isset($_POST['recipient']) && !empty($_POST['massage'])) {
 
  $sql="INSERT INTO messages (recipient, otpravitel, sms)VALUES("."'".$_POST['recipient']."'"."," ."'".$_SESSION['user_id']."'".","."'".$_POST['massage']."'".")";
  mysqli_query($conn, $sql);
  

}

$sql= "SELECT * FROM messages INNER JOIN users ON messages.otpravitel = users.user_id";
$result1 = mysqli_query($conn, $sql);

$results = array();
$str = '';
while ( $row = mysqli_fetch_assoc($result1)) {

  
  if ($row['otpravitel']!=$_SESSION['user_id']) {
     $results[] =  $row;
    $str = $str.$row['first_name'].": " .$row['sms'].'<br>';
   //echo $row['first_name'].": " .$row['sms'].'<br>'; 

  }
  
}


//var_dump($sql="INSERT INTO messages (poluchitel, otpravitel, sms)VALUES("."'".$my_user['first_name']."'"."," ."'".$_SESSION['user_id']."'".","."'".$_POST['massage']."'".")"); exit;



/*$sql_mes = "SELECT * FROM messages WHERE recipient =".$_SESSION['user_id']; 
    $result1 = mysqli_query($conn, $sql_mes );


while ($row = mysqli_fetch_assoc($result1)) {
   
    
    echo $row['otpravitel'];
    echo $row['sms'];

    }
    $sql_user = "SELECT * FROM users WHERE otpravitel =user_id";
    $result2 = mysqli_query($conn, $sql_user );*/

?>

<div class="container">
    
    <?php 

      require('menu.php') 

    ?>     
                
    
    <div>
    
   <div class="wall">
   <?php 
   echo $str;
   foreach ($results as $result) {
      echo $result['first_name'].": " .$result['sms'].'<br>';     
   }

   ?>

    </div>
<div class="col-xs-4 col-md-4">
    <form action="" method="post">
        <textarea name="massage" cols="50" rows="5"></textarea><br>

      <select name="recipient" class = "form-control input-lg">


          <?php
           
              $sql= "SELECT * FROM users";
              $result = mysqli_query($conn, $sql);
              while ($user = mysqli_fetch_assoc($result)) {
                if ($_SESSION['user_id']!=$user['user_id']) {
                  echo '<option value="'.$user['user_id'].'">'.$user['first_name'].' '.$user['last_name'].'</option>';  
                }   
              }

          ?>

          
      </select>                
        <button>SEND</button> 

    </form>

        
                        </div>
 
   
    

    </div>
    
    </div>




<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><br/><br/>
            <form class="form-horizontal">
            <fieldset>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="body">Body :</label>  
              <div class="col-md-8">
              <input id="body" name="body" type="text" placeholder="Message Body" class="form-control input-md">
                
              </div>
            </div>
            
            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="message">Message :</label>
              <div class="col-md-8">                     
                <textarea class="form-control" id="message" name="message"></textarea>
              </div>
            </div>
            
            <!-- Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="send"></label>
              <div class="col-md-8">
                <button id="send" name="send" class="btn btn-primary">Send</button>
              </div>
            </div>
            
            </fieldset>
            </form>

    </div>
  </div>
</div>



<script type="text/javascript">
    $(function () {
        $('#myTab a:last').tab('show')
    })



</script>
</body>
</html>