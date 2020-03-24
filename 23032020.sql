-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2020 at 06:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mukono-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `docid` bigint(20) NOT NULL,
  `dnid` text NOT NULL,
  `speciality` text,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `online_status` int(11) DEFAULT NULL,
  `pwd` text,
  `gender` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docid`, `dnid`, `speciality`, `fname`, `lname`, `phone`, `email`, `updated_at`, `online_status`, `pwd`, `gender`, `dob`, `address`, `created_on`, `logtime`) VALUES
(6, 'T123', 'Neurology', 'Omkar', 'Bahiwal', '9373130909', 'ombahiwal@gmail.com', '2020-03-19 13:12:23', 1, 'Omkar109', 1, '1998-09-10', 'Nabuti Rd., Mukono', '2020-03-19 13:12:23', '2020-03-23 10:05:16'),
(7, 'Test', 'Test', 'Test', 'Test', '9373130909', 'bahiwal@aol.com', '2020-03-19 13:22:49', 0, 'Mukono', 0, '1998-09-10', 'Mukono MMC', '2020-03-19 13:22:49', '2020-03-19 13:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `testid` int(11) NOT NULL,
  `test` text NOT NULL,
  `inference` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`testid`, `test`, `inference`, `created_on`) VALUES
(1, 'CBC', '-', '2020-03-23 10:43:58'),
(2, 'Blood Smear Test for Malaria', '-', '2020-03-23 10:43:58'),
(7, 'HIV Test', NULL, '2020-03-23 10:46:26'),
(8, 'Blood Group Identification', NULL, '2020-03-23 10:46:26'),
(9, 'Urinanalysis', '-ve, +ve', '2020-03-23 11:57:23'),
(10, 'Random Blood Sugar (RBS)', 'NV', '2020-03-23 11:57:23'),
(11, 'TPHA', NULL, '2020-03-23 11:58:09'),
(12, 'RPR', NULL, '2020-03-23 11:58:09'),
(13, 'Urine TB LAM', NULL, '2020-03-23 11:58:31'),
(14, 'Gene Xpert', NULL, '2020-03-23 11:58:31'),
(15, 'LFTs', NULL, '2020-03-23 12:00:19'),
(16, 'Electrolytes', NULL, '2020-03-23 12:00:19'),
(17, 'CD4 Count', NULL, '2020-03-23 12:00:19'),
(18, 'Hepatitis B', NULL, '2020-03-23 12:00:19'),
(19, 'HIV Viral Load', NULL, '2020-03-23 12:00:19'),
(20, 'Hepatitis B Viral Load', NULL, '2020-03-23 12:00:19'),
(21, 'ZN', NULL, '2020-03-23 12:00:19'),
(22, 'Stool Analysis', NULL, '2020-03-23 12:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `mid` bigint(20) NOT NULL,
  `medicine` text NOT NULL,
  `dosage` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` text NOT NULL,
  `stock` int(11) DEFAULT '0',
  `expiry` date DEFAULT NULL,
  `personnel` text,
  `doe` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`mid`, `medicine`, `dosage`, `created_on`, `notes`, `stock`, `expiry`, `personnel`, `doe`) VALUES
(1, 'Amoxicillin', '500mg', '2020-03-09 10:29:22', 'Antibiotic', 1000, NULL, NULL, NULL),
(2, 'Acetaminophen', '500mg', '2020-03-09 10:42:44', 'Analgesic - Paracetamol', 500, NULL, NULL, NULL),
(6, 'asd', 'asdasd', '2020-03-18 09:42:56', 'sdsa', 33, '2030-03-12', 'asdas', '2020-03-10'),
(7, 'Amox', 'Test', '2020-03-18 09:50:00', 'asdasd', 12, '2020-03-25', 'OB', '2020-03-19'),
(8, 'crocin', '500mg', '2020-03-18 10:49:17', 'Head Ache anti Inflamatory', 1000, '2020-03-31', 'OB', '2020-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `stockid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`stockid`, `mid`, `stock`, `last_updated`) VALUES
(1, 1, 1000, '2020-03-09 10:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `opd_prescription`
--

CREATE TABLE `opd_prescription` (
  `refid` bigint(20) NOT NULL,
  `pnid` varchar(50) NOT NULL,
  `ptoken` int(11) DEFAULT NULL,
  `medicines` text,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `diagnosis` text,
  `treatment_notes` text,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bp` float DEFAULT NULL,
  `dnid` varchar(50) DEFAULT NULL,
  `labtestids` text,
  `labtestinference` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opd_prescription`
--

INSERT INTO `opd_prescription` (`refid`, `pnid`, `ptoken`, `medicines`, `height`, `weight`, `diagnosis`, `treatment_notes`, `last_updated`, `bp`, `dnid`, `labtestids`, `labtestinference`) VALUES
(3, 'cm980001', 7, 'sdd', 10, 12, 'sadasd', 'asdas', '2020-03-08 19:43:08', 89.01, 'T123', NULL, NULL),
(4, 'G123123', 8, 'Amoxicillin\r\nAcetaminophen', 150, 53, 'Very Okay, No Problem.', 'Just take the medicine Bro..', '2020-03-11 22:07:20', 98, 'T123', NULL, NULL),
(5, '8989', 9, 'Toothpaste', 123, 123, 'Cold, Viral Infection and Flu', 'just take the medicine', '2020-03-16 11:19:49', 123, 'T123', NULL, NULL),
(6, 'G123123', 8, 'Amoxicillin 500mg -  3/4\r\nParacetemol 500mg -  3/4', 77, 88, 'Corona Virus', 'Five', '2020-03-17 13:30:21', 88, 'T123', NULL, NULL),
(7, 'G123123', 8, 'Amoxicillin 500mg -  3/4\r\nParacetemol 500mg -  3/4', 77, 88, 'Corona Virus', 'Five', '2020-03-17 13:31:21', 88, 'T123', NULL, NULL),
(13, 'cm980001', 10, NULL, 12, 12, NULL, NULL, '2020-03-23 13:56:36', 12, 'T123', '2 10 14 ', NULL),
(14, 'cm980001', 15, NULL, 12, 12, NULL, NULL, '2020-03-23 14:25:19', 12, 'T123', '12 14 16 ', NULL),
(15, 'cm980001', 15, NULL, 12, 12, NULL, NULL, '2020-03-23 14:26:47', 12, 'T123', '11 15 20 ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient-info`
--

CREATE TABLE `patient-info` (
  `pdid` bigint(20) NOT NULL,
  `pnid` varchar(20) NOT NULL,
  `paddress` text,
  `pgender` int(11) NOT NULL,
  `pcategory` int(11) NOT NULL,
  `pfname` text NOT NULL,
  `plname` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NULL DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `pnid` varchar(20) NOT NULL,
  `paddress` text,
  `pgender` int(11) NOT NULL,
  `pcategory` int(11) NOT NULL,
  `pfname` text NOT NULL,
  `plname` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` text,
  `phone` text,
  `dob` date DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `bp` float DEFAULT NULL,
  `bmi` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`pnid`, `paddress`, `pgender`, `pcategory`, `pfname`, `plname`, `timestamp`, `last_updated`, `comments`, `phone`, `dob`, `height`, `weight`, `bp`, `bmi`) VALUES
('jbhjbh', ' bbn', 1, 0, 'nkbmn', 'jhbjbh', '2020-03-04 10:18:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('T123123', 'Nabuti Rd.', 0, 1, 'Omkar ', 'Bahiwal', '2020-03-04 12:13:06', NULL, NULL, '183749812', '1998-09-10', NULL, NULL, NULL, NULL),
('2-638746', 'Soroti', 1, 0, 'Shalom', 'Apolot', '2020-03-04 13:26:45', NULL, NULL, '3487623487632', '1999-04-03', NULL, NULL, NULL, NULL),
('2638', 'Soroti', 1, 0, 'Shalom', 'Apolot', '2020-03-04 16:50:11', NULL, NULL, '348762348763', '1999-04-03', NULL, NULL, NULL, NULL),
('999999999', 'Init', 1, 1, 'Init', 'Init', '2020-03-05 09:50:14', '2020-03-05 09:48:44', 'Initial Record for the succeeding tokens.. ', 'init', '2020-03-05', NULL, NULL, NULL, NULL),
('cm980001', 'kigombya', 0, 0, 'Wilfred', 'Byamukama', '2020-03-06 11:03:52', NULL, NULL, '0702885074', '1999-01-01', 12, 12, 12, NULL),
('G123123', 'Nabuti Rd.', 0, 1, 'Ryo', 'Kobayashi', '2020-03-11 21:54:24', '2020-03-11 21:54:24', NULL, '12389123010', '1996-08-04', 77, 88, 88, NULL),
('8989', 'UCU, Mukono', 0, 0, 'Sam', 'Okodan', '2020-03-16 11:14:46', '2020-03-16 11:14:46', NULL, '123213123', '1996-09-25', 123, 123, 123, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `refid` bigint(20) NOT NULL,
  `token` text NOT NULL,
  `pnid` text NOT NULL,
  `docid` text NOT NULL,
  `comments` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`refid`, `token`, `pnid`, `docid`, `comments`, `created_at`, `active`) VALUES
(1, '0', '999999999', 'T123', NULL, '2020-03-17 14:55:53', 0),
(15, '0', 'cm980001', 'T123', '', '2020-03-23 14:25:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tokens_table`
--

CREATE TABLE `tokens_table` (
  `tokenid` bigint(20) NOT NULL,
  `token` text NOT NULL,
  `pnid` bigint(20) NOT NULL,
  `docid` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`docid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `opd_prescription`
--
ALTER TABLE `opd_prescription`
  ADD PRIMARY KEY (`refid`);

--
-- Indexes for table `patient-info`
--
ALTER TABLE `patient-info`
  ADD PRIMARY KEY (`pdid`),
  ADD UNIQUE KEY `unique-nid` (`pnid`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`refid`);

--
-- Indexes for table `tokens_table`
--
ALTER TABLE `tokens_table`
  ADD PRIMARY KEY (`tokenid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `docid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `mid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  MODIFY `stockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opd_prescription`
--
ALTER TABLE `opd_prescription`
  MODIFY `refid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient-info`
--
ALTER TABLE `patient-info`
  MODIFY `pdid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `refid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tokens_table`
--
ALTER TABLE `tokens_table`
  MODIFY `tokenid` bigint(20) NOT NULL AUTO_INCREMENT;
