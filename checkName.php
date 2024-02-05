<?php
$connect = mysqli_connect("localhost", "root", "", "bloodbank");
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $query = "SELECT * FROM donors WHERE name = '$name'";
    $result = mysqli_query($connect, $query);
    echo mysqli_num_rows($result);
}
