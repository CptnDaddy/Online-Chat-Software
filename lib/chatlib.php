<?php 

function listRooms($con) {
    $stmt = $con->prepare("select * FROM room");
    $stmt->execute();
    if($stmt->field_count > 0) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            //echo "<tr><td><div class='message left mleft z-depth-4'>" . $row['text'] . "<div class='time'>" . $row['time'] . "</div></div></td></tr>";
            echo '<a onclick="changeRoom(' . $row['id'] . ')" class="collection-item room"><span class="badge">' . $row['currentusers'] . '/' . $row['maxusers'] . '</span>' . $row['name'] . '</a>';
        }
    } else {
        echo '<a  class="collection-item room"><span class="badge">0/0</span>Keine Räume verfügbar</a>';
    }
    
    $stmt->close();
}

?>