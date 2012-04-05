var handler = {};

handler.showToolbar = function() {
	$('#toolbar').css('visibility', 'visible');
};

handler.hideToolbar = function() {
	$('#toolbar').css('visibility', 'hidden');
};

handler.execute = function(cmd) {

	var extra_argument = "";
	if (cmd == "generate") {
		extra_argument = prompt("Please specify the name of the new migration script");

		if (extra_argument == null) return;
	} else {
		if (!confirm('Are you sure you want to execute ' + cmd + '?')) return;
	}

	handler.showToolbar();

		var span = $('<span></span>')
	$('#output').prepend(span);

	$(span).html('Loading...');

	$.ajax({
		type: "POST",
		url: "../ui_adapter.php",
		cache: false,
		headers: {
			"Connection": "close"
		},
		data: {
			cmd: cmd,
			extra: extra_argument
		},
		success: function(data){
			$(span).html("<b>" + new Date() + "</b><br/>\n"
							+ data.replace(/\n/g, "<br/>"));
			handler.showToolbar();
		},
		error: function(req, status, e){
			alert("There is something wrong with the internet connection.");
			handler.showToolbar();
		}
	});
};