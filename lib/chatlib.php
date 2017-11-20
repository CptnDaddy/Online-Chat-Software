<?php 

function listRooms($con) {
	$room = 0;
    $stmt = $con->prepare("select * FROM room");
    $stmt->execute();
    if($stmt->field_count > 0) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        	$room++;
			$stmt2 = $con->prepare("SELECT count(u.username) 'currentusers' from users u where fk_room = ?");
			$stmt2->bind_param("i", $room);
			$stmt2->execute();
			if($stmt2->field_count > 0) {
				$result2 = $stmt2->get_result();
				while ($row2 = $result2->fetch_array(MYSQLI_BOTH)) {
		            echo '<a onclick="changeRoom(' . $row['id'] . ')" class="collection-item room"><span class="badge">' . $row2['currentusers'] . '/' . $row['maxusers'] . '</span>' . $row['name'] . '</a>';
				}
			} else {
				echo '<a onclick="changeRoom(' . $row['id'] . ')" class="collection-item room"><span class="badge">0/' . $row['maxusers'] . '</span>' . $row['name'] . '</a>';
			}
        }
    } else {
        echo '<a  class="collection-item room"><span class="badge">0/0</span>Keine Räume verfügbar</a>';
    }
    
    $stmt->close();
}

?>