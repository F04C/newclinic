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
    <link rel="stylesheet" href="assets\css\a.css">

    <!-- Add your custom CSS and JavaScript below -->

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
                                            <h1><b>Add User</b></h1>
                                        </legend>
                                        <!--change the class for each or create a new class -->
                                        <!--doesn't have a nameage class on css/demo_1/style.css-->
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
                                            <input class="form-control" type="text" id="lastName" name="phonenum" placeholder="Ex. 09123456789">
                                        </div>
                                        <div class="nameage">
                                            <div class="nameage"><br>
                                                <label for="lastName">User position:</label><br>
                                                <input type="radio" name="UserPos" id="sec" name="role-sec" value="sec" checked>
                                                <label for="female">Secretary</label>
                                                <input type="radio" name="UserPos" id="doctor" name="role-doc" value="doctor">
                                                <label for="male">Doctor</label>
                                            </div>
                                            <div class="nameage" id="specializationDiv">
                                                <label for="lastName">Specialization:</label>
                                                <input class="form-control" type="text" id="specialization" name="specialization" placeholder="Ex. General Medicine">
                                            </div>
                                            <div class="nameage" id="licenseDiv"><br>
                                                <label for="lastName">License Number:</label>
                                                <input class="form-control" type="text" id="license" name="licno" placeholder="Ex. 123456789">
                                            </div>
                                            <div class="nameage"><br>
                                                <label for="lastName">User Name:</label>
                                                <input class="form-control" type="text" id="UName" name="username" placeholder="User Name">
                                            </div>
                                            <div class="nameage"><br>
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
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>User Role</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php //add query for the username of each user
                                            $sql = "SELECT d.doctorid as DoctorID, 
                                            d.fname as FirstName,
                                            d.mname as MiddleName,
                                            d.lname as LastName,
                                            d.specialization as Specialization,
                                            d.licensenum as LicenseNum,
                                            d.phonenum as PhoneNum,
                                            d.address as DAddress,
                                            CASE
                                                WHEN u.isAdmin = 1 THEN 'Admin'
                                                WHEN u.isDoc = 1 THEN 'Doc'
                                                WHEN u.isSec = 1 THEN 'Sec'
                                                ELSE 'Unknown'
                                            END as UserRole
                                        FROM tbldoctor d
                                        LEFT JOIN tbluserroles u ON d.doctorid = u.doctorIDFK
                                        WHERE u.isDoc = 1
                                        UNION
                                        SELECT s.userid, s.fname, s.mname, s.lname, NULL, NULL, s.phonenum, s.address,
                                            CASE
                                                WHEN u.isAdmin = 1 THEN 'Admin'
                                                WHEN u.isDoc = 1 THEN 'Doc'
                                                WHEN u.isSec = 1 THEN 'Sec'
                                                ELSE 'Unknown'
                                            END as UserRole
                                        FROM tblsec s
                                        LEFT JOIN tbluserroles u ON s.userid = u.secIDFK
                                        WHERE u.isSec = 1;
                                        ";
                                            try {
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <tr>
                                                        <td><?php echo $row["FirstName"]; ?></td>
                                                        <td><?= $row["MiddleName"] ?></td>
                                                        <td><?= $row["LastName"] ?></td>
                                                        <td><?= $row["PhoneNum"] ?></td>
                                                        <td><?= $row["DAddress"] ?></td>
                                                        <td><?= $row["UserRole"] ?></td>
                                                        <td><?= $row["DAddress"] ?></td>
                                                        <td>
                                                            <!-- displaying icons correctly -->
                                                            <a href="edit.php?id=<?php echo $row["DoctorID"]; ?>" class="link-dark"><i class="fas fa-pen fs-5 me-3"></i></a>
                                                            <a href="delete.php?id=<?= $row["DoctorID"] ?>" class="link-dark"><i class="fas fa-trash fs-5"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } catch (Exception $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
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
                    <script src="assets\js\a.js"></script>

                    <!-- End custom js for this page -->
</body>

</html>