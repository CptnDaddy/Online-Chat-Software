$(document).ready(function() {
		scrollToBottom();
		
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
				url: "ajax/sendmessage.php",
				type: "post",
				data: serializedData
			});
			request.done(function(response, textStatus, jqXHR){
				//alert(response);
				refreshMessages();
			});
			request.always(function(){
				$inputs.prop("disabled", false);
			});
		});	
});

function changeRoom(room) {
	  alert(room);
}

function scrollToBottom() {
//	var elem = document.getElementById('chatwindow');
//	elem.scrollTop = elem.scrollHeight - elem.scrollTop;
	$('html, body').animate({scrollTop:$(document).height()}, 'slow');
	console.log("scrolled");
}

function getMessages(room) {
	$.ajax({
		type : "POST",
		url : 'ajax/getmessages.php',
		data : room,
		success : function(response) {
			alert(response); // Testing, later return data
		}
	});
}

// Saved for later
function refreshMessages() {

}

// *DEPRECATED*
function _sendMessage(user, room, message) {

	// Array for transmitting chat data
	data = [];
	data[0] = user;
	data[1] = room;
	data[2] = message;

	// Submitting data to php
	$.ajax({
		type : "POST",
		url : 'ajax/sendmessages.php',
		data : {
			data : data
		},
		success : function(response) {
			alert(response);
		}
	});
}

