<?php
include "_parts/header.php";
?>

<?php
 
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{

  if(isset($_GET['id']) && $_GET['id'] != '')
  {
    $sql = "UPDATE products SET name='".$_POST["name"]."',description = '".$_POST["description"]."' WHERE id=".$_GET['id'];
  }else{

    $sql = "INSERT INTO products (name, description)
    VALUES ('".$_POST["name"]."', '".$_POST["description"]."')";
   
  }

  if (mysqli_query($conn, $sql)) {
    echo "Data updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
 
}
if(isset($_GET['id']) && $_GET['id'] != '')
{
  $sql = "SELECT * FROM products where id = ".$_GET['id']."";
  $result = mysqli_query($conn, $sql);
  $prodDet = mysqli_fetch_assoc($result);  
}
 
?>
 
<div class="container">
  <h3>Add Product</h3>

  <form method="POST" action="">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="<?= isset($prodDet['name'])?$prodDet['name']:'' ?>">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description"><?= isset($prodDet['description'])?$prodDet['description']:'' ?></textarea>
  </div>
   
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
 
</div>

<?php
include "_parts/footer.php";
?>