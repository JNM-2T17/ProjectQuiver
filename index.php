<?php
    /**
     * Developed and designed by: Laurenz T.
     * email me @: laurenz@outlook.ph
     * COLLEGE OF COMPUTER STUDIES
     * COMPUTER SCIENCE - SOFTWARE TECHNOLOGY
     * "Ang pusong nabiyak, madalas naninindak" #uselessQuotesNgBagongTaon #2016
     */

    require_once "includes/project-functions.php";
    $projects = proj_get_best();
    // print_r($projects);
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
                        <!-- Description and animated text -->
                        <div>
                            <!-- header with typed js -->
                            <div class="row">
                                <!-- SPACE --><div class="pushdown-10p"></div>
                                <div class="col s12">
                                    <h1 class="quiver-green-text">
                                        Awarding those who go <br>
                                        beyond
                                        <!-- Typed js content goes here -->
                                        <span class="element green-text text-accent-3"></span>
                                    </h1>
                                </div>
                            </div>
                            <!-- quick summary -->
                            <div class="row">
                                <div class="col s12 m8">
                                    <p>
                                        Quiver wants to recognize the talent and hardwork behind Machine Projects (MPs) that go beyond expectations. Quiver is a platform to showcase the projects that stands out from the rest of the pack made by students who gave more than 100% in order to create a compelling work.
                                    </p>
                                </div>
                            </div>
                            <!-- button for staging site -->
                            <div class="row">
                                <a href="stage.php" class="btn btn-border-only green-text text-accent-3">
                                    Read more what Quiver is about here
                                </a>
                            </div>
                        </div>
                        <!-- SPACE --><div class="pushdown-10p"></div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Another one - DJ Khaled -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- Card with image. -->
                    <div class="col s12 m6">
                        <div class="card green-border image-bg-ad"
                             style="padding-top: 40px; padding-bottom: 40px; height: 573px">
                            <div class="card-content">
                                <h2 class="white-text sf-800">
                                    See how students solve modern day problems using technology.
                                </h2>
                                <p class="white-text">
                                    Check out the best of the pack through the projects on the right or browse some more
                                    using the button below.
                                </p>
                            </div>
                            <!-- Button Area -->
                            <div class="card-action bottom" style="padding-bottom: 0;">
                                <div class="row" >
                                    <div class="row">
                                        <div class="col s6">
                                            <a href="sample-list.php">
                                                <p class="btn green-border green accent-3 right">
                                                    Best of the term
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col s6">
                                            <a href="sample-list.php">
                                                <p class="btn green-border green accent-3" style="margin-right: 20px;">
                                                    Notable Projects
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Card with image. -->
                    <div class="col s12 m6">
                        <div class="card green-border image-bg-featured"
                             style="height: 573px;">
                            <div class="card-content">
                                <!-- Title -->
                                <div class="">
                                    <p class="btn white-border transparent white-text text-accent-3"
                                       style="width: 50%;">
                                        Featured Project:
                                    </p>
                                    <?php $feat = $projects[0]; ?>
                                    <h1 class="">
                                        <?php echo $feat['name']; ?>
                                    </h1>
                                </div>
                                <!-- Description -->
                                <p style="font-size: 1.1em;">
                                <?php echo $feat['abstract']; ?>
                                </p>
                            </div>
                            <div class="card-action bottom center">
                                <a href="sample-proj.php?id=<?php echo $feat['id']; ?>">
                                    <p class="btn white-border white green-text text-accent-3"
                                       style="width: 50%; ">
                                        see full details
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Examples -->
        <section>
            <div class="center">
                SEE SOME MORE EXAMPLES HERE
            </div>
            <div class="container">
                <div class="row">
                    <?php for($i = 0; $i < 3; $i++) {?>
                    <div class="col s12 m4">

                        <div class="card white app-card-plain"
                            onclick="window.location='judge-project.php?id=<?php echo $projects[$i]['id'];?>'">
                            <div class="card-content">
                                <h4 class="green-text text-accent-3">
                                    <?php echo $projects[$i]['name'];?>
                                </h4>
                                <h5>
                                    <?php echo $projects[$i]['class']; ?>
                                </h5>
                                <!-- Short summary of what the app is about. Has an overflow effect when text is too long-->
                                <div class="short-desc">
                                    <p style="width: 95%;">
                                        <?php echo $projects[$i]['abstract'];?>
                                    </p>
                                    <!-- overflow effect --><div class="overflow-white"></div>
                                </div>
                            </div>
                            <div class="card-action score-in-card center">
                                <span>
                                    Score in Category:
                                </span>
                                <!-- Scores -->
                                <h1 class="sf-200 center green-text text-accent-3 no-margin">
                                    <?php echo getGrade($projects[$i]['grade']); ?>/4.0
                                </h1>
                                <?php foreach($projects[$i]['recogs'] as $recog) {?>
                                <div class="cat mobile">
                                    <?php echo $recog; ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- / -->
                </div>
            </div>
            <!-- See more part -->
            <div class="row">
                <div class="center">
                    <a class="btn green-border white green-text text-accent-3"
                       href="sample-list.php">
                        - - - See More - - -
                    </a>
                </div>
            </div>
        </section>
        <!-- /Examples -->
        <!-- break --><center><div class="hr-green" style="width: 80%;"></div></center>
        <!-- Random Ad -->
        <section>
            <div class="container" style="width: 85%;">
                <div class="row">
                    <div class="col s12 m6">
                        <h3 class="sf-400">
                            Discover the best works in CCS made by students.
                        </h3>
                        <p>
                            Looking for ideas, inspiration, or just curious?
                            Quiver contains a bunch of what the College of Computer Studies has to offer.
                            Every project shown here has been hand built by the students.
                        </p>
                    </div>
                    <div class="col s12 m4 right">
                        <!-- SPACE --> <div class="pushdown-5p hide-on-small-only"></div> <div class="pushdown-2p"></div>
                        <div class="card green accent-3 green-border">
                            <div class="card-content">
                                <div class="center">
                                    <h5 class="sf-300 white-text">
                                        Interested in recommending projects for Quiver?
                                    </h5>
                                    <a href="#" class="btn white-border dashed green accent-3">
                                        contact us here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--
            BELOW THE FOLD
        -->

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
