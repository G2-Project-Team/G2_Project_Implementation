<!--import Header Placeholder-->
<!--php Read Database and assign values to variables-->
<?php
include 'connect_db.php';
include 'includes/nav.php';
session_start();
$uid = $_SESSION['id'];

$listings = $link->prepare("SELECT
listing_id,
time_created,
time_updated,
title,
description
FROM landlistings
WHERE user_id = ?
"
);

$listings->bind_param("i", $uid);
$listings->execute(); // Execute the query
$listings->store_result(); // Store the result for later use
$listings->bind_result($listingId, $timeCreated, $timeUpdated, $title, $description); // Bind the results to variables
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Listings</title>
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

    <!--Right Panel-->
    <div class="content">
  <div style="display: flex; justify-content: center; margin-top: 250px;">
    <h1>My Listings</h1>
  </div>

  <!-- Data Table -->
  <div style="margin-top: 50px; display: flex; justify-content: center;">
    <table style="width: 75%; border-collapse: collapse; text-align: center;">
      <thead>
        <tr style="background-color: #f2f2f2;">
          <th style="padding: 12px; border-bottom: 2px solid #000;">Date</th>
          <th style="padding: 12px; border-bottom: 2px solid #000;">Title</th>
          <th style="padding: 12px; border-bottom: 2px solid #000;">Description</th>
          <th style="padding: 12px; border-bottom: 2px solid #000;">Documents/Info</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example rows, replace with database content in foreach loop ? 
         Need delete controller-->
        <?php while($listings->fetch()) : ?>
      <tr>
        <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900"> <?= htmlspecialchars($timeCreated) ?></td>
        <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?= htmlspecialchars($title) ?></td>
        <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?= htmlspecialchars($description) ?></td>
        <td class="px-4 py-2 whitespace-nowrap">
          <a
            href="edit-listing?lid=<?=$listingId?>"
            class="inline-block rounded-sm bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
          >
            Edit
          </a>
          <a

            href="delete-listing?lid=<?=$listingId?>"
            class="inline-block rounded-sm bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
          >
            Delete
          </a>
        

        </td>
      </tr>
      <?php endwhile ?>
      </tbody>
    </table>
  </div>
    
