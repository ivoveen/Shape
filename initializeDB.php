<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php


if (isset($_POST['provisionkey']) && $_POST["provisionkey"]=="1751") {

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';


    $database = 'Shape';
    $databaseUser = 'ShapeWeb1';
    $databasePassword = 'BLABLAblabla814814'; 


    // Create Admin Connection
    $adminConnection = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(! $adminConnection ) {
    die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully<br>';


    // Drop Database If Exists
    if (empty (mysqli_fetch_array(mysqli_query($adminConnection, "SHOW DATABASES LIKE '$database' ")))){
        echo "DB does Not exist<br>"; 
    }
    else {    
        echo "DB already exists!<br>";
        $sql = "DROP DATABASE $database";
        $retval = mysqli_query( $adminConnection, $sql );

        if(! $retval ) {
            die('Could not create database: ' . mysql_error());
        }
        echo "Database $database removed successfully<br>";
    }


    // Create Database
    $sql = "CREATE DATABASE $database";
    $retval = mysqli_query( $adminConnection, $sql );

    if(! $retval ) {
    die('Could not create database: ' . mysql_error());
    }
    echo "Database $database created successfully<br>";


    // Create Database Connection 
    $databaseConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
    if(! $databaseConnection ) {
        die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully <br>';


    // Create Users Table
    $sql = "CREATE TABLE Users (
        UserId int NOT NULL AUTO_INCREMENT, 
        UserEmail varchar(255) NOT NULL, 
        UserPassword varchar(255) NOT NULL, 
        UserName varchar(255) NOT NULL,
        UserAge varchar(255) NOT NULL,
        UserJob varchar(255) NOT NULL,
        PRIMARY KEY (UserId));";

    $retval = mysqli_query( $databaseConnection, $sql );
    echo 'Created Users Table Succesfully<br>';


    // Create Posts Table
    $sql = "CREATE TABLE Posts (
        PostId int NOT NULL AUTO_INCREMENT, 
        CreationTime DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
        UserId int NOT NULL, 
        Body Text, 
        PRIMARY KEY (PostId));";

    $retval = mysqli_query( $databaseConnection, $sql );
    echo 'Created Posts Table sucessfully <br>';


    //Remove Database User if Exists 
    $sql = "DROP USER IF EXISTS $databaseUser@'localhost';";
    $retval = mysqli_query( $adminConnection, $sql );
    echo "Removed User $databaseUser<br>";


    // Create Database User for Table
    $sql = "CREATE USER '$databaseUser'@'localhost' IDENTIFIED BY '$databasePassword';";
    $retval = mysqli_query( $adminConnection, $sql );
    echo "Created User $databaseUser<br>";


    // Grant Permissions to Database User for Table
    $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON $database.* TO '$databaseUser'@'localhost';";
    $retval = mysqli_query( $databaseConnection, $sql );
    echo "granted SELECT, INSERT, UPDATE and DELETE Priveleges to User $databaseUser<br>";


    // Close Admin Connection
    mysqli_close($adminConnection);
    echo 'Admin Connection closed <br>';


    // Close Database Connection
    mysqli_close($databaseConnection);
    echo 'Database Connection closed <br>';

    echo '<button onclick="document.location=\'/mainpage.php\'">
    visit the home page.
    </button>';

}
?>

    <H2>Please Enter Provision Key</H2>
    <form method="post" action="/initializeDB.php">
        <label for="provisionkey">First name:</label><br>
        <input type="password" id="provisionkey" name="provisionkey"><br>
        <button type ="submit">(Re-)initialize Database</button>
    </form>

</body>
</html>
