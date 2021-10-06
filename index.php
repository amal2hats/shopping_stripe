<?php
include "templates/header.php"; 

$products = new Products();
$productList = $products->getProducts();
?>
 
<div class="jumbotron text-center">
  <h1>The Shopping Stripe</h1>
  <p>Stripe enabled shopping cart demo</p>  
  <?php if(isset($_SESSION['login_user'])){ ?>
    <a class="btn btn-info" href="user.php?logout=true">Logout</a> 
  <?php }else{ ?>
    <a class="btn btn-info" href="user.php">User Login</a> 
    <?php } ?>
</div>
 
  
<div class="container">
  <div class="row">
      <div class="col-md-12">

  <?php  
    if ($productList != null) {
    
    foreach($productList as $product) {   ?>
        
  
        <div class="card col-md-3">
            <img src="assets/images/prod-image.jpeg" alt="image of <?= $product["name"] ?>" style="width:200px">
            <h1><?= $product["name"] ?></h1>
            <p class="price"><?= $product["price"] ?></p>
            <p><?= $product["description"] ?></p>
            <p><button onclick="addtocart(<?= $product["id"] ?>,'<?= $product["name"] ?>')">Add to Cart</button></p>
        </div>
        
        <?php    
        }
    } else {
        echo "0 results";
    }
  ?>
 </div>
  </div>
</div> 
<script src="assets/js/index.js"></script> 
</body>
</html>
