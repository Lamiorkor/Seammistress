<?php 
function getOneOrder($oid) {
    include "../settings/connection.php";

    $sql = "SELECT * FROM Orders WHERE oid = $oid";
    
    $result = mysqli_query($con, $sql);

    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            echo "No result found";
            return false;
        } 
    }  else {
        echo "Query failed to execute";
        return false;
    }

    $con->close();

}

?>