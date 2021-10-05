<?php
include "_parts/header.php";
?>

<?php

if(isset($_GET['delete']) && $_GET['delete'] != '')
{ 
  $sql = "DELETE FROM products WHERE id=".$_GET['delete'] ;
  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: products.php");
    die();
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

?>
 
<div class="container">
  <h3>Products</h3>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product name</th> 
        <th>Product price</th> 
        <th>Actions</th> 
      </tr>
    </thead>
    <tbody>

    <?php  
if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) { ?>
    
      <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td> 
        <td><?= $row["price"] ?></td> 
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
<?php mysqli_close($conn); ?>
<?php
include "_parts/footer.php";
?>