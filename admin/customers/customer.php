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
    $sql = "SELECT c.*,count(o.id) as total_orders FROM users c LEFT JOIN orders o ON c.id=o.userid group by c.id";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $message = "Failed to fetch customer";
    }
    ?>
    <div class="layout d-flex">
        
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

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