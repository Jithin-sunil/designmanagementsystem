<?php
		include("../Asset/Connection/Connection.php");
        include("Head.php");
		
		if(isset($_GET["acid"]))
		{
			$upQry="update tbl_designer set designer_status='1' where designer_id='".$_GET["acid"]."'";
			mysql_query($upQry);
			header("location:DesignerVerification.php");
		}
		if(isset($_GET["rejid"]))
		{
			$upQry="update tbl_designer set designer_status='2' where designer_id='".$_GET["rejid"]."'";
			mysql_query($upQry);
			header("location:DesignerVerification.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DesignerVerification</title>
</head>

<body>
<a href="HomePage.php">Home</a>



<h3>NewDesignerList</h3>
<table border="1" align="center">
<tr>
<th>Sl.No</th>
<th>Name</th>
<th>Location</th>
<th>Contact</th>
<th>Email</th>
<th>District</th>
<th>Place</th>
<th>Photo</th>
<th>Proof</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_designer de inner join tbl_place p on de.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where de.designer_status='0'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["designer_name"]?></td>
    <td><?php echo $row["designer_gender"]?></td>
    <td><?php echo $row["designer_contact"]?></td>
    <td><?php echo $row["designer_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
                <td><img src="../Asset/File/DesignerDocs/<?php echo $row["designer_photo"]?>" width="85" height="85" required></td>
                <td><img src="../Asset/File/DesignerDocs/<?php echo $row["designer_proof"]?>" width="85" height="85" required></td>
               
<td><a href="DesignerVerification.php?acid=<?php echo $row["designer_id"]?>">Accept</a>/<a href="DesignerVerification.php?rejid=<?php echo $row["designer_id"]?>">Reject</a></td>
</tr>
<?php
}
?>
</table>


<h3>AcceptedList</h3>
<br>
<table border="1" align="center">
<tr>
<th>Sl.No</th>
<th>Name</th>
<th>Gender</th>
<th>Contact</th>
<th>Email</th>
<th>District</th>
<th>Place</th>
<th>Photo</th>
<th>Proof</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_designer de inner join tbl_place p on de.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where de.designer_status='1'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["designer_name"]?></td>
    <td><?php echo $row["designer_gender"]?></td>
    <td><?php echo $row["designer_contact"]?></td>
    <td><?php echo $row["designer_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
               <td><img src="../Asset/File/DesignerDocs/<?php echo $row["designer_photo"]?>" width="85" height="85"></td>
                <td><img src="../Asset/File/DesignerDocs/<?php echo $row["designer_proof"]?>" width="85" height="85"></td>
<td><a href="DesignerVerification.php?rejid=<?php echo $row["designer_id"]?>">Reject</a></td>
</tr>
<?php
}
?>

</table>

<h3>RejectedList</h3>
<br>
<table border="1" align="center">
<tr>
<th>Sl.No</th>
<th>Name</th>
<th>Gender</th>
<th>Contact</th>
<th>Email</th>
<th>District</th>
<th>Place</th>
<th>Photo</th>
<th>Proof</th>
<th>Action</th>
</tr>
<?php
$selQry="select * from tbl_designer de inner join tbl_place p on de.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where de.designer_status='2'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["designer_name"]?></td>
    <td><?php echo $row["designer_gender"]?></td>
    <td><?php echo $row["designer_contact"]?></td>
    <td><?php echo $row["designer_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
                 <td><img src="../Asset/File/DesignerDocs/<?php echo $row["designer_photo"]?>" width="85" height="85"></td>
                <td><img src="../Asset/File/DesignerDocs/<?php echo $row["designer_proof"]?>" width="85" height="85"></td>
<td><a href="DesignerVerification.php?acid=<?php echo $row["designer_id"]?>">Accept</a></td>
</tr>
<?php
}
?>
</table>


</body>
</html>

<?php
include("Foot.php");
?>