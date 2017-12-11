<?php
session_start();
require("../lib/mysql_lib.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase(); //Verbinden zur Datenbank
$stmt = $mysql->getConnection()->prepare("update users set fk_room = 'NULL' where id = ?");
$stmt->bind_param("i", $_SESSION['userid']);
$stmt->execute();
$stmt->close();
session_unset();
session_destroy();
header("Location: ../index.php?s=5");
?>