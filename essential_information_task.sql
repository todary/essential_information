-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2019 at 03:39 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essential_information_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `jazenet_registration`
--

CREATE TABLE `jazenet_registration` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jazenet_registration`
--

INSERT INTO `jazenet_registration` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'company_name', 'Digital Creativity Company'),
(2, 1, 'email', 'abanob.todary@gmail.com'),
(3, 1, 'website', 'https://www.linkedin.com/in/abanob-todary-964018a1/'),
(4, 1, 'industry', '1'),
(5, 1, 'landline_country_code', '1'),
(6, 1, 'landline_number', '547676185'),
(7, 1, 'mobile_country_code', '2'),
(8, 1, 'mobile_number', '547676185'),
(9, 1, 'country', '1'),
(10, 1, 'state', '2'),
(11, 1, 'city', '1'),
(12, 1, 'suburb', '1'),
(13, 1, 'street_name', 'Dubai'),
(14, 1, 'property_no', 'Dubai'),
(15, 1, 'building_name', 'Dubai'),
(16, 1, 'appartment_no', 'Dubai'),
(17, 1, 'logo_url', '/var/www/html/essential_information/cdn/images/0.jpeg'),
(18, 1, 'youtube_url', 'https://www.youtube.com/watch?v=qWr7o65yBOc'),
(19, 2, 'company_name', NULL),
(20, 2, 'email', NULL),
(21, 2, 'website', NULL),
(22, 2, 'industry', NULL),
(23, 2, 'landline_country_code', NULL),
(24, 2, 'landline_number', NULL),
(25, 2, 'mobile_country_code', NULL),
(26, 2, 'mobile_number', NULL),
(27, 2, 'country', NULL),
(28, 2, 'state', NULL),
(29, 2, 'city', NULL),
(30, 2, 'suburb', NULL),
(31, 2, 'street_name', NULL),
(32, 2, 'property_no', NULL),
(33, 2, 'building_name', NULL),
(34, 2, 'appartment_no', NULL),
(35, 2, 'logo_url', NULL),
(36, 2, 'youtube_url', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jazenet_registration`
--
ALTER TABLE `jazenet_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jazenet_registration`
--
ALTER TABLE `jazenet_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
