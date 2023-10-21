<?php
include "db_conn.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

if (isset($_POST["submit"])) {
    $pw1 = $_POST['pword1'];
    $pw2 = $_POST['pword2'];



    if ($pw1  == $pw2) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `tbluser` VALUES (NULL, '$uname', '$pw1', '$email', '$gender', '$first_name', '$last_name');";


        try {
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?msg=New record created successfully");
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        } catch (Exception $e) {
            echo 'Error';
        }
    } else {
        header("Location: add-new.php?msg=Password did not matched!");
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PHP Procedural CRUD Application
    </nav>


    <div class="container">
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
        ?>
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">Complete the form below to add a new user</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Albert">
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Einstein">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Username:</label>
                        <input type="text" class="form-control" name="uname" placeholder="Username">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="pword1" placeholder="Password" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" name="pword2" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>

                <div class="form-group mb-3">
                    <label>Gender:</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>