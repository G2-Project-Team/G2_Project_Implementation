<!--import Header Placeholder-->
<!--php Read Database and assign values to variables-->
<?php
    session_start();  
    // Check if user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // If not logged in, redirect to login page
        header('Location: login.php');
        exit();
    }
  $uid = $_SESSION['id'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Details</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    /* Main container */
    .container {
      display: flex;
      height: 100vh; /* Full height */
    }
    
    /* Left Panel for links */
    .nav {
      width: 200px;           /* fixed width */
      background-color: white;
      color: black;
      padding: 20px;
      border-right: 3px solid black;
      display:flex;
      flex-direction: column;
      align-items: center;
    }

    .nav a {
      color: black;
      text-decoration: none;
      display: block;
      margin-bottom: 50px;
      font-size: 20px;
    }

    .nav a:hover {
      text-decoration: underline; /* Underline as described in Wireframe  */
    }

    /* Right Panel for content*/
    .content {
      flex: 1; /* fills the remaining space */
      padding: 20px;
      background-color: white;
    }
  </style>
</head>

<body>

<!--Navigation Links need to be set up in index?                                 -->
  <div class="container" >
    <div class="nav" style="font-size: 30px; font-weight: bold;">
      <a href="account-details.php" style="margin-top: 250px;">Account Details</a>
      <a href="account-listings.php" style="margin-bottom: 50px;">Listings</a>
      <a href="saved-listings.php" style="margin-bottom: 50px;">Saved Listings</a>
    </div>

<!--Right Panel (Profile Pic(changeable), Email(changeable), Primary Land Holding(changeable), Account Description?, Logout)-->
    <div class="content">
  <div style="display: flex; justify-content: center;">
    <img src="profile-pic-placeholder.jpg" 
         alt="Profile Picture" 
         style="width:200px; height:200px; border-radius:50%; margin-bottom: 100px;">
  </div>

  <div style="display: flex; flex-direction: column; align-items: center;">
    <h2>Email: <?php echo $email; ?></h2>
    <a href="javascript:changeEmail();" style="font-size: 16px; color: blue; margin-top: -20px;">Change Email</a>
  </div>
  
   <div style="display: flex; flex-direction: column; align-items: center;">
    <h2>Username: <?php echo $username; ?></h2>
    
  </div>

  <div style="display: flex; flex-direction: column; align-items: center;">
    <textarea rows="4" cols="50" placeholder="Account Description..." style="margin-top: 50px;"></textarea>

    <a href="javascript:logout();" style="font-size: 16px; color: blue; margin-top: 50px;">Logout</a><!--Add confirmation dialog, Link required to forgot password page-->
  </div>
</div>

  <script>
    // JavaScript for any interactivity if needed in future
    // JavaScript function to change email
    function changeEmail() {
      var newEmail = prompt("Enter your new email address:");
  if (newEmail) {
    fetch('changeEmailController.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'newEmail=' + encodeURIComponent(newEmail)
    })
    .then(response => response.text())
    .then(data => {
      alert(data); // Server’s response message
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while changing your email.');
    });
    // If successful, update session email variable and display message
    <?php if (isset($_SESSION['email'])): ?>
      alert("Your email has been changed to: <?php echo $_SESSION['email']; ?>");
    <?php endif; ?>

    // If successful, update displayed email
    document.querySelector('h2').innerText = "Email: " + newEmail;

  }
}

    // JavaScript function to logout
    function logout() {
      // Confirm logout action
      if (confirm("Are you sure you want to logout?")) {
        // Redirect to logout page or perform logout action
        window.location.href = "logoutController.php"; // Example redirect
        alert("You have been logged out.");
      }
      
    }
  </script>

</body>
</html>


    



    
      


   

