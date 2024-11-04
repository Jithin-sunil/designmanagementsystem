<?php
include("../Asset/Connection/Connection.php");

session_start();
$message="";
if(isset($_POST["btnsubmit"]))
{
	$selAdmin="select * from tbl_admin where admin_email='".$_POST["txtEmail"]."' and admin_password='".$_POST["txtPassword"]."'";
	$dataAdmin=mysql_query($selAdmin);
	
$selNewCustomer="select * from tbl_customer where customer_email='".$_POST["txtEmail"]."' and customer_password='".$_POST["txtPassword"]."'";
	$dataNewCustomer=mysql_query($selNewCustomer);
	
	$selDesigner="select * from tbl_designer where designer_email='".$_POST["txtEmail"]."' and designer_password='".$_POST["txtPassword"]."'";
	$dataDesigner=mysql_query($selDesigner);
	
	$selShop="select * from tbl_shop where shop_email='".$_POST["txtEmail"]."' and shop_password='".$_POST["txtPassword"]."'";
	$dataShop=mysql_query($selShop);
	
	if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
		$_SESSION["adminid"]=$rowAdmin["admin_id"];
		$_SESSION["adminname"]=$rowAdmin["admin_name"];
		header("location:../Admin/HomePage.php");
	}
	else if($rowNewCustomer=mysql_fetch_array($dataNewCustomer))
	{
		$_SESSION["customerid"]=$rowNewCustomer["customer_id"];
		$_SESSION["customername"]=$rowNewCustomer["customer_name"];
		header("location:../customer/HomePage.php");
	}
	else if($rowDesigner=mysql_fetch_array($dataDesigner))
	{
		$_SESSION["designerid"]=$rowDesigner["designer_id"];
		$_SESSION["designername"]=$rowDesigner["designer_name"];
		header("location:../Designer/HomePage.php");
	}
	else if($rowShop=mysql_fetch_array($dataShop))
	{
		$_SESSION["shopid"]=$rowShop["shop_id"];
		$_SESSION["shopname"]=$rowShop["shop_name"];
		header("location:../Shop/HomePage.php");
	}
	else
	{
		$message="Invalid Login!!!";
	}
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="login-container">
        <form id="form1" name="form1" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail" id="txtEmail" required placeholder="Enter EmailID">
            </div>
            <div class="input-group">
                <label for="txtPassword">Password</label>
                <input type="password" name="txtPassword" id="txtPassword" required placeholder="Enter Password">
            </div>
            <div class="form-actions">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Login">
            </div>
            <div class="message">
                <?php echo $message; ?>
            </div>
        </form>
    </div>
</body>
</html>