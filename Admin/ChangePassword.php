<?php
include("../Asset/Connection/connection.php");

session_start();
include("Head.php");


$message="";


if(isset($_POST["btnsave"]))
{
	
	$selAdmin="select * from tbl_admin where admin_id='".$_SESSION["adminid"]."' and admin_password='".$_POST["txtcurrent"]."'";
	$dataAdmin=mysql_query($selAdmin);
	if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
		$newpassword=$_POST["txtnew"];
		$confirmpwd=$_POST["txtconfirm"];
		if($newpassword==$confirmpwd)
		{
			$insQry="update tbl_admin set admin_password='".$_POST["txtconfirm"]."' where admin_id='".$_SESSION["adminid"]."'";
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
  <table width="377" height="160" border="1" align="center">
    <tbody>
      <tr>
        <td>Current Password</td>
        <td>
        <input type="password" name="txtcurrent" id="txtcurrent" required placeholder="Enter Password"></td>
      </tr>
      <tr>
        <td>New Password</td>
        <td>
        <input type="password" name="txtnew" id="txtnew" required placeholder="Enter New Password"></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>
        <input type="password" name="txtconfirm" id="txtconfirm" required placeholder="Enter Confirm Password"></td>
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