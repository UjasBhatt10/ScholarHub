<?php
include 'adminLTE_db.php';
$id = $_POST['id'];
$name = $_POST['name'];
$detail = $_POST['detail'];
$link = $_POST['link'];

$updateDate = Date("Y-m-d h:i:s");

$update = "UPDATE scholarship SET name_scholarship='" . $name . "',detail_scholarship='" . $detail . "',link_scholarship='" . $link . "',updated_at='" . $updateDate . "' WHERE id_scholarship='" . $id . "'";
$edit = mysqli_query($conn, $update);


if ($edit) {
    echo 1;
} else {
    echo 0;
}
exit;
?>