<?php
		include("../Asset/Connection/Connection.php");
        include("Head.php");
		
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CustomerView</title>
</head>

<body>
<a href="HomePage.php">Home</a>



<h3>NewCustomerList</h3>
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
$selQry="select * from tbl_customer c inner join tbl_place p on c.place_id = p.place_id 
inner join tbl_district d on d.district_id = p.district_id";
$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["customer_name"]?></td>
    <td><?php echo $row["customer_gender"]?></td>
    <td><?php echo $row["customer_contact"]?></td>
    <td><?php echo $row["customer_email"]?></td>
        <td><?php echo $row["district_name"]?></td>
            <td><?php echo $row["place_name"]?></td>
                <td><img src="../Asset/File/CustomerDocs/<?php echo $row["customer_photo"]?>" width="85" height="85" required></td>
                <td><img src="../Asset/File/CustomerDocs/<?php echo $row["customer_proof"]?>" width="85" height="85" required></td>
               

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