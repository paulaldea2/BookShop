<?php
include('php/veriflog.php');
include('php/uploadproduct.php');
header("X-XSS-Protection: 1; mode=block");
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
<h1>Upload a product:<br><?php echo $_SESSION['username']; ?></br></h1>
<?php endif ?>
  <form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <p>Upload a image!</p>
    <div class="input-group">
  	  <input type="file" name="image">
    </div>
    <div class="input-group">
      <p>Title<input type="text" name="title" placeholder="Enter product title."></p>
    </div>
    <div class="input-group">
      <p>Price<input type="number" name="price" placeholder="Enter product title."></p>
    </div>
    <p>Description</p>
  	<div>
      <textarea
        style="color:#000"
        style="font-size: 10em"
      	id="text"
      	cols="45"
      	rows="6"
      	name="image_text"
      	placeholder="Say something about this product..."></textarea>
  	</div>

      <div class="input-group">
  	<div class="input-group">
  		<button type="submit" name="upload">Post now!</button>
  	</div>
    </div>
  </form>
  </div>

</body>
