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

// Query the database for students
$query = "SELECT srcode, name, section, department, violation FROM students";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
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
    <h1>List of Students</h1>
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
    <table>
        <thead>
            <tr>
                <th>Sr-code</th>
                <th>Name</th>
                <th>Section</th>
                <th>Department</th>
                <th>Violation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["srcode"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["section"] . "</td>";
                    echo "<td>" . $row["department"] . "</td>";
                    echo "<td>" . $row["violation"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="js/script.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
