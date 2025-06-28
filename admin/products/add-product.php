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

    $sqlc = "SELECT * FROM categories";

    $resultc = mysqli_query($conn, $sqlc);

    $sqlb = "SELECT * FROM brands";

    $resultb = mysqli_query($conn, $sqlb);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $categoryid = $_POST['categoryid'];
        $brandid = $_POST['brandid'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $discount_rate = (int) $_POST['discount_rate'];
        $is_featured = (int) $_POST['is_featured'];

        $upload_dir = "../../uploads/";
        $file_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . date("YmdHis") . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        // Check if file is uploaded successfully
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $file_name)) {

            $sql = "INSERT INTO products(name,categoryid,brandid,stock,price,image,description,discount_rate,is_featured)
         VALUES('$name', '$categoryid' , '$brandid' , '$stock' , '$price' , '$file_name','$description','$discount_rate','$is_featured')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("location:product.php");
            } else {
                $message = "Failed to add product";
            }
        }
    }

    ?>
    <div class="layout d-flex">
       
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

            <div class="box">
                <form class="form-container" action="" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center">Add Product</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group">
                            <label class="form-label">Product Name:</label>
                            <input type="text" class="form-input" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category:</label>
                            <select class="form-input" name="categoryid">
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
                            <select class="form-input" name="brandid">
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
                            <select class="form-input" name="is_featured">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price:</label>
                            <input type="text" class="form-input" name="price">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stock:</label>
                            <input type="text" class="form-input" name="stock">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image:</label>
                            <input type="file" class="form-input" name="image">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Discount Rate:</label>
                            <input type="text" class="form-input" name="discount_rate">
                        </div>
                    </div>
                    <div class="form-group w-100">
                        <label class="form-label">Description:</label>
                        <textarea class="form-input" rows="5" name="description"></textarea>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-add">Add Product</button>
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