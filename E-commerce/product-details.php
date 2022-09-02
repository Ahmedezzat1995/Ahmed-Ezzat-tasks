<?php

use App\Database\Models\Product;
use App\Database\Models\Review;

$title = "Product Details";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrump.php";

$product_obj = new Product;
$review_obj = new Review;


if ($_GET) {
    if (isset($_GET['product'])) {
        if (is_numeric($_GET['product'])) {

            $products = $product_obj->read_specific_product($_GET['product']);


            if ($products->num_rows == 0) {
                header("location:layouts/errors/404.php");
                die;
            } else {
                $products = $product_obj->read_specific_product($_GET['product'])->fetch_all(MYSQLI_ASSOC);
                $reviews = $review_obj->read_product_reviews($_GET['product'])->fetch_all(MYSQLI_ASSOC);
            }
        } else {
            $title = 'error 404 ';
            header("location:layouts/errors/404.php");
            die;
        }
    } else {
        $title = 'error 404 ';
        header("location:layouts/errors/404.php");
        die;
    }
} else {
    $title = 'error 404 ';
    header("location:layouts/errors/404.php");
    die;
}

if ($_POST)
 {
    if (isset($_POST['rating']) )
     {
        if (isset($_POST['message']))
        {
        
        $review_obj->setUser_id(22)->setProduct_id($_GET['product'])->setRate($_POST['rating'])->setComment($_POST['message']);
      
        if (!$review_obj->add_review()) 
          
         {
            header("location:layouts/errors/404.php");
            die;
          }
        }
        
    
    }
   
    else {

        $error_message = 'fill all review data ' ;
       }

    
}

?>


<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <?php foreach ($products as $product) { ?>
                        <img class="zoompro" src="<?= $product['image'] ?>" data-zoom-image="<?= $product['image'] ?>" alt="zoom" />

                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product['name_en'] ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php for ($counter = 1; $counter <= $product['reviews_averge']; $counter++) { ?>
                                <i class="ion-android-star-outline theme-star"></i>
                            <?php } ?>
                            <?php for ($counter = 1; $counter <= (5 - $product['reviews_averge']); $counter++) { ?>
                                <i class="ion-android-star-outline"></i>
                            <?php } ?>
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= "{$product['reviews_count']}  .Reviews" ?></li>
                            </ul>
                        </div>
                    </div>
                    <span><?= $product['price'] ?> EGP</span>
                    <div class="in-stock">
                        <?php if ($product['quantity'] == 0) {
                            $message = 'out of stock';
                            $color = 'danger';
                        } elseif ($product['quantity'] > 0 && $product['quantity'] <= 5) {
                            $message = "in stock. {$product['quantity']}";
                            $color = 'warning';
                        } else {
                            $message = 'in stock';
                            $color = 'success';
                        }
                        ?>
                        <p>avalible : <span class="text-<?= $color ?> "><?= $message ?></span></p>

                    </div>
                    <p><?= $product['details_en'] ?> </p>


                    <div class="pro-dec-categories">
                        <ul>
                            <li><a href="shop.php?category=<?= $product['catogery_id'] ?>"><?= $product['catogery_name_en'] ?>,</a>
                            </li>
                            <li><a href="shop.php?subcategory=<?= $product['sub_catogrie_id'] ?>"><?= $product['sub_catogrery_name_en'] ?>,</a>
                            </li>
                            <li><a href="shop.php?brand=<?= $product['brand_id'] ?>"><?= $product['brand_name_en'] ?></a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <div class="pro-dec-social">
                    <ul>
                        <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                        <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                        <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a>
                        </li>
                        <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details2">Review</a>
            </div>

            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?= $product['details_en'] ?></p>
                    </div>
                </div>
            </div>


            <div id="des-details2" class="tab-pane">
                <div class="rattings-wrapper">
                    <?php
                    foreach ($reviews as $review) { ?>
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <?php for ($i = 1; $i <= $review['rate']; $i++) { ?>
                                        <i class="ion-star theme-color"></i>
                                    <?php } ?>
                                    <?php for ($i = 1; $i <= 5 - $review['rate']; $i++) { ?>
                                        <i class="ion-android-star-outline"></i>
                                    <?php } ?>

                                    <span>(<?= $review['rate'] ?>)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3><?= "{$review['first_name']}  {$review['last_name']} " ?></h3>
                                    <span><?= $review['created_at'] ?></span>
                                </div>
                            </div>
                            <p><?= $review['comment'] ?></p>
                        </div>
                </div>
            <?php } ?>

            <style>
                .star-rating {
                    display: flex;
                    flex-direction: row-reverse;
                    font-size: 1.5em;
                    justify-content: space-around;
                    padding: 0 .2em;
                    text-align: center;
                    width: 8em;
                    margin: 10px;
                }

                .star-rating input {
                    display: none;
                }

                .star-rating label {
                    color: #ccc;
                    cursor: pointer;
                }

                .star-rating :checked~label {
                    color: #f90;
                }

                .star-rating label:hover,
                .star-rating label:hover~label {
                    color: #fc0;
                }
            </style>
            <br>
            <br>
            <br>

            <form method="post">
                <div class="star-rating">
                    <input type="radio" id="5-stars" name="rating" value="5" />
                    <label for="5-stars" class="star">&#9733;</label>
                    <input type="radio" id="4-stars" name="rating" value="4" />
                    <label for="4-stars" class="star">&#9733;</label>
                    <input type="radio" id="3-stars" name="rating" value="3" />
                    <label for="3-stars" class="star">&#9733;</label>
                    <input type="radio" id="2-stars" name="rating" value="2" />
                    <label for="2-stars" class="star">&#9733;</label>
                    <input type="radio" id="1-star" name="rating" value="1" />
                    <label for="1-star" class="star">&#9733;</label>
                </div>


                <div class="row">

                </div>

            </div>
            <div class="col-md-6">
                <div class="rating-form-style form-submit">
                    <textarea name="message" placeholder="Message"></textarea>
                    <?php if (isset($error_message))
                    {
                        echo $error_message ;
                    }
                    ?>
                    <input type="submit" value="add review">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="featured-product-active hot-flower owl-carousel product-nav">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-1.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Le Bongai Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-2.jpg">
                    </a>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Society Ice Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-3.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Green Tea Tulsi</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-4.jpg">
                    </a>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Best Friends Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-5.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Instant Tea Premix</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
include "layouts/scripts.php";
?>