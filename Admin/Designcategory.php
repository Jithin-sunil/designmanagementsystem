<?php
		include("../Asset/Connection/Connection.php");
    include("Head.php");
		if(isset($_POST["submit"]))
		{
			$insQry="insert into tbl_designcategory(designcategory_name)values('".$_POST["dcategory"]."')";
			
			mysql_query($insQry);
			header("location:Designcategory.php");
		}
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_designcategory where designcategory_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:Designcategory.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Designcategory</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
  <table width="496" height="76" border="1" align="center">
    <tbody>
      <tr>
        <td width="60">Design Category</td>
        <td width="144"><input type="text" name="dcategory" id="dcategory" required placeholder="Enter Category"></td>
      </tr>
      <tr>
        
        <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit"/>
        <input type="reset" name="reset" id="reset" value="Reset"></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
<table border="1" align="center">
<tr>
<th>Sl.No</th>
<th>Designcategory</th>
<th>Action</th>
</tr>
<br>
<?php
$selQry="select * from tbl_designcategory";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["designcategory_name"]?></td>
<td><a href="Designcategory.php?delID=<?php echo $row["designcategory_id"]?>">Delete</a></td>
</tr>
<?php
}
?>

<?php
include("Foot.php");
?>