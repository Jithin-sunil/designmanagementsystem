<?php	
session_start();
include("../Asset/Connection/Connection.php");
  include("Head.php");                                     
	$selqry="select * from tbl_complaint c inner join tbl_booking b on b.booking_id = c.booking_id 
    inner join tbl_cart ca on ca.booking_id=b.booking_id inner join tbl_complainttype t on c.complainttype_id=t.complainttype_id where c.shop_id=".$_SESSION['shopid'];
     $data=mysql_query($selqry);
	 
	
 if($_GET["cid"])
{
	$cid=$_GET["cid"];
	$delqry="delete from tbl_complaint where complaint_id='$cid'";
	mysql_query($delqry);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">My Complaints</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 533px;">
                <tr>
                    <td>SL no</td>
                    <td>Complaint Title</td>
                    <td>Complaint Content</td>
                    <td>Complaint Reply</td>
                    <td>Action</td>
                </tr>
                <?php
                $i=0;
                while($row=mysql_fetch_array($data))
                {
                    $i++;

                   ?>
                   <tr>
                    <td><?php echo  $i ?></td>
                    <td><?php echo $row["complainttype_name"]?></td>
                    <td><?php echo $row["complaint_content"]?></td>
                    <td>
                        <?php if ($row['complaint_status'] == 0) {
                            echo "Not Replyed.";
                         } else { ?>
                            <?php echo $row["complaint_reply"]; ?>
                        <?php } ?>
                    </td>
                    <td><a href="MyComplaints.php?cid=<?php echo $row["complaint_id"] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php
                }
                ?>
                
            </table>
        </div>
    </form>
</div>
</body>
</html>
<?php
include("Foot.php");
?>