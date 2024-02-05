<?php
session_start();
// setcookie('mobile','',time()-600);
if (isset($_COOKIE['mobile'])) {
    unset($_COOKIE['mobile']);
    setcookie('mobile', '', -1, '/');
}
session_destroy(); // Destroy the session
header("Location: ../home.html"); // Redirect to the homepage
exit();
