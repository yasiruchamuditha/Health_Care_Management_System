<!DOCTYPE html>
<html>
<head>
  <title>Doctors Selection</title>
</head>
<body>
  <form>
    <label for="specialization">Select Specialization:</label>
    <select id="specialization" onchange="loadDoctors()">
      <option value="cardiologist">Cardiologist</option>
      <option value="dermatologist">Dermatologist</option>
      <option value="orthopedic">Orthopedic</option>
      <!-- Add other specializations as needed -->
    </select>

    <label for="doctor">Select Doctor:</label>
    <select id="doctor">
      <!-- Doctors corresponding to selected specialization will be dynamically added here -->
    </select>
  </form>

  <script>
    function loadDoctors() {
      const specializationSelect = document.getElementById("specialization");
      const doctorSelect = document.getElementById("doctor");
      const selectedSpecialization = specializationSelect.value;

      // Clear previous options
      doctorSelect.innerHTML = "";

      // Make an AJAX request to fetch doctors from the server based on the selected specialization
      const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          const doctors = JSON.parse(this.responseText);
          doctors.forEach((doctor) => {
            const option = document.createElement("option");
            option.textContent = doctor.name;
            doctorSelect.appendChild(option);
          });
        }
      };

      xhttp.open("GET", `get_doctors.php?specialization=${selectedSpecialization}`, true);
      xhttp.send();
    }

    // Initially, load doctors based on the default specialization selection
    loadDoctors();
  </script>
</body>
</html>

<?php require_once('M_Connection.php');


if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Get the selected specialization from the request
  $selectedSpecialization = $_GET["specialization"];

  // Prepare and execute a query to get doctors based on the selected specialization
  $sql = "SELECT name FROM doctors WHERE specialization = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("s", $selectedSpecialization);
  $stmt->execute();

  // Fetch the results and store them in an array
  $doctors = array();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $doctors[] = $row;
  }

  // Close the database connection
  $con->close();

  // Return the doctors as JSON response
  header("Content-Type: application/json");
  echo json_encode($doctors);
}
?>
