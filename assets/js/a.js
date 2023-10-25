                        function togglePasswordVisibility(inputId, iconId) {
                            var passwordField = document.getElementById(inputId);
                            var eyeIcon = document.getElementById(iconId);

                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                                eyeIcon.classList.remove("fa-eye");
                                eyeIcon.classList.add("fa-eye-slash");
                            } else {
                                passwordField.type = "password";
                                eyeIcon.classList.remove("fa-eye-slash");
                                eyeIcon.classList.add("fa-eye");
                            }
                        }

                        function toggleConfPasswordVisibility() {
                            togglePasswordVisibility('confirmUserPass', 'eyeIconConfirm');
                        }

                        
                        doctorRadio = document.getElementById("doctor");
                        var secRadio = document.getElementById("sec");
                        var specializationDiv = document.getElementById("specializationDiv");
                        var licenseDiv = document.getElementById("licenseDiv");

                        // Initially hide the specialization and license inputs and labels
                        specializationDiv.style.display = "none";
                        licenseDiv.style.display = "none";

                        // Add an event listener to the radio buttons
                        doctorRadio.addEventListener("change", function () {
                            specializationDiv.style.display = "block";
                            licenseDiv.style.display = "block";
                        });

                        secRadio.addEventListener("change", function () {
                            specializationDiv.style.display = "none";
                            licenseDiv.style.display = "none";
                        });
                        function savePatientInformation() {
                            // Retrieve values from form fields
                            var firstName = $("#firstName").val();
                            var middleName = $("#middleName").val();
                            var lastName = $("#lastName").val();
                            var age = $("#age").val();

                            // Close the modal
                            $("#patientModal").modal("hide");
                        }