<?php

include("../connection/connection.php");
?>
<div class="container mt-4">
    <div class="row">
        <?php
        // Query to fetch products based on filters
         $selQry = "select * from tbl_product p 
                     inner join tbl_producttype t on p.producttype_id=t.producttype_id   
                   inner join tbl_productcategory c on t.productcategory_id=c.productcategory_id 
                  
                   where TRUE";

        if ($_GET['type'] != "") {
            $selQry .= " and t.producttype_id IN(" . $_GET['type'] . ")";
        }
        if ($_GET['category'] != "") {
            $selQry .= " and c.productcategory_id IN(" . $_GET['category'] . ")";
        }
        
        if ($_GET['search'] != "") {
            $name = $_GET['search'];
            $selQry .= " and p.product_name like '%$name%'";
        }

        $reslt =mysql_query($selQry);

        // Loop through each product
        while ($data = mysql_fetch_array($reslt)) {
            ?>
            <div class="col-md-3 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="../Asset/File/Product/<?php echo $data['product_image']; ?>"
                            alt="<?php echo $data['product_name']; ?>">
                    </div>
                    <div class="product-details">
                        <h5><?php echo $data['product_name']; ?></h5>
                        <p>Price: <?php echo $data['product_prize']; ?></p>
                        <p>Type: <?php echo $data['producttype_name']; ?></p>
                        <p>Category: <?php echo $data['productcategory_name']; ?></p>

                        <?php


                        $average_rating = 0;
                        $total_review = 0;
                        $five_star_review = 0;
                        $four_star_review = 0;
                        $three_star_review = 0;
                        $two_star_review = 0;
                        $one_star_review = 0;
                        $total_user_rating = 0;
                        $review_content = array();

                        $query = "
                                        SELECT * FROM tbl_rating where  product_id = '" . $data["product_id"] . "' ORDER BY rating_id DESC
                                        ";

                        $result = mysql_query($query);

                        while ($row = mysql_fetch_array($result)) {


                            if ($row["rating_value"] == '5') {
                                $five_star_review++;
                            }

                            if ($row["rating_value"] == '4') {
                                $four_star_review++;
                            }

                            if ($row["rating_value"] == '3') {
                                $three_star_review++;
                            }

                            if ($row["rating_value"] == '2') {
                                $two_star_review++;
                            }

                            if ($row["rating_value"] == '1') {
                                $one_star_review++;
                            }

                            $total_review++;

                            $total_user_rating = $total_user_rating + $row["rating_value"];

                        }


                        if ($total_review == 0 || $total_user_rating == 0) {
                            $average_rating = 0;
                        } else {
                            $average_rating = $total_user_rating / $total_review;
                        }

                        ?>
                        <p align="center" style="color:#F96;font-size:20px">
                            <?php
                            if ($average_rating == 5 || $average_rating == 4.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <?php
                            }
                            if ($average_rating == 4 || $average_rating == 3.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 3 || $average_rating == 2.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 2 || $average_rating == 1.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 1) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 0) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            ?>

                        </p>
                        <?php

                        $output = array(
                            'average_rating' => number_format($average_rating, 1),
                            'total_review' => $total_review,
                            'five_star_review' => $five_star_review,
                            'four_star_review' => $four_star_review,
                            'three_star_review' => $three_star_review,
                            'two_star_review' => $two_star_review,
                            'one_star_review' => $one_star_review,
                            'review_data' => $review_content
                        );

                        ?>
                        
                        <button class="btn btn-sm btn-outline-primary"
                            onclick="addCart(<?php echo $data['product_id']; ?>)">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<style>
    .product-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        height: 100%;
    }

    .product-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 10px;
        height: 150px;
        object-fit: cover;
    }

    .product-details h5 {
        font-size: 1.2em;
        margin-bottom: 10px;
        color: #333;
    }

    .product-details p {
        color: #666;
        margin-bottom: 5px;
    }

    .product-card button {
        margin-top: 10px;
        display: inline-flex;
        align-items: center;
    }

    .product-card button i {
        margin-right: 5px;
    }
</style>