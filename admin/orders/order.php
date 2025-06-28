<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Order</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="layout d-flex">

        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

            <div class="box">
                <div class="d-flex justify-between align-center">
                    <h2>Orders</h2>
                </div>
                <table class="box-table text-center">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>6/5/2025</td>
                        <td>Delivered</td>
                        <td>$1,398.00</td>
                        <td>
                            <a href="" class="btn btn-edit">View</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>6/5/2025</td>
                        <td>Delivered</td>
                        <td>$1,398.00</td>
                        <td>
                            <a href="" class="btn btn-edit">View</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>6/5/2025</td>
                        <td>Delivered</td>
                        <td>$1,398.00</td>
                        <td>
                            <a href="" class="btn btn-edit">View</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>6/5/2025</td>
                        <td>Delivered</td>
                        <td>$1,398.00</td>
                        <td>
                            <a href="" class="btn btn-edit">View</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>6/5/2025</td>
                        <td>Delivered</td>
                        <td>$1,398.00</td>
                        <td>
                            <a href="" class="btn btn-edit">View</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Alex</td>
                        <td>6/5/2025</td>
                        <td>Delivered</td>
                        <td>$1,398.00</td>
                        <td>
                            <a href="" class="btn btn-edit">View</a>
                            <a href="" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>