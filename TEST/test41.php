<?php       require_once('M_Connection.php');

// Initialize a variable to store the message to be displayed
$message = '';

// Process the form submission and get the selected value
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['option_select'])) {
        $selected_option = $_POST['option_select'];
        // Do something with the selected value (e.g., save it to the database or use it for further processing)

        // Example: Save the selected option to the database
        // Modify this part based on your requirements
        $sql = "INSERT INTO selected_options (selected_option) VALUES ('$selected_option')";
        if ($con->query($sql) === TRUE) {
            $message = "Selected option saved successfully!";
        } else {
            $message = "Error: " . $con->error;
        }
    }
}

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
</head>
<body>
    <h1>Form Submission Result</h1>
    <p><?php echo $message; ?></p>
    <p><a href="your_original_form_page.html">Go back to the form</a></p>
</body>
</html>
