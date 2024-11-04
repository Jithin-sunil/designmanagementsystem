

<?php
session_start();
	include("../Asset/Connection/Connection.php");
	include("Head.php");
	

	if(isset($_POST["btnsubmit"]))
	{
		$inqry="insert into tbl_feedback(feedback_content,shop_id)values('".$_POST["feedback"]."','".$_SESSION['shopid']."')";
		mysql_query($inqry);
	}
    
	
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Feedback Content</td>
      <td><label for="txtcontent"></label>
      <input type="text" name="feedback" id="feedback" required placeholder="Enter Feedback"/></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<br/>
<br/>
<table border="1" align="center">
	<tr>
		<th>SI NO</th>
		<th>Feedback</th>
		<th>Action</th>
	</tr>
    <?php
			$selqry="select * from tbl_feedback";
			$data=mysql_query($selqry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
    <tr>
    		<td><?php echo $i ?></td>
            <td><?php echo $row["feedback_content"]?></td>
	</tr>
    <?php
			}
	?>

	<?php
	include("Foot.php");
	?>
