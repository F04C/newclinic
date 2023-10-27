<?php
require_once "dbconn.php";

if (isset($_POST["btnDeletePatient"])) {
    $patientID = $_POST["patientID"];

    // Update the tblpatient table to set isCancelled to 1
    $sql = "UPDATE tblpatient SET isCancelled = 1 WHERE patientid = $patientID";

    if (mysqli_query($conn, $sql)) {
        // Update was successful
        header("Location: secindex.php?msg=Patient has been cancelled"); // Redirect back to the patient list
        exit; // Exit the script to prevent further execution
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Invalid request
    echo "Invalid request. Please provide a patient ID.";
}

mysqli_close($conn);



//check patientid