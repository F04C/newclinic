            function savePatientInformation() {
              // Retrieve values from form fields
              var firstName = $("#firstName").val();
              var middleName = $("#middleName").val();
              var lastName = $("#lastName").val();
              var age = $("#age").val();

              // You can handle the form data here (e.g., send it to the server)
              // For demonstration purposes, we'll simply log the values to the console
              console.log("First Name: " + firstName);
              console.log("Middle Name: " + middleName);
              console.log("Last Name: " + lastName);
              console.log("Age: " + age);

              // Close the modal
              $("#patientModal").modal("hide");
            }

            function confirmDelete() {
              if (confirm("Are you sure you want to delete this?")) {
                  // If the user confirms, submit the form
                  document.querySelector('form[action="deleteuser.php"]').submit();
              }
          }