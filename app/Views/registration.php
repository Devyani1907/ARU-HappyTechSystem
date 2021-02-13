<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="col-10 pt-4">
  <div class="register-logo">
    <a href="/" style=" font-weight: bold;color: #26a7df;"><img class="animation__shake" src="dist/img/HappyTechLogoWatermark.png" alt="HappyTechLogo" height="70" width="90">HappyTech</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

        <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 latest-job ">
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="First Name *" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="lname" name="lname" placeholder="Last Name *" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email *" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
                </div>
                <div class="form-group">
                    <label>Passing Year</label>
                    <input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
                </div>       
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="stream" name="stream" placeholder="Stream">
                </div>                    
                <!-- <div class="form-group checkbox">
                    <label><input type="checkbox"> I accept terms & conditions</label>
                </div> -->
                </div>            
                <div class="col-md-6 latest-job ">
                <div class="form-group">
                    <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
                </div>
                
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State">
                </div>
                <div class="form-group">
                    <textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
                </div>              
                <div class="form-group">
                    <input class="form-control input-lg" type="text" id="designation" name="designation" placeholder="Designation">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>
            </div>
        </form>

      <div class="social-auth-links text-center">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
      </div>

      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
