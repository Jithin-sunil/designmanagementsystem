<?php
include("../Asset/Connection/Connection.php");
session_start();
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
    <table>
        <tr>
            <th>Sl No</th>
            <th>Photo</th>
            <th>Product</th>
            <th>Amount</th>
          
            <th>Total</th>
            <th>Status</th>
            
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_cart c 
                                INNER JOIN tbl_product p ON c.product_id = p.product_id 
                                INNER JOIN tbl_booking b ON c.booking_id = b.booking_id 
                                WHERE b.booking_id = " . $_GET['bid'];
        $result = mysql_query($selQry);
        $i = 0;
        while ($data = mysql_fetch_array($result)) {
            $total_price = $data['booking_amount'];
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="../Asset/File/Product/<?php echo $data['product_image']; ?>"
                        alt="<?php echo $data['product_name']; ?>"></td>
                <td><?php echo $data['product_name']; ?></td>
                <td><?php echo $data['product_prize']; ?></td>

                <td><?php echo $total_price; ?></td>
                <td>
                    <?php
                    if ($data['cart_status'] == 1) {
                        echo "New Order";
                    } elseif ($data['cart_status'] == 2) {
                        echo "Item Packed";
                    } elseif ($data['cart_status'] == 3) {
                        echo "Item Shipped";
                    } elseif ($data['cart_status'] == 4) {
                        echo "Item Delivered";
                    }
                    ?>

                </td>
                
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <hr>

</body>

</html>