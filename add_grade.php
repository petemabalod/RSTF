<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get data from the POST request
$data = json_decode(file_get_contents("php://input"), true);
$grade_name = $connection->real_escape_string($data['grade_name']);

// Insert the new grade level
$query = "INSERT INTO grade_levels (grade_level) VALUES ('$grade_name')";

if ($connection->query($query)) {
    echo json_encode(['status' => 'success', 'message' => 'Grade level added']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add grade level']);
}

$connection->close();
?>
