<?php
/**
 * judge-project.php
 * @author Angela Acorda
 * @20160705
 */
require_once "includes/security-functions.php";

$auth = checkAuth("judgeProject");
if( $auth === FALSE ) {
  header("Location: login.php");
} else if( $auth === 0 ) {
  header("Location: index.php");
}

$user = usr_get($_SESSION['session_user']);
require_once "includes/project-functions.php";
if( !isset($_GET['id'])) {
    header("Location: index.php");
}

$project = proj_get($_GET['id']);
if( $project['forJudging'] == 0 ) {
    header("Location: index.php");   
}
require_once "commons/admin-header.php";
?>
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
                <div class="row">
                  <div class = "review-box">
                    <div class="card green-border">
                        <div class="card-content">
                            <div class="row no-margin">
                                <!-- Final Score -->

                                <!-- Summary -->
                                    <div class="review-form">
                                      <p>
                                          <b>
                                              Review
                                          </b>
                                          by <span class="judge"><?php echo $user['fName']." ".$user['lName'];?></span>
                                      </p>
                                      <form action="includes/controller.php" method="POST" onSubmit="return checkForm();">
                                      <input type="hidden" name="request" value="reviewProject"/>
                                      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                                      <textarea id="review" placeholder="Write your review here" name="review"></textarea>
                                      <input class="btn green accent-3" type="submit" name="action" id = "submit"/>
                                      </form>
                                    </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/judge-project.js"></script>
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
                                    <img src="../<?php echo $image;?>" class="image-fit-width">
                                    <?php }?>
                                    <!-- <div>

                                        <p class="image-caption">
                                            <i>
                                                This is a screenshot of the application
                                            </i>
                                        </p>
                                    </div> -->
                                </div>
                                
                            </div>
                            <!-- /App screens and descriptions -->
                        </div>
                    </div>
                    <!-- /Main Project -->
                    <!-- Related -->
                    <!-- <div class="row hide-on-small-only">
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

                    </div> -->
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
