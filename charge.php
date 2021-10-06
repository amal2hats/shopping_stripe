<?php 
include "templates/header.php"; 
include "config.php";
$orders = new Order();  
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY); 
$token = $_POST['stripeToken'];
$totAmt = (int)$_POST['totalAmt']*100; 
$login_user = $_SESSION['login_user'];

try {
    $charge = \Stripe\Charge::create([
        'amount' => (int)$totAmt*100,
        'currency' => 'inr',
        'description' => 'Example charge',
        'source' => $token,
      ]);
  } catch(\Stripe\Exception\CardException $e) { 
    echo 'Payment failed:' . $e->getError()->message . "\n";
  } catch (\Stripe\Exception\InvalidRequestException $e) {
    echo 'Payment failed:' . $e->getError()->message . "\n";
  } catch (\Stripe\Exception\AuthenticationException $e) {
    echo 'Payment failed:' . $e->getError()->message . "\n";
  } catch (\Stripe\Exception\ApiConnectionException $e) {
    echo 'Payment failed:' . $e->getError()->message . "\n";
  } catch (\Stripe\Exception\ApiErrorException $e) {
    echo 'Payment failed:' . $e->getError()->message . "\n";
  } catch (Exception $e) {
    echo 'Payment failed';
  }

  if($charge == null)
  {
      echo 'Payment failed';
  }else{
        $orders->setOrder($login_user,$charge->id,$charge->status,json_encode($charge),json_encode($_SESSION['cart']),(int)$_POST['totalAmt']); 
        unset($_SESSION['cart']); 
        header("Location: index.php");
        die();
  }

?>