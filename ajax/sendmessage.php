<?php 
    require("../lib/mysql_lib.php");
    
    $mysql = new mysql_lib();
    $mysql->connectToDatabase();
    
    session_start();
    
    if (isset($_POST['chattext'])) {
        $message = strip_tags($_POST['chattext']);
        if( !(ctype_space($message)) && !(empty($message))){
            $stmt = $mysql->getConnection()->prepare("insert into message (text, fk_user, fk_room) values (?, ?, ?)");
            $stmt->bind_param("sii", $message, $_SESSION['userid'], $_SESSION['roomid']);
            $stmt->execute();
            $stmt->close();
            echo "success";
        } else {
            echo "failed";
        }
    } else {
    	echo "failed";
    }
    





?>