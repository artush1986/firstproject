<?php

session_start();

if(!$_SESSION['user_id']) {
   header('location: http://localhost/test/index.php');
}

require('connect.php');

//exit;
require('header.php');
?>




<div class="container">
    
    <?php 

      require('menu.php') 

    ?>     
                
    
    <div>
    <?php     
   
    $sql = "SELECT * FROM users WHERE user_id !=".$_SESSION['user_id']; 
    $result = mysqli_query($conn, $sql ); 


   
    
    $str  = '<div>';

    $result = mysqli_query($conn, $sql );
    while ($row = mysqli_fetch_assoc($result)) {
    $user = $row;
    
    //if (isset($_SESSION['user_id'])) {
    // $sql= "UPDATE users SET in_site = 'true' ";
    //}
      

    $str .= '<a href="homepage.php?user_id='.$user['user_id'].'"><div class="friend_li">'.'<img class="pic img-circle" src="images/'.$user['img'].'">'  .$user['first_name'].  '/ ' .$user['last_name'] .' / '.'</div>';

    if($user['in_site'] == 1){
       $str .= '<small>Online</small>';
    }
   
    
   // echo $user['first_name'].  ' ' .$user['last_name'].' ';
    //echo '<img class="pic img-circle" src="images/'.$user['img'].'">'
    //echo   $user['first_name'].  ' ' $user['last_name'].' ';

    //echo '<img class="pic img-circle" src="images/'.$user['img'].'">'  .$user['first_name'].  ' ' .$user['last_name'].' ';

    //echo '<img class="pic img-circle" src="images/'.$user['img'].'"' >

    //'<img src="images/" >';                
      
    }
    
    
   $str  .= '</a></div>';
   echo $str;

    ?>

    </div>
    
     
       
      
        
      
      
     
     
     
            </div>
    </div>
    
    
        
    </div>

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