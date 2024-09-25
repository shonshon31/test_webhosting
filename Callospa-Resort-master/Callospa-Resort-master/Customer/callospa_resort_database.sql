-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 12:48 PM
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
-- Database: `callospa_resort_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenity_reservations`
--

CREATE TABLE `amenity_reservations` (
  `amenity_reservation_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `handle` varchar(100) DEFAULT NULL,
  `sources` set('Facebook','Word of Mouth','Returning Customer','Google','Others') DEFAULT NULL,
  `source_other` varchar(255) DEFAULT NULL,
  `package_category` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` time NOT NULL,
  `guests` int(11) DEFAULT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `payment_method` enum('BDO') NOT NULL,
  `proof_of_payment` varchar(50) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenity_reservations`
--

INSERT INTO `amenity_reservations` (`amenity_reservation_id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `email`, `handle`, `sources`, `source_other`, `package_category`, `package`, `check_in_date`, `check_in_time`, `guests`, `total_cost`, `deposit_amount`, `remaining_balance`, `payment_method`, `proof_of_payment`, `reservation_date`) VALUES
(9, 'Joseph Russell', 'Oliveros', 'Maricaban', 2147483647, 'josephrussellm@gmail.com', 'josephrussellm@gmail.com', 'Facebook,Word of Mouth,Returning Customer,Google,Others', 'josephrussellm@gmail.com', 'Massage Therapies', 'Signature Massage Child', '2024-09-14', '18:47:00', 11, 3300.00, 495.00, 2805.00, 'BDO', '8.png', '2024-09-10 10:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_reservations`
--

CREATE TABLE `event_reservations` (
  `event_reservation_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `handle` varchar(100) DEFAULT NULL,
  `sources` set('Facebook','Word of Mouth','Returning Customer','Google','Others') DEFAULT NULL,
  `source_other` varchar(255) DEFAULT NULL,
  `package_category` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `guests` int(11) NOT NULL,
  `additional_guest` int(11) DEFAULT 0,
  `catering_preference` varchar(50) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `payment_method` enum('BDO') NOT NULL,
  `proof_of_payment` varchar(50) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_reservations`
--

INSERT INTO `event_reservations` (`event_reservation_id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `email`, `handle`, `sources`, `source_other`, `package_category`, `package`, `event_type`, `check_in_date`, `check_out_date`, `check_in_time`, `check_out_time`, `guests`, `additional_guest`, `catering_preference`, `total_cost`, `deposit_amount`, `remaining_balance`, `payment_method`, `proof_of_payment`, `reservation_date`) VALUES
(4, 'Joseph Russell', 'Oliveros', 'Maricaban', 2147483647, 'josephrussellm@gmail.com', 'josephrussellm@gmail.com', 'Facebook,Word of Mouth,Returning Customer,Google,Others', '', 'Corporate Room Packages', '24-Hour Corporate Room Rental', 'corporate events', '2024-09-14', '2024-09-15', '00:00:00', '00:00:00', 75, 22, 'Tie-Up Catering', 79265.00, 19816.25, 59448.75, 'BDO', '8.png', '2024-09-10 10:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `package_reservations`
--

CREATE TABLE `package_reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `handle` varchar(100) DEFAULT NULL,
  `sources` set('Facebook','Word of Mouth','Returning Customer','Google','Others') DEFAULT NULL,
  `source_other` varchar(255) DEFAULT NULL,
  `package` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `guests` int(11) NOT NULL,
  `additional_guest` int(11) DEFAULT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `payment_method` enum('BDO') NOT NULL,
  `proof_of_payment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_reservations`
--

INSERT INTO `package_reservations` (`id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `email`, `handle`, `sources`, `source_other`, `package`, `check_in_date`, `check_out_date`, `check_in_time`, `check_out_time`, `guests`, `additional_guest`, `total_cost`, `deposit_amount`, `remaining_balance`, `payment_method`, `proof_of_payment`, `created_at`) VALUES
(13, 'Joseph Russell', '', 'Maricaban', 2147483647, 'josephrussellm@gmail.com', 'josephrussellm@gmail.com', 'Facebook,Word of Mouth,Returning Customer,Google,Others', 'josephrussellm@gmail.com', 'Couple\'s Blissfull Ovenight Package', '2024-09-14', '2024-09-15', '13:00:00', '10:00:00', 2, 0, 10000.00, 2000.00, 8000.00, 'BDO', 'Screenshot 2024-09-09 211624.png', '2024-09-10 10:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservations`
--

CREATE TABLE `room_reservations` (
  `room_reservation_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `handle` varchar(100) DEFAULT NULL,
  `sources` set('Facebook','Word of Mouth','Returning Customer','Google','Others') DEFAULT NULL,
  `source_other` varchar(255) DEFAULT NULL,
  `room` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `guests` int(11) NOT NULL,
  `additional_guest` int(11) DEFAULT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) DEFAULT NULL,
  `payment_method` enum('BDO') NOT NULL,
  `proof_of_payment` varchar(50) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_reservations`
--

INSERT INTO `room_reservations` (`room_reservation_id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `email`, `handle`, `sources`, `source_other`, `room`, `check_in_date`, `check_out_date`, `check_in_time`, `check_out_time`, `guests`, `additional_guest`, `total_cost`, `deposit_amount`, `remaining_balance`, `payment_method`, `proof_of_payment`, `reservation_date`) VALUES
(28, 'Joseph Russell', 'Oliveros', 'Maricaban', 2147483647, 'josephrussellm@gmail.com', 'josephrussellm@gmail.com', 'Facebook,Word of Mouth,Returning Customer,Google,Others', '12312', 'Couple\'s Suite', '2024-09-14', '2024-09-15', '13:00:00', '10:00:00', 6, 22, 9700.00, 1940.00, 7760.00, 'BDO', 'Screenshot 2024-09-09 211624.png', '2024-09-10 10:45:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenity_reservations`
--
ALTER TABLE `amenity_reservations`
  ADD PRIMARY KEY (`amenity_reservation_id`);

--
-- Indexes for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD PRIMARY KEY (`event_reservation_id`);

--
-- Indexes for table `package_reservations`
--
ALTER TABLE `package_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_reservations`
--
ALTER TABLE `room_reservations`
  ADD PRIMARY KEY (`room_reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenity_reservations`
--
ALTER TABLE `amenity_reservations`
  MODIFY `amenity_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_reservations`
--
ALTER TABLE `event_reservations`
  MODIFY `event_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_reservations`
--
ALTER TABLE `package_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room_reservations`
--
ALTER TABLE `room_reservations`
  MODIFY `room_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
