<?php
require_once 'dbconn.php';


if (isset($_POST['btnUpdatePatient'])) {
    // Retrieve form data
    $firstName = $_POST['fname'];
    $middleName = $_POST['mname'];
    $lastName = $_POST['lname'];
    $address = $_POST['address'];
    $age = $_POST['patientage'];
    $sex = $_POST['sex'];
    $civilstatus = $_POST['civilstatus'];
    $phonenum = $_POST['phonenum'];
    $dob = $_POST['dob'];
    $patientID = $_POST['patientID'];


    $sql = "UPDATE tblpatient 
            SET fname = '$firstName',
                mname = '$middleName',
                lname = '$lastName',
                patientage = '$age',
                sex = '$sex',
                civilstatus = '$civilstatus',
                phonenum = '$phonenum',dateofbirth = '$dob'
            WHERE patientID = $patientID";
}

if (isset($_SESSION["isDoc"]) && (isset($_SESSION["isSec"]))) {
    try {
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: patientrecord.php?msg=Data updated successfully");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo "Error";
    }
}
