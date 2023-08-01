<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment - Submission Result</title>
</head>
<body>
    <h1>Doctor Appointment - Submission Result</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $full_name = $_POST["full_name"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $street_address = $_POST["street_address"];
        $specialization = $_POST["specialization"];
        $symptoms = $_POST["symptoms"];

        echo "<h2>Personal Information</h2>";
        echo "<p><strong>Full Name:</strong> $full_name</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Date of Birth:</strong> $dob</p>";
        echo "<p><strong>Email Address:</strong> $email</p>";
        echo "<p><strong>Phone Number:</strong> $phone</p>";

        echo "<h2>Address</h2>";
        echo "<p><strong>Street Address:</strong> $street_address</p>";

        echo "<h2>Doctor Specialization Details</h2>";
        echo "<p><strong>Specialization:</strong> $specialization</p>";

        echo "<h2>Additional Information</h2>";
        echo "<p><strong>Symptoms or Medical Condition:</strong> $symptoms</p>";
    } else {
        echo "<p>Form submission failed.</p>";
    }
    ?>

</body>
</html>
