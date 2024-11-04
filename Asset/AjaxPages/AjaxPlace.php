<?php
include("../Connection/Connection.php");

?>

<select name="sel_place" id="sel_place" >
<?php
echo "hi";
$selQry="select * from tbl_place where district_id='".$_GET["did"]."'";
echo $selQry;
$data=mysql_query($selQry);

while($row=mysql_fetch_array($data))
{

	?>
    <option value="<?php echo $row["place_id"]?>"><?php echo $row["place_name"]?></option>
    <?php
}
?>
</select>