<?php

function getAllMaterials()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Materials";
    $result = mysqli_query($con, $sql);

    $materials = array();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $materials[] = $row;
            }
            return $materials;
        } else {
            echo "Error: No record found";
            return false;
        }
    } else {
        echo "Error: Query failed";
        return false;
    }
}

function getNumMaterials() {
    include "../settings/connection.php";

    $sql = "SELECT SUM(amount_in_stock) as materials_remaining FROM Materials";
    $result = mysqli_query($con, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        $materials_remaining = $row['materials_remaining'];
    } else {
        $materials_remaining = 0;
    }

    return $materials_remaining;
}