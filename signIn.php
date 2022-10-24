<?php
session_start();

if($_SESSION['UserId'] != ''){
    header("Location: /mainFeed.php");
}
?>


<html class="SignIn">

<head>
    <title>Shape.</title>
    <meta name="description" content="Create your Shape account.">
    <link rel="stylesheet" href="styles_Forms.css">
</head>

<body>
    <div class="page-container">
        <div class="divje">
            <h1 class="header"> Sign in to catch up on the latest. </h1>
            <div class="underheader">
                <form method="post" action="checkSignIn.php">
                    <label for="email">Email:</label><br>
                    <input type="text" id="Uemail" name="Uemail"><br><br>
    
                    <label for="Upassword">Password:</label><br>
                    <input type="password" id="Upassword" name="Upassword"><br><br><br>
    
                    <input class="submit" type="submit" value="Submit">
                </form>
    
                <?php
       
       if ($_SESSION['LoginError'] != ''){
           echo "<div class='error'>". $_SESSION['LoginError'] ."</div>";
       }
       $_SESSION['LoginError'] = '';
       ?>
    
                <br>
                <hr class="line">
                <br>
    
    
                <span> You don't have an account yet? </span>
                <span style="float: right;">Join the future today!</span>
                <br>
                <br>
    
    
                <button onclick="document.location='/signup.php'">
                    Make a Shape account
                </button>
    
            </div>
        </div>
    </div>


</body>

</html>