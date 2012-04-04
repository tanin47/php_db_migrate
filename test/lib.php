<?php

function run_migrate($command) {
	global $test_mysql_database_name;
	global $test_mysql_username;
	global $test_mysql_password;
	global $php_bin;

	$output = array();
	$config_argument = $test_mysql_database_name . " " . $test_mysql_username . " \"" . $test_mysql_password . "\"";

	echo "Run '" . $php_bin . " migrate.php " . $command ."'\n";
	exec("cd .. && " . $php_bin . " migrate.php --test " . $config_argument . " " . $command, $output);

	return join("\n", $output);
}

function clean_all_files() {
	global $test_migration_dir, $test_schema_dir;

	remove_all_files_in_dir($test_migration_dir);
	remove_all_files_in_dir($test_schema_dir);
}

function remove_all_files_in_dir($dir) {
	$dh = opendir($dir);
	while (($file = readdir($dh)) !== false) {
		if (is_file($dir . "/" . $file)) {
			unlink($dir . "/" . $file);
		}
	}
	closedir($dh);
}


function database_exist($database_name) {
	$result = mysql_query("SHOW DATABASES;");

	$exist = false;
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    if ($line['Database'] == $database_name) $exist = true;
	}

	mysql_free_result($result);

	return $exist;
}

function table_exist($table_name) {
	$result = mysql_query("SHOW TABLES;");

	$exist = false;
	while ($line = mysql_fetch_array($result, MYSQL_NUM)) {
	    if ($line[0] == $table_name) $exist = true;
	}

	mysql_free_result($result);

	return $exist;
}


function version_exist($version) {
	
	$result = mysql_query("SELECT * FROM `schema_migrations` WHERE `version` = '" . $version . "'");
	$data = mysql_fetch_array($result, MYSQL_ASSOC);
	mysql_free_result($result);

	if ($data) {
		return true;
	} else {
		return false;
	}
}


function get_version_of($partial_name) {
	global $test_migration_dir;


	$version = "";
	$dh = opendir($test_migration_dir);
	while (($file = readdir($dh)) !== false) {
		if (is_file($test_migration_dir . "/" . $file)) {
			if (preg_match("/" . $partial_name . "/i", $file)) {
				$version = substr($file, 0, 17);
				break;
			}
		}
	}
	closedir($dh);

	if ($version == "") die("Couldn't find the version of '" . $partial_name ."'");

	return $version;
}
?>