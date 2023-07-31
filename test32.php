<?php require_once('M_Connection.php');

$selectedSpecialization = "";
$doctors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['specialization'])) {
        $selectedSpecialization = $_POST['specialization'];

        try {
            $stmt = $con->prepare("SELECT * FROM doctors WHERE specialization = :specialization");
            $stmt->bindParam(':specialization', $selectedSpecialization);
            $stmt->execute();
            $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching doctors: " . $e->getMessage();
            die();
        }
    } else {
        // Handle the case when no specialization is selected
        echo "Please select a specialization.";
        die();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Search</title>
</head>
<body>
    <h2>Search for Doctors by Specialization</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="specialization">Select Specialization:</label>
        <select name="specialization" id="specialization">
            <option value="Cardiologist"<?php if ($selectedSpecialization === "Cardiologist") echo " selected"; ?>>Cardiologist</option>
            <option value="Dermatologist"<?php if ($selectedSpecialization === "Dermatologist") echo " selected"; ?>>Dermatologist</option>
            <option value="Orthopedic"<?php if ($selectedSpecialization === "Orthopedic") echo " selected"; ?>>Orthopedic</option>
            <!-- Add more options as needed -->
        </select>
        <input type="submit" value="Search">
    </form>

    <?php if ($selectedSpecialization !== "") : ?>
        <h2>Doctors with Specialization: <?php echo $selectedSpecialization; ?></h2>
        <?php if (count($doctors) > 0) : ?>
            <form>
                <label for="doctor">Select a Doctor:</label>
                <select name="doctor" id="doctor">
                    <?php foreach ($doctors as $doctor) : ?>
                        <option value="<?php echo $doctor['id']; ?>"><?php echo $doctor['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        <?php else : ?>
            <p>No doctors found with the selected specialization.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
