<?php
    /**
     * Developed and designed by: Laurenz T.
     * email me @: laurenz@outlook.ph
     * COLLEGE OF COMPUTER STUDIES
     * COMPUTER SCIENCE - SOFTWARE TECHNOLOGY
     * "Ang pusong nabiyak, madalas naninindak" #uselessQuotesNgBagongTaon #2016
     */
     require_once "includes/project-functions.php";
     if( !isset($_GET['id'])) {
        header("Location: ./");
     }

     $project = proj_get($_GET['id']);
?>
<html>
    <head>
        <title>Quiver | Sample </title>
        <!-- Google icons -->        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>                
        <!-- Fonts up up and away -->
        <link type="text/css" rel="stylesheet" href="css/fontpack.css"/>
        <!-- Materialize CSS Import -->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>	      
        <!-- Custom Stylesheet -->
        <link type="text/css" rel="stylesheet" href="css/styles-2.css"/>  
        <!-- 
            PLEASE UPDATE THE FAVICON FFS
        -->
        <link rel="icon" type="image/png" href="assets/img/hack2015-favicon.png">
        <!-- 
            Looks like you've skipped editing the FAVICON....
        -->
        <!-- jquery. It's here because it wants to be here. It doesn't have to listen to what you want. -->
        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>                                      
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>    
        <style>
            p {
                font-size: 1em;
            }
        </style>
    </head>
    <!-- 
        Start of Body 
    -->
    <body class="">
        <!-- belowNav provides an effect for the nav bar-->        
        <!-- 
            NAVBAR 
        -->
        <nav class="white fixed nav" style="position: fixed; z-index: 99; padding-top: -2px; margin-top: -2px;">
            <div class="nav-wrapper nav">
                <!-- Left Part of the NavBar-->
                <div class="valign-wrapper pushleft-5p">
                    <a href="index.php">
                        <img src="assets/images/quiver-badge-only.png" class="valign moveLeft" style="width: 45px;">
                    </a>
                    <a href="index.php">
                        <h4 class="white-to-quiver valign pushleft-10p moveLeft" style="color: black;">
                            QUIVER
                        </h4>
                    </a>
                    <span class="right" style="position: absolute; right: 0px;">
                        <!-- Only visible when screensize is desktoplike or larger -->
                        <a href="#" data-activates="mobile-demo" class="button-collapse">
                            <i class="material-icons">
                                menu
                            </i>
                        </a>
                        <ul class="right hide-on-med-and-down" style="padding-right: 20px;">                            
                            <li class="moveLeft">
                                <a class="white-to-quiver " href="#">
                                    FAQ
                                </a>
                            </li>
                            <li class="moveLeft">
                                <a class="white-to-quiver " href="#">
                                    Requirements
                                </a>
                            </li>
                            <li>
                                <a id="submitBtn" href="mobile.html" class="quiver-green-text"
                                   style="border-radius: 40px; height: 35px; margin-top: 15px; line-height: 35px; color: white; background: #0a1b20;">
                                    Submit
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
                <!-- Only shown when screen size == mobile or similar-->                
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Requirements</a></li>
                    <li><a href="#">Submit</a></li>                
                </ul>
            </div>
        </nav>
        <!-- \NAVBAR -->        
        
        <!-- 
            MAIN CONTENT 
        -->            
        <!-- Title, Logo, and Description  -->
        <section class="" style="padding-top: 80px;">
            <div class="grey lighten-5">
                <!-- SPACE --> <div class="pushdown-5p"></div>
                <div class="">
                    <div class="container">
                        <div class="row">
                            <!-- Logo -->
                            <div class="col s12 m3">
                                <div class="center">
                                    <img class="image-proj-logo" src="assets/images/HIPSTER-BLUE.png">
                                </div>
                            </div>
                            <!-- Title and description -->
                            <div class="col s12 m9">
                                <div id="proj-title">
                                    <h2>
                                        <?php echo $project['name']; ?>
                                    </h2>
                                </div>
                                <!-- Team Members or Team Name-->
                                <div id="proj-team">
                                    <h5 class="green-text text-accent-3">
                                        <?php 
                                        $i = 0;
                                        foreach($project['team'] as $member) {
                                            if($i > 0 ) {
                                                echo ",";
                                            }
                                            echo $member['lName'];
                                            $i++;
                                        }?>
                                    </h5>
                                </div>
                                <div id="proj-abstract">
                                    <p>
                                        <?php echo $project['description'] 
                                                == null ? $project['abstract'] 
                                                : $project['description']; ?>
                                    </p>
                                </div>
                                <!-- Tags Area -->
                                <div class="">
                                    Tags:
                                    <div class="black-text">
                                        <?php foreach($project['tags'] as $tag) {?>
                                        <div class="chip">
                                            <?php echo $tag;?>
                                            <i class="material-icons">close</i>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- /Title and description -->                            
                        </div>
                    </div>
                </div>
                <!-- SPACE --> <div class="pushdown-5p"></div>
            </div>
        </section>
        <!-- /Title, Logo, and Description  -->
        <!-- Ratings -->
        <section>
            <div class="container">
                <!-- Score Breakdown -->
                <div id="score-breakdown" class="row">
                    <?php 
                    $crit = array(
                        "User Experience",
                        "Functionality",
                        "Creativity",
                        "Content/Impact"
                    );
                    $critDesc = array(
                        "Is the app easy to use?",
                        "Is the app true to its words?",
                        "Is the presentation good?",
                        " Is it worth using?"
                    );
                    for($i = 0; $i < 4; $i++) {?>
                    <div class="col s3">
                        <div class="card-panel grey-border center">
                            <h3 class="sf-300">
                                <?php echo $project['grades'][$i];?>
                            </h3>
                            <h5 class="amber-text text-darken-2 sf-300">
                                <?php echo $crit[$i];?>
                            </h5>
                            <p class="grey-text">
                                <i>
                                    <?php echo $critDesc[$i]; ?>
                                </i>
                            </p>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- Score aggregate -->
                <div class="row">
                    <div class="card green-border">
                        <div class="card-content">
                            <div class="row no-margin">
                                <!-- Final Score -->
                                <div class="col s12 m4 border-right-grey">
                                    <div class="center">
                                        <!-- -->
                                        <div class="card-panel white-border">
                                            <span>Grade Equivalent:</span>
                                            <h2 class="green-text text-accent-3 ">
                                                <?php echo getGrade($project['grade']);?>/4.0
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- Summary -->
                                <div class="col s12 m8">
                                    <p>
                                        <b>
                                            Summary:
                                            <br>
                                            <br>
                                        </b>
                                        <?php echo $project['review']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Ratings -->
        <section class="">
            <div>                
                <div class="container">
                    <!-- Main Project -->
                    <div class="row">
                        <!-- App Screens and Descriptions -->
                        <div class="col s12">
                            <div class="card whited-border">
                                <div class="card-image">
                                    <?php foreach($project['images'] as $image) {?>
                                    <img src="<?php echo $image;?>" class="image-fit-width">
                                    <?php }?>
                                    <div>
                                        
                                        <p class="image-caption">
                                            <i>
                                                This is a screenshot of the application
                                            </i>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-content"
                                     style="font-size: 1.2em; padding: 5% 8% 5% 8%;">
                                    <p>
                                    <?php echo $project['description'];?>
                                    </p>
                                </div>
                            </div>
                            <!-- /App screens and descriptions -->
                        </div>                        
                    </div>
                    <!-- /Main Project -->
                    <!-- Related -->
                    <div class="row hide-on-small-only">
                        <div class="row">
                            <h5 class="center sf-300 green-text text-accent-3">
                                SIMILAR PROJECTS
                            </h5>
                        </div>
                        <div class="col s3">
                            <div class="card green-border">
                                <div class="card-content">
                                    <h5 class="no-margin">
                                        Hoot
                                    </h5>
                                    <p class="sf-900 green-text text-accent-3">
                                        Mobile Application <br>
                                    </p>
                                    <p>
                                        Hoot is a mobile app that aims to  . . . 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card green-border">
                                <div class="card-content">
                                    <h5 class="no-margin">
                                        Generic Stealth Game
                                    </h5>
                                    <p class="sf-900 green-text text-accent-3">
                                        Web Game <br>
                                    </p>
                                    <p>
                                        GSG is a web game that aims to  . . . 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card green-border">
                                <div class="card-content">
                                    <h5 class="no-margin">
                                        Aye Captian
                                    </h5>
                                    <p class="sf-900 green-text text-accent-3">
                                        Desktop Game <br>
                                    </p>
                                    <p>
                                        AC is a desktop game that aims to  . . . 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card green-border">
                                <div class="card-content">
                                    <h5 class="no-margin">
                                        Streamr
                                    </h5>
                                    <p class="sf-900 green-text text-accent-3">
                                        Web Application <br>
                                    </p>
                                    <p>
                                        Streamr is a web application . . .
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- 
            FOOTER 
        -->
        <footer class="page-footer quiver-green no-margin">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="green-text text-accent-3">
                            Center for Complexity & Emerging Technologies
                        </h5>
                        <p class="grey-text text-lighten-4">
                            Developed by Laurenz Tolentino
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Ways to reach Laurenz</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/laurenztino">Facebook</a></li>
                            <li><a class="grey-text text-lighten-3" href="https://www.twitter.com/renztino">Twitter</a></li>
                            <li><a class="grey-text text-lighten-3" href="http://blog.laurenztino.xyz">Read the BLOG</a></li>
                            <li><a class="grey-text text-lighten-3" href="http://laurenztino.xyz">Personal Website</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Tolentino, Laurenz
                    <a class="grey-text text-lighten-4 right" href="http://laurenztino.xyz">laurenztino.xyz</a>
                </div>
            </div>
        </footer>
        <!-- 
            \FOOTER 
        -->
        
        <!-- 
            Script Start 
        -->
        <script type="text/javascript" src="js/materialize.js"></script>
        <script> 
            $(".button-collapse").sideNav();
        </script>
        <script type="text/javascript" src="js/laurenz.js"></script>
        <!-- Script for changing navbar color. I know it's primitive. -->
        <script>
            var a = $(".nav").offset().top + 200;

            $(document).scroll(function(){
                if($(this).scrollTop() > a)
                {   
                    $('.nav').css({"background":"rgb(10, 27, 32)"});
                    $('.white-to-quiver').css({"color":"white"});
                    $('#submitBtn').css({"color":"#0a1b20", "background":"#00e676"});
                    $('.moveLeft').css({"transform":"translate(0px,0px)", "transition":"transform 0.4s ease-in-out"});
                    
                } else {
                    $('.nav').css({"background":"white"});
                    $('.white-to-quiver').css({"color":"#0a1b20"});
                    $('#submitBtn').css({"color":"white", "background":"#0a1b20"});
                    $('.moveLeft').css({"transform":"translate(-30px,0px)"});
                }
            });
        </script>
        <script src="js/typed.js"></script>
        
        
    </body>
</html>