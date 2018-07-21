<?php
$id = (int) trim($_GET['id']);
if($id == 0){
  //you can show error or redirect to other page
  header('index.php');
}
$db = mysqli_connect("127.0.0.1", "root", "", "images");


if(!$db){

}else {
$sql = "SELECT * FROM images WHERE id = $id";
$mq = mysqli_query($db,$sql) or die ("not working query");
$row = mysqli_fetch_array($mq) or die("line 44 not working");
$s=$row['image'];
$s1= $row['title'];
$s2= $row['price'];
$s3= $row['image_text'];
$sid= $row['id'];
}


?>
