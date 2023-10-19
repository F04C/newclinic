<?php
session_start(); // Start the session at the beginning

// Check if the user is not logged in, and redirect to the login page if not authenticated.
if (!isset($_SESSION['username'])) {
  header("Location: login.php"); // Redirect to your login page
  exit();
}
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="<?php echo getProfileLink($_SESSION); ?>" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="assets/images/faces/face1.jpg" alt="profile" />
          <!-- Change to offline or busy as needed -->
        </div>
        <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center">
            <?php echo $_SESSION['username']; ?> <!-- Display the username from the session -->
          </span>
        </div>
      </a>
    </li>

    <li class="nav-item pt-3">
      <form class="d-flex align-items-center" action="#">
        <div class="input-group">
          <div class="input-group-prepend">
          </div>
      </form>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Navigation</span>
    </li>
                  <?php
              // Function to determine the profile link based on the user's role
              function getProfileLink($session) {
                if (isset($session['isAdmin']) && $session['isAdmin'] == 1) {
                  return "adminindex.php"; // Admin profile link
                } elseif (isset($session['isSec']) && $session['isSec'] == 1) {
                  return "secindex.php"; // Secretary profile link
                } elseif (isset($session['isDoc']) && $session['isDoc'] == 1) {
                  return "docappointment.php"; // Doctor profile link
                }
              }
              ?>
    <!-- for secretary -->
    <?php
    // Check user role and display corresponding menu items
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1 && (!isset($_SESSION['isSec']) || $_SESSION['isSec'] != 1) && (!isset($_SESSION['isDoc']) || $_SESSION['isDoc'] != 1)) {
    ?>

      <li class="nav-item">



      <li class="nav-item">
        <a class="nav-link" href="adminindex.php">
          <i class="	fa fa-user-circle-o" style="font-size:24px;"></i>
          <span class="menu-title " style="margin-left: 10px;">Add User</span>
        </a>
      </li>

    <?php
    }
    ?>

    <!-- for secretary-->
    <?php
    if (isset($_SESSION['isSec']) && $_SESSION['isSec'] == 1 && (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) && (!isset($_SESSION['isDoc']) || $_SESSION['isDoc'] != 1)) {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="secindex.php">
          <i class="fa fa-stethoscope" style="font-size:24px;"></i>
          <span class="menu-title" style="margin-left: 10px;">Appointments Today</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="patientrecord.php">
          <i class="fa fa-heartbeat" style="font-size:24px;"></i>
          <span class="menu-title" style="margin-left: 10px;">Patient Records</span>
        </a>
      </li>
    <?php
    }
    ?>
    <!-- for doctor-->
    <?php
    if (isset($_SESSION['isDoc']) && $_SESSION['isDoc'] == 1 && (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) && (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1)) {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="docappointment.php">
          <i class="fa fa-stethoscope" style="font-size:24px;"></i>
          <span class="menu-title" style="margin-left: 10px;">Your Appointments Today</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="patientrecord.php">
          <i class="fa fa-heartbeat" style="font-size:24px;"></i>
          <span class="menu-title" style="margin-left: 10px;">Patient Records</span>
        </a>
      </li>
    <?php
    }
    ?>

    </li>
</nav>