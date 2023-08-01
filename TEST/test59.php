<?php
require_once('M_Connection.php');
$selectedSpecialization = '';

// Check if the specialization is sent via POST and sanitize it
if (isset($_POST['specialization'])) {
    $selectedSpecialization = $_POST['specialization'];
}

// Ensure $selectedSpecialization is not empty before using it in the query
if (!empty($selectedSpecialization)) {
    // Use prepared statement to avoid SQL injection
    $stmt = $con->prepare("SELECT Email FROM Doctor_registration WHERE Specialization = ?");
    $stmt->bind_param("s", $selectedSpecialization);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo "Specialization added successfully.";
    } else {
        echo "No matching records found for the selected specialization.";
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Box Form</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="specialization">Select a specialization:</label>
        <select name="specialization" id="specialization">
            <!-- Options go here -->
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
