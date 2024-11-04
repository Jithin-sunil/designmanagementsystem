<?php
include("../Asset/Connection/connection.php");

session_start();
include("Head.php");

$message="";


if(isset($_POST["btnsave"]))
{
	
	$selCustomer="select * from tbl_customer where customer_id='".$_SESSION["customerid"]."' and customer_password='".$_POST["txtcurrent"]."'";
	$dataCustomer=mysql_query($selCustomer);
	if($rowCustomer=mysql_fetch_array($dataCustomer))
	{
		$newpassword=$_POST["txtnew"];
		$confirmpwd=$_POST["txtconfirm"];
		if($newpassword==$confirmpwd)
		{
			$insQry="update tbl_customer set customer_password='".$_POST["txtconfirm"]."' where customer_id='".$_SESSION["customerid"]."'";
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
<title>Untitled Document</title>
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
        <input type="password" name="txtconfirm" id="txtconfirm" required placeholder="Enter confirm password"></td>
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
<?php 
include("Foot.php");
?>