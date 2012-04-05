<?php

  class change_school_to_high_school_20120405025821984 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` CHANGE `school` `high_school` VARCHAR(255);');
    }

    public function down() {
      mysql_query('ALTER TABLE `members` CHANGE `high_school` `school` VARCHAR(255);');
    }
  }

?>
