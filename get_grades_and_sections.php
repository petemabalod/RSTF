<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die(json_encode(['status' => 'error', 'message' => "Connection failed: " . $connection->connect_error]));
}

$query = "SELECT * FROM grade_levels";
$result = $connection->query($query);

$grades = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $grades[] = $row;
    }
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($grades);

$connection->close();
?>