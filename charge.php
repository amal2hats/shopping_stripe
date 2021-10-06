<?php 
include "_parts/header.php"; 
$ordObj = new Order_model(); 

\Stripe\Stripe::setApiKey('sk_test_51J6wDiSGYK0hiF7IsHuoFviDn05HlQi5Y3aYqj4sHSsHtoBlNcenMOhaNEGmQ0lXcw1MPgMTObUQ2qcEPd5CVjrF005jZvDXsj');

// Token is created using Stripe Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$totAmt = (int)$_POST['totalAmt']*100; 
$login_user = $_POST['login_user'];

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
        $ordObj->setOrder($login_user,$charge->id,$charge->status,json_encode($charge),json_encode($_SESSION['cart']),(int)$_POST['totalAmt']); 
        unset($_SESSION['cart']);
        header("Location: index.php");
        die();
  }

?>