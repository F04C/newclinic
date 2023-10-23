

<fieldset class="custom-fieldset">
        <legend>
            <h1><b>Patient Information</b></h1>
        </legend>
        <div class="modal-body">
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
                <label for="age">Age:</label>
                <input class="form-control" type="text" id="age" name="age" placeholder="Ex. 15">
            </div>
            <div class="nameage">
                <label for="sex">Sex:</label><br>
                <input type="radio" name="sex" id="male" value="male" checked>
                <label for="male">Male</label>
                <input type="radio" name="sex" id="female" value="female">
                <label for="female">Female</label>
            </div>
            <div class="nameage">
                <label for="civilStatus">Civil Status:</label>
                <input class="form-control" type="text" id="civilStatus" name="civilStatus" placeholder="Ex. Single">
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