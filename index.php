<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel = "stylesheet" href = "reset.css">
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marko+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Marko+One&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=IM+Fell+English+SC&family=Marko+One&family=Staatliches&display=swap" rel="stylesheet">
    <script src = "function.js"></script>
</head>


<body>
    <header>
        <hgroup>
            <nav class = "navbar">
                <a id ="first-header-element" href = "index.php">Home<span>.</span></a>
                
                <div class = "hamburger" >&#9776;</div>

                <ul>
                    <li><a href = #about-me>About Me</a></li>
                    <li><a href = #experience>Experience</a></li>
                    <li><a href = #education>Education</a></li>
                    <li><a href = #skills>Skills</a></li>
                    <li><a href = #contact>Contact</a></li>
                    <li><a href = "project.html">Projects</a></li>
                    
                    
                    <?php
                        session_start();

                        
                        $logout_link = '
                        <li><a id = "last-header-element" href = "php/logout.php">Logout</a></li>
                        ';
                        
                        $addPost_link = '
                        <li><a href = "php/addPost.php">Add Post</a></li>
                        ';

                        $login_link = '
                        <li id ="last-header-element"><a href = "login.html">Login</a></li>
                        ';

                        $view_blog = '
                        <li><a href = "php/viewBlog.php">View Blog</a></li>
                        ';
                        
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                            if(isset($_SESSION['admin']) && $_SESSION['admin']){
                                echo $addPost_link;
                                echo $view_blog;
                                echo $logout_link;  
                            }
                            else{
                                echo $view_blog;
                                echo $logout_link; 
                            }
                            
                        } 
                        else{
                            echo $view_blog;
                            echo $login_link;

                        }
                    ?>
                   
                </ul>
            </nav>
        </hgroup>
        
    </header>
    
    
    <aside>
        <p id = "welcome">Welcome to my portfolio!</p>
        <ul>
            <div class = "icon">
                <li> <a href ="https://www.facebook.com/ekaterina.radaeva.58"><i class = "fa-brands fa-facebook"></i></a></li>
                <span>Facebook</span>
            </div>
            <div class = "icon">
                <li> <a href ="https://www.instagram.com/radaeva__e/"><i class = "fa-brands fa-instagram"></i></a></li>
                <span>Instagram</span>
            </div>
            <div class = "icon">
                <li> <a href ="https://t.me/ateraeva"><i class = "fa-brands fa-telegram"></i></a></li>
                <span>Telegram</span>
            </div>
            <div class = "icon">
                <li><a href ="https://www.linkedin.com/in/ekaterina-radaeva-9b39b1294/"><i class = "fa-brands fa-linkedin"></i></a></li>
                <span>Linked-in</span>
            </div>
            <div class = "icon">
                <li><a href ="https://github.com/eradaeva"><i class = "fa-brands fa-github"></i></a></li>
                <span>Github</span>
            </div>
        
        </ul>
    </aside>
    <section id="content" class = "grid-container">
        <div class = "about">
           
            <article id = "about-me">
                <h2>About me</h2>
                <h3>
                    Computer science and artificial intelligence student studying at Queen Mary University
                    of London.
                </h3>
                <p>
                    My name is Ekaterina Radaeva, and I'm currently exploring the exciting fields of 
                    Computer Science and Artificial Intelligence as a first-year student at Queen Mary 
                    University of London. I am a novice programmer and a musician. My passion for music goes deep, with 10 years of piano practice,
                    two music school diplomas, an ARSM qualification, and advanced singing skills marked 
                    by two Trinity Level qualifications. Music isn't just a hobby for me; it's a big part
                    of who I am. But there's even more to my life than music. I love sports and stay
                    very active. Sports are not just something I do for fun; they are a big part of 
                    my daily life. I enjoy teaching others how to stay fit and healthy, using my 
                    enthusiasm to encourage and uplift them. This helps me stay focused and organized,
                    and also pushes me to be more open and creative. My first year at university has 
                    also gotten me really interested in web design. I find it exciting to make 
                    websites that are not only easy to use but also fun and unique. Web design lets
                    me be creative in new ways, with endless possibilities to bring my ideas to life.
                    In short, I'm someone who loves blending art, technology, and sports, always 
                    looking to learn and try new things.
                </p>
            </article>
            <figure>
                <img src = "images/me.JPEG" alt = "Me">
                <figcaption>

                </figcaption>
            </figure>
        </div>
        
        

        <section id = "education/experience" class = "timeline">
            <div  class = "timeline-row">
                <div id = "education" class = "timeline-column">
                    <h2 class = "title">Education</h2>

                    <div class = "timeline-box">
                        <div class = "timeline-content">
                            <div class = "content">
                                <div class = "year">2011-2016</div>
                                <h3>Smart School, Kazan, Russia</h3>
                                <p>Elementary School Diploma</p>
                            </div>
                        </div>

                        <div class = "timeline-content">
                            <div class = "content">
                                <div class = "year">2016-2023</div>
                                <h3>Heritage Private School, Limassol, Cyprus</h3>
                                <p>High School Diploma</p>
                            </div>
                        </div>

                        <div class = "timeline-content">
                            <div class = "content">
                                <div class = "year">2023-Present</div>
                                <h3>Queen Mary University of London, London, United Kingdom</h3>
                                <p>Bachelor's Degree</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id = "experience" class = "timeline-column">
                    <h2 class = "title">Experience</h2>

                    <div class = "timeline-box">
                        <div class = "timeline-content">
                            <div class = "content">
                                <div class = "year">2019</div>
                                <h3>TheSoulPublishing</h3>
                                <p>Warehouse assistant</p>
                            </div>
                        </div>

                        <div class = "timeline-content">
                            <div class = "content">
                                <div class = "year">2020</div>
                                <h3>TheSoulPublishing</h3>
                                <p>Human Resources Assistant</p>
                            </div>
                        </div>

                        <div class = "timeline-content">
                            <div class = "content">
                                <div class = "year">2021</div>
                                <h3>TheSoulPublishing</h3>
                                <p>Video Equipment Runner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id = "skills">
            <h2 class = "heading">Skills</h2>
    
        
            <div id = "html">
                <img src = "images/html-5.png">
                
            </div>
            <div id = "css">
                <img src = "images/css-3.png">
                
            </div>
            <div id = "java">
                <img src = "images/java.png">
                
            </div>
        
        
            <div id = "python">
                <img src = "images/python.png">
                
            </div>
            <div id = "blender">
                <img src = "images/icons8-blender-3d-480.png">
                
            </div>
            <div id = "visual-basic">
                <img src = "images/visual-basic.png">
                
            </div>
        
        
            <div id = "unity">
                <img src = "images/unity.png">
                
            </div>
            <div id = "js">
                <img src = "images/js-format.png">
                
            </div>
            <div id = "swift">
                <img src = "images/swift.png">
                
            </div>
        
            
        </div>
        
        
        
        <div id = "contact">
            <div class = "contact-info">
                <div class = "mail">
                    <i class="fa-solid fa-envelope"></i>eradaeva637@gmail.com
                </div>
                <div class = "phone">
                    <i class="fa-solid fa-phone"></i>07849755164
                </div>
                <div class = "address">
                    <i class="fa-solid fa-address-book"></i>327 Mile End Road, Bethnal Green, London, E1 4NS
                </div>
            </div>
        </div>
        
    </section>
    <footer>
        
        <p>© 2024 Ekaterina Radaeva</p>
    </footer>
</body>

</html>