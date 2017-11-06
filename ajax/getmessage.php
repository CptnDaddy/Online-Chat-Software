<?php 
	require("lib/mysql_lib.php");
	
	$mysql = new mysql_lib();
	$mysql->connectToDatabase();
	
	session_start();
	

?>