<?php
  include('php/config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
        <h1>Register</h1>
      <form method="post" action="register.php">
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
          <p>Confirm Password</p>
          <input type="password" name="password2" placeholder="Confirm Password">
        </div>
        <div class="input-group">
          <input type="submit" name="register_btn">
          <a href="login.php">Already a member? Sign in</a>
        </div>
        <div class="g-recaptcha" data-sitekey="6LeSZWAUAAAAABqMSApwL5gDa80NIpTIReEYuLSj"></div>
        </form>
      </div>
  </body>
</html>
