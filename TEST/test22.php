<?php
// Include the database connection file and session management code
require_once('M_Connection.php');
session_start();

// Check if the admin is logged in, otherwise redirect to the login page
if (!isset($_SESSION["Email"])) {
    header("Location: M_Admin_Login.php");
    exit;
}

// Initialize variables
$searchResult = [];
$alertMessage = '';

// Process the search form submission
if (isset($_POST["searchBtn"]) && isset($_POST["searchPatientNIC"])) {
    $searchPatientNIC = $_POST["searchPatientNIC"];

    // Perform SQL query to find records based on patient NIC
    $sql = "SELECT * FROM Blood_Test WHERE Patient_NIC = '$searchPatientNIC'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Store the search results in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResult[] = $row;
        }
    } else {
        $alertMessage = "No records found for the provided patient NIC.";
    }
}

// Process the delete form submission
if (isset($_POST["deleteBtn"]) && isset($_POST["deleteRecords"])) {
    $deleteRecords = $_POST["deleteRecords"];

    // Perform SQL query to delete the selected records
    $deleteSQL = "DELETE FROM Blood_Test WHERE Patient_NIC IN ('" . implode("','", $deleteRecords) . "')";
    $deleteResult = mysqli_query($con, $deleteSQL);

    if ($deleteResult) {
        $alertMessage = "Selected records have been deleted successfully.";
    } else {
        $alertMessage = "Error occurred while deleting records. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Include your head section with necessary CSS and JavaScript -->
    <!-- ... -->
</head>
<body>
<?php require('P_Navigation_Bar.php'); ?>
    <div class="container" style="margin-top:200px;">
        <h1>Admin Dashboard</h1>
        <h2>Search and Delete Blood Test Records</h2>
        <!-- Search Form -->
        <form method="post" class="mb-3">
            <div class="form-group">
                <label for="searchPatientNIC">Search by Patient NIC:</label>
                <input type="text" class="form-control" id="searchPatientNIC" name="searchPatientNIC" required>
            </div>
            <button type="submit" class="btn btn-primary" name="searchBtn">Search</button>
        </form>

        <!-- Display the search results (if any) and the delete form -->
        <?php if (!empty($searchResult)): ?>
            <h2>Search Results:</h2>
            <form method="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patient NIC</th>
                            <th>Email</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Test Type</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($searchResult as $record): ?>
                            <tr>
                                <td><?php echo $record['Patient_NIC']; ?></td>
                                <td><?php echo $record['Email']; ?></td>
                                <td><?php echo $record['Appointment_Date']; ?></td>
                                <td><?php echo $record['Appointment_Time']; ?></td>
                                <td><?php echo $record['Test_Type']; ?></td>
                                <td><input type="checkbox" name="deleteRecords[]" value="<?php echo $record['Patient_NIC']; ?>"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger" name="deleteBtn">Delete Selected</button>
            </form>
        <?php endif; ?>

        <!-- Display the alert message (if any) -->
        <?php if (!empty($alertMessage)): ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $alertMessage; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php require('P_Footer.php'); ?>
</body>
</html>
