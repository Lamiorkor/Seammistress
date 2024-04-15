<?php

include "../actions/get_orders_action.php";

function getOrders() {
    include "../settings/connection.php";

    $order_list = getAllOrders();

    if ($order_list) {
        echo "<table>";

        foreach ($order_list as $row) {
            // Fetch customer name
            $sql1 = "SELECT concat(fname, ' ', lname) as customer_name FROM Customers
                     WHERE cid = " . $row['customer_id'];
            $cname_result = mysqli_query($con, $sql1);
            $cname_row = mysqli_fetch_assoc($cname_result);
            $cname = $cname_row['customer_name'];

            // Fetch outfit type
            $sql2 = "SELECT outfit_name as outfit_type FROM Outfit_Type
                     WHERE outfit_id = " . $row['outfit_type'];
            $otype_result = mysqli_query($con, $sql2);
            $otype_row = mysqli_fetch_assoc($otype_result);
            $otype = $otype_row['outfit_type'];

            // Fetch status
            $sql3 = "SELECT status_name as status FROM Status
                     WHERE sid = " . $row['sid'];
            $status_result = mysqli_query($con, $sql3);
            $status_row = mysqli_fetch_assoc($status_result);
            $status = $status_row['status'];

            echo "<tr>";
            echo "<td>" . $cname . "</td>";
            echo "<td>" . $otype . "</td>";
            echo "<td>" . $row['order_date'] . "</td>";
            echo "<td>" . $row['due_date'] . "</td>";
            echo "<td>" . $status . "</td>";
            echo "<td>";
            echo "<div class='actions'>";
            echo "<div class='edit'><a href='../admin/edit_order_view.php?oid=" . $row['oid'] . "'><img src='../assets/pencil.png' alt='edit' title='edit request' style='width: 20px;'></a></div>";
            echo "<div class='delete'><a href='../actions/delete_order_action.php?oid=" . $row['oid'] . "'><img src='../assets/delete.png' alt='delete' title='delete request' style='width: 20px;'></a></div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No chores found.";
    }
}

getOrders();

function getRecentOrders() {
    include "../settings/connection.php";

    $sql = "SELECT * FROM Orders ORDER BY order_date DESC LIMIT 5";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";

        while ($row = mysqli_fetch_assoc($result)) {
            // Fetch customer name
            $cname_query = "SELECT concat(fname, ' ', lname) as customer_name FROM Customers WHERE cid = " . $row['customer_id'];
            $cname_result = mysqli_query($con, $cname_query);
            $cname_row = mysqli_fetch_assoc($cname_result);
            $cname = $cname_row['customer_name'];

            // Fetch outfit type
            $otype_query = "SELECT outfit_name as outfit_type FROM Outfit_Type WHERE outfit_id = " . $row['outfit_type'];
            $otype_result = mysqli_query($con, $otype_query);
            $otype_row = mysqli_fetch_assoc($otype_result);
            $otype = $otype_row['outfit_type'];

            // Fetch status
            $status_query = "SELECT status_name as status FROM Status WHERE sid = " . $row['sid'];
            $status_result = mysqli_query($con, $status_query);
            $status_row = mysqli_fetch_assoc($status_result);
            $status = $status_row['status'];

            echo "<tr>";
            echo "<td>" . $cname . "</td>";
            echo "<td>" . $otype . "</td>";
            echo "<td>" . $row['order_date'] . "</td>";
            echo "<td>" . $row['due_date'] . "</td>";
            echo "<td>" . $status . "</td>";
            echo "<td>";
            echo "<div class='actions'>";
            echo "<div class='edit'><a href='../admin/edit_order_view.php?oid=" . $row['oid'] . "'><img src='../assets/pencil.png' alt='edit' title='edit request' style='width: 20px;'></a></div>";
            echo "<div class='delete'><a href='../actions/delete_order_action.php?oid=" . $row['oid'] . "'><img src='../assets/delete.png' alt='delete' title='delete request' style='width: 20px;'></a></div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No recent orders found.";
    }
}
?>
