-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2018 at 10:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_course_id` int(11) NOT NULL,
  `batch_no` varchar(11) DEFAULT NULL,
  `batch_shift` int(11) DEFAULT NULL,
  `batch_status` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch_course_id`, `batch_no`, `batch_shift`, `batch_status`, `trainer_id`, `start_date`, `end_date`) VALUES
(12, 4, '01', 1, 2, 1, '15-08-2017', '15-11-2017'),
(13, 4, '02', 1, 2, 1, '15-08-2017', '15-11-2017'),
(14, 1, '01', 1, 2, 1, '15-08-2017', '15-11-2017'),
(15, 1, '02', 2, 2, 1, '15-08-2017', '15-11-2017'),
(16, 2, '01', 1, 2, 3, '15-08-2017', '15-11-2017'),
(17, 2, '02', 2, 2, 3, '15-08-2017', '15-11-2017'),
(18, 3, '01', 1, 2, 2, '15-08-2017', '15-11-2017'),
(19, 5, '01', 1, 2, 2, '15-08-2017', '15-11-2017'),
(20, 6, '01', 1, 2, 2, '15-08-2017', '15-11-2017'),
(21, 7, '01', 2, 2, 1, '15-08-2017', '15-11-2017');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(200) NOT NULL,
  `course_code` int(11) NOT NULL,
  `course_hour` int(11) NOT NULL,
  `template` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `course_hour`, `template`) VALUES
(1, 'Web Development ', 101, 72, 1),
(2, 'Web Design', 102, 0, 2),
(3, 'CCNA', 103, 0, 1),
(4, 'Graphics Design', 104, 0, 1),
(5, 'Linux', 105, 0, 1),
(6, 'A+ Hardware', 106, 0, 1),
(7, 'iOS Apps Development', 107, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

DROP TABLE IF EXISTS `enrolled`;
CREATE TABLE IF NOT EXISTS `enrolled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`id`, `student_id`, `course_id`, `batch_id`) VALUES
(11, 201754, 4, 13),
(12, 201755, 4, 13),
(13, 201753, 4, 13),
(14, 201752, 4, 13),
(15, 201756, 4, 13),
(16, 201748, 4, 13),
(17, 201744, 4, 13),
(18, 201746, 4, 13),
(19, 201747, 4, 13),
(20, 201749, 4, 13),
(21, 201750, 4, 13),
(22, 201739, 3, 18),
(23, 201737, 3, 18),
(24, 201738, 3, 18),
(25, 201741, 3, 18),
(26, 201740, 3, 18),
(28, 201751, 4, 13),
(29, 201705, 2, 16),
(30, 201706, 2, 16),
(31, 201707, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `emergency` varchar(20) NOT NULL,
  `nid` varchar(200) NOT NULL,
  `bid` varchar(200) NOT NULL,
  `blood` varchar(4) NOT NULL,
  `image` varchar(200) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `ref` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_id`, `mobile`, `present_address`, `permanent_address`, `emergency`, `nid`, `bid`, `blood`, `image`, `gender`, `ref`) VALUES
(4, 'Ashik Ikbal', 201754, '01835385285', 'Runner Cyberlink Ltd.', 'Kustia Polytechnic Institute', '01718869050', '', '19965013940100536', 'A+', '', 1, 'admin'),
(5, 'Shohan Biswas', 201755, '01628949405', 'Runner Cyberlink Ltd.', 'Kustia Polytechnic Institute', '01741712674', '', '19978227303001230', 'A+', '', 1, 'admin'),
(6, 'Md Zafrul Islam', 201753, '01994181479', 'Runner Cyberlink Ltd.', 'Kustia Polytechnic Institute', '01715857612', '', '19985027906008089', 'A+', '', 1, 'admin'),
(7, 'Md Alif Hossain Bipul', 201752, '01798931350', 'Runner Cyberlink Ltd.', 'Kustia Polytechnic Institute', '01712758301', '19954714819000497', '19954714819000497', 'B+', '', 1, 'admin'),
(8, 'Md Raton Ali', 201756, '01764030522', 'Runner Cyberlink Ltd. ', 'Kustia Polytechnic Institute ', '01771975545', '', '19975011567104363', '', '', 1, 'admin'),
(9, 'Sohan Iqbal', 201748, '01738594190', 'Runner Cyberlink LTD.', 'Kustia Polytechnic Institute ', '01925385332', '19945017177000448', '19945017177000448', 'O+', '', 1, 'admin'),
(10, 'Md Ontor Newaz Limon', 201744, '01786392033', 'Runner Cyberlink Ltd. ', 'Kustia Polytechnic Institute ', '01935269448', '19968827810068478', '19968827810068478', 'O+', '', 1, 'admin'),
(11, 'Kamal Hossin', 201746, '01761038279', 'Runner Cyberlink Ltd. ', 'Kustia Polytechnic Institute ', '01737278336', '19975016357102177', '19975016357102177', 'A+', '', 1, 'admin'),
(12, 'Abdullah Al Shahrukh', 201747, '01710028898', 'Runner Cyberlink Ltd. ', 'Kustia Polytechnic Institute ', '01920636218', '19985023006100785', '19985023006100785', 'O+', '', 1, 'admin'),
(13, 'Refeza Sumaiya', 201749, '01752824347', 'Runner Cyberlink Ltd. ', 'Kustia Polytechnic Institute ', '01725452165', '20075017117007727', '20075017117007727', 'A+', '', 1, 'admin'),
(14, 'Munmun Jaman', 201750, '01559015497', 'Runner Cyberlink Ltd.', 'Kustia Polytechnic Institute ', '01758727339', '19975026007210783', '19975026007210783', 'A+', '', 1, 'admin'),
(15, 'Tonmoy Sree Sagar Mondal', 201739, '01878766218', 'Runner Cyberlink Limited', 'I.C.S.T, Feni.', '01839046170', '', '99981515359013961', 'O+', '', 1, 'apel'),
(16, 'Saiful Islam', 201737, '01839720070', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01815073561', '', '19963022913011259', 'O+', '', 1, 'apel'),
(17, 'Shuvo Mojumder', 201738, '01813666881', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01878319602', '', '65743278905673455', '', '', 1, 'apel'),
(18, 'Zahirul Islam', 201741, '01851076329', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01714491885', '', '99956734278965432', 'B+', '', 1, 'apel'),
(19, 'Shaiful Hadi Bhuiyan', 201740, '01827883224', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01881474138', '', '99977435634567234', 'A+', '', 1, 'apel'),
(20, 'Mst Nasima Khatun', 201751, '01868273826', 'Runner Cyberlink Limited.', 'Kushtia Polytechnic Institute.', '01720139618', '', '19975017944013689', '', '', 2, 'apel'),
(21, 'Md Ashraful Islam', 201705, '01767873547', 'Runner Cyberlink Limited', 'Sirajgonj Polytechnic Institute', '01742991930', '', '19988817816112902', '', '', 1, 'admin'),
(22, 'Most Khushi Khatun', 201706, '01780568873', 'Runner Cyberlink Limited', 'Sirajginj Polytechnic Institute', '01755456563', '', '19988819429016469', '', '', 1, 'admin'),
(23, 'Md Abdul Momin', 201707, '01722854533', 'Runner Cyberlink Limited', 'Sirajgonj Polytechnic Institute ', '01759200593', '', '20068878600061911', '', '', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trainers_name` varchar(100) DEFAULT NULL,
  `trainers_mobile` varchar(20) DEFAULT NULL,
  `trainers_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `trainers_name`, `trainers_mobile`, `trainers_email`) VALUES
(1, 'Md Shahadat Hossain', '01737266685', 'raselsha@gmail.com'),
(2, 'Kazi Mohammad Ahsanul Haque', '01742618969', 'ahsan296@gmail.com'),
(3, 'Md Asadulla hil galib', '01729831782', 'galib@runnercyberlink.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_role`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(3, 'apel', '4ce870c780e35a7fad515b07804f40ce', 2),
(4, 'iftekhar', '5462b026ac182e075eaf8c1372c3a8fb', 2),
(5, 'hasib', '0569fc867c8686ac7d85df5bbbd50491', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
