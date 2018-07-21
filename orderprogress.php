<?php include('php/veriflog.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/shoppingcartdes.css">
<script type="text/javascript" src="javascript/openbar.js"></script>
<title>Book\Shop</title>

</head>
<header>
  <div class="icon-bar">
    <a class="active" href="index.php"><i class="fa fa-home"></i></a>
     <?php  if (isset($_SESSION['username'])) : ?>
    <a href="index.php?logout='1'" style="float:right"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <?php endif ?>
      <a href="shoppingcart.php" style="float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
    <div style="clear:both"></div>
    <br />
    <div class="space"></div>
  <h3>Orders information</h3>
  <div class="table-responsive">
       <table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Delivery</th>
    <th>Title</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Status</th>
  </tr>
  <?php
  $db = mysqli_connect("127.0.0.1", "root", "", "authentification");


  $user = $_SESSION['username'];
  if ($user) {

  $query1 = "SELECT * FROM ordercom WHERE username='$user'" or die("Query didn't work");
  $result1 = mysqli_query($db, $query1);
  if(mysqli_num_rows($result1) > 0)
  {
     while($row = mysqli_fetch_array($result1))
     {

  ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['username']?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['delivery']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['status']; ?></td>

  </tr>
  <?php
    }
  }
}
  ?>
  </table>
  </div>
  </div>
</body>
