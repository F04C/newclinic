
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
                    <?php
                    include 'secfieldset.php'
                    ?>
                </div>
            </div>
        </div>
        <?php
        include 'sectables.php'
        ?>