SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvc`;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Test', 'test@test.com', 'Test message');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `is_published` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_published`) VALUES
(1, 'about', 'About Us', 'Test content', 1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'admin',
  `password` char(32) NOT NULL,
  `is_active` tinyint(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `email`, `role`, `password`, `is_active`) VALUES
(1, 'admin', 'admin@your-site.com', 'admin', '44ca5fa5c67e434b9e779c5febc46f06', 1);


ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `messages`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `pages`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
