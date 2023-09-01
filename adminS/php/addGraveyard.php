<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "htdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract data from the form
$cemeteryName = $_POST['graveyardName'];
$locationName = $_POST['graveLocation'];
$sectionCount = $_POST['sectionNumber'];
$sectionCodes = $_POST['sectionCode']; // An array containing SectionCodes

// Insert data into the cemeteries table
$sql = "INSERT INTO cemeteries (CemeteryName, LocationName) VALUES ('$cemeteryName', '$locationName')";
$conn->query($sql);

// Get the ID of the newly inserted cemetery
$cemeteryID = $conn->insert_id;

// Insert data into the sections table for each section
for ($i = 0; $i < $sectionCount; $i++) {
    $sectionCode = $sectionCodes[$i];
    $totalGraves = $_POST["totalGraves$i"]; // Assuming you have inputs for totalGraves[i]
    $availableGraves = $_POST["availableGraves$i"]; // Assuming you have inputs for availableGraves[i]

    $sql = "INSERT INTO sections (CemeteryID, SectionCode, TotalGraves, AvailableGraves) VALUES ($cemeteryID, $sectionCode, $totalGraves, $availableGraves)";
    $conn->query($sql);
}

// Close the database connection
$conn->close();
?>
