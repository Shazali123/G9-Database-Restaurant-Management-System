-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 09:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g9 database system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_no` int(11) NOT NULL,
  `customer_email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_no`, `customer_email`) VALUES
(5, 162429472, 'shazalishaukhi@gmail.com'),
(6, 1137098364, 'mimi309@hotmail.co.uk'),
(13, 888888888, 'ismatnw@gmail.com.my'),
(15, 888888888, 'test@gmail.com'),
(16, 1137098364, 'eirdasafia@gmail.com'),
(18, 192718564, 'amirul@gmail.com'),
(19, 102015722, 'Fauzan@gmail.com'),
(20, 11328230, 'danish@gmail.com'),
(21, 1783928392, 'Adzim@gmail.com'),
(22, 145252525, 'Daniel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `item_desc` varchar(256) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `item_desc`, `price`) VALUES
(1, 'Tomyam', 'tomyam homemande blah blah', 10),
(2, 'Siakap', 'siakap kena tangkap ', 111),
(3, 'teh o ais', 'teh o ais padu kaw kaw tarik', 100),
(4, 'Limau ais', 'Limau jepun ', 650),
(5, 'Sotong fried flour', 'Sotong goreng dalam flour', 11.9),
(6, 'chicken paprik', 'chicken cooked paprik', 8),
(7, 'teh ais tarik', 'tarikan teh ais', 20),
(8, 'telor dadar', 'omelette', 16.9),
(9, 'kangkung belacan', 'kangkung masak belacan sedap sedap', 1),
(10, 'nasi single', 'nasi bujang', 100);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `table_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `fullamount` float NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `table_id`, `date`, `fullamount`, `status`) VALUES
(5, 5, 12, '2024-03-26 21:08:33', 232.05, 'COMPLETED'),
(6, 5, 12, '2024-03-26 21:18:35', 232.05, 'COMPLETED'),
(7, 5, 12, '2024-03-26 21:18:55', 232.05, 'COMPLETED'),
(8, 5, 23, '2024-03-26 21:37:12', 1606.5, 'COMPLETED'),
(9, 5, 23, '2024-03-26 21:37:45', 1606.5, 'NEW'),
(10, 5, 23, '2024-03-26 21:37:59', 1606.5, 'NEW'),
(11, 5, 23, '2024-03-26 21:58:08', 12.495, 'NEW'),
(12, 15, 6, '2024-03-27 11:55:16', 2302.54, 'NEW'),
(13, 15, 6, '2024-03-27 11:58:54', 2302.54, 'NEW'),
(14, 15, 6, '2024-03-27 12:00:07', 2302.54, 'NEW'),
(15, 15, 6, '2024-03-27 12:01:11', 2302.54, 'COMPLETED'),
(16, 15, 6, '2024-03-27 12:01:30', 2302.54, 'NEW'),
(17, 16, 21, '2024-03-31 19:36:02', 1080.24, 'NEW'),
(18, 17, 27, '2024-04-03 14:58:55', 1567.55, 'NEW'),
(19, 18, 15, '2024-04-03 15:01:41', 397.74, 'NEW'),
(20, 19, 18, '2024-04-03 15:02:16', 13708.8, 'NEW'),
(21, 19, 18, '2024-04-03 15:02:23', 221.55, 'NEW'),
(22, 20, 26, '2024-04-03 15:03:23', 819, 'NEW'),
(23, 21, 5, '2024-04-03 15:03:50', 354.9, 'NEW'),
(24, 22, 3, '2024-04-03 15:04:42', 580.65, 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(5, 1, 'Tomyam', 1, '10.00'),
(5, 2, 'Siakap', 1, '111.00'),
(5, 3, 'teh o ais', 1, '100.00'),
(6, 1, 'Tomyam', 1, '10.00'),
(6, 2, 'Siakap', 1, '111.00'),
(6, 3, 'teh o ais', 1, '100.00'),
(7, 1, 'Tomyam', 1, '10.00'),
(7, 2, 'Siakap', 1, '111.00'),
(7, 3, 'teh o ais', 1, '100.00'),
(8, 1, 'Tomyam', 2, '10.00'),
(8, 2, 'Siakap', 10, '111.00'),
(8, 3, 'teh o ais', 4, '100.00'),
(9, 1, 'Tomyam', 2, '10.00'),
(9, 2, 'Siakap', 10, '111.00'),
(9, 3, 'teh o ais', 4, '100.00'),
(10, 1, 'Tomyam', 2, '10.00'),
(10, 2, 'Siakap', 10, '111.00'),
(10, 3, 'teh o ais', 4, '100.00'),
(11, 5, 'Sotong fried flour', 1, '11.90'),
(12, 1, 'Tomyam', 2, '10.00'),
(12, 2, 'Siakap', 1, '111.00'),
(12, 3, 'teh o ais', 1, '100.00'),
(12, 4, 'Limau ais', 3, '650.00'),
(12, 5, 'Sotong fried flour', 1, '11.90'),
(13, 1, 'Tomyam', 2, '10.00'),
(13, 2, 'Siakap', 1, '111.00'),
(13, 3, 'teh o ais', 1, '100.00'),
(13, 4, 'Limau ais', 3, '650.00'),
(13, 5, 'Sotong fried flour', 1, '11.90'),
(14, 1, 'Tomyam', 2, '10.00'),
(14, 2, 'Siakap', 1, '111.00'),
(14, 3, 'teh o ais', 1, '100.00'),
(14, 4, 'Limau ais', 3, '650.00'),
(14, 5, 'Sotong fried flour', 1, '11.90'),
(15, 1, 'Tomyam', 2, '10.00'),
(15, 2, 'Siakap', 1, '111.00'),
(15, 3, 'teh o ais', 1, '100.00'),
(15, 4, 'Limau ais', 3, '650.00'),
(15, 5, 'Sotong fried flour', 1, '11.90'),
(16, 1, 'Tomyam', 2, '10.00'),
(16, 2, 'Siakap', 1, '111.00'),
(16, 3, 'teh o ais', 1, '100.00'),
(16, 4, 'Limau ais', 3, '650.00'),
(16, 5, 'Sotong fried flour', 1, '11.90'),
(17, 1, 'Tomyam', 1, '10.00'),
(17, 2, 'Siakap', 1, '111.00'),
(17, 3, 'teh o ais', 1, '100.00'),
(17, 4, 'Limau ais', 1, '650.00'),
(17, 5, 'Sotong fried flour', 1, '11.90'),
(17, 6, 'chicken paprik', 1, '8.00'),
(17, 7, 'teh ais tarik', 1, '20.00'),
(17, 8, 'telor dadar', 1, '16.90'),
(17, 9, 'kangkung belacan', 1, '1.00'),
(17, 10, 'nasi single', 1, '100.00'),
(18, 2, 'Siakap', 1, '111.00'),
(18, 4, 'Limau ais', 1, '650.00'),
(18, 5, 'Sotong fried flour', 1, '11.90'),
(18, 7, 'teh ais tarik', 6, '20.00'),
(18, 10, 'nasi single', 6, '100.00'),
(19, 2, 'Siakap', 2, '111.00'),
(19, 5, 'Sotong fried flour', 1, '11.90'),
(19, 6, 'chicken paprik', 1, '8.00'),
(19, 7, 'teh ais tarik', 1, '20.00'),
(19, 8, 'telor dadar', 1, '16.90'),
(19, 10, 'nasi single', 1, '100.00'),
(20, 4, 'Limau ais', 20, '650.00'),
(20, 6, 'chicken paprik', 7, '8.00'),
(21, 2, 'Siakap', 1, '111.00'),
(21, 3, 'teh o ais', 1, '100.00'),
(22, 1, 'Tomyam', 1, '10.00'),
(22, 4, 'Limau ais', 1, '650.00'),
(22, 7, 'teh ais tarik', 1, '20.00'),
(22, 10, 'nasi single', 1, '100.00'),
(23, 8, 'telor dadar', 20, '16.90'),
(24, 2, 'Siakap', 3, '111.00'),
(24, 3, 'teh o ais', 2, '100.00'),
(24, 7, 'teh ais tarik', 1, '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_email`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'test', 'test'),
(4, 'Shazali123', '123'),
(5, 'Amirul@gmai.com', '123'),
(6, 'Fauzan@gmail.com', '123'),
(7, 'Hafiz@gmail.com', '123'),
(8, 'Daniel@gmail.com', '123'),
(9, 'Danish@gmail.com', '123'),
(10, 'Sriraju@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`,`order_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
