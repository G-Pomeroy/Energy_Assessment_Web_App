<?php

require_once '..\Model\database.php';

$conn = connect();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT times_applicable, program_name FROM program_applicability";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

$labels = array();
$dataValues = array();

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['program_name'];
    $dataValues[] = (int)$row['times_applicable'];
}

$data = array(
    'labels' => $labels,
    'data' => $dataValues
);

mysqli_close($conn);

echo json_encode($data);



