<?php
//This script will handle login
session_start();
if($_SESSION["usertype"] != 'Admin'){
	header("location: login.php");
}
include "adminheader.php";

require_once "config.php";



if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
	{
		$q = $_POST['question'];
		$o1 = $_POST['opt1'];
		$o2 = $_POST['opt2'];
		$o3 = $_POST['opt3'];
		$o4 = $_POST['opt4'];

		$sql = "INSERT INTO pollmaster (polldet, opt1,opt2,opt3,opt4, pollstatus) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($conn, $sql);
		if ($stmt)
		{
			mysqli_stmt_bind_param($stmt, "ssssss", $p_q, $p_o1, $p_o2, $p_o3, $p_o4, $p_s);

			// Set these parameters
			$p_q = $q;
			$p_o1 = $o1;
			$p_o2 = $o2;
			$p_o3 = $o3;
			$p_o4 = $o4;
			$p_s = 'Active';

			// Try to execute the query
			if (mysqli_stmt_execute($stmt))
			{
				echo "Saved Successfull";
			}
			else{
				echo "Something went wrong... cannot redirect!";
			}
		}
		mysqli_stmt_close($stmt);
	}
	mysqli_close($conn);
}

?>



<h2> Create a Poll </h2>
<div>
	<form action="" method="post">

    <label>
        <input type="text" class="input" name="question" placeholder="Enter Question"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <label>
        <input type="text" class="input" name="opt1" placeholder="Enter Option 1"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

	<label>
        <input type="text" class="input" name="opt2" placeholder="Enter Option 2"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

	<label>
        <input type="text" class="input" name="opt3" placeholder="Enter Option 3"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

	<label>
        <input type="text" class="input" name="opt4" placeholder="Enter Option 4"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>


    <button type="submit">Save</button>
	<button type="button" onClick="window.location = './admindashboard.php'"> Go to Dashboard </button>
  </form>
</div>





</body>
</html>
