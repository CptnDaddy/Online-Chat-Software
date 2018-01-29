<html>
<head>
	<style>
		.chatbox {
			width: 400px;
			height: 400px;
			border: 1px solid black;
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
	<div id="chatbox" class="chatbox">
	</div>
	<form id="sendmessage">
		<input type="text" id="text" name="text">
		<button id="submit" name="submit">Send</button>
	</form>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
	var request;
	$("#sendmessage").submit(function(event){
		event.preventDefault();
		
		if (request) {
			request.abort();
		}
		var $form = $(this);
		var $inputs = $form.find("button");
		var serializedData = $form.serialize();
		
		$inputs.prop("disabled",true);
		
		request = $.ajax({
			url: "../ajax/bot.php",
			type: "post",
			data: serializedData
		});
		request.done(function(response, textStatus, jqXHR){
			$("#text").val("");
			$('#chatbox').append("<p>" + response + "</p>");
		});
		request.always(function(){
			$inputs.prop("disabled", false);
		});
	});	
	
	$(function() {
	    $("#sendmessage").keypress(function (e) {
	        if(e.which == 13) {
	            //submit form via ajax, this is not JS but server side scripting so not showing here
	            console.log("working");
	            e.preventDefault();
	            if (request) {
					request.abort();
				}
				var $form = $(this);
				var $inputs = $form.find("button");
				var serializedData = $form.serialize();
				
				$inputs.prop("disabled",true);
				
				request = $.ajax({
					url: "../ajax/bot.php",
					type: "post",
					data: serializedData
				});
				request.done(function(response, textStatus, jqXHR){
					$("#text").val("");
					$('#chatbox').append("<p>" + response + "</p>");
				});
				request.always(function(){
					$inputs.prop("disabled", false);
				});
	        }
	    });
	});
	</script>
</body>
</html>