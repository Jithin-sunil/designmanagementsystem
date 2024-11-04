<?php
include("../Asset/Connection/connection.php");

session_start();



if(isset($_POST["btnsave"]))
{
	$insQry="update tbl_shop set shop_name='".$_POST["txtname"]."',shop_email='".$_POST["txtemail"]."',shop_contact='".$_POST["txtcontact"]."',shop_location='".$_POST["txtlocation"]."' where shop_id='".$_SESSION["shopid"]."'";
	mysql_query($insQry);
	header("location:MyProfile.php");
}


	$selShop="select * from tbl_shop where shop_id='".$_SESSION["shopid"]."'";
	$dataShop=mysql_query($selShop);
	$rowShop=mysql_fetch_array($dataShop);
	
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
        <td><input type="text" name="txtname" value="<?php echo $rowShop["shop_name"]?>" required placeholder="Enter Name"></td>
</tr>
<tr>
		<td>Location</td>
        <td><input type="text" name="txtlocation" value="<?php echo $rowShop["shop_location"]?>" required placeholder="Enter Location"></td>
</tr>
<tr>
		<td>Contact</td>
        <td><input type="text" name="txtcontact" value="<?php echo $rowShop["shop_contact"]?>" required placeholder="Enter Contact"></td>
</tr>
<tr>
		<td>Email</td>
        <td><input type="email" name="txtemail" value="<?php echo $rowShop["shop_email"]?>" required placeholder="Enter Email"></td>
</tr>
<tr>
        <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="UPDATE">
        <input type="reset" name="btncancel" id="btncancel" value="CANCEL"></td>
      </tr>

</table>
</form>
</body>
</html>