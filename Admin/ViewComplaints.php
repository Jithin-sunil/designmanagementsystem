<?php	
session_start();
include("../Asset/Connection/Connection.php");
  include("Head.php");                                     
	
	 
	 
	 
?>
<?php
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">customer Complaints</h1>
    
        <div class="text-center">
            <table class="table table-bordered" style="width: 533px;">
                <tr>
                    <td>SL no</td>
                    <td>customer Name</td>
                    <td>Complaint Title</td>
                    <td>Complaint Content</td>
                    
                    <td>Action</td>
                </tr>
                <?php
                $selqry="select * from tbl_complaint c inner join tbl_booking b on b.booking_id = c.booking_id 
                inner join tbl_cart ca on ca.booking_id=b.booking_id inner join tbl_complainttype t on c.complainttype_id=t.complainttype_id inner join tbl_customer u on c.customer_id=u.customer_id where complaint_status = '0'";
                 $data=mysql_query($selqry);
                $i=0;
                while($row=mysql_fetch_array($data))
                {
                    $i++;

                   ?>
                   <tr>
                    <td><?php echo  $i ?></td>
                    <td><?php echo $row['customer_name']?></td>
                    <td><?php echo $row["complainttype_name"]?></td>
                    <td><?php echo $row["complaint_content"]?></td>
                    <td>
                    <a href="Reply.php?cid=<?php echo $row['complaint_id'] ?>" class="btn btn-primary">Reply</a>
                    <a href="BookingDetails.php?bid=<?php echo $row['booking_id'] ?>" class="btn btn-danger">View BookingDetails</a>
                    </td>
                   
                </tr>
                <?php
                }
                ?>
                
            </table>
        </div>

        <h1 class="text-center">Shop Complaints</h1>
    
    <div class="text-center">
        <table class="table table-bordered" style="width: 533px;">
            <tr>
                <td>SL no</td>
                <td>Shop Name</td>
                <td>Complaint Title</td>
                <td>Complaint Content</td>
                
                <td>Action</td>
            </tr>
            <?php
            $selqry="select * from tbl_complaint c inner join tbl_shop s on c.shop_id=s.shop_id where complaint_status='0'";
             $data=mysql_query($selqry);
            $i=0;
            while($row=mysql_fetch_array($data))
            {
                $i++;

               ?>
               <tr>
                <td><?php echo  $i ?></td>
                <td><?php echo $row['shop_name']?></td>
                <td><?php echo $row["complainttype_name"]?></td>
                <td><?php echo $row["complaint_content"]?></td>
                <td>
                <a href="Reply.php?cid=<?php echo $row['complaint_id'] ?>" class="btn btn-primary">Reply</a>
                </td>
               
            </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
    <h1 class="text-center">Designer Complaints</h1>
    
    <div class="text-center">
        <table class="table table-bordered" style="width: 533px;">
            <tr>
                <td>SL no</td>
                <td>Designer Name</td>
                <td>Complaint Title</td>
                <td>Complaint Content</td>
                
                <td>Action</td>
            </tr>
            <?php
             $selqry="select * from tbl_complaint c inner join tbl_designer s on c.designer_id=s.designer_id where complaint_status='0'";
             $data=mysql_query($selqry);
            $i=0;
            while($row=mysql_fetch_array($data))
            {
                $i++;

               ?>
               <tr>
                <td><?php echo  $i ?></td>
                <td><?php echo $row['designer_name']?></td>
                <td><?php echo $row["complainttype_name"]?></td>
                <td><?php echo $row["complaint_content"]?></td>
                <td>
                <a href="Reply.php?cid=<?php echo $row['complaint_id'] ?>" class="btn btn-primary">Reply</a>
                <a href="BookingDetails.php?bid=<?php echo $row['booking_id'] ?>" class="btn btn-danger">View BookingDetails</a>

                </td>
               
            </tr>
            <?php
            }
            ?>
            
        </table>
    </div>


</div>
</body>
</html>
<?php
include("Foot.php");
?>