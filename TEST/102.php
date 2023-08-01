<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PR CARE - Blood Test</title>
    <!-- Template Main CSS File -->
    <link href="css/PD_Service.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tabs-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            justify-content: center;
            margin-top: 50px;
        }
        .tab {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }
        .tab.active {
            background-color: #0056b3;
        }
        .tab-content.active {
            display: block;
        }
    </style>

</head>
<body style="background-image: url(img/home.jpg);">
<?php require('P_Navigation_Bar.php');?>
    <div class="container-fluid" id="containerm">

    <h1>Doctor Appointment - Specializations</h1>
    <div class="tabs-container">

    <div class="tab" onclick="showTab('Cardiology')">Cardiology
        <p>Heart and Blood Vessels Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Neurology')">Neurology
        <p>Brain and Nervous System Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Oncology')">Oncology
        <p>Cancer Care Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Orthopedics')">Orthopedics
        <p>Bones and Joints Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Gastroenterology')">Gastroenterology
        <p>Digestive System Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Pulmonology')">Pulmonology
        <p>Lungs and Breathing Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Endocrinology')">Endocrinology
        <p>Hormones and Glands Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Nephrology')">Nephrology
        <p>Kidneys and Urinary System Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Infectious_Disease')">Infectious Disease
        <p>Infections Care Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Obstetrics_and_Gynecology')">Obstetrics and Gynecology
        <p>Women's Health Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Pediatrics')">Pediatrics
        <p>Child Health Specialist</p>
    </div>

    <div class="tab" onclick="showTab('Psychiatry')">Psychiatry
        <p>Mental Health Specialist</p>
    </div>

        <!-- Add more specializations here -->
    </div>

    <div class="tab-content" id="Cardiology"></div>
    <div class="tab-content" id="Neurology"></div>
    <div class="tab-content" id="Oncology"></div>

    <div class="tab-content" id="Orthopedics"></div>
    <div class="tab-content" id="Gastroenterology"></div>
    <div class="tab-content" id="Pulmonology"></div>

    <div class="tab-content" id="Endocrinology"></div>
    <div class="tab-content" id="Nephrology"></div>
    <div class="tab-content" id="Infectious_Disease"></div>

    <div class="tab-content" id="Obstetrics_and_Gynecology"></div>
    <div class="tab-content" id="Pediatrics"></div>
    <div class="tab-content" id="Psychiatry"></div>

    </div>


    <form action="test67.php" method="post" id="specializationForm">
        <input type="hidden" name="specialization" id="specializationInput">
    </form>

    <script>
        function showTab(specialization) {
            const tabs = document.getElementsByClassName('tab');
            const tabContents = document.getElementsByClassName('tab-content');

            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
              tabContents[i].classList.remove('active');
            }

            document.getElementById(specialization).classList.add('active');
            event.currentTarget.classList.add('active');

            // Set the selected specialization in the hidden input field and submit the form
            document.getElementById('specializationInput').value = specialization;
            document.getElementById('specializationForm').submit();
        }
    </script>
    <?php require('P_Footer.php');?>
</body>
</html>
