<?php require_once('connection.php');

// Assuming $n contains the user name for which the profile is to be updated
$n = "g";

// Check if the request is sent using POST method and handle the update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Escape and sanitize the data before updating (to prevent SQL injection)
  $name = mysqli_real_escape_string($con, $_POST['Name']);
  $email = mysqli_real_escape_string($con, $_POST['Email']);
  $contactNo = mysqli_real_escape_string($con, $_POST['Contact_No']);
  $userRole = mysqli_real_escape_string($con, $_POST['User_Role']);

  // Update the user profile in the database
  $sql = "UPDATE user_registration SET Name='$name', Email='$email', Contact_No='$contactNo', User_Role='$userRole' WHERE Name='$n'";

  if (mysqli_query($con, $sql)) {
    // Return a success message with the updated user data
    $response = array('status' => 'success', 'data' => $_POST);
    echo json_encode($response);
  } else {
    // Return an error message if the update fails
    $response = array('status' => 'error', 'message' => 'Error updating profile: ' . mysqli_error($con));
    echo json_encode($response);
  }

  // Close the database connection
  mysqli_close($con);
}
?>
