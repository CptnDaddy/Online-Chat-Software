<?php 
	require("../lib/mysql_lib.php");
	
	$mysql = new mysql_lib();
	//Verbinden zur Datenbank
	$mysql->connectToDatabase();
	
	session_start();
	if(isset($_GET['r'])) {
		$stmt = $mysql->getConnection()->prepare("select username,haspic from users where fk_room = ?");
		$stmt->bind_param("i", $_GET['r']);
		$stmt->execute();
		if($stmt->field_count > 0) {
			echo "<h4>Online</h4>";
			echo '<ul class="collection">';
			$result = $stmt->get_result();
			while ($row = $result->fetch_array(MYSQLI_BOTH)) {
				echo '<li class="collection-item avatar">';
				if($row['haspic']) {
					echo '<img src="uploads/' . $row['username'] . '.png" alt class="circle" height="100px">';
				} else {
					echo '<img src="img/default.png" alt class="circle" height="100px">';
				}
					echo '<span class="title">' . $row['username'] . '</span>';
				echo '</li>';
			}
			echo "</ul>";
		}
	}
?>