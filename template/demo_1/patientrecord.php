<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Patient Record</title>
    <!-- plugins:css -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
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
    </style>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="../assets/images/faces/face1.jpg" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">Admin</span>
              </div>
            </a>
          </li>
          <li class="nav-item pt-3">
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
            </form>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Navigation</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="patientrecord.php">
            <i class="fa fa-heartbeat" style="font-size:24px;"></i>
              <span class="menu-title" style="margin-left: 10px;">Patient Record</span>
            </a>
              </li>
          </li>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-logout d-none d-md-block">
                <button class="btn btn-sm btn-danger">Logout</button>
              </li>
          </ul>
           </div>
           </nav>
        <!-- partial -->
               <div class="main-panel">
          <div class="content-wrapper pb-0">
          <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 me-2" data-toggle="modal" data-target="#patientModal">Create new record</button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">
                <input type="text" class="form-control border-0" placeholder="Search"/>
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
                <div class="modal-body">
                    <fieldset class="custom-fieldset">
                        <legend><h1><b>Patient Information</b></h1></legend>
                        <!-- Your patient information form here -->
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
                          <label for="lastName">Data Of Birth:</label><br><Mbr>
                          <input type="date" id="dateOfBirth" name = "pDOB">
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
                    <h4 class="card-title mb-0">Patients</h4>
                  </div>
                  <br>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table custom-table text-dark">
                        <thead>
                          <tr>
                            <th>FirstName</th>
                            <th>MiddleName</th>
                            <th>LastName</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>Address</th>
                            <th>Date Of Birth</th>
                          </tr>
                        </thead>

                        <tbody> 
                        <?php
                $sql = "SELECT * FROM `tblemployee`";
                try {
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['idtblemployee']; ?></td>
                            <td><?= $row['firstname']; ?></td>
                            <td><?= $row['lastname']; ?></td>
                            <td><?= $row['middlename']; ?></td>
                            <td><?= $row['designation']; ?></td>
                            <td><?= $row['iddept']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row["idtblemployee"]; ?>" class="link-dark"><i class="fas fa-pen fs-5 me-3"></i></a>
                                <a href="delete.php?id=<?= $row["idtblemployee"]; ?>" class="link-dark"><i class="fas fa-trash fs-5"></i></a>
                            </td>
                        </tr>
                    <?php }
                    }
                   catch (Exception $e) {
                      echo "Error: " . $e->getMessage();
                  }
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
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>

</html>