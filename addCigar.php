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
    if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    }else{
    $id = 1;
    }
    $result = mysqli_query($con,"INSERT INTO humidor VALUES('$newid', '$id', '$data->name', '$data->manufacturer', '', '$data->quantity', '$data->date', '$data->id', '$data->length', '$data->ring', '')");
    //echo($newid);
    mysqli_close($con);
    echo $result;
?>