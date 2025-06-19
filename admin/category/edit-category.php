<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add-Category</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
     <?php 
    include "../../database/connect.php";
    $message="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name = $_POST['name'];

        $sql= "SELECT * FROM categories";

        $result=mysqli_query($conn,$sql);

        if($result){
            header("location:category.php");
        }
        else{
             $brand=mysqli_fetch_assoc($get_result);
        }
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name = $_POST['name'];

        $sql= "UPDATE categories SET name='$name' WHERE id=$id";

        $result=mysqli_query($conn,$sql);

        if($result){
            header("location:category.php");
        }
        else{
            $message="Failed to add category";
        }
    }
    
    ?>
    <div class="layout d-flex">
        <div class="sidebar d-flex">
            <h2 class="text-center">Admin</h2>
            <ul class="d-flex">
                <li><a href="../dashboard.html"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
                <li><a href="../products/product.html"><i class="fa-solid fa-box"></i>Product</a></li>
                <li><a href="../orders/order.html"><i class="fa-solid fa-cart-shopping"></i>Order</a></li>
                <li><a href="../customers/customer.html"><i class="fa-solid fa-users"></i>Customer</a></li>
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
                <form class="form-container" action="" method="POST">
                    <h2 class="text-center">Edit Category</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group w-100">
                            <label class="form-label">Category Name:</label>
                            <input type="text" class="form-input" name="name">
                        </div>
                    </div>
                      <?php  echo $message; ?>
                    <div class="text-right">
                    <button class="btn btn-add">Edit Category</button>
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