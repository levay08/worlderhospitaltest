
<?php
include("db.php");
session_start();
if ($_SESSION['role'] = 'doctor') {
}

$doctorId = $_SESSION['id'];

if (isset($_GET['delete_patient'])) {
$patientId = $_GET['delete_patient'];
mysqli_query($conn, "DELETE FROM patients WHERE id = $patientId");
}

$appointments = mysqli_query($conn, "SELECT * FROM appointments WHERE doctor_id = $doctorId");
$patients = mysqli_query($conn, "SELECT * FROM patients");
?>

<html>
<head>
<title>Doctor Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<p><a href="logout.php">Logout</a></p>
<h2>Doctor Panel</h2>

<h3>Appointments</h3>
<?php while ($appt = mysqli_fetch_assoc($appointments)) { ?>
<p>Patient ID: <?php echo $appt['patient_id']; ?> @ <?php echo $appt['appointment_date'] . ' ' . $appt['appointment_time']; ?></p>
<?php } ?>

<h3>All Patients</h3>
<?php while ($p = mysqli_fetch_assoc($patients)) { ?>
<p>
<?php echo $p['name']; ?> | <?php echo $p['email']; ?>
| <a href="?delete_patient=<?php echo $p['id']; ?>">Delete</a>
</p>
<?php } ?>
</div>
</body>
</html>

