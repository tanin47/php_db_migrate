<?php

  class create_post_20120404030704222 // don't modify class name
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
