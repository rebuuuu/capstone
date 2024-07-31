<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="login-background">
    <div class="form-container">
        <h2>Login</h2>
        <form action="auth.php" method="post">
            <label for="username">Username</label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" name="login">Login</button>

            <!-- Registration button -->
            <div class="register-link">
                <a href="register.php" class="register-button">Register</a>
            </div>
        </form>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>
