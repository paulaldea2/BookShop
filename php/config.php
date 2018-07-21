<?php
session_start();

$username = "";
$email    = "";
$errors = array();


$db = mysqli_connect("127.0.0.1", "root", "", "authentification");

//REGISTER

if (isset($_POST['register_btn'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);


  if (empty($username)) { array_push($errors, "Username is required."); }
  if (empty($email)) { array_push($errors, "Email is required."); }
  if (empty($password)) { array_push($errors, "Password is required."); }
  if ($password!=$password2) {
	array_push($errors, "The two passwords do not match.");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists.");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists.");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password);

  	$query = "INSERT INTO users (username, email, password, name, phone, delivery, cardnumber, expire, cvc, grade)
  			  VALUES('$username', '$email', '$password','','0','','','','0','0')";
  	$result = mysqli_query($db, $query);
     if($result){

     } else die(mysqli_error($db));
    $post_data = http_build_query(
        array(
            'secret' => '6LeSZWAUAAAAAChMUcaRRXclERpl3o0MjMY9Ph8m',
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['192.168.0.104']
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $result = json_decode($response);
    if (!$result->success) {
        throw new Exception('Gah! CAPTCHA verification failed. Please email me directly at: jstark at jonathanstark dot com', 1);
    }
    if($result){

    }else {
      die(mysqli_error($db));
    }
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in.";
  	header('location: index.php');
  }
}

  // LOGIN VERIFICATION

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required.");
  }
  if (empty($password)) {
    array_push($errors, "Password is required.");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
    $s = $row['grade'];
    echo $s;
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      if ($s == '1') {
        $_SESSION['success'] = "You are now logged in.";
        header('location: indexadmin.php');
        $post_data = http_build_query(
            array(
                'secret' => '6LeSZWAUAAAAAChMUcaRRXclERpl3o0MjMY9Ph8m',
                'response' => $_POST['g-recaptcha-response'],
                'remoteip' => $_SERVER['192.168.0.104']
            )
        );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $post_data
            )
        );
        $context  = stream_context_create($opts);
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $result = json_decode($response);
        if (!$result->success) {
            throw new Exception('Gah! CAPTCHA verification failed. Please email me directly at: jstark at jonathanstark dot com', 1);
        }
      $_SESSION['success'] = "You are now logged in.";
      header('location: index.php');

      }else{
              $post_data = http_build_query(
                  array(
                      'secret' => '6LeSZWAUAAAAAChMUcaRRXclERpl3o0MjMY9Ph8m',
                      'response' => $_POST['g-recaptcha-response'],
                      'remoteip' => $_SERVER['192.168.0.104']
                  )
              );
              $opts = array('http' =>
                  array(
                      'method'  => 'POST',
                      'header'  => 'Content-type: application/x-www-form-urlencoded',
                      'content' => $post_data
                  )
              );
              $context  = stream_context_create($opts);
              $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
              $result = json_decode($response);
              if (!$result->success) {
                  throw new Exception('Gah! CAPTCHA verification failed. Please email me directly at: jstark at jonathanstark dot com', 1);
              }
            $_SESSION['success'] = "You are now logged in.";
            header('location: index.php');
          }
          $_SESSION['success'] = "You are now logged in.";
          header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination.");
          }
        }
}
?>
