<?php
$arr = array();
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"SELECT * FROM manufacturer");
  while($row = mysqli_fetch_array($result))
    {
        $manu = mysqli_query($con,"UPDATE cigarsClean SET ManufacturerId = '$row[id]' WHERE Name LIKE '$row[manufacturer]%'");
        $arr[] = $manu;
    }

  mysqli_close($con);
   header("Content-type: application/json");

echo json_encode($arr);
?>