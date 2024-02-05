<?php
include 'smtp/PHPMailerAutoload.php';
if (isset($_POST['send_email'])) {
    $name = $_POST['name'];
    $sub = $_POST['subject'];
    $email = $_POST['email'];
    $msg = "Name: " . $name . "<br>" . "From: " . $email . "<br>" . "Message: " . nl2br($_POST['message']);
    // echo $msg;
    // echo smtp_mailer('pythonmailtesting07@gmail.com', $sub, $msg);

    // function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2;
    $mail->Username = "YOUR EMAIL";
    $mail->Password = "YOUR PASSWORD";
    $mail->SetFrom("YOUR EMAIL");
    $mail->Subject = $sub;
    $mail->Body = $msg;
    $mail->AddAddress('YOUR EMAIL');
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false,
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        echo "<script>alert('Email has been sent Successfully.'); window.location.href = 'contact.php';</script>";
    }
}
// }
