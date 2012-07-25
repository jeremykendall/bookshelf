DROP TABLE IF EXISTS bookshelf;

CREATE TABLE IF NOT EXISTS `bookshelf` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;