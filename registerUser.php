<?php
session_start();
    function guid(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                    .substr($charid, 0, 8).$hyphen
                    .substr($charid, 8, 4).$hyphen
                    .substr($charid,12, 4).$hyphen
                    .substr($charid,16, 4).$hyphen
                    .substr($charid,20,12)
                    .chr(125);// "}"
            return $uuid;
        }
    }
    $newid = guid();
    $data = json_decode(file_get_contents("php://input"));
    $con=mysqli_connect("localhost","root","","virtualhumidor");
    $result = mysqli_query($con,"SELECT * FROM user WHERE userid = '$data->User'");
    //$userExists = mysql_fetch_array($result);
    $total = $result->num_rows;
    if($total == 0){
    $result = mysqli_query($con,"INSERT INTO user VALUES('$newid', '$data->Email', '$data->User', '$data->Password')");
   }
    mysqli_close($con);
    echo $total;
?>