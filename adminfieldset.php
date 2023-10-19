<fieldset class="custom-fieldset">
    <legend>
        <h1><b>Add User</b></h1>
    </legend>
    <!-- Change the class for each field or create a new class -->
    <!-- Doesn't have a 'nameage' class in css/demo_1/style.css -->
    <div class="nameage">
        <label for="firstName">First Name:</label>
        <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name">
    </div>

    <div class="nameage"><br>
        <label for = "middleName">Middle Name:</label>
        <input class="form-control" type="text" id="middleName" name="mname" placeholder="Middle Name">
    </div>

    <div class="nameage"><br>
        <label for="lastName">Last Name:</label>
        <input class="form-control" type="text" id="lastName" name="lname" placeholder="Last Name">
    </div>
    <div class="nameage"><br>
        <label for="lastName">Phone Number:</label>
        <input class="form-control" type="text" id="lastName" name="phonenum" placeholder="Ex. 09123456789">
    </div>
    <div class="nameage">
        <div class="nameage"><br>
            <label for="lastName">User position:</label><br>
            <input type="radio" name="UserPos" id="sec" name="role-sec" value="sec" checked>
            <label for="female">Secretary</label>
            <input type="radio" name="UserPos" id="doctor" name="role-doc" value="doctor">
            <label for="male">Doctor</label>
        </div>
        <div class="nameage" id="specializationDiv">
            <label for="lastName">Specialization:</label>
            <input class="form-control" type="text" id="specialization" name="specialization" placeholder="Ex. General Medicine">
        </div>
        <div class="nameage" id="licenseDiv"><br>
            <label for="lastName">License Number:</label>
            <input class="form-control" type="text" id="license" name="licno" placeholder="Ex. 123456789">
        </div>
        <div class="nameage"><br>
            <label for="lastName">User Name:</label>
            <input class="form-control" type="text" id="UName" name="username" placeholder="User Name">
        </div>
        <div class="nameage"><br>
            <label for="pass">Password:</label>
            <div class="password-input-container">
                <input class="form-control" type="password" id="pass" name="password" placeholder="Password">
                <button id="togglePassword" type="button" onclick="togglePasswordVisibility()">
                    <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Add confirm password -->
        </div>

        <!-- Rest of your form fields -->
    </fieldset>
    <script src="assets\js\a.js"></script>