<?php
include("db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role === 'patient') {
        $query = "SELECT * FROM patients WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['role'] = 'patient';
            $_SESSION['id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        }
    }

    if ($role === 'doctor') {
        $query = "SELECT * FROM doctors WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['role'] = 'doctor';
            $_SESSION['id'] = $user['id'];
            header("Location: doctor_dashboard.php");
            exit;
        }
    }

    $error = "Invalid credentials.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    <form method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <select name="role">
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
        </select>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
