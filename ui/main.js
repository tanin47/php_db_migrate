var handler = {};

handler.execute = function(cmd) {

	$('#toolbar').css('visibility', 'hidden');

	var span = $('<span></span>')
	$('#output').prepend(span);

	$(span).html('Loading...');

	var extra_argument = "";
	if (cmd == "generate") {
		extra_argument = prompt("Please specify the name of the new migration script");

		if (extra_argument == null) return;
	} else {
		if (!confirm('Are you sure you want to execute ' + cmd + '?')) return;
	}

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
			$('#toolbar').css('visibility', 'visible');
		},
		error: function(req, status, e){
			alert("There is something wrong with the internet connection.");
			$('#toolbar').css('visibility', 'visible');
		}
	});
}