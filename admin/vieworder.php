<?php
include "_parts/header.php"; 

if(isset($_GET['id']) && $_GET['id'] != '')
{ 
    $orderObj = new Order_model(); 
    $order = $orderObj->getOrder($_GET['id']);
}
 

?>

<div class="container">
  <h3>Order details</h3> 
  <div class="col-md-6">

  <table class="table table-hover table-bordered">
 
      <tr><td>Order Id : <?= $order["id"] ?></td></tr>
      <tr><td>Customer name : <?= $order["name"] ?></td> </tr>
      <tr><td>Total Amount : <?= $order["total_amount"] ?></td>  </tr>


      <tr><td>Payment status : <?= $order["payment_status"] ?></td>  </tr>

      <tr><td>Payment Txn Id : <?= $order["txn_id"] ?></td>  </tr>
     
   
  </table>
  </div>
  
</div> 

 
<div class="container">
  <h3>Products</h3>  

  <table class="table table-hover table-bordered">
        <thead>
            <tr> 
                <th>Product name</th> 
                <th>Quantity</th> 
            </tr>
        </thead>

        <tbody>

        <?php foreach(json_decode($order['products'],true) as $key => $item){ ?> 
  
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['quantity'] ?></td>
               
            </tr>

        <?php } ?>
             
    </tbody>

      </table>
  
</div> 
<?php
include "_parts/footer.php";
?>