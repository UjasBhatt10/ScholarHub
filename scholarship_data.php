<?php
include 'sidebar.php';
$sql = "SELECT * FROM scholarship";
$result = mysqli_query($conn, $sql);

?>
<style>
    table {
        text-align: center;
    }
</style>

<!-- Preloader -->
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" id="edit_data">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Scholarship Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Scholarship Data</li>
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
                                    echo "scholarship_add.php";
                                } else {
                                    echo "disable_error.php";
                                } ?>" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>Add Scholarship
                                </a>
                            </ol>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="table_data"></div>
                            <div></div>
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



<script type="text/javascript" src="plugins\jquery\jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        function tabledata() {
            $.ajax(
                {
                    url: "scholarship_print.php",
                    type: "GET",
                    success: function (data) {
                        $('#table_data').html(data);
                    }
                });
        }
        tabledata();

        $(document).on('click', '.edit_button', function () {
            var id_scho = $(this).data('eid');
            var ele = this;
            $.ajax({
                url: "scholarship_edit.php",
                type: "POST",
                data: { id: id_scho },
                success: function (data) {
                    $('#edit_data').html(data);
                    console.log(data);

                }
            });
        })

        $(document).on('click', '.view_button', function () {
            var id_scho = $(this).data('vid');
            var ele = this;
            $.ajax({
                url: "scholarship_apply.php",
                type: "POST",
                data: { id: id_scho },
                success: function (data) {
                    $('#edit_data').html(data);
                    console.log(data);

                }
            });
        })


        $(document).on('click', '.delete_button', function () {
            if (confirm('Are you sure you want to delete scholarship')) {
                var id_scho = $(this).data('id');
                var ele = this;
                $.ajax({
                    url: "scholarship_delete.php",
                    type: "POST",
                    data: { id: id_scho },
                    success: function (data) {
                        if (data == 1) {
                            //print(data);  It is use for print table data in pdf form
                            $(ele).closest("tr").fadeOut();
                            alert('scholarship deleted successfully');
                        } else {
                            //print(data);
                            alert('scholarship not deleted');
                        }
                    }
                });
            }
        });



    });

</script>

<?php include './footer.php'; ?>