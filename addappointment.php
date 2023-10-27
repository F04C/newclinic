<?php
require_once 'dbconn.php';

session_start();

if (isset($_SESSION['secIDFK'])) {
    $secIDFK = $_SESSION['secIDFK'];
} else {
    echo "secIDFK is not set.";
}
if (isset($_POST['btnAddAppointment'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civilStatus = $_POST['civilStatus'];
    $phonenum = $_POST['phonenum'];
    $address = $_POST['address'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $doctor = $_POST['doctor'];
    $type_appointment = $_POST['type_appointment'];


    // Insert patient data into tblpatient
    $sql = "INSERT INTO tblpatient 
    (fname, mname, lname, patientage, sex, civilstatus, phonenumber, address, dateofbirth, tblsec_userid, findings, recommendation, isCancelled) 
    VALUES ('$fname', '$mname', '$lname', $age, '$sex', '$civilStatus', '$phonenum', '$address', '$dateOfBirth', $secIDFK, '', '', 0)";

    if (mysqli_query($conn, $sql)) {
        // Get the last inserted patient ID
        $patientID = mysqli_insert_id($conn);

        // Now, insert appointment data into tblappointment
        $sql = "INSERT INTO tblappointment (tblpatient_patientid, tblsec_userid, tbldoctor_doctorid, date, type_appointment)
VALUES ($patientID, $secIDFK, $doctor, NOW(), '$type_appointment')";

        if (mysqli_query($conn, $sql)) {
            // Appointment successfully created
            header("Location: secindex.php?msg=Appointment has been added successfully!");
        } else {
            // Handle appointment insertion error
            echo "Error creating appointment: " . mysqli_error($conn);
        }
    } else {
        // Handle patient insertion error
        echo "Error adding patient: " . mysqli_error($conn);
    }
}
