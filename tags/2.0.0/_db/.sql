START TRANSACTION;

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_branches__parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

INSERT INTO `branches` (`id`, `parent_id`, `name`) VALUES
(1, NULL, 'branch_1_'),
(2, NULL, 'branch_2_'),
(3, 7, 'branch_3_7'),
(4, 1, 'branch_4_1'),
(5, 1, 'branch_5_1'),
(6, 2, 'branch_6_2'),
(7, 8, 'branch_7_8'),
(8, 1, 'branch_8_1'),
(9, 8, 'branch_9_8'),
(10, 1, 'branch_10_1');

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_boolean` tinyint(1) DEFAULT NULL,
  `f_tinyint` tinyint(4) DEFAULT NULL,
  `f_integer` int(11) DEFAULT NULL,
  `f_varchar` varchar(50) DEFAULT NULL,
  `f_text` text,
  `f_money` decimal(6,2) DEFAULT NULL,
  `f_float` float(9,3) DEFAULT NULL,
  `f_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=13 ;

INSERT INTO `types` (`id`, `f_boolean`, `f_tinyint`, `f_integer`, `f_varchar`, `f_text`, `f_money`, `f_float`, `f_datetime`) VALUES
(1, 1, 10, 100, 'title', 'description', '10.99', 100.555, '2012-08-22 21:42:35'),
(2, 0, 20, 200, 'title2', 'description2', '20.99', 200.555, '2012-09-02 20:26:53'),
(3, 1, 30, 300, 'title3', 'description3', '30.99', 300.555, '2012-10-02 19:17:13'),
(4, 0, 40, 400, 'title4', 'description4', '40.99', 400.555, '2012-10-02 19:18:19'),
(5, 1, 50, 500, 'title5', 'description5', '50.99', 500.555, '2012-10-02 19:19:06'),
(6, 0, 60, 600, 'title6', 'description6', '60.99', 600.555, '2012-10-02 19:19:58'),
(7, 1, 70, 700, 'title7', 'description7', '70.99', 700.555, '2012-10-02 19:20:48'),
(8, 1, 80, 800, 'title8', 'description8', '80.99', 800.555, '2012-10-02 19:21:36'),
(9, 0, 90, 900, 'title9', 'description9', '90.99', 900.555, '2012-10-02 19:22:15'),
(10, 1, 100, 1000, 'title10', 'description10', '100.99', 1000.555, '2012-10-02 19:23:59'),
(11, 0, 110, 1100, 'title11', 'description11', '110.99', 1100.555, '2012-10-02 19:24:56'),
(12, 1, 120, 1200, 'title12', 'description12', '120.99', 1200.555, '2012-10-02 19:25:44');


ALTER TABLE `branches`
  ADD CONSTRAINT `fk_branches__branches` FOREIGN KEY (`parent_id`) REFERENCES `branches` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;