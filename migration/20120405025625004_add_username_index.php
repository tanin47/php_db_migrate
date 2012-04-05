<?php

  class add_username_index_20120405025625004 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE INDEX `username_0` ON `members` (`username`);');
    }

    public function down() {
      mysql_query('DROP INDEX `username_0` ON `members`;');
    }
  }

?>
