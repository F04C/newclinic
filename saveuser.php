<?php
require_once "dbconn.php";
session_start();

// Check if the session is an admin
if (!isset($_SESSION['isAdmin'])) {
    header('Location: login.php');
}

if (isset($_POST["btnSaveUser"])) {
    $pw1 = $_POST['userPass'];
    $pw2 = $_POST['confirmUserPass'];

    if ($pw1 == $pw2) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $phonenum = $_POST['phonenum'];
        $userpos = $_POST['UserPos'];
        $username = $_POST['username'];
        $password = $_POST['userPass'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($userpos == 'isSec') {
            // Insert data into tblsec
            $sql = "INSERT INTO tblsec (fname, mname, lname, phonenum, address) 
                    VALUES ('$fname', '$mname', '$lname', '$phonenum', '$address')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Get the userid of the last inserted row in tblsec
                $secIDFK = mysqli_insert_id($conn);

                // Insert a row into tbluserroles
                $sql2 = "INSERT INTO tbluserroles (isSec, secIDFK) VALUES (1, $secIDFK)";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    $tbluserroleroleid = mysqli_insert_id($conn);
                    // Insert user authentication data into tbluserauth with hashed password
                    $sql1 = "INSERT INTO tbluserauth (username, password, tbluserroles_roleid) 
                            VALUES ('$username', '$hashedPassword', $tbluserroleroleid)";
                    $result1 = mysqli_query($conn, $sql1);

                    if ($result1) {
                        header("Location: adminindex.php?msg=New record created successfully");
                    } else {
                        echo "Failed to insert user authentication data: " . mysqli_error($conn);
                    }
                } else {
                    echo "Failed to insert user role data: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to insert secretary data: " . mysqli_error($conn);
            }
        }
    }
}
