<?php

class Users_model{

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
 
  public function getUser()
  {
    $sql = "SELECT * FROM users where phone = '".$_POST["phone"]."' and password = '".$_POST["password"]."'";
    $result = $this->conn->query($sql);
    return $result->fetch(); 
  }

  public function setUser()
  {
    
    $sql = "INSERT INTO users (name, phone, address,password)
    VALUES ('".$_POST["name"]."','".$_POST["phone"]."' ,'".$_POST["address"]."','".$_POST["password"]."')";
    $stmt = $this->conn->prepare($sql); 
    $stmt->execute();
  }
 

  
 
}
 
?>