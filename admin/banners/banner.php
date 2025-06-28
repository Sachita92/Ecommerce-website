<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include "../../database/connect.php";

    $message = "";
    $sql = "SELECT * from banners";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $message = "Failed to fetch banner";
    }
    ?>
    <div class="layout d-flex">

        <?php include "../layout/sidebar.php"; ?>
        <div class="layout-content">
            <?php include "../layout/header.php"; ?>

            <div class="box">
                <div class="d-flex justify-between align-center">
                    <h2>Banners</h2>
                    <a class="btn btn-add" href="add-banner.php">+ Add Banner</a>
                </div>
                <table class="box-table text-center">
                    <tr>
                        <th>Banner ID</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Button text</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                         <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "  <tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['sub_title'] . "</td>
                        <td>" . $row['button_text'] . "</td>
                        <td>" . $row['is_active'] . "</td>
                        <td>
                            <a href='edit-banner.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete-banner.php?id=" . $row['id'] . "' class='btn btn-delete'>Delete</a>
                        </td>
                    </tr>";
                        }

                    } else {
                        echo "<tr><td colspan='7'>No Banner Found</td></tr>";
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