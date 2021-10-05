<?php
include "_parts/header.php";
?>

<?php

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
        <td><a href="">Edit</a></td> 
        <td><a href="">Delete</a></td> 
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