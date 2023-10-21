<?php
require "dbconn.php";

if (isset($_POST["btnSignin"])) {
    if (isset($_POST["inputUsername"]) && isset($_POST["inputPassword"])) {
        $usernameInput = $_POST["inputUsername"];
        $userpassInput = $_POST["inputPassword"];

        $sql = "SELECT u.username, r.isAdmin, r.isSec, r.isDoc
                FROM tbluserauth AS u
                JOIN tbluserroles AS r ON u.tbluserroles_roleid = r.roleid
                WHERE u.username = '$usernameInput' AND u.password = '$userpassInput'";

        if ($conn) {
            try {
                $executeSQL = mysqli_query($conn, $sql);

                if ($executeSQL) {
                    $numRows = mysqli_num_rows($executeSQL);

                    if ($numRows == 1) {
                        $record = mysqli_fetch_assoc($executeSQL);

                        session_start();
                        $_SESSION["username"] = $record["username"];
                        $_SESSION["isAdmin"] = $record["isAdmin"];
                        $_SESSION["isDoc"] = $record["isDoc"];
                        $_SESSION["isSec"] = $record["isSec"];

                        if ($_SESSION["isAdmin"] == 1) {
                            header("Location: adminindex.php");
                            exit(); // Ensure the script terminates after redirection
                        } elseif ($_SESSION["isDoc"] == 1) {
                            header("Location: docappointment.php");
                            exit();
                        } elseif ($_SESSION["isSec"] == 1) {
                            header("Location: secindex.php");
                            exit();
                        }
                    } else {
                        // No user found
                        header("Location: login.php?userNotFound=1");
                        exit();
                    }
                } else {
                    echo "Query execution error!";
                }
            } catch (Exception $e) {
                echo "Error: " . $e;
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
