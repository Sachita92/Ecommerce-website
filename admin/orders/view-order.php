<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View-Order</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="layout d-flex">
      
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

            <div class="box">
                <h2 class="text-center">Order Details</h2>
                <table class="order-table">
                    <tr>
                        <th>Order ID:</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Customer Name:</th>
                        <td>Alex</td>
                    </tr>
                    <tr>
                        <th>Customer Address:</th>
                        <td>Kathmandu</td>
                    </tr>
                    <tr>
                        <th>Customer Contact:</th>
                        <td>1234567890</td>
                    </tr>
                    <tr>
                        <th>Order Status:</th>
                        <td>delivered</td>
                    </tr>
                    <tr>
                        <th>Total Amount:</th>
                        <td>10000</td>
                    </tr>
                </table>

                <h3 class="text-center">Products</h3>
                <table class="box-table text-center">
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>20000</td>
                        <td>1</td>
                        <td>20000</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>20000</td>
                        <td>1</td>
                        <td>20000</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>20000</td>
                        <td>1</td>
                        <td>20000</td>
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