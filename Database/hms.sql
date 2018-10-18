-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 09:13 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `delay_time` time NOT NULL,
  `pat_id` varchar(5) NOT NULL,
  `rec_id` varchar(5) NOT NULL,
  `dr_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `bed_id` varchar(5) NOT NULL,
  `status` int(1) NOT NULL,
  `room_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` varchar(5) NOT NULL,
  `amount` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(5) NOT NULL,
  `dept_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `dr_id` varchar(5) NOT NULL,
  `dr_type` varchar(20) NOT NULL,
  `dept_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inpatient`
--

CREATE TABLE `inpatient` (
  `inPat_id` int(3) NOT NULL,
  `pat_id` varchar(5) NOT NULL,
  `bed_id` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_assistant`
--

CREATE TABLE `lab_assistant` (
  `labAss_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` varchar(5) NOT NULL,
  `med_name` varchar(20) NOT NULL,
  `pre_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `med_record`
--

CREATE TABLE `med_record` (
  `mr_id` varchar(5) NOT NULL,
  `mr_date` date NOT NULL,
  `pat_id` varchar(5) NOT NULL,
  `rep_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurse_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nursing_services`
--

CREATE TABLE `nursing_services` (
  `nurse_id` varchar(5) NOT NULL,
  `inPat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `op_id` int(3) NOT NULL,
  `dr_id` varchar(5) NOT NULL,
  `inPat_id` int(3) NOT NULL,
  `op_cost` decimal(7,2) NOT NULL,
  `op_date` date NOT NULL,
  `op_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pat_id` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pat_service`
--

CREATE TABLE `pat_service` (
  `pat_id` varchar(5) NOT NULL,
  `serv_id` varchar(5) NOT NULL,
  `serv_date` date NOT NULL,
  `bill_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pat_test`
--

CREATE TABLE `pat_test` (
  `test_id` varchar(5) NOT NULL,
  `pat_id` varchar(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `pre_id` varchar(5) NOT NULL,
  `app_id` varchar(5) NOT NULL,
  `fee` int(4) NOT NULL,
  `dr_id` varchar(5) NOT NULL,
  `pat_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `private_room`
--

CREATE TABLE `private_room` (
  `private_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `rec_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` varchar(5) NOT NULL,
  `rep_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(5) NOT NULL,
  `room_type` varchar(7) NOT NULL,
  `charge` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serv_id` varchar(5) NOT NULL,
  `serv_type` varchar(20) NOT NULL,
  `serv_charge` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(2) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `salary` decimal(7,2) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `DOB` date NOT NULL,
  `shift_id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fees` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `test_id` varchar(5) NOT NULL,
  `pat_id` varchar(5) NOT NULL,
  `dr_id` varchar(5) NOT NULL,
  `LabAss_id` varchar(5) NOT NULL,
  `rep_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` varchar(5) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `rec_id` (`rec_id`),
  ADD KEY `dr_id` (`dr_id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`bed_id`,`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`dr_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `inpatient`
--
ALTER TABLE `inpatient`
  ADD PRIMARY KEY (`inPat_id`),
  ADD KEY `bed_id` (`bed_id`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `lab_assistant`
--
ALTER TABLE `lab_assistant`
  ADD PRIMARY KEY (`labAss_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `pre_id` (`pre_id`);

--
-- Indexes for table `med_record`
--
ALTER TABLE `med_record`
  ADD PRIMARY KEY (`mr_id`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `rep_id` (`rep_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `nursing_services`
--
ALTER TABLE `nursing_services`
  ADD PRIMARY KEY (`nurse_id`,`inPat_id`),
  ADD KEY `inPat_id` (`inPat_id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `inPat_id` (`inPat_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `pat_service`
--
ALTER TABLE `pat_service`
  ADD PRIMARY KEY (`pat_id`,`serv_id`),
  ADD KEY `serv_id` (`serv_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `pat_test`
--
ALTER TABLE `pat_test`
  ADD PRIMARY KEY (`test_id`,`pat_id`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pre_id`);

--
-- Indexes for table `private_room`
--
ALTER TABLE `private_room`
  ADD PRIMARY KEY (`private_id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`test_id`,`pat_id`,`LabAss_id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `LabAss_id` (`LabAss_id`),
  ADD KEY `rep_id` (`rep_id`),
  ADD KEY `pat_test_id` (`pat_id`,`test_id`) USING BTREE;

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inpatient`
--
ALTER TABLE `inpatient`
  MODIFY `inPat_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `op_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`rec_id`) REFERENCES `receptionist` (`rec_id`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`);

--
-- Constraints for table `bed`
--
ALTER TABLE `bed`
  ADD CONSTRAINT `bed_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `inpatient`
--
ALTER TABLE `inpatient`
  ADD CONSTRAINT `inpatient_ibfk_2` FOREIGN KEY (`bed_id`) REFERENCES `bed` (`bed_id`),
  ADD CONSTRAINT `inpatient_ibfk_3` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`);

--
-- Constraints for table `lab_assistant`
--
ALTER TABLE `lab_assistant`
  ADD CONSTRAINT `lab_assistant_ibfk_1` FOREIGN KEY (`labAss_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`pre_id`) REFERENCES `prescription` (`pre_id`);

--
-- Constraints for table `med_record`
--
ALTER TABLE `med_record`
  ADD CONSTRAINT `med_record_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`),
  ADD CONSTRAINT `med_record_ibfk_2` FOREIGN KEY (`rep_id`) REFERENCES `report` (`rep_id`);

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `nursing_services`
--
ALTER TABLE `nursing_services`
  ADD CONSTRAINT `nursing_services_ibfk_1` FOREIGN KEY (`inPat_id`) REFERENCES `inpatient` (`inPat_id`),
  ADD CONSTRAINT `nursing_services_ibfk_2` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`nurse_id`);

--
-- Constraints for table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`),
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`inPat_id`) REFERENCES `inpatient` (`inPat_id`);

--
-- Constraints for table `pat_service`
--
ALTER TABLE `pat_service`
  ADD CONSTRAINT `pat_service_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`),
  ADD CONSTRAINT `pat_service_ibfk_2` FOREIGN KEY (`serv_id`) REFERENCES `service` (`serv_id`),
  ADD CONSTRAINT `pat_service_ibfk_3` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`);

--
-- Constraints for table `pat_test`
--
ALTER TABLE `pat_test`
  ADD CONSTRAINT `pat_test_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`),
  ADD CONSTRAINT `pat_test_ibfk_2` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`);

--
-- Constraints for table `private_room`
--
ALTER TABLE `private_room`
  ADD CONSTRAINT `private_room_ibfk_1` FOREIGN KEY (`private_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_details`
--
ALTER TABLE `test_details`
  ADD CONSTRAINT `test_details_ibfk_1` FOREIGN KEY (`pat_id`,`test_id`) REFERENCES `pat_test` (`pat_id`, `test_id`),
  ADD CONSTRAINT `test_details_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`),
  ADD CONSTRAINT `test_details_ibfk_3` FOREIGN KEY (`LabAss_id`) REFERENCES `lab_assistant` (`labAss_id`),
  ADD CONSTRAINT `test_details_ibfk_4` FOREIGN KEY (`rep_id`) REFERENCES `report` (`rep_id`);

--
-- Constraints for table `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `ward_ibfk_1` FOREIGN KEY (`ward_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
