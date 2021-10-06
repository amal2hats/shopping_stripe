<?php
include "_parts/header.php"; 
 
$orderObj = new Order_model(); 
$orders = $orderObj->getOrders();

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
if (count($orders) > 0) {
  
  foreach($orders as $row) { ?>
    
      <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td>  
        <td><?= $row["total_amount"] ?></td>  
        <td><a href="vieworder.php?id=<?= $row["id"] ?>">View details</a></td>  
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
include "_parts/footer.php";
?>