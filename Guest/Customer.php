<?php
		include("../Asset/Connection/Connection.php");
		if(isset($_POST["submit"]))
		{
			$photo=$_FILES["filephoto"]["name"];
			$temp=$_FILES["filephoto"]["tmp_name"];
			move_uploaded_file($temp,"../Asset/File/CustomerDocs/".$photo);
			
			$photoo=$_FILES["fileproof"]["name"];
			$temp=$_FILES["fileproof"]["tmp_name"];
			move_uploaded_file($temp,"../Asset/File/CustomerDocs/".$photoo);
			
			$insQry="insert into  tbl_customer(place_id,customer_name,customer_gender,customer_contact,customer_email,customer_password,customer_photo,customer_proof)values('".$_POST["sel_place"]."','".$_POST["textfield"]."','".$_POST["rdngender"]."','".$_POST["contact"]."','".$_POST["emailid"]."','".$_POST["password"]."','$photo','$photoo')";
			
			mysql_query($insQry);
			echo $insQry;
		}
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_customer where customer_id='".$_GET["delID"]."'";
			
			mysql_query($delQry);
			header("location:Customer.php");
		}
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NewCustomer</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="443" height="297" border="1" align="center">
    <tr>
        <td width="78">District</td>
        <td width="349">         
         <select name="selDistrict" id="selDistrict" onChange="getPlace(this.value)">
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
      </tr>
      <tr>
        <td>Name</td>
        <td><input type="text" name="textfield" id="textfield" required placeholder="Enter Name"></td>
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
        <td><input type="text" name="contact" id="contact" required placeholder="Enter Contact"></td>
      </tr>
      <tr>
        <td>Email id</td>
        <td><input type="email" name="emailid" id="emailid" required placeholder="Enter Email"></td>
      </tr>
      <tr>
        <td>Photo</td>
        <td><input type="file" name="filephoto" id="filephoto" required></td>
      </tr>
      <tr>
        <td>Id proof</td>
        <td><input type="file" name="fileproof" id="fileproof" required></td>
      </tr>
       <tr>
        <td>Password</td>
        <td><input type="password" name="password" id="password" required placeholder="Enter Password"></td>
      </tr>
      <tr>
       
       <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">
        <input type="reset" name="reset" id="reset" value="Reset"></td>
      </tr>
  </table>
</form>



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

</script> 
