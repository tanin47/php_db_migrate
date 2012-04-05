<?php

  class create_fake_table_2_20120405030230193 // don't modify class name
  {
    public function up() { 
      mysql_query('CREATE TABLE `posts` (
				  `id` int(10) NOT NULL AUTO_INCREMENT,
				  `title` varchar(255) DEFAULT NULL,
				  `description` text DEFAULT NULL,
				  `created_date` datetime DEFAULT NULL,
				  PRIMARY KEY (`id`),
				  KEY `created_date_0` (`created_date`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1');
    }

    public function down() {
      mysql_query('DROP TABLE `posts`');
    }
  }

?>
