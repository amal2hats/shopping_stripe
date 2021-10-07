<?php

class Order extends Model
{
    public function set($login_user, $txn_id, $payment_status, $payment_response, $products, $totalAmt)
    {
        $sql = "INSERT INTO `orders` (`user_id`, `txn_id`, `payment_status`, `payment_response`,`products`,`total_amount`) 
        VALUES ('".$login_user."', '".$txn_id."', '".$payment_status."', '".$payment_response."', '".$products."', '".$totalAmt."')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function get($id=0)
    {
        if ($id == 0) {
            $sql = "SELECT orders.*,users.name FROM `orders` join users on(users.id = orders.user_id);";
            $result = $this->conn->query($sql);
            return $result->fetchAll();
        } else {
            $sql = "SELECT orders.*,users.name FROM `orders` join users on(users.id = orders.user_id) WHERE orders.id = ".$id;
            $result = $this->conn->query($sql);
            return $result->fetch();
        }
    }
}
