<?php

class Products_model{

  public $conn;

  function __construct() {
      
      $servername = "localhost";
      $username = "root";
      $password = "2hatslogic";
      $dbname = "shopping_stripe"; 
      try {
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connection success";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
  }
 
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

  public function updateProducts($id)
  {
     $sql = "UPDATE products SET name='".$_POST["name"]."',price='".$_POST["price"]."' ,description = '".$_POST["description"]."' WHERE id=".$id; 
     $stmt = $this->conn->prepare($sql); 
     $stmt->execute();
  }



}

/*
 
if(isset($_POST['submit']))
{

  if(isset($_GET['id']) && $_GET['id'] != '')
  {
    $sql = "UPDATE products SET name='".$_POST["name"]."',price='".$_POST["price"]."' ,description = '".$_POST["description"]."' WHERE id=".$_GET['id'];
  }else{

    $sql = "INSERT INTO products (name, price, description)
    VALUES ('".$_POST["name"]."','".$_POST["price"]."' ,'".$_POST["description"]."')";
   
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
*/
?>