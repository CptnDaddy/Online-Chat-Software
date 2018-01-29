<?php
require("lib/mysql_lib.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase();

session_start();

if(isset($_POST['changepic'])) {
	if (move_uploaded_file($_FILES['profilepic']['tmp_name'], "uploads/" . $_SESSION['username'] . ".png")) {
		$stmt = $mysql->getConnection()->prepare("Update users set haspic = 1 where id = ?");
		$stmt->bind_param("i", $_SESSION['userid']);
		$stmt->execute();
		$stmt->close();
		$_SESSION['haspic'] = true;
	} else {
		echo "failed";
	}
	
}
?>