<?php
		include("../Asset/Connection/Connection.php");
        include("Head.php");
		
		if(isset($_GET["acid"]))
		{
			$upQry="update tbl_shop set shop_status='1' where shop_id='".$_GET["acid"]."'";
			mysql_query($upQry);
			header("location:ShopVerification.php");
		}
		if(isset($_GET["rejid"]))
		{
			$upQry="update tbl_shop set shop_status='2' where shop_id='".$_GET["rejid"]."'";
			mysql_query($upQry);
			header("location:ShopVerification.php");
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ShopVerification</title>
</head>

<body>
<a href="HomePage.php">Home</a>



<h3>NewShopList</h3>
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
$selQry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where s.shop_status='0'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["shop_name"]?></td>
    <td><?php echo $row["shop_location"]?></td>
    <td><?php echo $row["shop_contact"]?></td>
    <td><?php echo $row["shop_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
                <td><img src="../Asset/File/ShopDocs/<?php echo $row["shop_photo"]?>" width="85" height="85" required></td>
                <td><img src="../Asset/File/ShopDocs/<?php echo $row["shop_proof"]?>" width="85" height="85" required></td>
               
<td><a href="ShopVerification.php?acid=<?php echo $row["shop_id"]?>">Accept</a>/<a href="ShopVerification.php?rejid=<?php echo $row["shop_id"]?>">Reject</a></td>
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
$selQry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where s.shop_status='1'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["shop_name"]?></td>
    <td><?php echo $row["shop_location"]?></td>
    <td><?php echo $row["shop_contact"]?></td>
    <td><?php echo $row["shop_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
               <td><img src="../Asset/File/ShopDocs/<?php echo $row["shop_photo"]?>" width="85" height="85" required></td>
                <td><img src="../Asset/File/ShopDocs/<?php echo $row["shop_proof"]?>" width="85" height="85" required></td>
<td><a href="ShopVerification.php?rejid=<?php echo $row["shop_id"]?>">Reject</a></td>
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
$selQry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where s.shop_status='2'";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["shop_name"]?></td>
    <td><?php echo $row["shop_location"]?></td>
    <td><?php echo $row["shop_contact"]?></td>
    <td><?php echo $row["shop_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
                 <td><img src="../Asset/File/ShopDocs/<?php echo $row["shop_photo"]?>" width="85" height="85" required></td>
                <td><img src="../Asset/File/ShopDocs/<?php echo $row["shop_proof"]?>" width="85" height="85" required></td>
<td><a href="ShopVerification.php?acid=<?php echo $row["shop_id"]?>">Accept</a></td>
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