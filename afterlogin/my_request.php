<?php

include '../config/db.php';
session_start();
if (!isset($_SESSION['mobile'])) {
  header("Location: ../home.html");
  exit();
}
$mobile = $_COOKIE['mobile'];
$query = "SELECT * FROM donors WHERE mobile='$mobile'";
$result1 = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result1);
$from_id = mysqli_real_escape_string($con, $row['id']);
$my_req = "SELECT * FROM requests WHERE from_id='$from_id'";
$result3 = mysqli_query($con, $my_req);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Request</title>
  <link rel="icon" href="images/blood-transfusion.png">
  <link rel="stylesheet" href="../css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    body {
      background-image: url(../images/bg-home.png);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    @media (min-width: 768px) {
      .carousel-container {
        position: absolute;
        top: 45%;
        left: 5%;
        right: 0;
        transform: translateY(-50%);
        width: 50%;
      }
    }

    @media (max-width: 767px) {
      .carousel-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 10px 20px 10px;
        /* height: fit-content; */
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #f2ebe4;">
    <div class="container-fluid" style="width: 72%;">
      <a class="navbar-brand" href="home.html">
        <img src="../images/logo2.png" alt="Logo" width="256px" height="35px" href="home.html" class="d-inline-block align-text-top">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
        </li>
        <li class="nav-item dropdown active card">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile_edit.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="my_request.php">My Request</a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="pending_request.php">Pending Request</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="donors_request_form.php">Request</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contactus.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="logout.php">Logout</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="signupSendOtp.php">Sign&nbsp;up</a>
        </li> -->
      </ul>
    </div>
  </nav>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="profile.php">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Request</li>
    </ol>
  </nav>

  <div class="container mt-4">
    <?php
    // Fetch rows again outside the loop
    $result3 = mysqli_query($con, $my_req);

    // Counter to track when to start a new row
    $counter = 0;

    if (mysqli_num_rows($result3) > 0) {
      while ($row3 = mysqli_fetch_assoc($result3)) {
        // Start a new row after every 3 loops
        if ($counter % 3 == 0) {
          echo '<div class="row">';
        }
    ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Patient's Name: <?php echo $row3['patient_name']; ?></h5>
              <p class="card-text">Bloodgroup: <?php echo $row3['bloodgroup']; ?></p>
              <p class="card-text">Hospital Details: <?php echo $row3['hospital_details']; ?></p>
              <p class="card-text"><?php echo $row3['message']; ?></p>
              <div class="text-center">
                <a href="decline.php?from_id=<?php echo $row3['from_id']; ?>&to_id=<?php echo $row3['to_id']; ?>" class="btn btn-success mx-2">Mark as completed.</a>
                <a href="decline.php?from_id=<?php echo $row3['from_id']; ?>&to_id=<?php echo $row3['to_id']; ?>" class="btn btn-danger mx-2">Delete Request</a>
                <!-- <button type="button" name='decline' href="decline.php" class="btn btn-danger mx-2">Reject</button> -->
              </div>
            </div>
          </div>
        </div>
    <?php
        // End the row after every 3 loops
        if ($counter % 3 == 2) {
          echo '</div>';
        }
        $counter++;
      }

      // Close the row if the loop didn't end on a multiple of 3
      if ($counter % 3 != 0) {
        echo '</div>';
      }
    } else {
      // Display a centered message if there are no requests
      echo '<div class="card card-body text-center mx-auto" style="width: fit-content;">You have not raised any request.</div>';
    }
    ?>
  </div>




</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</html>