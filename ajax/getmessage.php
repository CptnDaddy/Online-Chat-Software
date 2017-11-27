<?php 
	require("../lib/mysql_lib.php");
	
	$mysql = new mysql_lib();
	$mysql->connectToDatabase();
	
	session_start();
	if(isset($_GET['r'])) {
	    $stmt = $mysql->getConnection()->prepare("(select * from message where fk_room = ? order by time desc limit 25) order by id asc");
	    $stmt->bind_param("i", $_GET['r']);
	    $stmt->execute();
// 	    echo $stmt->field_count;
	    if($stmt->field_count > 0) {
	        $result = $stmt->get_result();
            echo "<table>";
	        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
	            if($row['fk_user'] == $_SESSION['userid']){
	                echo "<tr><td><div class='message right mright z-depth-4'>" . $row['text'] . "<div class='time'>" . $row['time'] . "</div></div></td></tr>";
	            }else{
                    echo "<tr><td><div class='message left mleft z-depth-4'>" . $row['text'] . "<div class='time'>" . $row['time'] . "</div></div></td></tr>";
	            }
	        }
	        echo "</table>";
	    } else {
	        echo "<tr><td><div class='message left mleft z-depth-4'>Keine Nachrichten vorhanden.</div></td></tr>";
	    }
	    
	    $stmt->close();
	} else {
	    echo "<tr><td><div class='message left mleft z-depth-4'>Keine Nachrichten vorhanden.</div></td></tr>";
	}

?>