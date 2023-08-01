<!DOCTYPE html>
<html>
<head>
  <title>Select Box Form</title>
</head>
<body>
  <form action="test61.php" method="post">
    <label for="option_select">Select an option:</label>
    <select name="option_select" id="option_select">
      <?php require_once('M_Connection.php');
   
        // Retrieve options from the database and populate the select box
        $sql = "SELECT Email FROM user_registration";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $option_label = $row["Email"]; // Corrected variable name
                echo "<option value='$option_label'>$option_label</option>";
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
