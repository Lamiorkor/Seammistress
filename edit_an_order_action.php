<?php
include "../settings/connection.php";

if (isset($_POST['submit'])) {

   $oid = mysqli_real_escape_string($con, $_POST['oid']);
   $sid = mysqli_real_escape_string($con, $_POST['sid']);

    $sql = "UPDATE Orders
            SET sid = '$sid'
            WHERE oid = '$oid'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: ../admin/orders_view.php");
        exit();
    } else {
        echo "Query failed to execute";
        header("Location: ../admin/orders_view.php");
        exit();
    }

    $con->close();
    
} else {
    echo "No data received";
    header("Location: ../admin/orders_view.php");    
    exit();
}
