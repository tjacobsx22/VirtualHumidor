<?php
session_start();
$arr = array();
$client_id = mysql_real_escape_string($_REQUEST["user"]);
$cigar_id = mysql_real_escape_string($_REQUEST["cigar"]);
$con=mysqli_connect("localhost","root","","virtualhumidor");
  $result = mysqli_query($con,"SELECT NoteId, Note FROM notes WHERE UserId = $client_id AND CigarId = $cigar_id");
  while($row = mysqli_fetch_array($result))
    {
        $arr[] = $row;
    }

  mysqli_close($con);
   header("Content-type: application/json");

echo json_encode($arr);
?>