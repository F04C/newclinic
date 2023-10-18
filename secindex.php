<?php
include 'dbconn.php';
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
  <!-- endinject -->
  <!-- Plugin css for this page -->
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
              <button class="btn btn-primary mb-2 mb-md-0 me-2" data-toggle="modal" data-target="#patientModal">Create new record</button>
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
              <div class="d-flex align-items-center">
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </div>
          </div>
          <?php
          include 'adduser.php';
          ?>
          <?php
          include 'secappointment.php'
          ?>

          <!-- plugins:js -->
          <script src="assets/vendors/js/vendor.bundle.base.js"></script>
          <!-- endinject -->
          <!-- Plugin js for this page -->
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
          <!-- End custom js for this page -->
</body>

</html>