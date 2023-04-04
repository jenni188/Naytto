<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/my.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Hallavan Art</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Order form</a>
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
<div class="container-fluid" >
    <div class="row">
        <div class="col moikka" >
        1 of 2
        </div>
  </div>
  <div class="row ">
    <div class="col-sm " id="radio-buttons">
      One of three columns
        <div>
          <input class="form-check-input" type="radio"  checked="" name="optionsradio" id="all" value="all">
          <label class="form-check-label" for="optionsradio1" >Show All</label>
        </div>
    </div>
    <div class=" col-sm-12 col-lg-8" id="order-col">
      One of three columns
      tänne tuotteet
      <div class="row" id="order-row">
        <div></div>
      </div>
    </div>
    <div class="col-sm moi">
      One of three columns
    </div>
  </div>
</div>
</div>
</body>
<script src="js/index.js" defer></script>
<script src="js/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>