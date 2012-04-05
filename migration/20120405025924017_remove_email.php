<?php

  class remove_email_20120405025924017 // don't modify class name
  {
    public function up() { 
      mysql_query('ALTER TABLE `members` DROP `email`;');
    }

    public function down() {
      mysql_query('ALTER TABLE `members` ADD `email` VARCHAR(255);');
    }
  }

?>
