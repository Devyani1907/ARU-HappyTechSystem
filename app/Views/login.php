<?php
// if($errorMessage)
// {
//   echo json_encode($errorMessage);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="/" style=" font-weight: bold;color: #26a7df;"><img class="animation__shake" src="dist/img/HappyTechLogoWatermark.png" alt="HappyTechLogo" height="70" width="90">HappyTech</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="/EmployeeController/CheckLoginCrendentials" method="post">
        <div class="input-group mb-3">
          <input type="email"  name="username" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        </div>
      
      <div class="social-auth-links text-center mb-3">
        <div class="col-12">
         <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
      </div>
      </form>
      <p class="mb-1">
        <a href="/forgot-password">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="/registration" class="text-center">Register a new membership</a>
      </p>
    </div>
  </div>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
