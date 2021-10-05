<?php 
require_once 'vendor/autoload.php';
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

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">The Shopping Stripe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="cart.php">Cart</a></li>
      <?php if(isset($_SESSION['login_user'])){ ?> 
      <li><a href="user.php?logout=true">User</a></li> 
      <?php }else{ ?>
        <li><a href="user.php">User login</a></li> 
      <?php } ?>
    </ul>
  </div>
</nav>