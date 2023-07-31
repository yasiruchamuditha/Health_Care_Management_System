<!DOCTYPE html>
<html>
<head>
    <title>Doctor Selection Form</title>
</head>
<body>
    <h2>Select Specialization:</h2>
    <form action="" method="post">
        <select id="specializationSelect" name="specialization">
            <option value="">Select a specialization</option>
            <option value="cardiology">Cardiology</option>
            <option value="dermatology">Dermatology</option>
            <!-- Add other specialization options here -->
        </select>
        <h2>Select Doctor:</h2>
        <select id="doctorSelect" name="doctor">
            <option value="">Select a doctor</option>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
    
    <script>
        // Function to populate the doctors dropdown based on the selected specialization
        document.getElementById("specializationSelect").addEventListener("change", function() {
            var specialization = this.value;
            var doctorSelect = document.getElementById("doctorSelect");
            doctorSelect.innerHTML = ""; // Clear existing options
            
            if (specialization === "") return;
            
            // AJAX request to fetch doctors based on selected specialization
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var doctors = JSON.parse(xhr.responseText);
                        for (var i = 0; i < doctors.length; i++) {
                            var option = document.createElement("option");
                            option.value = doctors[i].id;
                            option.text = doctors[i].name;
                            doctorSelect.appendChild(option);
                        }
                    } else {
                        console.error("Error fetching doctors: " + xhr.status);
                    }
                }
            };
            
            xhr.open("GET", "get_doctors.php?specialization=" + encodeURIComponent(specialization), true);
            xhr.send();
        });
    </script>
</body>
</html>

<?php
// Replace the database credentials with your own
$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['doctor'])) {
            $selectedDoctorId = $_POST['doctor'];

            // Update the database with the selected doctor's name
            $stmt = $conn->prepare("UPDATE patients SET selected_doctor_id = :doctorId WHERE id = :patientId");
            $stmt->bindParam(':doctorId', $selectedDoctorId);
            // Replace 'patientId' with the identifier of the patient in your database table
            $stmt->bindParam(':patientId', $patientId);
            $patientId = 1; // Replace this with the actual patient's ID from your application

            $stmt->execute();

            echo "Doctor selection updated successfully!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<?php
// Replace the database credentials with your own
$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['specialization'])) {
        $specialization = $_GET['specialization'];

        // Query to fetch doctors based on the selected specialization
        $stmt = $conn->prepare("SELECT id, name FROM doctors WHERE specialization = :specialization");
        $stmt->bindParam(':specialization', $specialization);
        $stmt->execute();

        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($doctors);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
