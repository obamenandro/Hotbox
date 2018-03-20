<?php
$server ='localhost';
$username ='root';
$password ='';
$database = 'onlinehotbox';
try {
  $conn = new PDO ("mysql:host=$server; dbname=$database", $username,$password);
}
 catch (PDOException $e) {
  die("Database connection error:" .$e ->getMessage());
}
