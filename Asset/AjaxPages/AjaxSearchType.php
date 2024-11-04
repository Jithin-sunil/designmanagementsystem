<?php
include('../connection/connection.php');

$type = $_GET['category'];
if (!empty($type)) {
    
    $selQry = "SELECT * FROM tbl_producttype WHERE productcategory_id IN ($type)";
    $result = mysql_query($selQry);

    while ($data = mysql_fetch_array($result)) {
        echo '<div class="form-check">
                <input class="form-check-input" type="checkbox" value="' . $data['producttype_id'] . '" id="category' . $data['producttype_id'] . '" name="category" onchange="getSearch()">
                <label class="form-check-label" for="category' . $data['producttype_id'] . '">' . $data['producttype_name'] . '</label>
              </div>';
    }
} else {
    echo '<p>No categories Available</p>';
}

?>