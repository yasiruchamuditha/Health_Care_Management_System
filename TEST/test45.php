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
  <style>
    .card {
      width: 100%; /* To make all cards the same size */
    }
    .card-body
    {
        background-color: 	#75f0f0;
    }
    .card-title {
      font-weight: bold; /* Making card titles bold */
    }
  </style>
</head>

<body style="background-color: 	#333333;">
  <?php require('P_Navigation_Bar.php'); ?>
  <div class="container" style="margin-top:125px;">
    <h1 class="mb-4" style="color:white;">PR CARE - Medical Specialists</h1>
    <div class="row">
      <?php
      $specialists = array(
        array("Cardiology", "Heart and Blood Vessels Specialist", "A_Doctor_Management_page.php"),
        array("Neurology", "Brain and Nervous System Specialist", "A_Patient_Management_Page.php"),
        array("Oncology", "Cancer Care Specialist", "A_User_Account_Management_page.php"),
        array("Orthopedics", "Bones and Joints Specialist", "A_Physiotherapy_Management_page.php"),
        array("Gastroenterology", "Digestive System Specialist", "A_Doctor_App_Mangement_page.php"),
        array("Pulmonology", "Lungs and Breathing Specialist", "A_Dental_App_Management_page.php"),
        array("Endocrinology", "Hormones and Glands Specialist", "A_Regular_checkup_Management_page.php"),
        array("Nephrology", "Kidneys and Urinary System Specialist", "A_Blood_Test_Management_page.php"),
        array("Infectious Disease", "Infections Care Specialist", "A_Doctor_App_Mangement_page.php"),
        array("Obstetrics and Gynecology", "Women's Health Specialist", "A_Dental_App_Management_page.php"),
        array("Pediatrics", "Child Health Specialist", "A_Regular_checkup_Management_page.php"),
        array("Psychiatry", "Mental Health Specialist", "A_Blood_Test_Management_page.php"),
      );

      // Limiting to 12 cards
      $maxCards = min(12, count($specialists));

      for ($i = 0; $i < $maxCards; $i++) {
        echo '<div class="col-sm-4 mb-3">'; // Using col-sm-4 to fit 3 cards in a row
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $specialists[$i][0] . '</h5>';
        echo '<p class="card-text">' . $specialists[$i][1] . '</p>';
        echo '<a href="' . $specialists[$i][2] . '" class="btn btn-outline-dark">Check Now</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
  <?php require('P_Footer.php'); ?>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
</body>

</html>
