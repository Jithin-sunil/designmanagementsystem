<?php
include("../Asset/Connection/connection.php");

session_start();
include("Head.php");

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
<table align="center">
<tr>
		<td>Name</td>
        <td><?php echo $rowAdmin["admin_name"]?></td>
</tr>
<tr>
		<td>Contact</td>
        <td><?php echo $rowAdmin["admin_contact"]?></td>
</tr>
<tr>
		<td>Email</td>
        <td><?php echo $rowAdmin["admin_email"]?></td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="EditProfle.php">EditProfle</a>/<a href="ChangePassword.php">ChangePassword</a>
</td>
</tr>
</table>
</body>
</html>

<?php
include("Foot.php");
?>