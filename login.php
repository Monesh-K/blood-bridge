<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/blood-transfusion.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <style>
    body {
      background-image: url(images/bg-home.png);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    div.container-fluid {
      padding: 0px 12px;
    }

    a.nav-link.active {
      --rem: 16;
      --bs-blue: #0d6efd;
      --bs-indigo: #6610f2;
      --bs-purple: #6f42c1;
      --bs-pink: #d63384;
      --bs-red: #dc3545;
      --bs-orange: #fd7e14;
      --bs-yellow: #ffc107;
      --bs-green: #198754;
      --bs-teal: #20c997;
      --bs-cyan: #0dcaf0;
      --bs-black: #000;
      --bs-white: #fff;
      --bs-gray: #6c757d;
      --bs-gray-dark: #343a40;
      --bs-gray-100: #f8f9fa;
      --bs-gray-200: #e9ecef;
      --bs-gray-300: #dee2e6;
      --bs-gray-400: #ced4da;
      --bs-gray-500: #adb5bd;
      --bs-gray-600: #6c757d;
      --bs-gray-700: #495057;
      --bs-gray-800: #343a40;
      --bs-gray-900: #212529;
      --bs-primary: #0d6efd;
      --bs-secondary: #6c757d;
      --bs-success: #198754;
      --bs-info: #0dcaf0;
      --bs-warning: #ffc107;
      --bs-danger: #dc3545;
      --bs-light: #f8f9fa;
      --bs-dark: #212529;
      --bs-primary-rgb: 13, 110, 253;
      --bs-secondary-rgb: 108, 117, 125;
      --bs-success-rgb: 25, 135, 84;
      --bs-info-rgb: 13, 202, 240;
      --bs-warning-rgb: 255, 193, 7;
      --bs-danger-rgb: 220, 53, 69;
      --bs-light-rgb: 248, 249, 250;
      --bs-dark-rgb: 33, 37, 41;
      --bs-white-rgb: 255, 255, 255;
      --bs-black-rgb: 0, 0, 0;
      --bs-body-color-rgb: 33, 37, 41;
      --bs-body-bg-rgb: 255, 255, 255;
      --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
      --bs-body-font-family: var(--bs-font-sans-serif);
      --bs-body-font-size: 1rem;
      --bs-body-font-weight: 400;
      --bs-body-line-height: 1.5;
      --bs-body-color: #212529;
      --bs-body-bg: #fff;
      --bs-border-width: 1px;
      --bs-border-style: solid;
      --bs-border-color: #dee2e6;
      --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
      --bs-border-radius: 0.375rem;
      --bs-border-radius-sm: 0.25rem;
      --bs-border-radius-lg: 0.5rem;
      --bs-border-radius-xl: 1rem;
      --bs-border-radius-2xl: 2rem;
      --bs-border-radius-pill: 50rem;
      --bs-link-color: #0d6efd;
      --bs-link-hover-color: #0a58ca;
      --bs-code-color: #d63384;
      --bs-highlight-bg: #fff3cd;
      font-family: var(--bs-body-font-family);
      line-height: var(--bs-body-line-height);
      -webkit-text-size-adjust: 100%;
      -webkit-tap-highlight-color: transparent;
      --bs-navbar-padding-x: 0;
      --bs-navbar-padding-y: 0.5rem;
      --bs-navbar-color: rgba(0, 0, 0, 0.55);
      --bs-navbar-hover-color: rgba(0, 0, 0, 0.7);
      --bs-navbar-disabled-color: rgba(0, 0, 0, 0.3);
      --bs-navbar-active-color: rgba(0, 0, 0, 0.9);
      --bs-navbar-brand-padding-y: 0.3125rem;
      --bs-navbar-brand-margin-end: 1rem;
      --bs-navbar-brand-font-size: 1.25rem;
      --bs-navbar-brand-color: rgba(0, 0, 0, 0.9);
      --bs-navbar-brand-hover-color: rgba(0, 0, 0, 0.9);
      --bs-navbar-nav-link-padding-x: 0.5rem;
      --bs-navbar-toggler-padding-y: 0.25rem;
      --bs-navbar-toggler-padding-x: 0.75rem;
      --bs-navbar-toggler-font-size: 1.25rem;
      --bs-navbar-toggler-icon-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
      --bs-navbar-toggler-border-color: rgba(0, 0, 0, 0.1);
      --bs-navbar-toggler-border-radius: 0.375rem;
      --bs-navbar-toggler-focus-width: 0.25rem;
      --bs-navbar-toggler-transition: box-shadow 0.15s ease-in-out;
      --bs-nav-link-padding-x: 0;
      --bs-nav-link-padding-y: 0.5rem;
      --bs-nav-link-font-weight: ;
      --bs-nav-link-color: var(--bs-navbar-color);
      --bs-nav-link-hover-color: var(--bs-navbar-hover-color);
      --bs-nav-link-disabled-color: var(--bs-navbar-disabled-color);
      list-style: none;
      box-sizing: border-box;
      cursor: pointer;
      padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
      font-size: var(--bs-nav-link-font-size);
      font-weight: var(--bs-nav-link-font-weight);
      text-decoration: none;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
      --bs-card-spacer-y: 1rem;
      --bs-card-spacer-x: 1rem;
      --bs-card-title-spacer-y: 0.5rem;
      --bs-card-border-width: 1px;
      --bs-card-border-color: var(--bs-border-color-translucent);
      --bs-card-border-radius: 0.375rem;
      --bs-card-box-shadow: ;
      --bs-card-inner-border-radius: calc(0.375rem - 1px);
      --bs-card-cap-padding-y: 0.5rem;
      --bs-card-cap-padding-x: 1rem;
      --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
      --bs-card-cap-color: ;
      --bs-card-height: ;
      --bs-card-color: ;
      --bs-card-bg: #fff;
      --bs-card-img-overlay-padding: 1rem;
      --bs-card-group-margin: 0.75rem;
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      height: var(--bs-card-height);
      word-wrap: break-word;
      background-color: var(--bs-card-bg);
      background-clip: border-box;
      border: var(--bs-card-border-width) solid var(--bs-card-border-color);
      border-radius: var(--bs-card-border-radius);
      color: var(--bs-navbar-active-color);
      padding-right: var(--bs-navbar-nav-link-padding-x);
      padding-left: var(--bs-navbar-nav-link-padding-x);
    }
  </style>
  <nav class="navbar navbar-expand-lg" style="background-color: #f2ebe4; padding:8px 0px;">
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
          <a class="nav-link" href="available_donors.php">Available&nbsp;Donors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active card" aria-current="page" href="loginSendOtp.php">Log&nbsp;in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signupSendOtp.php">Sign&nbsp;up</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- <section class="ftco-section"> -->
  <div class="container">
    <div class="row justify-content-center" style="padding-top:50px;">
      <div class="col-md-7 col-lg-5">
        <div class="wrap">
          <div class="img" style="background-image: url(images/bg3.png)"></div>
          <div class="login-wrap p-4 p-md-5">
            <div class="d-flex">
              <div class="w-100">
                <h3 class="mb-4">Login</h3>
              </div>
            </div>
            <form action="logincheck.php" method="POST" class="signin-form">
              <div class="form-group mt-3">
                <input type="text" class="form-control" maxlength="10" name="mobile" id="mobile" value="<?php echo $_COOKIE['mobile']; ?>" required />
                <label class="form-control-placeholder" for="username">Mobile</label>
              </div>
              <div class="form-group">
                <input id="password-field" type="text" name="enteredOtp" class="form-control" required autofocus />
                <label class="form-control-placeholder">OTP</label>
                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
              </div>
              <div class="form-group">
                <button type="submit" name="signin" id="signin" class="form-control btn btn-primary rounded submit px-3">
                  Login
                </button>
              </div>
              <!-- <div class="form-group d-md-flex">
									<div class="w-50 text-left">
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div> -->
            </form>
            <p class="text-center">
              Don't have an Account? <a href="signupSendOtp.php">Sign Up</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- </section> -->

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>