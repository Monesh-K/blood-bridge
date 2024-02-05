<?php
include '../config/db.php';

// Check if request_id and donor_id are set in the URL
if (isset($_GET['from_id']) && isset($_GET['to_id'])) {
    $from_id = $_GET['from_id'];
    $to_id = $_GET['to_id'];
    $msg_query = "SELECT * from donors where id = '$to_id'";
    $msg = mysqli_query($con, $msg_query);
    while ($row1 = mysqli_fetch_assoc($msg)) {
        require __DIR__ . '../../vendor/autoload.php';

        // Your Account SID and Auth Token from console.twilio.com
        $sid = "YOUR ACCOUNT SID";
        $token = "YOUR AUTH TOKEN";
        $client = new Twilio\Rest\Client($sid, $token);
        $message = "Your request has been accepted. Kindly wait for the donor to contact you.";
        try {
            $client->messages->create(
                '+91' . $row1['mobile'],
                [
                    'from' => 'YOUR TWILIO NUMBER',
                    'body' => $message
                ]
            );
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    // Perform deletion in requests table
    $delete_query = "DELETE FROM requests WHERE to_id = '$to_id' and from_id = '$from_id'";
    mysqli_query($con, $delete_query);

    // Perform update in donors table (example: updating last_donated)
    $update_query = "UPDATE donors SET last_donated = CURDATE() WHERE id = '$to_id'";
    mysqli_query($con, $update_query);

    // Redirect back to the original page or wherever you want
    header('Location: pending_request.php');
    exit();
} else {
    // Handle the case when request_id or donor_id is not set
    echo 'Invalid parameters.';
}
