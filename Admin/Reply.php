<?php

include("../Asset/Connection/connection.php");                                         
If(isset($_POST["btn_sub"]))
{
	$complaint_reply=$_POST["complaint_reply"];

	$insqry="update  tbl_complaint set complaint_reply='".$complaint_reply."',complaint_status='1' where complaint_id=".$_GET['cid'];
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('complaint reply submitted')
		window.location="ReplyedComplaints.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		
		</script>
        <?php
	}
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
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <h1>Complaint Reply</h1>
            <table class="table table-bordered" style="width: 623px;">
                <tr>
                    <td width="175"><div align="center">Reply</div></td>
                    <td width="336">
                        <textarea class="form-control" name="complaint_reply" id="complaint_reply" cols="45" rows="5"></textarea>
                    </td>
                    <td width="90">
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btn_sub" id="btn_sub" value="Submit" />
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>