<?php

	require 'db_config.php';
	require 'libs/slug.php';
	require 'libs/schema_migration.php';
	require 'libs/general.php';

	$cmd = $argv[1]; // $argv[0] is the file's name

	if (file_exists('commands/' . $cmd . '.php')) {

		require 'commands/' . $cmd . '.php';

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
	mysql_close($db_conn);

	exit(0);
?>