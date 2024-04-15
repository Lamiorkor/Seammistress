<?php
include "../settings/connection.php";

if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];

    $sql = "DELETE FROM Measurements WHERE mid = '$mid'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location:../admin/materials_view.php");
    } else {
        echo "Query failed to execute";
        header("Location:../admin/materials_view.php");
        return false;
    }
} else {
    header("Location:../admin/materials_view.php");
}
