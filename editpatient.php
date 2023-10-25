<?php
require_once "dbconn.php";

if (isset($_POST["btnPatientEdit"])) {
    $patientID = $_POST["patientID"];

    // Query the database to get patient data
    $sql = "SELECT * FROM tblpatient WHERE patientid = $patientID";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $patientFirstName = $row["fname"];
        $patientMiddleName = $row["mname"];
        $patientLastName = $row["lname"];
        $patientAge = $row["patientage"];
        $patientSex = $row["sex"];
        $patientCivilStatus = $row["civilstatus"];
        $patientAddress = $row["address"];
        $patientDateOfBirth = $row["dateofbirth"];
    }
    // Debug statements
    /*
    echo "Patient ID: " . $patientID . "<br>";
    echo "First Name: " . $patientFirstName . "<br>";
    echo "Middle Name: " . $patientMiddleName . "<br>";
    echo "Last Name: " . $patientLastName . "<br>";
    echo "Age: " . $patientAge . "<br>";
    echo "Sex: " . $patientSex . "<br>";
    echo "Civil Status: " . $patientCivilStatus . "<br>";
    echo "Address: " . $patientAddress . "<br>";
    echo "Date of Birth: " . $patientDateOfBirth . "<br>";
    */
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <link rel="stylesheet" href="assets\css\edituser.css" />
</head>
<br><br>

<body>
    <div class="container">
        <br><br>
        <form action="updatepatient.php" method="POST">
            <fieldset class="custom-fieldset">
                <br>
                <legend>
                    <h1 style="text-align: center;"><b>Edit Patient</b></h1>
                </legend>
                <input type="hidden" name="patientID" value="<?= $patientID ?>">

                <div class="modal-body">
                    <div class>
                        <label for="firstName">First Name:</label>
                        <input class="form-control" type="text" id="firstName" name="fname" value="<?= $patientFirstName ?>">
                    </div>

                    <div class><br>
                        <label for="middleName">Middle Name:</label>
                        <input class="form-control" type="text" id="middleName" name="mname" value="<?= $patientMiddleName ?>">
                    </div>

                    <div class><br>
                        <label for="lastName">Last Name:</label>
                        <input class="form-control" type="text" id="lastName" name="lname" value="<?= $patientLastName ?>">
                    </div>
                    <div class><br>
                        <label for="age">Age:</label>
                        <input class="form-control" type="text" id="age" name="age" value="<?= $patientAge ?>">
                    </div>
                    <div class>
                        <label for="sex">Sex:</label><br>
                        <input type="radio" name="sex" id="male" value="male" <?= ($patientSex === 'male') ? 'checked' : '' ?>>
                        <label for="male">Male</label>
                        <input type="radio" name="sex" id="female" value="female" <?= ($patientSex === 'female') ? 'checked' : '' ?>>
                        <label for="female">Female</label>
                    </div>
                    <div class>
                        <label for="civilStatus">Civil Status:</label>
                        <input class="form-control" type="text" id="civilStatus" name="civilStatus" value="<?= $patientCivilStatus ?>">
                    </div>
                    <div class><br>
                        <label for="address">Address:</label>
                        <input class="form-control" type="text" id="address" name="address" value="<?= $patientAddress ?>">
                    </div>
                    <div class><br>
                        <label for="dateOfBirth">Date Of Birth:</label><br>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?= $patientDateOfBirth ?>">
                    </div>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="btnPatientUpdate">Save Changes</button>
                    </div>
                </div>
            </fieldset>
    </div>

</body>

</html>