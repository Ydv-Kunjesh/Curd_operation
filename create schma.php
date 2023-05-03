<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "adit";
    $conn = mysqli_connect($servername,$username,$password,$database);
   // $db = 'create database adit';
   // $query = mysqli_query($conn,$db);


   $table = "create table `curd` 
    (
        `reg_no` varchar(30) not null, 
    `trainee_name` varchar(30) not null primary key,
    `phone_no` varchar(30) not null,
    `nsti` varchar(30) not null,
    `reg_date` varchar(30) not null
     )";
     mysqli_query($conn,$table);
    echo "connection started";
 

?>
