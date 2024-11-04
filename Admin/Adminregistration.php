<?php
		include("../Asset/Connection/Connection.php");
    include("Head.php");
		if(isset($_POST["save"]))
		{
			$insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('".$_POST["name1"]."','".$_POST["contact1"]."','".$_POST["email1"]."','".$_POST["pass1"]."')";
			
			mysql_query($insQry);
		}
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_admin where admin_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:Adminregistration.php");
		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AdminRegistration</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
  <table width="270" border="1" align="center">
    <tbody>
      <tr>
        <td width="60">Name</td>
        <td width="144"><input type="text" name="name1" id="name1" required placeholder="Enter Name"></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><input type="text" name="contact1" id="contact1" required placeholder="Enter Contact"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email1" id="email1" required placeholder="Enter Email">></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="pass1" id="pass1" required placeholder="Enter Password">></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="save" id="save" value="Save"/>
        <input type="submit" name="cancel" id="cancel" value="Cancel"/></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
<table border="1" align="center">
<tr>
<th>Sl.no</th>
<th>Name</th>
<th>Contact</th>
<th>Email</th>
<th>Password</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_admin";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["admin_name"]?></td>
    <td><?php echo $row["admin_contact"]?></td>
    <td><?php echo $row["admin_email"]?></td>
    <td><?php echo $row["admin_password"]?></td>
<td><a href="Adminregistration.php?delID=<?php echo $row["admin_id"]?>">Delete</a></td>
</tr>
<?php
}
?>


<script src="../Asset/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
	  
    $.ajax({
      url: "../Asset/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

</script> >

<?php
include("Foot.php");
?>
