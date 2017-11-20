var room = 1; 
$(document).ready(function() {
	
		window.setTimeout(scrollToBottom, 300);
		
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
				update();
				$("#chatbox").val("");
				window.setTimeout(scrollToBottom, 300);
			});
			request.always(function(){
				$inputs.prop("disabled", false);
			});
		});	
		
		$(function() {
		    $("#sendmessage").keypress(function (e) {
		        if(e.which == 13) {
		            //submit form via ajax, this is not JS but server side scripting so not showing here
		            e.preventDefault();
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
						update();
						$("#chatbox").val("");
						window.setTimeout(scrollToBottom, 300);
					});
					request.always(function(){
						$inputs.prop("disabled", false);
					});
		        }
		    });
		});
		
		update();
		
});

function getRoomId() {
	return room;
}

function update() {
  $.get("ajax/getmessage.php?r=" + getRoomId() , function(data) {
    $("#chatwindow").html(data);
    window.setTimeout(update, 5000);
  });
}

/*function getMessages() {
	
	console.log("refresh");
	request = $.ajax({
		url: "ajax/getmessage.php",
		type: "post",
		data: this.room
	});
	request.done(function(response, textStatus, jqXHR){
		document.getElementById('chatwindow').innerHTML = response;
	});
	request.always(function(){
	}); 
}
*/

function changeRoom(room) {
	  this.room = room;
	  $.get("ajax/getroomid.php?room=" + room , function(data) {console.log("roomchange " + data)});
	  update();
	  scrollToBottom();
}

function scrollToBottom() {
//	var elem = document.getElementById('chatwindow');
//	elem.scrollTop = elem.scrollHeight - elem.scrollTop;
	$('html, body').animate({scrollTop:$(document).height()}, 'slow');
	console.log("scrolled");
}

//*DEPRECATED*
function _getMessages(room) {
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

