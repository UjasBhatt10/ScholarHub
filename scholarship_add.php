<?php include 'sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Scholarship</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Scholarship</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Scholarship</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="scholarship_name">Scholarship Name</label>
                                            <input type="text" name="scholarship_name" class="form-control"
                                                id="scholarship_name" placeholder="Enter Scholarship Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label>Scholarship Detail</label>
                                            <textarea class="form-control" name="scholarship_detail"
                                                id="scholarship_detail" rows="3"
                                                placeholder="Enter Scholarship Detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="scholarship_link">Website Link</label>
                                            <input type="text" name="scholarship_link" class="form-control"
                                                id="scholarship_link" placeholder="Enter Website Link">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="submit" id="submit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="plugins\jquery\jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#submit").on("click", function (e) {
            e.preventDefault();
            var name = $('#scholarship_name').val();
            var detail = $('#scholarship_detail').val();
            var link = $('#scholarship_link').val();
            //console.log(image);
            if (link == "" || detail == "" || name == "") {
                alert('Please Enter All Information');
            }
            else {
                const formData = new FormData();
                formData.append('name', name);
                formData.append('detail', detail);
                formData.append('link', link);
                $.ajax(
                    {
                        url: "scholarship_insert.php",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log("Data is", data);
                            if (data == 0) {
                                alert("can't insert data");
                            } else if (data == 1) {
                                alert("Data inserted successfully");
                                $("#quickForm").trigger("reset");
                            }
                        }
                    });
            }
        });
    });

</script>
<?php include 'footer.php' ?>