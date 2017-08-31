<?php 
require("lib/mysql_lib.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase();

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: index.php?s=4");
}

echo "<h1>" . $_SESSION['username'] . "</h1>";
?>

