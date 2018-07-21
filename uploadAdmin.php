<?php
    include('php/veriflog.php');
    include('php/uploadinfo.php');

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
<link rel="stylesheet" href="css/uploaddesign.css">
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
        <?php  if (isset($_SESSION['username'])) : ?>
        <h1>Upload account information:<br><?php echo $_SESSION['username']; ?></br></h1>
        <?php endif ?>
      <form method="post" action="uploadAdmin.php">
          <?php include('php/errors.php') ?>
        <div class="input-group">
        <p>Name</p>
        <input type="text" name="name" placeholder="Enter name.">
      </div>
      <div class="input-group">
        <p>Phone</p>
        <input type="text" name="phone" minlength="10" placeholder="Enter phone.">
      </div>
      <div class="input-group">
        <p>Delivery</p>
        <input type="text" name="delivery" placeholder="Enter delivery address.">
      </div>
      <div class="input-group">
        <input type="submit" name="register_btn">
        <a href="uploadproducts.php">Upload a product now !</a>
        <div class="space"></div>

        <?php

$db = mysqli_connect("127.0.0.1", "root", "", "authentification");

        $user = $_SESSION['username'];
        if ($user) {

        $query1 = "SELECT * FROM users WHERE username='$user'" or die("Query didn't work");
        $result1 = mysqli_query($db, $query1);
        if(mysqli_num_rows($result1) > 0)
        {
           if($row = mysqli_fetch_array($result1))
           {

        ?>
        <a href="orderprogress.php?action=add&id=<?php echo $row["id"]; ?>">Your orders !</a>
        <img src="img/frame.png" alt="code">
        <?php
      }
      }
    } ?>
      </div>
      </form>
    </div>


</body>

</html>
