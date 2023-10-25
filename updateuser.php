<?php
require_once "dbconn.php";

if (isset($_POST["btnUserSaveChanges"])) {
    // Retrieve user data from the form
    $userID = isset($_POST["id"]) ? $_POST["id"] : null;
    $userRole = isset($_POST["userRole"]) ? $_POST["userRole"] : "";
    $firstName = isset($_POST["fname"]) ? $_POST["fname"] : "";
    $middleName = isset($_POST["mname"]) ? $_POST["mname"] : "";
    $lastName = isset($_POST["lname"]) ? $_POST["lname"] : "";
    $DAddress = isset($_POST["address"]) ? $_POST["address"] : "";
    $PhoneNo = isset($_POST["phonenum"]) ? $_POST["phonenum"] : "";
    $userName = isset($_POST["username"]) ? $_POST["username"] : "";
    $newPassword = isset($_POST["userPass"]) ? $_POST["userPass"] : "";

    // Add debugging output
    /*echo "UserID: $userID<br>";
    echo "UserRole: $userRole<br>";
    echo "FirstName: $firstName<br>";
    echo "MiddleName: $middleName<br>";
    echo "LastName: $lastName<br>";
    echo "DAddress: $DAddress<br>";
    echo "PhoneNo: $PhoneNo<br>";
    echo "UserName: $userName<br>";
    echo "NewPassword: $newPassword<br>";
    */
    // Check if a new password was provided
    if (!empty($newPassword)) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $updatePasswordSQL = "UPDATE tbluserauth SET password = '$hashedPassword' WHERE userid = $userID";
        echo "Update Password SQL: $updatePasswordSQL<br>"; // Debugging output
        $result = mysqli_query($conn, $updatePasswordSQL);
        if (!$result) {
            echo "Error updating password: " . mysqli_error($conn);
        }
    }

    // Update other user information based on the userRole
    $updateUserSQL = "";
    if ($userRole === 'Doc') {
        // Update doctor data
        $Specialization = isset($_POST["specialization"]) ? $_POST["specialization"] : "";
        $LicenseNo = isset($_POST["licno"]) ? $_POST["licno"] : "";

        $updateUserSQL = "UPDATE tbldoctor SET fname = '$firstName', mname = '$middleName', lname = '$lastName', phonenum = '$PhoneNo', address = '$DAddress', specialization = '$Specialization', licensenum = '$LicenseNo' WHERE doctorid = $userID";
    } elseif ($userRole === 'Sec') {
        // Update secretary data
        $updateUserSQL = "UPDATE tblsec SET fname = '$firstName', mname = '$middleName', lname = '$lastName', phonenum = '$PhoneNo', address = '$DAddress' WHERE userid = $userID";
    }

    // Debugging output for updateUserSQL
    echo "Update User SQL: $updateUserSQL<br>";

    if (!empty($updateUserSQL)) {
        $result = mysqli_query($conn, $updateUserSQL);
        if ($result) {
            header("Location: adminindex.php?msg=User data updated successfully");
        } else {
            echo "Error updating user data: " . mysqli_error($conn);
        }
    }
}
