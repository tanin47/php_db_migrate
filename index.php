<?php
	require "config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Database Migration</title>
		 <script src="ui/jquery.js?<?=time()?>" type="text/javascript"></script>
		 <script src="ui/main.js?<?=time()?>" type="text/javascript"></script>
		 <link href="ui/main.css?<?=time()?>" media="all" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<span class="information">
			Database: <?=$mysql_database_name?><br/>
			Username: <?=$mysql_username?><br/>
			Password: <?=preg_replace('/./i', '*', $mysql_password);?>
		</span>
		<span id="toolbar">
			<input type="button" value="Create" onclick="handler.execute('create');">
			<input type="button" value="Generate" onclick="handler.execute('generate');">
			<input type="button" value="Up" onclick="handler.execute('up');">
			<input type="button" value="Down" onclick="handler.execute('down');">
			<input type="button" value="Dump" onclick="handler.execute('dump');">
			<input type="button" value="Drop" onclick="alert('Please drop database manually');">
		</span>
		<span id="output"></span>
	</body>
</html>