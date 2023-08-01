<!DOCTYPE html>
<html>
<head>
  <title>Select Box Form</title>
</head>
<body>
  <form action="process.php" method="post">
    <label for="option_select">Select an option:</label>
    <select name="option_select" id="option_select">
      <?php
      // Move the database connection to a separate file (M_Connection.php) and include it here.
      require_once('M_Connection.php');

      // Retrieve options from the database and populate the select box using prepared statements.
      $sql = "SELECT Email FROM user_registration";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $option_label = htmlspecialchars($row["Email"]); // Use htmlspecialchars() to escape the option label.
              echo "<option value='$option_label'>$option_label</option>";
          }
      }

      $stmt->close();
      $conn->close();
      ?>
    </select>
    <br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
