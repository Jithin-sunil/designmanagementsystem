<?php
include("../Asset/Connection/Connection.php");
session_start();                                        
If(isset($_POST["btn_sub"]))
{
	$complaint_type=$_POST["sel_type"];
	
	$complaintcontent=$_POST["complaintcontent_name"];
   


	$insqry="insert into tbl_complaint(complainttype_id,complaint_content,designer_id,complaint_date) values('".$complaint_type."','".$complaintcontent."','".$_SESSION['designerid']."',curdate())";
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('complaint submitted')
		window.location="Complaint.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		window.location="Complaint.php"
		</script>
        <?php
	}
}

$selqry="select * from tbl_complaint c inner join tbl_booking b on b.booking_id = c.booking_id 
    inner join tbl_cart ca on ca.booking_id=b.booking_id inner join tbl_complainttype t on c.complainttype_id=t.complainttype_id where c.designer_id=".$_SESSION['designerid'];
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
 <h1 align="center">COMPLAINT</h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
   
    <table width="200" border="1">
      <tr>
        <td>Complaint Title</td>
        <td> <select name="sel_type" id="">
            <option value="">--Select--</option>
            <?php
            $sel= " select * from tbl_complainttype  ";
            $res=mysql_query($sel);
            while($row=mysql_fetch_array($res))
            {
                ?>
            <option value="<?php echo $row['complainttype_id'];?>"><?php echo $row['complainttype_name'];?></option>
            <?php
            }
            ?>
        </select>
      </tr>
      <tr>
        <td>complaint Content</td>
        <td><label for="complaintcontent_name">
          <textarea name="complaintcontent_name" id="complaintcontent_name" cols="45" rows="5"></textarea>
        </label></td>
      </tr>
      
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
        </div></td>
      </tr>
    </table>
    <br><br>
    <table>
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
                    <td><a href="Complaint.php?cid=<?php echo $row["complaint_id"] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php
                }
                ?>
    </table>
  </div>
</form>
</body>
</html>