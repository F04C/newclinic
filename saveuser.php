<?php
include "dbconn.php";
session_start();
var_dump($_POST);

if (!isset($_SESSION['isAdmin'])) {
    header('Location: login.php');
}

if (isset($_POST["btnSaveUser"])) {
    $pw1 = $_POST['pass'];
    $pw2 = $_POST['pword2'];



    if ($pw1  == $pw2) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `tbluser` VALUES (NULL, '$uname', '$pw1', '$email', '$gender', '$first_name', '$last_name');";


        try {
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?msg=New record created successfully");
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        } catch (Exception $e) {
            echo 'Error';
        }
    } else {
        header("Location: add-new.php?msg=Password did not matched!");
    }
}
