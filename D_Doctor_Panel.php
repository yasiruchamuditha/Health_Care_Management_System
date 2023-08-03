<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Doctors Panel</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('D_Navigation_Bar.php');?>
<div  style="margin:150px;50px;100px;50px;">
<div  style="margin:50px;0px;100px;0px;">
<h1>Doctor User Account</h1>
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Register As a Docotor</h5>
        <p class="card-text">You can Register in our Site as a Doctor.</p>
        <a href="D_Doctor_Registration.php" class="btn btn-primary">Click Here</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">My Appointments</h5>
        <p class="card-text">Appointmnet under your name display here.</p>
        <a href="D_Appointment_list.php" class="btn btn-primary">Click Here</a>
      </div>
    </div>
  </div>
</div>
</div>

<div  style="margin:50px;0px;100px;0px;">
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">My Account</h5>
        <p class="card-text">Your User Profile</p>
        <a href="D_My_Account.php" class="btn btn-primary">Check Now</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special Notices</h5>
        <p class="card-text">You can provide Special Notices for us</p>
        <a href="D_Special_Notices.php" class="btn btn-primary">Check Now</a>
      </div>
    </div>
  </div>
</div>
</div>

</div>
<?php require('D_Footer.php');?>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
</body>

</html>