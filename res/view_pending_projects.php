<?php
/**
 * login.php
 * @author Angela Acorda
 * @20160303
 */
require_once "includes/security-functions.php";

$auth = checkAuth("judgeProject");
if( $auth === FALSE ) {
  header("Location: login.php");
} else if( $auth === 0 ) {
  header("Location: index.php");
}

require_once "includes/project-functions.php";

$projects = proj_get_pending();

?>
<!DOCTYPE html>
<html>
  <head>

    <title>Pending Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script src="js/materialize.min.js"></script>

  </head>
  <body>
    <nav class=" fixed nav" style="position: fixed; z-index: 99; padding-top: -2px; margin-top: -2px; background:rgb(10, 27, 32);">
        <div class="nav-wrapper nav">
            <!-- Left Part of the NavBar-->
            <div class="valign-wrapper pushleft-5p " style=" transform:translate(30px,0px);">
                <a href="index.php">
                    <img src="assets/images/quiver-badge-only.png" class="valign moveLeft" style="width: 45px;">
                </a>
                <a href="index.php">
                    <h4 class="white-to-quiver valign pushleft-10p moveLeft" style=" color:white;">
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

                </span>

    </nav>
    <div class = "container" style="padding-top: 80px;">
    <div class = "col s12 m12 l12">
    <h1>Pending Projects</h1>
    <table  class = "bordered highlight responsive-table">
        <thead>
          <tr>
              <th data-field="projectName">Project Name</th>
              <th data-field="projectStatus">Type</th>
              <th data-field="link">Link</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($projects as $proj) { ?>
          <tr>
            <td><?php echo $proj['name'];?></td>
              <td><?php echo $proj['class']; ?></td>
              <td><a  href="review_project?id=<?php echo $proj['id']?>"> Judge </a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>
