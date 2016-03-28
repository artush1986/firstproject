 <?php

session_start();

if(!$_SESSION['user_id']) {
	 header('location: http://localhost/test/index.php');
}

if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
} else{
	$user_id = $_SESSION['user_id'];
}

require('connect.php'); 

$sql = "SELECT * FROM users WHERE user_id= $user_id"; 

$result = mysqli_query($conn, $sql );
//if (isset($_GET['user_id'])) {
     //$sql= "UPDATE users SET in_site = ['true'] ";
  
    //} 

while ($row = mysqli_fetch_assoc($result)) {
	$user = $row; 

}


/*$uploaddir = 'C:\xampp\htdocs\test\images';
$file_name=time().$_FILES['userfile']['name'];
$uploadfile = $uploaddir .DIRECTORY_SEPARATOR.$file_name;
echo '<pre>';

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
   // echo "Файл корректен и был успешно загружен.\n";
} //else {
    //echo "Возможная атака с помощью файловой загрузки!\n";

//}
  $sql = "INSERT INTO images (user_id, img_name) VALUES ("."'".$_SESSION['user_id']."'"."," ."'".$file_name."'".")"; 

$result = mysqli_query($conn, $sql );
$sql="SELECT*FROM images  ";
$result = mysqli_query($conn, $sql );
while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["img_id"]. " - Name: " . $row["user_id"]. " " . $row["img_name"]. "<br>";
        }*/


mysqli_close($conn);

//echo 'Некоторая отладочная информация:';

//print_r($_FILES);

print "</pre>";


?> 

<!DOCTYPE html>
<html>
<head>
    <title>aaaaa</title>
    <link href="bootstrap.min.css" rel="stylesheet">
        <link href="user.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <script   src="https://code.jquery.com/jquery-2.2.2.js"   integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE="   crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        
</head>
<body>


<?php 
require('header.php')

?>


<div class="container">

    <?php 
    require('menu.php') 
    ?>

        <div class="col-md-10">
                <div class="panel">
                    <img class="pic img-circle" src="images/<?php echo $user['img'];?>" alt="..."><br>

                    <div class="name"><small> 



                    <?php

                     echo $user['first_name'] . '   ' . $user['last_name'];

                     ?>


                     </small>
                    					</div>
                    <a href="#" class="btn btn-xs btn-primary pull-right" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Change cover</a>
                </div>
                
    <br><br>
    <?php if($user_id == $_SESSION['user_id']):?>
      <a href="delete_pic.php?user_id=".'"'.$user['user_id'].'"'>Delete</a>
    <?php endif;?>


    <?php if ($user_id == $_SESSION['user_id']):?>

    <form enctype="multipart/form-data" action="" method="POST">
      <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
      
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Отправить этот файл: <input name="userfile" type="file" />
      <input type="submit" value="Send File" />
    </form>

    <?php endif;?>

    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-envelope-o"></i> Inbox</a></li>
      <li><a href="#sent" data-toggle="tab"><i class="fa fa-reply-all"></i> Sent</a></li>
      <li><a href="#assignment" data-toggle="tab"><i class="fa fa-file-text-o"></i> Assignment</a></li>
      <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Event</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane active" id="inbox">
        <a type="button" data-toggle="collapse" data-target="#a1">
            <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
              <div class="btn-group"><input type="checkbox"></div>
              <div class="btn-group col-md-3">Admin Kumar</div>
              <div class="btn-group col-md-8"><b>Hi Check this new Bootstrap plugin</b> <div class="pull-right"><i class="glyphicon glyphicon-time"></i> 12:10 PM <button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-share-square-o"> Reply</i></button></div> </div>
            </div>
        </a>
        <div id="a1" class="collapse out well">This is the message body1</div>
        <br>
        <button class="btn btn-primary btn-xs"><i class="fa fa-check-square-o"></i> Delete Checked Item's</button>
      </div>
     
       
      <div class="tab-pane" id="sent">
            <a type="button" data-toggle="collapse" data-target="#s1">
            <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
              <div class="btn-group"><input type="checkbox"></div>
              <div class="btn-group col-md-3">Kumar</div>
              <div class="btn-group col-md-8"><b>This is reply from Bootstrap plugin</b> <div class="pull-right"><i class="glyphicon glyphicon-time"></i> 12:30 AM</div> </div>
            </div>
        </a>
        <div id="s1" class="collapse out well">This is the message body1</div>
        <br>
        <button class="btn btn-primary btn-xs"><i class="fa fa-check-square-o"></i> Delete Checked Item's</button>
      </div>
      
      
     <div class="tab-pane" id="assignment">
        <a href=""><div class="well well-sm" style="margin:0px;">Open GL Assignments <span class="pull-right"><i class="glyphicon glyphicon-time"></i> 12:20 AM 20 Dec 2014 </span></div></a>        
     </div>
     
     <div class="tab-pane" id="event">
       <div class="media">
                  <a class="pull-left" href="#">
                    <img class="media-object img-thumbnail" width="100" src="http://placehold.it/120x120" alt="...">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">Animation Workshop</h4>
                    2Days animation workshop to be conducted
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