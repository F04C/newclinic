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
                                a.date AS PreviousAppointmentDate,
                                p.findings AS Findings,
                                p.recommendation as Recommendations
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
                <td><?= $row["PreviousAppointmentDate"] ?></td>
                <td>
                    <form action="docfinding.php" method="POST" style="display: inline;">
                        <input type="hidden" name="patientID" value="<?= $patientID ?>">

                        <button class="btn btn-success btn-sm rounded-0" type="submit" name="btnFinalize" data-toggle="tooltip" data-placement="top" title="Done">
                            <i class="fa fa-check"></i>
                        </button>
                    </form>

                    <button class="btn btn-danger btn-sm rounded-0" type="submit" name="btnDeleteDocPatient" data-toggle="tooltip" data-placement="top" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>

            </tr>

    <?php }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</tbody>