<?php

// database has not been created, we ignore this file
if (!mysql_select_db($mysql_database_name)) return; 

$result = mysql_query("SHOW TABLES;");

$exist = false;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	foreach ($line as $k => $v) {
		if ($v == "schema_migrations") $exist = true;
	}
}

mysql_free_result($result);

if ($exist == true) return;

mysql_query("CREATE TABLE `schema_migrations` (
				`id` INT(10) AUTO_INCREMENT PRIMARY KEY,
				`version` VARCHAR(255)
				)
			") or die("Cannot create the table 'schema_migration': " . mysql_error() . "\n");


?>