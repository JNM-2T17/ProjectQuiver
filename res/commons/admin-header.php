<?php
/**
 *
 */
require_once "includes/user-functions.php";
$usr = usr_get_session();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiver</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <!-- Compiled and minified CSS -->
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="css/styles-2.css">

<!-- Compiled and minified JavaScript -->
<script src="js/materialize.min.js"></script>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>


</head>
<body>
  <div id="alert-overlay">
    <div id="alert-container">
      <h4>Oops!</h4>
      <p id="alert-text">
        There is an error.
      </p>
    </div>
  </div>

<!--
    NAVBAR
-->
<nav class="white fixed nav" style="position: fixed; z-index: 99; padding-top: -2px; margin-top: -2px;">
    <div class="nav-wrapper nav">
        <!-- Left Part of the NavBar-->
        <div class="valign-wrapper pushleft-5p">
            <a href="index.html">
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
                    <?php if($usr['addProject'] === 1 ) {?>
                    <li class="moveLeft">
                        <a class="white-to-quiver " href="add-project.php">
                            Add Project
                        </a>
                    </li>
                    <?php } 
                    if($usr['judgeProject'] === 1 ) { ?>
                    <li class="moveLeft">
                        <a class="white-to-quiver " href=".">
                            Judge Projects
                        </a>
                    </li>
                    <?php } 
                    if($usr['createUser'] === 1 ) { ?>
                    <li class="moveLeft">
                        <a class="white-to-quiver " href="create-account.php">
                            Create Account
                        </a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="includes/controller.php?request=logout" class="quiver-green-text">
                            Log Out
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
