<?php

class Model
{
    public $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "2hatslogic";
        $dbname = "shopping_stripe";
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connection success";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

  ?>