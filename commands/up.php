<?php

$migrations = getAllMigrations();

foreach ($migrations as $name) {
	echo "=== Checking " . $name . " ===\n";

	$version = substr($name, 0, 17);

	$result = mysql_query("SELECT * FROM `schema_migrations` WHERE `version` = '" . $version . "'");
	$data = mysql_fetch_array($result, MYSQL_ASSOC);

	if ($data) {
		echo "\t Previously migrated. Do nothing.\n\n";
		continue;
	}

	echo "\t" . $version . " hasn't been migrated.\n";

	// perform it
	require "migration/" . $name . ".php";
	$migration_instance = initMigrationClassWithFilename($name);
	$migration_instance->up();

	mysql_query("INSERT INTO `schema_migrations` (`id`, `version`) VALUES ('', '".$version."');");
	echo "\tMigrated.";
	echo "\n\n";
}



?>