<?php

  class _create_fake_table_1_20120405030228020 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `members` (
					`id` INT(10) AUTO_INCREMENT PRIMARY KEY,
					`username` VARCHAR(255),
					`email` VARCHAR(255),
					`password` VARCHAR(255)
					);');

      mysql_query('CREATE INDEX `username_0` ON `members` (`username`);');
    }

    public function down() {
      mysql_query('DROP TABLE `members`;');
    }
  }

?>