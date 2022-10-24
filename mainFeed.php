<?php
session_start();

if($_SESSION['UserId'] == ''){
    header("Location: /mainpage.php");
}
?>

<html>

<head>
    <title>Shape Feed.</title>
    <meta name="description" content="The feed of Shape.">
    <link rel="stylesheet" href="styles_mainfeed.css">
</head>

<body>
    <div class="allignvideo">
    <iframe class="Animation-video" src="https://www.youtube.com/embed/JGwWNGJdvx8">
                </iframe>
    </div>

    <div class="page-container">



        <div class="postfeed">


            <br><br>
            <?php
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


        $sql = "Select CreationTime, Body, UserName, UserAge, UserJob, users.UserId, PostId from posts inner join users on posts.UserId = users.UserId order by CreationTime desc";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                if($row["UserId"] == $_SESSION['UserId'])
                {
                    echo '
                    <div class="post"> 
                        <span class="username"> '. $row["UserName"]. '</span>
                        <span class="userinfo"> (Age: '. $row["UserAge"]. ' Job: '. $row["UserJob"]. ') '. $row["CreationTime"]. '</span>
                        <span >
                        <button  class="deletebutton" onclick="document.location=\'/checkDeletePost.php?postId='.$row["PostId"].'\'">  delete</button>
                        </span>
                        <hr>
                        <p class="posttext"> '. $row["Body"]. ' </p>
                    </div>
                    ';
    
                } else{
                    echo '
                    <div class="post"> 
                        <span class="username"> '. $row["UserName"]. '</span>
                        <span class="userinfo"> (Age: '. $row["UserAge"]. ' Job: '. $row["UserJob"]. ') '. $row["CreationTime"]. '</span>
                        <hr>
                        <p class="posttext"> '. $row["Body"]. ' </p>
                    </div>
                    ';
    
                }
                
            }

        }else{
            echo"<h1 class='nopost'> There are no posts yet. Be the first! Type your post below. </h1>";
        }

        ?>
            <br><br>



        </div>
        <div class="actionPanel">
            <div>
                <form method="post" action="checkPost.php">
                    <div class="formflex">
                        <div>
                            <label for="text">Post:</label><br>
                            <input type="text" id="post" name="post"><br><br>
                        </div>
                        <div>
                            <input class="submit" type="submit" value="Submit">

                        </div>
                    </div>
                </form>
            </div>

            <div class="navigation">
                <button onclick="document.location='/logOff.php'">
                    Log off.
                </button>
                <button onclick="location.href='https://www.ludgercollege.nl/'">
                    Mandatory link for school
                </button>
            </div>

        </div>
    </div>

</body>

</html>