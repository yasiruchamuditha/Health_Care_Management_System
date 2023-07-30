<!DOCTYPE html>
<html>
<head>
  <title>Doctor Registration Form</title>
</head>
<body>
  <h1>Doctor Registration Form</h1>
  <form action="#" method="post">
    <h2>Personal Information:</h2>
    <label for="full-name">Full Name:</label>
    <input type="text" id="full-name" name="full-name" required>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" required>
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="other" required>
    <label for="other">Other</label>

    <label for="date-of-birth">Date of Birth:</label>
    <input type="date" id="date-of-birth" name="date-of-birth" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required>

    <label for="nationality">Nationality:</label>
    <input type="text" id="nationality" name="nationality" required>

    <label for="contact-number">Contact Number:</label>
    <input type="tel" id="contact-number" name="contact-number" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <h2>Professional Information:</h2>
    <label for="license-number">Medical License Number:</label>
    <input type="text" id="license-number" name="license-number" required>

    <label for="specialization">Specialization:</label>
    <input type="text" id="specialization" name="specialization" required>

    <label for="graduation-year">Year of Graduation:</label>
    <input type="number" id="graduation-year" name="graduation-year" required>

    <h2>Work Experience:</h2>
    <label for="years-experience">Total Years of Experience:</label>
    <input type="number" id="years-experience" name="years-experience" required>

    <label for="workplace">Current Workplace/Hospital:</label>
    <input type="text" id="workplace" name="workplace" required>

    <label for="work-address">Work Address:</label>
    <input type="text" id="work-address" name="work-address" required>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required>

    <label for="state">State/Province:</label>
    <input type="text" id="state" name="state" required>

    <label for="zip-code">Zip/Postal Code:</label>
    <input type="text" id="zip-code" name="zip-code" required>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" required>

    <h2>Availability:</h2>
    <label>Days available for practice:</label><br>
    <input type="checkbox" id="monday" name="practice-days" value="Monday">
    <label for="monday">Monday</label>
    <input type="checkbox" id="tuesday" name="practice-days" value="Tuesday">
    <label for="tuesday">Tuesday</label>
    <input type="checkbox" id="wednesday" name="practice-days" value="Wednesday">
    <label for="wednesday">Wednesday</label>
    <input type="checkbox" id="thursday" name="practice-days" value="Thursday">
    <label for="thursday">Thursday</label>
    <input type="checkbox" id="friday" name="practice-days" value="Friday">
    <label for="friday">Friday</label>
    <input type="checkbox" id="saturday" name="practice-days" value="Saturday">
    <label for="saturday">Saturday</label>
    <input type="checkbox" id="sunday" name="practice-days" value="Sunday">
    <label for="sunday">Sunday</label>

    <label for="working-hours">Working Hours:</label>
    <input type="time" id="working-hours" name="working-hours" required>

    <h2>Additional Information:</h2>
    <label for="medical-association">Member of any medical association?</label>
    <input type="radio" id="yes-association" name="medical-association" value="Yes">
    <label for="yes-association">Yes</label>
    <input type="radio" id="no-association" name="medical-association" value="No">
    <label for="no-association">No</label>

    <label for="certifications">Certifications related to your specialization?</label>
    <input type="radio" id="yes-certifications" name="certifications" value="Yes">
    <label for="yes-certifications">Yes</label>
    <input type="radio" id="no-certifications" name="certifications" value="No">
    <label for="no-certifications">No</label>

    <label for="expertise">Areas of expertise and interest:</label>
    <textarea id="expertise" name="expertise" rows="4" required></textarea>

    <h2>How did you hear about our registration opportunity?</h2>
    <label for="registration-source">Source:</label>
    <select id="registration-source" name="registration-source" required>
      <option value="Advertisement">Advertisement</option>
      <option value="Referral">Referral</option>
      <option value="Online Search">Online Search</option>
      <option value="Other">Other</option>
    </select>

    <label for="other-source">If 'Other,' please specify:</label>
    <input type="text" id="other-source" name="other-source">

    <h2>Declaration:</h2>
    <label for="declaration">I hereby confirm that all the information provided above is true and accurate to the best of my knowledge.</label>
    <input type="checkbox" id="declaration" name="declaration" required>

    <br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
