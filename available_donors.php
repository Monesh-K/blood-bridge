<?php

require_once 'config/db.php';
require_once 'config/functions.php';

$result = display_data();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/blood-transfusion.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="js/filter.js"></script>
  <title>Donors</title>
</head>

<body>
  <style>
    body {
      background-image: url(images/bg-home.png);
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
      /* overflow-x: scroll; */
      height: fit-content;
      max-height: 66.4vh;

      margin-top: 22px;

      margin: 15px;
      padding-bottom: 20px;

    }


    table {

      /* min-width: max-content; */
      width: 100%;
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
      /* font-weight: normal; */
      /* font-size: 18px; */
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

      /* font-size: 15px; */
      border: 1px solid rgb(177, 177, 177);
      padding-left: 20px;

    }
  </style>
  <nav class="navbar navbar-expand-lg" style="background-color: #f2ebe4;">
    <div class="container-fluid" style="width: 72%;">
      <a class="navbar-brand" href="#">
        <img src="images/logo2.png" alt="Logo" width="256px" height="35px" href="home.html" class="d-inline-block align-text-top">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.html">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active card" href="available_donors.php">Available&nbsp;Donors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="loginSendOtp.php">Log&nbsp;in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signupSendOtp.php">Sign&nbsp;up</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="outer-wrapper" style="background-color: #fff;">
    <div class="table-wrapper">

      <table id="emp-table">
        <thead>
          <th col-index=1>Name</th>
          <th col-index=2>Bloodgroup
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>

          <th col-index=3>Area
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>
          <th col-index=4>City
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>
          <th col-index=5>Last Donated
          </th>

        </thead>
        <tbody>
          <tr>
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['bloodgroup']; ?></td>
              <td><?php echo $row['area']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['last_donated']; ?></td>
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
  <div class="form-group d-md-flex">
    <!-- <div class="w-50 text-left">Login/Sigup to make Request.
									</div> -->
    <div class="w-100 text-md-right" style="text-align: right; padding:20px 1000px 0px 0px;">
      <a href="loginSendOtp.php">Login</a>/<a href="signupSendOtp.php">Sigup</a> to make Request.
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>