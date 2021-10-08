<?php
include "templates/header.php";
$users = new Users();
if (isset($_SESSION['login_user'])) {
    $userDetails = $users->get($_SESSION['login_user']);
} else {
    header("Location: user.php");
    die();
}
?>

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
            <input type="text" class="form-control" name="name"
              value="<?= $userDetails['name'] ?>">
          </div>

          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone"
              value="<?= $userDetails['phone'] ?>">
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" name="address"
              name="address"><?= $userDetails['address'] ?></textarea>
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

<script src="assets/js/checkout.js"></script>
</body>

</html>