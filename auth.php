<?php
session_start();
include("connect.php");

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: Login.html");
    exit();
}
// Define $isLoggedIn to true since user is logged in
$isLoggedIn = true;
// Get the user's information based on their email
$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT id, firstName, lastName, profile_image FROM Users WHERE email='$email'");

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
    $userId = $user['id']; // This is the user_id you will use for posts and other actions
    $fullName = $user['firstName'] . ' ' . $user['lastName'];
    $profileImage = $user['profile_image'] ? $user['profile_image'] : 'images/blueuser.svg';
} else {
    echo "<p>Error: User not found.</p>";
    exit();
}
?>
