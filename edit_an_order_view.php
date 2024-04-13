<?php 
include "../settings/core.php";
include "../actions/get_an_order_action.php";

userIDSessionCheck();


if(isset($_GET['oid'])) {
    $oid = $_GET['oid'];

    $edit_order = getOneOrder($oid);

    if($edit_chore) {

    echo "<form id='editOrderForm' method='POST' action='../actions/edit_an_order_action.php'>";
    echo "<input type='hidden' name='oid' value='$oid'>"; 
    echo "<label for='status'>Order Status:</label>";
    echo "<input type='text' id='orderStatus' name='orderStatus' value='" . $edit_order['sid'] . "' pattern='[A-Za-z0-9\s]+' required>";
    echo "<button type='submit' name='submit' value='chore'>Update Order</button>";
    echo "</form>";

    } else {
        echo "Please enter an order status";
        header("Location: ..admin/orders_view.php");
    }

} else {
    header("Location: ../admin/orders_view.php");
}



?>