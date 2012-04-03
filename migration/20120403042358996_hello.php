<?php

  class hello_20120403042358996
  {
    public function up() { 
      mysql_query('CREATE TABLE `here`');
    }

    public function down() {
      mysql_query('DROP TABLE `here`');
    }
  }

?>
