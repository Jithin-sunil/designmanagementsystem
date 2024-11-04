<?php
include("../Connection/Connection.php");

?>

<select name="ptype" id="ptype" >
<?php
echo "hi";
$selQry="select * from tbl_producttype where productcategory_id='".$_GET["did"]."'";
echo $selQry;
$data=mysql_query($selQry);

while($row=mysql_fetch_array($data))
{

	?>
    <option value="<?php echo $row["producttype_id"]?>"><?php echo $row["producttype_name"]?></option>
    <?php
}
?>
</select>