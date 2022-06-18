-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 10:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `ad_password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ad_id`, `ad_name`, `username`, `ad_password`) VALUES
(1, 'Noman', 'noman', 'noman');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `A_ID` int(10) NOT NULL,
  `Doctor_id` int(50) NOT NULL,
  `patient` int(50) NOT NULL,
  `city` int(50) NOT NULL,
  `A_Date` date NOT NULL,
  `metting_time` time DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`A_ID`, `Doctor_id`, `patient`, `city`, `A_Date`, `metting_time`, `status`) VALUES
(2, 6, 3, 1, '2021-02-09', '35:15:22', 'avalable'),
(7, 28, 1, 1, '2021-02-25', '00:00:00', ''),
(8, 6, 1, 1, '2021-02-17', '00:00:00', ''),
(9, 6, 1, 1, '2021-02-17', '00:00:00', ''),
(10, 6, 1, 1, '2021-02-17', '00:00:00', ''),
(11, 6, 1, 1, '2021-02-17', '00:00:00', ''),
(16, 1, 2, 1, '2021-02-09', '35:15:22', 'notavalable'),
(17, 7, 1, 6, '2020-02-09', NULL, 'Aproved');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_id` int(11) NOT NULL,
  `City_name` varchar(50) DEFAULT NULL,
  `City_zipcode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_id`, `City_name`, `City_zipcode`) VALUES
(1, 'Gulshen-Iqbal', '40500'),
(2, 'Garden', '39434'),
(6, 'Lyari', '2000090');

-- --------------------------------------------------------

--
-- Table structure for table `cures`
--

CREATE TABLE `cures` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(50) DEFAULT NULL,
  `C_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cures`
--

INSERT INTO `cures` (`C_id`, `C_name`, `C_description`) VALUES
(1, 'voucheer', 'my name is disease'),
(2, 'a', 's'),
(3, 'q', 'w'),
(4, 'a', 's');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `D_id` int(11) NOT NULL,
  `D_name` varchar(50) DEFAULT NULL,
  `D_description` text DEFAULT NULL,
  `D_image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`D_id`, `D_name`, `D_description`, `D_image`) VALUES
(2, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local ssss for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'download.jpg'),
(3, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'download.jpg'),
(4, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'download.jpg'),
(5, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'download.jpg'),
(6, 'Malira', 'For informational purposes ty for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', '58e3a532e7ef3_thumb900.jpg'),
(7, 'Malira', 'For informational purposes ty for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', '58e3a532e7ef3_thumb900.jpg'),
(8, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'ggslogo.psd'),
(9, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'download.jpg'),
(11, 'Corona', 'y. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'itl.cat_php-wallpaper_3274626.png'),
(12, 'Corona', 'For informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'download.jpg'),
(14, 'Corona', 'For informational purposes ty for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for adviceFor informational purposes only. Consult your local medical authority for advice', 'PngItem_1444523.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(20) NOT NULL,
  `Doc_name` varchar(50) NOT NULL,
  `Doc_l_name` varchar(50) NOT NULL,
  `D_O_B` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Doc_mail` varchar(50) NOT NULL,
  `Doc_phone` bigint(20) NOT NULL,
  `specailist` int(50) NOT NULL,
  `Doc_picture` varchar(500) NOT NULL,
  `city_name` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `Doc_name`, `Doc_l_name`, `D_O_B`, `Gender`, `Doc_mail`, `Doc_phone`, `specailist`, `Doc_picture`, `city_name`, `username`, `user_password`) VALUES
(1, 'Abdul ', 'Haleem', '04-09-1990', 'Male', 'haleemhaider@gmail.com', 3434324323, 3, 'sameer.jpg', 2, 'haleem', 'haleem'),
(6, 'Farooq', 'Basir  ', '01-01-1995', 'Male', 'nomanghazi@gmail.com', 3431111111, 2, 'farooq.jpg', 2, 'farooq1', 'farooq'),
(7, 'Hassan Docror', 'Ahmed', '2014-02-13', 'Male', 'hassan@gmail.com', 325339803, 1, 'IMG-20191018-WA0003.jpg', 1, 'hassan', 'hassan'),
(13, 'bashir', 'Ahmed', '', 'Male', 'sdfggfd@gmail.com', 9539804503, 1, 'IMG-20190729-WA0000.jpg', 1, 'aaaaaaaa', '**admin##a'),
(22, 'bashir', 'Ahmed', '2021-01-01', 'Female', 'sdfggfd@gmail.com', 9539804503, 2, '11.jpg', 1, 'Nomanghazi', '**admin##**admin'),
(23, 'bashir', 'Ahmed', '2021-01-01', 'Female', 'sdfggfd@gmail.com', 9539804503, 2, '11.jpg', 1, 'Nomanghazi', '**admin##**admin'),
(28, 'bashir', 'Ahmed', '2021-01-08', 'Female', 'sdfggfd@gmail.com', 9539804503, 2, '8.jpg', 2, 'aaaaa', 'aaaaaaa'),
(31, 'bashir', 'Ahmed', '2021-02-11', 'Male', 'sdfggfd@gmail.com', 9539804503, 2, 'ghazi.jpg', 1, 'safder', 'safder');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `N_id` int(11) NOT NULL,
  `N_title` varchar(50) DEFAULT NULL,
  `N_description` text DEFAULT NULL,
  `N_image` varchar(250) DEFAULT NULL,
  `N_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `P_ID` int(10) NOT NULL,
  `P_name` varchar(50) NOT NULL,
  `p_l_name` varchar(50) NOT NULL,
  `P_gender` varchar(50) NOT NULL,
  `D_O_B` varchar(50) NOT NULL,
  `P_mail` varchar(50) NOT NULL,
  `P_phone` bigint(50) NOT NULL,
  `P_address` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`P_ID`, `P_name`, `p_l_name`, `P_gender`, `D_O_B`, `P_mail`, `P_phone`, `P_address`, `Username`, `pass`) VALUES
(1, 'Noman', 'Ghazi', 'male', '01-01-2000', 'NOMANGHAZI@GMAIL.COM', 323343432, 'gwadar', 'noman', 'mand'),
(2, 'safder', 'Rehman', 'Male', '2014-01-30', 'sadder@gmail.com', 945093475, 'saddar', 'safder', 'safder'),
(3, 'maryam', 'khkkh', 'Female', '2021-01-06', 'sdfggfd@gmail.com', 345352345, 'gdsfgdsf', 'maryam', 'eeee'),
(16, 'bashir', 'Ahmed', 'Male', '2021-02-03', 'sdfggfd@gmail.com', 9539804503, '', 'Nomanghazi', ''),
(18, 'bashir', 'Ahmed', 'Female', '2021-02-11', '', 9539804503, 'sdsdsd', 'sdsds', ''),
(19, 'Noman', 'Ghazi', 'Male', '2020-03-04', '', 3434343, 'mand', 'nomol', 'nomol');

-- --------------------------------------------------------

--
-- Table structure for table `prevention`
--

CREATE TABLE `prevention` (
  `P_id` int(11) NOT NULL,
  `P_name` varchar(50) DEFAULT NULL,
  `P_description` text DEFAULT NULL,
  `P_image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prevention`
--

INSERT INTO `prevention` (`P_id`, `P_name`, `P_description`, `P_image`) VALUES
(1, '', 'ddddd', 'wp4895255.jpg'),
(2, 'Battery', 'fffffffffffff', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specailist`
--

CREATE TABLE `specailist` (
  `SP_ID` int(11) NOT NULL,
  `Specailist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specailist`
--

INSERT INTO `specailist` (`SP_ID`, `Specailist`) VALUES
(1, 'Cardiologists'),
(2, 'Allergists'),
(3, 'Endocrinologists');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `Doctor_id` (`Doctor_id`),
  ADD KEY `patient` (`patient`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`City_id`);

--
-- Indexes for table `cures`
--
ALTER TABLE `cures`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `city_name` (`city_name`),
  ADD KEY `doctors_ibfk_2` (`specailist`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`N_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`P_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `prevention`
--
ALTER TABLE `prevention`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `specailist`
--
ALTER TABLE `specailist`
  ADD PRIMARY KEY (`SP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `A_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `City_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cures`
--
ALTER TABLE `cures`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `N_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prevention`
--
ALTER TABLE `prevention`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specailist`
--
ALTER TABLE `specailist`
  MODIFY `SP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Doctor_id`) REFERENCES `doctors` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`patient`) REFERENCES `patients` (`P_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`city`) REFERENCES `city` (`City_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`city_name`) REFERENCES `city` (`City_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`specailist`) REFERENCES `specailist` (`SP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
