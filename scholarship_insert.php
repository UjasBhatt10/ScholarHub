<?php
include 'adminLTE_db.php';
$name = $_POST['name'];
$detail = $_POST['detail'];
$link = $_POST['link'];

/* echo "<pre>";
var_dump($name);
var_dump($detail);
var_dump($file['name']);
print_r($_POST);
print_r($_FILES);
exit; */

if (empty($name) || empty($detail) || empty($link)) {
    echo 0;
} else if (!empty($name) && !empty($detail) && !empty($link)) {
    $sql = "INSERT INTO scholarship (name_scholarship, detail_scholarship, link_scholarship) VALUES ('" . $name . "','" . $detail . "', '" . $link . "' )";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 1;
    }
}
?>