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
                            <button class="btn btn-primary mb-2 mb-md-0 me-2" data-toggle="modal" data-target="#patientModal">Create new record</button>
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
                                    <h5 class="modal-title" id="patientModalLabel">Add Patient Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <!-- Your patient information form here -->
                                <div class="modal-body">
                                    <fieldset class="custom-fieldset">
                                        <legend>
                                            <h1><b>Patient Information</b></h1>
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
                                            <label for="lastName">Age:</label>
                                            <input class="form-control" type="text" id="lastName" name="lname" placeholder="Ex. 15">
                                        </div>
                                        <div class="nameage">
                                            <label for="lastName">Sex:</label><br>
                                            <input type="radio" name="sex" id="male" value="male" checked>
                                            <label for="male">Male</label>
                                            <input type="radio" name="sex" id="female" value="female">
                                            <label for="female">Female</label>
                                            <div class="nameage">
                                                <label for="lastName">Civil Status:</label>
                                                <input class="form-control" type="text" id="lastName" name="lname" placeholder="Ex.Single">
                                            </div>
                                            <div class="nameage"><br>
                                                <label for="lastName">Address:</label>
                                                <input class="form-control" type="text" id="lastName" name="lname" placeholder="Iloilo City">
                                            </div>
                                            <div class="nameage"><br>
                                                <label for="lastName">Data Of Birth:</label><br>
                                                <Mbr>
                                                    <input type="date" id="dateOfBirth" name="pDOB">
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
                                                <th>Age</th>
                                                <th>License No.</th>
                                                <th>Phone No.</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <tbody>
                                                <?php //display the rows of users here
                                                $sql = "SELECT d.doctorid, 
                                                d.fname as FirstName,
                                                d.mname as MiddleName,
                                                d.lname as LastName,
                                                d.specialization as Specialization,
                                                d.licensenum as LicenseNum,
                                                d.phonenum as PhoneNum,
                                                d.address as DAddress
                                            FROM tbldoctor d
                                            WHERE d.doctorid IN (
                                                SELECT doctorIDFK
                                                FROM tbluserroles
                                                WHERE isDoc = 1
                                            )
                                            UNION
                                            
                                            SELECT s.userid, s.fname, s.mname, s.lname, NULL, NULL, s.phonenum, s.address
                                            FROM tblsec s
                                            WHERE s.userid IN (
                                                SELECT secIDFK
                                                FROM tbluserroles
                                                WHERE isSec = 1
                                            );";
                                                try {
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td><?php echo $row["FirstName"]; ?></td>
                                                            <td><?= $row["MiddleName"] ?></td>
                                                            <td><?= $row["LastName"] ?></td>
                                                            <td><?= $row["Specialization"] ?></td>
                                                            <td><?= $row["LicenseNum"] ?></td>
                                                            <td><?= $row["PhoneNum"] ?></td>
                                                            <td><?= $row["DAddress"] ?></td>
                                                            <td>
                                                                <!-- not displaying icon-->
                                                                <a href="edit.php?id=<?php echo $row["PatientID"]; ?>" class="link-dark"><i class="fas fa-pen fs-5 me-3"></i></a>
                                                                <a href="delete.php?id=<?= $row["PatientID"] ?>" class="link-dark"><i class="fas fa-trash fs-5"></i></a>
                                                            </td>
                                                            ?>
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
                    <script src="assets\js\b.js"></script>
                    <!-- End custom js for this page -->
</body>

</html>