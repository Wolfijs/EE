<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>Task Management</title>
</head>
<body>
<?php
session_start();
include("functions.php");
?>
<div class="main">
    <form method="post" class="forma" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username">
        <span id="username-val" style="color: red;"></span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email">
        <span id="email-val" style="color: red;"></span>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="password" placeholder="Enter your password">
        <span id="pass-val" style="color: red;"></span>
        <button type="submit">Register</button>
    </form>

    <div class="already-account">
        <p class="account">Already have an account? <a class="rede" href="login.php">Login here</a>.</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".forma").submit(function (event) {
            event.preventDefault();
            submitForm();
        });

        function submitForm() {
            const username = escape($('#username').val());
            const email = escape($('#email').val());
            const password = escape($('#pass').val());

            let isValid = true;

            // Validate username
            if (username === "") {
                $("#username-val").text("Please enter a username.");
                isValid = false;
            } else {
                // Check for HTML special characters
                const usernameRegex = /^[a-zA-Z0-9]+$/;
                if (!usernameRegex.test(username)) {
                    $("#username-val").text("Username can only contain letters and numbers.");
                    isValid = false;
                } else {
                    $("#username-val").text("");
                }
            }

            // Validate email
            if (email === "") {
                $("#email-val").text("Please enter an email.");
                isValid = false;
            } else {
                // Check for '@' in email
                if (email.indexOf('@') === -1) {
                    $("#email-val").text("Please enter a valid email address.");
                    isValid = false;
                } else {
                    $("#email-val").text("");
                }
            }

            // Validate password
            if (password === "") {
                $("#pass-val").text("Please enter a password.");
                isValid = false;
            } else if (password.length <= 8) {
                $("#pass-val").text("Password must be longer than 8 characters.");
                isValid = false;
            } else {
                $("#pass-val").text("");
            }

            if (isValid) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/new/api/insertRegister.php",
                    data: {username: username, email: email, password: password},
                    success: function (response) {
                        // Handle the response from the server
                        console.log(response);

                        // Clear input fields and reset form
                        $(".forma")[0].reset();
                        // You can also reset individual input fields manually
                        // $('#username').val('');
                        // $('#email').val('');
                        // $('#pass').val('');

                        // Clear error messages
                        $("#username-val").text("");
                        $("#email-val").text("");
                        $("#pass-val").text("");
                    }
                });
            }
        }
    });
</script>

</body>
</html>
