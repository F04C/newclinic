<?php
require "dbconn.php";

// Initialize variables for user data
$ID = "";
$firstName = "";
$middleName = "";
$lastName = "";
$Specialization = "";
$LicenseNo = "";
$PhoneNo = "";
$DAddress = "";
$SAddress = "";
$isDeleted = "";
$userRole = ""; // Initialize userRole variable

if (isset($_POST["btnEditUser"])) {
    if (isset($_POST["ID"]) && isset($_POST["UserRole"])) {
        $userID = $_POST["ID"]; // Ensure to validate and sanitize user input
        $userRole = $_POST["UserRole"];
    } else {
        echo "Invalid input.";
        exit();
    }
}

$sql = "SELECT
    d.doctorid as ID,
    d.fname as FirstName,
    d.mname as MiddleName,
    d.lname as LastName,
    NULL as Specialization,
    NULL as LicenseNum,
    d.phonenum as PhoneNum,
    d.address as DAddress,
    'Doc' as UserRole,  -- Set the role to 'Doc' for doctors
    ua.username as Username  -- Retrieve username for doctors
FROM tbldoctor d
JOIN tbluserroles ur ON d.doctorid = ur.doctorIDFK
JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
WHERE d.isDeleted = 0 AND d.doctorid = $userID
UNION ALL
SELECT
    s.userid as ID,
    s.fname as FirstName,
    s.mname as MiddleName,
    s.lname as LastName,
    NULL,
    NULL,
    s.phonenum as PhoneNum,
    s.address as DAddress,
    'Sec' as UserRole,  -- Set the role to 'Sec' for secretaries
    ua.username as Username  -- Retrieve username for secretaries
FROM tblsec s
LEFT JOIN tbluserroles ur ON s.userid = ur.secIDFK
LEFT JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
WHERE s.isDeleted = 0 AND s.userid = $userID";

// Execute the SQL query here and fetch the user data
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['ID'];
    $firstName = $row['FirstName'];
    $middleName = $row['MiddleName'];
    $lastName = $row['LastName'];
    $Specialization = $row['Specialization'];
    $LicenseNo = $row['LicenseNum'];
    $PhoneNo = $row['PhoneNum'];
    $DAddress = $row['DAddress'];
    $userName = $row['Username'];
}
