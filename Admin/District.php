<?php
		include("../Asset/Connection/Connection.php");
		include("Head.php");
		if(isset($_POST["submit"]))
		{
			$insQry="insert into tbl_district(district_name)values('".$_POST["textdistrict"]."')";
			mysql_query($insQry);
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_district where district_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:District.php");
		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>District</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
<label for="textarea">:</label>
<table width="400" height="93" border="1" align="center">
  <tbody>
    <tr>
      <td width="110">District Name</td>
      <td width="216"><input type="text" name="textdistrict" id="textdistrict" required placeholder="Enter District"><label for="select"></label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">
      <input type="reset" name="reset" id="reset" value="Cancel"/></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>
<br>
<table border="1" align="center">
<tr>
<th>SI No</th>
<th>District</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_district";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["district_name"]?></td>
<td><a href="District.php?delID=<?php echo $row["district_id"]?>">Delete</a></td>
</tr>
<?php
}
?>


<?php
include("Foot.php");
?>