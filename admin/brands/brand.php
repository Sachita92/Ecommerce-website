<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Brand</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

        $message="";
        $sql= "SELECT b.*,count(p.id) as total_products FROM brands b LEFT JOIN products p ON b.id=p.brandid group by b.id";

        $result=mysqli_query($conn,$sql);

        if(!$result){
            $message="Failed to fetch brand";
        }
    ?>
    <div class="layout d-flex">
        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php";?>

            <div class="box">
                <div class="d-flex justify-between align-center">
                    <h2>Brands</h2>
                    <a class="btn btn-add" href="add-brand.php">+ Add Brand</a>
                </div>
                <?php echo $message;?>
                <table class="box-table text-center">
                    <tr>
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Total Products</th>
                        <th>Action</th>
                    </tr>
                  
                    <?php 
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "  <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['total_products']."</td>
                        <td>
                            <a href='edit-brand.php?id=".$row['id']."' class='btn btn-edit'>Edit</a>
                            <a href='delete-brand.php?id=".$row['id']."' class='btn btn-delete'>Delete</a>
                        </td>
                    </tr>";
                        }

                    }
                    else{
                        echo "<tr><td colspan='4'>No Brands Found</td></tr>";
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