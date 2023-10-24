<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form action="saveuser.php" method="POST">
    <fieldset class="custom-fieldset">
        <legend>
            <h1><b>Recommendation</b></h1>
        </legend>
        <div>
            <br>
            <label for="firstName">First Name:</label>
            <input class="form-control" type="text" id="firstName" name="fname" placeholder="First Name">
        </div>

        <div>
            <br>
            <label for="findings">Findings:</label>
            <textarea class="form-control" id="findings" name="findings" placeholder="Enter findings here" rows="4"></textarea>
        </div>

        <div>
            <br>
            <label for="recommendation">Recommendation:</label>
            <textarea class="form-control" id="recommendation" name="recommendation" placeholder="Enter recommendation here" rows="4"></textarea>
        </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="btnSaveUser">Save</button>
        </div>
    </fieldset>
</form>