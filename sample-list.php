<?php
    /**
     * Developed and designed by: Laurenz T.
     * email me @: laurenz@outlook.ph
     * COLLEGE OF COMPUTER STUDIES
     * COMPUTER SCIENCE - SOFTWARE TECHNOLOGY
     * "Ang pusong nabiyak, madalas naninindak" #uselessQuotesNgBagongTaon #2016
     */
    require_once "includes/project-functions.php";

    $projects = proj_get_all();
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
                                <a id="submitBtn" href="mobile.php" class="quiver-green-text"
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
        <!-- ABOVE THE FOLD -->
        <section id="Above-The-Fold">            
            <div class="windowheight">
                <div style="padding-top: 80px;">                
                    <div class="container">
                        <!-- SPACE --> <div class="pushdown-5p"></div>
                        <!-- Title of the list -->
                        <div>
                            <h1>
                                Mobile Applications
                            </h1>
                            <p>
                                This list contains a handpicked selection of projects from CCS. Includes projects from MOBICOM, MOBAPDE, GAMEDEV, GAMEDES, DGDL, Net-Centric/COMET, CeHCI, and independent personal projects.
                            </p>
                        </div>
                        <!-- SPACE --> <div class="pushdown-5p"></div>
                        <!-- /Title of the list -->
                        <?php $i = 0;
                        $count = count($projects);
                        if($count == 0 ) {?>
                            <h3>No Projects</h3>
                        <?php } else {
                        while($i < $count) {?>
                        <!-- first row -->
                        <div class="row">
                        <?php
                            $j = 0;
                            while($j < 3 && $i < $count) {
                                $project = $projects[$i];
                        ?>
                            <!-- FIRST APP -->
                            <div class="col s12 m4">

                                <div class="card white app-card-plain" onclick="window.location='sample-proj.php?id=<?php echo $project['id'];?>'">
                                    <div class="card-content">
                                        <h4 class="green-text text-accent-3">
                                            <?php echo htmlspecialchars($project['name']);?>
                                        </h4>
                                        <h5>
                                            <?php echo htmlspecialchars($project['class']);?>
                                        </h5>
                                        <!-- Short summary of what the app is about. Has an overflow effect when text is too long-->
                                        <div class="short-desc">
                                            <?php echo htmlspecialchars($project['description']) 
                                                == null ? htmlspecialchars($project['abstract']) 
                                                : htmlspecialchars($project['description']); ?>
                                            <!-- overflow effect --><div class="overflow-white"></div>
                                        </div>
                                    </div>                            
                                    <!--<div class="card-action score-in-card center">
                                        <span>
                                            Score in Category:
                                        </span>
                                        Scores
                                        <h1 class="sf-200 center green-text text-accent-3 no-margin"> -->
                                            <?php //echo getGrade($project['grade']);?><!-- /4.0 -->
                                        <!-- </h1> -->
                                        <?php //if( count($project['recogs']) > 0 ) {
                                            //foreach($project['recogs'] as $recog) {?>
                                        <!-- <div class="cat mobile"> -->
                                            <?php //echo $recog;?>
                                        <!-- </div> -->
                                        <?php //}} ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                        <?php
                            $j++;
                            $i++; 
                            }?>
                        </div>
                        <?php }}?>
                        <!-- /first row -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /ABOVE THE FOLD -->
        <!-- 
            \MAIN CONTENT 
        -->
        <!-- Random Section -->
        <section class="green accent-3">
            <!--SPACE--><div class="pushdown-2p"></div>
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="green-text text-accent-2 sf-300">
                            Honoring the best works in CCS. <br>
                            Awarding those who go beyond the specs.
                        </h4>
                    </div>
                </div>
            </div>
            <!--SPACE--><div class="pushdown-1p"></div>
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
        
        <script>            
          $(function(){
              $(".element").typed({                
                  strings: ["the norm.", "tradition.", "the specs.", "laziness.", "expectations.", "the typical."],
                  typeSpeed: 30,
                  loop: true,
                  showCursor: false,
                  backDelay: 800
              });
          });
        </script>  
    </body>
</html>










