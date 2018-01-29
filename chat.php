<?php 

require("lib/mysql_lib.php");
require("lib/chatlib.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase();

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: index.php?s=4");
}

if(isset($_POST['changepic'])) {
	if (move_uploaded_file($_FILES['profilepic']['tmp_name'], "uploads/" . $_SESSION['username'] . ".png")) {
		$stmt = $mysql->getConnection()->prepare("Update users set haspic = 1 where id = ?");
		$stmt->bind_param("i", $_SESSION['userid']);
		$stmt->execute();
		$stmt->close();
		$_SESSION['haspic'] = true;
	} else {
		echo "failed";
	}
} else if(isset($_POST['createroom'])) {
	if(createRoom($mysql->getConnection(), $_POST['roomname'], $_POST['maxusers'])) {
		//success
	}
} else if(isset($_POST['editroom'])) {
	if(editRoom($mysql->getConnection(), $_POST['roomname'], $_POST['maxusers'], $_POST['roomid'])) {
		//success
	}
}



//echo "<h1>" . $_SESSION['username'] . "</h1>";
?>

<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<link type="text/css" rel="stylesheet" href="css/custom.css" />
		<link type="text/css" rel="stylesheet" href="css/chat.css" media="screen" />
		
		<link rel="icon" type="image/png" href="img/tab.png">
		
		<title>Online Chat Software - Chatte jetzt!</title>
		
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	
	<body>
	<!--Side nav-->
		<ul id="slide-out" class="side-nav fixed z-depth-2">
			<li class="center no-padding">
				<div class="cyan darken-3 white-text" style="height: 280px;">
					<div class="row">
						<div class="bildcontainer">
						<?php  if($_SESSION['haspic']) { ?>
							<img style="margin-top: 5%;" width="100" height="100" src="uploads/<?php echo $_SESSION['username'];?>.png" class="circle responsive-img profilepic" />
						<?php  } else { ?>
							<img style="margin-top: 5%;" width="100" height="100" src="img/default.png" class="circle responsive-img profilepic" />
						<?php  } ?>
							<div class="pichover">
								<a class="waves-effect waves-light btn modal-trigger" href="#changepic"><i class="large material-icons">create</i></a>
							</div>
						</div>
						<p style="margin-top: -1%; font-size: 26px;"><?php echo $_SESSION['username'] ?></p>
						<p><a href="lib/logout.php" class="btn waves-effect waves-light cyan darken-4"><i class="large material-icons">power_settings_new</i></a></p>
					</div>
				</div>
			</li>
			<?php
				if($_SESSION['admin']) {
					echo "<a class='waves-effect waves-light btn btn-small modal-trigger' href='#createroom' style='margin: 0; width: 100%;'><i class='material-icons'>add</i></a>";
				}
				?>
			<ul id="rooms" class="collection">
				<?php
				listRooms($mysql->getConnection());
				?>
		   </ul>
		   <li style="padding-top: 20px;"></li>
		</ul>
	
		<header>
			<div class="navbar-fixed">
				<nav>
					<div class="nav-wrapper cyan darken-3">
						<a href="#!" class="brand-logo navcenter"><img src="img/ico.png"width="56px" height="56px" align="center">&nbsp;Online Chat</a>
						<a data-activates="slide-out" class="button-collapse show-on-" href="#!"><i class="material-icons">menu</i></a>
					</div>
				</nav>
			</div>
		</header>
		<main>
			<div class="row" id="chatwindow">
				<?php 
				/*
				$toggle = false;
				for($x = 1; $x <= 20; $x++) {
					if($toggle) {
						echo "<tr><td><div class='message left mleft z-depth-4'>" . getRandomWord(rand(5, 200)) . " ($x)<div class='time'>18:12</div></div></td></tr>";
						$toggle = false;
					} else {
						echo "<tr><td><div class='message right mright z-depth-4'>" . getRandomWord(rand(5, 200)) . " ($x)<div class='time'>18:12</div></div></td></tr>";
						$toggle = true;
					}
				}*/
				?>
			</div>
		</main>
		<footer id="footer" class="chatinput page-footer cyan darken-3"> <!--Anfang des Footers-->
			<div class="container">
			<form id="sendmessage">
				<div class="row center">
					<div class="col m2 l2 hide-on-small-only">
					<?php  if($_SESSION['haspic']) { ?>
						<img src="uploads/<?php echo $_SESSION['username']; ?>.png" class="circle" height="100px" />
						<?php } else { ?>
						<img src="img/default.png" class="circle" height="100px" />
						<?php }?>
					</div>
					<div class="col s9 m8 l9">
						<textarea id="chatbox" maxlength=200 name="chattext" class="materialize-textarea"></textarea>
					</div>
					<div class="col s1 m2 l1">
						<button class="btn waves-effect waves-light cyan darken-4"><i class="large material-icons">send</i></button>
					</div>
				</div>
			</div>
			</form>
		</footer>
		<div id="modal1" class="modal bottom-sheet">
            <div class="modal-content" id="onlinemodal">
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Okay</a>
            </div>
          </div>
		<div id="changepic" class="modal">
		  <form method="post" enctype="multipart/form-data">
			<div class="modal-content">
			    <div class="file-field input-field">
			      <div class="btn">
			        <span>Datei</span>
			        <input type="file" name="profilepic" accept=".png,.gif,.jpg,.jpeg">
<!-- 			        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" /> -->
<!-- 					<input type="hidden" name="changepic" value="1"> -->
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="modal-footer">
				<input href="#!" type="submit" value="Hochladen" name="changepic" class="waves-effect waves-green btn-flat">
			</div>
		  </form>
		</div>
		<div id="createroom" class="modal">
			<form method=post>
				<div class="modal-content">
					<h4>Erstelle einen Raum</h4>
						<div class="row">
							<div class="input-field col s6">
								<input id="roomname" name="roomname" type="text" class="validate">
								<label for="roomname">Raum Name</label>
							</div>
							<div class="input-field col s12">
								<p class="range-field">
							      <input type="range" name="maxusers" id="maxusers" min="0" max="100" />
							    </p>
								<label for="maxusers">Maximale Benutzer</label>
						    </div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="createroom" class="waves-effect waves-green btn-flat">Erstellen</button>
				</div>
			</form>
		</div>
		<div id="editroom" class="modal">
			<form method=post>
				<div class="modal-content">
					<h4 id="editroomtitletext">Bearbeite den Raum: Laden...</h4>
						<div class="row">
							<div class="input-field col s6">
								<input id="roomname" name="roomname" type="text" class="validate">
								<label for="roomname">Raum Name</label>
							</div>
							<div class="input-field col s12">
								<p class="range-field">
							      <input type="range" name="maxusers" id="maxusers" min="0" max="100" />
							    </p>
								<label for="maxusers">Maximale Benutzer</label>
						    </div>
						    <input type="hidden" name="roomid" id="editroomid" value="">
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="editroom" class="waves-effect waves-green btn-flat">Speichern</button>
				</div>
			</form>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="js/materialize.min.js"></script>
		<script src="lib/ChatLib.js"></script>
		<script type="text/javascript">
		 $('.button-collapse').sideNav({
		      menuWidth: 300, // Default is 300
		      draggable: false // Choose whether you can drag to open on touch screens,
		    }
		  );
		</script>
	</body>
</html>