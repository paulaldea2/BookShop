<?php
include('php/veriflog.php');
include('php/edit.php');
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
<link rel="stylesheet" href="css/admin.css">
<script type="text/javascript" src="javascript/openbar.js"></script>
<title>Book\Shop</title>

</head>
<header>
<div class="icon-bar">
  <a class="active" href="indexadmin.php"><i class="fa fa-home"></i></a>
    <?php  if (isset($_SESSION['username'])) : ?>
      <a href="indexadmin.php?logout='1'" style="float:right"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <?php endif ?>
</div>
</header>

<body>
    <div class="login-box">
      <?php
    $db = mysqli_connect("127.0.0.1", "root", "", "authentification");



      $query = "SELECT * FROM users";
      $result = mysqli_query($db, $query);
      if(mysqli_num_rows($result) > 0)
      {
           if($row = mysqli_fetch_array($result))
           {

      ?>
      <form method="post" action="edit.php?action=add&id=<?php echo $row["id"]; ?>">
        <?php include('php/errors.php') ?>
        <div class="input-group">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username">
      </div>
      <div class="input-group">
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter Email">
      </div>
      <div class="input-group">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
      </div>
        <div class="input-group">
      <div class="input-group">
        <input type="submit" name="register_btn">
        <a href="indexadmin.php">Go to homepage</a>
      </div>
      </div>
      </form>
    <?php }
  } ?>
    </div>
</body>
