<?php
include 'adminLTE_db.php';
session_start();
$info = $_SESSION['info'];
$fullname = $info['fullname'];
if (!isset ($fullname)) {
    header("Location: login.php");
}

$output = "<table id='example1' class='table table-bordered table-striped'>
<thead>
    <tr>
    <th>Id No.</th>
    <th>Name</th>
    <th>Detail</th>
    <th>Link</th>";
if ($info['role'] == 'Admin') {
    $output .= "<th colspan='2'>Action</th>";
}
$output .= "</tr>
    </thead>
    <tbody>";
$sql = "SELECT * FROM scholarship";
$result = mysqli_query($conn, $sql);
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    $output .= "<tr>
                    <td>{$i}</td>
                    <td>{$row['name_scholarship']}</td>
                    <td>{$row['detail_scholarship']}</td>
                    <td>{$row['link_scholarship']}</td>";
    if ($info['role'] == 'Admin') {
        $output .= "<td><button class='edit_button' data-eid='{$row['id_scholarship']}'>Edit</button></td>
                    <td><button class='delete_button' data-id='{$row['id_scholarship']}'>Delete</button></td>";
    } else {
        $output .= "<td><button class='view_button' data-vid='{$row['id_scholarship']}'>View Details</button></td>";
    }
    $output .= "</tr>";
    $i++;
}

$output .= "</tbody>
                </table>";
echo $output;
?>