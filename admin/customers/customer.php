<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Customer</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

    $message = "";
    $sql = "SELECT c.*,count(o.id) as total_orders FROM users c LEFT JOIN orders p ON c.id=o.userid group by c.id";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $message = "Failed to fetch customer";
    }
    ?>
    <div class="layout d-flex">
        <div class="sidebar d-flex">
            <h2 class="text-center">Admin</h2>
            <ul class="d-flex">
                <li><a href="../dashboard.html"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
                <li><a href="../products/product.html"><i class="fa-solid fa-box"></i>Product</a></li>
                <li><a href="../orders/order.html"><i class="fa-solid fa-cart-shopping"></i>Order</a></li>
                <li><a href="#"><i class="fa-solid fa-users"></i>Customer</a></li>
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
                <div class="d-flex justify-between align-center">
                    <h2>Customers</h2>
                    <a class="btn btn-add" href="add-customer.php">+ Add Customer</a>
                </div>
                <table class="box-table text-center">
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Total Order</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>Kathmandu</td>
                        <td>1234567890</td>
                        <td>alex@gmail.com</td>
                        <td>10pcs</td>
                        <td>
                            <a href="" class="btn btn-edit">Edit</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "  <tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['address'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['total_orders'] . " pcs</td>
                        <td>
                            <a href='edit-customer.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete-customer.php?id=" . $row['id'] . "' class='btn btn-delete'>Delete</a>
                        </td>
                    </tr>";
                        }

                    } else {
                        echo "<tr><td colspan='7'>No Customer Found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>