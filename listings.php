<?php 
require_once 'connect_db.php';

session_start();
//Database scheme
// landlistings: listing_id, user_id, date_added 
// users: user_id, username, email
// griddata: grid_id, lat, lon, avg_sun, avg_wind
// Connect to database and fetch all land listings with associated user info
$listings = $link->prepare("SELECT l.listing_id, l.time_created, u.username, gd.lat, gd.long FROM landlistings l JOIN users u ON l.user_id = u.user_id JOIN griddata gd ON l.listing_id = gd.grid_id ORDER BY l.time_created DESC");
$listings->execute();
$listingsResult = $listings->get_result();  
//Bind results to an array
$listingsArray = [];
while ($row = $listingsResult->fetch_assoc()) {
    $listingsArray[] = $row;
}   
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
                <a href = "logoutController.php">Logout</a>
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
                        <!-- Display all users listings -->
                        <tr>
                            <th>Location (Grid Ref)</th>
                            <th>Listed By</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listingsArray as $listing): ?>
                            <tr>
                                <?php $grid_id = $listing['lat'] . " ," . $listing['long'] ; ?>
                                <td><a href="Listing_View.php?listing_id=<?php echo $listing['listing_id']; ?>"><?php echo htmlspecialchars($grid_id); ?></a></td>
                                <td><?php echo htmlspecialchars($listing['username']); ?></td>
                                <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($listing['time_created']))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    
</body>
</html>
