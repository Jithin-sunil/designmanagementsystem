<?php

include("../connection/connection.php");
?>
<div class="container mt-4">
    <div class="row">
        <?php
        // Query to fetch designs based on filters
          $selQry = "select * from tbl_design p 
                     inner join tbl_designtype t on p.designtype_id=t.designtype_id   
                   inner join tbl_designcategory c on t.designcategory_id=c.designcategory_id 
                  
                   where TRUE";

        if ($_GET['type'] != "") {
            $selQry .= " and t.designtype_id IN(" . $_GET['type'] . ")";
        }
        if ($_GET['category'] != "") {
            $selQry .= " and c.designcategory_id IN(" . $_GET['category'] . ")";
        }
        
        if ($_GET['search'] != "") {
            $name = $_GET['search'];
            $selQry .= " and p.design_name like '%$name%'";
        }

        $reslt =mysql_query($selQry);

        // Loop through each design
        while ($data = mysql_fetch_array($reslt)) {
            ?>
            <div class="col-md-3 mb-4">
                <div class="design-card">
                    <div class="design-image">
                        <img src="../Asset/File/Design/<?php echo $data['design_photo']; ?>"
                            alt="<?php echo $data['design_name']; ?>">
                    </div>
                    <div class="design-details">
                        <h5><?php echo $data['design_name']; ?></h5>
                        <p>Price: <?php echo $data['design_rate']; ?></p>
                        <p>Details: <?php echo $data['design_details']; ?></p>
                        <p>Type: <?php echo $data['designtype_name']; ?></p>
                        <p>Category: <?php echo $data['designcategory_name']; ?></p>
                        
                        <button class="btn btn-sm btn-outline-primary"
                            onclick="addCart(<?php echo $data['design_id']; ?>)">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<style>
    .design-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        height: 100%;
    }

    .design-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 10px;
        height: 150px;
        object-fit: cover;
    }

    .design-details h5 {
        font-size: 1.2em;
        margin-bottom: 10px;
        color: #333;
    }

    .design-details p {
        color: #666;
        margin-bottom: 5px;
    }

    .design-card button {
        margin-top: 10px;
        display: inline-flex;
        align-items: center;
    }

    .design-card button i {
        margin-right: 5px;
    }
</style>