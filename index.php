<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<link type="text/css" rel="stylesheet" href="css/custom.css" />
		
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<!--Mobil Menü mit Buttons(Navbar)-->
		<ul id="mobile-nav" class="side-nav">
			<li><a href="sass.html"><i class="material-icons">search</i>moin</a></li>
			<li><a href="badges.html"><i class="material-icons">view_module</i>halo</a></li>
			<li><a href="collapsible.html"><i class="material-icons">refresh</i>i bims</a></li>
			<li><a href="mobile.html"><i class="material-icons">more_vert</i>1 Spast. lol</a></li>
		</ul>
		<!--Text zwischen </i> und </a>-->
	
		<!--Desktop Menü mit Buttons-->
		<nav>
			<div class="nav-wrapper red darken-2">
				<a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
	
				<!--Sorgt dafür, dass bei mobiler Ansicht das Menü links ausfährt-->
				<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="sass.html"><i class="material-icons">search</i></a></li>
					<li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
					<li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
					<li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
				</ul>
			</div>
		</nav>
	
		<div class="row">
			<div class="col s12 m5">
				<div class="card-panel red lighten-5">
					<h5>Login</h5>
					<form method=post>
						<div class="input-field">
							<input id="username" name="username" type="text" class="validate">
							<label for="username">Benutzername</label>
						</div>
						<div class="input-field">
							<input id="passwort" name="password" type="password" class="validate">
							<label for="passwort">Passwort</label>
						</div>
						  <button class="btn waves-effect waves-light pink darken-3" type="submit" name="action">Login
    						<i class="material-icons right">chevron_right</i>
    						
  							</button>
        
					</form>
				</div>
			</div>
		</div>
	
	
	
		<div class="row">
			<div class="col s12 m6">
				<div class="card red lighten-5">
					<div class="card-content white-text">
						<span class="card-title red-text text-darken-4">Guten Tag!</span>
						<p class="red-text text-darken-4">Willkommen zur Chat Software.</p>
						<p class="red-text text-darken-4">lol.</p>
					</div>
					<div class="card-action pink darken-4">
						<a href="#" class="blue-grey-text text-lighten-5">neuer Chatroom</a> 
						<a href="#" class="blue-grey-text text-lighten-5">Profil</a>
					</div>
				</div>
			</div>
		</div>
	
	
		<footer class="page-footer red light-2 ">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">I bims 1 J&uuml;rgens</h5>
						<p class="white-text">You can use rows and columns
							here to organize your footer content.</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Links</h5>
						<ul>
							<li><a class="white-text text-lighten-3" href="#!">Link 1</a></li>
							<li><a class="white-text text-lighten-3" href="#!">Link 2</a></li>
							<li><a class="white-text text-lighten-3" href="#!">Link 3</a></li>
							<li><a class="white-text text-lighten-3" href="#!">Link 4</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					&copy; 2014 Copyright Text <a class="grey-text text-lighten-4 right"
						href="#!">More Links</a>
				</div>
			</div>
		</footer>
	
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript">
			$(".button-collapse").sideNav();
			Materialize.toast("Plz kill yourself", 5000);
		</script>
	</body>
</html>