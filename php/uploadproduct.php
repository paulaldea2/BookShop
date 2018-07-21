<?php
header("X-XSS-Protection: 1; mode=block");
$db = mysqli_connect("127.0.0.1", "root", "", "images");

if (isset($_POST['upload'])) {

  if (getimagesize($_FILES['image']['tmp_name']) == FALSE) {
      echo "Please select a image";

  }
  else {
    $image= addslashes($_FILES['image']['tmp_name']);
    $name= addslashes($_FILES['image']['name']);
    $title = mysqli_real_escape_string($db,$_POST['title']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $image= file_get_contents($image);
    $image= base64_encode($image);
    saveimage($image,$name,$title,$price,$image_text);
  }
}

function saveimage($image,$name,$title,$price,$image_text)
{
  $db = mysqli_connect("localhost", "root", "", "images");
  $query = "INSERT INTO images (image,image_name,title,price,image_text)
        VALUES('$image', '$name', '$title', '$price', '$image_text')";
  $result = mysqli_query($db,$query);
   if($result)
   {
     echo "<br/>Image uploaded.";
   }
   else {
     echo "<br/>Image not uploaded.";
   }
}

?>
