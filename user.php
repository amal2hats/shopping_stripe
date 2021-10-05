<?php 
include "_parts/header.php";
 
$userObj = new Users_model(); 

if(isset($_GET['logout'])){
 
   session_unset();

}

if(isset($_SESSION['login_user'])){
 
  header("Location: index.php");
  die();

}

if(isset($_POST['login'])){
 
  $user = $userObj->getUser(); 
  
  if($user!=false)
  {
    $_SESSION['login_user'] = $user['id'];
  }

}

if(isset($_POST['register'])){
 
  $userObj->setUser();

}


?>


<div class="jumbotron text-center">
  <h1>The Shopping Stripe</h1>
  <p>Cart page</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
          <h2>Login</h2>
            <form action="" method="POST">
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="number" class="form-control" name="phone">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password">
            </div>
          
            <button type="submit" name="login" class="btn btn-default">Login</button>
          </form>
      </div>

      <div class="col-md-6">
          <h2>Register</h2>
            <form action="" method="POST">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name">
            </div>
            
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="number" class="form-control" name="phone">
            </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <textarea class="form-control" name="address" name="address"></textarea>
            </div>
 
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password">
            </div>
           
            <button type="submit" name="register" class="btn btn-default">Register</button>
          </form>
      </div>

    </div>
  </div>
</div> 
</body>
</html>