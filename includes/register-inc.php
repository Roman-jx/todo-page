<?php
if(isset($_POST['submit'])){
  //Add DB connection
  require 'database.php';
  //Add inputs
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPass = $_POST['confirmPassword'];
  //Check if the user has filled in all the fields
  if (empty($username) || empty($password) || empty($confirmPass)){
    header("Location: ../project/register.php?error=emptyfields&username=".$username);
    exit();
  } elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
    header("Location: ../project/register.php?error=invalidusername&username=".$username);
    exit();
  } elseif ($password !== $confirmPass) {
    header("Location: ../project/register.php?error=passwordsdonotmatch&username=".$username);
    exit();
  } else {
    //If user already connect to DB
    $sql = "SELECT username FROM username WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../project/register.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $rowCount = mysqli_stmt_num_rows($stmt);
      //If we already have user name
      if ($rowCount > 0) {
        header("Location: ../project/register.php?error=usernametaken");
        exit();
      } else {
        //Add new user
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../project/register.php?error=sqlerror");
          exit();
        } else {
          //At log in will compare the hash of the password
          $hashed = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss", $username, $hashed);
          mysqli_stmt_execute($stmt);
          header("Location: ../project/register.php?succes=registered");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
?>