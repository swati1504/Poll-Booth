<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
	body{
		margin: 20px;
	}
    h1 {text-align: center;color: white;}
    h2 {text-align: center;color: black;}
    div {text-align: center;}
	.dasmsg{
		float:left;
		width: 25%;
		height: 300px;
		background: white;
		margin: 20px;
		border: 5px grey;
		padding: 10px;
	}
	@media only screen and (max-width: 960px) {
	  .col-xs-12 {
		display: flex;
		flex-direction: column-reverse;
	  }
	  .dasmsg{
		float:left;
		width: 90%;
		height: 300px;
		background: yellow;
		margin: 20px;
	  }
	}
	.center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	}
    </style>
</head>
<body style="background-color: black;">
<h1 style="color:white;">Welcome <?php echo $_SESSION["username"] ?> as Admin</h1>
<img src="DeltaLogo.png" alt="DeltaLogo" width="150px" height="150px">
<h1>
	<?php
		$str = $_SERVER['REQUEST_URI'];
 
		if (strpos($str, 'admindashboard') == false) {
		?>
			<button type="button" style="height:50px; width:150px;" onClick="window.location = './admindashboard.php'"> Go to Dashboard </button>
		<?php
			
		}else{
		?>
			<button type="button" style="height:50px; width:150px;" onClick="window.location = './login.php'"> logout </button>
		<?php
		}
	?>
	
	
</h1>
