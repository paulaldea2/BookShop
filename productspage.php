
<?php
include('php/veriflog.php');
header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/productdetail.css">
<script type="text/javascript" src="javascript/navBar.js"></script>
<title>Book\Shop</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="javascript/openbar.js"></script>
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
<?php include('php/productsdetail.php'); ?>
  <div class='product-cart'>
       <form method="post" action="shoppingcart.php?action=add&id=<?php echo $sid; ?>">
                <div class='product-image'>
                  <?php  echo '<img src="data:image;base64,'.$s.'">';?>
                </div>
              <div class='product-info'>
                 <h4><?php echo $s1; ?></h4>
                 <h4>$<?php echo $s2; ?></h4>

                 <input type="text"style="text-align:center" name="quantity" class="form-control" value="1" />
                 <input type="hidden" name="hidden_title" value="<?php echo $s1; ?>" />
                 <input type="hidden" name="hidden_price" value="<?php echo $s2; ?>" />
                 <input type="submit" name="add_to_cart" style="margin-top:10px;background-color:#cc3333;border-radius: 20px; border:none; outline:none; height:45px;"class="btn btn-success" value="Add to Cart" />
                 <div class="space"></div>
                 <h4><?php echo $s3; ?></h4>

               </div>
    </div>
       </form>
</section>
