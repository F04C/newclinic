<?php
// Include your database connection code here
require "dbconn.php";

if (isset($_POST["btnDeleteUser"])) {
    // Retrieve the user ID and UserRole to be soft-deleted
    if (isset($_POST["ID"]) && isset($_POST["UserRole"])) {
        $userID = $_POST["ID"]; // Ensure to validate and sanitize user input
        $userRole = $_POST["UserRole"]; // Get the UserRole value

        // Check whether the user exists in the corresponding table based on UserRole
        if ($userRole === 'Doc') {
            $sql = "UPDATE tbldoctor SET isDeleted = 1 WHERE doctorid = $userID";
        } elseif ($userRole === 'Sec') {
            $sql = "UPDATE tblsec SET isDeleted = 1 WHERE userid = $userID";
        } else {
            echo "Invalid UserRole.";
            exit();
        }

        if ($conn) {
            if (mysqli_query($conn, $sql)) {
                // Soft delete successful
                header("Location: adminindex.php"); // Redirect to the records list or wherever you want
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Database connection error!";
        }
    } else {
        echo "User ID or UserRole not provided or invalid.";
    }
}
