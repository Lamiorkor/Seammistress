<?php
include "../actions/get_customers_action.php";

function getCustomers() {

    $customer_list = getAllCustomers();

    if ($customer_list) {
        echo "<table>";

        foreach ($customer_list as $row) {
            $name = $row['fname'] . ' ' . $row['lname'];

            echo "<tr>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td class='material-symbols-sharp'><a href='../admin/customer_measurements_view.php?cid=" . $row['cid'] . ">measuring_tape</a></td>";
            echo "<td>";
            echo "<div class='actions'>";
            echo "<div class='delete'><a href='../actions/delete_a_customer_action.php?cid=" . $row['cid'] . "'><img src='../assets/delete.png' alt='delete' title='delete request' style='width: 20px;'></a></div>";
            echo "</div>";
            echo "</td>";      
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No chores found.";
    }
}

function getMeasurements() {
    $measurements = getCustomerMeasurements();

    if ($measurements) {
        echo "<table";

        foreach ($measurements as $row) {
            echo "<tr>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['bust'] . "</td>";
            echo "<td>" . $row['waist'] . "</td>";
            echo "<td>" . $row['hip'] . "</td>";
            echo "<td>" . $row['around_arm'] . "</td>";
            echo "<td>" . $row['across_chest'] . "</td>";
            echo "<td>" . $row['blouse_length'] . "</td>";
            echo "<td>" . $row['dress_length'] . "</td>";
            echo "<td>" . $row['skirt_length'] . "</td>";
            echo "<div class='actions'>";
            echo "<div class='edit'><a href='../admin/edit_measurements_view.php?cid=" . $row['cid'] . "'><img src='../assets/pencil.png' alt='edit' title='edit request' style='width: 20px;'></a></div>";
            echo "<div class='delete'><a href='../actions/delete_customer_measurements_action.php?cid=" . $row['cid'] . "'><img src='../assets/delete.png' alt='delete' title='delete request' style='width: 20px;'></a></div>";
            echo "</tr>";
        }

        echo "</table>";
    }
}

?>