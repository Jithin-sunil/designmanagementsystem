<?php
session_start();
include("../Asset/connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Site - Product Search</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* General page spacing */
        body {
            background-color: #f9f9f9;
        }

        .container {
            margin-top: 40px;
        }

        .header {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar styling */
        .filters {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100%;
            z-index: 1050;
            overflow-y: auto;
            transition: 0.3s ease-in-out;
        }

        .filters.active {
            left: 0;
        }

        .filter-title {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .filters input[type="range"] {
            width: 100%;
        }

        .filter-icon {
            margin-right: 10px;
        }

        .sorting-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .sorting-container select {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        #filter-button {
            background-color: transparent;
            color: black;
            border: none;
            padding: 5px;
            font-size: 24px;
            cursor: pointer;
            margin-left: 15px;
        }

        #close-sidebar {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
        }

        #search-field {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        /* Product grid */
        .product-grid {
            display: grid;
            /* grid-template-columns: repeat(4, 1fr); */
            gap: 20px;
        }

        @media (max-width: 1200px) {
            .product-grid {
                /* grid-template-columns: repeat(3, 1fr); */
            }
        }

        @media (max-width: 768px) {
            .product-grid {
                /* grid-template-columns: repeat(2, 1fr); */
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                /* grid-template-columns: 1fr; */
            }
        }
    </style>
</head>

<body onload="getSearch()">
    <!-- Toast Notification -->
<div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
        <div class="toast-header">
            <strong id="toastTitle" class="me-auto"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div id="toastBody" class="toast-body"></div>
    </div>
</div>


    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ShopSite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="MyCart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar Filter -->
    <div class="filters" id="sidebar">
        <button id="close-sidebar">×</button>
        <h4 class="filter-title"><i class="fas fa-filter filter-icon"></i>Filters</h4>

        <!-- Category Checkboxes -->
        <h5>Category</h5>
        <?php
        $selqry = "select * from tbl_designcategory";
        $result = mysql_query($selqry);
        while ($data = mysql_fetch_array($result)) {
        ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $data['designcategory_id']; ?>" id="category<?php echo $data['designcategory_id']; ?>" name="category" onchange="gettype(this.value),getSearch()">
                <label class="form-check-label" for="category<?php echo $data['designcategory_id']; ?>">
                    <?php echo $data['designcategory_name']; ?>
                </label>
            </div>
        <?php
        }
        ?>

        <!-- SubCategory Checkboxes -->
        <h5>Type</h5>
        <div id="sel_type"></div>

        
        
        
        
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Search Field -->
        <input type="text" id="search-field" placeholder="Search products..." onkeyup="getSearch()">

        <!-- Sorting Dropdown and Filter Button -->
        <div class="row">
            <div class="col-md-12">
                <div class="sorting-container">
                    <h4>Showing Results</h4>
                    <div>
                        <!-- Filter button -->
                        <button id="filter-button"><i class="fas fa-filter"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Grid (ID for AJAX to update) -->
        <div class="product-grid" id="result">
            <!-- Products will load dynamically here -->
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="../Asset/JQ/jQuery.js"></script>

    <script>
        const sidebar = document.getElementById('sidebar');
        const filterButton = document.getElementById('filter-button');
        const closeSidebar = document.getElementById('close-sidebar');

        filterButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });

        // Get selected checkbox values
        function getSelectedCheckboxes(name) {
            const checkboxes = document.querySelectorAll(`input[name=${name}]:checked`);
            let values = [];
            checkboxes.forEach((checkbox) => {
                values.push(checkbox.value);
            });
            return values;
        }
        function gettype(category) {
    $.ajax({
        url: "../Asset/AjaxPages/AjaxSearchDesignType.php?category=" + category,
        method: "GET",
        success: function (response) {
            document.getElementById("sel_type").innerHTML = response;
        }
    });
}
        function getSearch() {
            const category = getSelectedCheckboxes("category");
            const type = getSelectedCheckboxes("sel_type");
            
            const searchKeyword = document.getElementById("search-field").value;

            $.ajax({
                url: "../Asset/AjaxPages/AjaxSearchDesign.php?search="+searchKeyword+"&category="+category+"&type="+type,
                method: "GET",
                success: function (response) {
                    document.getElementById("result").innerHTML = response;
                }
            });
        }
        // function addCart(id)
        //     {
        //         $.ajax({
        //             url: "../Asset/AjaxPages/AjaxAddCart.php?id=" + id,
        //             success: function(response) {
        //                 if (response.trim() === "Added to Cart")
        //                 {
        //                     $("div.success").fadeIn(300).delay(1500).fadeOut(400);
        //                 }
        //                 else if (response.trim() === "Already Added to Cart")
        //                 {
        //                     $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
        //                 }
        //                 else
        //                 {
        //                     $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
        //                 }
        //             }
        //         });
        //     }

        function addCart(id) {
    $.ajax({
        url: "../Asset/AjaxPages/AjaxAddCartD.php?id=" + id,
        success: function(response) {
            let toastTitle = '';
            let toastBody = '';
            let toastClass = 'bg-success'; // Default success class
            
            if (response.trim() === "Added to Cart") {
                toastTitle = 'Success';
                toastBody = 'Product successfully added to cart!';
                toastClass = 'bg-success';  // Green background for success
            } else if (response.trim() === "Already Added to Cart") {
                toastTitle = 'Warning';
                toastBody = 'Product is already in the cart!';
                toastClass = 'bg-warning';  // Yellow background for warning
            } else {
                toastTitle = 'Error';
                toastBody = 'Failed to add product to the cart!';
                toastClass = 'bg-danger';  // Red background for failure
            }

            // Update the toast content dynamically
            $('#toastTitle').text(toastTitle);
            $('#toastBody').text(toastBody);
            $('#toastMessage').removeClass('bg-success bg-warning bg-danger').addClass(toastClass);

            // Show the toast
            var toast = new bootstrap.Toast(document.getElementById('toastMessage'));
            toast.show();
        }
    });
}

    </script>

</body>

</html>