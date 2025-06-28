<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Brand</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php 
    include "../../database/connect.php";
    $message="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name = $_POST['name'];

        $sql= "INSERT INTO brands(name) VALUES('$name')";

        $result=mysqli_query($conn,$sql);

        if($result){
            header("location:brand.php");
        }
        else{
            $message="Failed to add brand";
        }
    }
    
    ?>
    <div class="layout d-flex">
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

            <div class="box">
                <form class="form-container" action="" method="POST">
                    <h2 class="text-center">Add Brand</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group w-100">
                            <label class="form-label">Brand Name:</label>
                            <input type="text" class="form-input" name="name">
                        </div>
                    </div>
                    <?php  echo $message; ?>
                    <div class="text-right">
                    <button class="btn btn-add">Add Brand</button>
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