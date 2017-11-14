<?php 
require("../lib/mysql_lib.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase();

session_start();

if (isset($_POST['room'])) {
    $stmt = $mysql->getConnection()->prepare("Update users set fk_room = ? where id = ?");
    $stmt->bind_param("ii", $_POST['room'], $_SESSION['userid']);
    $stmt->execute();
    $stmt->close();
    echo "success";
}
?>