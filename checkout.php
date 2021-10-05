<?php 
include "_parts/header.php";

$stripe = new \Stripe\StripeClient([
    "api_key" => "sk_test_51J6wDiSGYK0hiF7IsHuoFviDn05HlQi5Y3aYqj4sHSsHtoBlNcenMOhaNEGmQ0lXcw1MPgMTObUQ2qcEPd5CVjrF005jZvDXsj",
    "stripe_version" => "2020-08-27"
  ]);  

$userObj = new Users_model(); 
if(isset($_SESSION['login_user'])){ 
        $userDetails = $userObj->getUser($_SESSION['login_user']);
  }else{
    header("Location: user.php");
    die();
  }
?> 

  
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51J6wDiSGYK0hiF7IbeV88DBGKkuBGRTlHSVMYyKXmuDVkQ4gGJyFuGGC4VPKI7shhu2estOPqBZgy3cNJM0yFCDw00d1LFQj8L');
    var elements = stripe.elements();
    
</script>

<div class="jumbotron text-center">
  <h1>The Shopping Stripe</h1>
  <p>Checkout page</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-12">
         

      <div class="col-md-6">
          <h2>Shipping address</h2>
            <form action="charge.php" method="post" id="payment-form">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="<?= $userDetails['name'] ?>">
            </div>
            
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="phone" value="<?= $userDetails['phone'] ?>">
            </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <textarea class="form-control" name="address" name="address"><?= $userDetails['address'] ?></textarea>
            </div>


            <div class="form-row">
                <label for="card-element">
                Credit or debit card
                </label>
                <div id="card-element"> 
                </div> 
                <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button> 
          </form>
      </div>

    </div>
  </div>
</div> 
</body>

<script> 
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

</script>
 
<script> 
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>
 
</html>



