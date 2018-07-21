<?php
include('php/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book\Shop</title>

  </head>
  <body>
    <img src="img/loginbackground.png" class="background">
      <div class="login-box">
        <img src="img/avatar1.png" class="avatar">
        <h1>Hi!</h1>
        <form method="post" action="login.php">
          <?php include('php/errors.php') ?>
          <div class="input-group">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div class="input-group">
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password">
        </div>
          <div class="input-group">
        <div class="input-group">
          <input type="submit" name="login_user">
          <a href="register.php">Not yet a member? Sign up</a>
        </div>
        <div class="g-recaptcha" data-sitekey="6LeSZWAUAAAAABqMSApwL5gDa80NIpTIReEYuLSj"></div>
        </form>
      </div>
  </body>
</html>
