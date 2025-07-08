-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 02:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinereserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uname`, `admin_email`, `admin_pwd`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$1emlBZme09bDhnjf8H2ZRODhAjWk94NE9Ancn7F/1BD/.QsIyLN1q');

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `airline_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`airline_id`, `name`, `seats`) VALUES
(3, 'Spark Airways', 125),
(4, 'Peak Airways', 210),
(5, 'Homelander Airways', 185),
(9, 'Blue Airlines', 200),
(10, 'GoldStar Airways', 205),
(11, 'Novar Airways', 158),
(12, 'Aero Airways', 210),
(13, 'Nep Airways', 215),
(14, 'Delta Airlines', 135),
(16, 'Core Airways', 125);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city`) VALUES
('San Jose'),
('Chicago'),
('Olisphis'),
('Shiburn'),
('Weling'),
('Chiby'),
('Odonhull'),
('Hegan'),
('Oriaridge'),
('Flerough'),
('Yleigh'),
('Oyladnard'),
('Trerdence'),
('Zhotrora'),
('Otiginia'),
('Plueyby'),
('Vrexledo'),
('Ariosey');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `q1` varchar(250) NOT NULL,
  `q2` varchar(20) NOT NULL,
  `q3` varchar(250) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `email`, `q1`, `q2`, `q3`, `rate`) VALUES
(1, 'toyeandrew@gmail.com', 'shsry', 'Search Engine', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `arrivale` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `source` varchar(20) NOT NULL,
  `airline` varchar(20) NOT NULL,
  `Seats` varchar(110) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `status` varchar(6) DEFAULT NULL,
  `issue` varchar(50) DEFAULT NULL,
  `last_seat` varchar(5) DEFAULT '',
  `bus_seats` int(11) DEFAULT 20,
  `last_bus_seat` varchar(5) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `admin_id`, `arrivale`, `departure`, `Destination`, `source`, `airline`, `Seats`, `duration`, `Price`, `status`, `issue`, `last_seat`, `bus_seats`, `last_bus_seat`) VALUES
(1, 1, '2025-07-24 10:00:00', '2025-07-23 15:00:00', 'Chicago', 'San', 'Core Airways', '58', '5 Hours', 175, '', '', '22A', 20, ''),
(2, 1, '2025-05-15 11:15:00', '2025-05-15 10:05:00', 'Chicago', 'Olisphis', 'Core Airways', '61', '1', 185, 'arr', '', '21D', 20, ''),
(3, 1, '2025-07-24 12:13:00', '2022-07-23 10:13:00', 'Weling', 'Olisphis', 'Spark Airways', '123', '2', 205, 'arr', '', '21B', 20, ''),
(4, 1, '2022-07-05 16:30:00', '2022-07-05 15:26:00', 'Weling', 'Shiburn', 'Echo Airline', '220', '1', 155, 'issue', '120', '', 20, ''),
(5, 1, '2022-07-05 15:30:00', '2022-07-05 12:30:00', 'Chiby', 'Shiburn', 'Spark Airways', '125', '3', 326, '', '', '', 20, ''),
(6, 1, '2022-07-05 17:55:00', '2022-07-05 15:30:00', 'Chiby', 'Weling', 'Spark Airways', '125', '2', 285, '', '', '', 20, ''),
(7, 1, '2022-07-05 20:50:00', '2022-07-05 18:50:00', 'Odonhull', 'Chiby', 'Spark Airways', '125', '2', 265, '', '', '', 20, ''),
(8, 1, '2022-07-06 00:55:00', '2022-07-05 17:00:00', 'Oyladnard', 'Odonhull', 'Homelander Airways', '183', '7', 615, 'arr', '', '21B', 20, ''),
(9, 1, '2022-07-05 17:09:00', '2022-07-05 16:05:00', 'Chiby', 'Olisphis', 'Peak Airways', '210', '1', 155, '', '', '', 20, ''),
(10, 1, '2022-07-06 13:10:00', '2022-07-06 11:05:00', 'Hegan', 'Shiburn', 'Core Airways', '165', '2', 200, '', '', '', 20, ''),
(11, 1, '2022-07-05 19:10:00', '2022-07-05 18:05:00', 'Oriaridge', 'Flerough', 'Echo Airline', '220', '1', 165, '', '', '', 20, ''),
(12, 1, '2022-07-05 21:10:00', '2022-07-05 19:05:00', 'Chicago', 'Yleigh', 'Peak Airways', '210', '2', 320, '', '', '', 20, ''),
(13, 1, '2022-07-05 13:50:00', '2022-07-05 12:56:00', 'Olisphis', 'Chicago', 'Core Airways', '165', '1', 110, 'issue', '110', '', 20, ''),
(14, 1, '2022-07-05 11:08:00', '2022-07-05 09:07:00', 'Oyladnard', 'San', 'Spark Airways', '125', '2', 195, 'issue', '120', '', 20, ''),
(15, 1, '2022-07-05 10:10:00', '2022-07-05 08:10:00', 'Weling', 'Chicago', 'Peak Airways', '210', '2', 125, 'issue', '120', '', 20, ''),
(16, 1, '2022-07-05 18:10:00', '2022-07-05 16:09:00', 'Flerough', 'San', 'Homelander Airways', '185', '2', 220, 'dep', '', '', 20, ''),
(17, 1, '2022-07-05 17:10:00', '2022-07-05 16:10:00', 'San', 'Chiby', 'Echo Airline', '220', '1', 125, 'arr', '', '', 20, ''),
(18, 1, '2022-07-05 19:15:00', '2022-07-05 16:12:00', 'San', 'Flerough', 'Core Airways', '165', '3', 275, 'dep', '', '', 20, ''),
(19, 1, '2022-07-05 23:40:00', '2022-07-05 20:31:00', 'Shiburn', 'Oyladnard', 'Aero Airways', '210', '3', 295, '', '', '', 20, ''),
(20, 1, '2022-07-05 23:58:00', '2022-07-05 22:14:00', 'Zhotrora', 'Trerdence', 'Aero Airways', '208', '1', 185, 'dep', '', '21B', 20, ''),
(22, 1, '2022-07-10 21:00:00', '2022-07-10 17:30:00', 'Chicago', 'San', 'Core Airways', '165', '3 hours', 1500, '', '', '', 20, ''),
(23, 1, '2025-05-20 18:00:00', '2025-05-06 18:00:00', 'Chicago', 'San', 'Core Airways', '165', '24 Hours', 1200, '', '', '', 20, ''),
(24, 1, '2025-05-01 23:00:00', '2025-04-22 23:00:00', 'Chicago', 'San', 'Core Airways', '165', '4', 3000, '', '', '', 20, ''),
(25, 1, '2025-04-23 16:43:00', '2025-04-22 04:55:00', 'Chicago', 'San', 'Core Airways', '165', '4', 5000, '', '', '', 20, ''),
(26, 1, '2025-05-15 15:00:00', '2025-05-15 10:00:00', 'Chicago', 'San', 'Core Airways', '63', '5 Hours', 175, '', '', '21B', 20, ''),
(27, 1, '2025-05-31 11:00:00', '2025-05-30 11:00:00', 'Chicago', 'San', 'Core Airways', '125', '1', 300, '', '', '', 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_profile`
--

CREATE TABLE `passenger_profile` (
  `passenger_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `mobile` varchar(110) NOT NULL,
  `dob` datetime NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `passenger_profile`
--

INSERT INTO `passenger_profile` (`passenger_id`, `user_id`, `flight_id`, `mobile`, `dob`, `f_name`, `m_name`, `l_name`) VALUES
(1, 1, 1, '2147483647', '1995-01-01 00:00:00', 'Christine', 'M', 'Moore'),
(2, 2, 3, '2147483647', '1995-02-13 00:00:00', 'Henry', 'l', 'Stuart'),
(3, 3, 2, '2147483647', '1994-06-21 00:00:00', 'Andre', 'J', 'Atkins'),
(4, 4, 2, '2147483647', '1995-05-16 00:00:00', 'James', 'K', 'Harbuck'),
(5, 2, 8, '7854444411', '1995-02-13 00:00:00', 'Henry', 'l', 'Stuart'),
(6, 2, 20, '7412585555', '1995-02-13 00:00:00', 'Henry', 'l', 'Stuart'),
(7, 1, 1, '9090900765', '2006-02-02 00:00:00', 'Dale', 'Alma Mcgowan', 'Cleveland'),
(8, 1, 1, '20909099876', '2011-07-06 00:00:00', 'Beau', 'Winter Hinton', 'Rollins'),
(9, 1, 1, '8106566534', '2000-04-04 00:00:00', 'john', 'Paul', 'Innocent'),
(10, 1, 1, '9090877654', '2003-02-02 00:00:00', 'Sunday', 'Paul', 'Achie'),
(11, 1, 1, '9090766543', '1976-08-09 00:00:00', 'Macaulay', 'Rana Chan', 'Cunningham'),
(12, 1, 1, '9090766543', '2019-10-08 00:00:00', 'Emmanuel', 'Claire Fields', 'Barnes'),
(13, 1, 1, '9090355456', '2013-10-27 00:00:00', 'Yetta', 'Amelia Hogan', 'Douglas'),
(14, 1, 1, '9090355456', '2017-08-06 00:00:00', 'Debra', 'Marah Oneal', 'Frost'),
(15, 1, 1, '9090877654', '2022-05-12 00:00:00', 'Tate', 'William Tyler', 'Stewart'),
(16, 1, 1, '9090877654', '1999-06-07 00:00:00', 'Ariana', 'Rogan Boyer', 'Wilkerson'),
(17, 1, 1, '9090877654', '2018-05-30 00:00:00', 'Lamar', 'Buckminster Garner', 'Reese'),
(18, 1, 1, '9090877654', '1978-05-31 00:00:00', 'Leo', 'Gloria Marshall', 'Downs'),
(19, 1, 1, '9090544534', '1995-06-30 00:00:00', 'Allistair', 'Brady Sanders', 'Mcdowell'),
(20, 1, 1, '9090544534', '2020-01-16 00:00:00', 'Cathleen', 'Liberty Dotson', 'Everett');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `card_no` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `expire_date` varchar(5) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`card_no`, `user_id`, `flight_id`, `expire_date`, `amount`) VALUES
('1010555677851111', 4, 2, '10/26', 370),
('1020445869651011', 2, 20, '12/25', 370),
('1111888889897778', 2, 3, '12/25', 205),
('1400565800004478', 2, 8, '12/25', 1230),
('1458799990001450', 3, 2, '12/25', 185),
('4111106369199156', 1, 1, '12/30', 350),
('4204558500014587', 1, 1, '02/25', 350),
('xxxx-xxxx-xxxx', 1, 1, '00/00', 350);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwd_reset_id` int(11) NOT NULL,
  `pwd_reset_email` varchar(50) NOT NULL,
  `pwd_reset_selector` varchar(80) NOT NULL,
  `pwd_reset_token` varchar(120) NOT NULL,
  `pwd_reset_expires` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_no` varchar(10) NOT NULL,
  `cost` int(11) NOT NULL,
  `class` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `passenger_id`, `flight_id`, `user_id`, `seat_no`, `cost`, `class`) VALUES
(1, 1, 1, 1, '21A', 350, 'E'),
(2, 2, 3, 2, '21A', 205, 'E'),
(4, 3, 2, 3, '21A', 185, 'E'),
(6, 4, 2, 4, '21C', 370, 'E'),
(8, 5, 8, 2, '21A', 1230, 'E'),
(10, 6, 20, 2, '21A', 370, 'E'),
(12, 19, 1, 1, '21C', 350, 'E'),
(13, 20, 1, 1, '21D', 350, 'E'),
(15, 19, 1, 1, '21F', 350, 'E'),
(16, 20, 1, 1, '22A', 350, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'user', 'user@user.com', '$2y$10$iJojo6IKg1cDQjpex9e/leyAkN.5k7snhCOa1cxzGHRfi8cPwyu5e'),
(2, 'henry', 'henry@mail.com', '$2y$10$zr.UlaKFEhBdcirNaa03ceV8Y31Jiw5KSFboVYasgZBwxoddtVWwO'),
(3, 'andre', 'andre@mail.com', '$2y$10$zr.UlaKFEhBdcirNaa03ceV8Y31Jiw5KSFboVYasgZBwxoddtVWwO'),
(4, 'james', 'james@mail.com', '$2y$10$zr.UlaKFEhBdcirNaa03ceV8Y31Jiw5KSFboVYasgZBwxoddtVWwO'),
(5, 'wakawaka', 'wakawaks@gmail.com', '$2y$10$9rscJPJNoJUIasBidOTSueToKDvfxL8Jcrrx..PdUACRWWQ9ILYim'),
(6, 'darkseid', 'darkseid@gmail.com', '$2y$10$zr.UlaKFEhBdcirNaa03ceV8Y31Jiw5KSFboVYasgZBwxoddtVWwO'),
(7, 'john', 'idahjohn@gmail.com', '$2y$10$nMDQuHCmqzNqr28f6KCT6.tpYiPQn3FiF.fdmaCE8RvlN87yRHMAK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`card_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airline`
--
ALTER TABLE `airline`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD CONSTRAINT `passenger_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `passenger_profile_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_profile` (`passenger_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
