<?php
include("../Asset/Connection/connection.php");

session_start();

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
<table align="center">
<tr>
		<td>Name</td>
        <td><?php echo $rowDesigner["designer_name"]?></td>
</tr>
<tr>
		<td>Contact</td>
        <td><?php echo $rowDesigner["designer_contact"]?></td>
</tr>
<tr>
		<td>Email</td>
        <td><?php echo $rowDesigner["designer_email"]?></td>
</tr>
<tr>
		<td>Password</td>
        <td><?php echo $rowDesigner["designer_password"]?></td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="EditProfle.php">EditProfle</a>/<a href="ChangePassword.php">ChangePassword</a>
</td>
</tr>
</table>
</body>
</html>