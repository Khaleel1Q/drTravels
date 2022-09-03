-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 08:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `cname` varchar(55) NOT NULL,
  `tenth` float(5,2) NOT NULL,
  `twelve` float(5,2) NOT NULL,
  `avg_of_sems` float(5,2) NOT NULL,
  `backs` int(1) NOT NULL,
  `branches` varchar(55) NOT NULL,
  `website` varchar(255) NOT NULL,
  `last_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cname`, `tenth`, `twelve`, `avg_of_sems`, `backs`, `branches`, `website`, `last_date`) VALUES
('google', 60.00, 60.00, 60.00, 0, 'CSE,EC,EEE', 'https://www.google.com/', '2021-01-08 17:42:00'),
('TCS', 60.00, 60.00, 6.00, 1, 'CIV,CS,EC,EEE,ME', 'https://tcs.com', '2020-12-31 08:31:57'),
('TechMahindra', 60.00, 60.00, 6.00, 0, 'CSE', 'www.facebook.com', '2021-01-02 16:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_status`
--

CREATE TABLE `company_status` (
  `cname` varchar(55) NOT NULL,
  `cstatus` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `completed_drives`
--

CREATE TABLE `completed_drives` (
  `cname` varchar(25) NOT NULL,
  `completed` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completed_drives`
--

INSERT INTO `completed_drives` (`cname`, `completed`) VALUES
('Facebook', 'Drive Complete');

-- --------------------------------------------------------

--
-- Table structure for table `placed_students`
--

CREATE TABLE `placed_students` (
  `usn` varchar(10) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `package` varchar(12) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placed_students`
--

INSERT INTO `placed_students` (`usn`, `cname`, `package`, `year`) VALUES
('1KG16CS040', 'Facebook', '3.5 LPA', '2019'),
('1KG16CS043', 'Facebook', '3.5 LPA', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `previouscompanies`
--

CREATE TABLE `previouscompanies` (
  `cname` varchar(25) NOT NULL,
  `year` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previouscompanies`
--

INSERT INTO `previouscompanies` (`cname`, `year`) VALUES
('Facebook', '2018'),
('Facebook', '2019'),
('Google', '2018'),
('Google', '2019'),
('J.P Morgan', '2017'),
('NTT DATA', '2018'),
('NTT DATA', '2019'),
('TCS', '2018'),
('TCS', '2019'),
('TechMahindra', '2018'),
('TechMahindra', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `previous_students`
--

CREATE TABLE `previous_students` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `branch` varchar(4) NOT NULL,
  `passing_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previous_students`
--

INSERT INTO `previous_students` (`usn`, `name`, `branch`, `passing_year`) VALUES
('1KG15CS001', 'asd', 'CSE', 2018),
('1KG15CS002', 'bnm', 'CSE', 2018),
('1KG15CS003', 'hcv', 'CSE', 2018),
('1KG15CS004', 'Jack', 'CSE', 2018),
('1KG15CS005', 'Jackob', 'CSE', 2018),
('1KG16CS001', 'AAAA', 'CSE', 2019),
('1KG16CS002', 'BBBBB', 'CSE', 2019),
('1KG16CS003', 'CCCCCCC', 'CSE', 2019),
('1KG16CS035', 'Harshit', 'CSE', 2020),
('1KG16CS040', 'Manoj', 'CSE', 2019),
('1KG16CS043', 'Lokesh', 'CSE', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(13) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(35) NOT NULL DEFAULT 'Not Updated',
  `phone` bigint(10) NOT NULL DEFAULT 0,
  `branch` varchar(4) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `gender`, `email`, `phone`, `branch`, `password`) VALUES
('1KG17CS035', 'Lokesh', 'male', 'lokesh@gmail.com', 7896541230, 'CSE', 'Lokesh@12345'),
('1KG17CS037', 'Mahesh', 'male', 'mahesh@gmail.com', 9874563210, 'CSE', '12345'),
('1KG17CS040', 'Manoj', 'male', 'Not Updated', 0, 'cse', 'Manoj@1Q'),
('1KG17CS043', 'Khaleel', 'male', 'kahleelmohammed0770@gmail.com', 8971011301, 'cse', 'Khaleel@12345'),
('1KG17CS044', 'Moin', 'male', 'Moin@gmail.com', 7547983210, 'CSE', 'Moin@588'),
('1KG17CS048', 'Uzair', 'male', 'uzair@gmail.com', 7896541236, 'CSE', '12345'),
('1KG17CS049', 'Naveen', 'male', 'Not Updated', 0, 'cse', 'Naveen@12345');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `reminder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `reminder`) VALUES
(1, 'Registrations for TechMahindra Campus Recruitment Drive have Begun. Make sure to check Eligibility and Register Before Last Date.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`cname`);

--
-- Indexes for table `company_status`
--
ALTER TABLE `company_status`
  ADD PRIMARY KEY (`cname`,`cstatus`);

--
-- Indexes for table `placed_students`
--
ALTER TABLE `placed_students`
  ADD PRIMARY KEY (`usn`,`cname`),
  ADD KEY `cname` (`cname`);

--
-- Indexes for table `previouscompanies`
--
ALTER TABLE `previouscompanies`
  ADD PRIMARY KEY (`cname`,`year`);

--
-- Indexes for table `previous_students`
--
ALTER TABLE `previous_students`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `placed_students`
--
ALTER TABLE `placed_students`
  ADD CONSTRAINT `placed_students_ibfk_2` FOREIGN KEY (`cname`) REFERENCES `previouscompanies` (`cname`),
  ADD CONSTRAINT `placed_students_ibfk_3` FOREIGN KEY (`usn`) REFERENCES `previous_students` (`usn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
