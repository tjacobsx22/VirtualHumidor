<?php
$arr = array();
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"SELECT * FROM humidor");
  while($row = mysqli_fetch_array($result))
    {
        $startDate = new DateTime();
        $endDate = new DateTime($row['PurchaseDate']);

        $interval = $startDate->diff($endDate);
        $days = $interval->days . " days old.";
        //$arr[] = $row;

                $arr[] = array( "RecordId"=>$row['RecordId'],
                                "UserId"=>$row['UserId'],
                                "CigarName"=>$row['CigarName'],
                                "CigarBrand"=>$row['CigarBrand'],
                                "CigarVitola"=>$row['CigarVitola'],
                                "CigarQuantity"=>$row['CigarQuantity'],
                                "PurchaseDate"=>$row['PurchaseDate'],
                                "CigarId"=>$row['CigarId'],
                                "CigarLength"=>$row['CigarLength'],
                                "CigarRing"=>$row['CigarRing'],
                                "NoteCount"=>$row['NoteCount'],
                                "Age"=>$days
                                );
    }

  mysqli_close($con);
   header("Content-type: application/json");

echo json_encode($arr);
?>