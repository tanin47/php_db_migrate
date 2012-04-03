<?php

  class hello_20120403043421444
  {
    public function up() { 
      mysql_query('CREATE TABLE `here`');
    }

    public function down() {
      mysql_query('DROP TABLE `here`');
    }
  }

?>
