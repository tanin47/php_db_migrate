<?php

echo $mysql_database_name . "\n";

$result = mysql_query("SHOW TABLES;");

$dump_sql = "";


while ($line = mysql_fetch_array($result, MYSQL_NUM)) {

	if ($line[0] == "schema_migrations") continue;

	$table_name = $line[0];

	$create_table_result = mysql_query("SHOW CREATE TABLE `" . $table_name . "`;");
	$this_sql = mysql_fetch_array($create_table_result, MYSQL_NUM);

	$dump_sql .= $this_sql[1] . "\n\n";

	mysql_free_result($create_table_result);
}

mysql_free_result($result);

$schema_filename = $schema_dir . "/" . date('YmdHis') . "_" . $mysql_database_name . ".sql";
if (file_put_contents($schema_filename, $dump_sql) === false)  {
	echo "Cannot create the file '" . $schema_filename . "'\n";
}

chmod($schema_filename, 0777);
echo "All schemas are dumped into ". $schema_filename;

?>