<?php
include 'config/db.php';
session_start();
// Send an SMS using Twilio's REST API and PHP
// Required if your environment does not handle autoloading
if (isset($_POST['sendotp'])) {
    $mobile = $_POST['mobile'];
    $name = $_POST['name'];
    $query = "SELECT * FROM donors WHERE mobile='$mobile'";
    $result1 = mysqli_query($con, $query);
    if (mysqli_num_rows($result1) > 0) {
        echo "<script>alert('Mobile already exists.'); window.location.href = 'signupSendOtp.php';</script>";
    } else {
        require __DIR__ . '/vendor/autoload.php';

        // Your Account SID and Auth Token from console.twilio.com
        $sid = "YOUR ACCOUNT SID";
        $token = "YOUR AUTH TOKEN";
        $client = new Twilio\Rest\Client($sid, $token);
        $otp = mt_rand(100000, 999999);

        // Use the Client to make requests to the Twilio REST API
        $message = "Your OTP is " . $otp;
        try {
            $client->messages->create(
                // The number you'd like to send the message to
                '+91' . $mobile,
                [
                    'from' => 'YOUR TWILIO NUMBER',
                    'body' => $message,
                ]
            );
            $_SESSION['otp'] = $otp;
            $_SESSION['name'] = $name;
            $_SESSION['mobile'] = $mobile;
            echo "<script>alert('OTP sent Successfully.'); window.location.href = 'signup.php';</script>";
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
if (isset($_POST['signup'])) {
    $otp = $_POST['enteredOtp'];
    if ($_SESSION['otp'] == $otp) {
        $mobile = $_SESSION['mobile'];
        $name = $_SESSION['name'];
        echo "<script>alert('OTP is verified.');</script>";
        require_once 'config/db.php';
        $query = "insert into donors(name,mobile) values('$name','$mobile')";
        mysqli_query($con, $query);
        session_destroy();
        echo "<script>window.location.href='loginSendOtp.php';</script>";
    } else {
        echo "<script>alert('Invalid OTP.'); window.location.href = 'signup.php';</script>";
    }
}
