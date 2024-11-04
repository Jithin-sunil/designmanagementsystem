<?php
		include("../Asset/Connection/Connection.php");
		session_start();
		if(isset($_POST["submit"]))
		{
			
			
			$photo=$_FILES["photoo"]["name"];
			$temp=$_FILES["photoo"]["tmp_name"];
			move_uploaded_file($temp,"../Asset/File/Design/".$photo);
			
			
			
			$insQry="insert into  tbl_design(design_name,design_details,design_photo,design_rate,designer_id,designtype_id)values('".$_POST["name"]."','".$_POST["details"]."','".$photo."','".$_POST["rate"]."','".$_SESSION["designerid"]."','".$_POST["sel_type"]."')";
			
			mysql_query($insQry);
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_design where design_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:DesignEntry.php");
		}
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DesignEntry</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="583" height="219" border="1" align="center">
    <tbody>
      <tr>
        <td width="56">Design Name</td>
        <td width="300"><input type="text" name="name" id="name"  required placeholder="Enter Name"></td>
      </tr>
      <tr>
        <td>Category</td>
        <td>
        <select name="dcategory" id="dcategory" onChange="getType(this.value)">
          <?php
							$selqry="select * from tbl_designcategory";
							$data=mysql_query($selqry);
							while($row=mysql_fetch_array($data))
								{
				?>
        
        			<option value="<?php echo $row["designcategory_id"]?>"><?php echo $row["designcategory_name"]?></option>
                    
               <?php
								}
				?>
        </select></td>
      </tr>
      <tr>
        <td>Type</td>
        <td><label for="select"></label>
        <select name="sel_type" id="sel_type">
        </select></td>
      </tr>
      <tr>
        <td>Photo</td>
        <td><input type="file" name="photoo" id="photoo" required></td>
      </tr>
      <tr>
        <td>Rate</td>
        <td><input type="text" name="rate" id="rate" required placeholder="Enter Rate"></td>
      </tr>
      <tr>
        <td>Details</td>
        <td><input name="details" type="text" multiple id="details" required placeholder="Enter Details"></td>
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
<th>Design Name</th>
<th>Category</th>
<th>Type</th>
<th>Rate</th>
<th>Details</th>
<th>Photo</th>
<th>Action</th>
</tr>

<?php
$selQry="select * from tbl_design d inner join tbl_designtype t on d.designtype_id=t.designtype_id inner join tbl_designcategory c on c.designcategory_id=t.designcategory_id where designer_id='".$_SESSION["designerid"]."'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <br>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["design_name"]?></td>
    <td><?php echo $row["designcategory_name"]?></td>
    <td><?php echo $row["designtype_name"]?></td>
    <td><?php echo $row["design_rate"]?></td>
    <td><?php echo $row["design_details"]?></td>
    <td><img src="../Asset/File/Design/<?php echo $row["design_photo"]?>" width="85" height="85"></td>
    <td><a href="DesignEntry.php?delID=<?php echo $row["design_id"]?>">Delete</a></td>
</tr>
<?php
}
?>



<script src="../Asset/JQ/jQuery.js"></script>
<script>
  function getType(did) {
    $.ajax({
      url: "../Asset/AjaxPages/AjaxType.php?did=" + did,
      success: function (result) {

        $("#sel_type").html(result);
      }
    });
  }

</script> >