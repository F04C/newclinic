<div class="main-panel">
        <div class="content-wrapper pb-0">
          <div class="page-header flex-wrap">
            <div class="header-left">
              <button class="btn btn-primary mb-2 mb-md-0 me-2" data-toggle="modal" data-target="#patientModal">Create new record</button>
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
              <div class="d-flex align-items-center">
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </div>
          </div>
            <!-- Modal for adding patient information -->
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
<div class="col-xl-12 stretch-card grid-margin">
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title mb-0">Patients</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table text-dark">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Doctor Appointed</th>
                            <th>Previous Appointment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT 
                                p.patientid AS PatientID,
                                p.fname AS PatientFirstName,
                                p.mname AS PatientMiddleName,
                                p.lname AS PatientLastName,
                                TIMESTAMPDIFF(YEAR, p.dateofbirth, CURDATE()) AS Age,
                                p.sex AS Sex,
                                d.fname AS DoctorAppointed,
                                a.date AS PreviousAppointmentDate
                            FROM 
                                tblappointment a
                            JOIN 
                                tblpatient p ON a.tblpatient_patientid = p.patientid
                            JOIN 
                                tbldoctor d ON a.tbldoctor_doctorid = d.doctorid
                            ORDER BY 
                                a.date DESC;";
                        try {
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["PatientFirstName"]; ?></td>
                                    <td><?= $row["PatientMiddleName"] ?></td>
                                    <td><?= $row["PatientLastName"] ?></td>
                                    <td><?= $row["Age"] ?></td>
                                    <td><?= $row["Sex"] ?></td>
                                    <td><?= $row["DoctorAppointed"] ?></td>
                                    <td><?= $row["PreviousAppointmentDate"] ?></td>
                                    <td>
                                        <!-- Use a single form to wrap both buttons and style them side by side -->

                                        <button class="btn btn-success btn-sm rounded-0" type="button" onclick="console.log('Edit button clicked'); openPatientInfoModal(<?=$row['PatientID']?>)">
                                                <i class="fa fa-edit"></i>
                                            </button>


                                            <button class="btn btn-danger btn-sm rounded-0" type="submit" name="btnDelete" value="delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                    </td>
                                </tr>
                        <?php }
                        } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
                <script>
                    function openPatientInfoModal(patientID) {
    // Find the row in the table that corresponds to the patient
    const row = document.querySelector(`tr[data-patient-id="${patientID}"]`);
    if (row) {
        // Get the patient information from the row
        const firstName = row.querySelector('.patient-firstname').textContent;
        const middleName = row.querySelector('.patient-middlename').textContent;
        const lastName = row.querySelector('.patient-lastname').textContent;
        const age = row.querySelector('.patient-age').textContent;
        const sex = row.querySelector('.patient-sex').textContent;
        const doctorAppointed = row.querySelector('.patient-doctor').textContent;
        const previousAppointment = row.querySelector('.patient-previous-appointment').textContent;

        // Populate the modal with the patient information
        document.querySelector('#firstName').value = firstName;
        document.querySelector('#middleName').value = middleName;
        document.querySelector('#lastName').value = lastName;
        document.querySelector('#age').value = age;
        document.querySelector(`#sex_${sex}`).checked = true;
        document.querySelector('#civilStatus').value = '';  // Set civil status if available
        document.querySelector('#address').value = '';  // Set address if available
        document.querySelector('#dateOfBirth').value = '';  // Set date of birth if available

        // Open the modal
        $('#patientModal').modal('show');
    }

}
</script>
            </div>
        </div>
    </div>
</div>