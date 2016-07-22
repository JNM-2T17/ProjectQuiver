<?php
/**
 * view-pending-projects.php
 * @author Angela Acorda
 * @20160705
 */
require_once "includes/security-functions.php";

$auth = checkAuth("judgeProject");
if( $auth === FALSE ) {
  header("Location: login.php");
} else if( $auth === 0 ) {
  header("Location: login.php");
}

require_once "includes/project-functions.php";
require_once "commons/admin-header.php";
$projects = proj_get_pending();

?>
    <div class = "container" style="padding-top: 80px;">
    <div class = "col s12 m12 l12">
    <h1>Pending Projects</h1>
    <?php if(count($projects) > 0 ) {?>
    <table id="pending-table" class = "bordered highlight responsive-table">
        <thead>
          <tr>
            <th data-field="projectName">Project Name</th>
            <th data-field="projectName">Project Members</th>
            <th data-field="projectStatus">Type</th>
              <th data-field="link"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($projects as $proj) { ?>
          <tr>
            <td><?php echo $proj['name'];?></td>
            <td>
            <?php 
            	$i = 0;
            	foreach($proj['team'] as $member) {
            		if( $i > 0 ) {
            			echo "<br/>";
            		}
            		echo "$member[fName] $member[lName]";
            		$i++;
            	}
            ?>
            	
            </td>
              <td><?php echo $proj['class']; ?></td>
              <td><a id="judge-button" href="judge-project.php?id=<?php echo $proj['id']?>"> Judge </a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php } else { ?>
      <h6>No projects to display</h6>
      <?php }?>
    </div>
  </div>
<?php require_once "commons/footer.php"; ?>
