<?php
include("db.php");

$registered = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $file = $_FILES['insurance_card']['name'];
    $tmp = $_FILES['insurance_card']['tmp_name'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($file)) {
        move_uploaded_file($tmp, "uploads/" . $file);
        $sql = "INSERT INTO patients (name, email, password, record_file)
                VALUES ('$name', '$email', '$password', '$file')";
        mysqli_query($conn, $sql);
        $registered = true;
        $registeredName = $name;
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Patient Registration</h2>

    <?php if (!empty($error)) echo "<p>$error</p>"; ?>

    <?php if ($registered): ?>
        <p>Welcome, <?php echo $registeredName; ?></p>
        <p>Your registration was successful.</p>
    <?php else: ?>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Full Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <label>Upload Insurance Card</label>
            <input type="file" name="insurance_card">
            <button type="submit">Register</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>

