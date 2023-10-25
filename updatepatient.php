<?php
require_once "dbconn.php";

if (isset($_POST["btnPatientUpdate"])) {
    $patientID = $_POST["patientID"];
    $firstName = $_POST["fname"];
    $middleName = $_POST["mname"];
    $lastName = $_POST["lname"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $civilStatus = $_POST["civilStatus"];
    $address = $_POST["address"];
    $dateOfBirth = $_POST["dateOfBirth"];

    // Update the patient in the database
    $sql = "UPDATE tblpatient 
            SET fname = '$firstName',
                mname = '$middleName',
                lname = '$lastName',
                patientage = '$age',
                sex = '$sex',
                civilstatus = '$civilStatus',
                address = '$address',
                dateofbirth = '$dateOfBirth'
            WHERE patientid = $patientID";

    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or display a success message
        header("Location: secindex.php?msg=Data has been updated successfully!");
        exit();
    } else {
        // Handle the update error
        echo "Error updating patient: " . mysqli_error($conn);
    }
}
