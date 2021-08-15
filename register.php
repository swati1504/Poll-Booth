<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);
}

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 4){
    $password_err = "Password cannot be less than 4 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
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
    <h2 style="font-family:candara;";class="text-warning text-center pt-5">REGISTER</h2>
    
    <label>
      <input type="text" class="input" name="name" placeholder="ENTER NAME"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

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

    <label>
      <input type="password" class="input" name="confirm_password" placeholder="CONFIRM PASSWORD"/>
      <div class="line-box">
        <div class="line"></div>
      </div>
    </label>

    <button type="submit">Register</button>
  </form>
</div>
 </body>
</html>