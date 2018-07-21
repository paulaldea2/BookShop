<?php
include('php/uploadproduct.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/product.css">
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
    <a class="active" href="prevpage.php"><i class="fa fa-home"></i></a>
      <a href="shoppingcart.php" style="float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      <a href="login.php"style="float:right"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
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
<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/img1.jpg" alt="First Slide" >
            </div>
            <div class="item">
                <img src="img/img2.jpg" alt="Second Slide">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

      <div class="text">
        <h1>New Arrivals</h1>
      </div>
</header>

<body>
  <section class='product'>
    <?php
    $query = "SELECT * FROM images";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0)
    {
         while($row = mysqli_fetch_array($result))
         {

    ?>
    <div class='product-cart'>
         <form method="post" action="shoppingcart.php?action=add&id=<?php echo $row["id"]; ?>">
                  <div class='product-image'>
                <a href="productspage.php?action=add&id=<?php echo $row["id"]; ?>">  <?php echo '<img src="data:image;base64,'.$row[1].'">';?></a>
                  </div>
                   <div class='product-info'>
                   <h4><?php echo $row["title"]; ?></h4>
                   <h4>$<?php echo $row["price"]; ?></h4>
                   <input type="text"style="text-align:center" name="quantity" class="form-control" value="1" />
                   <input type="hidden" name="hidden_title" value="<?php echo $row["title"]; ?>" />
                   <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                   <input type="submit" name="add_to_cart" style="margin-top:10px;background-color:#cc3333;border-radius: 20px; border:none; outline:none; height:45px;"class="btn btn-success" value="Add to Cart" />
                  </div>
      </div>
         </form>
    <?php
         }
    }
    ?>
  </section>

        <footer>
          <p>&copy; 2018 Aldea Paul Cristian</p>
          <p>Terms of Service</p>
          <p>Support</p>
          <img src="img/cards.png" class="cards">
        </footer>
</html>
