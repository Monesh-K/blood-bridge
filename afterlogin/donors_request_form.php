<?php

session_start();

require_once '../config/db.php';
require_once '../config/functions.php';
if (!isset($_SESSION['mobile'])) {
    header("Location: ../home.html");
    exit();
}
$result = display_data();

$query1 = "SELECT DISTINCT city FROM donors where datediff(curdate(),last_donated)>90 and age>=18 and weight>=50";
$uniq_city = mysqli_query($con, $query1);

$query2 = "SELECT DISTINCT bloodgroup FROM donors where datediff(curdate(),last_donated)>90 and age>=18 and weight>=50";
$uniq_bloodgroup = mysqli_query($con, $query2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/blood-transfusion.png">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="../js/filter.js"></script>
    <title>Request Form</title>
    <style>
        body {
            background-image: url(../images/bg-home.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .outer-wrapper {
            margin-top: 40px;
            margin-left: 20px;
            margin-right: 20px;
            border: 1px solid black;
            border-radius: 4px;
            box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.9);
            max-width: fit-content;
            max-height: fit-content;
        }

        .table-wrapper {
            overflow-y: scroll;
            /* Removed horizontal overflow */
            overflow-x: hidden;
            height: fit-content;
            max-height: 66.4vh;
            margin-top: 22px;
            margin: 15px;
            padding-bottom: 20px;
        }

        table {
            width: 100%;
            /* Set table width to 100% */
            border-collapse: separate;
            border-spacing: 0px;
        }

        .table-filter {
            border-radius: 5px;
        }

        table th {
            position: sticky;
            top: 0px;
            background-color: #133b5c;
            color: rgb(241, 245, 179);
            text-align: center;
            outline: 0.7px solid black;
            border: 1.5px solid black;
        }

        table th,
        table td {
            padding: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        table td {
            text-align: left;
            border: 1px solid rgb(177, 177, 177);
            padding-left: 20px;
        }

        .form-container {
            max-width: 80%;
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
                <li class="nav-item dropdown">
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
                    <a class="nav-link active card" href="donors_request_form.php">Request</a>
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
    <div class="container-fluid">
        <div class="row">
            <!-- Left column with the table -->
            <div class="col-md-6">
                <div class="outer-wrapper" style="background-color: #fff;">
                    <div class="table-wrapper">
                        <table id="emp-table">
                            <thead>
                                <th col-index="1">Name</th>
                                <th col-index="2">Bloodgroup
                                    <select class="table-filter" onchange="filter_rows()">
                                        <option value="all"></option>
                                    </select>
                                </th>
                                <th col-index="3">Area
                                    <select class="table-filter" onchange="filter_rows()">
                                        <option value="all"></option>
                                    </select>
                                </th>
                                <th col-index="4">City
                                    <select class="table-filter" onchange="filter_rows()">
                                        <option value="all"></option>
                                    </select>
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    while ($row1 = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <td><?php echo $row1['name']; ?></td>
                                        <td><?php echo $row1['bloodgroup']; ?></td>
                                        <td><?php echo $row1['area']; ?></td>
                                        <td><?php echo $row1['city']; ?></td>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                        <script>
                            window.onload = () => {
                                console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
                            };

                            getUniqueValuesFromColumn()
                        </script>
                    </div>
                </div>
            </div>

            <!-- Right column with the form -->
            <div class="col-md-6">
                <div class="container form-container">
                    <div class="row justify-content-center" style="padding-top:40px;">
                        <div class="col-md-12">
                            <div class="wrap">
                                <div class="login-wrap p-4 p-md-5">
                                    <h3 class="mb-4">Request</h3>
                                    <form action="send_request.php" method="POST" class="signin-form">
                                        <!-- Your form fields remain unchanged -->
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Patient's Name*</label>
                                            <input type="text" class="form-control" oninput="capitalizeFirstLetter(this)" name="patient_name" id="patient_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bloodgroup" class="form-label">Bloodgroup*</label>
                                            <select name="bloodgroup" id="bloodgroup" class="form-select" required>
                                                <option value="" selected disabled>Available Bloodgroup</option>
                                                <?php
                                                while ($row2 = mysqli_fetch_assoc($uniq_bloodgroup)) {
                                                    echo "<option value='" . $row2['bloodgroup'] . "'>" . $row2['bloodgroup'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City*</label>
                                            <select name="city" id="city" class="form-select" required>
                                                <option value="" selected disabled>Select City</option>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($uniq_city)) {
                                                    echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender*</label>
                                            <select name="gender" id="gender" class="form-select  aria-label=" Default select example" required>
                                                <!-- <option selected><?php echo $row['gender']; ?></option> -->
                                                <option value=""></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <div class="mb-3">
                                                <label for="hospital" class="form-label">Hospital Details*</label>
                                                <input type="text" class="form-control" oninput="capitalizeFirstLetter(this)" name="hospital" id="hospital" required>
                                            </div>


                                            <div class="mb-3">
                                                <label for="person_incharge" class="form-label">Person in Care (Contact)*</label>
                                                <input type="text" class="form-control" oninput="capitalizeFirstLetter(this)" name="person_incharge" id="person_incharge" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="location" class="form-label">Location Link</label>
                                                <input type="text" class="form-control" oninput="capitalizeFirstLetter(this)" name="location" id="location">
                                            </div>
                                            <div class="form-group w-75">
                                                <button type="submit" name="send_request" id="send_request" class="form-control btn btn-primary rounded submit px-3">
                                                    Send Request
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your scripts and styles here -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>