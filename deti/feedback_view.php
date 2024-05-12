<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback View</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Feedback View</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Feedback</th>
        </tr>
    </thead>
    <tbody>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, feedback FROM feedback_table"; // Updated query to select from the correct table
$result = $conn->query($sql);

if ($result === false) {
    die("Error in query: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["feedback"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No feedback yet</td></tr>";
}
$conn->close();
?>

    </tbody>
</table>

</body>
</html>
