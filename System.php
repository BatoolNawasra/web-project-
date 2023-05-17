<?php

include 'conection.php';
?>
<!Doctype html>
<html>

<head>
    <title> Hospital Managment System </title>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="container2">
                <div class="logo"> Hospital Managment System </div>

                <div class="nav">
                    <ul class="list">
                        <li class="list-item"><a class="link-nav" href="#Home">Home</a></li>
                        <li class="list-item"><a class="link-nav" href="#about">About Us</a></li>
                        <li class="list-item"><a class="link-nav" href="#Services">Services</a></li>
                        <li class="list-item"><a class="link-nav" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-content">
            <div class="overlay">
                <div class="Home" id="Home">
                    <h1 class="main-title">welcom to our Hospital Managment System</h1>
                    <span class="line"></span>
                    <br></br>
                    <p class="main-description"> Enjoy your experience with Hospital Managment System
                    </p>
                    <a href="login.php" class="link"> Log In</a>
                    <a href="signup.php" class="link"> Sign Up</a>
                </div>
            </div>
        </div>

        <div class="header-content">
            <div class="overlay">
                <div class="about" id="about">
                    <div class="about-header"></div>
                    <h1 class="main">About Us</h1>
                    <span class="line"></span>
                    <br>
                    <h2 class="main-description">We make patient's life easier by saving waiting time</h2>
                    <p class="main-description">
                        Time and health is what we have.
                        It is our lifeline.
                        It prompts us to reimagine how we can live better.
                        For you For all appointments you want to book.
                        For all the time you want to save.
                        For all diseases you want to cure.
                        In real time Incredibly fast now.
                    </p>
                </div>
            </div>
        </div>
        <div class="Services" id="Services">
            <h1 class="about-heading">We've Fot what you need!</h1>
            <br>
            <p class="about-description"> Providing reservation service at all times in a convenient and fast manner
                A way for people who can't stand long hours of waiting
            </p>
            <br>
            <p class="about-description">
                project descrption to be added later
            </p>

        </div>


        <div class="to-contact" id="contact">
            <h1>contact us!</h1>
            <span class="li"></span>
            <h3>You can contact us through the information on that interface, and you can easily know our location
                through it</h3>
            <div class="contact-list">
                <div class="contact-items">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>location</h4>
                        <p>Nablus,Rafidia Street</p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-user-clock"></i>
                        <h4>open hours</h4>
                        <p>From 8:00 Am to 1:30 Am </p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope-square"></i>
                        <h4>email</h4>
                        <p>Hospital_Managment@gmail.com</p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <h4>call</h4>
                        <p>+970569225699</p>
                    </div>

                </div>
            </div>
        </div>




        <div class="footer">
            copyright &copy; 2023 - Hospatial Mangment System 
        </div>




</body>

</html>