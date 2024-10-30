<?php
$grade_id = $_GET['grade_level_id'];
$connection = new mysqli("localhost", "root", "", "spt");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM sections WHERE grade_level_id = $grade_id";
$result = $connection->query($query);

$sections = [];
while ($row = $result->fetch_assoc()) {
    $sections[] = ['id' => $row['id'], 'name' => $row['section_name']];
}

echo json_encode($sections);

$connection->close();
?>
