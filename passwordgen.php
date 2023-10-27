<?php
require 'dbconn.php';

$plainPassword = "doc2"; // Replace with the desired password
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

$username = "doc2"; // Replace with the username

// Set the default value for tbluserroles_roleid to 1
$defaultRoleId = 1;

// Create an SQL query to insert the hashed password with the default role ID
$sql = "INSERT INTO tbluserauth (username, password, tbluserroles_roleid) VALUES ('$username', '$hashedPassword', $defaultRoleId)";

// Execute the SQL query (ensure you have a database connection)
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Hashed password inserted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
