<html class="Signup">

<head>
  <title>Shape.</title>
  <meta name="description" content="Create your Shape account.">
  <link rel="stylesheet" href="styles_forms.css">
</head>

<body class="page-container">
  <div class="divje">
    <h1 class="header"> Come Shape the future. </h1>

    <div class="underheader">
  
      <form method="post" action="checkSignUp.php">
        <label for="email">Email:</label><br>
        <input type="text" id="Uemail" name="Uemail"><br>
  
        <label for="Upassword">Password:</label><br>
        <input type="password" id="Upassword" name="Upassword"><br>
  
        <label for="email">Username:</label><br>
        <input type="text" id="Uname" name="Uname"><br>
  
        <label for="Upassword">Age:</label><br>
        <input type="text" id="Uage" name="Uage"><br>
  
        <label for="Upassword">Job:</label><br>
        <input type="text" id="Ujob" name="Ujob"><br><br>
  
  
  
        <input class="submit" type="submit" value="Submit">
      </form>
    <div>
  </div>
</body>


      <?php
session_start();
if ($_SESSION['SignUpError'] != ''){
    echo "<div class='error'>". $_SESSION['SignUpError'] ."</div>";
}

$_SESSION['SignUpError'] = '';


?>