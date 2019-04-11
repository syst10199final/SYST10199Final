<?php
require("connect.php");
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
  }
  else{
    // Define $username and $password
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
    $dbh = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}



    // mysqli_connect() function opens a new connection to the MySQL server.

    // SQL query to fetch information of registerd users and finds user match.
    $command = "SELECT username, password from login where username=? AND password=? LIMIT 1";
    // To protect MySQL injection for Security purpose

  //$userparams = array($_GET["min"],$_GET["max"]);
  $stmt = $dbh->prepare($command);
  //$array = array($_POST["name"],$_POST["count"],$_POST["indoor"],$_POST["referee"],$_POST["origin"],);
  $status= $stmt->execute();
    if($stmt->fetch()) //fetching the contents of the row {
      $_SESSION['login_user'] = $username; // Initializing Session
    header("location: profile.php"); // Redirecting To Profile Page
  }
  mysqli_close($conn); // Closing Connection
}
?>
