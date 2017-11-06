<?php 
require("lib/mysql_lib.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase();

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: index.php?s=4");
}

function getRandomWord($len) {
	$word = array_merge(range('a', 'z'), range('A', 'Z'));
	shuffle($word);
	return substr(implode($word), 0, $len);
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
	
		<ul id="slide-out" class="side-nav fixed z-depth-2">
			<li class="center no-padding">
				<div class="cyan darken-3 white-text" style="height: 280px;">
					<div class="row">
						<img style="margin-top: 5%;" width="100" height="100" src="img/default.png" class="circle responsive-img" />
						<p style="margin-top: -1%; font-size: 26px;"><?php echo $_SESSION['username'] ?></p>
						<p><a href="lib/logout.php" class="btn waves-effect waves-light cyan darken-4"><i class="large material-icons">power_settings_new</i></a></p>
					</div>
				</div>
			</li>
			<ul class="collection">
				<?php for($i = 1; $i < 20; $i++) { echo '<a onclick="changeRoom(' . $i . ')" class="collection-item room"><span class="badge">0/20</span>Raum ' . $i . '</a>'; }?>
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
				<table>
				<?php 
				
				$toggle = false;
				for($x = 1; $x <= 20; $x++) {
					if($toggle) {
						echo "<tr><td><div class='message left mleft z-depth-4'>" . getRandomWord(rand(5, 200)) . " ($x)<div class='time'>18:12</div></div></td></tr>";
						$toggle = false;
					} else {
						echo "<tr><td><div class='message right mright z-depth-4'>" . getRandomWord(rand(5, 200)) . " ($x)<div class='time'>18:12</div></div></td></tr>";
						$toggle = true;
					}
				}
				?>
				</table>
			</div>
		</main>
		<footer id="footer" class="chatinput page-footer cyan darken-3">
			<div class="container">
			<form id="sendmessage">
				<div class="row center">
					<div class="col m2 l2 hide-on-small-only">
						<img src="img/default.png" class="circle" height="100px" />
					</div>
					<div class="col s9 m8 l9">
						<textarea id="chatbox" name="chattext" class="materialize-textarea"></textarea>
					</div>
					<div class="col s1 m2 l1">
						<button class="btn waves-effect waves-light cyan darken-4"><i class="large material-icons">send</i></button>
					</div>
				</div>
			</div>
			</form>
		</footer>
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