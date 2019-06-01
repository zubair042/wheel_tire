-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 09:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wheel_tire`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(8) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `account_active` int(11) DEFAULT '1',
  `account_type` varchar(50) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_address1` varchar(255) DEFAULT NULL,
  `account_address2` varchar(255) DEFAULT NULL,
  `account_city` varchar(50) DEFAULT NULL,
  `account_state` varchar(25) DEFAULT NULL,
  `account_zip` varchar(11) DEFAULT NULL,
  `account_phone` varchar(25) DEFAULT NULL,
  `account_fax` varchar(25) DEFAULT NULL,
  `account_email` varchar(50) DEFAULT NULL,
  `account_notes` longtext,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `parent_id`, `account_active`, `account_type`, `account_name`, `account_address1`, `account_address2`, `account_city`, `account_state`, `account_zip`, `account_phone`, `account_fax`, `account_email`, `account_notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Customer', 'AMERICAN TRANSPORTATION SERVICES', 'Home 17 , Street 01 para shout factory near railway signal work shop lahore', 'sfsdfsdf', 'Lahore', 'Punjab', '54900', '3224001730', 'sdfs344', 'bilalshah512@yahoo.com', 'dfsdfsdfsdf', 1, '2019-05-17 05:47:40', '2019-05-17 05:47:40'),
(2, 0, 1, 'Customer', 'Vision Plus', 'Home 17 , Street 01 para shout factory near railway signal work shop lahore', NULL, 'Lahore', 'Punjab', '54900', '3224001730', '45435', 'wheel@gmail.com', 'dsgfsdfsd fsdfsdf sdfsdfsd', 1, '2019-05-22 05:30:16', '2019-05-22 06:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `description`) VALUES
(1, 'Database'),
(2, 'Vendor'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `block_reports`
--

CREATE TABLE `block_reports` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(7) NOT NULL,
  `report_id` int(11) NOT NULL,
  `comments` varchar(256) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `report_id`, `comments`, `created_by`, `created_at`, `updated_at`) VALUES
(12, 4, 'This is Comment', 7, '2019-05-29 05:35:21', '2019-05-29 05:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments_newest`
--

CREATE TABLE `comments_newest` (
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `account_id` int(8) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `customer_type` varchar(50) NOT NULL DEFAULT '1',
  `is_active` int(2) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `account_id`, `location_name`, `customer_type`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(16, 1, 'London', '1', 1, 1, '2019-05-24 01:32:06', '2019-05-24 01:32:06'),
(15, 1, 'New York', '1', 1, 1, '2019-05-24 01:31:55', '2019-05-24 01:31:55'),
(6, 2, 'Muslim Town', '1', 1, 37, '2019-05-23 02:34:19', '2019-05-23 02:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `location_to_account`
--

CREATE TABLE `location_to_account` (
  `account_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Reports', 'reports'),
(3, 'Users', 'users'),
(4, 'Accounts', 'accounts'),
(5, 'Locations', 'locations');

-- --------------------------------------------------------

--
-- Table structure for table `module_permissions`
--

CREATE TABLE `module_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_permissions`
--

INSERT INTO `module_permissions` (`id`, `role_id`, `module_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 5),
(10, 3, 1),
(11, 3, 2),
(12, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `touserid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `ratingid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `vendor_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `min_users` int(11) DEFAULT NULL,
  `max_users` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` longtext,
  `enable` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `userid` varchar(25) NOT NULL,
  `accountid` varchar(25) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `account_id` int(8) DEFAULT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `front_wheel_position` varchar(5) DEFAULT NULL,
  `rear_wheel_position` varchar(5) DEFAULT NULL,
  `steer_wheel_position` varchar(5) DEFAULT NULL,
  `location_id` int(2) NOT NULL DEFAULT '0',
  `report_unit_num` varchar(80) DEFAULT NULL,
  `report_location` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `comment` longtext,
  `report_image` varchar(255) DEFAULT NULL,
  `signature` bit(1) DEFAULT b'0',
  `signature_by` int(11) DEFAULT NULL,
  `signature_on` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `account_id`, `vehicle_type`, `front_wheel_position`, `rear_wheel_position`, `steer_wheel_position`, `location_id`, `report_unit_num`, `report_location`, `name`, `weight`, `manager_id`, `comment`, `report_image`, `signature`, `signature_by`, `signature_on`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 2, 'trailer', 'LF', 'LR', 'LS', 6, '1000', NULL, 'Atif Amin', 150, 39, 'some comments', NULL, b'0', NULL, '2019-05-27 16:53:57', 37, '2019-05-23 02:41:15', '2019-05-23 07:41:15'),
(4, 1, 'power_unit', 'LF', 'RR', 'RS', 0, 'unit 300', NULL, 'ray gross', 300, 40, 'test comments on new report', NULL, b'1', 7, '2019-05-29 06:34:23', 38, '2019-05-23 02:43:42', '2019-05-23 07:43:42'),
(5, 1, 'trailer', 'LF', 'LR', 'LS', 0, 'GF32', NULL, 'Zubair', 445, 6, 'This is comment', NULL, b'1', 7, '2019-05-29 06:31:46', 1, '2019-05-24 05:46:27', '2019-05-24 10:46:27'),
(6, 1, 'trailer', 'LF', 'LR', 'LS', 16, 'ht65', NULL, 'wheel', 550, 6, 'This is comment', NULL, b'0', NULL, '2019-05-27 16:53:57', 1, '2019-05-24 05:48:46', '2019-05-24 10:48:46'),
(7, 1, 'trailer', 'LF', 'LR', 'LS', 15, '765', NULL, 'Know More', 660, 5, NULL, NULL, b'1', 7, '2019-05-29 06:33:29', 1, '2019-05-24 05:56:44', '2019-05-24 10:56:44'),
(8, 1, 'trailer', 'LF', 'LR', 'LS', 16, 'fg65', NULL, 'Usama', 77, 6, 'This is comment', NULL, b'0', NULL, NULL, 1, '2019-05-29 05:09:47', '2019-05-29 10:09:47'),
(9, 1, 'trailer', 'LF', 'LR', 'LS', 15, 'er43', NULL, 'Hire', 43, 7, NULL, NULL, b'0', NULL, NULL, 1, '2019-05-29 07:34:50', '2019-05-29 12:34:50'),
(10, 1, 'trailer', 'LF', 'LR', 'LS', 15, 'rt56', NULL, 'Hire', 5454, 7, NULL, NULL, b'0', NULL, NULL, 1, '2019-05-29 07:47:01', '2019-05-29 12:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `report_images`
--

CREATE TABLE `report_images` (
  `id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `image_type` varchar(50) DEFAULT NULL,
  `url` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_images`
--

INSERT INTO `report_images` (`id`, `report_id`, `image_type`, `url`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559121202/aw84hptctlzomdi9h5gv.webp', 1, '2019-05-29 09:12:29', '2019-05-29 09:12:29'),
(2, 4, 'left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559122663/vxf4e69txjyx3qwckhhj.webp', 1, '2019-05-29 09:36:50', '2019-05-29 09:36:50'),
(9, 4, 'left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559133931/bfvalf2ofaayvj5rlw9i.webp', 1, '2019-05-29 12:44:38', '2019-05-29 12:44:38'),
(14, NULL, NULL, 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559218134/k4vp44b1ionkcvvwfenv.webp', 1, '2019-05-30 12:08:00', '2019-05-30 12:08:00'),
(25, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302489/wpqpgvjuudjqplmdqivb.webp', 1, '2019-05-31 11:33:54', '2019-05-31 11:33:54'),
(26, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302491/sqf52rvbvoyptury5snd.webp', 1, '2019-05-31 11:33:55', '2019-05-31 11:33:55'),
(27, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302492/ujzrtwg52tnbufcmdkw4.webp', 1, '2019-05-31 11:33:57', '2019-05-31 11:33:57'),
(28, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302516/ubyibbp4guyk0enn7w1r.webp', 1, '2019-05-31 11:34:21', '2019-05-31 11:34:21'),
(29, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302518/wbf5yk0fwj7h0gocq8jh.webp', 1, '2019-05-31 11:34:23', '2019-05-31 11:34:23'),
(30, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302520/otuh8l43mmvlncbfuqeu.webp', 1, '2019-05-31 11:34:25', '2019-05-31 11:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `account_type` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `unit_number` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `data` text NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `snapshots`
--

CREATE TABLE `snapshots` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `img_dir` varchar(50) NOT NULL,
  `image_id` longtext NOT NULL,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account_id` int(2) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user_role` int(2) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` char(128) DEFAULT NULL,
  `random` text,
  `signature` longtext,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_id`, `location_id`, `email`, `user_role`, `first_name`, `last_name`, `password`, `random`, `signature`, `remember_token`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'ray@mobilemaintenance.com', 1, 'Ray', 'Gross', '$2y$10$axXaJyPRrdCvSte12jbIMetXgWMbTMZhSSXwRQkVwpaOVnhOgpJ.C', NULL, NULL, 'ywjbPhtVJw6bM1SSRGBxgutZ7lrnAAJjN69KkZih0VdwIgYr1VRX7AFkFjSg', 1, 0, '2019-05-30 05:36:27', '2019-05-30 05:36:27'),
(2, 2, NULL, 'zubair@gmail.com', 2, 'Muahammad Zubair', 'Khan', '$2y$10$axXaJyPRrdCvSte12jbIMetXgWMbTMZhSSXwRQkVwpaOVnhOgpJ.C', NULL, NULL, 'Vj6GS88a3RSbXVhrhtRb1VLcBKwq34NpciOTON10L5V3dldNUtLSL2eTxGxC', 1, 1, '2019-05-24 12:16:46', '2019-05-24 12:16:46'),
(5, 1, 15, 'usama@gmail.com', 2, 'Usama', 'Javed', '$2y$10$axXaJyPRrdCvSte12jbIMetXgWMbTMZhSSXwRQkVwpaOVnhOgpJ.C', NULL, NULL, 'sqWxuoJzBxFrss6sa2aSFiPIRXaCJIXY7JYfe1LBReHtXdfl2CNg7nehpcLi', 1, 1, '2019-05-29 05:34:41', '2019-05-29 05:34:41'),
(6, 2, 16, 'ali@gmail.com', 3, 'ali', 'ahmad', '$2y$10$UOnqdQrHuPbJDOBFt6FJ2.Z/XrUUT7BwAYORXR1EnOWeSBZHkim76', NULL, NULL, '5bz3AYlBi7SaPFZssWtVFibPZ5goicTt8hBWd3FbpRNtV8uoiWJZZiwzh5IL', 1, 1, '2019-05-28 10:10:32', '2019-05-28 10:10:32'),
(7, 1, 15, '042zubair@gmail.com', 3, 'Zubair', 'Khan', '$2y$10$1AsUlLR2OlE9CFP8I4x.j.Y0U/MLtIxgJYBm3HIk24sfPVeXpxsWy', NULL, NULL, 'jh7MmZhTreiEgGk7BW2RzuwkkrSXATYFuSaFl1trMdsT2v5wZJ3szFJbhyDt', 1, 5, '2019-05-29 12:34:28', '2019-05-29 12:34:28'),
(8, 1, 16, 'manger@gmail.com', 3, 'Manager', 'One', '$2y$10$aimZYCIhKo4qDDmJS0u8NOP/TlOVlC6LVpkNfk9sZLsIyyc/aj.9.', NULL, NULL, NULL, 1, 5, '2019-05-27 00:57:01', '2019-05-27 00:57:01'),
(10, 1, 16, 'tire@gmail.com', 3, 'Muahammad Zubair', 'Khan', '$2y$10$zKrUFlPEoXvHtLTh7YeX8u52vWUjYba1zA3BzIi2a5KQQP7FYQCWq', NULL, NULL, 'qqbmH9xpVuvUt32Y04KMzzjIrHrcpBzufAsIOzKjJWN69bfkDct0oJHMgaBR', 1, 1, '2019-05-30 06:41:03', '2019-05-30 06:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_visible` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `description`, `is_visible`) VALUES
(1, 'Global Admin', b'0'),
(2, 'Administrator', b'1'),
(3, 'Manager', b'1'),
(4, 'Location', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_reports`
--
ALTER TABLE `block_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_newest`
--
ALTER TABLE `comments_newest`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permissions`
--
ALTER TABLE `module_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_images`
--
ALTER TABLE `report_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snapshots`
--
ALTER TABLE `snapshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `block_reports`
--
ALTER TABLE `block_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module_permissions`
--
ALTER TABLE `module_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report_images`
--
ALTER TABLE `report_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snapshots`
--
ALTER TABLE `snapshots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
