<?php
include 'adminLTE_db.php';
$id = $_POST['id'];
$select = "select * from scholarship where id_scholarship='$id'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);

$delete = "delete from scholarship where id_scholarship='$id'";
$del = mysqli_query($conn, $delete);

if ($del) {
    mysqli_close($conn);
    echo 1;
}