<?php
		include("../Asset/Connection/Connection.php");
		include("Head.php");
		if(isset($_POST["submit"]))
		{
			$insQry="insert into tbl_place(district_id,place_name,place_pincode)values('".$_POST["select"]."','".$_POST["textfield"]."','".$_POST["textfield2"]."')";
			mysql_query($insQry);
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_place where place_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:Place.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Place</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
  <table width="278" height="146" border="1" align="center">
    <tbody>
      <tr>
        <td>District </td>
        <td><select name="select" id="select">
        <?php
$selQry="select * from tbl_district";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
{
	?>
    <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
    <?php
}
?>
        </select></td>
      </tr>
      <tr>
        <td>Place </td>
        <td><input type="text" name="textfield" id="textfield" required placeholder="Enter Place"></td>
      </tr>
      <tr>
        <td>Pincode</td>
        <td><input type="text" name="textfield2" id="textfield2" required placeholder="Enter Pincode"></td>
      </tr>
      <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">
        <input type="reset" name="reset" id="reset" value="Reset"></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
<br>
<table border="1" align="center">
<tr>
<th>Sl.No</th>
<th>District</th>
<th>Place</th>
<th>Pincode</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row["district_name"]?></td>
    <td><?php echo $row["place_name"]?></td>
    <td><?php echo $row["place_pincode"]?></td>
<td><a href="Place.php?delID=<?php echo $row["place_id"]?>">Delete</a></td>
</tr>
<?php
}
?>

<?php
include("Foot.php");
?>