<?php
		include("../Asset/Connection/Connection.php");
    include("Head.php");
		if(isset($_POST["submit"]))
		{
			$insQry="insert into tbl_productcategory(productcategory_name)values('".$_POST["pcategory"]."')";
			
			mysql_query($insQry);
		}
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_productcategory where productcategory_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:Productcategory.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Category</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
  <table width="496" height="76" border="1" align="center">
    <tbody>
      <tr>
        <td width="60">Product Category</td>
        <td width="144"><input type="text" name="pcategory" id="pcategory" required placeholder="Enter Category"></td>
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
<th>ProductCategory</th>
<th>Action</th>
</tr>
<br>
<?php
$selQry="select * from tbl_productcategory";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["productcategory_name"]?></td>
<td><a href="Productcategory.php?delID=<?php echo $row["productcategory_id"]?>">Delete</a></td>
</tr>
<?php
}
?>

<?php
include("Foot.php");
?>