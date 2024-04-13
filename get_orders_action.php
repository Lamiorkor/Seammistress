<?php

function getAllOrders() {
    include "../settings/connection.php";

    $sql = "SELECT * FROM Orders";
    $result = mysqli_query($con, $sql);

    $orders = array();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $orders[] = $row;
            }
            return $orders;
        } else {
            echo "Error: No record found";
            return false;
        }
    } else {
        echo "Error: Query failed";
        return false;
    }
}


function getNumOrders() {
    include "../settings/connection.php";

    $sql = "SELECT COUNT(*) as num_orders FROM Orders";
    $result = mysqli_query($con, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        $num_orders = $row['num_orders'];
    } else {
        $num_orders = 0;
    }

    return $num_orders;
}


function getRecentOrders() {
    include "../settings/connection.php";

    $sql = "SELECT * FROM Orders ORDER BY order_date DESC LIMIT 5";
    $result = mysqli_query($con, $sql);

    $recent_orders = array();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $recent_orders[] = $row;
            }
            return $recent_orders;
        } else {
            echo "Error: No record found";
            return false;
        }
    } else {
        echo "Error: Query failed";
        return false;
    }
}

function getUncompletedOrders() {
    include "../settings/connection.php";

    $sql = "SELECT COUNT(*) AS uncompleted_orders FROM Orders WHERE sid != 4";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $num_uncompleted_orders = $row['uncompleted_orders'];
    } else {
        $num_uncompleted_orders = 0;
    }

    return $num_uncompleted_orders;
}

?>