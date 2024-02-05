<?php
//check.php
$connect = mysqli_connect("localhost", "root", "", "bloodbank");
if (isset($_POST["mobile"])) {
    $mobile = mysqli_real_escape_string($connect, $_POST["mobile"]);
    $query = "SELECT * FROM donors WHERE mobile = $mobile";
    $result = mysqli_query($connect, $query);
    echo mysqli_num_rows($result);
}
