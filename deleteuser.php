<?php
require "dbconn.php"; // Include your database connection file

if (isset($_POST["btnDeleteUser"])) {
    $userId = $_POST['userId'];
    $doctorId = $_POST['doctorId'];

    // Perform a soft delete by updating the 'isDeleted' column to 1 (or TRUE) for the user with the specified user ID.
    $sqlUpdateSec = "UPDATE tblsec SET isDeleted = 1 WHERE userid = :userId";
    $sqlUpdateDoctor = "UPDATE tbldoctor SET isDeleted = 1 WHERE doctorid = :doctorId";

    // Prepare the statements
    $stmtSec = mysqli_prepare($conn, $sqlUpdateSec);
    $stmtDoctor = mysqli_prepare($conn, $sqlUpdateDoctor);

    // Bind the parameters
    mysqli_stmt_bind_param($stmtSec, "i", $userId);
    mysqli_stmt_bind_param($stmtDoctor, "i", $doctorId);

    // Execute the statements
    $resultSec = mysqli_stmt_execute($stmtSec);
    $resultDoctor = mysqli_stmt_execute($stmtDoctor);

    if ($resultSec || $resultDoctor) {
        // Soft delete was successful for at least one user type.
        // You can redirect the user to a success page or display a success message.
        header("Location: adminindex.php?msg=User(s) deleted successfully");
    } else {
        // Handle errors if the query fails.
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statements
    mysqli_stmt_close($stmtSec);
    mysqli_stmt_close($stmtDoctor);
}

// Rest of your PHP code
