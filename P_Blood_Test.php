<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR CARE - Blood Test</title>
    <!-- Add Bootstrap CSS link -->
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="css/service_page.css" rel="stylesheet">
</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
<div class="container-fluid" id="containerm" >
    <div class="container mt-2">
        <h1 class="mb-4">Blood Test - Appointment</h1>
        <form action="#" method="POST">
            <div class="inputfeild mb-3">
                <label for="patient_id" class="form-label">Patient NIC:</label>
                <input type="text" id="patient_id" name="patient_NIC" class="form-control" required>
            </div>

            <div class="inputfeild mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="inputfeild mb-3">
                <label for="appointment_date" class="form-label">Preferred Test Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" class="form-control" required>
            </div>

            <div class="inputfeild mb-3">
                <label for="appointment_time" class="form-label">Preferred Test Time:</label>
                <input type="time" id="appointment_time" name="appointment_time" class="form-control" required>
            </div>

            <div class="inputfeild mb-3">
                <label for="doctor" class="form-label">Test Type:</label>
                <select id="doctor" name="doctor" class="form-select" required>
                    <option value="" disabled selected>Select a Type</option>
                    <option value="CBC">Complete Blood Count</option>
                    <option value="LP">Lipid Profile</option>
                    <option value="BGTs">Blood Glucose Test</option>
                    <option value="LFTs">Liver Function Tests (LFTs)</option>
                    <option value="KFTs">Kidney Function Tests</option>
                    <option value="TFTs">Thyroid Function Tests</option>
                    <option value="IS">Iron Studies</option>
                    <option value="VDTs">Vitamin D Test</option>
                    <option value="BCTs">Blood Coagulation Tests (PT, INR)</option>
                    <option value="ABTs">Allergy Blood Tests</option>
                    <option value="RFTs">Rheumatoid Factor (RF) Test</option>
                    <option value="CPRTs">C-reactive Protein (CRP) Test</option>
                </select>
            </div>
            <div class="inputfeild">
           <!--Button-->
           <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
           </div>
        </form>
    </div>
</div>
    <?php require('P_Footer.php');?>
</body>
</html>
