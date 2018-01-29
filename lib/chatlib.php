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
					if($_SESSION['admin'])
		            	echo '<li onclick="changeRoom(' . $row['id'] . ')" class="collection-item room"><span class="badge"><a onclick="loadOnline()" class="modal-trigger" style="padding: 0; line-height: 20px; height: 20px; display: inline-block;" href="#modal1">' . $row2['currentusers'] . '/' . $row['maxusers'] . '</a></span>' . $row['name'] . ' <a style="margin: 0; padding: 0; display: inline-flex; width: 15px; margin-left: 5px; height: auto;" class="modal-trigger" href="#editroom"><i class="tiny material-icons">build</i></a></li>';
					else
						echo '<li onclick="changeRoom(' . $row['id'] . ')" class="collection-item room"><span class="badge"><a onclick="loadOnline()" class="modal-trigger" style="padding: 0; line-height: 20px; height: 20px; display: inline-block;" href="#modal1">' . $row2['currentusers'] . '/' . $row['maxusers'] . '</a></span>' . $row['name'] . '</li>';
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
function getRandomWord($len) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

function createRoom($con, $roomname, $maxusers) {
	$stmt = $con->prepare("insert into room(name, maxusers) values (?, ?)");
	$stmt->bind_param("si", $roomname, $maxusers);
	return $stmt->execute();
}

function editRoom($con, $roomname, $maxusers, $roomid) {
	$stmt = $con->prepare("update room set name = ?, maxusers = ? where id = ?");
	$stmt->bind_param("sii", $roomname, $maxusers, $roomid);
	return $stmt->execute();
}
?>