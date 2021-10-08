<?php
class StripePayment implements PaymentMethod
{
    public function charge()
    {
        $charge = null;
        \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
        $token = $_POST['stripeToken'];
        $totAmt = (int)$_POST['totalAmt']*100;

        try {
            $charge = \Stripe\Charge::create([
                'amount' => (int)$totAmt,
                'currency' => 'inr',
                'description' => 'Example charge',
                'source' => $token,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
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
        return $charge;
    }
}
