<?php

	try {
		$options = getopt("", array("test"));

		if (isset($options['test'])) {

			$mysql_database_name = $argv[2];
			$mysql_username = $argv[3];
			$mysql_password = $argv[4];

			$migration_dir = "test/migration";
			$schema_dir = "test/schema";

			$new_argv = array("migrate.php");
			for ($i=5;$i<sizeof($argv);$i++) {
				$new_argv[] = $argv[$i];
			}

			$argv = $new_argv;
		}
	} catch (Exception $e) {
		
	}

?>