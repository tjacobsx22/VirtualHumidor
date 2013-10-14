<?php
$arr = array();
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"SELECT * FROM cigarsClean");
  while($row = mysqli_fetch_array($result))
    {
        $arr[] = array( "name"=>$row['Name'],
                        "length"=>$row['Length'],
                        "ring"=>$row['RingGauge'],
                        "country"=>$row['Country'],
                        "filler"=>$row['Filler'],
                        "wrapper"=>$row['Wrapper'],
                        "color"=>$row['Color'],
                        "strength"=>$row['Strength']
        );
    }

  mysqli_close($con);
   header("Content-type: application/json");

echo json_encode($arr);
?>