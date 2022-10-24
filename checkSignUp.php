<?php
session_start();

$servername = "localhost";
$username = "ShapeWeb1";
$password = "BLABLAblabla814814";
$dbname = "Shape";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Uemail  = $_POST['Uemail'];
$Upassword = $_POST['Upassword'];
$Uname  = $_POST['Uname'];
$Uage = $_POST['Uage'];
$Ujob  = $_POST['Ujob'];

$sql = "SELECT UserId FROM users WHERE UserEmail = '$Uemail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['SignUpError'] = 'That Email is already in use. Please login or use a different email.';
    header("Location: /SignUp.php");
}


$sql = "SELECT UserId FROM users WHERE UserName = '$Uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['SignUpError'] = 'That username is already in use. Please login or use a different email.';
    header("Location: /SignUp.php");

} else {
    
    $sql = "INSERT INTO users (UserEmail, UserPassword, UserName, UserAge, UserJob) 
    VALUES ('$Uemail', '$Upassword', '$Uname', '$Uage', '$Ujob');";
    $result = $conn->query($sql);


    header("Location: /signIn.php");
}


$conn->close();

