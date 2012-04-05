<?php

  class add_column_20120404025302648 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` ADD `school` VARCHAR(255);');

    }

    public function down() {
      mysql_query('ALTER TABLE `members` DROP `school`;');
    }
  }

?>
