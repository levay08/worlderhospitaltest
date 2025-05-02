<?php
include("db.php");
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'patient') {
    header("Location: login.php");
    exit;
}

$patientId = $_SESSION['id'];
$query = "SELECT * FROM patients WHERE id = $patientId";
$result = mysqli_query($conn, $query);
$patient = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <p><a href="logout.php">Logout</a></p>
    <h2>Welcome, <?php echo htmlspecialchars($patient['name']); ?></h2>
    <p>Email: <?php echo htmlspecialchars($patient['email']); ?></p>
    <p>Insurance Card: <a href="uploads/<?php echo $patient['record_file']; ?>">View</a></p>
    <p><a href="book_appointment.php">Book Appointment</a></p>
</div>
</body>
</html>
