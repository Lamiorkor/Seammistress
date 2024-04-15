<?php
include "../settings/core.php";
include "../actions/get_orders_action.php";
include "../functions/get_materials_fxn.php";

userIDSessionCheck();
$uncompletedOrders = getUncompletedOrders();
$materials = getMaterials();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeamMistress - Materials</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/materials.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="container">
        <!--aside section start-->
        <aside>

            <div class="top">

                <div class="logo">
                    <img src="../images/SeamMistress.png" alt="Logo" style="width: 50px;"/>
                    <h2><span class="danger">SeamMistress</span><h2>
                </div>
                <div class="close">
                    <span class="material-symbols-sharp">close</span>                
                </div>
            </div>
            <!-- end top -->

            <div class="sidebar">
                <a href="dashboard.php">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="customers.php">
                    <span class="material-symbols-sharp">group</span>
                    <h3>Customers</h3>
                </a>
                <a href="materials_view.php" class="active">
                    <span class="material-symbols-sharp">shopping_basket</span>
                    <h3>Materials</h3>
                </a>
                <a href="orders_view.php">
                    <span class="material-symbols-sharp">list_alt</span>
                    <h3>Orders</h3>
                    <span class="order_count"><?php echo $uncompletedOrders; ?></span>
                </a>
                <a href="../login/logout.php">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>Logout</h3>
                </a>

            </div>
        </aside>
        <!--aside section end-->

        <!--main section start-->
        <main>
            <!-- list materials -->
            <div class="recent_orders">
                <h1>Materials</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Material Name</th>
                            <th>Price</th>
                            <th>Amount In Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php echo $materials; ?>
                </table>
            </div>
        </main>
        <!--main section end-->

        <<!--right section start-->
        <div class="right">
            <div class="top">
                <h2>Welcome, Admin</h2>
            </div>

            <div class="add_material">
                <button onclick="showForm()">Add Material</button>

                <div id="popup-form">
                    <h2>Add a Material</h2>
                    <form action="../actions/add_a_material_action.php" method="POST">
                        <input type="text" name="name" id="name" placeholder="Name" pattern="[A-Za-z ]+" required="">
                        <input type="text" name="price" id="price" placeholder="Price" pattern="^[-+]?[0-9]*\.?[0-9]+(?:[eE][-+]?[0-9]+)?$" required="">
                        <input type="text" name="amount_in_stock" id="amount_in_stock" placeholder="Amount in Stock" pattern="[0-9]" required="">
                        <button type="submit" name="submit" onclick="closeForm()" value="material">Add</button>
                    </form>
                </div>
            </div>

        </div>
        <!--right section end-->
    </div>

<!-- JavaScript -->
    <script>
        function showForm() {
            document.getElementById("popup-form").style.display = "block";
        }

        function closeForm() {
            document.getElementById("popup-form").style.display = "none";
        }
    </script>

    <!-- <script src="../js/dashboard.js"></script> -->
</body>
</html>