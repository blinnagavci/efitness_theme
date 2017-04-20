-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 03:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
  `random_string` varchar(255) DEFAULT NULL,
  `admin_status` int(1) NOT NULL,
  `branches` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `random_string`, `admin_status`, `branches`, `status`, `photo`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.admin', NULL, 0, '1,3', 0, '1_admin.png'),
(2, 'labian', 'd726167f8a5bf918ccddc1a20602d56367d0a909', 'labian@labian', NULL, 0, '2,3', 0, ''),
(3, 'labian', '0d761c070297a0f8d16273964d18742e4acd496c', 'labian@labian', NULL, 0, '1,2,3', 0, ''),
(4, 'cccxcxcxcxcxcx', '1504dd62f7cd38fdf9ad409aaa391a42838697ac', 'cxc@asd.com', NULL, 0, '1,2,3', 0, ''),
(5, 'cccxcxcxcxcxcx', '0e7d699da5c1b3124c9244cf0ad47785bd4cfd9e', 'cxc@asd.com', NULL, 1, '1,2', 0, ''),
(6, 'aiiiiiii', '85c8c7d75f204c56e910aa381b99f28c099bb6c2', 'aii@asd.cio', NULL, 0, '1,2', 0, ''),
(7, 'aiiiiiii', 'e4ddd71d524027981493b1deda8ac0ba2af4ddf7', 'aii@asd.cio', NULL, 0, '2,3', 0, ''),
(8, 'asdasd2', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', '2@asd', NULL, 0, '1,2', 0, ''),
(9, 'cxcxcx', '38305bf0c3060e1b09146924f1e27df4d0de5417', 'cx@c', NULL, 0, '2', 0, '');

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
(1, 'Granit', 'Abdu', 'Male', 'afdsfjn', 'asjkfsdf', 'asdfjksnjk', 'dajksfnaskdjf', 'sadfsadf@acs.de', '06/04/2017', NULL, 0),
(2, 'sdgsa', 'gaga', 'Male', '1241', 'asfasf', '1231', '12312', 'ag@gmail.com', '20/04/2017', NULL, 0);

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
(1, 52, '19/04/2017', '03/05/2017', 1, 3),
(2, 1241, '20/04/2017', '21/04/2017', 2, 2);

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
(1, 'Candy bar', 'Bio Tech', '48956894156', 2, 38, 0, 1, 4),
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
(5, 'Equipment', 1, 0);

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
(1, '20/04/2017', '21/04/2017', 15, 2, 2),
(2, '20/04/2017', '21/04/2017', 15, 2, 2),
(3, '20/04/2017', '21/04/2017', 30, 2, 3),
(4, '20/04/2017', '21/04/2017', 15, 6, 2),
(5, '20/04/2017', '21/04/2017', 2, 0, 1),
(6, '20/04/2017', '21/04/2017', 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `status`, `timestamp`, `account_id`) VALUES
(72, 'Unfuck Labi', 1, '2017-04-19 14:46:18', 1),
(73, 'labian', 1, '2017-04-20 11:01:32', 1),
(74, 'me ndreq diqka', 1, '2017-04-20 11:01:44', 1),
(75, 'asd', 1, '2017-04-20 11:42:29', 1),
(76, 'me dal', 1, '2017-04-20 11:42:37', 1),
(77, 'gadga', 1, '2017-04-20 12:18:47', 1),
(78, 'isisi', 1, '2017-04-20 12:50:18', 1),
(79, 'dddd', 1, '2017-04-20 12:51:26', 1),
(80, 'iwiw', 1, '2017-04-20 12:51:44', 1),
(81, 'ssss', 1, '2017-04-20 12:51:57', 1),
(82, 'asdsd', 1, '2017-04-20 12:52:02', 1),
(83, 'ksksk', 0, '2017-04-20 12:52:13', 1),
(84, 'akskdakdks', 1, '2017-04-20 12:52:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_contract`
--
ALTER TABLE `employee_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_payment_out`
--
ALTER TABLE `item_payment_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_unit`
--
ALTER TABLE `item_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership_payment`
--
ALTER TABLE `membership_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
