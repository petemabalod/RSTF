<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection (using PDO)
try {
    $conn = new PDO("mysql:host=localhost;dbname=spt", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => "Connection failed: " . $e->getMessage()]);
    exit; // Stop execution if the connection fails
}

// Prepare an empty array to hold grade levels and sections
$response = [
    'grades' => [],
    'sections' => []
];

try {
    // Fetch all grade levels with their IDs
    $gradeQuery = $conn->query("SELECT id, grade_level FROM grade_levels");
    $grades = $gradeQuery->fetchAll(PDO::FETCH_ASSOC); // Get both 'id' and 'grade_level' columns
    $response['grades'] = $grades; // Store the entire row

    // Initialize sections array in the response
    foreach ($grades as $grade) {
        $response['sections'][$grade['id']] = []; // Use ID as the key
        
        // Fetch sections for each grade level
        $sectionQuery = $conn->prepare("SELECT section_name FROM sections WHERE grade_level_id = :grade_id");
        $sectionQuery->bindParam(':grade_id', $grade['id']); // Bind the ID
        $sectionQuery->execute();
        $sections = $sectionQuery->fetchAll(PDO::FETCH_COLUMN); // Get only 'section_name' column
        
        // Store sections under the corresponding grade level ID
        $response['sections'][$grade['id']] = $sections;
    }

    // Return response as JSON
    echo json_encode($response);

} catch (PDOException $e) {
    // Handle any errors
    echo json_encode(['error' => $e->getMessage()]);
}
?>