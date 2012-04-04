<?php

if (!isset($argv[2]) || $argv[2] != "force") {
	echo "You want to drop '" . $mysql_database_name . "'. Please confirm by type 'yes': ";

	$confirm = trim(fgets(STDIN));

	if ($confirm != "yes") {
		echo "No confirmation. Exit...\n";
		return;
	}
}

//mysql_query("RENAME DATABASE `" . $mysql_database_name . "` TO `" . $mysql_database_name . "_dropped_" . date("YmdHis") . "`;") 
//			or die("Cannot drop database: " . mysql_error() . "\n");

mysql_query("DROP DATABASE `" . $mysql_database_name . "`;") 
			or die("Cannot drop database: " . mysql_error() . "\n");


echo "The database '" . $mysql_database_name . "' is dropped.\n";

?>