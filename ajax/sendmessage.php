<?php 
    require("lib/mysql_lib.php");
    
    $mysql = new mysql_lib();
    $mysql->connectToDatabase();
    
    session_start();
    
    if (isset($_POST['chattext'])) {
        $stmt = $mysql->getConnection()->prepare("");
        $stmt->bind_param("sii", $_POST["chattext"], $_SESSION['userid'], 1);
        $stmt->execute();
        $stmt->close();
        echo "success";
    }





?>