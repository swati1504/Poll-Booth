<?php
//This script will handle login
session_start();
if($_SESSION["usertype"] != 'User'){
	header("location: login.php");
}
include "userheader.php";
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	//print_r($_POST);
	$qid=$_POST['question'];

	if($qid)
	{
		$uid = $_SESSION["id"];
		$pollid = $qid;
		$resp = $_POST['opt'.$qid];

		$sql = "INSERT INTO votings (userid,polldetid,response) VALUES (?, ?, ?)";
		$stmt = mysqli_prepare($conn, $sql);
		if ($stmt)
		{
			mysqli_stmt_bind_param($stmt, "iii", $p1,$p2,$p3);

			// Set these parameters
			$p1 = $uid;
			$p2 = $pollid;
			$p3 = $resp;
			

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
	//mysqli_close($conn);
}

?>

	<div style="color: white">
	<div class="col-xs-12">
	<?php
		$sql = "SELECT * FROM pollmaster where pollstatus = 'Active' and id NOT IN (Select polldetid as id from votings WHERE userid = " . $_SESSION['id'] . ")";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  $sl = 1;
		  while($row = $result->fetch_assoc()) {
			?>
			<div class="dasmsg" style="text-align: left;color: black;">
			<form action="" method="post">
			<label>
				<h2><?php echo $row["polldet"] ?></h2>
				<input type="hidden" name="question" value="<?php echo $row['id']?>"/>
				<div class="line-box">
				  <div class="line"></div>
				</div>
			</label>
			
			<label>
				<input type="radio" class="input" name="opt<?php echo $row['id'] ?>" value="1"> <?php echo $row["opt1"] ?> </input>
				<div class="line-box">
				  <div class="line"></div>
				</div>
			</label>

			<label>
				<input type="radio" class="input" name="opt<?php echo $row['id'] ?>"  value="2"> <?php echo $row["opt2"] ?> </input>
				<div class="line-box">
				  <div class="line"></div>
				</div>
			</label>

			<label>
				<input type="radio" class="input" name="opt<?php echo $row['id'] ?>"  value="3"> <?php echo $row["opt3"] ?> </input>
				<div class="line-box">
				  <div class="line"></div>
				</div>
			</label>

			<label>
				<input type="radio" class="input" name="opt<?php echo $row['id'] ?>"  value="4"> <?php echo $row["opt4"] ?> </input>
				<div class="line-box">
				  <div class="line"></div>
				</div>
			</label>
			<button type="submit" style="height:50px; width:150px;">Save</button>
			</form>
			</div>

			<?php
			$sl= $sl +1;
		  }
		} else {
		  echo "You have already voted";
		}
		$conn->close();
	?>

	</div>
	</div>






</body>
</html>
