    <?php
        session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the external CSS file -->
</head>
<body>

    


    <div class="login-container">
        <img src="logo-placeholder.png" alt="Company Logo" class="logo"> <!-- Placeholder for logo -->
        <h2>Welcome</h2>
        
        <form action="loginController.php" method="POST">
            <input type="text" name="username" placeholder="Username" class="input-field" required>
            <input type="password" name="password" placeholder="Password" class="input-field" required>
            
            <button type="submit" class="button">Login</button>
        </form>

        <!-- Link to direct to forgotten password page -->
        <a href="forgotten-password.php" class="forgot-password">Forgotten Password?</a>
        <a href="register.php" class="create-account">Create an Account</a>

        <!-- Display status message if set in session -->
        <?php
         if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['status_message'])) {
            echo '<div class="message">' . $_SESSION['status_message'] . '</div>';
            unset($_SESSION['status_message']); // Clear the message after displaying
        }   
        ?>
    </div>

</body>
</html>
