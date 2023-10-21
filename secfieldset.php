<form action="savepatient.php" method="POST">
    <fieldset>
        <legend>
            <h1><b>Patient Information</b></h1>
        </legend>
        <div class="nameage">
            <label for="firstName">First Name:</label>
            <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name">
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
            <label for="lastName">Age:</label>
            <input class="form-control" type="text" id="lastName" name="lname" placeholder="Ex. 15">
        </div>
        <div class="nameage">
            <label for="lastName">Sex:</label><br>
            <input type="radio" name="sex" id="male" value="male" checked>
            <label for="male">Male</label>
            <input type="radio" name="sex" id="female" value="female">
            <label for="female">Female</label>
            <div class="nameage">
                <label for="lastName">Civil Status:</label>
                <input class="form-control" type="text" id="lastName" name="lname" placeholder="Ex.Single">
            </div>
            <div class="nameage"><br>
                <label for="lastName">Address:</label>
                <input class="form-control" type="text" id="lastName" name="lname" placeholder="Iloilo City">
            </div>
            <div class="nameage"><br>
                <label for="lastName">Data Of Birth:</label><br>
                <br>
                <input type="date" id="dateOfBirth" name="pDOB">
            </div>
    </fieldset>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btnSavePatient">Save</button>
    </div>
    </fieldset>

</form>