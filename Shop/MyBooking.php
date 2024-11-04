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
                        <th>design</th>
                        <th>Amount</th>
                       
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $selcart="select * from tbl_booking b inner join tbl_cart c on b.booking_id=c.booking_id inner join tbl_design p on p.design_id=c.design_id inner join tbl_designer ds on d.designer_id=ds.designer_id where booking_status=2 and shop_id=".$_SESSION['shopid'];

                    $resultcart = mysql_query($selcart);
                    $i = 0;
                    while ($datacart = mysql_fetch_array($resultcart)) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img src="../Asset/File/Design/<?php echo $datacart['design_image']; ?>" alt="design Photo"></td>
                            <td><?php echo $datacart['design_name']; ?></td>
                            <td><?php echo $datacart['design_prize']; ?></td>
                           
                            <td><?php echo $datacart['booking_amount'] ?></td>
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
                            <td><a href="Complaint.php?pid=<?php echo $datacart['booking_id']; ?>" class="btn btn-primary">Complaint</a></td>
                            <td><a href="Review.php?pid=<?php echo $datacart['designer_id']; ?>" class="btn btn-primary">Rating</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
</html>
<?php
include("Foot.php");
?>