DROP SCHEMA IF EXISTS ph2_quizy;
CREATE SCHEMA ph2_quizy;
USE ph2_quizy;

-- questionsテーブル
DROP TABLE IF EXISTS `big_questions`;
CREATE TABLE `big_questions`(
  `id` INT NOT NULL PRIMARY KEY,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO `big_questions` (`id`,`name`) VALUES
(1,'東京の難読地名クイズ'),
(2,'広島県の難読地名クイズ');


-- choicesテーブル
DROP TABLE IF EXISTS `choices`;
CREATE TABLE `choices`(
  `id` INT NOT NULL,
  `question_id` INT NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` INT NOT NULL
);

INSERT INTO `choices` (`id`,`question_id`,`name`,`valid`) VALUES
(1,1,'たかなわ',1),
(2,1,'たかわ',0),
(3,1,'こうわ',0),
(4,2,'かめいど',1),
(5,2,'かめと',0),
(6,2,'かめど',0),
(7,3,'むこうひら',0),
(8,3,'むきひら',0),
(9,3,'むかいなだ',1);

-- 挑戦
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`(
  `id` INT NOT NULL,
  `big_question_id` INT NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL

);

INSERT INTO `questions` (`id`,`big_question_id`,`image`) VALUES
(1,1,'takanawa.png'),
(2,1,'kameido.png'),
(3,2,'mukainada');
