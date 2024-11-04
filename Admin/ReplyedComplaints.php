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
    <h1 class="text-center">User Complaints</h1>
    
        <div class="text-center">
            <table class="table table-bordered" style="width: 533px;">
                <tr>
                    <td>SL no</td>
                    <td>User Name</td>
                    <td>Complaint Title</td>
                    <td>Complaint Content</td>
                    
                    <td>Action</td>
                </tr>
                <?php
                $selqry="select * from tbl_complaint c inner join tbl_booking b on b.booking_id = c.booking_id 
                inner join tbl_cart ca on ca.booking_id=b.booking_id inner join tbl_complainttype t on c.complaint_typeid=t.complaint_typeid inner join tbl_user u on c.user_id=u.user_id where complaint_status = '0'";
                 $data=mysql_query($selqry);
                $i=0;
                while($row=mysql_fetch_array($data))
                {
                    $i++;

                   ?>
                   <tr>
                    <td><?php echo  $i ?></td>
                    <td><?php echo $row['user_name']?></td>
                    <td><?php echo $row["type_name"]?></td>
                    <td><?php echo $row["complaint_content"]?></td>
                    <td>
                    <?php echo $row['complaint_reply']?>
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
            $selqry="select * from tbl_complaint c inner join tbl_seller s on c.seller_id=s.seller_id where complaint_status='1'";
             $data=mysql_query($selqry);
            $i=0;
            while($row=mysql_fetch_array($data))
            {
                $i++;

               ?>
               <tr>
                <td><?php echo  $i ?></td>
                <td><?php echo $row['seller_name']?></td>
                <td><?php echo $row["type_name"]?></td>
                <td><?php echo $row["complaint_content"]?></td>
                <td>
                <?php echo $row['complaint_reply']?>
                </td>
               
            </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
    <h1 class="text-center">Agent Complaints</h1>
    
    <div class="text-center">
        <table class="table table-bordered" style="width: 533px;">
            <tr>
                <td>SL no</td>
                <td>Agent Name</td>
                <td>Complaint Title</td>
                <td>Complaint Content</td>
                
                <td>Action</td>
            </tr>
            <?php
             $selqry="select * from tbl_complaint c inner join tbl_agent s on c.agent_id=s.agent_id where complaint_status='1'";
             $data=mysql_query($selqry);
            $i=0;
            while($row=mysql_fetch_array($data))
            {
                $i++;

               ?>
               <tr>
                <td><?php echo  $i ?></td>
                <td><?php echo $row['agent_name']?></td>
                <td><?php echo $row["type_name"]?></td>
                <td><?php echo $row["complaint_content"]?></td>
                <td>
                <?php echo $row['complaint_reply']?>
                </td>
               
            </tr>
            <?php
            }
            ?>
            
        </table>
    </div>

    <h1 class="text-center">LorryOwner Complaints</h1>
    
    <div class="text-center">
        <table class="table table-bordered" style="width: 533px;">
            <tr>
                <td>SL no</td>
                <td>LorryOwner Name</td>
                <td>Complaint Title</td>
                <td>Complaint Content</td>
                
                <td>Action</td>
            </tr>
            <?php
             $selqry="select * from tbl_complaint c inner join tbl_lorryowner s on c.lorryowner_id=s.lorryowner_id where complaint_status='1'";
             $data=mysql_query($selqry);
            $i=0;
            while($row=mysql_fetch_array($data))
            {
                $i++;

               ?>
               <tr>
                <td><?php echo  $i ?></td>
                <td><?php echo $row['lorryowner_name']?></td>
                <td><?php echo $row["type_name"]?></td>
                <td><?php echo $row["complaint_content"]?></td>
                <td>
                <?php echo $row['complaint_reply']?>
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