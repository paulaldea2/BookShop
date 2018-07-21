<?php
include('php/veriflog.php');
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
  <a class="active" href="indexadmin.php"><i class="fa fa-home"></i></a>
    <?php  if (isset($_SESSION['username'])) : ?>
      <a href="indexadmin.php?logout='1'" style="float:right"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <?php endif ?>
</div>
</header>

<body>
<div class="login-box">
  <div style="clear:both"></div>
  <br />
  <div class="space"></div>
  <h3>Users information</h3>
  <div class="table-responsive">
       <table class="table table-bordered">
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Delivery</th>
    <th>Grade</th>
    <th>Action</th>
  </tr>
<?php
$db = mysqli_connect("127.0.0.1", "root", "", "authentification");


$query = "SELECT * FROM users";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
     while($row = mysqli_fetch_array($result))
     {

?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['username']?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['delivery']; ?></td>
    <td><?php echo $row['grade']; ?></td>
    <td><a href="edit.php?action=add&id=<?php echo $row["id"]; ?>" style="text-decoration: none;"><span class="text-danger">Edit</span></a></td>

</tr>
<?php
    }
}
 ?>
</table>
</div>
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

$query1 = "SELECT * FROM ordercom";
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
  <td><a href="editstats.php?action=add&id=<?php echo $row["id"]; ?>"><span class="text-danger">Edit</span></a></td>

</tr>
<?php
  }
}
?>
</table>
</div>
</div>
</body>
