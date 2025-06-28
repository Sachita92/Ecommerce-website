<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

    $message = "";
    $sql = "SELECT * from coupons";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $message = "Failed to fetch coupon";
    }
    ?>
    <div class="layout d-flex">

        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php"; ?>

            <div class="box">
                <div class="d-flex justify-between align-center">
                    <h2>Coupons</h2>
                    <a class="btn btn-add" href="add-coupon.php">+ Add Coupon</a>
                </div>
                <table class="box-table text-center">
                    <tr>
                        <th>Coupon ID</th>
                        <th>Code</th>
                        <th>Discount Type</th>
                        <th>Discount Value</th>
                        <th>Min Amount</th>
                        <th>Is Active</th>
                        <th>Maximum Use Per User</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                         <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "  <tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['code'] . "</td>
                        <td>" . $row['discount_type'] . "</td>
                        <td>" . $row['discount_value'] . "</td>
                        <td>" . $row['min_amount'] . "</td>
                        <td>" . $row['is_active'] . "</td>
                        <td>" . $row['max_use_per_user'] . "</td>
                        <td>
                            <a href='edit-coupon.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete-coupon.php?id=" . $row['id'] . "' class='btn btn-delete'>Delete</a>
                        </td>
                    </tr>";
                        }

                    } else {
                        echo "<tr><td colspan='7'>No Coupon Found</td></tr>";
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