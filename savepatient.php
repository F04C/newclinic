<?php
require_once "dbconn.php";
session_start();

if (!isset($_SESSION['isSec'])) {
    header('Location: login.php');
}

if (isset($_SESSION['secIDFK'])) {
    $secIDFK = $_SESSION['secIDFK'];
} else {
    echo "secIDFK is not set.";
}

if (isset($_POST["btnSavePatient"])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civilStatus = $_POST['civilStatus'];
    $phonenum = $_POST['phonenum'];
    $address = $_POST['address'];
    $dateOfBirth = $_POST['dateOfBirth'];

    // to check the received values
    //echo "Received POST data:<br>";
    //var_dump($_POST);


    // Create the SQL query
    $sql = "INSERT INTO tblpatient 
    (fname, mname, lname, patientage, sex, civilstatus, phonenumber, address, dateofbirth, tblsec_userid, findings, recommendation, isCancelled) 
    VALUES ('$fname', '$mname', '$lname', $age, '$sex', '$civilStatus', '$phonenum', '$address', '$dateOfBirth', $secIDFK, '', '', 0)";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        header("Location: secindex.php?msg=Patient created successfully");
        exit(); // Make sure to exit after redirection
    } else {
        // Handle the case where data insertion failed
        echo "Error: " . mysqli_error($conn);
    }
}
