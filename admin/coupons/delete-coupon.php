<?php   
     include "../../database/connect.php";
    $id=$_GET['id'];

    $get_sql="SELECT * FROM coupons where id=$id";

    $get_result=mysqli_query($conn,$get_sql);

    if(mysqli_num_rows($get_result)==0){
        header("location:coupon.php");
    }
    else{
        $delete_sql="DELETE FROM coupons WHERE id=$id";

        $delete_result=mysqli_query($conn,$delete_sql);
        header("location:coupon.php");
    }
?>