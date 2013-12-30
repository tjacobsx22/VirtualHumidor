<?php
$record = $_POST['id'];
$user = $_POST['user'];
$qty = $_POST['qty'];
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"UPDATE humidor SET CigarQuantity = $qty WHERE RecordId = '$record' AND UserId = '$user' LIMIT 1");
  mysqli_close($con);
  echo $result;
?>