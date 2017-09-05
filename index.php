<?php

require("lib/mysql_lib.php");
require("lib/login.php");

$mysql = new mysql_lib();
$mysql->connectToDatabase();

session_start();
if (isset($_SESSION['username'])) {
	header("Location: chat.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(isset($_POST['register'])) {
		register($mysql->getConnection(), $_POST['username'], $_POST['email'], md5($_POST['password']));
	} else if(isset($_POST['login'])) {
		login($mysql->getConnection(), $_POST['username'], md5($_POST['password']));
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<link type="text/css" rel="stylesheet" href="css/custom.css" />
		
		<link rel="icon" type="image/png" href="img/tab.png">
		
		<title>Online Chat Software</title>
		
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<div id="particles-js"></div>
		<header>
			<nav>
				<div class="nav-wrapper cyan darken-3">
					<a href="#!" class="brand-logo center"><img src="img/ico.png"width="56px" height="56px" align="center">&nbsp;Online Chat</a>
				</div>
			</nav>
		</header>
		
		<main>	
			<div id="login" class="row center-align ">
				<div class="col l4 s12 offset-l4">
					<div class="card-panel z-depth-5">
						<h5>Login</h5>
						<form method=post>
							<div class="input-field">
								<input id="username" name="username" type="text" class="validate center-align" style="max-width: 400px" maxlength="20" required>
								<label for="username">Benutzername</label>
							</div>
							<div class="input-field">
								<input id="passwort" name="password" type="password" class="validate center-align" style="max-width: 400px" required>
								<label for="passwort">Passwort</label>
							</div>
							<button class="btn waves-effect waves-light teal darken-4" type="submit" name="login">Login<i class="material-icons right">chevron_right</i></button>
							<p class="center-align">Noch keinen Account? <a href="#" onclick="switchLogin()">Jetzt registrieren!</a></p>
						</form>
					</div>
				</div>
			</div>
			<div id="register" class="row center-align hide">
				<div class="col l4 s12 offset-l4">
					<div class="card-panel z-depth-5">
						<h5>Registrieren</h5>
						<form method=post>
							<div class="input-field">
								<input id="username" name="username" type="text" class="validate center-align" style="max-width: 400px" maxlength="20" required>
								<label for="username">Benutzername</label>
							</div>
							<div class="input-field">
								<input id="email" name="email" type="email" class="validate center-align" style="max-width: 400px" maxlength="50" required>
								<label for="email">Email</label>
							</div>
							<div class="input-field">
								<input id="passwort" name="password" type="password" class="validate center-align" style="max-width: 400px" pattern=".{8,20}"
								title="Passwort muss mindestens 8 bis 20 Zeichen enthalten" required>
								<label for="passwort">Passwort</label>
							</div>
							<button class="btn waves-effect waves-light teal darken-4" type="submit" name="register">Registrieren<i class="material-icons right">chevron_right</i></button>
							<p class="center-align">Du hast schon einen Account? <a href="#" onclick="switchLogin()">Jetzt einloggen!</a></p>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php include "inc/footer.html"; ?>
	
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/particles.min.js"></script>
		<script type="text/javascript">
		particlesJS.load('particles-js', 'js/particles.json', function() {
			  console.log('particles.js config loaded');
			});

		<?php 
			if(isset($_GET['s'])) {
				if($_GET['s'] == "0") {
					echo 'Materialize.toast("Login fehlgeschlagen!", 4000);';
				} else if($_GET['s'] == "1") {
					echo 'Materialize.toast("Erfolgreich registriert! Bitte logge dich ein.", 4000);';
				} else if($_GET['s'] == "2") {
					echo 'Materialize.toast("Diese Email existiert bereits.", 4000);';
				} else if($_GET['s'] == "3") {
					echo 'Materialize.toast("Ein Fehler ist aufgetreten!", 4000);';
				} else if($_GET['s'] == "4") {
					echo 'Materialize.toast("Du musst dich erst einloggen!", 4000);';
				} else if($_GET['s'] == "5") {
					echo 'Materialize.toast("Erfolgreich ausgeloggt!", 4000);';
				}
			}
		?>

		var login = true;

		function switchLogin() {
			if(login) {
				$("#login").fadeOut("slow");
				$("#register").fadeIn("slow");
				$("#login").addClass("hide");
				$("#register").removeClass("hide");
				login = false;
			} else {
				$("#register").fadeOut("slow");
				$("#login").fadeIn("slow");
				$("#register").addClass("hide");
				$("#login").removeClass("hide");
				login = true;
			}
		}
		</script>
	</body>
</html>