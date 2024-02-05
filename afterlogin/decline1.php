<?php
include '../config/db.php';

// Check if request_id and donor_id are set in the URL
if (isset($_GET['from_id']) && isset($_GET['to_id'])) {
    $from_id = $_GET['from_id'];
    $to_id = $_GET['to_id'];
   
    // Perform deletion in requests table
    $delete_query = "DELETE FROM requests WHERE to_id = '$to_id'";
    mysqli_query($con, $delete_query);

    // Redirect back to the original page or wherever you want
    header('Location: my_request.php');
    exit();
} else {
    // Handle the case when request_id or donor_id is not set
    echo 'Invalid parameters.';
}
