<?php
session_start();

if($_SESSION['UserId'] != ''){
    header("Location: /mainFeed.php");
}
?>

<html>

<head>
    <title>Shape.</title>
    <meta name="description" content="The home page of Shape.">
    <link rel="stylesheet" href="styles.css">    
</head>

<body>

    <content class="center-childs black-background">
       <h1 class="home-text fade-in">
           Shape.
       </h1>
    </content>

    <content class="container">
        <div class="center-childs">
            <p class="slogan animate">
                Shaping the future starts with us.
            </p>
        </div>
        
        <div class="black-background center-childs ">
            <button class="join-button animate">
                <a href="signIn.php">
                    Join us now.
                </a>
            </button>
        </div>
    </content>


    <script>
        //Give a fade-in tag to an element when it appears on screen
        const observer = new IntersectionObserver(entries =>  {
            entries.forEach(entry =>{
                if(entry.isIntersecting){
                    document.querySelectorAll(".animate")[0].classList.add("fade-in")
                    document.querySelectorAll(".animate")[1].classList.add("fade-in")
    
                }
            })
        })

        observer.observe(document.querySelector("p"));
    </script>

    <footer class="">
      
    </footer>

</body>

</html>