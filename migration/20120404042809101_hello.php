<?php

  class hello_20120404042809101 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `here`');
    }

    public function down() {
      mysql_query('DROP TABLE `here`');
    }
  }

?>
