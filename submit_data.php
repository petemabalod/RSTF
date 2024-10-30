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

// Check if section_id and records are set
if (!isset($data['section_id']) || !isset($data['records'])) {
    die(json_encode(['success' => false, 'message' => 'Invalid input data.']));
}

$section_id = $data['section_id'];
$records = $data['records'];

// Prepare the SQL INSERT statement
$sql = "INSERT INTO records (section_id,stud_id, student_name, subject, activity, hps, score) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("iissssi", $section_id,$student_id, $student_name, $subject, $activity, $hps, $score);

// Loop through each record and execute the prepared statement
foreach ($records as $record) {
    $student_name = $record['student_name'];
    $student_id = $record['student_id'];
    $subject = $record['subject'];
    $activity = $record['activity'];
    $hps = $record['hps'];
    $score = $record['score'];

    // Execute the prepared statement
    if (!$stmt->execute()) {
        echo json_encode (['success' => false, 'message' => 'Error inserting record: ' . $stmt->error]);
        exit;
    }
}

// Close the statement and connection
$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'message' => 'Data submitted successfully!']);

?>