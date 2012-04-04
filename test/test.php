<?php

require 'lib.php';

$php_bin = "/opt/lampp/bin/php";

$test_mysql_database_name = "test_migration_abcdef";
$test_mysql_username = "root";
$test_mysql_password = "";
$test_migration_dir = "migration";
$test_schema_dir = "schema";

clean_all_files();

// Connecting, selecting database
$db_conn = mysql_connect('127.0.0.1', $test_mysql_username, $test_mysql_password)
    		or die('Could not connect Mysql: ' . mysql_error() . "\n");


//if (database_exist($test_mysql_database_name)) 
//	die("Please drop '" . $test_mysql_database_name ."' before running the test.\n");


//
// Create
//
echo run_migrate("create");

if (!database_exist($test_mysql_database_name)) 
	die("Create '" . $test_mysql_database_name ."' failed.\n");

mysql_select_db($test_mysql_database_name);


//
// Generate
//
echo run_migrate("generate create_fake_table_1");
$first_version = get_version_of("create_fake_table_1");

file_put_contents($test_migration_dir . "/" . $first_version . "_create_fake_table_1.php", "<?php

  class _create_fake_table_1_" . $first_version . " // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `members` (
					`id` INT(10) AUTO_INCREMENT PRIMARY KEY,
					`username` VARCHAR(255),
					`email` VARCHAR(255),
					`password` VARCHAR(255)
					);');

      mysql_query('CREATE INDEX `username_0` ON `members` (`username`);');
    }

    public function down() {
      mysql_query('DROP TABLE `members`;');
    }
  }

?>");


//
// Generate
//
sleep(2);
echo run_migrate("generate create_fake_table_2");
$second_version = get_version_of("create_fake_table_2");

file_put_contents($test_migration_dir . "/" . $second_version . "_create_fake_table_2.php", "<?php

  class create_fake_table_2_" . $second_version . " // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `posts` (
				  `id` int(10) NOT NULL AUTO_INCREMENT,
				  `title` varchar(255) DEFAULT NULL,
				  `description` text DEFAULT NULL,
				  `created_date` datetime DEFAULT NULL,
				  PRIMARY KEY (`id`),
				  KEY `created_date_0` (`created_date`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1');
    }

    public function down() {
      mysql_query('DROP TABLE `posts`');
    }
  }

?>
");


//
// Up
//
echo run_migrate("up");
if (!version_exist($first_version)) die("Migrate " . $first_version . " failed (should exist).\n");
if (!version_exist($second_version)) die("Migrate " . $second_version . " failed (should exist).\n");

if (!table_exist("members")) die("`members` should exist.");
if (!table_exist("posts")) die("`post` should exist.");


//
// Down
//
echo run_migrate("down");
if (!version_exist($first_version)) die("Migrate " . $first_version . " failed (should exist).\n");
if (version_exist($second_version)) die("Migrate " . $second_version . " failed (should NOT exist).\n");

if (!table_exist("members")) die("`members` should exist.");
if (table_exist("posts")) die("`post` should NOT exist.");


//
// Up
//
echo run_migrate("up");
if (!version_exist($first_version)) die("Migrate " . $first_version . " failed (should exist).\n");
if (!version_exist($second_version)) die("Migrate " . $second_version . " failed (should exist).\n");

if (!table_exist("members")) die("`members` should exist.");
if (!table_exist("posts")) die("`post` should exist.");


//
// Dump
//
echo run_migrate("dump");



//
// Down
//
echo run_migrate("down");
if (!version_exist($first_version)) die("Migrate " . $first_version . " failed (should exist).\n");
if (version_exist($second_version)) die("Migrate " . $second_version . " failed (should NOT exist).\n");

if (!table_exist("members")) die("`members` should exist.");
if (table_exist("posts")) die("`post` should NOT exist.");

//
// Down
//
echo run_migrate("down");
if (version_exist($first_version)) die("Migrate " . $first_version . " failed (should NOT exist).\n");
if (version_exist($second_version)) die("Migrate " . $second_version . " failed (should NOT exist).\n");

if (table_exist("members")) die("`members` should NOT exist.");
if (table_exist("posts")) die("`post` should NOT exist.");


//
// Drop
//
echo run_migrate("drop force");

if (database_exist($test_mysql_database_name)) 
	die("Drop '" . $test_mysql_database_name ."' failed.\n");



mysql_close($db_conn);

echo "EVERYTHING IS OK!\n\n";

?>