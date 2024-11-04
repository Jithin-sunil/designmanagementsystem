<?php
include("../Connection/Connection.php");

?>

<select name="sel_type" id="sel_type" >
<?php
echo "hi";
$selQry="select * from tbl_designtype where designcategory_id='".$_GET["did"]."'";
echo $selQry;
$data=mysql_query($selQry);

while($row=mysql_fetch_array($data))
{

	?>
    <option value="<?php echo $row["designtype_id"]?>"><?php echo $row["designtype_name"]?></option>
    <?php
}
?>
</select>