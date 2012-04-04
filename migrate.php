<?php

	require 'config.php';
	require 'test/config_hook.php';
	require 'libs/slug.php';
	require 'libs/general.php';

	$cmd = $argv[1]; // $argv[0] is the file's name

	if (file_exists('commands/' . $cmd . '.php')) {

		// Connecting, selecting database
		$db_conn = mysql_connect('127.0.0.1', $mysql_username, $mysql_password)
		    		or die('Could not connect Mysql: ' . mysql_error() . "\n");

		require 'libs/schema_migration.php';
		require 'commands/' . $cmd . '.php';

		mysql_close($db_conn);

	} else {

		$all_cmds = array();

	   	$dh = opendir("commands");
	    while (($file = readdir($dh)) !== false) {
	    	if (is_file("commands/" . $file)) {
	    		$all_cmds[] = substr($file, 0, -4);
	    	}
	    }
	    closedir($dh);

		echo "Supported commands: {" . join("|" , $all_cmds) . "}";
	}

	echo "\r\n";
	

	exit(0);
?>