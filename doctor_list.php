<?php
include("db.php");
$doctors = mysqli_query($conn, "SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Our Doctors</h2>
    <?php while ($doc = mysqli_fetch_assoc($doctors)): ?>
        <p>
            <strong><?php echo htmlspecialchars($doc['title'] . ' ' . $doc['name']); ?></strong><br>
            Specialty: <?php echo htmlspecialchars($doc['specialty']); ?>
        </p>
    <?php endwhile; ?>
</div>
</body>
</html>
