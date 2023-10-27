<?php
require "dbconn.php";

if (isset($_POST["patientID"])) {
    $patientID = $_POST["patientID"];

    // Construct the SQL query to fetch patient data based on patientID
    $sql = "SELECT * FROM tblpatient WHERE patientid = $patientID";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Populate form fields with retrieved data
        $patientFirstName = $row["fname"];
        $patientMiddleName = $row["mname"];
        $patientLastName = $row["lname"];
        $patientAge = $row["patientage"];
        $patientSex = $row["sex"];
        $patientCivilStatus = $row["civilstatus"];
        $patientAddress = $row["address"];
        $patientDateOfBirth = $row["dateofbirth"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <form action="updatepatient.php" method="POST">
        <fieldset class="custom-fieldset">
            <legend>
                <h1><b>Patient Information</b></h1>
            </legend>
            <input type="hidden" name="patientID" value="<?= $patientID ?>">

            <div class="modal-body">
                <div class="nameage">
                    <label for="firstName">First Name:</label>
                    <input class="form-control" type="text" id="firstName" name="fname" value="<?= $patientFirstName ?>">
                </div>

                <div class="nameage"><br>
                    <label for="middleName">Middle Name:</label>
                    <input class="form-control" type="text" id="middleName" name="mname" value="<?= $patientMiddleName ?>">
                </div>

                <div class="nameage"><br>
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" id="lastName" name="lname" value="<?= $patientLastName ?>">
                </div>
                <div class="nameage"><br>
                    <label for="age">Age:</label>
                    <input class="form-control" type="text" id="age" name="age" value="<?= $patientAge ?>">
                </div>
                <div class="nameage">
                    <label for="sex">Sex:</label><br>
                    <input type="radio" name="sex" id="male" value="male" <?= ($patientSex === 'male') ? 'checked' : '' ?>>
                    <label for="male">Male</label>
                    <input type="radio" name="sex" id="female" value="female" <?= ($patientSex === 'female') ? 'checked' : '' ?>>
                    <label for="female">Female</label>
                </div>
                <div class="nameage">
                    <label for="civilStatus">Civil Status:</label>
                    <input class="form-control" type="text" id="civilStatus" name="civilStatus" value="<?= $patientCivilStatus ?>">
                </div>
                <div class="nameage"><br>
                    <label for="address">Address:</label>
                    <input class="form-control" type="text" id="address" name="address" value="<?= $patientAddress ?>">
                </div>
                <div class="nameage"><br>
                    <label for="dateOfBirth">Date Of Birth:</label><br>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?= $patientDateOfBirth ?>">
                </div>
            </div>
        </fieldset>
        <div class="modal-footer-edit">
            <div class="update-button">
                <button type="submit" class="btn btn-primary" name="btnUpdatePatient">Update</button>
            </div>
        </div>
    </form>
</body>

</html>