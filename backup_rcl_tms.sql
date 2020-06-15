-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2019 at 11:19 AM
-- Server version: 5.6.41-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `runnercy_stdnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batch_course_id` int(11) NOT NULL,
  `batch_no` varchar(11) DEFAULT NULL,
  `batch_shift` int(11) DEFAULT NULL,
  `batch_status` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(21, 7, '01', 2, 2, 1, '15-08-2017', '15-11-2017'),
(22, 8, '01', 3, 2, 4, '24-12-2014', '07-03-2015'),
(23, 9, '01', 1, 2, 5, '03-02-2018', '10-05-2018'),
(24, 10, '01', 1, 2, 6, '12-01-2018', '12-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_code` int(11) NOT NULL,
  `course_hour` int(11) NOT NULL,
  `template` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `course_hour`, `template`) VALUES
(1, 'Web Development ', 101, 72, 1),
(2, 'Web Design', 102, 72, 1),
(3, 'CCNA', 103, 72, 1),
(4, 'Graphics Design', 104, 72, 1),
(5, 'Linux', 105, 72, 1),
(6, 'A+ Hardware', 106, 72, 1),
(7, 'iOS Apps Development', 107, 72, 1),
(8, 'PHP & MySQL', 108, 72, 1),
(9, 'C# ASP .NET', 109, 72, 1),
(10, 'Auto Cad 2D-3D Max ', 110, 72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `certificate_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`id`, `student_id`, `course_id`, `batch_id`, `certificate_status`) VALUES
(11, 201754, 4, 13, 0),
(12, 201755, 4, 13, 0),
(13, 201753, 4, 13, 0),
(14, 201752, 4, 13, 0),
(15, 201756, 4, 13, 0),
(16, 201748, 4, 13, 0),
(17, 201744, 4, 13, 1),
(18, 201746, 4, 13, 0),
(19, 201747, 4, 13, 0),
(20, 201749, 4, 13, 0),
(21, 201750, 4, 13, 0),
(22, 201739, 3, 18, 0),
(23, 201737, 3, 18, 0),
(24, 201738, 3, 18, 0),
(25, 201741, 3, 18, 0),
(26, 201740, 3, 18, 0),
(28, 201751, 4, 13, 0),
(29, 201705, 2, 16, 0),
(30, 201706, 2, 16, 0),
(31, 201707, 2, 16, 0),
(32, 201714, 8, 22, 1),
(33, 201802, 9, 23, 1),
(34, 201801, 9, 23, 1),
(35, 201803, 9, 23, 1),
(36, 201804, 9, 23, 1),
(38, 201809, 10, 24, 1),
(40, 201831, 10, 24, 0),
(41, 201832, 10, 24, 0),
(42, 201833, 10, 24, 0),
(43, 21817, 10, 24, 0),
(44, 201834, 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
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
  `ref` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'Refeza Sumaiya', 201749, '01752824347', 'Runner Cyberlink Ltd. ', 'Kustia Polytechnic Institute ', '01725452165', '20075017117007727', '20075017117007727', 'A+', '', 2, 'admin'),
(14, 'Munmun Jaman', 201750, '01559015497', 'Runner Cyberlink Ltd.', 'Kustia Polytechnic Institute ', '01758727339', '19975026007210783', '19975026007210783', 'A+', '', 2, 'admin'),
(15, 'Tonmoy Sree Sagar Mondal', 201739, '01878766218', 'Runner Cyberlink Limited', 'I.C.S.T, Feni.', '01839046170', '', '99981515359013961', 'O+', '', 1, 'apel'),
(16, 'Saiful Islam', 201737, '01839720070', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01815073561', '', '19963022913011259', 'O+', '', 1, 'apel'),
(17, 'Shuvo Mojumder', 201738, '01813666881', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01878319602', '', '65743278905673455', '', '', 1, 'apel'),
(18, 'Zahirul Islam', 201741, '01851076329', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01714491885', '', '99956734278965432', 'B+', '', 1, 'apel'),
(19, 'Shaiful Hadi Bhuiyan', 201740, '01827883224', 'Runner Cyberlink Limited', 'I.C.S.T, Feni', '01881474138', '', '99977435634567234', 'A+', '', 1, 'apel'),
(20, 'Mst Nasima Khatun', 201751, '01868273826', 'Runner Cyberlink Limited.', 'Kushtia Polytechnic Institute.', '01720139618', '', '19975017944013689', '', '', 2, 'apel'),
(21, 'Md Ashraful Islam', 201705, '01767873547', 'Runner Cyberlink Limited', 'Sirajgonj Polytechnic Institute', '01742991930', '19988817816112902', '19988817816112902', '', '', 1, 'admin'),
(22, 'Most Khushi Khatun', 201706, '01780568873', 'Runner Cyberlink Limited', 'Sirajginj Polytechnic Institute', '01755456563', '', '19988819429016469', '', '', 1, 'admin'),
(23, 'Md Abdul Momin', 201707, '01722854533', 'Runner Cyberlink Limited', 'Sirajgonj Polytechnic Institute ', '01759200593', '', '20068878600061911', '', '', 1, 'admin'),
(24, 'Roni Chandra Sharma', 201714, '01814319835', 'H: 9/1/A R:4-a,\r\nJhigatola, Dhanmondi, Dhaka', 'H: 9/1/A R:4-a,\r\nJhigatola, Dhanmondi, Dhaka', '01814319835', '19943014154000139', '19943014154000139', 'O+', '', 1, 'admin'),
(25, 'Md Salman Hosan', 201802, '01762927652', 'Mirpur-10, Dhaka.', 'Dinajpur.', '01762927652', '', '19985027900000001', '', '', 1, 'admin'),
(26, 'Md Yusuf Ali', 201801, '01757657331', 'Mirpur-10', 'Dinajpur Polytechnic', '01757657331', '', '19985027900000002', '', '', 1, 'admin'),
(27, 'Md Mahedi Hasan', 201803, '01770802339', 'Mirpur-10, Dhaka.', 'Dinajpur Polytechnic', '01770802339', '', '19985027900000003', '', '', 1, 'admin'),
(28, 'Md Ariful Islam', 201804, '01758375166', 'Mirpur-10', 'Dinajpur Polytechnic', '01758375166', '', '19985027900000004', '', '', 1, 'admin'),
(29, 'Md Sohanur Rohaman', 201809, '01756635758', 'Dinajpur Polytecnic', 'Runner Cyberlink Limited.', '01756635758', '00000002404368967', '00000002404368967', '', '', 1, 'admin'),
(30, 'Md Rasel Islam', 21817, '01705937533', 'porojpur,fasiladaganga,dinajpiu', 'porojpur,fasiladaganga,dinajpiu', '01705937533', '', '19972716469110642', '', '', 1, 'shahrin'),
(31, 'Md Aktarujjaman', 201831, '01794927403', 'Nobabgonj, Dinajpur', 'Nobabgonj, Dinajpur', '01794927403', '19982716951000124', '', '', '', 1, 'admin'),
(32, 'Md Firoj Alam', 201832, '01783137901', 'Pirgonj, Tagorega', 'Pirgonj, Tagorega', '01783137901', '19979418243000043', '', 'B+', '', 1, 'admin'),
(33, 'Md Ariful Islam', 201833, '01773527388', 'Railcoloni,Dinajpur', 'Railcoloni,Dinajpur', '01773527388', '19982718705879917', '', '', '', 1, 'admin'),
(34, 'Bulbul', 201834, '01748238285', 'Basabo,Khilgaon', 'Lakuhatia,Kishoreganj', '01748238285', '', '', '', '', 1, 'shahrin');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `trainers_name` varchar(100) DEFAULT NULL,
  `trainers_mobile` varchar(20) DEFAULT NULL,
  `trainers_email` varchar(200) DEFAULT NULL,
  `trainers_signature` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `trainers_name`, `trainers_mobile`, `trainers_email`, `trainers_signature`) VALUES
(1, 'Md Shahadat Hossain', '01737266685', 'shahadat@runnercyberlink.com', 'sign.png'),
(2, 'Kazi Mohammad Ahsanul Haque', '01742618969', 'ahsan296@gmail.com', NULL),
(3, 'Md Asadulla hil galib', '01729831782', 'galib@runnercyberlink.com', NULL),
(4, 'Md. Asaduzzaman Arif', '01841111102', 'arif@runnercyberlink.com', NULL),
(5, 'Md. Azman Ali', '01795885845', 'azman@runnercyberlink.com', ''),
(6, 'Md Nazibul Islam', '01740557195', 'najibul@runnecyberlink.com', '6_signature_original.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_role`) VALUES
(2, 'admin', 'ebc5159f0ace71b0d91e895b6034f28e', 1),
(3, 'apel', '4ce870c780e35a7fad515b07804f40ce', 2),
(4, 'iftekhar', '5462b026ac182e075eaf8c1372c3a8fb', 2),
(5, 'hasib', '0569fc867c8686ac7d85df5bbbd50491', 2),
(6, 'shahrin', '409059d527d1f320a42e85c82d1ef509', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
