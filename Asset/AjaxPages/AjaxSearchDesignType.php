<?php
include('../connection/connection.php');

$type = $_GET['category'];
if (!empty($type)) {
    
    $selQry = "SELECT * FROM tbl_designtype WHERE designcategory_id IN ($type)";
    $result = mysql_query($selQry);

    while ($data = mysql_fetch_array($result)) {
        echo '<div class="form-check">
                <input class="form-check-input" type="checkbox" value="' . $data['designtype_id'] . '" id="category' . $data['designtype_id'] . '" name="category" onchange="getSearch()">
                <label class="form-check-label" for="category' . $data['designtype_id'] . '">' . $data['designtype_name'] . '</label>
              </div>';
    }
} else {
    echo '<p>No categories Available</p>';
}

?>