<?php

  class create_member_20120405025535024 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `members` (
          `id` INT(10) AUTO_INCREMENT PRIMARY KEY,
          `username` VARCHAR(255),
          `email` VARCHAR(255),
          `password` VARCHAR(255),
          `age` INT(10)
          );');
    }

    public function down() {
      mysql_query('DROP TABLE `members`;');
    }
  }

?>
