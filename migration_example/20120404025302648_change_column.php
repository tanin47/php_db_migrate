<?php

  class change_column_20120404025302648 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` CHANGE `school` `high_school` VARCHAR(255);');
    }

    public function down() {
      mysql_query('ALTER TABLE `members` CHANGE `high_school` `school` VARCHAR(255);');
    }
  }

?>
