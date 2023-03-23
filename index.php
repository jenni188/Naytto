<?php
?>
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
      </ul>
    </div>
  </div>
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
    <div class="col-sm moi ">
      One of three columns
      <div class="form-check">
          <input class="form-check-input" type="radio" name="optionsRadios" checked="" onclick="showProducts('all')">
          <label class="form-check-label" for="optionsRadios1">Show All</label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="optionsRadios" onclick="showProducts('paintings')">
          <label class="form-check-label" for="optionsRadios2">Show Paintings</label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="optionsRadios" onclick="showProducts('cards')">
          <label class="form-check-label" for="optionsRadios3">Show Cards</label>
      </div>
    </div>
    <div class="col-8" id="order-col">
      One of three columns
      <div class="row " id="productRow">
        <div class="col product-col moi">
            <div class="row img-row">
              <div class="col kuva-col moi">
                tänne kuva
                <img src="" alt="">
              </div>
            </div>
            <div class="row info-row">
              <div class="col info-col moi">
                 tänne tiedot li elementteihin
                <ul class="product-ul">
                  li elementit
                </ul>
              </div>
            </div>
        </div>
        <div class="col moi">
            one of 4
        </div>
        <div class="col moi">
            one of 4
        </div>
        <div class="col moi">
            one of 4
        </div>
      </div>
    </div>
    <div class="col-sm moi">
      One of three columns
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col moi">
      col 1
      <table class="table">
        <thead>
        <tbody>
        <tr>
          <th scope="col">koira</th>
          <th scope="col">kissa</th>
          <th scope="col">kani</th>
        </tr>
        </thead>
        <tr>
          <td>hinta 1e</td>
          <td>hinta 13e</td>
          <td>hinta 14e</td>
        </tr>
        <tr>
          <td>koodi 21</td>
          <td>koodi 44</td>
          <td>koodi</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
<script src="js/index.js"></script>
<script src="js/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>