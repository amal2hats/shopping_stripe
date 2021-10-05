<?php 
include "_parts/header.php";

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

        <?php foreach($_SESSION['cart'] as $key => $item){ ?> 
  
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['Quantity'] ?></td>
               
            </tr>

        <?php } ?>
             
    </tbody>

      </table>
  </div>
</div> 
</body>
</html>
