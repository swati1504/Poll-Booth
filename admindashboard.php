<?php
//This script will handle login
session_start();
if($_SESSION["usertype"] != 'Admin'){
	header("location: login.php");
}
include "adminheader.php";

?>


<div class="col-xs-12">
<div class="dasmsg">
<h2> Create New Poll For Voting <h2/>
<button style="height:50px; width:150px;" id="trigger" onClick="window.location = './createpoll.php'">Create New Poll</button>
</div>
<div class="dasmsg">
<h2> Poll Running <h2/>
<button style="height:50px; width:150px;" id="trigger" onClick="window.location = './closepoll.php'">Close Poll</button>
</div>
	<div class="dasmsg">
		<h2>Show Report<h2/>
			<button style="height:50px; width:150px;" id="trigger" onClick="window.location = './adminresult.php'">Show</button>
		</div>
</div>
</body>
</html>
