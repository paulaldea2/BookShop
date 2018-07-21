<?php
  include('php/veriflog.php');
  include('php/uploadtask.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/checkoutdesign.css">
<script type="text/javascript" src="javascript/openbar.js"></script>
<title>Book\Shop</title>
</head>
<header>
<div class="icon-bar">
  <a class="active" href="index.php"><i class="fa fa-home"></i></a>
    <?php  if (isset($_SESSION['username'])) : ?>
      <a href="index.php?logout='1'" style="float:right"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <?php endif ?>
      <a href="shoppingcart.php" style="float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i></a>
      <a href="uploadAdmin.php"style="float:right"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
      <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
          <div class="overlay-content">
            <form action="search.php" method="post">
              <input type="text" name="search" placeholder="Search">
              <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
        <a href="#" class="openBtn" onclick="openSearch()" style="float:right"><i class="fa fa-search" aria-hidden="true"></i></button></a>
</div>
</header>
<body>
  <div class="login-box">
    <h1>Payment Details</h1>
    <div class="space"></div>
    <img src="img/cards.png" class="cards">
    <form method="post" action="checkout.php">
        <?php include('php/errors.php') ?>
    <div class="input-group">
      <p>Card number</p>
      <input type="text" name="cardnumber" minlength="19" placeholder="8888-8888-8888-8888"//>
    </div>
    <div class="input-group">
      <p>Expire</p>
      <input type="text" name="expire" placeholder="MM/YYYY."/>
    <div class="input-group">
      <p>Cvc</p>
      <input type="text" name="cvc" maxlength="4" placeholder="123"/>
    </div>
    <div class="input-group">
    <div class="input-group">
    <input type="submit" name="check" value="Confirm and Pay!">
    </div>
  </form>
  </div>
  </body>


</html>
