<?php

require "dbconn.php";

if (isset($_POST["btnSignin"])) {
    if (isset($_POST["inputUsername"]) && isset($_POST["inputPassword"])) {
        $usernameInput = $_POST["inputUsername"];
        $userpassInput = $_POST["inputPassword"];

        $sql = "SELECT u.username, u.password, r.isAdmin, r.isSec, r.isDoc
        FROM tbluserauth AS u
        JOIN tbluserroles AS r ON u.tbluserroles_roleid = r.roleid
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
                        echo "hello";
                        // Fetch user information, including roles
                        $record = mysqli_fetch_assoc($executeSQL);

                        // Create sessions
                        session_start();
                        $_SESSION["username"] = $record["username"];
                        // Store user roles in the session
                        $_SESSION["isAdmin"] = $record["isAdmin"];
                        $_SESSION["isSec"] = $record["isSec"];
                        $_SESSION["isDoc"] = $record["isDoc"];

                        // Redirect to the appropriate page based on user role
                        if ($record["isAdmin"] == 1) {
                            header("Location:adminindex.php");
                        } elseif ($record["isDoc"] == 1) {
                            header("Location:docappointment.php");
                        } elseif ($record["isSec"] == 1) {
                            header("Location:secindex.php");
                        } else {
                            // Handle other roles or scenarios as needed
                            echo "Unknown user role!";
                        }
                    } else {
                        echo "No user found!";
                        header("Location: login.php?userNotFound=1");

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
