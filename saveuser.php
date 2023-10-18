<!-- use the session of secid for adding the patient -->



<?php
require 'dbconn.php';
session_start();
if (isset($_SESSION['secid'])) {
    $secid = $_SESSION['secid'];


    if (isset($_POST["btnSave"])) {
        $firstName = $_POST["fname"];
        $middleName = $_POST["mname"];
        $lastName = $_POST["lname"];
        $age = $_POST["age"];
        $sex = $_POST["sex"];
        $civilStatus = $_POST["civilStatus"];
        $address = $_POST["address"];
        $dateOfBirth = $_POST["pDOB"];

        // Check if the patient already exists in tblpatient
        $checkPatientQuery = "SELECT * FROM tblpatient WHERE fname = '$firstName' AND lname = '$lastName' AND dateofbirth = '$dateOfBirth'";

        $result = mysqli_query($conn, $checkPatientQuery);

        if (mysqli_num_rows($result) == 0) {
            // No matching patient found, insert a new patient
            $insertPatientQuery = "INSERT INTO tblpatient (fname, mname, lname, patientage, sex, civilstatus, address, dateofbirth, tblsec_userid) VALUES ('$firstName', '$middleName', '$lastName', '$age', '$sex', '$civilStatus', '$address', '$dateOfBirth', '$secid')";

            if (mysqli_query($conn, $insertPatientQuery)) {
                echo "New patient added to tblpatient.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Patient already exists in tblpatient.";
        }
    }
} else {
    // Handle the case where 'secid' is not set, e.g., show an error message or redirect to a login page
    echo "Session variable 'secid' not found. Please log in.";
}
