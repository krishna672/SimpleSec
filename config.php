<?php
  //error_reporting(0);
  //database connection code here

  $server   = "localhost";
  $user     = "root";
  $password = "";
  $db_name  = "simplesec_db";


  $mysqli = new mysqli($server,$user,$password,$db_name);

  if($mysqli->connect_error){
    echo $mysqli->connect_errno . "<br />";
    echo $mysqli->connect_error . "<br />";
    die("connection failed");
  }
  //echo "connection success";
 ?>
