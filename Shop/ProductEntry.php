<?php
		include("../Asset/Connection/Connection.php");
		session_start();
		if(isset($_POST["submit"]))
		{
			
			
			$photo=$_FILES["photoo"]["name"];
			$temp=$_FILES["photoo"]["tmp_name"];
			move_uploaded_file($temp,"../Asset/File/Product/".$photo);
			
			
			
			$insQry="insert into tbl_product(product_name,product_prize,product_details,product_image,shop_id,producttype_id)values('".$_POST["name"]."','".$_POST["prize"]."','".$_POST["details"]."','".$photo."','".$_SESSION["shopid"]."','".$_POST["sel_type"]."')";
			
			mysql_query($insQry);
			echo $insQry;
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_product where product_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:ProductEntry.php");
		}
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProductEntry</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="583" height="219" border="1" align="center">
    <tbody>
      <tr>
        <td width="56">Product Name</td>
        <td width="300"><input type="text" name="name" id="name" required placeholder="Enter Name"></td>
      </tr>
      <tr>
        <td>Category</td>
        <td>
        <select name="pcategory" id="pcategory" onChange="getType(this.value)">
          <?php
							$selqry="select * from tbl_productcategory";
							$data=mysql_query($selqry);
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
        <td>Type</td>
        <td>
        <select name="sel_type" id="sel_type">
        </select></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" name="photoo" id="photoo" required></td>
      </tr>
      <tr>
        <td>Prize</td>
        <td><input type="text" name="prize" id="prize" required placeholder="Enter Prize"></td>
      </tr>
      <tr>
        <td>Details</td>
        <td><input name="details" type="details" multiple id="details" required placeholder="Enter Details"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" ><input type="submit" name="submit" id="submit" value="Submit"> <input type="reset" name="Cancel" id="Cancel" value="Cancel"></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
<table border="1" align="center">
<br>
<tr>
<th>Sl.No</th>
<th>Product Name</th>
<th>Category</th>
<th>Type</th>
<th>Prize</th>
<th>Details</th>
<th>Image</th>
<th>Action</th>
</tr>

<?php
$selQry="select * from tbl_product p inner join tbl_producttype t on p.producttype_id=t.producttype_id inner join tbl_productcategory c on c.productcategory_id=t.productcategory_id where shop_id='".$_SESSION["shopid"]."'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <br>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["product_name"]?></td>
    <td><?php echo $row["productcategory_name"]?></td>
    <td><?php echo $row["producttype_name"]?></td>
    <td><?php echo $row["product_prize"]?></td>
    <td><?php echo $row["product_details"]?></td>
    <td><img src="../Asset/File/Product/<?php echo $row["product_image"]?>" width="85" height="85"></td>
    <td><a href="ProductEntry.php?delID=<?php echo $row["product_id"]?>">Delete</a></td>
</tr>
<?php
}
?>



<script src="../Asset/JQ/jQuery.js"></script>
<script>
  function getType(did) {
    $.ajax({
      url: "../Asset/AjaxPages/AjaxProductType.php?did=" + did,
      success: function (result) {

        $("#sel_type").html(result);
      }
    });
  }

</script> >