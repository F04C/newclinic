<?php
require 'dbconn.php';

?>
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
    <link rel="stylesheet" href="path-to-your-css/bootstrap.min.css">
    <script src="path-to-your-js/jquery.min.js"></script>
    <script src="path-to-your-js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add your custom CSS and JavaScript below -->
    <style>
        /* Add your custom CSS styles here */
        .custom-fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

    .password-input-container {
        position: relative;
    }

    .form-control-password {
        padding-right: 40px; /* Adjust this value as needed to fit the icon */
    }

    #togglePassword {
        position: absolute;
        right: 5px; /* Adjust the button's position as needed */
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
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
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.php -->
        <?php include "_sidebar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.php -->
            <?php include "_settings-panel.php"; ?>
            <!-- partial:partials/_navbar.php -->
            <?php include "_navbar.php"; ?>

            <!--main panel -->
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    <div class="page-header flex-wrap">
                        <div class="header-left">
                            <!--create modal for adding users on the db -->
                            <button class="btn btn-primary mb-2 mb-md-0 me-2" data-toggle="modal" data-target="#patientModal">Create New User</button>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control border-0" placeholder="Search" />
                            </div>
                        </div>
                    </div>




                    <!-- Modal for adding patient information -->
                    <div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="patientModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="patientModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <!-- Your patient information form here -->
                                <div class="modal-body">
                                    <fieldset class="custom-fieldset">
                                        <legend>
                                            <h1><b>User Add</b></h1>
                                        </legend>
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
                                            <input class="form-control" type="text" id="lastName" name="lname" placeholder="Last Name">
                                        </div>
                                        <div class="nameage"><br>
                                            <label for="lastName">Phone Number:</label>
                                            <input class="form-control" type="text" id="lastName" name="lname" placeholder="Ex. 09123456789">
                                        </div>
                                        <div class="nameage">
                                                <div class="nameage"><br>
                                                    <label for="lastName">User position:</label><br>
                                                    <input type="radio" name="UserPos" id="sec" value="sec" checked>
                                                    <label for="female">Secretary</label>
                                                    <input type="radio" name="UserPos" id="doctor" value="doctor">
                                                    <label for="male">Doctor</label>
                                                </div>
                                                <div class="nameage" id="specializationDiv">
                                                    <label for="lastName">Specialization:</label>
                                                    <input class="form-control" type="text" id="specialization" name="lname" placeholder="Ex. Single">
                                                </div>
                                                <div class="nameage" id="licenseDiv"><br>
                                                    <label for="lastName">License Number:</label>
                                                    <input class="form-control" type="text" id="license" name="lname" placeholder="Iloilo City">
                                                </div>
                                            <div class="nameage"><br>
                                            <label for="lastName">User Name:</label>
                                                    <input class="form-control" type="text" id="UName" name="lname" placeholder="User Name">
                                        </div>
                                        <div class="nameage">
                                                     <label for="pass">Password:</label>
                                                        <div class="password-input-container">
                                                        <input class="form-control" type="password" id="pass" name="password" placeholder="Password">
                                                 <button id="togglePassword" type="button" onclick="togglePasswordVisibility()">
                                                         <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                                                          </button>
                                                            </div>
                                                    </div>



                                            <!-- Rest of your form fields -->
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JavaScript for handling form submission -->
                    <script>
                        // Function to handle form submission
                        function savePatientInformation() {
                            // Retrieve values from form fields
                            var firstName = $("#firstName").val();
                            var middleName = $("#middleName").val();
                            var lastName = $("#lastName").val();
                            var age = $("#age").val();

                            // You can handle the form data here (e.g., send it to the server)
                            // For demonstration purposes, we'll simply log the values to the console
                            console.log("First Name: " + firstName);
                            console.log("Middle Name: " + middleName);
                            console.log("Last Name: " + lastName);
                            console.log("Age: " + age);

                            // Close the modal
                            $("#patientModal").modal("hide");
                        }
                    </script>

                    <div class="col-xl-12 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h4 class="card-title mb-0">Users</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table custom-table text-dark">
                                        <thead>
                                            <tr>
                                                <!-- display column names for users -->
                                                <th>FirstName</th>
                                                <th>MiddleName</th>
                                                <th>LastName</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>Doctor Appointed</th>
                                                <th>Previous Appointment</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tr>


                                            <?php //display the rows of users here
                                            $sql = "";
                                            ?>
                                            <tbody>
                                            </tbody>
                                            <tfooter>
                                            </tfooter>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- plugins:js -->
                    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
                    <!-- endinject -->
                    <!-- Plugin js for this page -->
                    <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
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
                    <script>
                        function togglePasswordVisibility() {
                            var passwordField = document.getElementById("pass");
                            var eyeIcon = document.getElementById("eyeIcon");

                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                                eyeIcon.classList.remove("fa-eye");
                                eyeIcon.classList.add("fa-eye-slash");
                            } else {
                                passwordField.type = "password";
                                eyeIcon.classList.remove("fa-eye-slash");
                                eyeIcon.classList.add("fa-eye");
                            }
                        }
                        var doctorRadio = document.getElementById("doctor");
                        var secRadio = document.getElementById("sec");
                        var specializationDiv = document.getElementById("specializationDiv");
                        var licenseDiv = document.getElementById("licenseDiv");

                        // Initially hide the specialization and license inputs and labels
                        specializationDiv.style.display = "none";
                        licenseDiv.style.display = "none";

                        // Add an event listener to the radio buttons
                        doctorRadio.addEventListener("change", function () {
                            specializationDiv.style.display = "block";
                            licenseDiv.style.display = "block";
                        });

                        secRadio.addEventListener("change", function () {
                            specializationDiv.style.display = "none";
                            licenseDiv.style.display = "none";
                        });
</script>
                    <!-- End custom js for this page -->
</body>

</html>