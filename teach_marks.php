<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="navigation.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        input {
            width: 100%;
            border: none;
            outline: none;
        }
        #controls {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Section Lysithea</h2>
<div id="controls">
    <input type="file" id="fileInput" accept=".csv" />
    <button id="exportButton">Export Grades</button>
    <button id="addRowButton">Add Row</button>
    <button id="submitButton">Submit Data</button>
</div>

<form method="POST" id="gradeForm">
<table id="dataTable">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Activity</th>
            <th>HPS</th>
            <th>Score</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="student_name[]"></td>
            <td><input type="number" name="student_id[]" min="0"></td>
            <td><input type="text" name="name[]"></td>
            <td>
                <select name="subject[]">
                    <option value="Math">Math</option>
                    <option value="Science">Science</option>
                    <option value="English">English</option>
                    <option value="MAPEH">MAPEH</option>
                </select>
            </td>
            <td>
                <select name="activity[]">
                    <option value="Assignment/Activity">Assignment/Activity</option>
                    <option value="Summative">Summative</option>
                    <option value="Periodical">Periodical</option>
                    <option value="Performance Task">Performance Task</option>
                </select>
            </td>
            <td><input type="number" name="hps[]" min="0"></td>
            <td><input type="number" name="score[]" min="0"></td>
            <td><button class="deleteButton" onclick="deleteRow(this)">Delete</button></td>
        </tr>
    </tbody>
</table>
</form>

<script>
    function deleteRow(button) {
        const row = button.closest('tr');
        row.remove();
    }

    function addRow() {
        const newRow = document.createElement('tr');

        let newCell = document.createElement('td');
        newCell.innerHTML = '<input type="text" name="student_name[]">';
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        newCell.innerHTML = '<input type="number" name="student_id[]" min="0">';
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        newCell.innerHTML = '<input type="text" name="name[]">';
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        const subjectSelect = document.createElement('select');
        ['Math', 'Science', 'English', 'MAPEH'].forEach(optionText => {
            const option = document.createElement('option');
            option.value = optionText;
            option.textContent = optionText;
            subjectSelect.appendChild(option);
        });
        subjectSelect.name = 'subject[]';
        newCell.appendChild(subjectSelect);
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        const activitySelect = document.createElement('select');
        ['Assignment/Activity', 'Summative', 'Periodical', 'Performance Task'].forEach(optionText => {
            const option = document.createElement('option');
            option.value = optionText;
            option.textContent = optionText;
            activitySelect.appendChild(option);
        });
        activitySelect.name = 'activity[]';
        newCell.appendChild(activitySelect);
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        newCell.innerHTML = '<input type="number" name="hps[]" min="0">';
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        newCell.innerHTML = '<input type="number" name="score[]" min="0">';
        newRow.appendChild(newCell);

        newCell = document.createElement('td');
        const deleteButton = document.createElement('button');
        deleteButton.className = 'deleteButton';
        deleteButton.innerText = 'Delete';
        deleteButton.onclick = () => deleteRow(deleteButton);
        newCell.appendChild(deleteButton);
        newRow.appendChild(newCell);

        document.querySelector('#dataTable tbody').appendChild(newRow);
    }

    document.getElementById('addRowButton').addEventListener('click', addRow);
	document.getElementById('submitButton').addEventListener('click', function() {
    document.getElementById('gradeForm').submit();
});

</script>

<!-- PHP to handle data insertion -->
<?php
$host = 'localhost';  
$username = 'root';  
$password = '';
$dbname = 'spt';
$conn = mysqli_connect($host, $username, $password, $dbname) or die("Unable to connect to host");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_names = $_POST['student_name'];
    $student_ids = $_POST['student_id'];
    $names = $_POST['name'];
    $subjects = $_POST['subject'];
    $activities = $_POST['activity'];
    $hps = $_POST['hps'];
    $scores = $_POST['score'];

    for ($i = 0; $i < count($student_ids); $i++) {
        $stud_id = mysqli_real_escape_string($conn, $student_ids[$i]);
        $student_name = mysqli_real_escape_string($conn, $student_names[$i]);
        $name = mysqli_real_escape_string($conn, $names[$i]);
        $subject = mysqli_real_escape_string($conn, $subjects[$i]);
        $activity = mysqli_real_escape_string($conn, $activities[$i]);
        $hps_val = mysqli_real_escape_string($conn, $hps[$i]);
        $score = mysqli_real_escape_string($conn, $scores[$i]);

        // Check if the record exists
        $sql = "SELECT * FROM result WHERE stud_id='$stud_id' AND month='$subject' AND type='$activity'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // Insert new record if it doesn't exist
            $sql = "INSERT INTO result (stud_id, stud_name, title, month, type, total, marks)
                    VALUES ('$stud_id', '$student_name', '$name', '$subject', '$activity', '$hps_val', '$score')";
            if ($conn->query($sql) !== TRUE) {
                echo "<script>alert('Error inserting data');</script>";
            }
        } else {
            echo "<script>alert('Record for student ID $stud_id already exists');</script>";
        }
    }
    echo "<script>alert('Data submitted successfully');</script>";
}
?>

</body>
</html>
