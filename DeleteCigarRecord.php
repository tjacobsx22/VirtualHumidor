<?php
session_start();
$record = $_POST['id'];
$user = $_POST['user'];
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"DELETE FROM humidor WHERE RecordId = '$record' AND UserId = '$user' LIMIT 1");
  mysqli_close($con);
  echo $result;
?>