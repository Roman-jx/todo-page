<?php
require_once "../includes/header.php";
?>
<div>
  <h1>Register</h1>
  <p>Already have an account? <a href="login.php">Log in</a></p>
  <form action="includes/register-inc.php" method="post">
    <input type="text" name="username" placeholder="Your username...">
    <input type="password" name="password" placeholder="Your password...">
    <input type="password" name="confirmPassword" placeholder="Confirm password...">
    <button type="submit" name="submit">Register</button>
  </form>
</div>
<?php
require_once "../includes/footer.php";
?>