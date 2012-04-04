<?php

$version = date('YmdHis') . sprintf("%03d", rand (0 , 999));

if (sizeof($argv) < 3) {
	echo "Please specify the name of the migration: php migrate.php generate <name>\n";
	return;
}

$name = $argv[2];

for ($i=3;$i<sizeof($argv);$i++) {
  $name = $name . " " . $argv[$i];
}

$name = slug($name);
$migration_filename = $migration_dir . "/" . $version . "_" . $name . ".php";

$template_content = "<?php

  class " . $name . "_" . $version . " // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `here`');
    }

    public function down() {
      mysql_query('DROP TABLE `here`');
    }
  }

?>
";

if (file_put_contents($migration_filename, $template_content) === false)  {
	echo "Cannot create the file '" . $migration_filename . "'\n";
}

?>