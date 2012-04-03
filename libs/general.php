<?php

function initMigrationClassWithFilename($name)
{
	$version = substr($name, 0, 17);
	$migration_name = substr($name, 18);
	
	$full_class_name = $migration_name . "_" . $version;

	if (!class_exists($full_class_name)) {
		$all_classes = get_declared_classes();

		$full_class_name = "";

		foreach ($all_classes as $class_name) {
			if (preg_match("/" . $version . "/i", $class_name)) {
				$full_class_name = $class_name;
				break;
			}
		}

		if ($full_class_name == "") {
			die("Cannot file an appropriate class for the migration '" . $name . "'\n");
		}
	}

	return new $full_class_name;
}


function getAllMigrations() {

	$migrations = array();
	$dh = opendir("migration");
	while (($file = readdir($dh)) !== false) {
		if (is_file("migration/" . $file)) {
			$migrations[] = substr($file, 0, -4);
		}
	}
	closedir($dh);

	sort($migrations);

	return $migrations;
}

?>