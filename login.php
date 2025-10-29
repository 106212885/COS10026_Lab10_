<?php
session_start();
require_once("settings.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get user input from form
  $form_username = trim($_POST['username']);
  $form_password = trim($_POST['password']);

  // Query to check credentials
  $query = "SELECT * FROM user WHERE username = '$form_username' AND password = '$form_password'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    $_SESSION['username'] = $user['username'];
    header("Location: profile.php");
    exit();
  } else {
    echo "❌ Incorrect username or password.";
  }
}
?>

<form method="POST" action="login.php">
  <title>Login Page</title>
  <h1>Welcome to Login Page!</h1>
  <label>Username:</label>
  <input type="text" name="username" required><br>

  <label>Password:</label>
  <input type="password" name="password" required><br>

  <input type="submit" value="Login">
</form>
