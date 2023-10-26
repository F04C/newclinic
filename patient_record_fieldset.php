<tbody>
    <?php
    $sql = "SELECT * FROM `tblpatient`"; // Update the table name to tblpatient
    try {
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row["fname"] ?></td>
                <td><?= $row["mname"] ?></td>
                <td><?= $row["lname"] ?></td>
                <td><?= $row["patientage"] ?></td>
                <td><?= $row["sex"] ?></td>
                <td><?= $row["civilstatus"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["dateofbirth"] ?></td>
                <td>
                    <form action="addappointment.php" method="POST" style="display: inline;">
                        <input type="hidden" name="patientid" value="<?= $row["patientid"]; ?>"> <!-- Pass the patient ID here -->
                        <button class="btn btn-primary btn-sm rounded-0" type="submit" name="btnAddAppointment" data-toggle="tooltip" data-placement="top" title="Add Appointment">
                            Add Appointment
                        </button>
                    </form>
                    <form action="editpatient.php" method="POST" style="display: inline;">
                        <input type="hidden" name="patientid" value="<?= $row["patientid"]; ?>"> <!-- Pass the user ID here -->
                        <button class="btn btn-success btn-sm rounded-0" type="submit" name="btnEditPatient" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>


                    <form action="deletepatient.php" method="POST" style="display: inline;">
                        <input type="hidden" name="ID" value="<?= $row["patientid"]; ?>"> <!-- Pass the correct user ID here -->
                        <button class="btn btn-danger btn-sm rounded-0" type="submit" name="btnDeleteUser" data-toggle="tooltip" data-placement="top" title="Delete">
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