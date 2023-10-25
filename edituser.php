<?php
// Include your database connection code here
require "dbconn.php";
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path-to-your-css/bootstrap.min.css">
    <script src="path-to-your-js/jquery.min.js"></script>
    <script src="path-to-your-js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets\css\a.css">
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/demo_1/style.css" />
        <link rel="stylesheet" href="assets\css\edituser.css" />
    </head>
    <br><br>
    <fieldset class="custom-fieldset">
        <?php
        require_once "editquery.php";
        ?>
        <br>
        <legend>
            <h1 style="text-align: center;"><b>Edit User</b></h1>
        </legend>
        <div>
            <br>
            <label for="firstName">First Name:</label>
            <input class="form-control" type="text" id="firstName" name="fname" value="<?php echo $firstName; ?>">
        </div>

        <div>
            <br>
            <label for="middleName">Middle Name:</label>
            <input class="form-control" type="text" id="middleName" name="mname" value="<?php echo $middleName; ?>">
        </div>

        <div>
            <br>
            <label for="lastName">Last Name:</label>
            <input class="form-control" type="text" id="lastName" name="lname" value="<?php echo $lastName; ?>">
        </div>
        <div>
            <br>
            <label for="phoneNum">Address:</label>
            <input class="form-control" type="text" id="Address" name="address" value="<?php echo $DAddress; ?>">
        </div>

        <div>
            <br>
            <label for="phoneNum">Phone Number:</label>
            <input class="form-control" type="text" id="phoneNum" name="phonenum" value="<?php echo $PhoneNo; ?>">
        </div>

        <div>
            <br>
            <label for="userPos">User Position:</label>
            <br>
            <input type="radio" name="UserPos" id="sec" value="isSec" <?php echo ($userRole === 'isSec') ? 'checked' : ''; ?>>
            <label for="sec">Secretary</label>
            <input type="radio" name="UserPos" id="doctor" value="isDoc" <?php echo ($userRole === 'isDoc') ? 'checked' : ''; ?>>
            <label for="doctor">Doctor</label>
        </div>


        <div id="specializationDiv">
            <br>
            <label for="specialization">Specialization:</label>
            <input class="form-control" type="text" id="specialization" name="specialization" placeholder="Ex. General Medicine" value="<?php echo $Specialization; ?>">
        </div>

        <div id="licenseDiv">
            <br>
            <label for="licno">License Number:</label>
            <input class="form-control" type="text" id="licno" name="licno" placeholder="Ex. 123456789" value="<?php echo $LicenseNo; ?>">
        </div>


        <div>
            <br>
            <label for="username">User Name:</label>
            <input class="form-control" type="text" id="username" name="username" placeholder="User Name" value="<?php echo $userName; ?>">
        </div>

        <div>
            <br>
            <div>
                <label for="userPass">Password:</label>
                <div class="password-input-container">
                    <input class="form-control" type="password" id="userPass" name="userPass" placeholder="Password" value="<?php echo $password; ?>">
                    <button id="togglePassword" type="button" onclick="togglePasswordVisibility('userPass', 'eyeIcon')">
                        <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div>
                <br>
                <label for="confirmUserPass">Confirm Password:</label>
                <div class="password-input-container">
                    <input class="form-control" type="password" id="confirmUserPass" name="confirmUserPass" placeholder="Confirm Password">
                    <button id="togglePassword" type="button" onclick="toggleConfPasswordVisibility('confirmUserPass', 'eyeIconConfirm')">
                        <i id="eyeIconConfirm" class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="update-button row">
        <form class="col-md-6" action="updateuser.php" method="POST">
            <button type="submit" class="btn btn-primary" name="btnUpdateUser">Update</button>
            <input type="hidden" name="id" value="<?php echo $ID; ?>">
            <input type="hidden" name="fname" value="<?php echo $firstName; ?>">
            <input type="hidden" name="mname" value="<?php echo $middleName; ?>">
            <input type="hidden" name="lname" value="<?php echo $lastName; ?>">
            <input type="hidden" name="address" value="<?php echo $DAddress; ?>">
            <input type="hidden" name="phonenum" value="<?php echo $PhoneNo; ?>">
            <input type="hidden" name="UserPos" value="<?php echo $userRole; ?>">
            <input type="hidden" name="specialization" value="<?php echo $Specialization; ?>">
            <input type="hidden" name="licno" value="<?php echo $LicenseNo; ?>">
            <input type="hidden" name="username" value="<?php echo $userName; ?>">
            <input type="hidden" name="userPass" value="<?php echo $password; ?>">
        </form>
        <div class="col-md-6">
            <form action="adminindex.php" method="POST">
                <button type="submit" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
    </div>



    <script src="assets/js/a.js"></script>