<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hallavan Art</title>
    <link rel="stylesheet" href="css/my.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary " id="nav-reg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Hallavan Art</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor01">
          </div>
        </div>
      </nav>
      
      <div class="container">
        <div id="msg" class="alert alert-dismissible alert-danger d-none">
          <h4 class="alert-heading">Warning!</h4>
          <p class="mb-0"></a></p>
        </div>
        <div class="row">
          <div class="col-3">
          </div>
          <div class="col-5 " id="order-col">
            <form name="login">
            <h3>Login</h3>
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input name="username" type="text" class="form-control" placeholder="Username" />
                    <label class="form-label" for="username">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="password" type="password"  class="form-control"  placeholder="Password"/>
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block rounded " id="log-btn">Log in</button>
                  </div>

                </form>
          </div>
          <div class="col-3" >
          </div>
        </div>
      </div>
    <script src="js/common.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>