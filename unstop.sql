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
  `token` int(11) DEFAULT 0,
  `login` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT 0,
  PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
`theme` varchar(255) DEFAULT NULL,
`text` TEXT,
`created_at` int(11) DEFAULT 0,
`sender_id` int(11) DEFAULT 0,
`receiver_id` int(11) DEFAULT 0
);

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE `tournament` (
`id` int(11) AUTO_INCREMENT,
`icon` varchar (255) DEFAULT NULL,
`game` varchar(255) DEFAULT NULL,
`created_at` int(11) DEFAULT 0,
`hidden` int(11) DEFAULT 0,
`handheld` int(11) DEFAULT 0,
`type` varchar(255) DEFAULT NULL,
`rating_on` int(11) DEFAULT 0,
`players_count` int(11) DEFAULT 0,
`start` int(11) DEFAULT 0,
`end`  int(11) DEFAULT 0,
`checkin` int(1) DEFAULT 0,
`checkin_start` int(11) DEFAULT 0,
`checkin_end` int(11) DEFAULT 0,
`1_place` int(11) DEFAULT 0,
`2_place` int(11) DEFAULT 0,
`3_place` int(11) DEFAULT 0,
`4_place` int(11) DEFAULT 0,
`5_place` int(11) DEFAULT 0,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `tournament_translate`;
CREATE TABLE `tournament_translate` (
`id` int(11) AUTO_INCREMENT,
`tournament_id`  int(11) DEFAULT 0,
`header` varchar (255) DEFAULT NULL,
`short_text` varchar (255) DEFAULT NULL,
`text` TEXT,
PRIMARY KEY(`id`)
);

-- DROP TABLE IF EXISTS `group_tournament`;
-- CREATE TABLE `group_tournament` (
-- `id` int(11) AUTO_INCREMENT,
-- `icon` varchar (255) DEFAULT NULL,
-- `game` varchar(255) DEFAULT NULL,
-- `created_at` int(11) DEFAULT 0,
-- `hidden` int(11) DEFAULT 0,
-- `type` varchar(255) DEFAULT NULL,
-- `rating_on` int(11) DEFAULT 0,
-- `players_count` int(11) DEFAULT 0,
-- `start` int(11) DEFAULT 0,
-- `end`  int(11) DEFAULT 0,
-- `checkin` int(1) DEFAULT 0,
-- `checkin_start` int(11) DEFAULT 0,
-- `checkin_end` int(11) DEFAULT 0,
-- `1_place` int(11) DEFAULT 0,
-- `2_place` int(11) DEFAULT 0,
-- `3_place` int(11) DEFAULT 0,
-- `4_place` int(11) DEFAULT 0,
-- `5_place` int(11) DEFAULT 0,
-- PRIMARY KEY(`id`)
-- );
--
-- DROP TABLE IF EXISTS `group_tournament_translate`;
-- CREATE TABLE `group_tournament_translate` (
-- `id` int(11) AUTO_INCREMENT,
-- `tournament_id`  int(11) DEFAULT 0,
-- `header` varchar (255) DEFAULT NULL,
-- `short_text` varchar (255) DEFAULT NULL,
-- `text` TEXT,
-- PRIMARY KEY(`id`)
-- );

DROP TABLE IF EXISTS `stage`;
CREATE TABLE `stage` (
`id` int(11) AUTO_INCREMENT,
`tournament_id` int(11) DEFAULT 0,
`type` varchar(255) DEFAULT NULL,
`rule` varchar(255) DEFAULT NULL,
`start` int(11) DEFAULT 0,
`end`  int(11) DEFAULT 0,
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
PRIMARY KEY(`id`)
);


DROP TABLE IF EXISTS `user_to_gifts`;
CREATE TABLE `user_to_gifts`(
`user_id` int(11) DEFAULT 0,
`gifts_id` int(11) DEFAULT 0
);

DROP TABLE IF EXISTS `user_to_stage`;
CREATE TABLE `user_to_stage`(
`user_id` int(11) DEFAULT 0,
`stage_id` int(11) DEFAULT 0
);

-- DELIMITER //
-- CREATE TRIGGER `delete_stage` BEFORE DELETE ON `stage`
-- FOR EACH ROW BEGIN
--   DELETE FROM `stage` WHERE `tournament_id`=OLD.`id`;
-- END