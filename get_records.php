<?php
$section_id = $_GET['section_id'];
$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM records WHERE section_id = $section_id";
$result = $connection->query($query);

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = [
        'student_name' => $row['student_name'],
        'subject' => $row['subject'],
        'activity' => $row['activity'],
        'hps' => $row['hps'],
        'score' => $row['score']
    ];
}

echo json_encode($records);

$connection->close();
?>
