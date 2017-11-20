<?php 
    require("../lib/mysql_lib.php");
    
    $mysql = new mysql_lib();
    $mysql->connectToDatabase();
    
    session_start();
    
    if (isset($_POST['chattext'])) {
        $stmt = $mysql->getConnection()->prepare("insert into message (text, fk_user, fk_room) values (?, ?, ?)");
        $stmt->bind_param("sii", $_POST['chattext'], $_SESSION['userid'], $_SESSION['roomid']);
        $stmt->execute();
        $stmt->close();
        echo "success";
    } else {
    	echo "failed";
    }





?>