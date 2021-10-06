<?php
include "_parts/header.php"; 
 
$prodObj = new Products_model();
$products = $prodObj->getProducts();
 
if(isset($_POST['submit']))
{

  if(isset($_GET['id']) && $_GET['id'] != '')
  {
    $$prodObj->updateProduct($_GET['id']); 
  }else{
    $prodObj->setProducts(); 
  }
  
}
if(isset($_GET['id']) && $_GET['id'] != '')
{ 
  $prodDet = $prodObj->getProduct($_GET['id']);
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
    <label for="price">Price</label>
    <input type="number" name="price" class="form-control" id="price" value="<?= isset($prodDet['price'])?$prodDet['price']:'' ?>">
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