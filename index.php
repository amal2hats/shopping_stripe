<?php
include "_parts/header.php";
?>
 <?php

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

?>
 
<div class="jumbotron text-center">
  <h1>The Shopping Stripe</h1>
  <p>Stripe enabled shopping cart demo</p> 
</div>
  
<div class="container">
  <div class="row">
      <div class="col-md-12">

  <?php  
    if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) { // $row["id"]  ?>
        
  
        <div class="card col-md-3">
            <img src="assets/images/prod-image.jpeg" alt="Denim Jeans" style="width:200px">
            <h1><?= $row["name"] ?></h1>
            <p class="price"><?= $row["price"] ?></p>
            <p>Some text about the jeans..</p>
            <p><button onclick="addtocart(<?= $row["id"] ?>,'<?= $row["name"] ?>')">Add to Cart</button></p>
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

<script>

function addtocart(prodId,prName)
{
  
$.ajax({
        url: "cart.php",
        type: "post",
        data: {'productId':prodId,'productName':prName} ,
        success: function (response) {

           alert('Added to cart');
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}



</script>

</body>
</html>
