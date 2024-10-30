<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get data from the POST request
$data = json_decode(file_get_contents("php://input"), true);
$record_id = $connection->real_escape_string($data['record_id']);
$student_name = $connection->real_escape_string($data['student_name']);
$subject = $connection->real_escape_string($data['subject']);
$activity = $connection->real_escape_string($data['activity']);
$hps = $connection->real_escape_string($data['hps']);
$score = $connection->real_escape_string($data['score']);

// Update the existing record
$query = "UPDATE records 
          SET student_name = '$student_name', subject = '$subject', activity = '$activity', hps = '$hps', score = '$score' 
          WHERE id = $record_id";

if ($connection->query($query)) {
    echo json_encode(['status' => 'success', 'message' => 'Record updated']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
}

$connection->close();
?>
