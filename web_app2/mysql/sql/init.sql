DROP SCHEMA IF EXISTS ph2_app;
CREATE SCHEMA ph2_app;
USE ph2_app;

DROP TABLE IF EXISTS `studyPost`;
CREATE TABLE `studyPost`(
  `id` INT NOT NULL PRIMARY KEY,
  `language_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contents_id` INT NOT NULL,
  `study_time` INT NOT NULL,
  `date` DATE NOT NULL
);

INSERT INTO  (`id`,`language_id`,`contents_id`,`study_time`,`date`) VALUES
(1 ,1, 1, 7,'2021-12-17'),
(2 ,3, 2, 5,'2021-12-24'),
(3 ,5, 3, 3,'2021-12-08'),
(4 ,4, 2, 4,'2021-12-16'),
(5 ,8, 1, 7,'2021-12-09'),
(6 ,2, 1, 1,'2020-12-17'),
(7 ,1, 3, 0,'2021-12-17'),
(8 ,1, 1, 9,'2021-12-16'),
(9 ,2, 2, 7,'2021-12-19'),
(10 ,2, 2, 7,'2022-01-03');


DROP TABLE IF EXISTS `language`;
CREATE TABLE `language`(
  `language_id` INT NOT NULL PRIMARY KEY,
  `language_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO `language` (`language_id`,`language_name`) VALUES
(1,'HTML'),
(2,'CSS'),
(3,'JavaScript'),
(4,'PHP'),
(5,'Laravel'),
(6,'SQL'),
(7,'SHELL'),
(8,'情報システム基礎(その他)');


DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents`(
  `contents_id` INT  NOT NULL PRIMARY KEY,
  `contents_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO `contents` (`contents_id`,`contents_name`) VALUES
(1,'N予備校'),
(2,'ドットインストール'),
(3,'POSSE課題');