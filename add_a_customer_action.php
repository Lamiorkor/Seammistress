<?php 
session_start();
include "../settings/connection.php";

if (isset($_POST['submit'])) {

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);

    
    $sql = "INSERT INTO Customers (fname, lname, phone_number)
            VALUES ('$fname', '$lname', '$phone_number')";

    $result = mysqli_query($con, $sql);
    
    if ($result) {
        echo "Successfully inserted";
        header("Location: ../admin/customers.php");
        exit();
    } else {
        echo "Unable to add customer";
    }

}
    
    $con->close();
?>