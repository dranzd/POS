<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "pos_system";
    $port = "3307";

 $con = new mysqli($host,$username,$password,$database,$port);

 if($con->connect_errno)
    {
        die("Connection failed: ".$con->connect_error);
    } 
     ?>