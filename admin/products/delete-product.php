<?php
include "../../database/connect.php";
$id = $_GET['id'];

$get_sql = "SELECT * FROM products where id=$id";

$get_result = mysqli_query($conn, $get_sql);

if (mysqli_num_rows($get_result) == 0) {
    header("location:product.php");
} else {
    $delete_sql = "DELETE FROM products WHERE id=$id";

    $product=mysqli_fetch_assoc($get_result);
    unlink("../../uploads/" . $product['image']);

    $delete_result = mysqli_query($conn, $delete_sql);
    header("location:product.php");

}
?>