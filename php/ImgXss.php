<?php
	require_once "publicfunc.php";

	if(isset($_GET["imgName"]) && !empty($_GET["imgName"]))
	{
		echo "<img src = 127.0.0.1/SecureDevelopment/".$_GET["imgName"]."></img>";
		Free($_GET["imgName"]);
	}
	die();
?>