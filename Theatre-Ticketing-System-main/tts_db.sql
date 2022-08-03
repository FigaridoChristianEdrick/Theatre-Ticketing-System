-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 06:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_user` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `admin_pass` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `admin_verif_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_email`, `admin_user`, `admin_pass`, `admin_verif_code`) VALUES
(1, 'cinemo083@gmail.com', 'Admin', '$2y$10$Fc.uqsqPVJ.gFYWE9AcZouhbGiJphjSW22s4.ZJPOTyQIemieAueO', '539422');

-- --------------------------------------------------------

--
-- Table structure for table `booked_tbl`
--

CREATE TABLE `booked_tbl` (
  `cust_name` text NOT NULL,
  `cust_date` date DEFAULT NULL,
  `cust_status` tinyint(4) DEFAULT NULL,
  `play_id` int(11) NOT NULL,
  `cust_unique_code` text NOT NULL,
  `cust_totalTickets` int(11) NOT NULL,
  `cust_totalPaid` int(11) DEFAULT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_tbl`
--

CREATE TABLE `client_tbl` (
  `client_id` int(11) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_fname` varchar(20) NOT NULL,
  `client_lname` varchar(20) NOT NULL,
  `client_pass` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `client_verif_code` text NOT NULL,
  `client_verif_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_tbl`
--

INSERT INTO `client_tbl` (`client_id`, `client_email`, `client_fname`, `client_lname`, `client_pass`, `client_verif_code`, `client_verif_at`) VALUES
(9, 'drobrigado@gmail.com', 'Darrel', 'Robrigado', '$2y$10$1LAZ3hBJJ9y6HQyKXVCsae.2jOSh0oP.P.1wve2Q6QlnoL5Jcdmhm', '153826', '2022-07-27 04:59:27'),
(10, 'arisaismyangel@gmail.com', 'Maria', 'Tamayo', '$2y$10$HcREWOnLoOfrrKXYZMHLee9JJZ3N5bIdYi.9tR9RI2ibMOjJM35Ly', '241595', '2022-07-27 23:29:35'),
(16, 'cinemo083@gmail.com', 'Admin', 'Test', '$2y$10$ILmorxZfSRLzH/wNMkGCxuT0LKnUAHiltrIP1p6IVNKAoIdEJTtGm', '547336', '2022-07-28 20:32:28'),
(29, '201911404@gordoncollege.edu.ph', 'Edrick', 'Figarido', '$2y$10$gmThXnv8aJreX8xZa48lHexA/FXfaXd.bNKyv2ZduZr7O6HoZ1QT6', '288797', '2022-08-03 23:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `history_tbl`
--

CREATE TABLE `history_tbl` (
  `history_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `history_date` date DEFAULT NULL,
  `history_payment` text NOT NULL,
  `play_id` int(11) NOT NULL,
  `play_title` text NOT NULL,
  `history_quantity` int(11) NOT NULL,
  `history_total` int(11) NOT NULL,
  `history_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_tbl`
--

INSERT INTO `history_tbl` (`history_id`, `client_id`, `history_date`, `history_payment`, `play_id`, `play_title`, `history_quantity`, `history_total`, `history_time`) VALUES
(1, 9, '2022-08-02', 'Gcash', 21, 'golden theme', 1, 10, '07:29:42'),
(2, 9, '2022-08-02', 'Gcash', 21, 'golden theme', 2, 20, '07:29:51'),
(3, 9, '2022-08-02', 'Gcash', 21, 'golden theme', 1, 10, '07:36:01'),
(4, 9, '2022-08-02', 'On Arrival', 21, 'golden theme', 1, 10, '07:43:41'),
(5, 9, '2022-08-02', 'On Arrival', 21, 'golden theme', 1, 10, '07:44:56'),
(8, 9, '2022-08-02', 'Gcash', 23, 'Pase Tander', 2, 20, '12:54:03'),
(30, 29, '2022-08-04', 'On Arrival', 32, 'Love and Thunder', 2, 40, '00:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `theatre_tbl`
--

CREATE TABLE `theatre_tbl` (
  `play_id` int(255) NOT NULL,
  `play_title` text NOT NULL,
  `play_price` int(255) NOT NULL,
  `play_date` date NOT NULL,
  `play_time` time NOT NULL,
  `play_tickets` int(255) NOT NULL,
  `ticket_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre_tbl`
--

INSERT INTO `theatre_tbl` (`play_id`, `play_title`, `play_price`, `play_date`, `play_time`, `play_tickets`, `ticket_total`) VALUES
(33, 'Golden Theme', 40, '2022-08-10', '17:00:00', 0, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booked_tbl`
--
ALTER TABLE `booked_tbl`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `booked_tbl_ibfk_1` (`play_id`);

--
-- Indexes for table `client_tbl`
--
ALTER TABLE `client_tbl`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `history_tbl`
--
ALTER TABLE `history_tbl`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `theatre_tbl`
--
ALTER TABLE `theatre_tbl`
  ADD PRIMARY KEY (`play_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_tbl`
--
ALTER TABLE `booked_tbl`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `client_tbl`
--
ALTER TABLE `client_tbl`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `history_tbl`
--
ALTER TABLE `history_tbl`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `theatre_tbl`
--
ALTER TABLE `theatre_tbl`
  MODIFY `play_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_tbl`
--
ALTER TABLE `booked_tbl`
  ADD CONSTRAINT `booked_tbl_ibfk_1` FOREIGN KEY (`play_id`) REFERENCES `theatre_tbl` (`play_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_tbl`
--
ALTER TABLE `history_tbl`
  ADD CONSTRAINT `history_tbl_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_tbl` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
