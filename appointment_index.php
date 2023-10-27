<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <form action="addappointment.php" method="POST">
        <fieldset class="custom-fieldset">
            <legend>
                <h1><b>Add Appointment</b></h1>
            </legend>
            <!-- First Name -->
            <div>
                <br>
                <label for="firstName">First Name:</label>
                <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name">
            </div>

            <!-- Middle Name -->
            <div>
                <br>
                <label for="middleName">Middle Name:</label>
                <input class="form-control" type="text" id="middleName" name="mname" placeholder="Middle Name">
            </div>

            <!-- Last Name -->
            <div>
                <br>
                <label for="lastName">Last Name:</label>
                <input class="form-control" type="text" id="lastName" name="lname" placeholder="Last Name">
            </div>

            <!-- Age -->
            <div>
                <br>
                <label for="age">Age:</label>
                <input class="form-control" type="text" id="age" name="age" placeholder="Age">
            </div>

            <!-- Sex -->
            <div class="nameage">
                <br>
                <label for="sex">Sex:</label>
                <span style="margin-right: 10px;"></span>
                <input type="radio" name="sex" id="male" value="male" checked>
                <label for="male">Male</label>
                <span style="margin-right: 10px;"></span>
                <input type="radio" name="sex" id="female" value="female">
                <label for="female">Female</label>
                <br>
            </div>

            <!-- Civil Status -->
            <div>
                <br>
                <label for="civilStatus">Civil Status:</label>
                <select class="form-control" id="civilStatus" name="civilStatus">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                </select>
            </div>

            <!-- Phone Number -->
            <div>
                <br>
                <label for="phoneNum">Phone Number:</label>
                <input class="form-control" type="text" id="phoneNum" name="phonenum" placeholder="Ex. 09123456789">
            </div>

            <!-- Address -->
            <div>
                <br>
                <label for="phoneNum">Address:</label>
                <input class="form-control" type="text" id="Address" name="address" placeholder="Address">
            </div>

            <!-- Date of Birth -->
            <div class="nameage">
                <br>
                <label for="dateOfBirth">Date Of Birth:</label><br>
                <input type="date" id="dateOfBirth" name="dateOfBirth">
            </div>

            <!-- Type -->
            <div>
                <br>
                <label for="type">Type:</label>
                <select class="form-control" id="type_appointment" name="type_appointment">
                    <option value="CheckUp">Check Up</option>
                    <option value="FollowUp">Follow Up</option>
                </select>
            </div>


            <div>
                <br>
                <!-- for doctor populate -->
                <label for="FreeDoctor">Doctor:</label>
                <select class="form-control" id="doctor" name="doctor">
                    <?php
                    require "dbconn.php"; // Include your database connection

                    // Query to fetch doctor data from tbldoctor
                    $sql = "SELECT doctorid, fname, lname FROM tbldoctor";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $doctorId = $row['doctorid'];
                            $doctorFullName = $row['fname'] . ' ' . $row['lname'];
                            echo "<option value='$doctorId'>$doctorFullName</option>";
                        }
                    }
                    ?>
                </select>
            </div>



            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnAddAppointment">Add</button>
            </div>
        </fieldset>
    </form>

</body>

</html>