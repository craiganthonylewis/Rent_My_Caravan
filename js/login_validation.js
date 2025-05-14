/* Coded by Craig Lewis ST20317192*/
$(document).ready(function() {

    //Live Feedback Validation function
    $('form').on('keyup', function() {

        $('.validation').text("");

        //Variables
        let email = $('input[name="email"]').val().trim();
        let password = $('input[name="password"]').val();
        let email_Pattern = /^[^ ]+@[^ ]+\.(?:[a-z]{3,}|[a-z]{2,}\.[a-z]{2,})$/;
        let password_Pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        let hasError = false;


        //Validates Email
        $('#email_Validation').removeClass("validation_True validation_False");

        if (!email) {
            $('#email_Validation').text("");
        } else if (!email.match(email_Pattern)) {
            $('#email_Validation')
                .text("Please enter a valid email address.")
                .addClass("validation_False");
            hasError = true;
        } else {
            $('#email_Validation')
                .text("Email is valid.")
                .addClass("validation_True");
        }

        //Validates Password
        $('#password_Validation').removeClass("validation_True validation_False");

        if (!password) {
            $('#password_Validation').text("");
        } else if (!password.match(password_Pattern)) {
            $('#password_Validation')
                .text("Please enter a valid password.")
                .addClass("validation_False");
            hasError = true;
        } else {
            $('#password_Validation')
                .text("Password is valid.")
                .addClass("validation_True")
                .removeClass("validation_False");
        }

    }); //End of onkey validation event
}); //end of document