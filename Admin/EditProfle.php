<?php
include("../Asset/Connection/connection.php");

session_start();
include("Head.php");



if(isset($_POST["btnsave"]))
{
	$insQry="update tbl_admin set admin_name='".$_POST["txtname"]."',admin_email='".$_POST["txtemail"]."',admin_contact='".$_POST["txtcontact"]."' where admin_id='".$_SESSION["adminid"]."'";
	mysql_query($insQry);
	header("location:MyProfile.php");
}


	$selAdmin="select * from tbl_admin where admin_id='".$_SESSION["adminid"]."'";
	$dataAdmin=mysql_query($selAdmin);
	$rowAdmin=mysql_fetch_array($dataAdmin);
	
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
        <td><input type="text" name="txtname" value="<?php echo $rowAdmin["admin_name"]?>" required placeholder="Enter Name"></td>
</tr>
<tr>
		<td>Contact</td>
        <td><input type="text" name="txtcontact" value="<?php echo $rowAdmin["admin_contact"]?>" required placeholder="Enter Contact"></td>
</tr>
<tr>
		<td>Email</td>
        <td><input type="email" name="txtemail" value="<?php echo $rowAdmin["admin_email"]?>" required placeholder="Enter Email"></td>
</tr>
<tr>
        <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="UPDATE">
        <input type="reset" name="btncancel" id="btncancel" value="CANCEL"></td>
      </tr>

</table>
</form>
</body>
</html>


<?php
include("Foot.php");
?>