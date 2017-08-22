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
				overflow-y: scroll;
			}
			.sendmessage {
				position: absolute;
				width: 100%;
				margin: auto;
				height: 60px;
				bottom: 0;
				border: 2px solid gray;
				background-color: white;
			}
			.sendbutton {
				float: right;
			}
		</style>
	</head>
	<body>
		<div class="chatbox">
			<div class="messages">
				<?php for($i = 0; $i < 50; $i++) { echo "<div class='message'>$i</div>"; }?>
			</div>
			<form id="sendMessage">
				<div contenteditable="true" class="sendmessage">
					<button contenteditable="false" class="sendbutton">Senden</button>
					<span name="messagebox">adawdawd</span>
				</div>
			</form>
		</div>
		<script src="../js/jquery-2.1.1.min.js" type="text/javascript" ></script>
		<script src="../lib/ChatLib.js" type="text/javascript"></script>
	</body>
</html>