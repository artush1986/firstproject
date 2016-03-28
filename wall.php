<?php

session_start();

if(!$_SESSION['user_id']) {
   header('location: http://localhost/test/index.php');

}


require('connect.php');

//exit;
require('header.php');


if (isset($_POST['massage']) && !empty($_POST['massage'])) {
  $user_id=$_SESSION['user_id'];
  $sql = "INSERT INTO forum ( user_id, content) VALUES ("."'".$user_id."'" ."," ."'".$_POST['massage']."'".")";
  mysqli_query($conn, $sql );
  header('location: http://localhost/test/wall.php');
}



$sql = " SELECT * FROM forum, users WHERE forum.user_id = users.user_id "; 
$result = mysqli_query($conn, $sql ); 
    
  




    $content = '<p>';
    while ($row = mysqli_fetch_assoc($result)) {
      // var_dump($row['first_name']);exit;
    $user = $row;
    $content .='<br>'.$row['first_name'].': '.$row['content'].'--' .$row['date']  ;
    if($row['user_id'] == $_SESSION['user_id']){
       $content .= '---<a href="delete_cont.php?forum_id='.$row['forum_id'].'">Delete</a>';
    }
  } 


?>




<div class="container">
    
    <?php 

      require('menu.php') 

    ?>     
                
    
    <div>
    
   <div class="wall">
   <?php 

   echo $content.'</p>';

   ?>

    </div>
    <form action="" method="post">
        <textarea name="massage" cols="50" rows="5"></textarea><br>
        <button>SEND</button>
    </form>


 
   
    

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