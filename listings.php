<?php 
require_once 'connect_db.ph';
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Land Listings</title>
    <link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <div class = "page-container">
        <header class = "header">
            <img src = "logo-placeholder.png" alt = "Logo" class = "logo">
            <nav>
                <a href = "heatmap.php">Map</a>
                <a href = "account-details.php">Profile</a>
                <a href = "logout.php">Logout</a>
            </nav>
        </header>

        <div class = "content-wrapper">

            <aside class = filters">
                <h3>Filter Listings</h3>
                <input type = "text" class = "input-field" placeholder = "Search by location...">
                <select class = "input-field">
                    <option value = "date_desc">Sort by Newest</option>
                    <option value = "date_asc">Sort by Oldest</option>
                </select>
                <button class = "button">Apply Filters</button>
            </aside>

            <main class = "listings-main">
                <div class = "listings-header">
                    <h2>Available Land Listings</h2>
                    <a href = "edit-listing.php" class = "button add-lisitng-btn">Add new Listing</a>
                </div>

                <table class = "listings-table">
                    <thead>
                        <tr>
                            <th>Location (Grid Ref)</th>
                            <th>Listed By</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    
</body>
</html>
