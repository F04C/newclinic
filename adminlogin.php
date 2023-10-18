<?php
require "dbconn.php";
require 'auth.php';
if (isset($_POST["btnSignin"])) {
    if (isset($_POST["inputUsername"]) && isset($_POST["inputPassword"])) {
        $usernameInput = $_POST["inputUsername"];
        $userpassInput = $_POST["inputPassword"];

        // SQL syntax to retrieve user information, including the role
        /*$sql = "SELECT username, password, isAdmin, isSec, isDoc
        FROM tbluserauth
        JOIN tbluserroles";*/
        $sql = "SELECT u.username, u.password, r.isAdmin, r.isSec, r.isDoc
        FROM tbluserauth AS u
        JOIN tbluserroles AS r ON u.userid = r.roleid
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
                        $_SESSION["username"] = $record["username"];
                        $_SESSION["userid"] = $record["iduser"];

                        // Store user roles in the session
                        $_SESSION["isAdmin"] = $record["isAdmin"];
                        $_SESSION["isSec"] = $record["isSec"];
                        $_SESSION["isDoc"] = $record["isDoc"];

                        // Redirect to the appropriate page based on user role
                        if ($record["isAdmin"] == 1) {
                            header("Location: adduser.php");
                        } elseif ($record["isDoc"] == 1) {
                            header("Location: docappointment.php");
                        } elseif ($record["isSec"] == 1) {
                            header("Location: secindex.php");
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
                echo "Error" . $e;
            }
        } else {
            echo "Database connection error!";
        }
    } else {
        echo "Username and password are required.";
    }
} else {
    header("Location: login.php");
}
