<?php

  class remove_username_index_20120405025930372 // don't modify class name
  {
    public function up() { 
      mysql_query('DROP INDEX `username_0` ON `members`;');
    }

    public function down() {
      mysql_query('CREATE INDEX `username_0` ON `members` (`username`);');
    }
  }

?>
