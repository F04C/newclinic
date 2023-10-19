<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="patientModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="patientModalLabel">Add Patient Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <!-- Your patient information form here -->
                                <div class="modal-body">
                                    <fieldset class="custom-fieldset">
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

                                            <!-- Rest of your form fields -->
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>