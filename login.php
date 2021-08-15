<?php
//This script will handle login
session_start();

// check if the user is already logged in
//if(isset($_SESSION['username']))
// {
//     header("location: welcome.php");
//     exit;
// }
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
							
                            //Redirect user to welcome page
							if($username == 'nitt123'){
								$_SESSION["usertype"] = 'Admin';
								header("location: admindashboard.php");
							}else{
								$_SESSION["usertype"] = 'User';
								header("location: welcome.php");
							}
                        }
                    }

                }

    }
}    


}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    h1 {text-align: center;}
    </style>
</head>
<body>
<h1 style="color:white;">DELTA T-SHIRT DESIGN</h1>
<img src="DeltaLogo.png" alt="DeltaLogo" width="150px" height="150px">
<div>
  
  <form action="" method="post">
    <h2 style="font-family:candara;";class="text-warning text-center pt-5">LOGIN</h2>


    <label>
        <input type="text" class="input" name="username" placeholder="ENTER USERNAME"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <label>
        <input type="password" class="input" name="password" placeholder="ENTER PASSWORD"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>


    <button type="submit">Login</button>
  </form>
</div>
 </body>
</html>