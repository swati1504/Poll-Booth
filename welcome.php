<?php
//This script will handle login
session_start();
if($_SESSION["usertype"] != 'User'){
	header("location: login.php");
}
include "userheader.php";

?>


<div class="col-xs-12">
<div class="dasmsg">
<h2> Vote Here <h2/>
<button style="height:50px; width:150px;" id="trigger" onClick="window.location = './castvote.php'">cast your vote</button>
</div>
<div class="dasmsg">
<h2> Poll Result <h2/>
<button style="height:50px; width:150px;" id="trigger" onClick="window.location = './userresult.php'">View Result</button>
</div>
</div>

</body>
</html>
