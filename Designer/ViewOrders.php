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
            <th>Design</th>
            <th>Amount</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_cart c 
                                INNER JOIN tbl_design p ON c.design_id = p.design_id 
                                INNER JOIN tbl_booking b ON c.booking_id = b.booking_id 
                                INNER JOIN tbl_shop s  ON s.shop_id = b.shop_id 
                                
                                WHERE booking_status=2 AND p.shop_id = " . $_SESSION['shopid'];
        $result = mysql_query($selQry);
        $i = 0;
        while ($data = mysql_fetch_array($result)) {
            $total_price = $data['booking_amount'];
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="../Asset/File/Design/<?php echo $data['design_image']; ?>"
                        alt="<?php echo $data['design_name']; ?>"></td>
                <td><?php echo $data['design_name']; ?></td>
                <td><?php echo $data['design_price']; ?></td>

                <td><?php echo $total_price; ?></td>
                <td>
                    <?php
                     if ($datacart['cart_status'] == 1) {
                        echo "Design has not Ready tp send";
                    } else if ($datacart['cart_status'] == 2) {
                        echo "Design is, Ready for Send";
                    } else if ($datacart['cart_status'] == 3) {
                        echo "Design has been Sended";
                    } else if ($datacart['cart_status'] == 4) {
                        echo "Order completed";
                    }
                    ?>

                </td>
                <td>
                    <?php
                    if ($data['cart_status'] == 1) {
                        ?><a href="ViewOrders.php?st=2&id=<?php echo $data['cart_id'] ?>">Ready To Send</a><?php
                    } elseif ($data['cart_status'] == 2) {
                        ?><a href="ViewOrders.php?st=3&id=<?php echo $data['cart_id'] ?>">Sended</a><?php
                    } elseif ($data['cart_status'] == 3) {
                        ?><a href="ViewOrders.php?st=4&id=<?php echo $data['cart_id'] ?>">Completed</a><?php
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