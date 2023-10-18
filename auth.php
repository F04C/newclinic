<?php
session_start();

if (!isset($_SESSION['isAdmin']) && !isset($_SESSION['isDoc']) && !isset($_SESSION['isSec'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit();
}
