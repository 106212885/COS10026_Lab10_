<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
$new_email = trim($_POST['new_email']);

$query = "UPDATE user SET email = '$new_email' WHERE username = '$username'";
mysqli_query($conn, $query);

header("Location: profile.php");
exit();
?>
