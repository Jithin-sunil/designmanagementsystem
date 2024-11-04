<?php
include("../Asset/Connection/Connection.php");
session_start();                                        
If(isset($_POST["btn_sub"]))
{
	$complaint_type=$_POST["sel_type"];
	
	$complaintcontent=$_POST["complaintcontent_name"];
   


	$insqry="insert into tbl_complaint(complainttype_id,complaint_content,shop_id,booking_id,complaint_date) values('".$complaint_type."','".$complaintcontent."','".$_SESSION['shopid']."','".$_GET['bid']."',curdate())";
	
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
  </div>
</form>
</body>
</html>