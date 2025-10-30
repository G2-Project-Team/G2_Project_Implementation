<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="login-container">
        <img src="logo-placeholder.png" alt="Company Logo" class="logo">
        <h2>Create an Account</h2>

        <form action="registerController.php" method="POST">
            <!-- Full Name -->

            <!-- Contact Information -->
            <input type="email" name="email" placeholder="Email Address" class="input-field" required>


            <!-- Credentials -->
            <input type="text" name="username" placeholder="Username" class="input-field" required>
            <input type="password" name="password" placeholder="Password" class="input-field" required>

            <button type="submit" class="button">Sign Up</button>
        </form>

        <a href="login.php" class="create-account">Already have an account? Login here</a>
        
    </div>

</body>
</html>
