<?php 
include "../settings/connection.php";

$confirmDelete = true;

if(isset($_GET['oid'])) {
    $cid = $_GET['oid'];

    if ($confirmDelete) {
        
?>

    <script>
        confirm("Do you want to delete this order?");
    </script>

<?php

        $sql = "DELETE FROM Orders WHERE oid = '$oid'";

        $result = mysqli_query($con, $sql);

        if ($result) {
            header("Location:../admin/orders_view.php");
        } else {
            echo "Query failed to execute";
            return false;
        }

    } else {
        header("Location: ../admin/orders_view.php");
    }

}

?>