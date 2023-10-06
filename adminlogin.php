<?php

require 'dbconn.php';

if (isset($_POST['btnSignin'])) {
    $usernameInput = $_POST['inputUsername'];
    $userpassInput = $_POST['inputPassword'];

    //SQL SYNTAX for checking username and password
    $sql = "SELECT * FROM tbluser  where username = '" . $usernameInput . "' and password = '" . $userpassInput . "';";
    //connect to the database server
    if ($conn) {

        //execute the sql syntax
        try {
            $executeSQL = mysqli_query($conn, $sql);

            if ($executeSQL) {
                //check num of rows response
                $numRows = mysqli_num_rows($executeSQL);

                if ($numRows == 1) {

                    //fetch specific record
                    $record = mysqli_fetch_assoc($executeSQL);

                    //create sessions
                    session_start();
                    $_SESSION['username'] = $record['username'];
                    $_SESSION['userid'] = $record['iduser'];


                    header('Location: index.php');
                } else {
                    echo "No user found!";
                }
            } else {
                echo "may sala?";
            }
        } catch (Exception $e) {
            echo 'Error';
        }
    } else {
    }
} else {
    echo "HINDI MAG SHORTCUT BALIK KA SA LOGIN PAGE";
}
