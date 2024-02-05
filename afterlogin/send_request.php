<?php

include '../config/db.php';
if (isset($_POST['send_request'])) {
    $mobile = $_COOKIE['mobile'];

    $query = "SELECT * FROM donors WHERE mobile=$mobile";
    $result1 = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result1);

    $patient_name = $_POST['patient_name'];
    $bloodgroup = $_POST['bloodgroup'];
    $gender = $_POST['gender'];
    $hospital = $_POST['hospital'];
    $city = $_POST['city'];
    $person_incharge = $_POST['person_incharge'];
    $location = $_POST['location'];

    $message = "Emergency! Blood Required!!" . "\r\n" . "From: " . $mobile . "\r\n" . "Patient's Name: " . $patient_name . "\r\n" .
        "Bloodgroup: " . $bloodgroup . "\r\n" . "Gender: " . $gender . "\r\n" . "Hospital Details: " . $hospital . "\r\n" .
        "City: " . $city . "\r\n" . "Person in Care: " . $person_incharge . "\r\n" . "Location Link: " . nl2br($location);

    $quer = "SELECT * FROM donors WHERE bloodgroup IN ('$bloodgroup','O-ve') AND city='$city' AND age>18 AND weight>50 AND datediff(curdate(),last_donated)>90";
    $result = mysqli_query($con, $quer);
    // $row1 = mysqli_fetch_assoc($result);
    if ($result && mysqli_num_rows($result) > 0) {
        // At least one row is found
        while ($row1 = mysqli_fetch_assoc($result)) {
            require __DIR__ . '../../vendor/autoload.php';
            $message1 = "Emergency! Blood Required!!" . "\r\n" . "From: " . $mobile . "\r\n" . "City: " . $city . "\r\n" . "Person in Care: " . $person_incharge . "\r\n" . "Location Link: " . nl2br($location);
            $req_query = "INSERT INTO requests(from_id, to_id, patient_name, bloodgroup, hospital_details, message) VALUES ('" . mysqli_real_escape_string($con, $row['id']) . "','" . mysqli_real_escape_string($con, $row1['id']) . "','" . mysqli_real_escape_string($con, $patient_name) . "', '" . mysqli_real_escape_string($con, $bloodgroup) . "','" . mysqli_real_escape_string($con, $hospital) . "','" . mysqli_real_escape_string($con, $message1) . "')";
            $result0 = mysqli_query($con, $req_query);

            if (!$result0) {
                die('Error inserting into requests: ' . mysqli_error($con));
            }

            // Your Account SID and Auth Token from console.twilio.com
            $sid = "YOUR ACCOUNT SID";
            $token = "YOUR AUTH TOKEN";
            $client = new Twilio\Rest\Client($sid, $token);

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

        echo "<script>alert('Request Sent.'); window.location.href = 'my_request.php';</script>";
    } else {
        // No rows found
        echo "<script>alert('No donors available.');window.location.href = 'donors_request_form.php'; </script>";
    }
}
