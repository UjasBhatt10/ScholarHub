<?php
include 'sidebar.php';
$fullname = $password = $confirmPassword = $email = $select = "";
$fnameErr = $emailErr = $pwdErr = $cpweErr = $selectErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fullname"])) {
    $fnameErr = "Please enter full name";
  } else {
    $fullname = $_POST["fullname"];
  }

  function checkemail($str)
  {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
  }

  if (empty($_POST["email"])) {
    $emailErr = "Please enter email address";
  } else if (!checkemail($_POST["email"])) {
    $email = $_POST["email"];
    $emailErr = "Please enter valid email address";
  } else {
    $email = $_POST["email"];
  }

  if (empty($_POST["pwd"]) && empty($_POST["cpwd"])) {
    $pwdErr = "Please enter password";
    $cpweErr = "Please enter confirm password";
  }
  if (!empty($_POST["pwd"])) {
    if (strlen($_POST["pwd"]) < 6) {
      $password = $_POST["pwd"];
      $pwdErr = "Password must be at least 6 characters long!";
    } elseif (!preg_match('@[A-Z]@', $_POST["pwd"])) {
      $password = $_POST["pwd"];
      $pwdErr = "Password must contain at least one uppercase letter!";
    } elseif (!preg_match('@[a-z]@', $_POST["pwd"])) {
      $password = $_POST["pwd"];
      $pwdErr = "Password must contain at least one lowercase letter!";
      $cpwdeErr = "Please enter confirm password";
    } elseif (!preg_match('@[^\w]@', $_POST["pwd"])) {
      $password = $_POST["pwd"];
      $pwdErr = "Password must contain at least one special character!";
    } elseif (!preg_match('@[0-9]@', $_POST["pwd"])) {
      $password = $_POST["pwd"];
      $pwdErr = "Password must contain at least one number!";
    } else {
      $password = $_POST["pwd"];
    }
  } else {
    $cpweErr = "Please enter confirm password";
  }

  if (empty($_POST["cpwd"])) {
    $cpweErr = "Please enter confirm password";
  } elseif ($_POST["pwd"] != $_POST["cpwd"]) {
    $cpweErr = "Password and Confirm Password not same!";
  } else {
    $confirmPassword = $_POST["cpwd"];
  }

  if (empty($_POST['select']) || $_POST['select'] == '0') {
    $selectErr = "Please select role";
  } else {
    $select = $_POST['select'];
  }
  $hash = md5($password);
  if ($fnameErr == "" && $pwdErr == "" && $cpweErr == "" && $emailErr == "" && $selectErr == "") {
    $sql = "INSERT INTO users (role ,firstname, email, password) VALUES ('" . $select . "' , '" . $fullname . "', '" . $email . "', '" . $hash . "')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_error($conn)) {
      echo "Data Not Inserted";
    } else {
      echo '<script>alert("User Added Successfully");
      window.location="user_data.php"</script>';
    }

  }
}
$role = "SELECT * FROM roles";
$result1 = mysqli_query($conn, $role);
if ($result1->num_rows > 0) {
  $options = mysqli_fetch_all($result1, MYSQLI_ASSOC);
}


?>
<style>
  .button {
    align-items: center;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add User</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Add New User</p>

      <form id="register" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full name"
            value="<?php echo $fullname; ?>">
        </div>
        <p class="error" id="f1">
          <?php echo $fnameErr; ?>
        </p>

        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email"
            value="<?php echo $email; ?>">
        </div>
        <p class="error" id="e1">
          <?php echo $emailErr ?>
        </p>

        <div class="input-group mb-3">
          <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password"
            value="<?php echo $password; ?>">
        </div>
        <p class="error" id="p1">
          <?php echo $pwdErr ?>
        </p>

        <div class="input-group mb-3">
          <input type="password" name="cpwd" id="cpwd" class="form-control" placeholder="Retype password"
            value="<?php echo $confirmPassword; ?>">
        </div>
        <p class="error" id="p2">
          <?php echo $cpweErr ?>
        </p>

        <div class="input-group mb-3">
          <select name="select" class="form-control">
            <option value="0">Select Role</option>
            <?php
            foreach ($options as $option) {
              ?>
              <option value="<?php echo $option['id_role']; ?>">
                <?php echo $option['role']; ?>
              </option>

              <?php
            }
            ?>
          </select>
        </div>
        <p class="error" id="p2">
          <?php echo $selectErr ?>
        </p>


        <div class="row">
          <div class="col-2">
            <button type="submit" name="button" class="btn btn-primary btn-block">Add User</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php include 'footer.php' ?>