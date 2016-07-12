<?php
/**
 * view-pending-projects.php
 * @author Angela Acorda
 * @20160705
 */
require_once "includes/security-functions.php";

$auth = checkAuth("createUser");
if( $auth === FALSE ) {
  header("Location: login.php");
} else if( $auth === 0 ) {
  header("Location: ./");
}

require_once "includes/project-functions.php";
require_once "commons/admin-header.php";
$projects = proj_get_pending();

?>

<!DOCTYPE html>
<html>

		<!-- belowNav provides an effect for the nav bar-->
		<?php require_once "commons/admin-header.php";?>

    <div class ="row add-user-form-container">
  <h1> Create Account </h1>
  <!-- <form action = "includes/controller.php" method= "post" enctype="multipart/form-data"> -->
  <input type="hidden" name='request' value="addProject"/>

  <!-- User Information -->
  <h6>
    User Information
  </h6>
  <div class = "row">
    <div class="input-field col s6">
      <input placeholder="First Name" id="firstName" type="text" class="validate">
      <input placeholder="Last Name" id="lastName" type="text" class="validate">
      <input placeholder="Email Address" id="emailAdd" type="text" class="validate">
    </div>
  </div>

  <!-- User Password -->
  <h6>
    Password
  </h6>
  <div class="row">
    <div class="input-field col s6">
      <input placeholder="Password" name = "userPassword" name="userPassword" type="password" id="accountPass"></input>
    </div>
  </div>

  <!-- Account Type -->
  <h6>
    Account Type
  </h6>

  <div class="row">
      <input name="group1" type="radio" class="with-gap"id="faculty" checked/>
      <label for="faculty" style="margin-right: 20px;">Faculty</label>
      <input name="group1" type="radio" class="with-gap" id="admin"/>
      <label for="admin">Admin</label>
  </div>
  <!-- Submit Button -->
  <div class="row">
    <div class="input-field col s6">
      <button class="btn green accent-3" type="submit" name="action" id = "create-account">Create Account</button>
    </div>
  </div>
</div>

<div id="confirm-password-overlay">
  <div id="confirm-password-box">
    <h4>Enter password before proceeding</h4>
    <input placeholder="Password" name = "userPassword" id="password" name="userPassword" type="password" id="accountPass"></input>
    <button class="btn green accent-3" type="submit" name="action" id = "create-account">Proceed</button>
  </div>
</div>
<script src="js/createAccount.js"></script>
<?php require_once "commons/footer.php"; ?>
