CREATE TABLE `members` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `high_school` varchar(255) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

