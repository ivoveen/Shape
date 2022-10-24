<?php
session_start();
$_SESSION['UserId'] = '';


?>


<html class="logoff">

<head>
    <title>Shape.</title>
    <meta name="description" content="You logged off.">
    <link rel="stylesheet" href="styles_forms.css">
</head>



<body class="page-container">
    <div class="divje">
        <div class="spacer"></div>
        
        <h1 class="header">You have been logged off.</h1>

        <div class="underheader">
            <button onclick="document.location='/signin.php'">
                Sign in
            </button>
            <br>
            <br>
            <button onclick="document.location='/mainpage.php'">
                Or visit the home page.
            </button>
        </div>
    </div>
</body>

</html>