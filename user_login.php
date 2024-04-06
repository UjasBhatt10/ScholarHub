<?php
include 'adminLTE_db.php';
$email = $password = '';
$emailErr = $pwdErr = '';
session_start();
if(isset($_POST['submit'])){
  $email = $_POST['email']; 
  $password = $_POST['password'];
  $hash = $password;

if(!empty($email)){
 
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if($row == null || $email != $row['email'])
  {
    $emailErr = "<div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Error!</strong> User does not exist. 
    </div>";
  }else{
  if($hash != $row['password'])
  {
    $pwdErr = "<div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Error!</strong>Enter valid password. 
    </div>";
  }else{
    $_SESSION['fullname'] = $row['firstname']." ".$row['lastname'];
    $_SESSION['id'] = $row['id_role'];
    $_SESSION['email'] = $row['email'];
    
    header("Location: dashboard.php ");   
    exit(); 
  }
}
}else{
  $emailErr =  "<div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Error!</strong> Enter email address. 
    </div>";
}
}
if(isset($_SESSION['fullname'])) {
  header("Location:dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>User</b>Login</a>
  </div>
  <p class="error" id="p1"><?php echo $emailErr ?></p>
  <p class="error" id="p1"><?php echo $pwdErr ?></p>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $email ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo $password ?>">
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
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot_password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
      <p class="mb-0">
        <a href="login.php" class="text-center">If you are Admin than login here</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
