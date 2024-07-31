<?php
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "Registration successful. You can now <a href='login.php'>log in</a>.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="login-background">
    <div class="form-container">
        <h2>Register</h2>
        <form action="auth.php" method="post">
            <label for="username">Username</label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <label for="email">Email</label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="confirm-password" id="confirm-password" required>

            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>
