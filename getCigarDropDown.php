<?php
session_start();
$query = $_GET["q"];
$arr = array();
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"SELECT cigarsClean.id, cigarsClean.Length, cigarsClean.RingGauge, cigarsClean.Country, cigarsClean.Filler, cigarsClean.Wrapper, cigarsClean.Color, cigarsClean.Strength, cigarsClean.Name, manufacturer.manufacturer FROM cigarsClean, manufacturer WHERE cigarsClean.ManufacturerId = manufacturer.id AND cigarsClean.Name LIKE '%" . $query . "%' ORDER BY cigarsClean.Name ASC LIMIT 0,40");
  while($row = mysqli_fetch_array($result))
    {
        $arr[] = array( "name"=>$row['Name'],
                                         "length"=>$row['Length'],
                                         "ring"=>$row['RingGauge'],
                                         "country"=>$row['Country'],
                                         "filler"=>$row['Filler'],
                                         "wrapper"=>$row['Wrapper'],
                                         "color"=>$row['Color'],
                                         "strength"=>$row['Strength'],
                                         "id"=>$row['Name'],
                                         "text"=>$row['Name'],
                                         "manufacturer"=>$row['manufacturer'],
                                         "id"=>$row['id']);
    }

  mysqli_close($con);
   header("Content-type: application/json");

echo json_encode($arr);
?>