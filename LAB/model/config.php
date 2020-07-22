<?php

$servername = "localhost";
$username = "root";
$password = "";
$output = array('status'=> 'fail', 'error' => 'something went wrong');
try {
    $conn = new PDO("mysql:host=$servername;dbname=lab", $username, $password);
    // set the PDO error mode to exception
    $output = array('status' => 'success');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    }
catch(PDOException $e)
    {
   $output = array('status'=> 'fail', 'error' => 'Connection Failed');
    }
    ?>