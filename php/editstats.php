<?php

$id = (int) trim($_GET['id']);
if($id == 0){
  //you can show error or redirect to other page
  header('index.php');
}

$db = mysqli_connect("127.0.0.1", "root", "", "authentification");


$errors = array();
if(!$db){

}
else{

  if (isset($_POST['register_btn'])) {
    $status = mysqli_real_escape_string($db, $_POST['status']);


    if (empty($status)) { array_push($errors, "Status is required."); }


  if (count($errors) == 0) {
    $queryget = mysqli_query($db,"SELECT status FROM ordercom WHERE id='$id'") or die("Query didn't work");
		$row = mysqli_fetch_assoc($queryget);

    if($row>0){
    $querychange = "UPDATE ordercom SET status='$status' WHERE id='$id'";
    $results = mysqli_query($db, $querychange);
    if ($results) {
    echo '<script>alert("User information has been updated!")</script>';
  }
  else {
    die(mysqi_error($db));
  }
    }
  }
}
}
 ?>
