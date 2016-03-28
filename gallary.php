<?php

session_start();

if(!$_SESSION['user_id']) {
   header('location: http://localhost/test/index.php');

}


require('connect.php');

//exit;
require('header.php');




echo '<pre>';

if (isset($_FILES['userfile'])) {
  $uploaddir = 'C:\xampp\htdocs\test\images';
  $file_name=time().$_FILES['userfile']['name'];
  $uploadfile = $uploaddir .DIRECTORY_SEPARATOR.$file_name;
  
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $sql = "INSERT INTO images (user_id, img_name) VALUES ("."'".$_SESSION['user_id']."'"."," ."'".$file_name."'".")";
    $result = mysqli_query($conn, $sql ); 
  } //else {
  }  //echo "Возможная атака с помощью файловой загрузки!\n";

//}


$sql="SELECT*FROM images";
$result = mysqli_query($conn, $sql );

$results = array();
//$str = '';
while($row = mysqli_fetch_assoc($result)) {
    $results[] =  $row;
    //$str = $str.$row['img_name'];        
       
          //echo "id: " . $row["img_id"]. " - Name: " . $row["user_id"]. " " . $row["img_name"]. "<br>";
          echo '<img width="100" src="images/'.$row["img_name"].'"/>';
}


mysqli_close($conn);

//if (isset($_GET['user_id'])) {
     //$sql= "UPDATE users SET in_site = ['true'] ";
  
    //} 

//echo 'Некоторая отладочная информация:';

//print_r($_FILES);

print "</pre>";






?>




<div class="container">
    
    <?php 

      require('menu.php') 

    ?>     
      


     <?php 
   //echo $str;
   foreach ($results as $result) {
    $results[] =  $row;
      echo '<img width="100" src="images/'.$row["img_name"].'"/>';     
   }

   ?>  

        
          
               
    
    <div>
    <form enctype="multipart/form-data" action="" method="POST">
      <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
      
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Отправить этот файл: <input name="userfile" type="file" />
      <input type="submit" value="Send File" />
    </form> 

        
    </div>









<script type="text/javascript">
    $(function () {
        $('#myTab a:last').tab('show')
    })



</script>
</body>
</html>