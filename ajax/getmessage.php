<?php 
	require("../lib/mysql_lib.php");
	
	$mysql = new mysql_lib();
	//Verbinden zur Datenbank
	$mysql->connectToDatabase();
	
	session_start();
	if(isset($_GET['r'])) {
	    //Holen der Nachrichten, nach zeit geordnet
	    $stmt = $mysql->getConnection()->prepare("(select * from message where fk_room = ? order by time desc limit 25) order by id asc");
	    $stmt->bind_param("i", $_GET['r']);
	    $stmt->execute();
// 	    echo $stmt->field_count;
	    if($stmt->field_count > 0) {
	        $result = $stmt->get_result();
	        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
	            if($row['fk_user'] == $_SESSION['userid']){
	                echo "<div class='col' style='width:100%'>";
                        echo "<div class='container message right mright z-depth-4'>";
        	                echo "<div class='col s12'>";
                                echo "<div>" . $row['text'] . "</div>";
                            echo "</div>";
    	                echo "</div>";
	                echo "</div>";
	            }else{
	                echo "<div class='col' style='width:100%'>";
    	                echo "<div width='100%' class='container message left mleft z-depth-4'>";
        	                echo "<div class='row'>";
            	                echo "<div class='col m2 l2'>";
            	                    echo "<img class='left' src='./img/default.png' width='80' height='80' />";
            	                echo "</div>";
            	                echo "<div class='container col s12 m10 l10' style='text-align: left;'>" . $row['text'] . "</div>";
        	                echo "</div>";
        	                echo "<div class='row' style='margin-bottom: 0;'>";
                                echo "<div class='time'>" . $row['time'] . "</div>";
        	                echo  "</div>";
    	                echo "</div>";
	                echo  "</div>";
                    //echo "<tr><td><div class='message left mleft z-depth-4'>" . $row['text'] . "<div class='time'>" . $row['time'] . "</div> <img class='left' src='./img/default.png' width='50' height='50' /></div></td></tr>";
	            }
	        }
	    } else {
	        echo "<table>";
	           echo "<tr><td><div class='message left mleft z-depth-4'>Keine Nachrichten vorhanden.</div></td></tr>";
           echo "</table>";
	    }
	    
	    $stmt->close();
	} else {
	    echo "<table>";
	       echo "<tr><td><div class='message left mleft z-depth-4'>Keine Nachrichten vorhanden.</div></td></tr>";
	    echo "</table>";
	}

?>