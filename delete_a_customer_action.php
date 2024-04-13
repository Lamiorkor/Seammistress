<?php
include "../settings/connection.php";

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    $sql = "DELETE FROM Customers WHERE cid = '$cid'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location:../admin/customers.php");
    } else {
        echo "Query failed to execute";
        header("Location:../admin/customers.php");
        return false;
    }
} else {
    header("Location:../admin/customers.php");
}
