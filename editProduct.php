<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navi">
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
        <?php if (isset($_SESSION['logged_in'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="homeAdmin.php">Home admin</a>	
          </li>
        <?php endif; ?> 
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
    </div>
    <div class="col-6" id="order-col">
      <form name="editProduct" action="editProduct.php" method="POST" enctype="multipart/form-data" >
      <input type="hidden" name="id">
        <fieldset>
            <legend>Edit Product</legend>
            <div class="form-group">
                <label for="p-name" class="form-label mt-3">Product Name</label>
                <input type="text" id="p-name" name="p-name" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label for="p-price" class="form-label mt-3">Product Price</label>
                <input type="number" id="p-price" name="p-price" class="form-control" placeholder="Product Price">
            </div>
            <div class="form-group">
                <label for="p-code" class="form-label mt-3">Product code</label>
                <input type="number" id="p-code" name="p-code" class="form-control" placeholder="Product Code">
            </div>
            <div class="form-group">
                <label for="p-category" class="form-label mt-3">Product Category</label>
                <input type="text" id="p-category" name="p-category" class="form-control" placeholder="Product Category">
            </div>
            <div class="form-group">
            <label for="p-img" class="form-label mt-3">Product Image (Current)</label>
            <img id="product-image"  class="img-thumbnail" />
            <input name="p-img" type="file" class="form-control" id="p-img" placeholder="Product Image">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary mt-3">Save Product</button>
      </form>
    </div>
    <div class="col-3 moi">
    </div>
  </div>
</div>
</body>
<script src="js/editProduct.js"></script>
<script src="js/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>