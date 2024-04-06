<?php
include 'adminLTE_db.php';
$id = $_POST['id'];
$select = "select * from scholarship where id_scholarship='$id'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$succ = "";
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Scholarship</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">Scholarship Apply</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Apply for Scholarship</h3>
                    </div>

                    <form id="quickForm" method="POST" enctype="multipart/form-data"
                        onSubmit="window.location.reload()">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="scholarship_name">Scholarship Name</label>
                                        <input type="text" name="scholarship_name" class="form-control"
                                            id="scholarship_name" placeholder="Enter Scholarship Name"
                                            value="<?php echo $row['name_scholarship'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id_scholarship" class="form-control" id="id_scholarship"
                                        placeholder="Enter Scholarship Name" value="<?php echo $id ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Scholarship Detail</label>
                                        <textarea disabled class="form-control" name="scholarship_detail"
                                            id="scholarship_detail" rows="3"
                                            placeholder="Enter Scholarship Detail"><?php echo htmlspecialchars($row['detail_scholarship']) ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="scholarship_link">Scholarship Name</label>
                                        <input type="text" name="scholarship_link" class="form-control"
                                            id="scholarship_link" placeholder="Enter Scholarship Link"
                                            value="<?php echo $row['link_scholarship'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <a href="application.php" class="button">Apply Now</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>