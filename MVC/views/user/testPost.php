<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form with reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>Registration Form</h1>
    
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verify reCAPTCHA response
            $recaptcha_response = $_POST['g-recaptcha-response'];
            $secret_key = '6Le4tfMkAAAAAJTo3ETUQ2g0Qmodw3cT3CvuXmdy';
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
            $response_data = json_decode($response, true);

            if ($response_data["success"] == true) {
                // reCAPTCHA verification succeeded - process the rest of the form
                $name = $_POST['name'];
                $email = $_POST['email'];
                
                // TODO: save user data to database or do other form processing
                
                echo "<p>Thank you for registering, $name!</p>";
            } else {
                // reCAPTCHA verification failed - show error message
                echo '<p style="color: red;">reCAPTCHA verification failed. Please try again.</p>';
            }
        }
    ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <div class="g-recaptcha" data-sitekey="6Le4tfMkAAAAAHsu42xbxJNDi3GK8f7k9Syi0hb"></div>

        <input type="submit" value="Register">
    </form>
</body>
</html>
