<?php

class Order_model extends Model
{
    public function setOrder($login_user,$txn_id,$payment_status,$payment_response,$products,$totalAmt){

        $sql = "INSERT INTO `orders` (`user_id`, `txn_id`, `payment_status`, `payment_response`,`products`,`total_amount`) 
        VALUES ('".$login_user."', '".$txn_id."', '".$payment_status."', '".$payment_response."', '".$products."', '".$totalAmt."')";
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute();  
        
    }
    public function getOrders(){

        $sql = "SELECT orders.*,users.name FROM `orders` join users on(users.id = orders.user_id);";
        $result = $this->conn->query($sql);
        return $result->fetchAll(); 
        
    }
    public function getOrder($id){

        $sql = "SELECT orders.*,users.name FROM `orders` join users on(users.id = orders.user_id) WHERE orders.id = ".$id;
        $result = $this->conn->query($sql);
        return $result->fetch(); 
        
    }
}

?>