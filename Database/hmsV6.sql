-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 08:04 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Afsar ', 'a123'),
(2, 'Pranita', 'p123');

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
  `dept_id` int(3) NOT NULL,
  `dept_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'ENT');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `dr_id` varchar(5) NOT NULL,
  `dr_type` varchar(20) NOT NULL,
  `dept_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`dr_id`, `dr_type`, `dept_id`) VALUES
('DOC01', 'surgeon', 1),
('DOC02', 'surgeon', 1),
('DOC03', 'surgeon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inpatient`
--

CREATE TABLE `inpatient` (
  `inPat_id` int(3) NOT NULL,
  `pat_id` varchar(5) NOT NULL,
  `bed_id` varchar(5) NOT NULL,
  `adm_date` date NOT NULL,
  `dis_date` date NOT NULL,
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
  `med_name` varchar(20) NOT NULL
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

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurse_id`) VALUES
('NUR01'),
('NUR03'),
('NUR04');

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
-- Table structure for table `pres_med`
--

CREATE TABLE `pres_med` (
  `pres_id` varchar(5) NOT NULL,
  `med_id` varchar(5) NOT NULL
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

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`rec_id`) VALUES
('REC01'),
('REC02');

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

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`) VALUES
(1, '09:00:00', '17:00:00'),
(2, '17:00:00', '01:00:00'),
(3, '01:00:00', '09:00:00');

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
  `DOB` date DEFAULT NULL,
  `shift_id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `gender`, `designation`, `salary`, `phone`, `email`, `address`, `DOB`, `shift_id`, `username`, `password`) VALUES
('DOC01', 'Afsar', 'Sheikh', 'male', 'head', '50000.00', '7038137214', 'adsf@gmail.com', 'Mapusa', '2018-10-07', 2, 'as', 'as123'),
('DOC02', 'Pranita', 'Sawant', 'female', 'assistant', '60000.00', '7038137214', 'adsf@gmail.com', 'margao', '2018-10-06', 2, 'ps', 'ps123'),
('DOC03', 'Harshad', 'Chari', 'male', 'head', '76000.00', '7038137214', 'adsf@gmail.com', 'margao', '2018-10-14', 3, 'hc', 'hc123'),
('NUR01', 'Leo', 'Ferns', 'female', 'head', '30000.00', '7038137214', 'adsf@gmail.com', 'Quepem', '2018-10-05', 2, 'lf', 'lf123'),
('NUR03', 'Shweta', 'Kauthankar', 'female', 'assistant', '20000.00', '7038137214', 'adsf@gmail.com', 'Porvorim', '2018-10-05', 3, 'sk', 'sk123'),
('NUR04', 'Joseline', 'Babu', 'female', 'assistant', '34000.00', '7038137214', 'adsf@gmail.com', 'margao', '2018-10-19', 3, 'jb', 'jb123'),
('REC01', 'cc', 'cc', 'female', 'head', '23000.00', '7038137214', 'adsf@gmail.com', 'Porvorim', '2018-10-16', 1, 'cc', 'cc123'),
('REC02', 'dd', 'dd', 'female', 'assistant', '23000.00', '7038137214', 'adsf@gmail.com', 'Porvorim', '2018-10-10', 3, 'dd', 'dd');

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `insert_staff` AFTER INSERT ON `staff` FOR EACH ROW BEGIN

IF	new.staff_id like "NUR%"
	THEN
	insert into nurse(nurse_id) VALUES (new.staff_id);
END IF;

IF	new.staff_id like "REC%"
	THEN
	insert into receptionist(rec_id) VALUES (new.staff_id);
END IF;

END
$$
DELIMITER ;

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`med_id`);

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
  ADD PRIMARY KEY (`pre_id`),
  ADD KEY `fk_doc` (`dr_id`),
  ADD KEY `fk_pat` (`pat_id`);

--
-- Indexes for table `pres_med`
--
ALTER TABLE `pres_med`
  ADD PRIMARY KEY (`pres_id`,`med_id`),
  ADD KEY `fk_med` (`med_id`);

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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE SET NULL ON UPDATE SET NULL;

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
  ADD CONSTRAINT `lab_assistant_ibfk_1` FOREIGN KEY (`labAss_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `fk_doc` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pat` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pres_med`
--
ALTER TABLE `pres_med`
  ADD CONSTRAINT `fk_med` FOREIGN KEY (`med_id`) REFERENCES `medicine` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pres` FOREIGN KEY (`pres_id`) REFERENCES `prescription` (`pre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private_room`
--
ALTER TABLE `private_room`
  ADD CONSTRAINT `private_room_ibfk_1` FOREIGN KEY (`private_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
