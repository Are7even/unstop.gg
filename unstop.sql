DROP TABLE IF EXISTS `language`;
CREATE  TABLE  `language`(
`id` int(11) AUTO_INCREMENT,
`code` varchar(255) not null,
`locale` varchar(255) not null,
`title` varchar(255) not null,
`icon` varchar(255) not null,
`status` int(11) DEFAULT 0,
`pos` int(11) DEFAULT 0,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) AUTO_INCREMENT,
  `auth_key` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 1,
  `rating` int(11) DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY(`id`)
);

ALTER TABLE `user` ADD UNIQUE(`password_reset_token`);
ALTER TABLE `user` ADD UNIQUE(`username`);
ALTER TABLE `user` ADD UNIQUE(`email`);

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
`id` int(11) AUTO_INCREMENT,
`theme` varchar(255) DEFAULT NULL,
`text` TEXT,
`created_at` DATETIME DEFAULT NULL,
`sender_id` int(11) DEFAULT 0,
`receiver_id` int(11) DEFAULT 0,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE `tournament` (
`id` int(11) AUTO_INCREMENT,
`icon` varchar (255) DEFAULT NULL,
`game` varchar(255) DEFAULT NULL,
`created_at` date DEFAULT NULL,
`hidden` int(11) DEFAULT 0,
`handheld` int(11) DEFAULT 0,
`type` varchar(255) DEFAULT NULL,
`rating_on` int(11) DEFAULT 0,
`players_count` int(11) DEFAULT 0,
`start` DATETIME DEFAULT NULL,
`end`  DATETIME DEFAULT NULL,
`checkin` int(1) DEFAULT 0,
`checkin_start` DATETIME DEFAULT NULL,
`checkin_end` DATETIME DEFAULT NULL,
`first_place` int(11) DEFAULT 0,
`second_place` int(11) DEFAULT 0,
`third_place` int(11) DEFAULT 0,
`fourth_place` int(11) DEFAULT 0,
`fifth_place` int(11) DEFAULT 0,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `tournament_translate`;
CREATE TABLE `tournament_translate` (
`id` int(11) AUTO_INCREMENT,
`tournament_id`  int(11) DEFAULT 0,
`header` varchar (255) DEFAULT NULL,
`short_text` varchar (255) DEFAULT NULL,
`text` TEXT,
`language` varchar (255) DEFAULT NULL,
PRIMARY KEY(`id`)
);


DROP TABLE IF EXISTS `stage`;
CREATE TABLE `stage` (
`id` int(11) AUTO_INCREMENT,
`tournament_id` int(11) DEFAULT 0,
`type` varchar(255) DEFAULT NULL,
`rule` varchar(255) DEFAULT NULL,
`start` DATETIME DEFAULT NULL,
`end`  DATETIME DEFAULT NULL,
`players_count` int(11) DEFAULT 0,

PRIMARY KEY(`id`)
);



DROP TABLE IF EXISTS `gifts`;
CREATE TABLE `gifts` (
`id` int(11) AUTO_INCREMENT,
`icon` varchar(255) DEFAULT NULL,
PRIMARY KEY(`id`)
);


DROP TABLE IF EXISTS `gifts_translate`;
CREATE TABLE `gifts_translate` (
`id` int(11) AUTO_INCREMENT,
`gifts_id` int(11) DEFAULT 0,
`title` varchar(255) DEFAULT NULL,
`description` varchar (255) DEFAULT NULL,
`language` varchar (255) DEFAULT NULL,
PRIMARY KEY(`id`)
);


DROP TABLE IF EXISTS `user_to_gifts`;
CREATE TABLE `user_to_gifts`(
`user_id` int(11) DEFAULT 0,
`gifts_id` int(11) DEFAULT 0
);

DROP TABLE IF EXISTS `stage_to_user`;
CREATE TABLE `stage_to_user`(
`user_id` int(11) DEFAULT 0,
`stage_id` int(11) DEFAULT 0
);

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games`(
`id` int(11) AUTO_INCREMENT,
`image` varchar (255) DEFAULT NULL,
`name` varchar (255) DEFAULT NULL,
`genre_id` varchar (255) DEFAULT NULL,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `games_translate`;
CREATE TABLE `games_translate`(
`id` int(11) AUTO_INCREMENT,
`games_id` int(11) DEFAULT 0,
`header` varchar (255) DEFAULT NULL,
`description` varchar(255) DEFAULT NULL,
`keywords` varchar(255) DEFAULT NULL,
`language` varchar (255) DEFAULT NULL,

PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre`(
`id` int(11) AUTO_INCREMENT,
`status` varchar (255) DEFAULT NULL,

PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `genre_translate`;
CREATE TABLE `genre_translate`(
`id` int(11) AUTO_INCREMENT,
`genre_id` int(11) DEFAULT 0,
`title` varchar (255) DEFAULT NULL,
`language` varchar (255) DEFAULT NULL,

PRIMARY KEY(`id`)
);

DELIMITER //
CREATE TRIGGER `delete_stage` BEFORE DELETE ON `stage`
FOR EACH ROW BEGIN
  DELETE FROM `stage` WHERE `tournament_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_games_translate` BEFORE DELETE ON `games`
FOR EACH ROW BEGIN
  DELETE FROM `games_translate` WHERE `games_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_genre_translate` BEFORE DELETE ON `genre`
FOR EACH ROW BEGIN
  DELETE FROM `genre_translate` WHERE `genre_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_gifts_translate` BEFORE DELETE ON `gifts`
FOR EACH ROW BEGIN
  DELETE FROM `gifts_translate` WHERE `gifts_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_tournament_translate` BEFORE DELETE ON `tournament`
FOR EACH ROW BEGIN
  DELETE FROM `tournament_translate` WHERE `tournament_id`=OLD.`id`;
END