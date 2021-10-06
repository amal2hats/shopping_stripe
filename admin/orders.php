<?php
include "templates/header.php";  
$order = new Order(); 
$orders = $order->getOrders(); 
?> 
<div class="container">
  <h3>Orders</h3> 

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Customer name</th> 
        <th>Total Amount</th> 
        <th>Actions</th> 
      </tr>
    </thead>
    <tbody>

    <?php  
if ($orders != null) { 
  foreach($orders as $order) { ?>
    
      <tr>
        <td><?= $order["id"] ?></td>
        <td><?= $order["name"] ?></td>  
        <td><?= $order["total_amount"] ?></td>  
        <td><a href="vieworder.php?id=<?= $order["id"] ?>">View details</a></td>  
      </tr>
       
      <?php    
    }
  } else {
    echo "0 results";
  }
 ?>
    </tbody>
  </table>
  
</div> 
<?php
include "templates/footer.php";
?>