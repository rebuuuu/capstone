<?php
include('db.php');

// Query the database for violation data
$query = "SELECT type, count FROM violations";
$result = mysqli_query($conn, $query);

$violations = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $violations[] = $row;
    }
} else {
    echo "No data found.";
}

// Encode the data in JSON format
echo json_encode($violations);

mysqli_close($conn);
?>
