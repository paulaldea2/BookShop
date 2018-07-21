<?php
  $connect = mysqli_connect("127.0.0.1", "root", "", "images");

   if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($connect,$_POST['search']);
    $sql = "SELECT * FROM images WHERE title LIKE '%$search%'";
    $result = mysqli_query($connect,$sql);
    $queryResults = mysqli_num_rows($result);
  }

 ?>
