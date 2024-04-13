<?php

function getAllCustomers() {
    include "../settings/connection.php";

    $sql = "SELECT * FROM Customers";
    $result = mysqli_query($con, $sql);

    $customers = array();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $customers[] = $row;
            }
            return $customers;
        } else {
            echo "Error: No record found";
            return false;
        }
    } else {
        echo "Error: Query failed";
        return false;
    }
}

function getNumCustomers() {
    include "../settings/connection.php";

    $sql = "SELECT COUNT(*) as num_customers FROM Customers";
    $result = mysqli_query($con, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        $num_customers = $row['num_customers'];
    } else {
        $num_customers = 0;
    }

    return $num_customers;
}

function getCustomerMeasurements() {
    include "../settings/connection.php";

    $sql = "SELECT concat(fname, ' ', lname) AS customer_name, bust, waist, 
            hip, around_arm, across_chest, blouse_length, dress_length, skirt_length 
            FROM Measurements JOIN Customers on Customers.cid = Measurements.cid 
            WHERE Customers.cid = Measurements.cid;";
            
    $result = mysqli_query($con, $sql);

    $measurements = array();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $measurements[] = $row;
            }
            return $measurements;
        } else {
            echo "Error: No record found";
            return false;
        }
    } else {
        echo "Error: Query failed";
        return false;
    }
}