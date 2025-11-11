<?php
include 'connect_db.php';
session_start();
$uid = $_SESSION['id'];

// Validate and sanitise POST content
if (!isset($_POST['title']) || empty(trim($_POST['title']))) {
    $_SESSION['status_message'] = "Listing title cannot be empty.";
    header("Location: add-listing.php");
    exit();
}
if (!isset($_POST['desc']) || empty(trim($_POST['desc']))) {
    $_SESSION['status_message'] = "Listing description cannot be empty.";
    header("Location: add-listing.php");
    exit();
}

$title = trim($_POST['title']);
$desc = trim($_POST['desc']);

        $query = "INSERT INTO `landlistings`(`user_id`, `title`, `description`) VALUES ('$uid','?','?')";
        $stmt = $link->prepare($query);
        $stmt->bind_param("ss", $title, $desc);
        $stmt->execute();
        $stmt->close();

        exit();
?>