<?php
// Send an SMS using Twilio's REST API and PHP
// Required if your environment does not handle autoloading
session_start();
if (isset($_POST['sendotp'])) {
    require __DIR__ . '/vendor/autoload.php';

    // Your Account SID and Auth Token from console.twilio.com
    $sid = "YOUR ACCOUNT SID";
    $token = "YOUR AUTH TOKEN";
    $client = new Twilio\Rest\Client($sid, $token);
    $otp = mt_rand(100000, 999999);
    $mobile = $_POST['mobile'];
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

        $_SESSION['mobile'] = $mobile;
        setcookie('otp', $otp, time() + 60);
        setcookie('mobile', $mobile);
        echo "<script>alert('OTP sent Successfully.'); window.location.href = 'login.php';</script>";

    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
if (isset($_POST['signin'])) {
    $otp = $_POST['enteredOtp'];
    if ($_COOKIE['otp'] == $otp) {
        setcookie('otp', '', time() - 600);
        echo "<script>alert('OTP is verified.'); window.location.href = 'afterlogin/profile.php';</script>";

    } else {
        echo "<script>alert('Invalid OTP.'); window.location.href = 'login.php';</script>";
    }
}
