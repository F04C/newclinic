// Add this code to your 1.js file
$(document).ready(function() {
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});

// Function to check if the user exists
function checkUserExists() {
    // Perform user existence check here (e.g., AJAX request to the server)
    // If the user doesn't exist, show the alert and display the h5 element
    if (!userExists) {
        showUserNotFoundAlert();
        showContactAdminMessage(); // Function to display the h5 element
        return false; // Prevent form submission
    }
}

// Function to display an alert when no user is found
function showUserNotFoundAlert() {
    alert("User not found. Please check your username and password.");
}

// Function to display the h5 element
function showContactAdminMessage() {
    $("#contactAdminMsg").removeClass("d-none"); // Remove the 'd-none' class to make it visible
}

// Variable to check if the user exists
var userExists = false; // Set to false if the user is not found

// Check if the user exists
if (!userExists) {
    showContactAdminMessage(); // Display the message when the user is not found
}
