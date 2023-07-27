<?php
    $conn = mysqli_connect("localhost:3306", "root","DdCya995142@4681","helthcare" );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission and get the selected value
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Email'])) {
        $selected_option = $_POST['Email'];
        // Do something with the selected value (e.g., save it to the database or use it for further processing)
    }
}

$conn->close();
?>

