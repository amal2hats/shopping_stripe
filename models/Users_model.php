<?php

class Users_model extends Model{
 
 
  public function getUserLogin()
  {
    $sql = "SELECT * FROM users where phone = '".$_POST["phone"]."' and password = '".$_POST["password"]."'";
    $result = $this->conn->query($sql);
    return $result->fetch(); 
  }

  public function getUser($id)
  {
    $sql = "SELECT * FROM users where id = '".$id."'";
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