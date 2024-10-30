<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get data from the POST request
$data = json_decode(file_get_contents("php://input"), true);
$section_id = $connection->real_escape_string($data['section_id']);
$student_name = $connection->real_escape_string($data['student_name']);
$subject = $connection->real_escape_string($data['subject']);
$activity = $connection->real_escape_string($data['activity']);
$hps = $connection->real_escape_string($data['hps']);
$score = $connection->real_escape_string($data['score']);

// Insert the record into the database
$query = "INSERT INTO records (section_id, student_name, subject, activity, hps, score) 
          VALUES ('$section_id', '$student_name', '$subject', '$activity', '$hps', '$score')";

if ($connection->query($query)) {
    echo json_encode(['status' => 'success', 'message' => 'Record saved']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to save record']);
}

$connection->close();
?>
