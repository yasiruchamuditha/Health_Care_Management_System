<?php
// Assuming 'M_Connection.php' contains the database connection code
require_once('M_Connection.php');

$selectedSpecialization = '';

// Retrieve the selected specialization from the client-side if the form is submitted
if (isset($_POST['specialization'])) {
    $selectedSpecialization = $_POST['specialization'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Select Box Form</title>
</head>
<body>
  <form action="test61.php" method="post">
    <label for="specialization">Select a specialization:</label>
    <input type="text" name="specialization" id="specialization" value="<?php echo htmlspecialchars($selectedSpecialization); ?>">
    <br>
    <label for="option_select">Select a doctor:</label>
    <select name="option_select" id="option_select">
      <?php
      // Retrieve options from the database and populate the select box
      $sql = "SELECT Name FROM doctor_registration WHERE Specialization='$selectedSpecialization' ";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $option_label = $row["Name"];
              echo "<option value='" . htmlspecialchars($option_label) . "'>" . htmlspecialchars($option_label) . "</option>";
          }
      }

      $con->close();
      ?>
    </select>
    <br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
