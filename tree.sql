-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.12-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for directory_tree
CREATE DATABASE IF NOT EXISTS `directory_tree` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `directory_tree`;

-- Dumping structure for table directory_tree.trees
CREATE TABLE IF NOT EXISTS `trees` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `parent_id` int(255) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table directory_tree.trees: ~0 rows (approximately)
/*!40000 ALTER TABLE `trees` DISABLE KEYS */;
INSERT INTO `trees` (`id`, `name`, `parent_id`, `updated_at`, `created_at`) VALUES
	(1, 'root', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'movies', 1, '2020-11-19 18:24:37', '2020-11-19 18:24:37'),
	(3, 'demo', 2, '2020-11-19 18:28:51', '2020-11-19 18:28:51'),
	(4, 'another root', 1, '2020-11-19 18:29:03', '2020-11-19 18:29:03');
/*!40000 ALTER TABLE `trees` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
