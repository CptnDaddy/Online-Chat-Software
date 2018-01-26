var room = 1; //der Raum wird auf 1 gesetzt
$(document).ready(function() {
		window.setTimeout(scrollToBottom, 300); //Nach unten Scrollen
		$('.modal').modal();
		$('.tooltipped').tooltip();
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
//				alert(response);
				update();
				$("#chatbox").val("");
				Materialize.toast("Nachricht gesendet", 1000);
				window.setTimeout(scrollToBottom, 300); //Scroll nach ganz unten
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
//						alert(response);
						update();
						$("#chatbox").val("");
						Materialize.toast("Nachricht gesendet", 1000);
						//scroll
						window.setTimeout(scrollToBottom, 300);
					});
					request.always(function(){
						$inputs.prop("disabled", false);
					});
		        }
		    });
		});
		
		update();
		startAutoUpdate();
});

function loadOnline() {
	request = $.ajax({
		url: "ajax/getonline.php?r=" + getRoomId(),
		type: "get"
	});
	request.done(function(response, textStatus, jqXHR){
		$('#onlinemodal').html(response);
	});
}

function getRoomId() {
	return room;
}

function startAutoUpdate() {
	window.setInterval(update, 2000);
}

function update() {
  $.get("ajax/getmessage.php?r=" + getRoomId() , function(data) {
    $("#chatwindow").html(data);
  });
  $.get("ajax/getrooms.php", function(data) {
	  $("#rooms").html(data);
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

function changeRoom(room) { //Raum ändern
	  this.room = room;
	  $.get("ajax/getroomid.php?room=" + room , function(data) {console.log("roomchange " + data);});
	  //$('#room-' + room).addClass("selected");
	  window.setTimeout(update, 200);
	  window.setTimeout(scrollToBottom, 200);
}

function scrollToBottom() { //Scrollen nach ganz unten
//	var elem = document.getElementById('chatwindow');
//	elem.scrollTop = elem.scrollHeight - elem.scrollTop;
	$('html, body').animate({scrollTop:$(document).height()}, 'slow');
	console.log("scrolled");
}

//Veraltet
function _getMessages(room) { //Nachrichten empfangen
	$.ajax({
		type : "POST",
		url : 'ajax/getmessages.php',
		data : room,
		success : function(response) {
			alert(response); // Testen und später zurückgeben der Daten
		}
	});
}



//Veraltet
function _sendMessage(user, room, message) {

	// Array für das Übermitteln der Chat Daten
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

