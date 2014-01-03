<?php
session_start();
$arr = array();

  if(isset($_SESSION['id']))
  {
                    $arr[] = array( "id"=>$_SESSION['id'],
                                    "user"=>$_SESSION['user'],
                                    "email"=>$_SESSION['email'],
                                    "isLoggedIn"=>true
                                    );
  }else
  {
                     $arr[] = array( "isLoggedIn"=>false );
  }

echo json_encode($arr);
?>