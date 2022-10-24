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

$PostId = $_GET["postId"];

$sql = "DELETE FROM posts WHERE PostId = $PostId;";
$result = $conn->query($sql);


header("Location: /mainFeed.php");

?>