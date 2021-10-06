<?php
include "templates/header.php";
$product = new Products();
$products = $product->get();
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
    foreach ($products as $product) { ?>

      <tr>
        <td><?= $product["id"] ?>
        </td>
        <td><?= $product["name"] ?>
        </td>
        <td><a
            href="addproduct.php?id=<?= $product["id"] ?>">Edit</a>
        </td>
        <td><a onclick="return confirm('Are you sure you delete this product?')"
            href="products.php?delete=<?= $product["id"] ?>">Delete</a>
        </td>
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
