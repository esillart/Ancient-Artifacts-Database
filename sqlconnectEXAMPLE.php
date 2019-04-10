<?php

//function db_connect() {
    
    $ser="localhost";
    $user="root";
    $pass="";
    $db="artifactdatabase";
    
    $conn = mysqli_connect($ser, $user, $pass, $db) or die("Connection Failed");
    
    mysqli_select_db($conn,"$db");
    //}

?>