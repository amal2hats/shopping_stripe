<?php 
$servername = "localhost";
$username = "root";
$password = "2hatslogic";
$dbname = "shopping_stripe"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping stripe home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>