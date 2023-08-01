<!DOCTYPE html>
<html>
<head>
  <title>Doctor Appointment - Page 2</title>
</head>
<body>
  <h1>Doctor Appointment - Page 2</h1>
  <form action="appointment_confirmation.html" method="post">
    <h2>Doctor Selection</h2>
    <label for="doctor">Preferred Doctor:</label>
    <select id="doctor" name="doctor" required>
      <option value="Dr. John Smith">Dr. John Smith</option>
      <option value="Dr. Emily Johnson">Dr. Emily Johnson</option>
      <option value="Dr. Michael Brown">Dr. Michael Brown</option>
      <option value="Dr. Sarah Lee">Dr. Sarah Lee</option>
    </select><br>

    <label for="doctor_specialty">Doctor's Specialty:</label>
    <input type="text" id="doctor_specialty" name="doctor_specialty" required><br>

    <h2>Appointment Date and Time</h2>
    <label for="appointment_date">Preferred Date:</label>
    <input type="date" id="appointment_date" name="appointment_date" required><br>

    <label for="appointment_time">Preferred Time:</label>
    <select id="appointment_time" name="appointment_time" required>
      <option value="08:00 AM">08:00 AM</option>
      <option value="09:00 AM">09:00 AM</option>
      <option value="10:00 AM">10:00 AM</option>
      <option value="11:00 AM">11:00 AM</option>
      <option value="01:00 PM">01:00 PM</option>
      <option value="02:00 PM">02:00 PM</option>
      <option value="03:00 PM">03:00 PM</option>
      <option value="04:00 PM">04:00 PM</option>
    </select><br>

    <h2>Terms and Conditions</h2>
    <input type="checkbox" id="terms" name="terms" required>
    <label for="terms">I have read and agreed to the terms and conditions.</label><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>
