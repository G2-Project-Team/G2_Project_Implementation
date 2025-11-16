<?php
session_start();
include 'connect_db.php';
$uid = $_SESSION['id'];
$lid = $_GET['listing_id'];

// Check if the listing is already saved
$stmt = $link->prepare('SELECT * FROM listing_save WHERE user_id = ? AND listing_id = ?');
$stmt->bind_param('ii', $uid, $lid);
$stmt->execute();
$stmt->store_result();
$saved = false;
if ($stmt->num_rows > 0) {
    // Listing already saved
    $saved = true;
}
$stmt->close();

if ($saved) {
    // Delete the saved listing
        $query = "DELETE FROM listing_save WHERE user_id = ? AND listing_id = ?";
        $stmt = $link->prepare($query);
        $stmt->bind_param("ii", $uid, $lid);
        $stmt->execute();
    $stmt->close();
    header("Location: listings.php");
    exit();

} 
else {

        $query = "INSERT INTO `listing_save`(`user_id`, `listing_id`) VALUES (?, ?)";
        $stmt = $link->prepare($query);
        $stmt->bind_param("ii", $uid, $lid);
        $stmt->execute();
        $stmt->close();
        header("Location: listings.php");   
        exit();
}
?>
