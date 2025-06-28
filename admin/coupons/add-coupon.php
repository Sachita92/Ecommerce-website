<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $code = $_POST['code'];
        $discount_type = $_POST['discount_type'];
        $discount_value = $_POST['discount_value'];
        $min_amount = $_POST['min_amount'];
        $max_use_per_user = $_POST['max_use_per_user'];
        $is_active = $_POST['is_active'];

        $sql = "INSERT INTO coupons(code,discount_type,discount_value,min_amount,max_use_per_user,is_active)
         VALUES('$code', '$discount_type' , '$discount_value' , '$min_amount' , '$max_use_per_user' , $is_active)";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location:coupon.php");
        } else {
            $message = "Failed to add coupon";
        }
    }

    ?>
    <div class="layout d-flex">
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php"; ?>

            <div class="box">
                <form class="form-container" action="" method="POST">
                    <h2 class="text-center">Add Coupon</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group">
                            <label class="form-label">Coupon Code:</label>
                            <input type="text" class="form-input" name="code">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Discount Type</label>
                            <select class="form-input" name="discount_type">
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Discount Value:</label>
                            <input type="text" class="form-input" name="discount_value">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Minimum Amount:</label>
                            <input type="text" class="form-input" name="min_amount">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Maximum Use Per User:</label>
                            <input type="text" class="form-input" name="max_use_per_user">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Is Active:</label>
                            <select class="form-input" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-add">Add Coupon</button>
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