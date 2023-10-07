<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="assets/images/faces/face1.jpg" alt="profile" />
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
    <?php

    session_start();

    // Check if the user is an admin and not a secretary or doctor
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1 && (!isset($_SESSION['isSec']) || $_SESSION['isSec'] != 1) && (!isset($_SESSION['isDoc']) || $_SESSION['isDoc'] != 1)) {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="adduser.php">
          <i class="mdi mdi-compass-outline menu-icon"></i>
          <span class="menu-title">Add User</span>
        </a>
      </li>
    <?php
    }
    ?>

    <li class="nav-item">
      <a class="nav-link" href="patientrecord.php">
        <i class="fa fa-heartbeat" style="font-size:24px;"></i>
        <span class="menu-title" style="margin-left: 10px;">Patient Record</span>
      </a>
    </li>
    </li>
</nav>