-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 01:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dno` int(11) NOT NULL,
  `Dname` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT 'New Delhi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dno`, `Dname`, `Location`) VALUES
(1, 'sales', 'New Delhi'),
(2, 'tax', 'kota'),
(3, 'Human resource', 'New Delhi'),
(4, 'Manufacturing', 'Pune'),
(5, 'Quality control', 'New Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Eno` char(3) NOT NULL,
  `Ename` varchar(50) NOT NULL DEFAULT 'NIL',
  `Job_type` varchar(50) NOT NULL DEFAULT 'NIL',
  `Manager` char(3) DEFAULT NULL,
  `Hire_date` date DEFAULT NULL,
  `Dno` int(11) DEFAULT NULL,
  `Commission` decimal(10,2) DEFAULT NULL,
  `Salary` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Eno`, `Ename`, `Job_type`, `Manager`, `Hire_date`, `Dno`, `Commission`, `Salary`) VALUES
('1', 'Ravi', 'accountant', '101', '2018-03-02', 1, '2000.00', '18000.00'),
('10', 'Abhinav', 'Manager', '102', '2019-07-19', 2, '7000.00', '35000.00'),
('2', 'Rakesh', 'Clerk', '101', '2018-05-11', 1, '2500.00', '20000.00'),
('3', 'Rajesh', 'Receptionist', '101', '2019-07-02', 1, '3000.00', '15000.00'),
('4', 'Rahul', 'Manager', '101', '2018-03-09', 1, '1000.00', '27000.00'),
('5', 'Riddip', 'Peon', '101', '2018-03-01', 1, '500.00', '10000.00'),
('6', 'Atharv', 'CA', '102', '2018-07-07', 2, '0.00', '30000.00'),
('7', 'Aakash', 'Data entry operator', '102', '2019-07-12', 2, '3000.00', '25000.00'),
('8', 'Ajit', 'Peon', '102', '2021-07-08', 2, '1000.00', '10000.00'),
('9', 'Ataashi', 'CA', '102', '2018-03-01', 2, '0.00', '35000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dno`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Eno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
