-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 09:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(110) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_viewed` int(11) NOT NULL DEFAULT 0,
  `date` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `message`, `is_viewed`, `date`) VALUES
(1, 'manha', 'manha@gmail.com', '0336 2741284', 'hi', 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hospital_contact` varchar(255) NOT NULL,
  `hospital_manager` varchar(255) NOT NULL,
  `manager_cnic` varchar(255) NOT NULL,
  `hospital_location` varchar(255) NOT NULL,
  `hospital_img` varchar(255) NOT NULL,
  `hospital_op_time` varchar(255) NOT NULL,
  `hospital_close_time` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hospital_status` varchar(255) NOT NULL DEFAULT '1',
  `Created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `hospital_email`, `hospital_contact`, `hospital_manager`, `manager_cnic`, `hospital_location`, `hospital_img`, `hospital_op_time`, `hospital_close_time`, `pass`, `user_id`, `hospital_status`, `Created_at`) VALUES
(1, 'zia uddin', 'ziauddin@gmail.com', '0336 2741284', 'aisha', '45687776746889', 'karachi', 'Ziauddin.jpg', '08:00', '22:00', '202cb962ac59075b964b07152d234b70', 3, '0', '2023-12-101702239866'),
(2, 'Medicare Hospital', 'medicare@gmail.com', '0336 2741284', 'faria', '45687776746889', 'karachi', 'medicare.avif', '08:00', '22:00', '202cb962ac59075b964b07152d234b70', 4, '0', '2023-12-101702239966'),
(3, 'Agha Khan', 'aghakhan@gmail.com', '0336 2741284', 'maliha', '45687776746889', 'karachi', 'agha khan.jpeg', '08:00', '22:00', '202cb962ac59075b964b07152d234b70', 7, '2', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(300) NOT NULL,
  `parent_email` varchar(300) NOT NULL,
  `parent_phone` int(11) NOT NULL,
  `child_name` varchar(300) NOT NULL,
  `child_age` int(11) NOT NULL,
  `child_gender` varchar(300) NOT NULL,
  `child_img` varchar(255) NOT NULL,
  `parent_CNIC` int(100) NOT NULL,
  `appoint_day` varchar(300) NOT NULL,
  `parent_hosp` varchar(300) NOT NULL,
  `parent_vacc` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_status` varchar(300) NOT NULL DEFAULT '1',
  `dos_1` int(11) NOT NULL DEFAULT 0,
  `dos_2` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_name`, `parent_email`, `parent_phone`, `child_name`, `child_age`, `child_gender`, `child_img`, `parent_CNIC`, `appoint_day`, `parent_hosp`, `parent_vacc`, `user_id`, `parent_status`, `dos_1`, `dos_2`) VALUES
(1, 'hina', 'hina@gmail.com', 2147483647, 'unaiza', 14, 'female', 'profile.png', 2147483647, '2023-12-14', '2', '10', 5, '0', 0, 0),
(2, 'manha', 'manha@gmail.com', 2147483647, 'unaiza', 12, 'female', 'profile.png', 2147483647, '2023-12-13', '1', '1', 2, '1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_img` varchar(300) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_phone`, `user_pass`, `user_img`, `user_role`) VALUES
(1, 'faiza', 'faizaghayas16@gmail.com', '03362741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 1),
(2, 'manha', 'manha@gmail.com', '03362741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 0),
(3, 'zia uddin', 'ziauddin@gmail.com', '0336 2741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 2),
(4, 'Medicare Hospital', 'medicare@gmail.com', '0336 2741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 2),
(5, 'hina', 'hina@gmail.com', '03362741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 0),
(6, 'hadiqa', 'hadiqa@gmail.com', '03362741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 0),
(7, 'maliha', 'maliha@gmail.com', '03362741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 0),
(8, 'unaiza', 'unaiza@gmail.com', '03362741284', '202cb962ac59075b964b07152d234b70', 'profile.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccine_quan` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_quan`, `hospital_id`) VALUES
(1, 'polio', 220, 1),
(2, 'Hepatitis A', 220, 1),
(3, 'Hepatitis B', 220, 1),
(4, 'faizar', 220, 1),
(5, 'Rotavirus', 220, 1),
(6, 'Rotavirus', 220, 2),
(7, 'covid-19', 220, 2),
(8, 'Pneumococcal', 220, 2),
(9, 'polio', 220, 2),
(10, 'faizar', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
