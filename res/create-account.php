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

    <input id="status" type="hidden" value="<?php echo isset($_GET['status']) ? $_GET['status'] : "";?>"/>
    <div class ="row add-user-form-container">
  <h1> Create Account </h1>
  <form action="includes/controller.php" method="POST" id="createAccountForm" onsubmit="return createAccount.checkSubmit();">
  <input type="hidden" name="token" value="<?php echo $_SESSION['pqSessionToken']; ?>"/>
  <input type="hidden" name='request' value="createUser"/>

  <!-- User Information -->
  <h6>
    User Information
  </h6>
  <div class = "row">
    <div class="input-field col s6">
      <input placeholder="First Name" id="firstName" name="firstName" type="text" class="validate">
      <input placeholder="Last Name" id="lastName" name="lastName" type="text" class="validate">
      <input placeholder="Email Address" id="emailAdd" name="emailAdd" type="text" class="validate">
    </div>
  </div>

  <!-- User Password -->
  <h6>
    Password
  </h6>
  <div class="row">
    <div class="input-field col s6">
      <input placeholder="Password" name="userPassword" type="password" id="accountPass"/>
      <input placeholder="Confirm Password" name="confirmPassword" type="password" id="confirmPass"/>
    </div>
  </div>

  <!-- Account Type -->
  <h6>
    Account Type
  </h6>

  <div class="row">
      <input name="accountType" value="2" type="radio" class="with-gap" id="faculty" checked/>
      <label for="faculty" style="margin-right: 20px;">Faculty</label>
      <input name="accountType" value="1" type="radio" class="with-gap" id="admin"/>
      <label for="admin">Admin</label>
  </div>
  <!-- Submit Button -->
  <div class="row">
    <div class="input-field col s6">
      <input class="btn green accent-3" type="submit" name="action" id = "create-account" value="Create Account" />
    </div>
  </div>
</div>

<div id="confirm-password-overlay"></div>
<div id="confirm-password-box">
  <h4>Confirm password to continue</h4>
  <input placeholder="Password" name = "userPassword" id="adminPassword" name="adminPassword" type="password" id="adminPassword"/>
  <button class="btn green accent-3" type="submit" name="action" id = "authPassConfirm">Confirm</button>
</div>
<script src="js/createAccount.js"></script>
<?php require_once "commons/footer.php"; ?>
