                    function togglePasswordVisibility() {
                            var passwordField = document.getElementById("pass");
                            var eyeIcon = document.getElementById("eyeIcon");

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
                        var doctorRadio = document.getElementById("doctor");
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