<!DOCTYPE html>
<html>
<head>
  <title>Doctor Appointment - Page 1</title>
</head>
<body>
  <h1>Doctor Appointment - Page 1</h1>
  <form action="test51.php" method="post">
    <h2>Personal Information</h2>
    <label for="full_name">Full Name:</label>
    <input type="text" id="full_name" name="full_name" required><br>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="Male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="Other">
    <label for="other">Other</label><br>

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required><br>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" required><br>

    <h2>Address</h2>
    <label for="street_address">Street Address:</label>
    <input type="text" id="street_address" name="street_address" required><br>

    <h2>Doctor Specialization Details</h2>
<label for="specialization">Select Doctor Specialization:</label>
<select id="specialization" name="specialization" required>
  <option value="">-- Select Specialization --</option>
  <option value="Cardiology">Cardiology</option>
  <option value="Neurology">Neurology</option>
  <option value="Oncology">Oncology</option>
  <!-- Add more specialization options here -->
</select><br>


    <h2>Additional Information</h2>
    <label for="symptoms">Describe your symptoms or medical condition briefly:</label><br>
    <textarea id="symptoms" name="symptoms" rows="4" cols="50"></textarea><br>

    <input type="submit" value="Next">
  </form>
</body>
</html>
