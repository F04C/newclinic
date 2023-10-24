<div class="col-xl-12 stretch-card grid-margin">
    <div class="card">
        <div class="card-body pb-0">
            <h4 class="card-title mb-0">Users</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table text-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>User Role</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT
        d.doctorid as ID,
        d.fname as FirstName,
        d.mname as MiddleName,
        d.lname as LastName,
        d.specialization as Specialization,
        d.licensenum as LicenseNum,
        d.phonenum as PhoneNum,
        d.address as DAddress,
        'Doc' as UserRole,  -- Set the role to 'Doc' for doctors
        ua.username as Username  -- Retrieve username for doctors
    FROM tbldoctor d
    JOIN tbluserroles ur ON d.doctorid = ur.doctorIDFK
    JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
    WHERE d.isDeleted = 0
    UNION ALL
    SELECT
        s.userid as ID,
        s.fname as FirstName,
        s.mname as MiddleName,
        s.lname as LastName,
        NULL,
        NULL,
        s.phonenum as PhoneNum,
        s.address as DAddress,
        'Sec' as UserRole,  -- Set the role to 'Sec' for secretaries
        ua.username as Username  -- Retrieve username for secretaries
    FROM tblsec s
    LEFT JOIN tbluserroles ur ON s.userid = ur.secIDFK
    LEFT JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
    WHERE s.isDeleted = 0;
    ";
                        try {
                            $result = mysqli_query(
                                $conn,
                                $sql
                            );
                            while (
                                $row = mysqli_fetch_assoc(
                                    $result
                                )
                            ) { ?>
                                <tr>
                                    <td><?= $row["ID"] ?></td>
                                    <td><?= $row["FirstName"] ?></td>
                                    <td><?= $row["MiddleName"] ?></td>
                                    <td><?= $row["LastName"] ?></td>
                                    <td><?= $row["PhoneNum"] ?></td>
                                    <td><?= $row["DAddress"] ?></td>
                                    <td><?= $row["UserRole"] ?></td>
                                    <td><?= $row["Username"] ?></td>
                                    <td>
                                    <form action="edituser.php" method="GET" style="display: inline;">
                                            <input type="hidden" name="ID" value="<?= $row["ID"]; ?>"> <!-- Pass the user ID here -->
                                            <input type="hidden" name="UserRole" value="<?= $row["UserRole"]; ?>"> <!-- Pass the user role here -->
                                            <button class="btn btn-success btn-sm rounded-0 open-user-modal" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>

                                        <form action="deleteuser.php" method="POST" style="display: inline;">
    <input type="hidden" name="ID" value="<?= $row["ID"]; ?>"> <!-- Pass the correct user ID here -->
    <input type="hidden" name="UserRole" value="<?= $row["UserRole"]; ?>">
    <button class="btn btn-danger btn-sm rounded-0" type="button" name="btnDeleteUser" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirmDelete()">
        <i class="fa fa-trash"></i>
    </button>
</form>
                                        <script>
function confirmDelete() {
    if (confirm("Are you sure you want to delete this?")) {
        // If the user confirms, submit the form for deletion
        document.querySelector('form[action="deleteuser.php"]').submit();
    }
}
</script>
                                    </td>
                                </tr>
                        <?php }
                        } catch (Exception $e) {
                            echo "Error: " .
                                $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>