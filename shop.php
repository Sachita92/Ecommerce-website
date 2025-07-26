<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php

    include "database/connect.php";

    $categories_sql = "SELECT * FROM categories";

    $categories_result = mysqli_query($conn, $categories_sql);

    $brands_sql = "SELECT * FROM brands";

    $brands_result = mysqli_query($conn, $brands_sql);


    ?>
    <div class="header">
        <div class="container">
            <div class="d-flex justify-between align-center">
                <h1>Tech<span class="text-orange">Harbor</span></h1>
                <ul class="d-flex justify-between nav gap">
                    <li>Home</li>
                    <li>Product</li>
                    <li>Categories</li>
                    <li>About</li>
                    <li>Contact</li>
                </ul>
                <div class="d-flex align-center gap">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="shop">
        <div class="container">
            <div class="d-flex justify-between">
                <div class="filter-sidebar">
                    <form action="" method="GET">
                        <div class="form-group w-100">
                            <label class="form-label">Sort By</label>
                            <select class="form-input" name="sort">
                                <option value="1" <?php if (isset($_GET['sort']) && $_GET['sort'] == 1)
                                    echo 'selected'; ?>>Price, High to Low</option>
                                <option value="2" <?php if (isset($_GET['sort']) && $_GET['sort'] == 2)
                                    echo 'selected'; ?>>Price, Low to High</option>
                                <option value="3" <?php if (isset($_GET['sort']) && $_GET['sort'] == 3)
                                    echo 'selected'; ?>>Ascending</option>
                                <option value="4" <?php if (isset($_GET['sort']) && $_GET['sort'] == 4)
                                    echo 'selected'; ?>>Descending</option>
                            </select>

                        </div>
                        <div class="form-group w-100">
                            <label for="" class="form-label">Min Price</label>
                            <input type="number" name="min-price" class="form-input"
                                value="<?php echo isset($_GET['min-price']) ? $_GET['min-price'] : ''; ?>">

                        </div>
                        <div class="form-group w-100">
                            <label for="" class="form-label">Max Price</label>
                            <input type="number" name="max-price" class="form-input"
                                value="<?php echo isset($_GET['max-price']) ? $_GET['max-price'] : ''; ?>">
                        </div>
                        <div class="form-group w-100">
                            <label for="" class="form-label">Category</label>
                            <?php
                            $selected_categories = isset($_GET['category']) ? $_GET['category'] : [];

                            while ($categories = mysqli_fetch_assoc($categories_result)) {
                                $checked = in_array($categories['id'], $selected_categories) ? 'checked' : '';
                                echo "<div>
            <input type='checkbox' name='category[]' value='" . $categories['id'] . "' $checked>
            " . $categories['name'] . "
          </div>";
                            }
                            ?>

                        </div>
                        <div class="form-group w-100">
                            <label for="" class="form-label">Brand</label>
                            <?php
                            $selected_brands = isset($_GET['brand']) ? $_GET['brand'] : [];

                            while ($brands = mysqli_fetch_assoc($brands_result)) {
                                $checked = in_array($brands['id'], $selected_brands) ? 'checked' : '';
                                echo "<div>
            <input type='checkbox' name='brand[]' value='" . $brands['id'] . "' $checked>
            " . $brands['name'] . "
          </div>";
                            }
                            ?>

                        </div>
                        <button class="btn btn-add">Submit</button>
                    </form>
                </div>

                <?php

                $product_sql = "SELECT p.*, c.name as category FROM products p 
                LEFT JOIN categories c ON p.categoryid = c.id";

                $conditions = [];

                if (isset($_GET['min-price']) && $_GET['min-price'] !== '') {
                    $min_price = (float) $_GET['min-price'];
                    $conditions[] = "p.price >= $min_price";
                }

                if (isset($_GET['max-price']) && $_GET['max-price'] !== '') {
                    $max_price = (float) $_GET['max-price'];
                    $conditions[] = "p.price <= $max_price";
                }

                if (isset($_GET['category']) && is_array($_GET['category']) && count($_GET['category']) > 0) {
                    $category_ids = implode(",", array_map('intval', $_GET['category']));
                    $conditions[] = "p.categoryid IN ($category_ids)";
                }

                if (isset($_GET['brand']) && is_array($_GET['brand']) && count($_GET['brand']) > 0) {
                    $brand_ids = implode(",", array_map('intval', $_GET['brand']));
                    $conditions[] = "p.brandid IN ($brand_ids)";
                }

                // Apply WHERE clause if any filters exist
                if (count($conditions) > 0) {
                    $product_sql .= " WHERE " . implode(" AND ", $conditions);
                }

                // Sort
                if (isset($_GET['sort'])) {
                    switch ($_GET['sort']) {
                        case 1:
                            $product_sql .= " ORDER BY p.price DESC";
                            break;
                        case 2:
                            $product_sql .= " ORDER BY p.price ASC";
                            break;
                        case 3:
                            $product_sql .= " ORDER BY p.name ASC";
                            break;
                        case 4:
                            $product_sql .= " ORDER BY p.name DESC";
                            break;
                        default:
                            break;
                    }
                }

                $product_result = mysqli_query($conn, $product_sql);

                ?>
                <div class="shop-content">
                    <div class="d-flex gap">
                        <?php
                        while ($row = mysqli_fetch_assoc($product_result)) {
                            $price = $row['price'];
                            $discount_rate = isset($row['discount_rate']) ? $row['discount_rate'] : null;
                            $discount_amount = 0;

                            if ($discount_rate) {
                                $discount_amount = $price - ($discount_rate / 100 * $price);
                            }
                            $img = $row['image'];
                            echo "
                        <a class='product-card' href='product.php?id=" . $row['id'] . "'>
                            <div class='product-image'>
                                <img src=\"uploads/" . $img . "\" />
                                " . ($discount_rate ? "<span
                                    class='product-tag bg-orange text-white'>-{$discount_rate}%</span>" : "") . "
                            </div>
                            <div class='product-detail'>
                                <h6>{$row['category']}</h6>
                                <h4>{$row['name']}</h4>
                                <h5>";

                            if ($discount_rate) {
                                echo number_format($discount_amount, 2) . " <del class='text-gray'>" .
                                    number_format($price, 2) . "</del>";
                            } else {
                                echo number_format($price, 2);
                            }

                            echo "</h5>
                                <div class='d-flex align-center gap'>
                                    <button class='bg-blue text-white cart-btn'>Add to Cart</button>
                                    <i class='fa-regular fa-heart'></i>
                                </div>
                            </div>
                        </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="d-flex justify-between gap">
                <div class="footer-col">
                    <h3>TechHarbor</h3>
                    <p>Your destination for premium computer hardware and tech components.</p>
                    <div class="d-flex gap align-center social-icon-container">
                        <div class="social-icon d-flex align-center justify-center">
                            <i class="fa-brands fa-facebook-f"></i>
                        </div>
                        <div class="social-icon d-flex align-center justify-center">
                            <i class="fa-brands fa-twitter"></i>
                        </div>
                        <div class="social-icon d-flex align-center justify-center">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div class="social-icon d-flex align-center justify-center">
                            <i class="fa-brands fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Shop</h3>
                    <ul>
                        <li>Processors</li>
                        <li>Graphics Card</li>
                        <li>Motherboards</li>
                        <li>Memory</li>
                        <li>Storage</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Support</h3>
                    <ul>
                        <li>Contact Us</li>
                        <li>FAQs</li>
                        <li>Shipping Info</li>
                        <li>Return Policy</li>
                        <li>Warranty</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Contact</h3>
                    <ul>
                        <li>Email</li>
                        <li>Phone</li>
                        <li>Address</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>