<?php
include('../config/config.php');
// Fetch data from database
$sql = "SELECT * FROM user"; // Change this to your actual table name
$result = $conn->query($sql);

$data=[];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// print_r($data);
$conn->close();

echo json_encode($data);
?>
