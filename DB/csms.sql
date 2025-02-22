-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 10:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `csms_admin`
--

CREATE TABLE `csms_admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csms_admin`
--

INSERT INTO `csms_admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin123', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `csms_bill`
--

CREATE TABLE `csms_bill` (
  `bno` int(11) NOT NULL,
  `bdate` datetime NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cmobile` bigint(20) NOT NULL,
  `bamnt` decimal(8,2) NOT NULL,
  `tot_quan` int(11) NOT NULL,
  `bd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csms_bill`
--

INSERT INTO `csms_bill` (`bno`, `bdate`, `cname`, `cmobile`, `bamnt`, `tot_quan`, `bd`) VALUES
(1001, '2021-01-27 10:20:38', 'Guru', 7204298393, '910.00', 3, '2021-01-27'),
(1002, '2021-01-28 11:52:52', 'Arjun', 7788998899, '1190.00', 3, '2021-01-28'),
(1003, '2021-01-29 11:53:19', 'Likith', 5678900987, '600.00', 2, '2021-01-29'),
(1004, '2021-01-29 11:59:28', 'John', 8019901990, '3420.00', 6, '2021-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `csms_book`
--

CREATE TABLE `csms_book` (
  `bid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cmobile` bigint(20) NOT NULL,
  `cemail` varchar(30) NOT NULL,
  `bfee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csms_book`
--

INSERT INTO `csms_book` (`bid`, `tid`, `bdate`, `cname`, `cmobile`, `cemail`, `bfee`) VALUES
(1, 3, '2021-01-18', 'Guru', 7204298393, 'guru@gmail.com', 200);

-- --------------------------------------------------------

--
-- Table structure for table `csms_coffee`
--

CREATE TABLE `csms_coffee` (
  `cid` int(11) NOT NULL,
  `bcode` varchar(10) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `ctype` varchar(30) NOT NULL,
  `cprice` decimal(8,2) NOT NULL,
  `cdesc` text NOT NULL,
  `cstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csms_coffee`
--

INSERT INTO `csms_coffee` (`cid`, `bcode`, `cname`, `ctype`, `cprice`, `cdesc`, `cstatus`) VALUES
(1, 'M0001', 'Vennila', 'Light', '200.00', 'coffee 1', 1),
(2, 'M0002', 'Affogato', 'Dark', '220.00', 'bla bla', 1),
(3, 'M0003', 'Coffe Mocha', 'Dark', '450.00', 'bla bla', 1),
(4, 'M0004', 'Cappuccino', 'Light', '330.00', 'cappuccino Light', 1),
(5, 'M0005', 'Cappuccino-D', 'Dark', '440.00', 'Cappuccino Dark', 1),
(6, 'M0006', 'Cold Brew Coffee', 'Dark', '650.00', 'Cold Brew Coffee new', 1),
(7, 'M0007', 'Espressoo ', 'Light', '380.00', 'Espresso Light', 1),
(8, 'M0008', 'Flat white', 'Light', '220.00', 'Flat White - Light ', 1),
(9, 'M0009', 'Flat white - D', 'Dark', '320.00', 'Flat white - dark', 1),
(11, 'M0010', 'Cold Coffee', 'Light', '110.50', 'bla bla bla', 1);

-- --------------------------------------------------------

--
-- Table structure for table `csms_sale`
--

CREATE TABLE `csms_sale` (
  `sno` int(11) NOT NULL,
  `bno` int(11) NOT NULL,
  `bcode` varchar(10) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `ctype` varchar(30) NOT NULL,
  `cprice` int(11) NOT NULL,
  `cquan` int(11) NOT NULL,
  `tamount` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csms_sale`
--

INSERT INTO `csms_sale` (`sno`, `bno`, `bcode`, `cname`, `ctype`, `cprice`, `cquan`, `tamount`) VALUES
(1, 1001, 'M0001', 'Vennila', 'Light', 200, 1, '200.00'),
(2, 1001, 'M0004', 'Cappuccino', 'Light', 330, 1, '330.00'),
(3, 1001, 'M0007', 'Espressoo ', 'Light', 380, 1, '380.00'),
(4, 1002, 'M0006', 'Cold Brew Coffee', 'Dark', 650, 1, '650.00'),
(5, 1002, 'M0008', 'Flat white', 'Light', 220, 1, '220.00'),
(6, 1002, 'M0009', 'Flat white - D', 'Dark', 320, 1, '320.00'),
(7, 1003, 'M0007', 'Espressoo ', 'Light', 380, 1, '380.00'),
(8, 1003, 'M0002', 'Affogato', 'Dark', 220, 1, '220.00'),
(9, 1004, 'M0005', 'Cappuccino-D', 'Dark', 440, 1, '440.00'),
(10, 1004, 'M0006', 'Cold Brew Coffee', 'Dark', 650, 4, '2600.00'),
(11, 1004, 'M0007', 'Espressoo ', 'Light', 380, 1, '380.00');

-- --------------------------------------------------------

--
-- Table structure for table `csms_table`
--

CREATE TABLE `csms_table` (
  `tid` int(11) NOT NULL,
  `tstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csms_table`
--

INSERT INTO `csms_table` (`tid`, `tstatus`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csms_admin`
--
ALTER TABLE `csms_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `csms_bill`
--
ALTER TABLE `csms_bill`
  ADD PRIMARY KEY (`bno`);

--
-- Indexes for table `csms_book`
--
ALTER TABLE `csms_book`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `csms_coffee`
--
ALTER TABLE `csms_coffee`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `bcode` (`bcode`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `csms_sale`
--
ALTER TABLE `csms_sale`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `csms_table`
--
ALTER TABLE `csms_table`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csms_admin`
--
ALTER TABLE `csms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `csms_bill`
--
ALTER TABLE `csms_bill`
  MODIFY `bno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `csms_book`
--
ALTER TABLE `csms_book`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `csms_coffee`
--
ALTER TABLE `csms_coffee`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `csms_sale`
--
ALTER TABLE `csms_sale`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `csms_table`
--
ALTER TABLE `csms_table`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
