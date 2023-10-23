<?php
require "dbconn.php";

if (isset($_GET["ID"])) {
    $userID = $_GET["ID"];
    $userRole = $_GET["UserRole"]; // Get the user role from the URL

    $sql = "SELECT
        d.doctorid as ID,
        d.fname as FirstName,
        d.mname as MiddleName,
        d.lname as LastName,
        d.phonenum as PhoneNum,
        d.address as DAddress,
        d.specialization as Specialization,
        d.licensenum as LicenseNo,
        'Doc' as UserRole,
        ua.username as Username
    FROM tbldoctor d
    JOIN tbluserroles ur ON d.doctorid = ur.doctorIDFK
    JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
    WHERE d.doctorid = $userID AND d.isDeleted = 0 AND 'Doc' = '$userRole'  -- Ensure the user role matches
    UNION
    SELECT
        s.userid as ID,
        s.fname as FirstName,
        s.mname as MiddleName,
        s.lname as LastName,
        s.phonenum as PhoneNum,
        s.address as DAddress,
        NULL as Specialization,
        NULL as LicenseNo,
        'Sec' as UserRole,
        ua.username as Username
    FROM tblsec s
    LEFT JOIN tbluserroles ur ON s.userid = ur.secIDFK
    LEFT JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
    WHERE s.userid = $userID AND s.isDeleted = 0 AND 'Sec' = '$userRole'  -- Ensure the user role matches
    ";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row["ID"];
        $userFirstName = $row["FirstName"];
        $userMiddleName = $row["MiddleName"];
        $userLastName = $row["LastName"];
        $userAddress = $row["DAddress"];
        $userPhoneNum = $row["PhoneNum"];
        $userRole = $row["UserRole"];
        $username = $row["Username"];

        // Specialization and LicenseNo might not be set, so use the null coalescing operator (??) to set default values
        $specialization = $row["Specialization"] ?? '';
        $licno = $row["LicenseNo"] ?? '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
</head>

<body>
    <form action="updateuser.php" method="POST">
        <fieldset class="custom-fieldset">
            <legend>
                <h1><b>Edit User</b></h1>
            </legend>
            <input type="hidden" name="userID" value="<?= $userID ?>">
            <input type="hidden" name="userRole" value="<?= $userRole ?>">
            <div>
                <br>
                <label for="firstName">First Name:</label>
                <input class="form-control" type="text" id="firstName" name="fname" value="<?= $userFirstName ?>">
            </div>

            <div>
                <br>
                <label for="middleName">Middle Name:</label>
                <input class="form-control" type="text" id="middleName" name="mname" value="<?= $userMiddleName ?>">
            </div>

            <div>
                <br>
                <label for "lastName">Last Name:</label>
                <input class="form-control" type="text" id="lastName" name="lname" value="<?= $userLastName ?>">
            </div>

            <div>
                <br>
                <label for="address">Address:</label>
                <input class="form-control" type="text" id="address" name="address" value="<?= $userAddress ?>">
            </div>

            <div>
                <br>
                <label for="phonenum">Phone Number:</label>
                <input class="form-control" type="text" id="phonenum" name="phonenum" value="<?= $userPhoneNum ?>">
            </div>

            <?php if ($userRole === 'Doc') { ?>
                <div id="specializationDiv">
                    <br>
                    <label for="specialization">Specialization:</label>
                    <input class="form-control" type="text" id="specialization" name="specialization" value="<?= $specialization ?>">
                </div>

                <div id="licenseDiv">
                    <br>
                    <label for="licno">License Number:</label>
                    <input class="form-control" type="text" id="licno" name="licno" value="<?= $licno ?>">
                </div>
            <?php } ?>

            <div>
                <br>
                <label for="phonenum">Username</label>
                <input class="form-control" type="text" id="phonenum" name="phonenum" value="<?= $username ?>">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnUpdateUser">Update</button>
            </div>
        </fieldset>
    </form>
</body>

</html>