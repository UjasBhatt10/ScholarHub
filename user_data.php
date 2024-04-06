<?php
include 'sidebar.php';
$sql = "SELECT users.id_user,users.firstname,users.email,roles.role FROM users left join roles on users.role = roles.id_role";
$result = mysqli_query($conn, $sql);
?>
<style>
  table {
    text-align: center;
  }
</style>
<!-- Preloader -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Table</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data</h3>
              <ol class="float-sm-right">
                <a href="<?php if ($info['role'] == 'Admin' || $info['role'] == 'Manager') {
                  echo "user_add.php";
                } else {
                  echo "disable_error.php";
                } ?>" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>Add Users
                </a>
              </ol>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <?php if ($info['role'] == 'Admin') { ?>
                      <th colspan='2'>Action</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                    $i = 1;
                    ?>
                    <tr>
                      <td>
                        <?php echo $row['id_user'] ?>
                      </td>
                      <td>
                        <?php echo $row['firstname'] ?>
                      </td>
                      <td>
                        <?php echo $row['email'] ?>
                      </td>
                      <td>
                        <?php echo $row['role'] ?>
                      </td>
                      <?php if ($info['role'] == 'Admin') { ?>
                        <td><a href="edit.php"><img src="download.png" title="Edit" width="18px"></a></td>
                        <td><a href="delete.php"><img src="3405244.png" title="Delete" width="20px"></a></td>
                      <?php } ?>
                    </tr>
                    <?php $i++;
                  } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './footer.php'; ?>