<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'callospa_admin_database');

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM admin1 WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $user_id = mysqli_fetch_assoc($results)['id'];
  	  $_SESSION['username'] = $username;
	  $_SESSION['password'] = $password;
  	  $_SESSION['logged_in'] = "You are now logged in";
	  echo "You are now logged in!";
  	  // insert a new login session
  	  $session_id = random_bytes(10);
  	  $ip_address = $_SERVER['REMOTE_ADDR'];
  	  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  	  $login_time = date('Y-m-d H:i:s');
  	  $expires = date('Y-m-d H:i:s', strtotime('+1 hour')); // expires in 1 hour
  	  $query = "INSERT INTO login_sessions (user_id, session_id, ip_address, user_agent, login_time, expires) VALUES ('$user_id', '$session_id', '$ip_address', '$user_agent', '$login_time', '$expires')";
  	  mysqli_query($db, $query);

  	  // set the session ID in the user's session
  	  $_SESSION['session_id'] = $session_id;

  	  header('location: AdministratorPage.php');
  	  exit; // Ensure the script stops executing after the redirect
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



// SESSION VALIDATION
if (isset($_SESSION['session_id'])) {
  $session_id = $_SESSION['session_id'];
  $query = "SELECT * FROM login_sessions WHERE session_id='$session_id' AND expires > NOW()";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == 0) {
    // session is invalid or has expired, redirect to login page
    header('location: AdminLogin.php');
    exit; // Ensure the script stops executing after the redirect
  }
}

?>