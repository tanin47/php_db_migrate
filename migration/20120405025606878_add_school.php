<?php

  class add_school_20120405025606878 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` ADD `school` VARCHAR(255);');
    }

    public function down() {
      mysql_query('ALTER TABLE `members` DROP `school`;');
    }
  }

?>
