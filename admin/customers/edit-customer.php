<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add-Customer</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    <?php
    include "../../database/connect.php";
    $message = "";
    $id = $_GET['id'];
    $get_sql = "SELECT * FROM users where id=$id";

    $get_result = mysqli_query($conn, $get_sql);

    if (mysqli_num_rows($get_result) == 0) {
        header("location:customer.php");
    } else {
        $customer = mysqli_fetch_assoc($get_result);
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];
        $role = (int) $_POST['role'];

        $sql = "UPDATE users SET name='$name', address='$address', phone='$phone', email='$email' , password='$password' , role='$role' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:customer.php");
        } else {
            $message = "Failed to add customer";
        }
    }

    ?>
    <div class="layout d-flex">
        <div class="sidebar d-flex">
            <h2 class="text-center">Admin</h2>
            <ul class="d-flex">
                <li><a href="../dashboard.html"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
                <li><a href="../products/product.html"><i class="fa-solid fa-box"></i>Product</a></li>
                <li><a href="../orders/order.html"><i class="fa-solid fa-cart-shopping"></i>Order</a></li>
                <li><a href="../customers/customer.html"><i class="fa-solid fa-users"></i>Customer</a></li>
                <li><a href="../category/category.html"><i class="fa-solid fa-layer-group"></i>Categories</a></li>
                <li><a href="../brands/brand.html"><i class="fa-solid fa-star"></i>Brand</a></li>
                <li><a href=""><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
            </ul>
        </div>
        <div class="layout-content">
            <div class="admin-header">
                <div class="d-flex justify-end align-center gap">
                    <!-- <h2>Dashboard</h2> -->
                    <div class="d-flex gap admin-header-icon align-center">
                        <i class="fa-solid fa-bell fa-xl"></i>
                        <i class="fa-solid fa-user fa-xl"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <form class="form-container" action="" method="POST">
                    <h2 class="text-center">Edit Customer</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group">
                            <label class="form-label">Customer Name:</label>
                            <input type="text" class="form-input" name="name" value="<?php echo $customer['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Address:</label>
                            <input type="text" class="form-input" name="address"
                                value="<?php echo $customer['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone:</label>
                            <input type="text" class="form-input" name="phone" value="<?php echo $customer['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email:</label>
                            <input type="text" class="form-input" name="email" value="<?php echo $customer['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-input" name="password"
                                value="<?php echo $customer['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password:</label>
                            <input type="password" class="form-input" name="con_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role:</label>
                        <select class="form-input" name="role " value="<?php echo $customer['role'] ?>">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
            </div>
            <div class="text-right">
                <button class="btn btn-add">Update Customer</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>