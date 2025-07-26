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

    $get_sql = "SELECT * FROM banners where id=$id";

    $get_result = mysqli_query($conn, $get_sql);

    if (mysqli_num_rows($get_result) == 0) {
        header("location:banner.php");
    } else {
        $banner = mysqli_fetch_assoc($get_result);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $button_text = $_POST['button_text'];
        $is_active = $_POST['is_active'];


        $sql = "UPDATE banners SET title='$title', sub_title='$sub_title', button_text='$button_text', is_active='$is_active'";

        $result = mysqli_query($conn, $sql);
        $upload_dir = "../../uploads/";
        $file_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . date("YmdHis") . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        // Check if file is uploaded successfully
           if (isset($_FILES['image'])) {
            $upload_dir = "../../uploads/";
            $file_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . date("YmdHis") . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // Check if file is uploaded successfully
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $file_name)) {

                unlink("../../uploads/" . $banner['image']);
                
                $sql = "UPDATE banners set image='$file_name' WHERE id=$id";

                $result = mysqli_query($conn, $sql);
            }
        }

        if ($result) {
            header("location:banner.php");
        } else {
            $message = "Failed to edit banner";
        }
    }

    ?>
    <div class="layout d-flex">

        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php"; ?>

            <div class="box">
                <form class="form-container" action="" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center">Edit Banner</h2>
                    <div class="d-flex justify-between align-center flex-wrap">
                        <div class="form-group">
                            <label class="form-label">Title:</label>
                            <input type="text" class="form-input" name="title" value="<?php echo $banner['title'] ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Subtitle:</label>
                            <input type="text" class="form-input" name="sub_title"
                                value="<?php echo $banner['sub_title'] ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Button Text:</label>
                            <input type="text" class="form-input" name="button_text"
                                value="<?php echo $banner['button_text'] ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Is Active:</label>
                            <select class="form-input" name="is_active" value="">
                                <option value="0">No</option>
                                <option value="1" <?php echo $banner['is_active'] == 1? 'selected':""?>>Yes</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Image:</label>
                            <input type="file" class="form-input" name="image">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-add">Update Banner</button>
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