<?php   
     include "../../database/connect.php";
    $id=$_GET['id'];

    $get_sql="SELECT * FROM users where id=$id";

    $get_result=mysqli_query($conn,$get_sql);

    if(mysqli_num_rows($get_result)==0){
        header("location:customer.php");
    }
    else{
        $delete_sql="DELETE FROM users WHERE id=$id";

        $delete_result=mysqli_query($conn,$delete_sql);
        header("location:customer.php");
    }
?>