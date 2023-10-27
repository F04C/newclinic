<link rel="stylesheet" href="assets\css\number.css">
<form action="savepatient.php" method="POST">
    <fieldset class="custom-fieldset">
        <legend>
            <h1 style="text-align: center;"><b>Patient Information</b></h1>
        </legend>
        <div class="modal-body">
            <div class="nameage">
                <label for="firstName">First Name:</label>
                <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name" >
            </div> 

            <div class="nameage"><br>
                <label for="middleName">Middle Name:</label>
                <input class="form-control" type="text" id="middleName" name="mname" placeholder="Middle Name">
            </div>

            <div class="nameage"><br>
                <label for="lastName">Last Name:</label>
                <input class="form-control" type="text" id="lastName" name="lname" placeholder="Last Name">
            </div>
            <div class="nameage"><br>
            <label for="age">Age:</label>
            <input class="form-control" type="number" id="age" name="age" placeholder="Ex. 15" min="0" max="9999999999" inputmode="numeric" pattern="[0-9]*">

            </div>
            <div class="nameage"><br>
                <label for="sex">Sex:</label>
                <span style="margin-right: 10px;"></span>

                <input type="radio" name="sex" id="male" value="male" checked>
                <label for="male">Male</label>

                <!-- Add a CSS style to create space -->
                <span style="margin-right: 10px;"></span>

                <input type="radio" name="sex" id="female" value="female">
                <label for="female">Female</label>
                <br>
                <br>
            </div>
            <div class="nameage">
                <label for="civilStatus">Civil Status:</label>
                <input class="form-control" type="text" id="civilStatus" name="civilStatus" placeholder="Ex. Single">
            </div>
            <div class="nameage"><br>
                <label for="civilStatus">Phone Number:</label>
                <input class="form-control" type="number" id="phonenum" name="phonenum" placeholder="Ex. 0912345678"  min="0" max="9999999999" inputmode = "numeric" pattern="[0-9]*">
            </div>
            <div class="nameage"><br>
                <label for="address">Address:</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Iloilo City">
            </div>
            <div class="nameage"><br>
                <label for="dateOfBirth">Date Of Birth:</label><br>
                <input type="date" id="dateOfBirth" name="dateOfBirth">
            </div>
        </div>
    </fieldset>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btnSavePatient">Save</button>

    </div>
    </fieldset>

</form>