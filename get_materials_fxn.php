<?php
include "../actions/get_materials_action.php";

function getMaterials() {

    $materials = getAllMaterials();

    if ($materials) {
        echo "<table>";

        foreach ($materials as $row) {

            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['amount_in_stock'] . "</td>";
            echo "<td>";
            echo "<div class='actions'>";
            echo "<div class='edit'><a href='../admin/edit_material_view.php?mid=" . $row['mid'] . "'><img src='../assets/pencil.png' alt='edit' title='edit request' style='width: 20px;'></a></div>";
            echo "<div class='delete'><a href='../actions/delete_a_material_action.php?mid=" . $row['mid'] . "'><img src='../assets/delete.png' alt='delete' title='delete request' style='width: 20px;'></a></div>";
            echo "</div>";
            echo "</td>";      
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No chores found.";
    }
}

?>