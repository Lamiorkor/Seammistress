<?php

include "../settings/core.php";
include "../actions/get_orders_action.php";
include "../actions/get_customers_action.php";
include "../actions/get_materials_action.php";

userIDSessionCheck();
$orders = getNumOrders();
$customers = getNumCustomers();
$materials = getNumMaterials();
$uncompleted_orders = getUncompletedOrders();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeamMistress - Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="container">
        <!--aside section start-->
        <aside>

            <div class="top">

                <div class="logo">
                    <img src="../images/SeamMistress.png" alt="Logo" style="width: 50px;" />
                    <h2><span class="danger">SeamMistress</span>
                        <h2>
                </div>
                <div class="close">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>
            <!-- end top -->

            <div class="sidebar">
                <a href="dashboard.php" class="active">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="customers.php">
                    <span class="material-symbols-sharp">group</span>
                    <h3>Customers</h3>
                </a>
                <a href="materials_view.php">
                    <span class="material-symbols-sharp">shopping_basket</span>
                    <h3>Materials</h3>
                </a>
                <a href="orders_view.php">
                    <span class="material-symbols-sharp">list_alt</span>
                    <h3>Orders</h3>
                    <span class="order_count"><?php echo $uncompleted_orders; ?></span>
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
            <h1>Dashboard</h1>

            <div class="insights">

                <!--- start orders -->
                <div class="sales">
                    <span class="material-symbols-sharp">trending_up</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Orders</h3>
                            <h1><?php echo $orders; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">80%</div>
                        </div>
                    </div>
                    <small>This Year</small>
                </div>
                <!--- end selling -->

                <!--- start materials -->
                <div class="expenses">
                    <span class="material-symbols-sharp">local_mall</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Materials Remaining</h3>
                            <h1><?php echo $materials; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">40%</div>
                        </div>
                    </div>
                    <small>Today</small>
                </div>
                <!--- end materials -->

                <!--- start new customers -->
                <div class="customers">
                    <span class="material-symbols-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>New Customers</h3>
                            <h1><?php echo $customers; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">24%</div>
                        </div>
                    </div>
                    <small>This Year</small>
                </div>
                <!--- end new customers -->
            </div>
            <!-- end insights -->

            <!-- start recent orders -->
            <div class="recent_orders">
                <h1>Recent Orders</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Outfit Type</th>
                            <th>Date Ordered</th>
                            <th>Date Due</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php getRecentOrders(); ?>
                </table>
            </div>


            <!-- end recent orders -->
        </main>
        <!--main section end-->

        <!--right section start-->
        <div class="right">
            <div class="top">
                <h2>Welcome, Admin</h2>
            </div>
        </div>
        <!--right section end-->
    </div>



    <script src="../js/dashboard.js"></script>
</body>

</html>