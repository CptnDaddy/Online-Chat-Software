<?php 
	require("../lib/mysql_lib.php");
	
	$mysql = new mysql_lib();
	$mysql->connectToDatabase();
	
	session_start();
	
	if (isset($_GET['room'])) {
	    $stmt = $mysql->getConnection()->prepare("Update users set fk_room = ? where id = ?");
	    $stmt->bind_param("ii", $_GET['room'], $_SESSION['userid']);
	    $stmt->execute();
	    $stmt->close();
	    $_SESSION['roomid'] = $_GET['room'];
	    echo "success";
	}
?>