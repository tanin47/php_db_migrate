<?php

  class remove_column_20120404025302648 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` DROP `email`;');
    }

    public function down() {
      mysql_query('ALTER TABLE `members` ADD `email` VARCHAR(255);');
    }
  }

?>
