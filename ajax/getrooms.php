<?php 
	require("../lib/mysql_lib.php");
	require("../lib/chatlib.php");
	
	$mysql = new mysql_lib();
	$mysql->connectToDatabase();
	
	session_start();
	
	listRooms($mysql->getConnection());
	
?>