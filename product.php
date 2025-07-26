<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<?php

include "database/connect.php";

$id = $_GET['id'];

$product_sql = "SELECT p.*,c.name as category, b.name as brand FROM products p LEFT JOIN categories c ON c.id=p.categoryid LEFT JOIN brands b ON b.id=p.brandid where p.id=$id";

$product_result = mysqli_query($conn, $product_sql);

$row = mysqli_fetch_assoc($product_result);

$price = $row['price'];
$discount_rate = isset($row['discount_rate']) ? $row['discount_rate'] : null;
$discount_amount = 0;

if ($discount_rate) {
    $discount_amount = $price - ($discount_rate / 100 * $price);
}

$instock=$row['stock']>0;
?>

<body style="background-color: #EFF0F5;">
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

    <div class="single-product">
        <div class="container">
            <div class="box-bg">
                <div class="d-flex justify-between align-center gap">


                    <div class="single-product-image">
                        <?php
                        $img = $row['image'];
                        echo "
                        <img src=\"uploads/" . $img . "\" />";
                        ?>
                    </div>

                    <div class="single-product-details">
                        <h2><?php echo $row['name']; ?></h2>
                        <h6>Category: <?php echo $row['category']; ?></h6>
                        <h6>Brand: <?php echo $row['brand']; ?></h6>
                        <h5>
                            <?php 
                            if ($discount_rate) {
                                echo number_format($discount_amount, 2) . " <del class='text-gray'>" . number_format($price, 2) . "</del>";
                            } else {
                                echo number_format($price, 2);
                            }
                            ?>
                        </h5>
                        <p class="text-green"><i class="fa-solid fa-circle-check"></i><?php if($instock){echo "In Stock(".$row['stock']. " available)";} else{echo "Out Of Stock";}?></p>
                        <div class="d-flex gap cart">
                            <div class="counter d-flex align-center">
                                <button>-</button>
                                <input type="number" class="text-center" value="0">
                                <button>+</button>
                            </div>
                            <button class="bg-blue text-white cart-btn">Add to Cart</button>
                            <i class="fa-regular fa-heart"></i>
                        </div>

                        <p><?php echo $row['description'];?></p>
                    </div>
                </div>
            </div>
            <div class="box-bg">
                <div class="reviews">
                    <h2>Product Reviews</h2>
                    <div class="review-card">
                        <div class="d-flex justify-between">
                            <div class="review-card-text">
                                <h4>John</h4>
                                <h5>Excellent performance</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae aut quam
                                    sapiente
                                    numquam
                                    velit aspernatur repudiandae tempora temporibus iusto quod, perspiciatis aliquid in
                                    veritatis,
                                    impedit delectus laboriosam necessitatibus quo tempore?</p>
                            </div>
                            <div>
                                <p>13 sep 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-card">
                        <div class="d-flex justify-between">
                            <div class="review-card-text">
                                <h4>John</h4>
                                <h5>Excellent performance</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae aut quam
                                    sapiente
                                    numquam
                                    velit aspernatur repudiandae tempora temporibus iusto quod, perspiciatis aliquid in
                                    veritatis,
                                    impedit delectus laboriosam necessitatibus quo tempore?</p>
                            </div>
                            <div>
                                <p>13 sep 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-card">
                        <div class="d-flex justify-between">
                            <div class="review-card-text">
                                <h4>John</h4>
                                <h5>Excellent performance</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae aut quam
                                    sapiente
                                    numquam
                                    velit aspernatur repudiandae tempora temporibus iusto quod, perspiciatis aliquid in
                                    veritatis,
                                    impedit delectus laboriosam necessitatibus quo tempore?</p>
                            </div>
                            <div>
                                <p>13 sep 2025</p>
                            </div>
                        </div>
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