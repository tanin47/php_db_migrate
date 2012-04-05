<?php

  class add_height_to_member_20120405095300144 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` ADD `height` INT(10);');
    }

    public function down() {
      mysql_query('ALTER TABLE `members` DROP `height`;');
    }
  }

?>
