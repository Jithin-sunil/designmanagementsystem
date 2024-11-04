<?php
include("../Asset/Connection/connection.php");

session_start();



if(isset($_POST["btnsave"]))
{
	$insQry="update tbl_designer set designer_name='".$_POST["txtname"]."',designer_email='".$_POST["txtemail"]."',designer_contact='".$_POST["txtcontact"]."' where designer_id='".$_SESSION["designerid"]."'";
	mysql_query($insQry);
	header("location:MyProfile.php");
}


	$selDesigner="select * from tbl_designer where designer_id='".$_SESSION["designerid"]."'";
	$dataDesigner=mysql_query($selDesigner);
	$rowDesigner=mysql_fetch_array($dataDesigner);
	
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MyProfile</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form method="post">
<table align="center">
<tr>
		<td>Name</td>
        <td><input type="text" name="txtname" value="<?php echo $rowDesigner["designer_name"]?>" required placeholder="Enter Name"></td>
</tr>
<tr>
		<td>Contact</td>
        <td><input type="text" name="txtcontact" value="<?php echo $rowDesigner["designer_contact"]?>" required placeholder="Enter Contact"></td>
</tr>
<tr>
		<td>Email</td>
        <td><input type="email" name="txtemail" value="<?php echo $rowDesigner["designer_email"]?>" required placeholder="Enter Email"></td>
</tr>
<tr>
        <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="UPDATE">
        <input type="reset" name="btncancel" id="btncancel" value="CANCEL"></td>
      </tr>

</table>
</form>
</body>
</html>