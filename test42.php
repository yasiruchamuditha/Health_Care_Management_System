<!DOCTYPE html>
<html>
<head>
  <title>Select Box Form</title>
</head>
<body>
  <form action="test41.php" method="post">
    <label for="option_select">Select an option:</label>
    <select name="option_select" id="option_select">
      <?php  require_once('M_Connection.php');
      
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

    <div class="inputfeild mb-3">
                  <label for="option_select">Select an option:</label>
                  <select name="option_select" id="option_select">

                  <?php require_once('M_Connection.php');
                  $Name = '';
                  $Special = '';
                  $concatenated ='';
                   // Retrieve options from the database and populate the select box
                   $sql = "SELECT * FROM doctor_registration where Specialization = $selectedSpecialization";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) 
                   {
                      while ($row = $result->fetch_assoc())
                      {
                      $Name = $row["Name"]; // Corrected variable name
                      $Special = $row["Specialization"]; // Corrected variable name
                      $concatenated = $Name . " " . $Special;
                      echo "<option value='$concatenated'>$concatenated</option>";
                      }
                   }
                   $conn->close();
                   ?>
                 </select>
                  </div>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
