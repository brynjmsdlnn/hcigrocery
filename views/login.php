<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Inria+Sans&family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>HCI Grocery | Log In</title>
</head>
<body>
    <section>
        <header>
            <img src="assets/logo.svg" class="logoLogIn" alt="logoLogIn">
        </header>
        <p class="message">Log in to your account</p>
        <p class="descMsg pb-4">Enter your email and password to login</p>
        <form action="../auth/auth.php" method="post" class="pb-4 mb-4">
            <input type="hidden" name="action" value="login">
            <div class="loginTxtField">
                <input type="email" class="form-control" name="email" placeholder="email@domain.com" required>
            </div>
            <div class="loginTxtField">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="position-relative pt-2">
                <button type="submit" class="btnSubmit position-absolute top-50 start-50 translate-middle mt-4 w-100">Log In</button>
            </div>
        </form>
        <div class="or">
            <p>or continue with</p>
        </div>
        <a href="">
            <div class="lgButton">
                <img src="assets/google.svg" alt="googleLogo">
                <p>Google</p>
            </div>
        </a>
        <div class="termsMsg">
            <p>By logging in, you agree to our <a href="">Terms of Service</a> and <a href="">Privacy Policy</a></p>
        </div>
    </section>
</body>
</html>