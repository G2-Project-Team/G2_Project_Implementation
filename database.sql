DROP DATABASE IF EXISTS `websitedb`;
CREATE DATABASE `websitedb`;
USE `websitedb`;

CREATE TABLE `Users` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL,
  `type` varchar(255) COMMENT 'Can be ''Land Manager'', ''Developer'', or ''Admin''',
  `description` varchar(255)
);

CREATE TABLE `GridData` (
  `grid_id` int PRIMARY KEY AUTO_INCREMENT,
  `lat` int NOT NULL,
  `long` int NOT NULL,
  `avg_sun` decimal(3,2),
  `avg_wind` decimal(3,2),
  `has_water` boolean NOT NULL DEFAULT false,
  `is_farm` boolean NOT NULL DEFAULT false
);

CREATE TABLE `LandListings` (
  `listing_id` int PRIMARY KEY AUTO_INCREMENT,
  `grid_id` int NOT NULL,
  `time_created` timestamp DEFAULT (now()),
  `time_updated` timestamp DEFAULT (now()),
  `user_id` int NOT NULL
);

CREATE TABLE `Documents` (
  `doc_id` int PRIMARY KEY AUTO_INCREMENT,
  `listing_id` int NOT NULL,
  `link` varchar(255) NOT NULL
);

CREATE TABLE `listing_save` (
  `save_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `listing_id` int NOT NULL
);