<?php
include("../Asset/Connection/Connection.php"); 
session_start();
include("Head.php");

ob_start();
  

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table >
                    <tr>
                        <th>SlNo</th>
                        <th>Photo</th>
                        <th>Product</th>
                        <th>Amount</th>
                       
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $selcart="select * from tbl_booking b inner join tbl_cart c on b.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id where booking_status=2 and customer_id=".$_SESSION['customerid'];

                    $resultcart = mysql_query($selcart);
                    $i = 0;
                    while ($datacart = mysql_fetch_array($resultcart)) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img src="../Asset/File/Product/<?php echo $datacart['product_image']; ?>" alt="Product Photo"></td>
                            <td><?php echo $datacart['product_name']; ?></td>
                            <td><?php echo $datacart['product_prize']; ?></td>
                           
                            <td><?php echo $datacart['booking_amount'] ?></td>
                            <td>
                                <?php
                                if ($datacart['cart_status'] == 1) {
                                    echo "Item has not packed";
                                } else if ($datacart['cart_status'] == 2) {
                                    echo "Item Packed, Ready for shipping";
                                } else if ($datacart['cart_status'] == 3) {
                                    echo "Item has been Shipped";
                                } else if ($datacart['cart_status'] == 4) {
                                    echo "Item Delivery completed";
                                }
                                ?>
                            </td>
                            <td><a href="Complaint.php?pid=<?php echo $datacart['booking_id']; ?>" class="btn btn-primary">Complaint</a></td>
                            <td><a href="Review.php?pid=<?php echo $datacart['product_id']; ?>" class="btn btn-primary">Rating</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
</html>
<?php
include("Foot.php");
?>