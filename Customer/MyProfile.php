<?php
include("../Asset/Connection/connection.php");

session_start();
include("Head.php");


	$selCustomer="select * from tbl_customer where customer_id='".$_SESSION["customerid"]."'";
	$dataCustomer=mysql_query($selCustomer);
	$rowCustomer=mysql_fetch_array($dataCustomer);
	
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
        <td><?php echo $rowCustomer["customer_name"]?></td>
</tr>
<tr>
		<td>Contact</td>
        <td><?php echo $rowCustomer["customer_contact"]?></td>
</tr>
<tr>
		<td>Email</td>
        <td><?php echo $rowCustomer["customer_email"]?></td>
</tr>
<tr>
		<td>Password</td>
        <td><?php echo $rowCustomer["customer_password"]?></td>
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