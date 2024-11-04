<?php

session_start();
include("../Asset/Connection/Connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
            />
        <style>
            .design-image {
                float: left;
                width: 15%;
            }

            .design-details {
                float: left;
                width: 20%;
            }

            .design-price {
                float: left;
                width: 12%;
            }

            .design-quantity {
                float: left;
                width: 16%;
            }

            .design-removal {
                float: left;
                width: 9%;
            }

            .design-line-price {
                float: left;
                width: 12%;
                text-align: right;
            }

            /* This is used as the traditional .clearfix class */
            .group:before,
            .shopping-cart:before,
            .column-labels:before,
            .design:before,
            .totals-item:before,
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .design:after,
            .totals-item:after {
                content: "";
                display: table;
            }

            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .design:after,
            .totals-item:after {
                clear: both;
            }

            .group,
            .shopping-cart,
            .column-labels,
            .design,
            .totals-item {
                zoom: 1;
            }

            /* Apply clearfix in a few places */
            /* Apply dollar signs */
            .design .design-price:before,
            .design .design-line-price:before,
            .totals-value:before {
                content: "₹";
            }

            /* Body/Header stuff */
            body {
                padding: 0px 30px 30px 20px;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                    "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
            }

            h1 {
                font-weight: 100;
            }

            label {
                color: #aaa;
            }

            .shopping-cart {
                margin-top: -45px;
            }

            /* Column headers */
            .column-labels label {
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
            .column-labels .design-image,
            .column-labels .design-details,
            .column-labels .design-removal {
                text-indent: -9999px;
            }

            /* design entries */
            .design {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .design .design-image {
                text-align: center;
            }
            .design .design-image img {
                width: 100px;
            }
            .design .design-details .design-title {
                margin-right: 20px;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .design .design-details .design-description {
                margin: 5px 20px 5px 0;
                line-height: 1.4em;
            }
            .design .design-quantity input {
                width: 40px;
            }
            .design .remove-design {
                border: 0;
                padding: 4px 8px;
                background-color: #c66;
                color: #fff;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                font-size: 12px;
                border-radius: 3px;
            }
            .design .remove-design:hover {
                background-color: #a44;
            }

            /* Totals section */
            .totals .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;
            }
            .totals .totals-item label {
                float: left;
                clear: both;
                width: 79%;
                text-align: right;
            }
            .totals .totals-item .totals-value {
                float: right;
                width: 21%;
                text-align: right;
            }
            .totals .totals-item-total {
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }

            .checkout {
                float: right;
                border: 0;
                margin-top: 20px;
                padding: 6px 25px;
                background-color: #6b6;
                color: #fff;
                font-size: 25px;
                border-radius: 3px;
            }

            .checkout:hover {
                background-color: #494;
            }

            /* Make adjustments for tablet */
            @media screen and (max-width: 650px) {
                .shopping-cart {
                    margin: 0;
                    padding-top: 20px;
                    border-top: 0px solid #eee;
                }

                .column-labels {
                    display: none;
                }

                .design-image {
                    float: right;
                    width: auto;
                }
                .design-image img {
                    margin: 0 0 10px 10px;
                }

                .design-details {
                    float: none;
                    margin-bottom: 10px;
                    width: auto;
                }

                .design-price {
                    clear: both;
                    width: 70px;
                }

                .design-quantity {
                    width: 100px;
                }
                .design-quantity input {
                    margin-left: 20px;
                }

                .design-quantity:before {
                    content: "x";
                }

                .design-removal {
                    width: auto;
                }

                .design-line-price {
                    float: left	;
                    width: 70px;
                }
            }
            /* Make more adjustments for phone */
            @media screen and (max-width: 350px) {
                .design-removal {
                    float: right;
                }

                .design-line-price {
                    float: right;
                    clear: left;
                    width: auto;
                    margin-top: 10px;
                }

                .design .design-line-price:before {
                    content: "Item Total: ₹";
                }

                .totals .totals-item label {
                    width: 60%;
                }
                .totals .totals-item .totals-value {
                    width: 40%;
                }
            }


            label{
                margin: 0px 15px;
            }



            /*SWITCH 2 ------------------------------------------------*/
            .switch2{
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
                border-radius: 27px;
                background-color: #bdc3c7;
                cursor: pointer;
                transition: all .3s;
            }
            .switch2 input{
                display: none;
            }
            .switch2 input:checked + div{
                left: calc(100% - 40px);
            }
            .switch2 div{
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 25px;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                transition: all .2s;
            }

            .switch2-checked{
                background-color: #2ecc71;
            }


        </style>
    </head>
    <?php
       
        if (isset($_POST["btn_checkout"])) {
                 
                 $amt = $_POST["carttotalamt"];
                
                
                $selC = "select * from tbl_booking where shop_id='" .$_SESSION["shopid"]. "'and booking_status='0'";
                $rs = mysql_query($selC);
                $row=mysql_fetch_array($rs);
                
                $upQry1 = "update tbl_booking set booking_date=curdate(),booking_amount='".$amt."',booking_status='1' where shop_id='" .$_SESSION["shopid"]. "'";
				mysql_query($upQry1);
				
				 $upQry1 = "update tbl_cart set cart_status='1' where booking_id='" .$row["booking_id"]. "'";
                if(mysql_query($upQry1))
                {
					
					
					if(isset($_POST["cb_checkout"]))
					{
                        $_SESSION['bid']=$row['booking_id'];
						?>
                    <script>
					window.location="Payment.php";
					</script>
                    <?php
					}
					else
					{
						?>
							<script>
                            window.location="MyBooking.php";
                            </script>
                            <?php
					}
					
                   
         		  	
					
                }
                 
                
                
   
        }


    ?>
    <body onload="recalculateCart()" style="padding:0px">
    <?php
    ob_start();
    
    ?>
    <br><br><br><br><br>
    <div style="padding: 30px;" align="center">
        <h1>Cart</h1>
        <br>
        <br>
            <div class="column-labels">
                <label class="design-price" style="width: 13%; text-align:center">Image</label>
                <label class="design-price" style="width: 16%; text-align:center">Details</label>	
                <label class="design-price" style="width: 10%; text-align:center">Price</label>
                
                <label class="design-price" style="width: 10%; text-align:center">Remove</label>
                <label class="design-price" style="width: 16%; text-align:center">Total</label>
            </div>
<form method="post">
        <div class="shopping-cart" style="margin-top: 50px">            <?php                
             $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.shop_id='" .$_SESSION["shopid"]. "' and booking_status='0' and cart_status=0";
            $res = mysql_query($sel);
                while ($row=mysql_fetch_array($res)) {
                    $selPr = "select * from tbl_design where design_id='" .$row["design_id"]. "'";
                    $respr = mysql_query($selPr);
                    if ($rowpr=mysql_fetch_array($respr)) {
                       
            ?>

            <div class="design">
                <div class="design-image">
                    <img
                        src="../Asset/File/Design/<?php echo $rowpr
                        ["design_photo"]?>"
                        />
                </div>
                <div class="design-details">
                    <div class="design-title"><?php echo $rowpr["design_name"] ?></div>
                    <p class="design-description">
                    <?php echo $rowpr["design_details"] ?>
                    </p>
                </div>
                <div class="design-price "	><?php echo $rowpr["design_rate"] ?></div>
               
                <div class="design-removal">
                    <button class="remove-design" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </div>
                <div class="design-line-price">
                    <?php
                        $pr = $rowpr["design_rate"];
                       
                        echo $pr;
                    ?>
                </div>
            </div>
            <?php
                    }
                
              
                }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value=""/>
                </div>
            </div>
            
            
             	<span >COD</span>
                <label class="switch2 switch2-checked">
                    <input type="checkbox" name="cb_checkout" checked />
                    <div></div>
                </label>
                <span>Card Payment</span>
                
                
                
                <button type="submit" class="checkout" name="btn_checkout">Checkout</button>
            

        </div>
</form>
        <!-- partial -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
        /* Set rates + misc */
        var fadeTime = 300;

        /* Assign actions */
        $(".design-quantity select").change(function() {
			
			$.ajax({
                url: "../Asset/AjaxPages/AjaxCart.php?action=Update&id=" + this.id + "&qty=" + this.value
            });
            updateQuantity(this);

        });

        $(".design-removal button").click(function() {

            $.ajax({
                url: "../Asset/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });

        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;

            /* Sum up row totals */
            $(".design").each(function() {
                subtotal += parseFloat(
                        $(this).children(".design-line-price").text()
                        );
            });

            /* Calculate totals */
            var total = subtotal;

            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }

        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var designRow = $(quantityInput).parent().parent();
            var price = parseFloat(designRow.children(".design-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
            /* Update line price display and recalc cart totals */
            designRow.children(".design-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }

        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var designRow = $(removeButton).parent().parent();
            designRow.slideUp(fadeTime, function() {
                designRow.remove();
                recalculateCart();
            });

        }

        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
    </div>
    </body>
    <?php
    
    ob_flush();
    ?>
</html>