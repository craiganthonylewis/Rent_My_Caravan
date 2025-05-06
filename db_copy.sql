SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `rentmycaravan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rentmycaravan`;




/* Users */ 
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pfp_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
  PRIMARY KEY (`user_id`),
  
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `caravans`;
CREATE TABLE IF NOT EXISTS `vehicle_details` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vehicle_make` varchar(50) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_bodytype` varchar(500) NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `year` varchar(5) NOT NULL,
  `num_doors` int(2) NOT NULL,
  `video_url` varchar(100) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;