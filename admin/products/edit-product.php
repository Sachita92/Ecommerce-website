<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add-product</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

    $id = $_GET['id'];

    $sqlc = "SELECT * FROM categories";

    $resultc = mysqli_query($conn, $sqlc);

    $sqlb = "SELECT * FROM brands";

    $resultb = mysqli_query($conn, $sqlb);

    $get_sql = "SELECT * FROM products where id=$id";

    $get_result = mysqli_query($conn, $get_sql);

    if (mysqli_num_rows($get_result) == 0) {
        header("location:product.php");
    } else {
        $product = mysqli_fetch_assoc($get_result);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $categoryid = $_POST['categoryid'];
        $brandid = $_POST['brandid'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $discount_rate = (int) $_POST['discount_rate'];
        $is_featured = (int) $_POST['is_featured'];

        $sql = "UPDATE products SET name='$name', categoryid='$categoryid', brandid='$brandid', stock='$stock', price='$price', description='$description', discount_rate='$discount_rate', is_featured='$is_featured' WHERE id=$id";

        $result = mysqli_query($conn, $sql);


        if (isset($_FILES['image'])) {
            $upload_dir = "../../uploads/";
            $file_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . date("YmdHis") . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // Check if file is uploaded successfully
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $file_name)) {

                unlink("../../uploads/" . $product['image']);
                
                $sql = "UPDATE products set image='$file_name' WHERE id=$id";

                $result = mysqli_query($conn, $sql);
            }
        }

        if ($result) {
            header("location:product.php");
        } else {
            $message = "Failed to edit product";
        }
    }

    ?>
    <div class="layout d-flex">
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php"; ?>

            <div class="box">
                <form class="form-container" action="" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center">Add Product</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group">
                            <label class="form-label">Product Name:</label>
                            <input type="text" class="form-input" name="name" value="<?php echo $product['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category:</label>
                            <select class="form-input" name="categoryid" value="<?php echo $product['categoryid']; ?>">
                                <?php
                                if (mysqli_num_rows($resultc) > 0) {
                                    while ($row = mysqli_fetch_assoc($resultc)) {
                                        echo "  <option value=" . $row['id'] . ">
                        " . $row['name'] . "
                    </option>";
                                    }

                                } else {
                                    echo "<option>No Category Found</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Brand:</label>
                            <select class="form-input" name="brandid" value="<?php echo $product['brandid']; ?>">
                                <?php
                                if (mysqli_num_rows($resultb) > 0) {
                                    while ($row = mysqli_fetch_assoc($resultb)) {
                                        echo "  <option value=" . $row['id'] . ">
                        " . $row['name'] . "
                    </option>";
                                    }

                                } else {
                                    echo "<option>No Brand Found</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Featured:</label>
                            <select class="form-input" name="is_featured"
                                value="<?php echo $product['is_featured']; ?>">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price:</label>
                            <input type="text" class="form-input" name="price" value="<?php echo $product['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stock:</label>
                            <input type="text" class="form-input" name="stock" value="<?php echo $product['stock']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image:</label>
                            <input type="file" class="form-input" name="image">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Discount Rate:</label>
                            <input type="text" class="form-input" name="discount_rate"
                                value="<?php echo $product['discount_rate']; ?>">
                        </div>
                    </div>
                    <div class="form-group w-100">
                        <label class="form-label">Description:</label>
                        <textarea class="form-input" rows="5"
                            name="description"><?php echo $product['description']; ?></textarea>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-add">Update Product</button>
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