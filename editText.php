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
          <a class="nav-link " href="index.php">Home
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
<div class="container-fluid" >
    <div class="row">
        <div class="col moikka" >
        </div>
  </div>
  <div class="row ">
    <div class="col-3 moi ">
    </div>
    <div class="col-6" id="order-col">
        <form name="editText" >
        <input type="hidden" name="id">
              <fieldset>
                <h3>Edit Text</h3>
            <div class="form-group">

                <label for="heading" class="form-label mt-4">Heading</label>
                <input name="heading" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="text" class="form-label mt-4">Text</label>
                <textarea  name="text" type="text"  class=" row-3 form-control" rows="5"></textarea>
            </div>
            </fieldset>
            <button type="submit" class="btn btn-primary mt-3" id="reg-btn">Save Text Changes</button>
        </form>
    </div>
    <div class="col-3 moi">
    </div>
  </div>
</div>
</body>
<script src="js/editText.js"></script>
<script src="js/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>