<tbody>
    <?php
    $sql = "SELECT * FROM `tblpatient`"; // Update the table name to tblpatient
    try {
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row["patientid"] ?></td>
                <td><?= $row["fname"] ?></td>
                <td><?= $row["mname"] ?></td>
                <td><?= $row["lname"] ?></td>
                <td><?= $row["patientage"] ?></td>
                <td><?= $row["sex"] ?></td>
                <td><?= $row["civilstatus"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["dateofbirth"] ?></td>
                <td>
                    <form action="add_appointment_existing.php" method="POST" style="display: inline;">
                        <input type="hidden" name="patientid" value="<?= $row["patientid"]; ?>">
                        <input type="hidden" name="fname" value="<?= $row["fname"] ?>">
                        <input type="hidden" name="mname" value="<?= $row["mname"] ?>">
                        <input type="hidden" name="lname" value="<?= $row["lname"] ?>">
                        <input type="hidden" name="patientage" value="<?= $row["patientage"] ?>">
                        <input type="hidden" name="sex" value="<?= $row["sex"] ?>">
                        <input type="hidden" name="civilstatus" value="<?= $row["civilstatus"] ?>">
                        <input type="hidden" name="address" value="<?= $row["address"] ?>">
                        <input type="hidden" name="dateofbirth" value="<?= $row["dateofbirth"] ?>">

                        <button class="btn btn-primary btn-sm rounded-0" type="submit" name="btnAddExistingAppointment" data-toggle="modal" data-target="#addAppointmentModal" data-placement="top" title="Add Appointment">
                            <i class="fa fa-plus"></i>
                        </button>
                    </form>
                    <form action="editpatient.php" method="POST" style="display: inline;">
                        <input type="hidden" name="patientID" value="<?= $row["patientid"]; ?>">
                        <input type="hidden" name="fname" value="<?= $row["fname"] ?>">
                        <input type="hidden" name="mname" value="<?= $row["mname"] ?>">
                        <input type="hidden" name="lname" value="<?= $row["lname"] ?>">
                        <input type="hidden" name="patientage" value="<?= $row["patientage"] ?>">
                        <input type="hidden" name="sex" value="<?= $row["sex"] ?>">
                        <input type="hidden" name="civilstatus" value="<?= $row["civilstatus"] ?>">
                        <input type="hidden" name="address" value="<?= $row["address"] ?>">
                        <input type="hidden" name="dateofbirth" value="<?= $row["dateofbirth"] ?>">
                        <button class="btn btn-success btn-sm rounded-0" type="submit" name="btnEditPatient" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>




                    <form action="deletepatient.php" method="POST" style="display: inline;">
                        <input type="hidden" name="patientID" value="<?= $row["patientid"]; ?>"> <!-- Pass the correct user ID here -->
                        <button class="btn btn-danger btn-sm rounded-0" type="submit" name="btnDeletePatient" data-toggle="tooltip" data-placement="top" title="Delete">

                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
    <?php }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</tbody>