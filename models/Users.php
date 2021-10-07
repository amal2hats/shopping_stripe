<?php

class Users extends Model
{
    public function getUserLogin()
    {
        $sql = "SELECT * FROM users where phone = '".$_POST["phone"]."' and password = '".$_POST["password"]."'";
        $result = $this->conn->query($sql);
        return $result->fetch() ?: [];
    }

    public function get($id)
    {
        $sql = "SELECT * FROM users where id = '".$id."'";
        $result = $this->conn->query($sql);
        return $result->fetch() ?: [];
    }
 
    public function set()
    {
        $data = array('name'=>$_POST["name"],'phone'=>$_POST["phone"],'address'=>$_POST["address"],'password'=>$_POST["password"]);
        $sql = "INSERT INTO users (name, phone, address,password) VALUES (:name,:phone,:address,:password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}
