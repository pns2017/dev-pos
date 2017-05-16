-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 05:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `removed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `lastname`, `firstname`, `middlename`, `address`, `city`, `contact`, `email`, `removed`) VALUES
(21, 'AWtasdasds', 'Nang Ulan', 'Nanaman', 'Marilao', 'Bulacan', '61321123123', 'dakdjsa@email.com', '0'),
(27, 'vvv', 'vv', 'v', 'vvv', 'vv', 'vv', 'vvv', ''),
(29, 'sadsa', 'dsdasd', 'asdasd', 'dadasdas', 'dsa', 'asdas', 'asdsa@email.com', ''),
(30, 'dsad', 'dasd', 'asdasd', 'asdas', 'dasdas', 'dsad', 'asdadas', ''),
(31, 'da', 'dasdas', 'dasda', 'sdas', 'dasdas', 'das', 'dasdad', ''),
(32, 'das', 'dsads', 'das', 'dasd', 'sadas', 'sadas', 'asdad', ''),
(33, 'gdfgdf', 'gdfgd', 'gdfg', 'fgd', 'dfgdf', 'gdg', 'dfgdf', ''),
(34, 'awwww', 'gfx', 'vcxvx', 'cz', 'cxzcx', 'hf', 'yryrt', ''),
(35, 'tryrt', 'yrt', 'g', 'ddsfsd', 'gfdgd', 'a', 'dgd', ''),
(36, 'AAA', 'asda', 'dad', 'dasd', 'as', 'asd', 'adad', ''),
(39, 'Opps', 'Opps', 'dsadsa', 'dsada', 'dsadas', 'dasdsa', 'dsadas', ''),
(40, 'Bade', 'Humelou', 'Regidor', 'Marilao', 'Bulacan', '09809809080', 'lots@gmail.com', ''),
(41, '1', '1', '1', '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `damaged_items`
--

CREATE TABLE `damaged_items` (
  `damaged_id` int(11) NOT NULL,
  `sku` int(20) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `sku` int(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` varchar(45) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `unit_sold` int(11) NOT NULL,
  `unit_damaged` int(11) NOT NULL,
  `unit_lost` int(11) NOT NULL,
  `removed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issued_items`
--

CREATE TABLE `issued_items` (
  `issue_id` int(11) NOT NULL,
  `sku` int(20) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_issued` varchar(20) NOT NULL,
  `date_returned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_type` varchar(45) NOT NULL,
  `details` varchar(250) NOT NULL,
  `date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lost_items`
--

CREATE TABLE `lost_items` (
  `lost_id` int(11) NOT NULL,
  `sku` int(20) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `date_delivered` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL,
  `products` varchar(250) NOT NULL,
  `removed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `address`, `city`, `contact`, `email`, `status`, `products`, `removed`) VALUES
(4, 'POS Constructions', 'Maa', 'Davao', '222-2222', 'posconstruction@mail.com', 'Good', 'Construction Supply', '');

-- --------------------------------------------------------

--
-- Table structure for table `supply_logs`
--

CREATE TABLE `supply_logs` (
  `supply_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `sku` int(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expense` decimal(10,2) NOT NULL,
  `date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_count` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `additional_charges` decimal(10,2) NOT NULL,
  `total_bill` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_mode` varchar(45) NOT NULL,
  `date_time` varchar(20) NOT NULL,
  `voided` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_id` int(11) NOT NULL,
  `sku` int(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `extended` decimal(10,2) NOT NULL,
  `name` varchar(45) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date_registered` varchar(20) NOT NULL,
  `removed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `username`, `password`, `lastname`, `firstname`, `middlename`, `contact`, `email`, `address`, `date_registered`, `removed`) VALUES
(1, 'admin', 'admin', 'admin', 'Admin', 'Super', 'S', '09090909099', 'admin@admin', 'Admin City', '', ''),
(2, 'supervisor', 'supervisor', '1234', '', '', '', '', '', '', '', ''),
(3, 'cashier', 'cashier', '1234', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `damaged_items`
--
ALTER TABLE `damaged_items`
  ADD PRIMARY KEY (`damaged_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `issued_items`
--
ALTER TABLE `issued_items`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `lost_items`
--
ALTER TABLE `lost_items`
  ADD PRIMARY KEY (`lost_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supply_logs`
--
ALTER TABLE `supply_logs`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `damaged_items`
--
ALTER TABLE `damaged_items`
  MODIFY `damaged_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `sku` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issued_items`
--
ALTER TABLE `issued_items`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lost_items`
--
ALTER TABLE `lost_items`
  MODIFY `lost_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supply_logs`
--
ALTER TABLE `supply_logs`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
