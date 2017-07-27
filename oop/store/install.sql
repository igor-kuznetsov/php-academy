CREATE DATABASE IF NOT EXISTS `ministore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ministore`;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


INSERT INTO `categories` (`id`, `name`) VALUES
  (1, 'Category1'),
  (2, 'Category2');


DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`) VALUES
  (1, 'Product1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 265.36, 1),
  (2, 'Product2', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.', 485.25, 2),
  (3, 'Product3', '', 123.77, 1),
  (4, 'Product4', 'sdfdsfdsf', 456.36, 2);


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `users` (`id`, `login`, `password`) VALUES
  (1, 'admin', 'ecfc0783dad694ab7823ae13b3d59cb9');


ALTER TABLE `products`
ADD CONSTRAINT `c_category_id`
FOREIGN KEY (`category_id`)
REFERENCES `categories` (`id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;
