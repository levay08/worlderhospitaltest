<?php
include("db.php");
session_start();

$patientId = isset($_SESSION['role']) && $_SESSION['role'] === 'patient' ? $_SESSION['id'] : 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $doctorId = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (!empty($doctorId) && !empty($date) && !empty($time)) {
        $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time)
                  VALUES ($patientId, $doctorId, '$date', '$time')";
        mysqli_query($conn, $query);
        $message = "Appointment booked.";
    }
}

$doctors = mysqli_query($conn, "SELECT * FROM doctors");
$appointments = mysqli_query($conn, "SELECT * FROM appointments ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Book Appointment</h2>
    <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    <form method="post">
        <select name="doctor_id">
            <?php while ($doc = mysqli_fetch_assoc($doctors)): ?>
                <option value="<?php echo $doc['id']; ?>">
                    <?php echo htmlspecialchars($doc['title'] . ' ' . $doc['name']); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="date" name="date">
        <input type="time" name="time">
        <button type="submit">Book</button>
    </form>
</div>

<div class="container">
    <h3>All Appointments</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        <?php while ($a = mysqli_fetch_assoc($appointments)): ?>
            <tr>
                <td><?php echo $a['id']; ?></td>
                <td><?php echo $a['patient_id']; ?></td>
                <td><?php echo $a['doctor_id']; ?></td>
                <td><?php echo $a['appointment_date']; ?></td>
                <td><?php echo $a['appointment_time']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
