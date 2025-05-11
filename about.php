<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20261632-->
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/font.css">


    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

  <meta charset="UTF-8">
  <title>About | RMC</title>
  <link rel="icon" type="image/png" href="images/rmc_logo.png">
</head>

<body>
    <?php 
    session_start();
    include('header_handler.php'); // variable header
    include('navigation.php');// always show same nav
    ?>

    <main>
        <section>
            <div class = "container_960">
                <div class = "column_12" id="container_background">
                    <div class="column_12" id="container_title"><h1>About</h1></div>
                    
                    <div class = "column_10" id = "text_container">
                        <p>
                            Italy,Wales,Englang and Ukraine. Four countries, four minds, different hobbies and cultures, but one shared passion: travel the world on the road.
                            Our first met happened in a coastal town somewhere next to France. 
                            We just needed few conversations (and a couple of drinks lol) to realise that we had the same vision and objective: to make travel more accessible, immersive and unforgettable for everyone.
                            
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>

                    <div class="column_12" id="container_title"><h1>Creators</h1></div>


                    <div class="column_2" id="text_container" style = "overflow-x: hidden;">
                        <div id = "input_title_container">
                            <p>Davide Castro</p>
                            <img style ="width : 100px; height : 100px; " src = "images/davidepic.jpg">
                            <p> Hi, I am Davide, full time tech nerd and professional spaghetti lover (Italian of course).
                                I hope you like this website, but mostly my profile picture (sorry for the absence of pineapple lol).</p>
                            <a target= "_blank" href = "https://www.linkedin.com/in/davide-lo-castro-aabb451b8/">  <img style = "width : 50px; height : 50px ; "src = "images/linkedin_logo.png"></a>
                        </div>
                    </div>

                    <div class="column_2" id="text_container" style = "overflow-x: hidden;">
                        <div id = "input_title_container">
                            <p>Ezme Clark</p>
                            <img style = "width: 100px; height : 100px; " src = "images/ezmepic.jpg"> 
                            <p> Hi everyone, I am Ezme, my brain thinks really slow bit I get there eventually. Too many interests and hobbies to count. Simple and mismanaged mess who will get things done when threatened.</p>
                            <a target= "_blank" href = "https://www.linkedin.com/in/ezme-clark-179803230/ " > <img style = "width : 50px; height : 50px ; "src = "images/linkedin_logo.png"></a>
                        </div>
                    </div>

                    <div class="column_2" id="text_container" style = "overflow-x: hidden;">
                        <div id = "input_title_container">
                            <p>Yurii Filin</p>
                            <img style = "width: 100px; height : 100px; " src = "images/yuriipic.jpg">
                            <p> Hello people, Yurii's here, red is my color and cars are my passion. I am a never-stopping worker and always up for a new challenge. Sleeping is optional, curiosity is mandatory!</p>
                            <a target= "_blank" href = "https://www.linkedin.com/in/yurii-filin/ " > <img style = "width : 50px; height : 50px ; "src = "images/linkedin_logo.png"></a>   
                        </div>
                    </div>

                    <div class="column_2" id="text_container" style = "overflow-x: hidden;">
                        <div id = "input_title_container">
                            <p>Craig Lewis</p>
                            <img style = "width: 100px; height : 100px; " src = "images/craigpic.jpg">
                            <p> What's happening guys? My name is Craig, your friendly neighbourhood brainiac. I love to store any possible source of information, whether it's history, tech, finance or science, I'm on it.My superpower?Knowledge</p>
                            <a target= "_blank" href = "https://www.linkedin.com/in/craigantlewis/" > <img style = "width : 50px; height : 50px ; "src = "images/linkedin_logo.png"></a>   
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php');?>
</body>
</html>