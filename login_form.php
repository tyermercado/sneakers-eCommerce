<?php
if (!isset($_SESSION)){
  session_start();
}


$host = 'localhost';
$username = "root";
$password = "";
$db = "users_db";
$con = new mysqli($host, $username, $password, $db);

if($con->connect_error){
  echo $con->connect_error;
}


if(isset($_POST['login'])){

  $user = $_POST['username'];
  $pw = $_POST['password'];


  $insert = "SELECT * FROM tbl_users WHERE Username = '$user' AND Password = '$pw'";
  $user = $con->query($insert) or die ($con->error);
  $row = $user->fetch_assoc();
  $total = $user->num_rows;

  if($total > 0){
  $_SESSION['USERLOGIN'] = $row['Username'];
  $_SESSION['ACCESS'] = $row['Password'];
  echo header("Location: index_user.html");
  }else{
      echo '<script>alert("Incorrect username or password.")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <!-- Link to CSS-->
    <link rel="stylesheet" href="./css/login_form.css">
  </head>
  <body>
<!-- Login Form -->
    <div class="center">
      <h1>Login</h1>
      <form method="post" action="#">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="checkbox" class="signup_link">
          Remember me on this computer? 
        <input href="products_already_login.html" type="submit" value="Login" name="login">
        <div class="signup_link">
          Not yet registered? <a href="register.php">Register</a>
        </div>
      </form>
    </div>  

  </body>
</html>
