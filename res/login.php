<?php
/**
 * login.php
 * @author Angelo Amadora
 * @20160303
 */
session_start();
require_once "user-functions.php";

if( isset($_SESSION['session_user'])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/materialize.min.css">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script src="js/materialize.min.js"></script>

</head>

<body background="assets/images/login_background.jpg">

  <div class="row">
    <form action="includes/controller.php" method="post" onsubmit="">
      <input type="hidden" name="request" value="login">
      <div class="col s10 m4 offset-m4 offset-s1 " style="margin-top: 10%;">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Login</span>

            <div class="row">
              <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
              <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
          </div>
          <input class="card-action center-align" type="submit" value="Login" />
          </div>
        </div>
      </div>
    </form>
  </div>

</body>

</html>
