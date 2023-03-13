<?php
?>
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
          <a class="nav-link active" href="#">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Order form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container container-1" >
  <div class="row ">
    <div class="col-3 moi ">
      One of three columns
    </div>
    <div class="col-6" id="order-col">
      One of three columns
      <form name="orderForm" method="POST">
  <fieldset>
    <legend>Order Form</legend>
    <div class="form-group">
        <label for="fname" class="form-label mt-3">First name</label>
        <input type="text" id="fname" name="fname" class="form-control" placeholder="First name">
    </div>
    <div class="form-group">
        <label for="lname" class="form-label mt-3">Last name</label>
        <input type="text" id="lfname" name="lname" class="form-control" placeholder="Last name">
    </div>
    <div class="form-group">
        <label for="pnumber" class="form-label mt-3">Phone number</label>
        <input type="tel" id="pnumber" name="pnumber" class="form-control" placeholder="Phone number">
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
                    <button class="btn btn-primary btn-sm float-end mt-2" id="addProduct">Delete product</button>
                </div>
            </div>
        </div>
        <div class="col">
            col two
            <div class="form-group">
                <label for="select" class="form-label">Payment method</label>
                <select class="form-select" id="select">
                    <option>Bank Transfer</option>
                    <option>MobilePay</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="Product1" class="form-label mt-3">Product 1</label>
                <input name="Product1"type="text" class="form-control" placeholder="Product 1">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="amount1" class="form-label mt-3">Amount</label>
                <input name="amount1"type="number" class="form-control" placeholder="Amount 1">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" id="sendOrder">Send order</button>
  </fieldset>
</form>
    </div>
    <div class="col-3 moi">
      One of three columns
    </div>
  </div>
</div>
</body>
<script src="js/order.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>