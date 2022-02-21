<?php
require_once ".../includes/header.php";
?>
<div>
  <h1>Log in</h1>
  <p>No account? <a href="register.php">Register here</a></p>
  <form action="includes/login-inc.php" method="post">
    <input type="text" name="username" placeholder="Your username...">
    <input type="password" name="password" placeholder="Your password...">
    <button type="submit" name="submit">Log in</button>
  </form>
</div>
<?php
require_once "../includes/footer.php";
?>