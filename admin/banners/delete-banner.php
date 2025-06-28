<?php
include "../../database/connect.php";
$id = $_GET['id'];

$get_sql = "SELECT * FROM banners where id=$id";

$get_result = mysqli_query($conn, $get_sql);

if (mysqli_num_rows($get_result) == 0) {
    header("location:banner.php");
} else {
    $delete_sql = "DELETE FROM banners WHERE id=$id";

    $banner=mysqli_fetch_assoc($get_result);
    unlink("../../uploads/" . $banner['image']);

    $delete_result = mysqli_query($conn, $delete_sql);
    header("location:banner.php");

}
?>