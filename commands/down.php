<?php

$result = mysql_query("SELECT * FROM `schema_migrations` ORDER BY `version` DESC LIMIT 1");
$data = mysql_fetch_array($result, MYSQL_ASSOC);

if (!$data) {
	echo "Cannot rollback because there is no migration.\n";
	return;
}

$version = $data['version'];

$migrations = getAllMigrations();
$full_name = "";

foreach ($migrations as $name) {
	if (preg_match("/" . $version . "/i", $name)) {
		require $migration_dir . "/" . $name . ".php";
		$full_name = $name;
		break;
	}
}

$migration_instance = initMigrationClassWithFilename($version);
$migration_instance->down();
	
mysql_query("DELETE FROM `schema_migrations` WHERE `version` = '" . $version . "'");


echo "Undo " . $full_name . ".php\n";

?>