<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Check if section_id and student_name are set
if (!isset($data['section_id']) || !isset($data['student_name'])) {
    die(json_encode(['success' => false, 'message' => 'Invalid input data.']));
}

$section_id = $data['section_id'];
$student_name = $data['student_name'];

// Prepare the SQL DELETE statement
$sql = "DELETE FROM records WHERE section_id = ? AND student_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $section_id, $student_name);

// Execute the prepared statement
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Record deleted successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error deleting record: ' . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>