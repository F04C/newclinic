<?php
require_once 'dbconn.php'
?>
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
                    WHERE 
                        p.isCancelled = 0
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
                                        <!-- Edit Patient Submit Form -->
                                        <form action="editpatient.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="patientID" value="<?php echo $row['PatientID']; ?>">

                                            <button class="btn btn-success btn-sm rounded-0" type="submit" name="btnPatientEdit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>



                                        <!-- Delete Patient Form -->
                                        <form action="deletepatient.php" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to cancel this patient?');">
                                            <input type="hidden" name="patientID" value="<?php echo $row["PatientID"]; ?>">
                                            <button class="btn btn-danger btn-sm rounded-0" type="submit" name="btnDeletePatient" data-toggle="tooltip" data-placement="top" title="Cancelled">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                </tr>
                        <?php }
                        } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
                <script>
                    function confirmDelete() {
                        if (confirm("Are you sure you want to remove it?")) {
                            // The user clicked "OK," proceed with the deletion
                            document.forms[0].submit(); // Submit the form for deletion
                        } else {
                            // The user clicked "Cancel," do nothing
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>