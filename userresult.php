<?php
//This script will handle login
session_start();
if($_SESSION["usertype"] != 'User'){
	header("location: login.php");
}
include "userheader.php";
require_once "config.php";

?>

<div style="color: white">
	
	<?php
		$sql = "SELECT b.polldet, c.username, CASE WHEN a.response = 1 THEN b.opt1 ELSE '' END as useropt1, CASE WHEN a.response = 2 THEN b.opt2 ELSE '' END as useropt2, CASE WHEN a.response = 3 THEN b.opt3 ELSE '' END as useropt3, CASE WHEN a.response = 4 THEN b.opt4 ELSE '' END as useropt4 FROM `votings` a INNER JOIN pollmaster b on a.polldetid = b.id INNER JOIN users c on a.userid = c.id WHERE b.pollstatus = 'Closed' AND a.userid =" . $_SESSION["id"] . " ORDER BY b.polldet, c.username";
		//$sql = "SELECT b.polldet, c.username, CASE WHEN a.response = 1 THEN b.opt1 ELSE '' END as useropt1, CASE WHEN a.response = 2 THEN b.opt2 ELSE '' END as useropt2, CASE WHEN a.response = 3 THEN b.opt3 ELSE '' END as useropt3, CASE WHEN a.response = 4 THEN b.opt4 ELSE '' END as useropt4 FROM `votings` a INNER JOIN pollmaster b on a.polldetid = b.id INNER JOIN users c on a.userid = c.id ORDER BY b.polldet, c.username";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		  // output data of each row
		  $sl = 1;
		  $row = $result->fetch_assoc();
		  $grouphead = $row["polldet"];


		  $result = $conn->query($sql);
		  ?>

		  <table border='1' width='100%' style='text-align: left;'>
			<tr>
				<td colspan="6">Showing Results</td>
			</tr>
			
			<tr>
				<td>User Name</td>
				<td>Serial</td>
				<td> Option 1 Executed</td>
				<td> Option 2 Executed</td>
				<td> Option 3 Executed</td>
				<td> Option 4 Executed</td>
			</tr>
			<tr>
				<td colspan="6"><h4><?php echo $grouphead ?></h4></td>
			<tr>

		  <?php

		  while($row = $result->fetch_assoc()) {
			$grphead = $row["polldet"];
			if($grouphead != $grphead){
				$sl=1;
				echo "<tr>";
					echo "<td colspan='6'>";
						echo "<h4>". $row['polldet']. "</h4>";
					echo "</td>";
				echo "</tr>";
			}
			?>
			<tr>
				<td><?php echo $row["username"] ?></td>
				<td><?php echo $sl ?></td>
				<td><?php echo $row["useropt1"] ?></td>
				<td><?php echo $row["useropt2"] ?></td>
				<td><?php echo $row["useropt3"] ?></td>
				<td><?php echo $row["useropt4"] ?></td>
			<tr>

			
			</div>

			<?php
			$sl= $sl +1;
			$grouphead = $grphead;
		  }
		  echo "</table>";
		} else {
		  echo "Results will show only after admin ends the poll ";
		}
		$conn->close();
	?>
	
</div>

</body>
</html>



