<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets\css\a.css">
    <!-- Add your custom CSS and JavaScript below -->
    <style>
        /* Custom styles for the centered and smaller fieldset */
        .custom-fieldset {
            max-width: 500px; /* Set the maximum width */
            margin: 0 auto; /* Center the fieldset horizontally */
            font-size: 14px; /* Adjust font size as needed */
        }

    </style>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
</head>

<body>

    <!-- Fieldset for patient information form -->
    <fieldset class="custom-fieldset">
        <legend>
            <h1><b>Patient Information</b></h1>
        </legend>
        <div class="modal-body">
            <div class="nameage">
                <label for="firstName">First Name:</label>
                <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name">
            </div>

            <div class="nameage"><br>
                <label for="middleName">Middle Name:</label>
                <input class="form-control" type="text" id="middleName" name="mname" placeholder="Middle Name">
            </div>

            <div class="nameage"><br>
                <label for="lastName">Last Name:</label>
                <input class="form-control" type="text" id="lastName" name = "lname" placeholder="Last Name">
            </div>
            <div class="nameage"><br>
                <label for="age">Age:</label>
                <input class="form-control" type="text" id="age" name="age" placeholder="Ex. 15">
            </div>
            <div class="nameage">
                <label for="sex">Sex:</label><br>
                <input type="radio" name="sex" id="male" value="male" checked>
                <label for="male">Male</label>
                <input type="radio" name="sex" id="female" value="female">
                <label for="female">Female</label>
            </div>
            <div class="nameage">
                <label for="civilStatus">Civil Status:</label>
                <input class="form-control" type="text" id="civilStatus" name="civilStatus" placeholder="Ex. Single">
            </div>
            <div class="nameage"><br>
                <label for="address">Address:</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Iloilo City">
            </div>
            <div class="nameage"><br>
                <label for="dateOfBirth">Date Of Birth:</label><br>
                <input type="date" id="dateOfBirth" name="dateOfBirth">
            </div>
        </div>
    </fieldset>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
    </div>

    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="assets/vendors/font-awesome/css/font-awesome.min.css"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets\js\b.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
