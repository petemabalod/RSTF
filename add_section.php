<?php
// add_section.php
header('Content-Type: application/json');

// Database connection
$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);
$grade = $connection->real_escape_string($input['grade']); // Sanitize input
$section = $connection->real_escape_string($input['section']); // Sanitize input

// Insert the new section
$query = "INSERT INTO sections (grade_level_id, section_name) VALUES ('$grade', '$section')";

if (mysqli_query($connection, $query)) {
    // Retrieve the ID of the newly inserted section
    $section_id = mysqli_insert_id($connection);
    echo json_encode(['success' => true, 'section_id' => $section_id]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add section.']);
}

// Close the database connection
$connection->close();
?>
