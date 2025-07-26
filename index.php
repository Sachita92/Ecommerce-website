<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
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

    <?php
    include "database/connect.php";

    $banner_sql = "SELECT * FROM banners where is_active='1'";

    $banner_result = mysqli_query($conn, $banner_sql);

    ?>
    <div class="hero-section">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                while ($row = mysqli_fetch_assoc($banner_result)) {
                    echo "     <div class='swiper-slide'>
                    <div style='background-image: url(\"uploads/" . $row['image'] . "\");'
                        class='hero-section-slide d-flex align-center text-center justify-center relative'>
                        <div class='overlay'></div>
                        <div class='hero-section-text relative'>
                            <h1>" . $row['title'] . "</h1>
                            <h5>" . $row['sub_title'] . "</h5>
                            <button class='bg-blue'>" . $row['button_text'] . "</button>
                        </div>
                    </div>
                </div>";
                }
                ?>

            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    </div>

    <?php

    $category_sql = "SELECT * FROM categories";

    $category_result = mysqli_query($conn, $category_sql);

    ?>
    <div class="categories">
        <div class="container">
            <h1 class="text-center">Shop by Category</h1>
            <div class="d-flex align-center gap">

                <?php
                while ($row = mysqli_fetch_assoc($category_result)) {
                    $img = $row['image'];
                    echo "
                <div class='categories-card text-center'>
                    <img src=\"uploads/" . $img . "\" />
                    <h5>" . $row['name'] . "</h5>
                </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php

    $product_sql = "SELECT p.*,c.name as category FROM products p LEFT JOIN categories c on p.categoryid=c.id";

    $product_result = mysqli_query($conn, $product_sql);

    ?>

    <div class="products">
        <div class="container">
            <h1 class="text-center">Our Products</h1>
            <div class="d-flex align-center gap">
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
    <a class='product-card' href='product.php?id=".$row['id']."'>
        <div class='product-image'>
              <img src=\"uploads/" . $img . "\" />
            " . ($discount_rate ? "<span class='product-tag bg-orange text-white' >-{$discount_rate}%</span>" : "") . "
        </div>
        <div class='product-detail'>
            <h6>{$row['category']}</h6>
            <h4>{$row['name']}</h4>
            <h5>";

                    if ($discount_rate) {
                        echo number_format($discount_amount, 2) . " <del class='text-gray'>" . number_format($price, 2) . "</del>";
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
            <div class="text-center">
                <button class="primary-btn">View all Products</button>
            </div>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <div class="d-flex justify-between align-center gap">
                <div class="features-card text-center">
                    <img src="images/truck.png" />
                    <h4>Free Shiping</h4>
                    <p>On orders over $100</p>
                </div>
                <div class="features-card text-center">
                    <img src="images/lightining.png" />
                    <h4>Fast Delivery</h4>
                    <p>Get your products within 2-3 business days</p>
                </div>
                <div class="features-card text-center">
                    <img src="images/lock.png" />
                    <h4>Secure Payment</h4>
                    <p>100% secure payment processing</p>
                </div>
                <div class="features-card text-center">
                    <img src="images/u-turn.png" />
                    <h4>Easy Returns</h4>
                    <p>30 day return policy</p>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: true,
        });
    </script>
</body>

</html>