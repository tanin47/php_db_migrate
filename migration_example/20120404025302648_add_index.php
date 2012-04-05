<?php

  class add_index_20120404025302648 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE INDEX `username_0` ON `members` (`username`);');
    }

    public function down() {
      mysql_query('DROP INDEX `username_0` ON `members`;');
    }
  }

?>
