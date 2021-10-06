<?php

class Products_model extends Model{ 
  public function getProducts()
  {
    $sql = "SELECT * FROM products";
    $result = $this->conn->query($sql);
    return $result->fetchAll(); 
  } 
  public function getProduct($id)
  {
    $sql = "SELECT * FROM products where id = ".$id;
    $result = $this->conn->query($sql);
    return $result->fetch(); 
  } 
  public function setProducts()
  {
    $sql = "INSERT INTO products (name, price, description)
    VALUES ('".$_POST["name"]."','".$_POST["price"]."' ,'".$_POST["description"]."')";
    $stmt = $this->conn->prepare($sql); 
     $stmt->execute();
  } 
  public function updateProduct($id)
  {
     $sql = "UPDATE products SET name='".$_POST["name"]."',price='".$_POST["price"]."' ,description = '".$_POST["description"]."' WHERE id=".$id; 
     $stmt = $this->conn->prepare($sql); 
     $stmt->execute();
  } 
} 
?>