<?php 
	require '../lib/Chatbot/chatterbotapi.php';
	
	$factory = new ChatterBotFactory();
	
	$bot = $factory->create(ChatterBotType::CLEVERBOT);
	$botsession = $bot->createSession();
	
	$s = $botsession->think($_POST['text']);
	echo $s;
?>