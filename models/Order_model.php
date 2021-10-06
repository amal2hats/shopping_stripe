<?php

class Order_model extends Model
{
    public function setOrder($login_user,$txn_id,$payment_status,$payment_response,$products,$totalAmt){

        $sql = "INSERT INTO `orders` (`user_id`, `txn_id`, `payment_status`, `payment_response`,`products`,`total_amount`) 
        VALUES ('".$login_user."', '".$txn_id."', '".$payment_status."', '".$payment_response."', '".$products."', '".$totalAmt."')";
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute();  
        
    }
}

?>