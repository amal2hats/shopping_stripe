<?php

class Products extends Model
{
    public function get($id=0)
    {
        if ($id == 0) {
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);
            return $result->fetchAll();
        } else {
            $sql = "SELECT * FROM products where id = ".$id;
            $result = $this->conn->query($sql);
            return $result->fetch();
        }
    }
    public function set()
    {
        $sql = "INSERT INTO products (name, price, description) VALUES ('".$_POST["name"]."','".$_POST["price"]."' ,'".$_POST["description"]."')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function update($id)
    {
        $sql = "UPDATE products SET name='".$_POST["name"]."',price='".$_POST["price"]."' ,description = '".$_POST["description"]."' WHERE id=".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
