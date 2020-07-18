-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `sid` varchar(10) NOT NULL,
  `c_vill_moh` varchar(30) NOT NULL,
  `c_post` varchar(30) NOT NULL,
  `c_ps` varchar(30) NOT NULL,
  `c_district` varchar(30) NOT NULL,
  `c_state` varchar(30) NOT NULL,
  `c_pincode` varchar(6) NOT NULL,
  `p_vill_moh` varchar(30) NOT NULL,
  `p_post` varchar(30) NOT NULL,
  `p_ps` varchar(30) NOT NULL,
  `p_district` varchar(30) NOT NULL,
  `p_state` varchar(30) NOT NULL,
  `p_pincode` varchar(6) NOT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `admission`;
CREATE TABLE `admission` (
  `sid` varchar(10) NOT NULL,
  `eno` varchar(20) NOT NULL,
  `center` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `date_of_admission` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `sid` (`sid`),
  UNIQUE KEY `eno` (`eno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `allotment`;
CREATE TABLE `allotment` (
  `sid` varchar(10) NOT NULL,
  `center_alloted` varchar(30) NOT NULL,
  `course_alloted` varchar(30) NOT NULL,
  `Reporting` varchar(15) NOT NULL,
  `payment_enable` int(1) NOT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `counsell_status`;
CREATE TABLE `counsell_status` (
  `sid` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_of_processing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `course_choice`;
CREATE TABLE `course_choice` (
  `sid` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `center` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `center_1` varchar(20) NOT NULL,
  `course_1` varchar(20) NOT NULL,
  `center_2` varchar(20) NOT NULL,
  `course_2` varchar(20) NOT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `course_info`;
CREATE TABLE `course_info` (
  `course_id` varchar(10) NOT NULL,
  `cat_course_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `duration` int(1) NOT NULL,
  `no_of_seats` int(3) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fee` int(7) NOT NULL,
  `reserved_seats` int(2) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `course_info` (`course_id`, `cat_course_id`, `course_name`, `dept_id`, `duration`, `no_of_seats`, `type`, `fee`, `reserved_seats`, `creation_time`) VALUES
('DIPCSE01',	'DIPLOMA',	'Diploma inn CSE',	'CSE',	3,	75,	'REG',	3100,	25,	'2020-06-12 11:29:58');

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `sid` varchar(10) NOT NULL,
  `isverified` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `grievance`;
CREATE TABLE `grievance` (
  `name` varchar(50) NOT NULL,
  `sid` int(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `course` varchar(50) NOT NULL,
  `problem` varchar(250) NOT NULL,
  `submissiontime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `isadmissionopen`;
CREATE TABLE `isadmissionopen` (
  `msg` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `dateofopen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `isadmissionopen` (`msg`, `status`, `dateofopen`) VALUES
('Now Admission to all course has been opened.',	1,	'2020-06-12 11:04:16');

DROP TABLE IF EXISTS `payment_info`;
CREATE TABLE `payment_info` (
  `sid` varchar(10) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `amount` decimal(7,0) NOT NULL,
  `mode_payment` varchar(20) NOT NULL,
  `payment_status` int(1) NOT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `personal_details`;
CREATE TABLE `personal_details` (
  `sid` varchar(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `family_income` varchar(30) NOT NULL,
  `student_mobile` varchar(10) NOT NULL,
  `parents_mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adhar` varchar(12) NOT NULL,
  `kashmiri_migrant` varchar(10) NOT NULL,
  UNIQUE KEY `sid` (`sid`),
  UNIQUE KEY `sid_2` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `personal_details` (`sid`, `f_name`, `m_name`, `dob`, `nationality`, `religion`, `family_income`, `student_mobile`, `parents_mobile`, `email`, `adhar`, `kashmiri_migrant`) VALUES
('2020100001',	'MD IMTEYAZ',	'RUKSANA KHATOON',	'1993-11-11',	'INDIAN',	'Islam',	'100000',	'9988776655',	'9988776655',	'MD@GMAIL.COM',	'123456781234',	'Yes');

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE `qualification` (
  `sid` varchar(10) NOT NULL,
  `exam_name` varchar(40) NOT NULL,
  `board_university` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `passing_year` varchar(10) NOT NULL,
  `obtained_marks` varchar(4) NOT NULL,
  `total_marks` varchar(4) NOT NULL,
  `division` varchar(15) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP VIEW IF EXISTS `report`;
CREATE TABLE `report` (`sid` varchar(10), `name` varchar(50), `rank` int(4), `category` varchar(20), `kashmiri_migrant` varchar(10), `isstudiedurdu` varchar(3), `issportsperson` varchar(3), `center` varchar(20), `course` varchar(20), `center_1` varchar(20), `course_1` varchar(20), `center_2` varchar(20), `course_2` varchar(20));


DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `sid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `courseid` varchar(10) NOT NULL,
  `rank_scored` int(4) NOT NULL,
  `category` varchar(20) NOT NULL,
  `last_exam` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `signature` varchar(250) NOT NULL,
  `residential_cert` varchar(250) NOT NULL,
  `caste_cert` varchar(250) NOT NULL,
  `income_cert` varchar(250) NOT NULL,
  `last_exam_marksmemo` varchar(250) NOT NULL,
  `adhar` varchar(250) NOT NULL,
  `leaving_cert` varchar(250) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_info` (`sid`, `name`, `courseid`, `rank_scored`, `category`, `last_exam`, `mail`, `pic`, `signature`, `residential_cert`, `caste_cert`, `income_cert`, `last_exam_marksmemo`, `adhar`, `leaving_cert`) VALUES
(2020100001,	'Tom W Chandler',	'DIPCSE01',	1,	'OBC',	'10',	'',	'',	'',	'',	'',	'',	'',	'',	''),
(2020100002,	'Lt. Diaz',	'DIPCSE01',	2,	'OBC',	'10',	'',	'',	'',	'',	'',	'',	'',	'',	'');

DELIMITER ;;

CREATE TRIGGER `Student_login_Data` AFTER INSERT ON `student_info` FOR EACH ROW
BEGIN
INSERT INTO student_login VALUES(NEW.sid,NEW.sid);
END;;

CREATE TRIGGER `ONDELETELOGIN` AFTER DELETE ON `student_info` FOR EACH ROW
BEGIN
DELETE FROM student_login WHERE sid=OLD.SID;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `student_login`;
CREATE TABLE `student_login` (
  `sid` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_login` (`sid`, `password`) VALUES
('2020100001',	'2020100001'),
('2020100002',	'2020100002');

DROP TABLE IF EXISTS `studiedurduandsports`;
CREATE TABLE `studiedurduandsports` (
  `sid` varchar(10) NOT NULL,
  `isstudiedurdu` varchar(3) NOT NULL DEFAULT 'no',
  `levelofstudy` varchar(20) NOT NULL DEFAULT '10',
  `issportsperson` varchar(3) NOT NULL DEFAULT 'no',
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `support`;
CREATE TABLE `support` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `submissiontime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT 'mypass',
  `email` varchar(40) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `report`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report` AS select `c`.`sid` AS `sid`,`s`.`name` AS `name`,`s`.`rank_scored` AS `rank`,`s`.`category` AS `category`,`p`.`kashmiri_migrant` AS `kashmiri_migrant`,`up`.`isstudiedurdu` AS `isstudiedurdu`,`up`.`issportsperson` AS `issportsperson`,`cs`.`center` AS `center`,`cs`.`course` AS `course`,`cs`.`center_1` AS `center_1`,`cs`.`course_1` AS `course_1`,`cs`.`center_2` AS `center_2`,`cs`.`course_2` AS `course_2` from ((((`counsell_status` `c` join `student_info` `s`) join `personal_details` `p`) join `studiedurduandsports` `up`) join `course_choice` `cs`) where ((`c`.`sid` = `s`.`sid`) and (`c`.`sid` = `p`.`sid`) and (`c`.`sid` = `up`.`sid`) and (`c`.`sid` = `cs`.`sid`));

-- 2020-07-18 11:37:46