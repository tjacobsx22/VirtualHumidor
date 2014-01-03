<?php
session_start();
    $arr = array();
    $data = json_decode(file_get_contents("php://input"));
    $con=mysqli_connect("localhost","root","","virtualhumidor");
    if(!$data->isLoggedIn)
    {
    $result = mysqli_query($con,"SELECT * FROM user WHERE userid = '$data->userid' AND password = '$data->password'");
  while($row = mysqli_fetch_array($result))
    {
         $arr = array('id'=>$row['id'], 'user'=>$row['userid'], 'email'=>$row['email']);
    }
   }


        mysqli_close($con);
        header("Content-type: application/json");

        if(!empty($arr)){
        // store session data
        $_SESSION['id']=$arr['id'];
        $_SESSION['user']=$arr['user'];
        $_SESSION['email']=$arr['email'];

        echo json_encode($arr);
        }
?>