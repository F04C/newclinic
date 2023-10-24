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
    <!-- Your head content here -->
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