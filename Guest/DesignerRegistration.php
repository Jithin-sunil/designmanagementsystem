<?php
		include("../Asset/Connection/Connection.php");
		
		if(isset($_POST["submit"]))
		{
			$photo=$_FILES["filephoto"]["name"];
			$temp=$_FILES["filephoto"]["tmp_name"];
			move_uploaded_file($temp,"../Asset/File/DesignerDocs/".$photo);
			
			$photoo=$_FILES["fileproof"]["name"];
			$temp=$_FILES["fileproof"]["tmp_name"];
			move_uploaded_file($temp,"../Asset/File/DesignerDocs/".$photoo);
			
			$insQry="insert into  tbl_designer(place_id,designer_name,designer_gender,designer_contact,designer_email,designer_password,designer_photo,designer_proof)values('".$_POST["sel_place"]."','".$_POST["textfield2"]."','".$_POST["rdngender"]."','".$_POST["textfield3"]."','".$_POST["textfield4"]."','".$_POST["textfield5"]."','$photo','$photoo')";
			
			mysql_query($insQry);
			echo $insQry;
		}
		
		
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NewDesigner</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tbody>
      <tr>
       <tr>
        <td>District</td>
        
<td>          <select name="selDistrict" id="selDistrict" onChange="getPlace(this.value)">
          <?php
							$selqry="select * from tbl_district";
							$data=mysql_query($selqry);
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
        <td>Place</td>
        <td>
          <select name="sel_place" id="sel_place">
                        
                    </select></td>
      </tr
      ><tr>
        <td>Name</td>
        <td><input type="text" name="textfield2" id="textfield2" required placeholder="Enter Name"></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input type="radio" name="rdngender" id="rdngender" value="male">
          Male
            <input type="radio" name="rdngender" id="rdngender" value="female">
            Female</td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><input type="text" name="textfield3" id="textfield3" required placeholder="Enter Contact"></td>
      </tr>
      <tr>
        <td>Email </td>
        <td><input type="email" name="textfield4" id="textfield4" required placeholder="Enter Email"></td>
      </tr>
      <tr>
        <td>Photo</td>
        <td><input type="file" name="filephoto" id="filephoto" required></td>
      </tr>
      <tr>
        <td>Id Proof</td>
        <td><input type="file" name="fileproof" id="fileproof" required></td>
      </tr>
      <tr>
        <td height="36">Password</td>
        <td><input type="password" name="textfield5" id="textfield5" required placeholder="Enter password"></td>
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

