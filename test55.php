<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment - Specializations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tabs-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .tab {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            margin-right: 10px;
        }
        .tab.active {
            background-color: #0056b3;
        }
        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid #007BFF;
            border-radius: 0 0 5px 5px;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Doctor Appointment - Specializations</h1>
    <div class="tabs-container">
        <div class="tab" onclick="showTab('cardiology')">Cardiology</div>
        <div class="tab" onclick="showTab('neurology')">Neurology</div>
        <div class="tab" onclick="showTab('oncology')">Oncology</div>
        <!-- Add more specializations here -->
    </div>

    <div class="tab-content" id="cardiology">
        <p>Cardiology is the study of the heart and cardiovascular system...</p>
    </div>

    <div class="tab-content" id="neurology">
        <p>Neurology focuses on the diagnosis and treatment of disorders...</p>
    </div>

    <div class="tab-content" id="oncology">
        <p>Oncology deals with the diagnosis and treatment of cancer...</p>
    </div>

    <!-- Add more tab-content divs for additional specializations -->

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
</body>
</html>
