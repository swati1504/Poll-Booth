<?php
//This script will handle login
session_start();
if($_SESSION["usertype"] != 'Admin'){
	header("location: login.php");
}
include "adminheader.php";
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	//print_r($_POST);
	$qid=$_POST['question'];

	if($qid)
	{
		$pollid = $qid;
		$sql = "update pollmaster set pollstatus = 'Closed', pollend = NOW() where id =". $pollid;
		$result = $conn->query($sql);

		if ($result){
			echo "Saved Successfull";
		}
		else{
			echo "Something went wrong... cannot redirect!";
		}
		//$conn->close();
	}
	
}

?>

<div style="color: white">
	<div class="col-xs-12">
	<?php
		$sql = "SELECT * FROM pollmaster where pollstatus = 'Active'";
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
			
			<button type="submit" style="height:50px; width:150px;">Close Poll</button>
			</form>
			</div>

			<?php
			$sl= $sl +1;
		  }
		} else {
		  echo "Nothing to Close ";
		}
		$conn->close();
	?>

</div>
	</div>


</body>
</html>