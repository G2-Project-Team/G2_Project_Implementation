<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Listing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="page-container">
        
        <header class="header">
            <img src="logo-placeholder.png" alt="Logo" class="logo">
            <nav>
                <a href="listings.php">All Listings</a>
                <a href="#">Profile</a>
                <a href="#">Logout</a>
            </nav>
        </header>

        <div class="content-wrapper">
            <main class="listing-detail-main">
                <div class="listing-detail-header">
                    <h1>Listing at Grid (15, 17)</h1>
                    <button class="button save-listing-btn">Save Listing</button>
                </div>

                <div class="listing-info">
                    <h3>Owner Information</h3>
                    <p><strong>Listed By:</strong> Stuart Wilson</p>
                    <p><strong>Contact Email:</strong> swilson300@caledonian.ac.uk
                </div>
                
                <div class="listing-info">
                    <h3>Listing Details</h3>
                    <p><strong>Date Added:</strong> 12-10-2025</p>
                    <p><strong>Description:</strong> 50 acres of prime land suitable for a radio station running on wind and solar energy</p>
                </div>

                <div class="listing-documents">
                    <h3>Attached Documents</h3>
                    <table class="listings-table">
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
                                <td>12-10-2025</td>
                                <td><a href="#" class="view-link">Download</a></td>
                            </tr>
                            <tr>
                                <td>Site Map</td>
                                <td>12-10-2025</td>
                                <td><a href="#" class="view-link">Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="listings.html" class="button">Back to All Listings</a>
            </main>
        </div>
    </div>

</body>
</html>
