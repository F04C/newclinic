<?php
require_once "dbconn.php";

if (isset($_POST["btnEditUser"])) {
    $userID = $_POST["ID"];
    $userRole = $_POST["UserRole"];

    // Query the database to get user data
    $sql = "";
    if ($userRole === 'Doc') {
        $sql = "SELECT d.fname as FirstName, d.mname as MiddleName, d.lname as LastName, 
                d.phonenum as PhoneNum, d.address as DAddress, d.specialization as Specialization,
                d.licensenum as LicenseNo, ua.username as Username
                FROM tbldoctor d
                JOIN tbluserroles ur ON d.doctorid = ur.doctorIDFK
                JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
                WHERE d.isDeleted = 0 AND d.doctorid = $userID";
    } elseif ($userRole === 'Sec') {
        $sql = "SELECT s.fname as FirstName, s.mname as MiddleName, s.lname as LastName,
                s.phonenum as PhoneNum, s.address as DAddress, ua.username as Username
                FROM tblsec s
                LEFT JOIN tbluserroles ur ON s.userid = ur.secIDFK
                LEFT JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
                WHERE s.isDeleted = 0 AND s.userid = $userID";
    }

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row["FirstName"];
        $middleName = $row["MiddleName"];
        $lastName = $row["LastName"];
        $DAddress = $row["DAddress"];
        $PhoneNo = $row["PhoneNum"];
        $userName = $row["Username"];

        if ($userRole === 'Doc') {
            $Specialization = $row["Specialization"];
            $LicenseNo = $row["LicenseNo"];
        }
    }
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path-to-your-css/bootstrap.min.css">
    <script src="path-to-your-js/jquery.min.js"></script>
    <script src="path-to-your-js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets\css\a.css">
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <link rel="stylesheet" href="assets\css\edituser.css" />
</head>
<br><br>

<body>
    <div class="container">
        <br><br>
        <fieldset class="custom-fieldset">
            <br>
            <legend>
                <h1 style="text-align: center;"><b>Edit User</b></h1>
            </legend>
            <form action="updateuser.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_POST["ID"]; ?>">
                <input type="hidden" name="userRole" value="<?php echo  $_POST["UserRole"]; ?>">
                <div>
                    <br>
                    <label for="firstName">First Name:</label>
                    <input class="form-control" type="text" id="firstName" name="fname" value="<?php echo $firstName; ?>">
                </div>

                <div>
                    <br>
                    <label for="middleName">Middle Name:</label>
                    <input class="form-control" type="text" id="middleName" name="mname" value="<?php echo $middleName; ?>">
                </div>

                <div>
                    <br>
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" id="lastName" name="lname" value="<?php echo $lastName; ?>">
                </div>
                <div>
                    <br>
                    <label for="Address">Address:</label>
                    <input class="form-control" type="text" id="Address" name="address" value="<?php echo $DAddress; ?>">
                </div>

                <div>
                    <br>
                    <label for="phoneNum">Phone Number:</label>
                    <input class="form-control" type="text" id="phoneNum" name="phonenum" value="<?php echo $PhoneNo; ?>">
                </div>

                <div>
                    <br>
                    <label for="userPos">User Position:</label>
                    <br>
                    <input type="radio" name="userRole" id="sec" value="isSec" <?php echo ($userRole === 'isSec') ? 'checked' : ''; ?>>
                    <label for="sec">Secretary</label>
                    <input type="radio" name="userRole" id="doctor" value="isDoc" <?php echo ($userRole === 'isDoc') ? 'checked' : ''; ?>>
                    <label for="doctor">Doctor</label>
                </div>


                <?php if ($userRole === 'isDoc') : ?>
                    <div id="specializationDiv">
                        <br>
                        <label for="specialization">Specialization:</label>
                        <input class="form-control" type="text" id="specialization" name="specialization" placeholder="Ex. General Medicine" value="<?php echo $Specialization; ?>">
                    </div>

                    <div id="licenseDiv">
                        <br>
                        <label for="licno">License Number:</label>
                        <input class="form-control" type="text" id="licno" name="licno" placeholder="Ex. 123456789" value="<?php echo $LicenseNo; ?>">
                    </div>
                <?php endif; ?>

                <div>
                    <br>
                    <label for="username">User Name:</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="User Name" value="<?php echo $userName; ?>">
                </div>

                <div>
                    <br>
                    <div>
                        <label for="userPass">Password:</label>
                        <div class="password-input-container">
                            <input class="form-control" type="password" id="userPass" name="userPass" placeholder="Password">
                            <button id="togglePassword" type="button" onclick="togglePasswordVisibility('userPass', 'eyeIcon')">
                                <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <br>
                        <label for="confirmUserPass">Confirm Password:</label>
                        <div class="password-input-container">
                            <input class="form-control" type="password" id="confirmUserPass" name="confirmUserPass" placeholder="Confirm Password">
                            <button id="togglePassword" type="button" onclick="toggleConfPasswordVisibility('confirmUserPass', 'eyeIconConfirm')">
                                <i id="eyeIconConfirm" class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" name="btnUserSaveChanges">Save Changes</button>
                </div>
            </form>
        </fieldset>
</body>
<script src="assets/js/a.js"></script>