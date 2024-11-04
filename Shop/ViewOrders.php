<?php
include("../Asset/Connection/Connection.php");
session_start();
ob_start();

if (isset($_GET['id'])) {
    $updQry = "update tbl_cart set cart_status=" . $_GET['st'] . " where cart_id=" . $_GET['id'];
    if (mysql_query($updQry)) {
        ?>
        <script>
            alert('Updated');
            window.location = 'ViewOrders.php'
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Failed');
            window.location = 'ViewOrders.php'
        </script>
        <?php
    }
}


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
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_cart c 
                                INNER JOIN tbl_product p ON c.product_id = p.product_id 
                                INNER JOIN tbl_booking b ON c.booking_id = b.booking_id 
                                WHERE booking_status=2 AND p.shop_id = " . $_SESSION['shopid'];
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
                <td>
                    <?php
                    if ($data['cart_status'] == 1) {
                        ?><a href="ViewOrders.php?st=2&id=<?php echo $data['cart_id'] ?>">Item Packed</a><?php
                    } elseif ($data['cart_status'] == 2) {
                        ?><a href="ViewOrders.php?st=3&id=<?php echo $data['cart_id'] ?>">Shipped</a><?php
                    } elseif ($data['cart_status'] == 3) {
                        ?><a href="ViewOrders.php?st=4&id=<?php echo $data['cart_id'] ?>">Delivered</a><?php
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