-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 05:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_status` int(1) NOT NULL,
  `branches` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `admin_status`, `branches`, `status`, `photo`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', 0, '', 0, '1_admin.png'),
(2, 'granit', '32724aa43dc14f38141fc2fde69a3dd36bfb396b', '123@asd.com', 0, '', 0, '5_granit.png'),
(3, 'blini', 'ad8129c19640687edde4881085b614fa3b78b3ba', 'granii@granii.granii', 1, '', 0, '3_granii.jpg'),
(4, 'blend', 'f9b1cd1ec91a928e22d44a2a2f77f941450bf666', 'blend@blend.be', 0, '', 0, '4_blend.jpg'),
(5, 'labian', 'labian', 'labian', 0, '', 0, ''),
(6, 'blinnagavci', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'blinnagavci@gmail.com', 0, '', 0, '6_blinnagavci.png'),
(7, 'Graniiit', '9b903cfd61c0f5fcd0cd9ffe4920bd820075b91b', 'granit@sdfsdfd.ss', 0, '', 0, '7_Graniiit.png');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `city`, `branch`, `status`) VALUES
(1, 'Prishtine', 'Dragodan', 0),
(2, 'Prishtine', 'Mati 1', 0),
(3, 'Prishtine', 'Bregu i diellit', 0),
(4, 'Ferizaj', 'Adem Jashari', 0),
(5, 'Ferizaj', 'Nene Tereza', 0),
(6, 'Ferizaj', 'Zahir Pajaziti', 0),
(7, 'Gjilan', 'Sami Frasheri', 0),
(8, 'Gjilan', 'Papaku', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `residential_address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `telephone_no` varchar(255) NOT NULL,
  `alternative_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `gender`, `residential_address`, `city`, `telephone_no`, `alternative_no`, `email`, `birth_date`, `photo`, `status`) VALUES
(1, 'Granit', 'Abdu', 'Male', 'afdsfjn', 'asjkfsdf', 'asdfjksnjk', 'dajksfnaskdjf', 'sadfsadf@acs.de', '06/04/2017', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_contract`
--

CREATE TABLE `employee_contract` (
  `id` int(11) NOT NULL,
  `amount_of_salary` double NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_contract`
--

INSERT INTO `employee_contract` (`id`, `amount_of_salary`, `start_date`, `end_date`, `employee_id`, `employee_type_id`) VALUES
(1, 52, '19/04/2017', '03/05/2017', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(11) NOT NULL,
  `employee_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `employee_type`, `status`) VALUES
(1, 'Janitor', 0),
(2, 'Accountant', 0),
(3, 'Furnitor', 0),
(4, 'Personal trainer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `selling_price` double NOT NULL DEFAULT '-1',
  `quantity` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `company_name`, `barcode`, `selling_price`, `quantity`, `status`, `category_id`, `unit_id`) VALUES
(1, 'Candy bar', 'Bio Tech', '48956894156', 2, 30, 0, 1, 4),
(2, 'Water', 'Viva', '87451851', 0.5, 100, 0, 2, 2),
(3, 'Whey', 'Bio Tech', '984518451', 30, 15, 0, 3, 1),
(4, 'Snickers protein bar', 'Snickers', '8515610', 1, 50, 0, 1, 4),
(5, 'Brown sofa', 'Palma', '854189', 600, 1, 0, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sellable` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `category`, `sellable`, `status`) VALUES
(1, 'Food', 0, 0),
(2, 'Drink', 0, 0),
(3, 'Supplement', 0, 0),
(4, 'Furniture', 0, 0),
(5, 'Equipment', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_payment_in`
--

CREATE TABLE `item_payment_in` (
  `id` int(11) NOT NULL,
  `cost_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_amount` double NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_payment_in`
--

INSERT INTO `item_payment_in` (`id`, `cost_price`, `quantity`, `payment_date`, `payment_amount`, `product_id`) VALUES
(1, 1, 20, '2017-04-12 07:52:33', 20, 1),
(2, 0.2, 100, '2017-04-12 08:07:15', 20, 2),
(3, 20, 15, '2017-04-12 08:11:15', 300, 3),
(4, 0.4, 50, '2017-04-12 08:15:38', 20, 4),
(5, 400, 1, '2017-04-12 08:19:55', 400, 5),
(6, 1.5, 10, '2017-04-13 22:12:38', 17.7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_payment_out`
--

CREATE TABLE `item_payment_out` (
  `id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `payment_amount` double NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_unit`
--

CREATE TABLE `item_unit` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `item_unit`
--

INSERT INTO `item_unit` (`id`, `unit`, `status`) VALUES
(1, 'KG', 0),
(2, 'Litre', 0),
(3, 'Pound', 0),
(4, 'Piece', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `residential_address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `telephone_no` varchar(50) DEFAULT NULL,
  `alternative_no` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `gender`, `residential_address`, `city`, `telephone_no`, `alternative_no`, `email`, `birth_date`, `photo`, `date_added`, `status`) VALUES
(1, 'asd', 'asd', 'Male', 'mati i', 'Prishtine', 'asdasd', 'asdasd', 'labiangashi@gmail.com', '10/04/2017', '1_asd_asd.png', '2017-04-12 11:05:27', 0),
(2, 'Granit', 'Graniti', 'Male', 'afdsfasdf', 'adsfasdfasf', 'adfasdf', 'adfadsff', 'asdf@sadfdas.de', '27/03/2017', '2_Granit_Graniti.png', '2017-04-16 11:31:14', 0),
(3, 'Blend', 'Blendi', 'Other', 'blend', 'blend', 'blend', 'blend', 'blend@blend.blend', '09/04/2017', '3_Blend_Blendi.png', '2017-04-16 11:32:57', 0),
(4, 'Fatmir', 'Fatmir', 'Female', 'fatmir', 'fatmir', 'fatmir', 'fatmir', 'fatmir@fatmir.fatmir', '09/04/2017', '4_Fatmir_Fatmir.png', '2017-04-16 12:10:11', 0),
(5, 'Admir', 'Admir', 'Male', 'Admir', 'Admir', 'Admir', 'Admir', 'Admir@admir.admir', '01/03/2016', '5_Admir_Admir.png', '2017-04-16 15:02:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `membership_type` varchar(50) NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `branches` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `membership_type`, `offer`, `amount`, `branches`, `status`) VALUES
(1, 'Daily', '', 2, '1,2,3,4,5,6,7,8', 0),
(2, 'Weekly', '', 15, '1,2,3,4,5,6,7,8', 0),
(3, 'Monthly', '', 30, '1,2,3,4,5,6,7,8', 0),
(4, '6 Months', '', 150, '1,2,3,4,5,6,7,8', 0),
(5, 'Yearly', '', 300, '1,2,3,4,5,6,7,8', 0),
(6, 'Yearly', 'Dragodan', 270, '1', 0),
(7, 'Monthly', 'Ferizaj', 25, '4,5,6', 0),
(8, 'Yearly', 'Gjilan', 285, '7,8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_payment`
--

CREATE TABLE `membership_payment` (
  `id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_membership` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_payment`
--

INSERT INTO `membership_payment` (`id`, `start_date`, `end_date`, `amount`, `id_member`, `id_membership`) VALUES
(1, '16/04/2017', '17/04/2017', 2, 1, 1),
(2, '18/04/2017', '25/04/2017', 15, 1, 2),
(3, '26/04/2017', '26/05/2017', 30, 1, 3),
(4, '27/04/2017', '05/05/2017', 150, 1, 4),
(5, '18/04/2017', '29/04/2017', 300, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_contract`
--
ALTER TABLE `employee_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_payment_in`
--
ALTER TABLE `item_payment_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_payment_out`
--
ALTER TABLE `item_payment_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_unit`
--
ALTER TABLE `item_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_payment`
--
ALTER TABLE `membership_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_contract`
--
ALTER TABLE `employee_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_payment_in`
--
ALTER TABLE `item_payment_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_payment_out`
--
ALTER TABLE `item_payment_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_unit`
--
ALTER TABLE `item_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `membership_payment`
--
ALTER TABLE `membership_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
