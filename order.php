<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/my.css">
    <title>Document</title>
</head>

<body class= "order-b">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Hallavan Art</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="order.php">Order form</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <?php if (isset($_SESSION['logged_in'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="aboutAdmin.php">about admin</a>	
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['logged_in'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="homeAdmin.php">Home admin</a>	
          </li>
        <?php endif; ?>  
        <?php if (isset($_SESSION['logged_in'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>	
          </li>
        <?php endif; ?> 
      </ul>
    </div>
  </div>
  <?php if (isset($_SESSION['logged_in'])): ?>
      <div>
        <p class="login-p">Logged in user: <?php echo $_SESSION['username']?></p>
      </div>
  <?php endif; ?> 
</nav>
<div id="msg" class="alert alert-dismissible alert-danger d-none">
    <h4 class="alert-heading">Warning!</h4>
    <p class="mb-0"></a></p>
</div>
<div class="container container-1" >
  <div class="row ">
    <div class="col-3 moi ">
      One of three columns
    </div>
    <div class="col-6" id="order-col">
      One of three columns
      <form name="orderForm" action="backend/readOrder.php"method="POST">
  <fieldset>
    <legend>Order Form</legend>
    <div class="form-group">
        <label for="fname" class="form-label mt-3">First name</label>
        <input type="text" id="fname" name="fname" class="form-control" placeholder="First name">
    </div>
    <div class="form-group">
        <label for="lname" class="form-label mt-3">Last name</label>
        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name">
    </div>
    <div class="form-group">
        <label for="pnumber" class="form-label mt-3">Phone number</label>
        <input type="tel"  id="pnumber" name="pnumber" class="form-control" placeholder="+3589387569">
    </div>
    <div class="form-group">
      <label for="email" class="form-label mt-3">Email address</label>
      <input name="email"type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="row">
        <div class="col">
            col one
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm float-end mt-2" id="addProduct">Add new product</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-sm float-end mt-2" id="deleteProduct">Delete product</button>
                </div>
            </div>
        </div>
        <div class="col">
            col two
            <div class="form-group">
                <label for="select" class="form-label">Payment method</label>
                <select class="form-select" id="payment">
                    <option>Bank Transfer</option>
                    <option>MobilePay</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="product1" class="form-label mt-3">Product 1</label>
                <input name="product1"type="number"  min="1" class="form-control" placeholder="Product 1">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="amount1" class="form-label mt-3">Amount</label>
                <input name="amount1"type="number"  min="1" class="form-control" placeholder="Amount 1">
            </div>
        </div>
    </div>
  </fieldset>
  <button type="submit" class="btn btn-primary" id="sendOrder">Send order</button>
</form>
    </div>
    <div class="col-3 moi">
      One of three columns
    </div>
  </div>
</div>
</body>
<script src="js/order.js"></script>
<script src="js/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>