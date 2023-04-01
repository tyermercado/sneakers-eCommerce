<?php

$host = 'localhost';
$username = "root";
$password = "";
$db = "users_db";

$con = new mysqli($host, $username, $password, $db);

if($con->connect_error){
    echo $con->connect_error;
}


if(isset($_POST['submit'])){

    $uname = $_POST['username'];
    $pw = $_POST['password'];
    $cpw = $_POST['conpassword'];
    $email = $_POST['emailadd'];

    if ($_POST['password'] !== $_POST['conpassword']) {
     echo '<script>alert("Your password and confirm password must match.")</script>';
     }else{
             $insert = "INSERT INTO tbl_users(Username, Password, Confirm_Password, Email) VALUES
            ('$uname', '$pw', '$cpw', '$email')";
                echo '<script>alert("Registered!")</script>';
                $con->query($insert) or die ($con->error);
    }

    // Check if the username is already exists
    if(isset($_POST['submit'])){

      $select = mysqli_query($con, "SELECT * FROM tbl_users WHERE Username = '".$_POST['username']."'");
      if(mysqli_num_rows($select)) {
        echo '<script>alert("Username already exists!")</script>';
        die("<script>window.location = 'register.php';</script>");
      }
    }

    // Check if the emailadd is already exists
    if(isset($_POST['submit'])){
    
      $select = mysqli_query($con, "SELECT * FROM tbl_users WHERE Email = '".$_POST['emailadd']."'");
      if(mysqli_num_rows($select)) {
        echo '<script>alert("Email address already exists!")</script>';
        die("<script>window.location = 'register.php';</script>");
      }
    }


}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./css/register.css">
  </head>
  <body>
    <div class="center">
      <h1>Registration Form</h1>
      <form method="post">
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
        <div class="txt_field">
          <input type="password" name="conpassword" required>
          <span></span>
          <label>Confirm Password</label>
        </div>  
        <div class="txt_field">
          <input type="email" name="emailadd" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="signup_link">
          Already registered? <a href="login_form.php">Click here</a>
        </div>
        <input type="submit" name="submit" value="Register">
        <input type="reset" name="reset" value="Clear">
      </form>
    </div>  

  </body>
</html>
