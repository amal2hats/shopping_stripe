<?php
include "_parts/header.php";  
$prodObj = new Products_model();
$products = $prodObj->getProducts(); 
?> 
<div class="container">
  <h3>Products</h3> <a href="addproduct.php" class="btn btn-success">New Product</a>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product name</th> 
        <th>Actions</th> 
      </tr>
    </thead>
    <tbody>

    <?php  
if (count($products) > 0) {
  
  foreach($products as $row) { ?>
    
      <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td> 
        <td><a href="addproduct.php?id=<?= $row["id"] ?>">Edit</a></td> 
        <td><a onclick="return confirm('Are you sure you delete this product?')" href="products.php?delete=<?= $row["id"] ?>">Delete</a></td> 
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