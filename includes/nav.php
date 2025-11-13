<!DOCTYPE html>
<?php
if(session_status() != 2) session_start();
 ?>

<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">   
    <meta name="viewport" 
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>[COMPANY NAME]</title>
    <link rel="icon" type="image/xicon" href="\G2_Project_Implementation\images\favicon.ico">
    
    <!--CSS stylesheet
    <link rel="stylesheet" type="text/css" href="styles.css">-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous">

    <!--Google fonts API-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Geist:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>


<!-- NAVBAR STARTS HERE -->
<nav class="navbar navbar-expand-lg navbar-dark mb-3 rounded-bottom" style="background-color:#45A583 !important;border-bottom: 2px solid #45A583; min-height: 6vh;">

    <a class="navbar-brand" href="#"><img src="images\logo-placeholder.png" style="max-height:50px;"></a>

    <button class="navbar-toggler" type="button" 
        data-toggle="collapse" 
        data-target="#navbarNav" 
        aria-controls="navbarNav" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="heatmap.php">Heat Map</a>
            </li>
            <?php
            if(isset($_SESSION['id'])){
                require("connect_db.php");
                echo '
                <li class="nav-item">
                <a class="nav-link" href="account-details.php">Account Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logoutController.php">Logout</a>
                </li>';
            }
            else{
                echo '<li class="nav-item">
                      <a class="nav-link" href="register.php">Register</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="login.php">Login</a>
                      </li>';
            }
            ?>
            
            
            
            
            
        </div>
    </div>
</nav>
 <!-- END OF NAVBAR -->

<body>
<!-- BODY TAG CONCLUDED IN footer.php -->

