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
                    <li class="breadcrumb-item active">Scholarship Edit</li>
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
                        <h3 class="card-title">Edit Scholarship</h3>
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
                                            value="<?php echo $row['name_scholarship'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id_scholarship" class="form-control" id="id_scholarship"
                                        placeholder="Enter Scholarship Name" value="<?php echo $id ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Scholarship Detail</label>
                                        <textarea class="form-control" name="scholarship_detail" id="scholarship_detail"
                                            rows="3"
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
                                            value="<?php echo $row['link_scholarship'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="plugins\jquery\jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit").on("click", function (e) {
            e.preventDefault();
            var id = $('#id_service').val();
            var name = $('#scholarship_name').val();
            var detail = $('#scholarship_detail').val();
            var link = $('#scholarship_link').val();
            const formData = new FormData();
            formData.append('id', id);
            formData.append('name', name);
            formData.append('detail', detail);
            formData.append('link', link);
            $.ajax(
                {
                    url: "scholarship_editdata.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log("DATA: " + data);
                        if (data == 1) {
                            alert("Scholarship updated successfully");
                            //echo 1;
                            window.location.reload();
                        }
                    }
                });
        });
    });


</script>