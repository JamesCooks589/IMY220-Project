<?php
session_start();
// Unset all session variables
$_SESSION = array();
// Destroy the session
session_destroy();
// Redirect to index.php after logging out
header("Location: index.php");
exit();
?>
