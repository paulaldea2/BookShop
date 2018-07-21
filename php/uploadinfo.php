<?php

$connect = mysqli_connect("127.0.0.1", "root", "", "authentification");


$errors = array();

$user = $_SESSION['username'];

if ($user)

{
  if (isset($_POST['register_btn'])) {

    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $delivery = mysqli_real_escape_string($connect, $_POST['delivery']);

    if (empty($name)) { array_push($errors, "Name is required."); }
    if (empty($phone)) { array_push($errors, "Phone is required."); }
    if (empty($delivery)) { array_push($errors, "Delivery address is required."); }
  if (count($errors) == 0) {
    $queryget = mysqli_query($connect,"SELECT name,phone,delivery FROM users WHERE username='$user'") or die("Query didn't work");
		$row = mysqli_fetch_assoc($queryget);

    if($row>0){

    $querychange = "UPDATE users SET name='$name', phone='$phone', delivery='$delivery' WHERE username='$user'";
    $results = mysqli_query($connect, $querychange);
    echo '<script>alert("User information has been updated!")</script>';

      }
    }
  }

}
 ?>
