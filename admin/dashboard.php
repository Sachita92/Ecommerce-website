<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="layout d-flex">
      
        <?php include "./layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "./layout/header.php";?>

            <div class="admin-card-container">
                <div class="container">
                    <div class="d-flex justify-between align-center gap">
                        <div class="admin-card d-flex gap align-center">
                            <div class="admin-card-icon d-flex align-center justify-center">
                                <i class="fa-solid fa-sack-dollar"></i>
                            </div>
                            <div>
                                <h4 class="text-gray">Total Revenue</h4>
                                <span>$26,482</span>
                            </div>
                        </div>
                        <div class="admin-card d-flex gap align-center">
                            <div class="admin-card-icon d-flex align-center justify-center">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div>
                                <h4 class="text-gray">Total Order</h4>
                                <span>156</span>
                            </div>
                        </div>
                        <div class="admin-card d-flex gap align-center">
                            <div class="admin-card-icon d-flex align-center justify-center">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div>
                                <h4 class="text-gray">Total Customer</h4>
                                <span>92</span>
                            </div>
                        </div>
                        <div class="admin-card d-flex gap align-center">
                            <div class="admin-card-icon d-flex align-center justify-center">
                                <i class="fa-solid fa-arrows-turn-to-dots"></i>
                            </div>
                            <div>
                                <h4 class="text-gray">Conversion Rate</h4>
                                <span>3.6%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>