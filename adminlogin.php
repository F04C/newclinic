<?php

require 'dbconn.php';

if (isset($_POST['btnSignin'])) {
    $usernameInput = $_POST['inputUsername'];
    $userpassInput = $_POST['inputPassword'];

    // SQL syntax to retrieve user information, including the role
    $sql = "SELECT u.*, r.isAdmin, r.isSec, r.isDoc
            FROM tbluser AS u
            JOIN tbluserroles AS r ON u.userid = r.userid
            WHERE u.username = '" . $usernameInput . "' AND u.password = '" . $userpassInput . "';";

    // Connect to the database server
    if ($conn) {
        // Execute the SQL query
        try {
            $executeSQL = mysqli_query($conn, $sql);

            if ($executeSQL) {
                // Check the number of rows returned
                $numRows = mysqli_num_rows($executeSQL);

                if ($numRows == 1) {
                    // Fetch user information, including roles
                    $record = mysqli_fetch_assoc($executeSQL);

                    // Create sessions
                    session_start();
                    $_SESSION['username'] = $record['username'];
                    $_SESSION['userid'] = $record['iduser'];

                    // Store user roles in the session
                    $_SESSION['isAdmin'] = $record['isAdmin'];
                    $_SESSION['isSec'] = $record['isSec'];
                    $_SESSION['isDoc'] = $record['isDoc'];

                    // Redirect to the appropriate page based on user role
                    if ($record['isAdmin'] == 1) {
                        header('Location: admin_dashboard.php');
                    } elseif ($record['isDoc'] == 1) {
                        header('Location: doctor_dashboard.php');
                    } elseif ($record['isSec'] == 1) {
                        header('Location: secretary_dashboard.php');
                    } else {
                        // Handle other roles or scenarios as needed
                        echo "Unknown user role!";
                    }
                } else {
                    echo "No user found!";
                }
            } else {
                echo "Query execution error!";
            }
        } catch (Exception $e) {
            echo 'Error';
        }
    } else {
        echo "Database connection error!";
    }
} else {
    header('Location: login.php');
}
