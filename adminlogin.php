<?php
require "dbconn.php";

if (isset($_POST["btnSignin"])) {
    if (isset($_POST["inputUsername"]) && isset($_POST["inputPassword"])) {
        $usernameInput = $_POST["inputUsername"];
        $userpassInput = $_POST["inputPassword"];

        // Check if the user exists based on the username
        $sql = "SELECT u.username, u.password, r.isAdmin, r.isSec, r.isDoc, r.secIDFK
                FROM tbluserauth AS u
                JOIN tbluserroles AS r ON u.tbluserroles_roleid = r.roleid
                WHERE u.username = '" . $usernameInput . "' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row["password"];

            // Verify the hashed password
            if (password_verify($userpassInput, $hashedPassword)) {
                // Password is correct
                session_start();
                $_SESSION["username"] = $row["username"];
                $_SESSION["isAdmin"] = $row["isAdmin"];
                $_SESSION["isSec"] = $row["isSec"];
                $_SESSION["isDoc"] = $row["isDoc"];
                $_SESSION["secIDFK"] = $row["secIDFK"];

                if ($row["isAdmin"] == 1) {
                    header("Location: adminindex.php");
                } elseif ($row["isDoc"] == 1) {
                    header("Location: docappointment.php");
                } elseif ($row["isSec"] == 1) {
                    header("Location: secindex.php");
                } else {
                    // Handle other roles or scenarios as needed
                    echo "Unknown user role!";
                }
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "No user found!";
            header("Location: login.php?userNotFound=1");
        }
    } else {
        echo "Username and password are required.";
    }
} else {
    header("Location: login.php");
}
