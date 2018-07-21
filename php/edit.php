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
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) { array_push($errors, "Username is required."); }
    if (empty($email)) { array_push($errors, "Email is required."); }
    if (empty($password)) { array_push($errors, "Password is required."); }

  if (count($errors) == 0) {
    $queryget = mysqli_query($db,"SELECT username, email, password FROM users WHERE id='$id'") or die("Query didn't work");
		$row = mysqli_fetch_assoc($queryget);

    if($row>0){
      $password = md5($password);
    $querychange = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";
    $results = mysqli_query($db, $querychange);
    if ($results) {
    echo '<script>alert("User information has been updated!")</script>';
    header('location: indexadmin.php');
  }
  else {
    die(mysqi_error($db));
  }
    }
  }
}
}
 ?>
