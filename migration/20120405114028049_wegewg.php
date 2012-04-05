<?php

  class wegewg_20120405114028049 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `here`');
    }

    public function down() {
      mysql_query('DROP TABLE `here`');
    }
  }

?>
