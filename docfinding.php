<?php
require_once 'dbconn.php';

$patientFMname = "";
$patientLname = "";
if (isset($_POST['btnFinalize'])) {
    $patientID = $_POST['patientID'];

    $sql = "SELECT * FROM tblpatient
            WHERE patientid = '$patientID'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $patientFMname = $row["fname"] . $row["mname"];
        $patientLname = $row["lname"];
        echo "" . $patientID;
    }
}

?>
<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <link rel="stylesheet" href="assets/css/docfinding.css" />
</head>

<body>
    <fieldset class="custom-fieldset">
        <legend>
            <h1><b>Patient Information</b></h1>
        </legend>
        <div class="modal-body">
            <div>
                <label for="firstName">First Name:</label>
                <input class="form-control" type="text" id="firstName" name="fname" value="<?= $patientFMname ?>">
            </div>

            <div>
                <br>
                <label for="lastName">Last Name:</label>
                <input class="form-control" type="text" id="lastName" name="lname" value="<?= $patientLname ?>">
            </div>
            <div>
                <br>
                <label for="findings">Findings:</label>
                <textarea class="form-control" id="findings" name="findings" placeholder="Enter findings here" rows="7"></textarea>
            </div>

            <div>
                <br>
                <label for="recommendation">Recommendation:</label>
                <textarea class="form-control" id="recommendation" name="recommendation" placeholder="Enter recommendation here" rows="7"></textarea>
            </div>
        </div>
    </fieldset>

    <div class="modal-footer-edit">
        <div class="update-button" onclick="updatepatient.php">
            <button type="submit" class="btn btn-primary" name="btnDone">Done</button>
        </div>
        <button type="submit" class="btn btn-secondary" onclick="docappointment.php">Cancel</button>
    </div>
</body>

</html>-->