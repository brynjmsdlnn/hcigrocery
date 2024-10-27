<!-- signup.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Inria+Sans&family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>HCI Grocery | Sign Up Form</title>
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/logo.svg" class="logoSignUp" alt="logoSignUp">
        </header>
        <form action="../auth/auth.php" method="post">
            <input type="hidden" name="action" value="register">
            <div class="name">
                <div class="signupTxtField">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                </div>
                <div class="signupTxtField">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                </div>
            </div>
            <div class="signupTxtField">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="signupTxtField">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="signupTxtField">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="signupTxtField">
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <div class="checkBox">
                <input type="checkbox" name="terms" id="accept" required>
                <label for="accept" class="acceptMsg">I accept the <a href="">Terms of Use & Privacy Policy</a></label>
            </div>
            <div class="position-relative">
                <button type="submit" class="btnRegister position-absolute top-50 start-50 translate-middle mt-4 w-75">Register Now</button>
            </div>
        </form>
    </div>
</body>
</html>
