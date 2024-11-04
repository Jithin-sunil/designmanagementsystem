<?php
		include("../Asset/Connection/Connection.php");
    include("Head.php");
		
		if(isset($_POST["submit"]))
		{
			$insQry="insert into tbl_producttype(productcategory_id,producttype_name)values('".$_POST["select"]."','".$_POST["ptype"]."')";
			mysql_query($insQry);
			header("location:Producttype.php");
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_producttype where producttype_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:Producttype.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProductType</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post">
  <table width="278" height="146" border="1" align="center">
    <tbody>
      <tr>
        <td>Category </td>
        <td><select name="select" id="select">
        <?php
$selQry="select * from tbl_productcategory";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
{
	?>
    <option value="<?php echo $row["productcategory_id"]?>"><?php echo $row["productcategory_name"]?></option>
    <?php
}
?>
        </select></td>
      </tr>
      <tr>
        <td>Product Type</td>
        <td><input type="text" name="ptype" id="ptype" required placeholder="Enter Type"></td>
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
<th>Category</th>
<th>Type</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_producttype p inner join tbl_productcategory d on p.productcategory_id=d.productcategory_id";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row["productcategory_name"]?></td>
    <td><?php echo $row["producttype_name"]?></td>
    
<td><a href="Producttype.php?delID=<?php echo $row["producttype_id"]?>">Delete</a></td>
</tr>
<?php
}
?>


<?php
include("Foot.php");
?>