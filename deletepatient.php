<?php
require_once 'dbconn.php';

if (isset($_POST['btnDeletePatient'])) {
    $patientID = $_POST['PatientID'];
}
