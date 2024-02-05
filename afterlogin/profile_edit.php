<?php
session_start();
if (!isset($_SESSION['mobile'])) {
  header("Location: ../home.html");
  exit();
}
include '../config/db.php';
$mobile = $_COOKIE['mobile'];
$query = "select * from donors where mobile='$mobile'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
if (isset($_POST['update'])) {


  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $weight = $_POST['weight'];
  $bloodgroup = $_POST['bloodgroup'];
  $area = $_POST['area'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $last_donated = $_POST['last_donated'];

  $query1 = "UPDATE donors SET gender='$gender', age='$age', weight='$weight', 
   bloodgroup='$bloodgroup', area='$area', city='$city', 
   state='$state', last_donated='$last_donated' WHERE mobile='$mobile'";
  $update = mysqli_query($con, $query1);
  echo "<script>alert('Profile Updated'); window.location.href = 'profile.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="icon" href="images/blood-transfusion.png">
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
      <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
    </ol>
  </nav>

  <div class="container">
    <div class="row justify-content-center" style="padding-top:50px;">
      <div class="col-md-7 col-lg-5">
        <div class="wrap">
          <!-- <div class="img" style="background-image: url(images/bg3.png)"></div> -->
          <div class="login-wrap p-4 p-md-5">
            <div class="d-flex">
              <div class="w-100">
                <h3 class="mb-4">Profile</h3>
              </div>
            </div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="signin-form">
              <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" oninput="capitalizeFirstLetter(this)" name="name" value="<?php echo $row['name']; ?>" id="name" disabled>
              </div>
              <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" maxlength="10" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>" disabled />
              </div>
              <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>" id="age">
              </div>
              <div class="mb-3">
                <label class="form-label">Weight</label>
                <input type="number" class="form-control" name="weight" value="<?php echo $row['weight']; ?>" id="weight">
              </div>
              <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                  <option selected><?php echo $row['gender']; ?></option>
                  <option value=""></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
                <!-- <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" id="gender" disabled> -->
              </div>
              <div class="mb-3">
                <label for="bloodgroup" class="form-label">Bloodgroup</label>
                <select name="bloodgroup" id="bloodgroup" class="form-select" aria-label="Default select example">
                  <option selected><?php echo $row['bloodgroup']; ?></option>
                  <option value=""></option>
                  <option value="A+ve">A+ve</option>
                  <option value="A-ve">A-ve</option>
                  <option value="B+ve">B+ve</option>
                  <option value="B-ve">B-ve</option>
                  <option value="AB+ve">AB+ve</option>
                  <option value="AB-ve">AB-ve</option>
                  <option value="O+ve">O+ve</option>
                  <option value="O-ve">O-ve</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Area</label>
                <input type="text" oninput="capitalizeFirstLetter(this)" class="form-control" name="area" value="<?php echo $row['area']; ?>" id="area">
              </div>
              <div class="mb-3">
                <label class="form-label">City</label>
                <input oninput="capitalizeFirstLetter(this)" type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" id="city">

                <!-- <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" id="city"> -->
              </div>
              <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" oninput="capitalizeFirstLetter(this)" class="form-control" name="state" value="<?php echo $row['state']; ?>" id="state">
              </div>
              <div class="mb-3">
                <label class="form-label">Last Donation Date</label>
                <input type="text" class="form-control" name="last_donated" value="<?php echo $row['last_donated']; ?>" id="last_donated" placeholder="YYYY-MM-DD">
              </div>
              <div class="form-group w-50">
                <button type="submit" name="update" id="update" class="form-control btn btn-primary rounded submit px-3">
                  Update Profile
                </button>
                <!-- <div class="w-50 text-md-right">
										<a href="profile.php">Cancel</a>
									</div> -->
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50 text-left">
                </div>
                <div class="w-50 text-md-right">
                  <a href="profile.php">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  function capitalizeFirstLetter(input) {
    input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</html>