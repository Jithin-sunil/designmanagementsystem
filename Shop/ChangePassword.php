<?php
include("../Asset/Connection/connection.php");

session_start();

$message="";


if(isset($_POST["btnsave"]))
{
	
	$selShop="select * from tbl_shop where shop_id='".$_SESSION["shopid"]."' and shop_password='".$_POST["txtcurrent"]."'";
	$dataShop=mysql_query($selShop);
	if($rowShop=mysql_fetch_array($dataShop))
	{
		$newpassword=$_POST["txtnew"];
		$confirmpwd=$_POST["txtconfirm"];
		if($newpassword==$confirmpwd)
		{
			$insQry="update tbl_shop set shop_password='".$_POST["txtconfirm"]."' where shop_id='".$_SESSION["shopid"]."'";
			mysql_query($insQry);
			echo $insQry;
			//header("location:../Guest/Login.php");
		}
		else
		{
			$message="Pasword not same...";
		}
	}
	else
	{
		$message="Pasword not correct...";
		
	}


}
	
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
  <table width="200" border="1">
    <tbody>
      <tr>
        <td>Current Password</td>
        <td>
        <input type="password" name="txtcurrent" id="txtcurrent" required placeholder="Enter Password"></td>
      </tr>
      <tr>
        <td>New Password</td>
        <td>
        <input type="password" name="txtnew" id="txtnew" required placeholder="Enter New password"></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>
        <input type="password" name="txtconfirm" id="txtconfirm" required placeholder="Enter Confirm password"></td>
      </tr>
       <tr>
        <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="UPDATE">
        <input type="reset" name="btncancel" id="btncancel" value="CANCEL"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo $message?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>