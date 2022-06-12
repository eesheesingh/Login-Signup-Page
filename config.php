<?php
session_start();
$dbHost='localhost';
$dbName='logindb';
$dbUsername='root';
$dbPassword='';
$dbc=mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
?>