<?php

include('php/shoppingcart.php');
$db = mysqli_connect("127.0.0.1", "root", "", "authentification");



$errors = array();

$user = $_SESSION['username'];

if($user)
{

  if (isset($_POST['check'])) {

    $cardnumber = mysqli_real_escape_string($db, $_POST['cardnumber']);
    $expire = mysqli_real_escape_string($db, $_POST['expire']);
    $cvc = mysqli_real_escape_string($db, $_POST['cvc']);

    if (empty($cardnumber)) { array_push($errors, "Card number is required."); }
    if (empty($expire)) { array_push($errors, "Expire is required."); }
    if (empty($cvc)) { array_push($errors, "Cvc is required.");}

  if (count($errors) == 0) {
    $ok=0;
    $queryget = mysqli_query($db,"SELECT cardnumber , expire, cvc FROM users WHERE username='$user'") or die("Query didn't work");
    $row = mysqli_fetch_assoc($queryget);

    if($row>0){

          $querychange = "UPDATE users SET cardnumber='$cardnumber', expire='$expire', cvc='$cvc' WHERE username='$user'";
          $result1 = mysqli_query($db, $querychange);
          $ok = 1;
          if($result1){
            echo '<script>alert("Your information has been updated!")</script>';
          }
          else {
            die(mysqli_error($db));
          }
        }
    $query1 = "SELECT name,phone,delivery FROM users WHERE username='$user'" or die("Query didn't work");
    $mq = mysqli_query($db,$query1) or die ("not working query");
    $row = mysqli_fetch_array($mq) or die("line 44 not working");
    $name = $row['name'];
    $phone = $row['phone'];
    $delivery = $row['delivery'];

    if(!empty($_SESSION["shopping_cart"]))
    {
        $total = 0;
      foreach($_SESSION["shopping_cart"] as $keys => $values)
      {
      $title = $values["item_title"];
      $quantity = $values["item_quantity"];
      $total = $total + ($quantity * $values["item_price"]);
      $quantity1 = $quantity;
                if ($quantity1 >= 0) {
                  $query = "INSERT INTO ordercom (username, name, phone, delivery, title, quantity, price, status)
                            VALUES('$user', '$name', '$phone','$delivery','$title','$quantity', '$total','')";
                                $results= mysqli_query($db,$query);
                                     }
                else {
                  $quantity1 --;
                }
      }
    }
  }
  }
}




 ?>
