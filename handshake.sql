-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 10:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handshake`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_id`, `permission_id`, `stamp`) VALUES
(4, 65, 4, '2023-05-27 23:33:21'),
(5, 66, 4, '2023-05-28 05:29:58'),
(6, 66, 4, '2023-05-28 05:30:42'),
(7, 67, 2, '2023-05-28 06:25:23'),
(8, 67, 1, '2023-05-28 06:27:06'),
(9, 67, 2, '2023-05-28 06:27:11'),
(10, 67, 4, '2023-05-28 06:29:56'),
(11, 67, 2, '2023-05-28 07:28:07'),
(12, 67, 2, '2023-05-28 07:40:24'),
(13, 65, 2, '2023-05-28 09:54:15'),
(14, 67, 2, '2023-05-28 09:59:55'),
(15, 69, 2, '2023-05-28 14:17:47'),
(16, 70, 2, '2023-05-28 19:56:24'),
(17, 70, 2, '2023-05-28 21:07:07'),
(18, 70, 2, '2023-05-28 21:07:07'),
(19, 70, 2, '2023-05-28 21:07:07'),
(20, 70, 2, '2023-05-28 21:28:31'),
(21, 70, 2, '2023-05-28 21:29:45'),
(22, 70, 2, '2023-05-28 21:30:23'),
(23, 70, 2, '2023-05-28 21:36:13'),
(24, 72, 2, '2023-05-29 07:22:02'),
(25, 72, 2, '2023-05-29 07:23:16'),
(26, 72, 1, '2023-05-29 07:36:20'),
(27, 72, 2, '2023-05-29 07:36:54'),
(28, 72, 1, '2023-05-29 07:39:50'),
(29, 72, 2, '2023-05-29 07:41:48'),
(30, 72, 1, '2023-05-29 07:42:10'),
(31, 72, 2, '2023-05-29 07:44:08'),
(32, 72, 2, '2023-05-29 07:54:38'),
(33, 72, 4, '2023-05-29 07:54:45'),
(34, 72, 2, '2023-05-29 07:54:50'),
(35, 72, 4, '2023-05-29 07:54:57'),
(36, 72, 2, '2023-05-29 07:55:00'),
(37, 72, 4, '2023-05-29 07:55:09'),
(38, 72, 2, '2023-05-29 07:55:12'),
(39, 72, 1, '2023-05-29 07:55:35'),
(40, 72, 2, '2023-05-29 08:12:38'),
(41, 73, 2, '2023-05-29 08:32:33'),
(42, 76, 2, '2023-05-29 08:51:48'),
(43, 76, 2, '2023-05-29 08:52:12'),
(44, 76, 2, '2023-05-29 08:52:12'),
(45, 78, 2, '2023-05-29 08:59:32'),
(46, 78, 2, '2023-05-29 09:00:18'),
(47, 78, 2, '2023-05-29 09:02:05'),
(48, 80, 2, '2023-05-29 09:30:44'),
(49, 80, 1, '2023-05-29 09:32:37'),
(50, 80, 13, '2023-05-29 09:32:41'),
(51, 81, 27, '2023-05-29 09:33:35'),
(52, 81, 17, '2023-05-29 09:33:36'),
(53, 81, 2, '2023-05-29 09:33:38'),
(54, 81, 17, '2023-05-29 09:33:40'),
(55, 81, 27, '2023-05-29 09:33:41'),
(56, 81, 17, '2023-05-29 09:33:43'),
(57, 81, 27, '2023-05-29 09:41:53'),
(58, 81, 17, '2023-05-29 09:41:55'),
(59, 81, 27, '2023-05-29 09:41:57'),
(60, 81, 27, '2023-05-29 09:45:15'),
(61, 81, 17, '2023-05-29 09:45:17'),
(62, 81, 27, '2023-05-29 09:45:18'),
(63, 81, 17, '2023-05-29 09:45:38'),
(64, 81, 27, '2023-05-29 09:45:49'),
(65, 81, 2, '2023-05-29 09:47:10'),
(66, 81, 17, '2023-05-29 09:47:12'),
(67, 81, 27, '2023-05-29 09:47:13'),
(68, 81, 17, '2023-05-29 09:47:16'),
(69, 81, 2, '2023-05-29 09:47:17'),
(70, 81, 2, '2023-05-29 09:47:30'),
(71, 81, 2, '2023-05-29 09:47:31'),
(72, 81, 2, '2023-05-29 09:47:32'),
(73, 81, 17, '2023-05-29 09:47:32'),
(74, 81, 2, '2023-05-29 09:47:33'),
(75, 81, 2, '2023-05-29 09:48:42'),
(76, 81, 2, '2023-05-29 10:01:59'),
(77, 81, 17, '2023-05-29 10:02:01'),
(78, 81, 27, '2023-05-29 10:02:02'),
(79, 81, 17, '2023-05-29 10:37:53'),
(80, 81, 27, '2023-05-29 10:37:54'),
(81, 82, 13, '2023-05-29 10:39:13'),
(82, 82, 8, '2023-05-29 10:40:12'),
(83, 83, 27, '2023-05-29 10:40:41'),
(84, 83, 27, '2023-05-29 10:42:42'),
(85, 83, 27, '2023-05-29 12:08:44'),
(86, 83, 17, '2023-05-29 12:08:45'),
(87, 83, 2, '2023-05-29 12:12:01'),
(88, 83, 17, '2023-05-29 12:12:03'),
(89, 83, 27, '2023-05-29 12:12:05'),
(90, 83, 17, '2023-05-29 12:12:06'),
(91, 83, 2, '2023-05-29 12:12:07'),
(92, 83, 17, '2023-05-29 12:12:09'),
(93, 83, 27, '2023-05-29 12:12:11'),
(94, 83, 17, '2023-05-29 12:12:32'),
(95, 83, 2, '2023-05-29 12:12:32'),
(96, 83, 17, '2023-05-29 12:12:33'),
(97, 83, 27, '2023-05-29 12:12:34'),
(98, 83, 17, '2023-05-29 12:12:35'),
(99, 83, 2, '2023-05-29 12:12:37'),
(100, 83, 17, '2023-05-29 12:12:51'),
(101, 83, 27, '2023-05-29 12:12:51'),
(102, 83, 17, '2023-05-29 12:12:53'),
(103, 83, 2, '2023-05-29 12:29:15'),
(104, 83, 2, '2023-05-29 12:29:59'),
(105, 83, 17, '2023-05-29 12:31:51'),
(106, 83, 27, '2023-05-29 12:31:56'),
(107, 83, 17, '2023-05-29 12:31:58'),
(108, 83, 27, '2023-05-29 12:31:59'),
(109, 83, 17, '2023-05-29 12:32:03'),
(110, 83, 27, '2023-05-29 12:32:07'),
(111, 83, 17, '2023-05-29 12:32:09'),
(112, 83, 27, '2023-05-29 12:32:10'),
(113, 83, 17, '2023-05-29 12:32:16'),
(114, 83, 27, '2023-05-29 12:32:18'),
(115, 84, 17, '2023-05-29 12:32:57'),
(116, 84, 17, '2023-05-29 12:33:00'),
(117, 84, 17, '2023-05-29 12:33:03'),
(118, 84, 17, '2023-05-29 12:33:09'),
(119, 82, 2, '2023-05-29 12:42:39'),
(120, 84, 17, '2023-05-29 12:50:28'),
(121, 84, 17, '2023-05-29 12:50:28'),
(122, 84, 17, '2023-05-29 12:50:28'),
(123, 84, 17, '2023-05-29 12:50:28'),
(124, 84, 17, '2023-05-29 12:50:28'),
(125, 84, 17, '2023-05-29 12:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `commits`
--

CREATE TABLE `commits` (
  `id` int(11) NOT NULL,
  `tenda_id` int(11) NOT NULL,
  `served_quantity` int(22) DEFAULT NULL,
  `served_quality` varchar(22) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `stampi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `counter`
-- (See below for the actual view)
--
CREATE TABLE `counter` (
`users` bigint(21)
,`roles` bigint(21)
,`tendas` bigint(21)
,`services` bigint(21)
,`products` bigint(21)
,`employees` bigint(21)
,`commits` bigint(21)
,`permissions` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_no` varchar(20) DEFAULT NULL,
  `employee_no` varchar(30) NOT NULL,
  `cretaed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `account_no`, `employee_no`, `cretaed_at`) VALUES
(1, 18, '245388490223', 'CP-L2-11', '2023-05-28 21:00:00'),
(2, 37, NULL, 'CP-L2-37', '0000-00-00 00:00:00'),
(3, 38, NULL, 'CP-L1-38', '2023-05-29 09:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `session`, `user_id`, `login`, `logout`) VALUES
(7, '17879e06mh4r8medjht2v6pb0nMjAyMy0wNS0yNCAxNToyMDo0NA==', 4, '2023-05-24 16:20:44', '2023-05-24 16:21:14'),
(8, 'ok463su61bnrj8k3j8rsck2k31MjAyMy0wNS0yNCAxNToyNzoyNg==', 1, '2023-05-24 16:27:26', NULL),
(9, '17879e06mh4r8medjht2v6pb0nMjAyMy0wNS0yNCAxNToyOTowMQ==', 4, '2023-05-24 16:29:01', '2023-05-24 16:30:19'),
(45, '1f2fmiltdu84ol7in9t9nuv2ojMjAyMy0wNS0yNCAyMDoyNjoyNQ==', 1, '2023-05-24 21:26:25', '2023-05-25 12:42:33'),
(46, 'lo4hjababon4g4qrgkunvil5rqMjAyMy0wNS0yNCAyMTo1NjoyNA==', 1, '2023-05-24 22:56:24', '2023-05-25 07:02:49'),
(47, '9heuraehfmbgrg9h7a8769cvguMjAyMy0wNS0yNSAwNzoxNzozMw==', 1, '2023-05-25 08:17:33', '2023-05-25 09:46:54'),
(48, '87hq8ie26nj7166cprrp6k4nocMjAyMy0wNS0yNSAxMDo0NTo0MQ==', 1, '2023-05-25 11:45:41', '2023-05-25 12:07:41'),
(49, '17879e06mh4r8medjht2v6pb0nMjAyMy0wNS0yNSAyMjoxMDowMg==', 4, '2023-05-25 23:10:02', '2023-05-25 23:11:55'),
(50, '17879e06mh4r8medjht2v6pb0nMjAyMy0wNS0yNSAyMjoxMjoyOA==', 4, '2023-05-25 23:12:28', '2023-05-26 07:21:07'),
(51, '4huht82c6eusgsf68oa2k1llj3MjAyMy0wNS0yNSAyMjoyNDoyMw==', 1, '2023-05-25 23:24:23', '2023-05-25 23:30:47'),
(52, 'nbvj5ednnimi11291jq7rms185MjAyMy0wNS0yNSAyMjozMzowNA==', 1, '2023-05-25 23:33:04', '2023-05-26 11:40:45'),
(53, '1f2fmiltdu84ol7in9t9nuv2ojMjAyMy0wNS0yNiAxMDo1NDowNw==', 1, '2023-05-26 11:54:07', '2023-05-26 12:39:37'),
(54, '8i8e3tcdsae8j1vgsr1qh6c8ocMjAyMy0wNS0yNiAxMTo0MDowOA==', 1, '2023-05-26 12:40:08', '2023-05-26 14:59:50'),
(55, '8i8e3tcdsae8j1vgsr1qh6c8ocMjAyMy0wNS0yNiAxNDowNzoxNA==', 1, '2023-05-26 15:07:14', NULL),
(56, '4l2f1222sgl99qgn5uuoqjdnpiMjAyMy0wNS0yNiAxODoyNDo0Ng==', 1, '2023-05-26 19:24:46', '2023-05-26 20:08:37'),
(57, 'nbvj5ednnimi11291jq7rms185MjAyMy0wNS0yNiAxODozMDo1Nw==', 1, '2023-05-26 19:30:57', '2023-05-26 19:31:24'),
(58, '2g0iigkbnb0nmtq6afn1h846hsMjAyMy0wNS0yNiAxODozMjowMA==', 1, '2023-05-26 19:32:00', NULL),
(59, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yNyAxMToyODo0MQ==', 1, '2023-05-27 12:28:41', '2023-05-27 20:34:32'),
(60, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yNyAyMDowODo0MQ==', 1, '2023-05-27 21:08:41', '2023-05-28 01:47:41'),
(61, 'dck2apvm7ol3bdtkhlik4g3u5cMjAyMy0wNS0yOCAwMDozNjozMw==', 1, '2023-05-28 01:36:33', NULL),
(62, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOCAwMDo0Nzo1Mg==', 4, '2023-05-28 01:47:52', '2023-05-28 01:49:09'),
(63, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOCAwMDo1Nzo0NA==', 4, '2023-05-28 01:57:44', '2023-05-28 02:10:03'),
(64, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOCAwMToxMDo1Mw==', 4, '2023-05-28 02:10:53', '2023-05-28 02:11:49'),
(65, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOCAwMToxMjowMA==', 1, '2023-05-28 02:12:00', '2023-05-28 13:09:52'),
(66, 'dck2apvm7ol3bdtkhlik4g3u5cMjAyMy0wNS0yOCAwNzoyNzoxMg==', 1, '2023-05-28 08:27:12', '2023-05-28 08:30:48'),
(67, 'dck2apvm7ol3bdtkhlik4g3u5cMjAyMy0wNS0yOCAwODoyNToxOA==', 1, '2023-05-28 09:25:18', NULL),
(68, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOCAxMjoyODo0MA==', 1, '2023-05-28 13:28:40', NULL),
(69, 'a84jjf23erm3elfojq0mff0fe4MjAyMy0wNS0yOCAxNjoxNzoyNg==', 1, '2023-05-28 17:17:26', NULL),
(70, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOCAyMTo1MzoyMQ==', 1, '2023-05-28 22:53:21', '2023-05-29 07:52:23'),
(71, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOSAwNzoyMToxMA==', 1, '2023-05-29 08:21:10', '2023-05-29 08:48:19'),
(72, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOSAwNzo0ODozMQ==', 1, '2023-05-29 08:48:31', '2023-05-29 11:31:49'),
(73, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOSAxMDozMjoyMA==', 1, '2023-05-29 11:32:20', '2023-05-29 11:33:17'),
(74, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOSAxMDozMzo0OA==', 1, '2023-05-29 11:33:48', '2023-05-29 11:39:06'),
(75, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOSAxMDozOToyMQ==', 1, '2023-05-29 11:39:21', '2023-05-29 11:48:11'),
(76, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOSAxMDo0ODozNA==', 1, '2023-05-29 11:48:34', '2023-05-29 11:55:45'),
(77, 't1pcqprbolikcglmt2hfi6ocpuMjAyMy0wNS0yOSAxMDo1NTo1MA==', 33, '2023-05-29 11:55:50', NULL),
(78, '3l7aae7k3l0log2tqujqttqfkaMjAyMy0wNS0yOSAxMDo1ODowNQ==', 4, '2023-05-29 11:58:05', '2023-05-29 12:02:32'),
(79, 'mpa49veumpfe3kvaro2jorud7fMjAyMy0wNS0yOSAxMToxNDoyOA==', 33, '2023-05-29 12:14:28', '2023-05-29 12:26:13'),
(80, 'mpa49veumpfe3kvaro2jorud7fMjAyMy0wNS0yOSAxMToyNjozMA==', 1, '2023-05-29 12:26:30', '2023-05-29 12:33:11'),
(81, 'mpa49veumpfe3kvaro2jorud7fMjAyMy0wNS0yOSAxMTozMzoyNg==', 38, '2023-05-29 12:33:26', '2023-05-29 13:40:23'),
(82, 'uvctqgu8uirit2jqhnir7gvbtcMjAyMy0wNS0yOSAxMjozOTowMQ==', 1, '2023-05-29 13:39:01', NULL),
(83, 'mpa49veumpfe3kvaro2jorud7fMjAyMy0wNS0yOSAxMjo0MDozOA==', 38, '2023-05-29 13:40:38', '2023-05-29 15:32:21'),
(84, 'mpa49veumpfe3kvaro2jorud7fMjAyMy0wNS0yOSAxNDozMjo1Mw==', 33, '2023-05-29 15:32:53', NULL),
(85, 'gg7fo80sarrj54u541etrdpfo2MjAyMy0wNS0yOSAxNzo0MDo1OQ==', 33, '2023-05-29 18:40:59', '2023-05-29 21:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`) VALUES
(1, 'create_users'),
(2, 'read_users'),
(3, 'update_users'),
(4, 'delete_users'),
(5, 'self'),
(6, 'create_permissions'),
(7, 'delete_permissions'),
(8, 'read_permissions'),
(9, 'update_permissions'),
(10, 'self_edit'),
(11, 'add_roles'),
(12, 'create_roles'),
(13, 'read_roles'),
(14, 'update_roles'),
(15, 'delete_roles'),
(16, 'create_tendas'),
(17, 'read_tendas'),
(18, 'update_tendas'),
(19, 'delete_tendas'),
(20, 'create_services'),
(21, 'read_services'),
(22, 'update_services'),
(23, 'delete_services'),
(24, 'read_logs'),
(25, 'delete_logs'),
(26, 'create_products'),
(27, 'read_products'),
(28, 'update_products'),
(29, 'delete_products'),
(30, 'create_employees'),
(31, 'read_employees'),
(32, 'update_employees'),
(33, 'delete_employees'),
(34, 'create_commits'),
(35, 'read_commits'),
(36, 'update_commits'),
(37, 'delete_commits'),
(38, 'create_salaries'),
(39, 'read_salaries'),
(40, 'update_salaries'),
(41, 'delete_salaries');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_serv_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_serv_id`, `name`, `price`, `quantity`) VALUES
(1, 1, 'Product tested', 1200.00, 120),
(2, 8, 'vance', 32000.00, 120);

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

CREATE TABLE `product_service` (
  `id` int(11) NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_service`
--

INSERT INTO `product_service` (`id`, `label`) VALUES
(6, 'anotherone'),
(7, 'sugiko'),
(1, 'Test'),
(8, 'Tiffany');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(3, 'procurement'),
(4, 'test'),
(2, 'user'),
(5, 'worker');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`) VALUES
(37, 2, 2),
(38, 2, 5),
(39, 2, 10),
(40, 4, 15),
(41, 4, 2),
(42, 4, 14),
(68, 5, 21),
(69, 5, 17),
(70, 5, 5),
(71, 5, 10),
(72, 5, 18),
(110, 1, 11),
(111, 1, 34),
(112, 1, 30),
(113, 1, 6),
(114, 1, 26),
(115, 1, 12),
(116, 1, 38),
(117, 1, 20),
(118, 1, 16),
(119, 1, 1),
(120, 1, 37),
(121, 1, 33),
(122, 1, 25),
(123, 1, 7),
(124, 1, 29),
(125, 1, 15),
(126, 1, 41),
(127, 1, 23),
(128, 1, 19),
(129, 1, 4),
(130, 1, 35),
(131, 1, 31),
(132, 1, 24),
(133, 1, 8),
(134, 1, 27),
(135, 1, 13),
(136, 1, 39),
(137, 1, 21),
(138, 1, 17),
(139, 1, 2),
(140, 1, 5),
(141, 1, 10),
(142, 1, 36),
(143, 1, 32),
(144, 1, 9),
(145, 1, 28),
(146, 1, 14),
(147, 1, 40),
(148, 1, 22),
(149, 1, 18),
(150, 1, 3),
(157, 3, 26),
(158, 3, 23),
(159, 3, 27),
(160, 3, 17),
(161, 3, 2),
(162, 3, 5),
(163, 3, 10),
(164, 3, 28);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `prod_serv_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cost` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `prod_serv_id`, `name`, `cost`) VALUES
(8, 6, 'Dellin', 50000.00),
(9, 7, 'dwell', 456789.00);

-- --------------------------------------------------------

--
-- Table structure for table `tendas`
--

CREATE TABLE `tendas` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `customer` varchar(40) DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `due_date` date NOT NULL,
  `cost` double(10,2) NOT NULL,
  `completeness` int(2) NOT NULL,
  `prodserv_id` int(11) NOT NULL,
  `req_quantity` int(30) DEFAULT NULL,
  `serve_quality` varchar(22) DEFAULT NULL,
  `satistfactory` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tendas`
--

INSERT INTO `tendas` (`id`, `name`, `customer`, `location`, `due_date`, `cost`, `completeness`, `prodserv_id`, `req_quantity`, `serve_quality`, `satistfactory`) VALUES
(1, 'Washing', 'AICC co.', 'Iringa', '2023-05-26', 23900.00, 12, 1, 2345, NULL, NULL),
(2, 'Washing', NULL, 'Iringa', '2023-05-26', 23900.00, 12, 1, 2345, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `gender` int(30) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `gender`, `photo`) VALUES
(1, 'aman', 'aman@email.com', '875b8a4c742d89ffd47015514ac76759', 1, NULL, 'images/admin.jpg'),
(4, 'Joshua', 'joshua@gmail.com', '9b3b36aa8adcf7918535ea37aea1f008', 2, 0, NULL),
(18, 'jona', 'jona@email.com', '875b8a4c742d89ffd47015514ac76759', 2, 0, NULL),
(20, 'glory', 'g@mail.com', '', 1, 0, NULL),
(21, 'juma', 'jay@yahoo.com', '', 1, 0, NULL),
(30, 'Hun', 'hun@mail.com', '9b3b36aa8adcf7918535ea37aea1f008', 3, 0, NULL),
(32, 'Joel', 'joe@mail.com', '9b3b36aa8adcf7918535ea37aea1f008', 5, 0, NULL),
(33, 'Imma', 'ima@email.com', '9b3b36aa8adcf7918535ea37aea1f008', 5, 0, NULL),
(34, 'damian', 'iman@email.com', '9b3b36aa8adcf7918535ea37aea1f008', 5, 0, NULL),
(37, 'Hosea', 'sea@email.com', '9b3b36aa8adcf7918535ea37aea1f008', 5, 0, NULL),
(38, 'Dani', 'dani@email.com', '9b3b36aa8adcf7918535ea37aea1f008', 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `deductions` double(10,2) DEFAULT NULL,
  `allowances` double(10,2) DEFAULT NULL,
  `grand_total` double(10,2) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `counter`
--
DROP TABLE IF EXISTS `counter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `counter`  AS SELECT (select count(0) from `users`) AS `users`, (select count(0) from `roles`) AS `roles`, (select count(0) from `tendas`) AS `tendas`, (select count(0) from `services`) AS `services`, (select count(0) from `products`) AS `products`, (select count(0) from `employees`) AS `employees`, (select count(0) from `commits`) AS `commits`, (select count(0) from `permissions`) AS `permissions``permissions`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_id` (`log_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `commits`
--
ALTER TABLE `commits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenda_id` (`tenda_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_no` (`employee_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `prod_serv_id` (`prod_serv_id`);

--
-- Indexes for table `product_service`
--
ALTER TABLE `product_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `prod_serv_id` (`prod_serv_id`);

--
-- Indexes for table `tendas`
--
ALTER TABLE `tendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodserv_id` (`prodserv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `commits`
--
ALTER TABLE `commits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_service`
--
ALTER TABLE `product_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tendas`
--
ALTER TABLE `tendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `logs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `commits`
--
ALTER TABLE `commits`
  ADD CONSTRAINT `commits_ibfk_1` FOREIGN KEY (`tenda_id`) REFERENCES `tendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commits_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`prod_serv_id`) REFERENCES `product_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_permission_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`prod_serv_id`) REFERENCES `product_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tendas`
--
ALTER TABLE `tendas`
  ADD CONSTRAINT `tendas_ibfk_1` FOREIGN KEY (`prodserv_id`) REFERENCES `product_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wages`
--
ALTER TABLE `wages`
  ADD CONSTRAINT `wages_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wages_ibfk_2` FOREIGN KEY (`salary_id`) REFERENCES `salaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
