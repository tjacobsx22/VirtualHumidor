<?php
$arr = array();
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"SELECT * FROM humidor");
  while($row = mysqli_fetch_array($result))
    {
        $arr[] = $row;
    }

  mysqli_close($con);
   header("Content-type: application/json");

echo json_encode($arr);
?>