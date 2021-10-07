<?php 
include "templates/header.php";

if(isset($_POST['productId']) && $_POST['productId'] != '')
{ 
   $_SESSION['cart'][$_POST['productId']]['quantity'] = (int)$_SESSION['cart'][$_POST['productId']]+1; 
   $_SESSION['cart'][$_POST['productId']]['name'] = $_POST['productName']; 
} 
?>


<div class="jumbotron text-center">
  <h1>The Shopping Stripe</h1>
  <p>Cart page</p> 
</div>
  
<div class="container">
  <div class="row">
      <table class="table table-hover">
        <thead>
            <tr> 
                <th>Product name</th> 
                <th>Quantity</th> 
            </tr>
        </thead>

        <tbody>

        <?php if(isset($_SESSION['cart'])){foreach($_SESSION['cart'] as $key => $item){ ?> 
  
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['quantity'] ?></td>
               
            </tr>

        <?php } 
      }else{ 
        echo 'No items in cart'; 
        } ?>
             
    </tbody>

      </table>

      <a class="btn btn-default" href="checkout.php">Checkout</a>
  </div>
</div> 
</body>
</html>
