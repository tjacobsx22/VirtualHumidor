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

    $client_id = $_POST['id'];
    $cigar_id = $_POST['cigarid'];
    $client_note = $_POST['note'];
    $client_note_count = $_POST['noteCount'];
    $count = $client_note_count + 1;
    $newid = guid();
    $con=mysqli_connect("localhost","root","","virtualhumidor");
    $result = mysqli_query($con,"INSERT INTO notes VALUES($client_id, $cigar_id, '$client_note', '$newid')");
    $result2 = mysqli_query($con,"UPDATE humidor SET NoteCount = $count WHERE CigarId = $cigar_id AND UserId = $client_id");
    echo($count);
    mysqli_close($con);
?>