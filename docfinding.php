<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
       <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <link rel="stylesheet" href="assets\css\docfinding,css" />

</head>
<br><br><br><br>
<body>
    <form action="updatepatient.php" method="POST">
        <fieldset class="custom-fieldset">
            <legend>
                <h1><b>Patient Information</b></h1>
            </legend>
            <input type="hidden" name="patientID" value="<?= $patientID ?>">

            <div class="modal-body">
                <div class>
                    <label for="firstName">First Name:</label>
                    <input class="form-control" type="text" id="firstName" name="fname" value="<?= $patientFirstName ?>">
                </div>
                
                <div class><br>
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" id="lastName" name="lname" value="<?= $patientLastName ?>">
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

        </fieldset>
        
        <div class="modal-footer-edit">
    <div class="update-button">
        <form action="" method="POST">
            <button type="submit" class="btn btn-primary" name="btnUpdatePatient">Done</button>
        </form>
    </div>

<form action="docappointment.php" method="POST">
    <button type="submit" class="btn btn-secondary">Cancel</button>
</form>
</div>
    
</body>

</html>