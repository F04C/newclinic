<?php
require "dbconn.php"; // Include your database connection file

if (isset($_POST["btnDeleteUser"])) {
    $userId = $_POST['userid'];

