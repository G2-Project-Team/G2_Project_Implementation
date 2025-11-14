<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Land Listings</title>
 <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous">

    <!-- combined stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <div class = "page-container">
        
        <div class = "content-wrapper">
            <main class = "listing-detail-main">
                <div class = listing-detail-header">
                    <h1>Listing at Grid</h1>
                    <button class = "button save-listing-btn">Save Listing</button>
                </div>

                <div class = "listing-info">
                    <h3>Owner Information</h3>
                    <p><strong>Listed By: </strong></p>
                    <p><strong>Contact Email: </strong></p>
                </div>

                <div class = "listing-info">
                    <h3>Listing Details</h3>
                    <p><strong>Date Added: </strong></p>
                    <p><strong>Description: </strong></p>
                </div>

                <div class = "listing-documents">
                    <h3>Attached Documents</h3>
                    <table class = "listings-table">
                        <thead>
                            <tr>
                                <th>Document Name</th>
                                <th>Date Uploaded</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Proof of Ownership</td>
                                <td>12/10/2025</td>
                                <td><a href = "#" class = "view-link">Download</a></td>
                            </tr>
                            <tr>
                                <td>Site Map</td>
                                <td>12/10/2025</td>
                                <td><a href = "#" class = "view-link">Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href = "listings.php" class = "button">Back to All Listings</a>
            </main>
        </div>
    </div>
</body>
</html>
