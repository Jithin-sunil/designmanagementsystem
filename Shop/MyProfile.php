<?php
include("../Asset/Connection/connection.php");

session_start();

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
<table align="center">
<tr>
		<td>Name</td>
        <td><?php echo $rowShop["shop_name"]?></td>
</tr>
<tr>
		<td>Contact</td>
        <td><?php echo $rowShop["shop_contact"]?></td>
</tr>
<tr>
		<td>Email</td>
        <td><?php echo $rowShop["shop_email"]?></td>
</tr>
<tr>
		<td>Password</td>
        <td><?php echo $rowShop["shop_password"]?></td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="EditProfle.php">EditProfle</a>/<a href="ChangePassword.php">ChangePassword</a>
</td>
</tr>
</table>
</body>
</html>