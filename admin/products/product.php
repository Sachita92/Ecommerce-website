<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Product</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

    $message = "";
    $sql = "SELECT p.*,c.name as category,b.name as brand FROM products p LEFT JOIN brands b ON b.id=p.brandid LEFT JOIN categories c ON c.id=p.categoryid";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $message = "Failed to fetch product";
    }
    ?>
    <div class="layout d-flex">
        
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

            <div class="box">
                <div class="d-flex justify-between align-center">
                    <h2>Products</h2>
                    <a class="btn btn-add" href="add-product.php">+ Add Product</a>
                </div>
                <table class="box-table text-center">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "  <tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['brand'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>" . $row['category'] . "</td>
                        <td>" . $row['stock'] . " pcs</td>
                        <td>
                            <a href='edit-product.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete-product.php?id=" . $row['id'] . "' class='btn btn-delete'>Delete</a>
                        </td>
                    </tr>";
                        }

                    } else {
                        echo "<tr><td colspan='7'>No Product Found</td></tr>";
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