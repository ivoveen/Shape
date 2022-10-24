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

$sql = "SELECT UserEmail, UserId, UserPassword FROM users WHERE UserEmail = '$Uemail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
		echo "Email: " . $row["UserEmail"]. "<br>";
		echo "Password: " . $row["UserPassword"]. "<br> <br>";

    echo $Uemail. "<br>";
    echo $Upassword. "<br>";

    //$Upassword = $row["UserPassword"]

    if( ($Uemail == $row["UserEmail"]) &&  ($Upassword == $row["UserPassword"]) ){
      $_SESSION['UserId'] = $row["UserId"];
      header("Location: /mainFeed.php");
      
    } else{
      $_SESSION['LoginError'] = 'Sorry, that username or password is incorrect. Please try again.';
      header("Location: /SignIn.php");
      
    }

    echo $_SESSION['UserId'];

	}
} else {
  $_SESSION['LoginError'] = 'Sorry, that username or password is incorrect. Please try again.';
  header("Location: /SignIn.php");
}


$conn->close();





?>