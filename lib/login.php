<?php 

	
function register($con, $username, $email, $password) {
	
	$stmt = $con->prepare("select id from users where email = ?");
	$stmt->bind_param("s", $email);
	if ($stmt->execute()) {
		$result = $stmt->get_result();
		if($result->num_rows > 0) {
			$result->close();
			$stmt->close();
			header("Location: index.php?s=2");
		} else {
			$result->close();
			$stmt->close();
			$stmt = $con->prepare("insert into users (username, password, email) values (?, ?, ?)");
			$stmt->bind_param("sss", $username, $password, $email);
			if ($stmt->execute()) {
				header("Location: index.php?s=1");
			} else {
				header("Location: index.php?s=3");
			}
			$stmt->close();
		}
	}
}


function login($con, $username, $password) {
	$stmt = $con->prepare("select id,email from users where username = ? and password = ?");
	$stmt->bind_param("ss", $username, $password);

	$result = $stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$id = $row["id"];
	$email = $row["email"];
	$c = $res->num_rows;
	$stmt->close();
	if($c > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['userid'] = $id;
		$_SESSION['roomid'] = 1;
		header("Location: chat.php");
	} else {
		header("Location: index.php?s=0");
	}
}


?>