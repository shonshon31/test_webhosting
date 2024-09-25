<?php
// LOGOUT
if (basename($_SERVER['PHP_SELF']) == 'logout.php') {
  // Get the session ID
  $session_id = $_SESSION['session_id'];

  // Delete the session ID from the database
  $query = "DELETE FROM login_sessions WHERE session_id='$session_id'";
// Clear cookies
setcookie("user", "", time() - 3600, "/"); // past time
setcookie(session_name(), "", time() - 3600, "/"); // past time

// End session
session_start();
session_unset();
session_destroy();
header("Location: AdminLogin.php");
exit();
}
?>