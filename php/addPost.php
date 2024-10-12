<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddPost</title>
    <link rel = "stylesheet" href = "../reset.css">
    <link rel = "stylesheet" href = "../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marko+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Marko+One&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=IM+Fell+English+SC&family=Marko+One&family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=IM+Fell+English+SC&family=Marko+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Staatliches&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <hgroup>
            <nav class = "navbar">
                <a id ="first-header-element" href = "../index.php">Home<span>.</span></a>
                <div class = "hamburger" >&#9776;</div>
                <ul>
                <?php
                    session_start();
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                    $logout_link = '
                    <li><a id = "last-header-element" href = "logout.php">Logout</a></li>
                    ';
                    $viewBlog_link = '
                    <li><a href = "viewBlog.php">View Blog</a></li>
                    ';
                    if ($_SESSION['loggedin']) {
                        echo $viewBlog_link;
                        echo $logout_link;

                    } 
                ?>
                </ul>

            </nav>
        </hgroup>
        
    </header>

    <?php

    
    $addPost = '
    <div class = "blog">
        <div class = "blog-fields">
            <form id="post-form" action="addEntryData.php" method="POST">
                <h2>Add Post</h2>
                <div class = "form-field" id = "title-field">
                    <label for = "title">Title</label>
                    <div class = "form-field-box-title" >
                        <textarea type = "text" id = "title" name = "title" placeholder = "Enter your title..."></textarea>
                    </div>
                   
                    
                </div>
                <div class = "form-field" id = "description-field">
                    <label for = "description">Description</label>
                    <div class = "form-field-box-description">
                        <textarea type = "text" id = "description" name = "description" placeholder = "Enter your description..."></textarea>
                    </div>
                   
                    
                </div>
                <div class = "buttons">
                    <button id = "clear-blog"type = "reset" value = "Clear Form" >Reset</button>
                    <button id = "submit-blog">Submit</button>
                </div>
                
            </form>
            
        </div>
    </div>
    ';
    if ($_SESSION['loggedin']) {
        if($_SESSION['admin']){//if logged in  and admin
            echo $addPost; //you can add post
        }
    } else {
        header("Location: ../login.html?errorLogin=true");
    }
    ?>
    
    <!--  -->

    <footer id = "post-footer">
        <p>© 2024 Ekaterina Radaeva</p>
    </footer>
</body>
<script src = "../function.js"></script>
</html>