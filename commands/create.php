<?php

$result = mysql_query("SHOW DATABASES;");

$exist = false;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($line['Database'] == $mysql_database_name) $exist = true;
}

mysql_free_result($result);

if ($exist == true) {
	echo "The database '" . $mysql_database_name . "' already exists.\n";
	return; 
}

mysql_query("CREATE DATABASE `" . $mysql_database_name . "`;") or die("Cannot create database: " . mysql_error() . "\n");


echo "The database '" . $mysql_database_name . "' is created.\n";

?>