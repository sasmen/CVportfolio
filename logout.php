<?php
// Start the session
session_start();

// Destroy the session to log out the user
session_destroy();

// Redirect to the CV page
header("Location: index.php");
exit;
?>
