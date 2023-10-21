<form action="saveuser.php" method="POST">
    <fieldset class="custom-fieldset">
        <legend>
            <h1><b>Add User</b></h1>
        </legend>

        <div>
            <br>
            <label for="firstName">First Name:</label>
            <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name">
        </div>

        <div>
            <br>
            <label for="middleName">Middle Name:</label>
            <input class="form-control" type="text" id="middleName" name="mname" placeholder="Middle Name">
        </div>

        <div>
            <br>
            <label for="lastName">Last Name:</label>
            <input class="form-control" type="text" id="lastName" name="lname" placeholder="Last Name">
        </div>

        <div>
            <br>
            <label for="phoneNum">Address:</label>
            <input class="form-control" type="text" id="Address" name="address" placeholder="Address">
        </div>

        <div>
            <br>
            <label for="phoneNum">Phone Number:</label>
            <input class="form-control" type="text" id="phoneNum" name="phonenum" placeholder="Ex. 09123456789">
        </div>

        <div>
            <br>
            <label for="userPos">User Position:</label>
            <br>
            <input type="radio" name="UserPos" id="sec" value="isSec" checked>
            <label for="sec">Secretary</label>
            <input type="radio" name="UserPos" id="doctor" value="isDoc">
            <label for="doctor">Doctor</label>
        </div>

        <div id="specializationDiv">
            <br>
            <label for="specialization">Specialization:</label>
            <input class="form-control" type="text" id="specialization" name="specialization" placeholder="Ex. General Medicine">
        </div>

        <div id="licenseDiv">
            <br>
            <label for="licno">License Number:</label>
            <input class="form-control" type="text" id="licno" name="licno" placeholder="Ex. 123456789">
        </div>

        <div>
            <br>
            <label for="username">User Name:</label>
            <input class="form-control" type="text" id="username" name="username" placeholder="User Name">
        </div>

        <div>
            <br>
            <label for="userPass">Password:</label>
            <div class="password-input-container">
                <input class="form-control" type="password" id="userPass" name="userPass" placeholder="Password">
                <button id="togglePassword" type="button" onclick="togglePasswordVisibility()">
                    <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div>
            <br>
            <label for="confirmUserPass">Confirm Password:</label>
            <div class="password-input-container">
                <input class="form-control" type="password" id="confirmUserPass" name="confirmUserPass" placeholder="Confirm Password">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="btnSaveUser">Save</button>
        </div>
    </fieldset>
</form>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script src="assets/js/a.js"></script>