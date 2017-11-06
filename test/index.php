<?php 
?>
<DOCTYPE html>
<html>
	<head>
		<style>
			* {margin:0;padding:0;} 
			.chatbox {
				position: relative;
				margin: 200px auto;
				min-width: 300px;
				min-height: 500px;
				max-height: 500px;
				max-width: 900px;
				border: 1px solid gray;
				border-radius: 4px;
			}
			.messages {
				position: absolute;
				margin: 0 auto -60px;
				min-width: 100%;
				max-height: 435px;
				overflow-y: scroll;
			}
			.message {
				padding: 20px 0 20px 0;
			}
			.message:hover {
				background-color: lightgray;
			}
			.sendmessage {
				position: absolute;
				width: 744px;
				margin: auto;
				height: 60px;
				bottom: 0;
				border: 1px solid gray;
				background-color: white;
				max-height: 60px;
				overflow-y: auto;
				resize: none;
				padding: 10px;
			}
			.sendbutton {
				position: absolute;
				bottom: 0px;
				right: 0px;
				witdh: 100%;
				padding: 5px;
				background-color: lightgray;
				color: white;
				font-size: 41px;
				
			}
		</style>
	</head>
	<body>
		<div class="chatbox">
			<div class="messages" id="messages">
				<?php for($i = 0; $i < 50; $i++) { echo "<div class='message'>$i</div>"; }?>
				
			</div>
			<form id="sendMessage">
				<textarea id="sendmessage" class="sendmessage"></textarea>
				<button class="sendbutton">Senden</button>
				
			</form>
		</div>
		<script src="../js/jquery-2.1.1.min.js" type="text/javascript" ></script>
		<script src="../lib/ChatLib.js" type="text/javascript"></script>
	</body>
	
	<!-- <div contenteditable="true" class="sendmessage">
					<button contenteditable="false" class="sendbutton">Senden</button>
					
					<span name="messagebox">Sag etwas...</span>
				</div> -->
				<p> hallo</p>
</html>