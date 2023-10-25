<?php
require_once 'dbconn.php';

if (isset($_POST['btnUpdateUser'])) {
    // Retrieve form data
    $userID = $_POST['id']; // Get the user ID
    $firstName = $_POST['fname'];
    $middleName = $_POST['mname'];
    $lastName = $_POST['lname'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phonenum'];
    $userRole = $_POST['UserPos']; // Get the user role (Doctor or Secretary)

    // Check the user role and retrieve additional fields if needed
    if ($userRole === 'doc') {
        $specialization = $_POST['specialization'];
        $licno = $_POST['licno'];

        // Update the tbldoctor table for doctors
        $sql = "UPDATE tbldoctor 
            SET fname = '$firstName',
                mname = '$middleName',
                lname = '$lastName',
                address = '$address',
                phonenum = '$phoneNum',
                specialization = '$specialization',
                licensenum = '$licno'
            WHERE doctorid = $userID";
    } else {
        // Update the tblsec table for secretaries
        $sql = "UPDATE tblsec 
            SET fname = '$firstName',
                mname = '$middleName',
                lname = '$lastName',
                address = '$address',
                phonenum = '$phoneNum'
            WHERE userid = $userID";
    }

    try {
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: adminindex.php?msg=Data updated successfully");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo "Error";
    }
}
