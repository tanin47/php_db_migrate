<?php

	$mysql_database_name = "test_migration";
	$mysql_username = "root";
	$mysql_password = "";

	// Connecting, selecting database
	$db_conn = mysql_connect('127.0.0.1', $mysql_username, $mysql_password)
	    		or die('Could not connect Mysql: ' . mysql_error() . "\n");

	echo "Mysql at 127.0.0.1 is online.\n";

?>