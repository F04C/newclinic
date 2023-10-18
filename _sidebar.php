<?php
require 'auth.php';
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="assets/images/faces/face1.jpg" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center">
            <?php
            // Check if the user is an admin, doctor, or secretary and display the appropriate role
            session_start();
            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
              echo "Admin";
            } elseif (isset($_SESSION['isDoc']) && $_SESSION['isDoc'] == 1) {
              echo "Doctor";
            } elseif (isset($_SESSION['isSec']) && $_SESSION['isSec'] == 1) {
              echo "Secretary";
            }
            ?>
          </span>
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

    <!-- Add menu items based on user roles -->
    <?php
    // Check user roles and display appropriate menu items
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    ?>
      <!-- Admin menu items -->
      <li class="nav-item">
        <a class="nav-link" href="adduser.php">
          <i class="	fa fa-user-circle-o" style="font-size:24px;"></i>
          <span class="menu-title " style="margin-left: 10px;">Add User</span>
        </a>
      </li>
    <?php
    }

    if (isset($_SESSION['isSec']) && $_SESSION['isSec'] == 1) {
    ?>
      <!-- Secretary menu items -->
      <li class="nav-item">
        <a class="nav-link" href="secindex.php">
          <i class="fa fa-stethoscope" style="font-size:24px;"></i>
          <span class="menu-title" style="margin-left: 10px;">Appointments Today</span>
        </a>
      </li>

      <li class="nav-item">
        <a class a class="nav-link" href="patientrecord.php">
          <i class="fa fa-heartbeat" style="font-size:24px;"></i>
          <span class="menu-title" style="margin-left: 10px;">Patient Records</span>
        </a>
      </li>
    <?php
    }

    if (isset($_SESSION['isDoc']) && $_SESSION['isDoc'] == 1) {
    ?>
      <!-- Doctor menu items -->
      <li class="nav-item">
        <a class="nav-link" href="today.php">
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
  </ul>
</nav>