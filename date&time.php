<?php
session_start();
include('db.php');

// Check if the user is logged in via session or cookie
if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit();
}

// If logged in via cookie, set the session
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js library -->
</head>
<body>

<div class="header">
    <h1>Date & Time</h1>
    <div class="welcome-message">
        Welcome, <?php echo $_SESSION['username']; ?>!
    </div>
</div>

<div class="sidebar">
    <a href="home.php">Home</a>
    <a href="status.php">Status</a>
    <a href="list.php">List of Students</a>
    <a href="date&time.php">Date & Time</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <h2 id="home">Date & Time</h2>
    <p>This page is still under development.</p>
</div>

<script src="js/script.js"></script>
</body>
</html>
