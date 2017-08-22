function getMessages(room) {
	$.ajax({
	     type: "POST",
	     url: 'ajax/getmessages.php',
	     data: room,
	     success: function(response) {
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
	     type: "POST",
	     url: 'ajax/sendmessages.php',
	     data: {data:data},
	     success: function(response) {
	    	 alert(response);
	     }
	});
}

function sendMessage(message) {
	
	// Submitting data to php
	$.ajax({
	     type: "POST",
	     url: 'ajax/sendmessages.php',
	     data: message,
	     success: function(response) {
	    	 alert(response);
	     }
	});
}