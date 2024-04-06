<?php
include 'sidebar.php';
?>
        <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>500 Error Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">500 Error Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">500</h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Access Denied.</h3>

          <p>
            You can not access this page it is only for Admin.
            Meanwhile, you may <a href="dashboard.php">return to dashboard</a>.
          </p>

          
      </div>
      <!-- /.error-page -->

    </section>
    
<?php include 'footer.php'; ?>