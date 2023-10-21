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
                            <!-- display column names for users -->
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
                                            d.doctorid as DoctorID,
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
                                        WHERE ur.isDoc = 1
                                        UNION
                                        SELECT
                                            s.userid,
                                            s.fname,
                                            s.mname,
                                            s.lname,
                                            NULL,
                                            NULL,
                                            s.phonenum,
                                            s.address,
                                            'Sec' as UserRole,  -- Set the role to 'Sec' for secretaries
                                            ua.username as Username  -- Retrieve username for secretaries
                                        FROM tblsec s
                                        LEFT JOIN tbluserroles ur ON s.userid = ur.secIDFK
                                        LEFT JOIN tbluserauth ua ON ur.roleid = ua.tbluserroles_roleid
                                        WHERE ur.isSec = 1;";
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
                                    <td><?php echo $row["FirstName"]; ?></td>
                                    <td><?= $row["MiddleName"] ?></td>
                                    <td><?= $row["LastName"] ?></td>
                                    <td><?= $row["PhoneNum"] ?></td>
                                    <td><?= $row["DAddress"] ?></td>
                                    <td><?= $row["UserRole"] ?></td>
                                    <td><?= $row["Username"] ?></td>
                                    <td>
                                        <!-- Edit User Form -->
                                        <form action="edituser.php" method="POST" style="display: inline;">
                                            <button class="btn btn-success btn-sm rounded-0" type="submit" name="btnEditUser" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>

                                        <!-- Delete User Form -->
                                        <form action="deleteuser.php" method="POST" style="display: inline;">
                                            <button class="btn btn-danger btn-sm rounded-0" type="submit" name="btnDeleteUser" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php }
                        } catch (Exception $e) {
                            echo "Error: " .
                                $e->getMessage();
                        }
                        ?>
                    </tbody>
                    <tfooter>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</div>