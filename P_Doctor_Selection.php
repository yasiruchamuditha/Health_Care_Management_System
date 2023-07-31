<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PR CARE- Admin Panel</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php require('P_Navigation_Bar.php');?>
<div  style="margin:150px;50px;100px;50px;">
<div  style="margin:50px;0px;100px;0px;">
<h1>PR CARE - Specialists</h1>
<div class="row">

  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cardiology</h5>
        <p class="card-text">Manages the Doctors Registered in the System.</p>
        <a href="A_Doctor_Management_page.php" class="btn btn-primary">Check now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Neurology</h5>
        <p class="card-text">Manages the PAtients Registered in the System.</p>
        <a href="A_Patient_Management_Page.php" class="btn btn-primary">Check now</a>
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
        <h5 class="card-title">Oncology</h5>
        <p class="card-text">Manages the User Account of the website.</p>
        <a href="A_User_Account_Management_page.php" class="btn btn-primary">Check Now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Orthopedics</h5>
        <p class="card-text">Manages the Physiotheraphy Appoinment Registried by Patients.</p>
        <a href="A_Physiotheraphy_Management_page.php" class="btn btn-primary">Check Now</a>
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
        <h5 class="card-title">Gastroenterology</h5>
        <p class="card-text">Manages the Doctor Appointment Registried by Patients.</p>
        <a href="A_Doctor_App_Mangement_page.php" class="btn btn-primary">Check Now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Dental Appoinement Managenment</h5>
        <p class="card-text">Manages the Dental Appoinment Registried by Patients.</p>
        <a href="A_Dental_App_Management_page.php" class="btn btn-primary">Check Now</a>
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
        <h5 class="card-title">Regular CheckUp Managenment</h5>
        <p class="card-text">Manages the Regular Checkup Registried by Patients.</p>
        <a href="A_Regular_checkup_Management_page.php" class="btn btn-primary">Check Now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Blood Test Managenment</h5>
        <p class="card-text">Manages the Blood Test Registried by Patients.</p>
        <a href="A_Blood_Test_Management_page.php" class="btn btn-primary">Check Now</a>
      </div>
    </div>
  </div>

</div>
</div>

</div>
<?php require('P_Footer.php');?>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
</body>

</html>
