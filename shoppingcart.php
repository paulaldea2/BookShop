<?php
include('php/veriflog.php');
include('php/shoppingcart.php');
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
            <div style="clear:both"></div>
            <br />
            <div class="space"></div>
            <h3>My cart</h3>
            <button class="checkout"><a href="index.php" style="text-decoration:none; color:black;">Continue Shopping</a></button>
            <div class="space"></div>
            <div class="table-responsive">
                 <table class="table table-bordered">
                      <tr>
                           <th width="40%">Item Name</th>
                           <th width="10%">Quantity</th>
                           <th width="20%">Price</th>
                           <th width="15%">Total</th>
                           <th width="5%">Action</th>
                      </tr>
                      <?php
                      if(!empty($_SESSION["shopping_cart"]))
                      {
                           $total = 0;
                           foreach($_SESSION["shopping_cart"] as $keys => $values)
                           {
                      ?>
                      <tr>
                           <td><?php echo $values["item_title"]; ?></td>
                           <td><?php echo $values["item_quantity"]; ?></td>
                           <td>$ <?php echo $values["item_price"]; ?></td>
                           <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                           <td><a href="shoppingcart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                      </tr>
                      <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                           }
                      ?>
                      <tr>
                           <td colspan="3" align="right">Total</td>
                           <td align="right">$ <?php echo number_format($total, 2); ?></td>
                           <td></td>
                      </tr>
                      <?php
                      }
                      ?>
                 </table>
            </div>
            <div class="space"></div>
               <button class="checkout"><a href="checkout.php" style="text-decoration: none; color: black;">Checkout</a></button>
       </div>
       <br />
  </body>


</html>
