-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2018 at 05:54 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashraful Islam', 'admin@jobportal.com', '$2y$10$2xOQ8PFwR1LrwHB5DNP/Ouk1W0AXrjGjG3Rbpni7lzkG01Y4Qqmie', '0', 'ENokzYicWwLRcPLp09jj3l4FKp5CeSAu7QFlqpkwj8CmcuN8x4LYlXca87CL', '2017-12-26 05:00:00', '2017-12-26 05:00:00'),
(5, 'Rakibul Islam', 'rakibul@gmail.com', '$2y$10$IuM4AFcVZPt.pQJzhRKxP..pxrUXrkwq19hocZeL9OoTF7FWlzmqC', '0', NULL, '2017-12-30 16:58:15', '2017-12-30 16:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ExpectedSalary` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_post_id`, `user_id`, `ExpectedSalary`, `status`, `deleted`, `archived`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20000, 0, 0, 0, '2017-12-25 10:57:03', '2017-12-30 12:33:07'),
(2, 1, 2, 30000, 1, 1, 0, '2017-12-25 12:30:56', '2017-12-25 12:34:33'),
(3, 4, 2, 40000, 1, 1, 0, '2017-12-26 16:40:55', '2017-12-27 08:45:51'),
(4, 3, 3, 20000, 0, 1, 0, '2017-12-26 22:50:51', '2017-12-27 12:01:09'),
(5, 1, 3, 30000, 1, 1, 0, '2017-12-26 22:52:31', '2017-12-27 12:00:45'),
(6, 2, 3, 18000, 1, 1, 0, '2017-12-26 22:53:19', '2017-12-27 12:01:01'),
(7, 4, 4, 100000, 1, 1, 0, '2017-12-27 12:02:12', '2017-12-27 12:03:23'),
(8, 5, 5, 20000, 1, 1, 0, '2017-12-27 15:34:02', '2017-12-27 16:06:04'),
(9, 5, 7, 25000, 1, 1, 0, '2017-12-27 15:38:25', '2017-12-27 16:06:08'),
(10, 5, 9, 25000, 1, 1, 0, '2017-12-27 15:41:55', '2017-12-27 16:06:11'),
(11, 5, 10, 18000, 1, 1, 0, '2017-12-27 15:43:35', '2017-12-27 16:06:14'),
(12, 5, 12, 15000, 1, 1, 0, '2017-12-27 15:47:14', '2017-12-27 16:06:17'),
(13, 2, 8, 40000, 0, 0, 0, '2017-12-27 15:51:12', '2017-12-27 15:51:12'),
(14, 5, 15, 350, 1, 1, 0, '2017-12-27 15:53:45', '2017-12-27 16:06:19'),
(15, 5, 6, 20000, 1, 1, 0, '2017-12-27 15:55:35', '2017-12-27 16:06:22'),
(16, 5, 16, 25000, 1, 1, 0, '2017-12-27 15:56:22', '2017-12-27 16:06:26'),
(17, 5, 18, 25000, 1, 1, 0, '2017-12-27 16:13:56', '2017-12-27 16:21:32'),
(18, 1, 19, 30000, 0, 0, 0, '2017-12-27 16:17:44', '2017-12-30 12:33:10'),
(19, 2, 20, 30000, 0, 0, 0, '2017-12-27 16:24:53', '2017-12-27 16:24:53'),
(20, 5, 21, 20000, 1, 1, 0, '2017-12-27 16:53:20', '2017-12-27 17:00:00'),
(21, 2, 22, 20000, 0, 0, 0, '2017-12-27 16:55:16', '2017-12-27 16:55:16'),
(22, 5, 22, 15000, 1, 1, 0, '2017-12-27 16:56:57', '2017-12-27 17:00:04'),
(23, 5, 2, 12000, 1, 1, 0, '2017-12-27 16:59:00', '2017-12-27 17:00:10'),
(24, 5, 23, 15000, 1, 1, 0, '2017-12-27 17:11:53', '2017-12-28 08:33:13'),
(25, 5, 25, 20000, 1, 1, 0, '2017-12-27 17:32:03', '2017-12-28 08:33:17'),
(26, 1, 25, 30000, 0, 0, 0, '2017-12-27 17:32:56', '2017-12-27 17:32:56'),
(27, 1, 26, 25000, 0, 0, 0, '2017-12-27 17:51:33', '2017-12-27 17:51:33'),
(28, 5, 28, 20000, 1, 1, 0, '2017-12-27 18:04:08', '2017-12-28 08:33:21'),
(29, 5, 27, 20000, 1, 1, 0, '2017-12-27 18:12:25', '2017-12-28 08:33:26'),
(30, 1, 27, 25000, 0, 0, 0, '2017-12-27 18:14:16', '2017-12-27 18:14:16'),
(31, 5, 31, 22000, 1, 1, 0, '2017-12-27 19:40:22', '2017-12-28 08:33:30'),
(32, 5, 29, 22000, 1, 1, 0, '2017-12-27 19:44:05', '2017-12-28 08:33:35'),
(33, 5, 32, 25000, 1, 1, 0, '2017-12-27 20:34:04', '2017-12-28 08:33:38'),
(34, 1, 33, 25000, 0, 0, 0, '2017-12-27 20:41:09', '2017-12-27 20:41:09'),
(35, 5, 35, 25000, 1, 1, 0, '2017-12-27 21:05:48', '2017-12-28 08:33:42'),
(36, 5, 36, 20000, 1, 1, 0, '2017-12-27 21:10:57', '2017-12-28 08:33:48'),
(37, 5, 37, 22000, 1, 1, 0, '2017-12-27 21:37:21', '2017-12-28 08:33:54'),
(38, 1, 37, 22000, 0, 0, 0, '2017-12-27 21:38:36', '2017-12-27 21:38:36'),
(39, 5, 38, 30000, 1, 1, 0, '2017-12-27 22:12:12', '2017-12-28 08:34:02'),
(40, 5, 39, 20000, 1, 1, 0, '2017-12-27 22:17:46', '2017-12-28 08:34:12'),
(41, 5, 40, 22000, 1, 1, 0, '2017-12-27 22:20:13', '2017-12-28 08:34:16'),
(42, 2, 40, 25000, 0, 0, 0, '2017-12-27 22:22:01', '2017-12-27 22:22:01'),
(43, 5, 41, 22000, 1, 1, 0, '2017-12-27 22:34:05', '2017-12-28 08:34:20'),
(44, 2, 41, 40000, 0, 0, 0, '2017-12-27 22:34:35', '2017-12-27 22:34:35'),
(45, 2, 43, 30000, 0, 0, 0, '2017-12-27 23:17:33', '2017-12-27 23:17:33'),
(46, 5, 43, 25000, 1, 1, 0, '2017-12-27 23:20:31', '2017-12-28 08:34:24'),
(47, 1, 44, 35000, 0, 0, 0, '2017-12-27 23:29:52', '2017-12-27 23:29:52'),
(48, 5, 44, 30000, 1, 1, 0, '2017-12-27 23:31:01', '2017-12-28 08:34:29'),
(49, 2, 44, 35000, 0, 0, 0, '2017-12-27 23:31:35', '2017-12-27 23:31:35'),
(50, 2, 45, 30000, 0, 0, 0, '2017-12-27 23:36:53', '2017-12-27 23:36:53'),
(51, 5, 46, 45000, 1, 1, 0, '2017-12-27 23:55:08', '2017-12-28 08:34:34'),
(52, 5, 47, 20000, 1, 1, 0, '2017-12-28 00:38:49', '2017-12-28 08:34:39'),
(53, 5, 48, 20000, 1, 1, 0, '2017-12-28 03:44:37', '2017-12-28 08:34:43'),
(54, 5, 50, 25000, 1, 1, 0, '2017-12-28 06:41:44', '2017-12-28 08:34:46'),
(55, 5, 49, 15000, 1, 1, 0, '2017-12-28 07:26:01', '2017-12-28 08:34:49'),
(56, 5, 52, 25000, 1, 1, 0, '2017-12-28 09:10:44', '2017-12-28 12:10:37'),
(57, 1, 52, 30000, 0, 0, 0, '2017-12-28 09:11:44', '2017-12-28 09:11:44'),
(58, 2, 52, 30000, 0, 0, 0, '2017-12-28 09:12:20', '2017-12-28 09:12:20'),
(59, 5, 51, 18000, 1, 1, 0, '2017-12-28 09:25:14', '2017-12-28 12:10:41'),
(60, 5, 53, 25000, 1, 1, 0, '2017-12-28 10:39:59', '2017-12-28 12:10:46'),
(61, 1, 55, 20000, 0, 0, 0, '2017-12-28 10:51:47', '2017-12-28 10:51:47'),
(62, 5, 56, 15000, 1, 1, 0, '2017-12-28 11:30:38', '2017-12-28 12:10:50'),
(63, 5, 57, 30000, 1, 1, 0, '2017-12-28 11:45:43', '2017-12-28 12:10:53'),
(64, 2, 58, 35000, 0, 0, 0, '2017-12-28 12:06:56', '2017-12-28 12:06:56'),
(65, 5, 59, 25000, 1, 1, 0, '2017-12-28 12:34:06', '2017-12-28 15:13:36'),
(66, 2, 60, 25000, 0, 0, 0, '2017-12-28 12:37:41', '2017-12-28 12:37:41'),
(67, 5, 60, 25000, 1, 1, 0, '2017-12-28 12:38:55', '2017-12-28 15:13:51'),
(68, 1, 61, 25000, 0, 0, 0, '2017-12-28 12:53:17', '2017-12-28 12:53:17'),
(69, 5, 62, 25000, 1, 1, 0, '2017-12-28 13:36:41', '2017-12-28 15:13:56'),
(70, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:02', '2017-12-28 15:14:00'),
(71, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:02', '2017-12-28 15:14:00'),
(72, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:03', '2017-12-28 15:14:00'),
(73, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:03', '2017-12-28 15:14:00'),
(74, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:03', '2017-12-28 15:14:00'),
(75, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:20', '2017-12-28 15:14:00'),
(76, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:23', '2017-12-28 15:14:00'),
(77, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:26', '2017-12-28 15:14:00'),
(78, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:26', '2017-12-28 15:14:00'),
(79, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:28', '2017-12-28 15:14:00'),
(80, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:30', '2017-12-28 15:14:00'),
(81, 5, 63, 25000, 1, 1, 0, '2017-12-28 14:33:40', '2017-12-28 15:14:00'),
(82, 2, 64, 30000, 0, 0, 0, '2017-12-28 15:12:13', '2017-12-28 15:12:13'),
(83, 1, 65, 500, 0, 0, 0, '2017-12-28 15:19:08', '2017-12-28 15:19:08'),
(84, 5, 65, 450, 1, 1, 0, '2017-12-28 15:20:27', '2017-12-30 14:43:00'),
(85, 5, 64, 30000, 1, 1, 0, '2017-12-28 15:21:53', '2017-12-30 14:45:48'),
(86, 5, 66, 20000, 1, 1, 0, '2017-12-28 16:37:40', '2017-12-30 14:45:54'),
(87, 5, 67, 20000, 1, 1, 0, '2017-12-28 19:35:03', '2017-12-30 14:45:54'),
(88, 1, 69, 35000, 0, 0, 0, '2017-12-28 21:02:49', '2017-12-28 21:02:49'),
(89, 5, 71, 250, 1, 1, 0, '2017-12-28 23:53:14', '2017-12-30 14:48:25'),
(90, 3, 72, 25000, 0, 0, 0, '2017-12-29 00:41:21', '2017-12-29 00:41:21'),
(91, 5, 72, 25000, 1, 1, 0, '2017-12-29 00:41:58', '2017-12-30 14:48:25'),
(92, 2, 73, 20000, 0, 0, 0, '2017-12-29 00:52:33', '2017-12-29 00:52:33'),
(93, 5, 74, 18000, 1, 1, 0, '2017-12-29 20:22:04', '2017-12-30 14:48:25'),
(94, 5, 24, 25000, 1, 1, 0, '2017-12-29 23:00:00', '2017-12-30 14:48:25'),
(95, 6, 1, 15000, 0, 1, 0, '2017-12-31 16:49:26', '2018-01-04 01:32:23'),
(96, 6, 76, 70000, 1, 1, 0, '2018-01-02 13:51:06', '2018-01-03 02:30:19'),
(97, 6, 77, 100000, 1, 1, 0, '2018-01-02 18:11:55', '2018-01-03 02:30:21'),
(98, 6, 78, 35000, 1, 1, 0, '2018-01-02 21:37:06', '2018-01-03 02:30:23'),
(99, 6, 2, 40000, 1, 1, 0, '2018-01-03 02:32:04', '2018-01-03 02:32:13'),
(100, 6, 83, 0, 0, 1, 0, '2018-01-24 11:00:17', '2018-01-30 22:17:02'),
(101, 7, 2, 30000, 1, 1, 0, '2018-01-30 22:26:51', '2018-01-30 22:27:02'),
(102, 8, 2, 20000, 0, 1, 0, '2018-01-31 00:30:21', '2018-01-31 00:30:31'),
(103, 9, 90, 15000, 1, 0, 0, '2018-02-05 04:58:41', '2018-02-14 00:44:33'),
(104, 9, 91, 15000, 1, 1, 0, '2018-02-05 05:01:56', '2018-02-13 21:55:08'),
(105, 9, 93, 15000, 1, 0, 0, '2018-02-05 05:12:52', '2018-02-14 04:06:00'),
(106, 9, 48, 15000, 1, 0, 0, '2018-02-05 05:12:52', '2018-02-14 04:06:04'),
(107, 9, 96, 15000, 1, 0, 0, '2018-02-05 05:23:29', '2018-02-14 04:06:08'),
(108, 9, 97, 15000, 1, 0, 0, '2018-02-05 05:25:25', '2018-02-14 04:06:13'),
(109, 9, 98, 15000, 1, 1, 0, '2018-02-05 05:29:15', '2018-02-06 04:29:13'),
(110, 9, 99, 20000, 1, 1, 0, '2018-02-05 05:35:11', '2018-02-06 04:29:20'),
(111, 9, 101, 15000, 1, 0, 0, '2018-02-05 05:58:21', '2018-02-14 04:06:31'),
(112, 9, 100, 15000, 1, 0, 0, '2018-02-05 05:59:29', '2018-02-14 04:06:17'),
(113, 9, 102, 15000, 1, 0, 0, '2018-02-05 06:03:07', '2018-02-14 04:06:21'),
(114, 9, 103, 15000, 1, 1, 0, '2018-02-05 06:05:56', '2018-02-06 04:29:31'),
(115, 9, 104, 20000, 0, 1, 0, '2018-02-05 06:08:54', '2018-02-06 04:29:45'),
(116, 9, 105, 15000, 1, 1, 0, '2018-02-05 06:25:15', '2018-02-06 04:29:47'),
(117, 9, 106, 25000, 0, 1, 0, '2018-02-05 06:34:23', '2018-02-06 04:29:51'),
(118, 9, 110, 15000, 1, 1, 0, '2018-02-05 06:54:09', '2018-02-06 04:29:55'),
(119, 9, 108, 13000, 1, 0, 0, '2018-02-05 06:54:50', '2018-02-14 04:06:35'),
(120, 9, 112, 20000, 0, 1, 0, '2018-02-05 07:08:02', '2018-02-06 04:30:04'),
(121, 9, 107, 17000, 0, 0, 0, '2018-02-05 07:10:42', '2018-02-14 04:06:38'),
(122, 9, 114, 25000, 0, 1, 0, '2018-02-05 07:27:22', '2018-02-06 04:30:17'),
(123, 9, 113, 20000, 0, 0, 0, '2018-02-05 07:43:25', '2018-02-14 04:06:53'),
(124, 9, 56, 15000, 1, 0, 0, '2018-02-05 08:03:11', '2018-02-14 04:07:06'),
(125, 9, 119, 15000, 1, 1, 0, '2018-02-05 08:41:20', '2018-02-06 04:32:12'),
(126, 9, 120, 15000, 1, 1, 0, '2018-02-05 08:46:43', '2018-02-06 04:32:21'),
(127, 9, 117, 15000, 1, 0, 0, '2018-02-05 08:50:39', '2018-02-14 04:07:00'),
(128, 9, 121, 18000, 0, 1, 0, '2018-02-05 08:51:58', '2018-02-06 04:30:36'),
(129, 9, 122, 15000, 1, 1, 0, '2018-02-05 08:55:15', '2018-02-06 04:32:18'),
(130, 9, 123, 18000, 0, 1, 0, '2018-02-05 09:11:31', '2018-02-06 04:30:41'),
(131, 9, 92, 15000, 0, 1, 0, '2018-02-05 09:15:06', '2018-02-06 04:30:38'),
(132, 9, 124, 15000, 1, 1, 0, '2018-02-05 09:16:19', '2018-02-06 04:32:16'),
(133, 9, 125, 15000, 1, 1, 0, '2018-02-05 09:31:40', '2018-02-06 04:32:24'),
(134, 9, 128, 20000, 0, 1, 0, '2018-02-05 09:41:17', '2018-02-06 04:30:46'),
(135, 9, 129, 20000, 0, 1, 0, '2018-02-05 09:45:32', '2018-02-06 04:30:50'),
(136, 9, 127, 15000, 1, 1, 0, '2018-02-05 09:53:08', '2018-02-06 04:32:27'),
(137, 9, 131, 15000, 1, 1, 0, '2018-02-05 10:19:32', '2018-02-06 04:32:28'),
(138, 9, 87, 15000, 1, 1, 0, '2018-02-05 10:21:41', '2018-02-06 04:32:35'),
(139, 9, 132, 15000, 1, 1, 0, '2018-02-05 10:42:11', '2018-02-06 04:32:54'),
(140, 9, 133, 15000, 1, 1, 0, '2018-02-05 10:47:40', '2018-02-06 04:32:37'),
(141, 9, 135, 15000, 1, 1, 0, '2018-02-05 11:08:44', '2018-02-06 04:32:40'),
(142, 9, 136, 18000, 0, 1, 0, '2018-02-05 11:16:01', '2018-02-06 04:31:04'),
(143, 9, 137, 13000, 1, 1, 0, '2018-02-05 11:23:06', '2018-02-06 04:32:47'),
(144, 9, 138, 15000, 1, 1, 0, '2018-02-05 11:34:01', '2018-02-06 04:32:42'),
(145, 9, 139, 17000, 0, 1, 0, '2018-02-05 11:54:48', '2018-02-06 04:31:07'),
(146, 9, 140, 15000, 1, 1, 0, '2018-02-05 12:25:57', '2018-02-06 04:32:46'),
(147, 9, 141, 15000, 1, 1, 0, '2018-02-05 12:48:06', '2018-02-06 04:32:44'),
(148, 9, 143, 15000, 1, 1, 0, '2018-02-05 12:58:25', '2018-02-06 04:32:56'),
(149, 9, 144, 15000, 1, 1, 0, '2018-02-05 13:16:15', '2018-02-06 04:32:58'),
(150, 9, 145, 15000, 1, 1, 0, '2018-02-05 13:22:56', '2018-02-06 04:32:59'),
(151, 9, 147, 15000, 1, 1, 0, '2018-02-05 13:46:03', '2018-02-06 04:33:00'),
(152, 9, 146, 14000, 1, 1, 0, '2018-02-05 13:51:35', '2018-02-06 04:33:05'),
(153, 9, 148, 15000, 1, 1, 0, '2018-02-05 13:53:31', '2018-02-06 04:33:11'),
(154, 9, 149, 20000, 0, 1, 0, '2018-02-05 13:58:53', '2018-02-06 04:31:15'),
(155, 9, 151, 18000, 0, 1, 0, '2018-02-05 14:03:38', '2018-02-06 04:31:21'),
(156, 9, 150, 15000, 1, 1, 0, '2018-02-05 14:08:24', '2018-02-06 04:33:12'),
(157, 9, 152, 15000, 1, 1, 0, '2018-02-05 14:21:05', '2018-02-06 04:33:15'),
(158, 9, 153, 15000, 1, 1, 0, '2018-02-05 20:21:18', '2018-02-06 04:33:14'),
(159, 9, 154, 28000, 0, 1, 0, '2018-02-05 20:35:36', '2018-02-06 04:31:27'),
(160, 9, 155, 20000, 0, 1, 0, '2018-02-05 20:54:28', '2018-02-06 04:31:29'),
(161, 9, 157, 15000, 1, 1, 0, '2018-02-05 21:20:27', '2018-02-06 04:33:28'),
(162, 9, 158, 15000, 1, 1, 0, '2018-02-05 21:22:48', '2018-02-06 04:33:17'),
(163, 9, 160, 15000, 1, 1, 0, '2018-02-05 23:37:50', '2018-02-06 04:33:33'),
(164, 9, 161, 15000, 1, 1, 0, '2018-02-05 23:53:12', '2018-02-06 04:33:19'),
(165, 9, 162, 15000, 1, 1, 0, '2018-02-06 00:36:28', '2018-02-06 04:33:21'),
(166, 9, 163, 15000, 1, 1, 0, '2018-02-06 00:41:51', '2018-02-06 04:33:23'),
(167, 9, 164, 15000, 1, 1, 0, '2018-02-06 00:45:01', '2018-02-06 04:33:29'),
(168, 9, 166, 15000, 1, 1, 0, '2018-02-06 00:52:28', '2018-02-06 04:33:35'),
(169, 9, 165, 18000, 0, 1, 0, '2018-02-06 00:59:29', '2018-02-06 04:31:49'),
(170, 9, 167, 18000, 0, 1, 0, '2018-02-06 01:44:30', '2018-02-06 04:31:47'),
(171, 9, 168, 15000, 1, 1, 0, '2018-02-06 02:55:55', '2018-02-06 04:33:31'),
(172, 9, 170, 18000, 0, 1, 0, '2018-02-06 04:24:29', '2018-02-06 04:31:43'),
(173, 9, 171, 18000, 0, 1, 0, '2018-02-06 04:49:12', '2018-02-10 04:00:07'),
(174, 9, 173, 15000, 1, 1, 0, '2018-02-06 06:18:34', '2018-02-10 04:04:57'),
(175, 9, 174, 20000, 0, 1, 0, '2018-02-06 06:46:47', '2018-02-10 04:05:04'),
(176, 9, 175, 15000, 0, 1, 0, '2018-02-06 08:27:12', '2018-02-10 04:05:21'),
(177, 9, 81, 20000, 0, 1, 0, '2018-02-06 08:31:31', '2018-02-10 04:05:26'),
(178, 9, 176, 15000, 0, 1, 0, '2018-02-06 09:31:06', '2018-02-10 04:05:39'),
(179, 9, 177, 15000, 1, 1, 0, '2018-02-06 10:28:17', '2018-02-10 04:06:02'),
(180, 9, 118, 15000, 0, 1, 0, '2018-02-06 11:19:06', '2018-02-10 04:27:29'),
(181, 9, 24, 18000, 0, 1, 0, '2018-02-06 11:24:47', '2018-02-10 04:15:54'),
(182, 9, 178, 15000, 1, 1, 0, '2018-02-06 11:28:40', '2018-02-10 04:32:48'),
(183, 9, 179, 15000, 0, 1, 0, '2018-02-06 13:10:40', '2018-02-10 04:16:00'),
(184, 9, 180, 20000, 0, 1, 0, '2018-02-07 01:10:18', '2018-02-10 04:16:02'),
(185, 9, 182, 18000, 0, 1, 0, '2018-02-07 12:09:59', '2018-02-10 04:16:04'),
(186, 9, 183, 20000, 0, 1, 0, '2018-02-07 12:11:10', '2018-02-10 04:16:05'),
(187, 9, 184, 20000, 0, 1, 0, '2018-02-07 12:17:12', '2018-02-10 04:16:12'),
(188, 9, 188, 20000, 0, 1, 0, '2018-02-07 19:20:50', '2018-02-10 04:28:01'),
(189, 9, 190, 15000, 1, 1, 0, '2018-02-08 01:08:50', '2018-02-10 04:34:06'),
(190, 9, 191, 15000, 0, 1, 0, '2018-02-08 01:33:03', '2018-02-10 04:36:41'),
(191, 9, 192, 15000, 1, 1, 0, '2018-02-08 07:44:00', '2018-02-11 00:38:05'),
(192, 9, 194, 15000, 1, 1, 0, '2018-02-08 08:20:56', '2018-02-11 00:38:40'),
(193, 9, 195, 15000, 1, 1, 0, '2018-02-08 09:37:51', '2018-02-11 00:38:43'),
(194, 9, 197, 18000, 0, 1, 0, '2018-02-08 11:25:03', '2018-02-10 04:28:07'),
(195, 9, 41, 15000, 1, 1, 0, '2018-02-08 12:21:45', '2018-02-11 00:38:48'),
(196, 9, 198, 20000, 0, 1, 0, '2018-02-10 07:36:33', '2018-02-11 00:38:51'),
(197, 9, 199, 17000, 1, 1, 0, '2018-02-11 05:44:36', '2018-02-13 21:58:24'),
(198, 9, 200, 15000, 0, 0, 0, '2018-02-11 07:51:11', '2018-02-11 07:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

DROP TABLE IF EXISTS `archives`;
CREATE TABLE IF NOT EXISTS `archives` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_logo`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Madina Cement Industries Ltd', '2.png', 0, 0, '2017-12-25 10:04:36', '2017-12-25 10:04:36'),
(2, 'Madina Maritime Ltd', '13.png', 0, 0, '2017-12-25 10:09:41', '2017-12-25 10:16:02'),
(3, 'Madina Filling Service Ltd.', '19.png', 0, 0, '2017-12-25 10:12:41', '2017-12-25 12:11:29'),
(5, 'Madina Polymer Industries Ltd.', '6.png', 0, 0, '2017-12-25 10:14:31', '2017-12-25 10:16:30'),
(6, 'Madina Trading Corporation (Pvt.) Ltd.', '1.png', 0, 0, '2017-12-25 10:15:16', '2017-12-25 12:13:45'),
(7, 'Madina Polyfibre Ltd.', '12.png', 0, 0, '2017-12-25 10:15:55', '2017-12-25 12:14:04'),
(8, 'Chan Sardar Cold Storage Ltd', '14.png', 0, 0, '2017-12-25 10:16:46', '2017-12-25 12:14:27'),
(9, 'Madina Fruits Limited', '18.png', 0, 0, '2017-12-25 10:18:46', '2017-12-25 12:14:46'),
(10, 'Bismillah Navigation Ltd.', '16.png', 0, 0, '2017-12-25 10:19:47', '2017-12-25 12:15:09'),
(11, 'Fleet International Ltd.', '17.png', 0, 0, '2017-12-25 10:22:56', '2017-12-25 12:30:58'),
(22, 'Madina Heemagar', '15.png', 0, 0, '2017-12-28 10:05:10', '2017-12-28 10:05:10'),
(16, 'Madina Developments Ltd.', '5.png', 0, 0, '2017-12-25 11:05:58', '2017-12-25 12:16:41'),
(23, 'Madina Limited', '2 (1).png', 0, 0, '2017-12-28 10:06:06', '2017-12-28 10:06:06'),
(18, 'Madina Pipe & Fittings', '10.png', 0, 0, '2017-12-25 11:21:04', '2017-12-25 12:17:03'),
(19, 'Madina Pump & Foundry', '8.png', 0, 0, '2017-12-25 11:24:21', '2017-12-25 12:17:22'),
(20, 'Madina Kitchen Sink', '7.png', 0, 0, '2017-12-25 11:25:27', '2017-12-25 12:17:39'),
(21, 'Madina Gas Stove', '9.png', 0, 0, '2017-12-25 11:26:02', '2017-12-25 12:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `final_lists`
--

DROP TABLE IF EXISTS `final_lists`;
CREATE TABLE IF NOT EXISTS `final_lists` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ExpectedSalary` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_lists`
--

INSERT INTO `final_lists` (`id`, `job_post_id`, `user_id`, `ExpectedSalary`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 70000, 0, 0, '2018-01-04 02:40:59', '2018-01-30 22:17:43'),
(2, 9, 97, NULL, 0, 1, '2018-02-13 22:05:44', '2018-02-13 22:09:11'),
(3, 9, 98, NULL, 0, 1, '2018-02-13 22:05:48', '2018-02-14 00:10:57'),
(4, 9, 99, NULL, 0, 0, '2018-02-13 22:05:51', '2018-02-13 22:05:51'),
(5, 9, 100, NULL, 0, 0, '2018-02-13 22:05:55', '2018-02-13 22:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE IF NOT EXISTS `interviews` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ExpectedSalary` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `job_post_id`, `user_id`, `ExpectedSalary`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 70000, 1, 1, '2018-01-04 02:40:12', '2018-01-04 02:40:59'),
(2, 9, 91, 15000, 0, 1, '2018-02-06 04:41:50', '2018-02-13 22:02:05'),
(3, 9, 93, 15000, 0, 1, '2018-02-06 04:43:03', '2018-02-13 22:02:08'),
(4, 9, 48, NULL, 0, 1, '2018-02-06 04:43:53', '2018-02-13 22:02:11'),
(5, 9, 96, 15000, 0, 1, '2018-02-06 04:45:03', '2018-02-13 22:02:14'),
(6, 9, 97, NULL, 1, 1, '2018-02-06 04:45:30', '2018-02-13 22:05:44'),
(7, 9, 98, NULL, 1, 1, '2018-02-06 04:46:21', '2018-02-13 22:05:48'),
(8, 9, 99, NULL, 1, 1, '2018-02-06 04:47:06', '2018-02-13 22:05:51'),
(9, 9, 100, NULL, 1, 1, '2018-02-06 04:48:05', '2018-02-13 22:05:55'),
(10, 9, 102, NULL, 0, 0, '2018-02-06 04:48:51', '2018-02-13 05:32:55'),
(11, 9, 103, 15000, 0, 0, '2018-02-06 04:50:59', '2018-02-13 05:32:56'),
(12, 9, 110, 15000, 0, 0, '2018-02-06 04:51:35', '2018-02-13 05:32:58'),
(13, 9, 105, NULL, 0, 0, '2018-02-06 04:52:33', '2018-02-13 05:33:01'),
(14, 9, 108, NULL, 0, 0, '2018-02-06 05:21:20', '2018-02-13 05:33:03'),
(15, 9, 120, 15000, 0, 0, '2018-02-06 05:23:58', '2018-02-06 05:23:58'),
(16, 9, 131, NULL, 0, 0, '2018-02-06 05:26:09', '2018-02-06 05:26:09'),
(17, 9, 133, NULL, 0, 0, '2018-02-06 05:27:04', '2018-02-06 05:27:04'),
(18, 9, 135, 15000, 0, 0, '2018-02-06 05:27:30', '2018-02-06 05:27:30'),
(19, 9, 138, 15000, 0, 0, '2018-02-06 05:28:05', '2018-02-06 05:28:05'),
(20, 9, 141, 15000, 0, 0, '2018-02-06 05:28:34', '2018-02-06 05:28:34'),
(21, 9, 192, 15000, 0, 0, '2018-02-11 00:39:21', '2018-02-11 00:39:21'),
(22, 9, 194, 15000, 0, 0, '2018-02-11 00:39:24', '2018-02-11 00:39:24'),
(23, 9, 195, 15000, 0, 0, '2018-02-11 00:39:27', '2018-02-11 00:39:27'),
(24, 9, 41, 15000, 0, 0, '2018-02-11 00:39:29', '2018-02-11 00:39:29'),
(25, 9, 56, 15000, 0, 0, '2018-02-11 00:39:41', '2018-02-11 00:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

DROP TABLE IF EXISTS `job_posts`;
CREATE TABLE IF NOT EXISTS `job_posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `JobTitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoofVacancies` int(11) DEFAULT NULL,
  `ApplyInstruction` text COLLATE utf8mb4_unicode_ci,
  `ApplicationDeadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AgeRangeFrom` int(11) DEFAULT NULL,
  `AgeRangeTo` int(11) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `JobType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JobLevel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EducationalQualification` text COLLATE utf8mb4_unicode_ci,
  `JobContext` text COLLATE utf8mb4_unicode_ci,
  `JobDescription` text COLLATE utf8mb4_unicode_ci,
  `AdditionalJobRequirements` text COLLATE utf8mb4_unicode_ci,
  `ExperienceRequiredOption` int(11) DEFAULT NULL,
  `MinimumExperience` int(11) DEFAULT NULL,
  `MaximumExperience` int(11) DEFAULT NULL,
  `JobLocation` text COLLATE utf8mb4_unicode_ci,
  `SalaryRangeOption` int(11) DEFAULT NULL,
  `MinimumSalaryRange` int(11) DEFAULT NULL,
  `MaximumSalaryRange` int(11) DEFAULT NULL,
  `SalaryDetails` text COLLATE utf8mb4_unicode_ci,
  `OtherBenefits` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `company_id`, `JobTitle`, `NoofVacancies`, `ApplyInstruction`, `ApplicationDeadline`, `AgeRangeFrom`, `AgeRangeTo`, `Gender`, `JobType`, `JobLevel`, `EducationalQualification`, `JobContext`, `JobDescription`, `AdditionalJobRequirements`, `ExperienceRequiredOption`, `MinimumExperience`, `MaximumExperience`, `JobLocation`, `SalaryRangeOption`, `MinimumSalaryRange`, `MaximumSalaryRange`, `SalaryDetails`, `OtherBenefits`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'H.R. Executive (Manager)', 2, 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '01/31/2018', 20, 35, 1, '[\"1\",null,null,\"4\"]', '[\"1\",\"2\",null]', 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 3, '[\"Dhaka\"]', 3, 20000, 40000, 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2017-12-25 10:38:48', '2017-12-30 14:41:00'),
(2, 2, 'Marketing Executive', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '01/30/2018', 20, 38, 1, '[null,null,null,null]', '[null,null,null]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 2, 6, '[\"Dhaka\"]', 3, 20000, 40000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2017-12-25 10:55:06', '2017-12-30 14:43:45'),
(6, 5, 'Manager (Accounts & Finance)', 1, 'without having relevant job experience need not to apply.\r\nApplicant must enclose his/her Photograph with CV.', '01/05/2018', 35, 40, 3, '[\"1\",null,null,null]', '[null,\"2\",null]', 'Master Degree in Accounting/ Finance with professional qualification e.g. CA(CC), ACCA, CMA part qualified.', 'In 1998, in the history book of Bangladesh plastic industry, a new chapter was written MTC Polycon Industries Ltd. Was established as a part of Madina Group. Later it was named Madina Polymer Industries Limited. Madina Polymer Industries is now progressing towards future with glorious history of producing and manufacturing plastic goods.\r\n\r\nIn the scale of quality it is now reaching the highest peak. Specially, the first & the only three layer food grade plastic Tank achieved the popularity among the people of Bangladesh. Madina Polymer Industries Limited is one of the largest plastic manufacturing companies. Its main objective is to spread Bangladeshi plastic industry in the international market.\r\n\r\nFor this purpose, Madina Polymer is determined to keep the quality of its goods to maximum level Qualified & active worker team, ultra modern & environment friendly technology, rich raw materials & the dealer network throughout the country are the main causes of our quality production', 'Analysis Quarterly/yearly Financial Statement and report to management.\r\n    Provides financial analysis and recommendations for management decision\r\n    Maintain accounting transactions in according to established accounting standards\r\n    Establish and enforce to maintain accounting principles, practices & procedures to ensure accurate and timely financial statements preparation\r\n    Checking of Bank Payment, Receipt and journal Voucher through accounting software & check monthly cash/credit sales & collection.\r\n    Monitor and supervise purchase related accounting activities such as suppliers bill provisioning, suppliers payments, advance adjustments, import monitoring and checking Landing cost related journals\r\n    Responsible for addressing the companies tax and VAT related correspondence, organize and manage file of all documents\r\n    Establish Costing, Cost control & cost reduction procedures\r\n    Monitor and report on Fixed Assets of the company on quarterly/monthly basis as to opening, addition , disposal and closing of the assets\r\n    Monitor bank reconciliation, inter company reconciliation, bank loan position and bank charges including interest\r\n    Reconciliation of production, delivery and finished goods stock status of depot and plant.\r\n    Capable in credit control and follow-up ageing report.\r\n    Understanding of business strategy, budget and forecasting model.\r\n    Strong analytical ability with business writing skill.', 'Strong skill in MS Office, SAP\r\nCandidate must be fully conversant with Budgeting, Forecasting, Cost & Credit Control, Margin Analysis, Costing & Profitability Analysis and Management Reporting\r\nCandidate should be smart and articulate with good communication and presentation skill', 1, 8, 10, '[\"Dhaka\"]', 1, 0, 0, NULL, 'As Per Company Policy', 0, 1, '2017-12-31 14:19:49', '2018-01-30 22:22:19'),
(4, 1, 'Manager, Accounts & Finance', 1, 'end Your CV to particular email address siam@madina.co (mention position name in subject line)\r\nwithout having relevant job experience need not to apply.\r\nApplicant must enclose his photograph with CV.', '12/29/2017', 35, 40, 1, '[\"1\",null,null,null]', '[null,\"2\",null]', 'Master Degree in Accounting/ Finance with professional qualification e.g. CA(CC), ACCA, CMA part qualified.', 'Madina Group, a leading private sector business conglomerate in the country, commenced business in the year of 1978 in the name and style of Madina Trading Corporation. Initially it was engaged in marketing of cement after purchasing from the local importers. In 1982 it started importing quality cement from Indonesia, China, South Korea and other countries. It emerged as a private limited company in 1987. From the very inception, the company never looked back. It diversified its business following a successful operation over the last two decades which resulted in Madina Trading Corporation to take the shape of Madina Group.', 'Analysis Quarterly/yearly Financial Statement and report to management.\r\n    Provides financial analysis and recommendations for management decision\r\n    Maintain accounting transactions in according to established accounting standards\r\n    Establish and enforce to maintain accounting principles, practices & procedures to ensure accurate and timely financial statements preparation\r\n    Checking of Bank Payment, Receipt and journal Voucher through accounting software & check monthly cash/credit sales & collection.\r\n    Monitor and supervise purchase related accounting activities such as suppliers bill provisioning, suppliers payments, advance adjustments, import monitoring and checking Landing cost related journals\r\n    Responsible for addressing the companies tax and VAT related correspondence, organize and manage file of all documents\r\n    Establish Costing, Cost control & cost reduction procedures\r\n    Monitor and report on Fixed Assets of the company on quarterly/monthly basis as to opening, addition , disposal and closing of the assets\r\n    Monitor bank reconciliation, inter company reconciliation, bank loan position and bank charges including interest\r\n    Reconciliation of production, delivery and finished goods stock status of depot and plant.\r\n    Capable in credit control and follow-up ageing report.\r\n    Understanding of business strategy, budget and forecasting model.\r\n    Strong analytical ability with business writing skill.', 'Strong skill in MS Office, SAP\r\nCandidate must be fully conversant with Budgeting, Forecasting, Cost & Credit Control, Margin Analysis, Costing & Profitability Analysis and Management Reporting\r\nCandidate should be smart and articulate with good communication and presentation skill', 1, 8, 10, '[\"Dhaka\"]', 1, 0, 0, NULL, 'as per company policy', 0, 1, '2017-12-26 16:35:36', '2018-01-30 22:22:22'),
(5, 1, 'Jr. Executive/ Executive', 1, 'Applicant must enclose his/her Photograph with CV.', '12/29/2017', 24, 28, 3, '[\"1\",null,null,null]', '[\"1\",null,\"3\"]', 'BBA/ honors (Major in Accounting) from any reputed public University/ Private University with good academic records.', 'Madina Group, a leading private sector business conglomerate in the country, commenced business in the year of 1978 in the name and style of Madina Trading Corporation. Initially it was engaged in marketing of cement after purchasing from the local importers. In 1982 it started importing quality cement from Indonesia, China, South Korea and other countries. It emerged as a private limited company in 1987. From the very inception, the company never looked back. It diversified its business following a successful operation over the last two decades which resulted in Madina Trading Corporation to take the shape of Madina Group', '1.	To all Quotation create\r\n2.	To billing create\r\n3.	To customer balance reconciliation\r\n4.	To all Ghat  excel sheet maintain\r\n5.	To Ghat debit memo & credit memo create', 'Sound knowledge in Microsoft Excel', 0, 0, 0, '[\"Dhaka\"]', 1, 0, 0, NULL, 'As per company policy', 0, 1, '2017-12-27 12:30:13', '2017-12-31 16:38:52'),
(7, 1, 'HR manager', 1, 'apply here', '02/06/2018', 20, 29, 3, '[\"1\",null,null,null]', '[\"1\",null,\"3\"]', 'BBA HR', 'apply here', 'nothing', 'ok i get it', 1, 2, 3, '[\"Dhaka\"]', 1, 0, 0, 'don\'t ask', 'no benefits', 0, 1, '2018-01-30 22:26:01', '2018-01-31 00:27:45'),
(8, 1, 'Executive', 1, 'apply', '02/01/2018', 20, 24, 1, '[\"1\",null,null,null]', '[\"1\",null,null]', 'apply', 'apply', 'apply', 'apply', 1, 1, 2, '[\"Dhaka\"]', 1, 0, 0, 'apply', 'apply', 0, 1, '2018-01-31 00:29:35', '2018-01-31 00:43:36'),
(9, 7, 'Executive (Accounts Admin)', 1, 'for more info please call 01755535189', '02/09/2018', 25, 30, 3, '[\"1\",null,null,null]', '[\"1\",null,null]', 'BBA or Honors in Accounting or Finance.', 'This post is responsible for entry level Administrative job. \r\nJob Location: Meghna Ghat, Narayangonj', '1)Daily MIS Report preparation for Production, RM Consumption, Delivery,\r\n2)Daily Overtime Expenses calculation,\r\n3)Monthly Salary Sheet preparation,\r\n4)Various HR related Note generation (Both Bangla & English),\r\n5)Daily Factory Expenditure maintain,\r\n6)Some other Accounts related works assigned from HO.', 'Pro-active, smart, enthusiastic and career oriented\r\nStrong interpersonal skills and excellent communication skills both in written and speaking in English\r\nFamiliar in MS-Office & E-Mail Management\r\nDisciplined, Energetic, Good Negotiator, Honest, Team Player, etc', 0, 0, 0, '[\"Dhaka\"]', 3, 12000, 15000, 'As per company policy', '1. subsidies Lunch \r\n2. Dormitory\r\n3. Festival Bonus \r\n4. Mobile bill', 0, 0, '2018-02-04 22:29:09', '2018-02-04 22:29:09'),
(10, 16, 'Sr. Executive/ Asst. Manager, Sales & Marketing', 3, 'Send Your CV to particular email address deluar@madina.co (mention position name in subject line)\r\nwithout having relevant job experience need not to apply.', '02/17/2018', 30, 35, 1, '[\"1\",null,null,null]', '[null,\"2\",null]', 'MBA/Masters from any reputed public university or UGC Approved private university with good academic records.', 'N/A', 'Making plan for individuals and group to achieve the sales target.\r\nFollow up all the sales and promotional activities.\r\nEnsuring strong presence, visibility & dominance company products.\r\nAssist the team members to formulate operational team strategy to achieve objectives.\r\nResponsible for preparing reports, supervision and monitoring of the team activities.\r\nPreparing reports regarding sales and others in the end of every working day.\r\nKeeping the clients informed about the upcoming programs.\r\nManage all marketing communication and marketing requirements through effective management of the marketing function.\r\nFacilitate, control and coordinate the annual strategic marketing planning.\r\nProvide market intelligence to support business for strategic planning.\r\nFacilitate Management team to review and evaluate business performance in Business review meetings.\r\nManage relationships and service quality & standards\r\nProvide inputs with the strategic knowledge of country market environment and customer needs to facilitate principal marketing team to formulate their marketing programs.\r\nManage the whole sales team\r\nJob Location : Dhaka & Ctg', 'The applicants should have experience in the following area(s):\r\nSales, Marketing\r\n\r\nThe applicants should have experience in the following business area(s):\r\nReal Estate', 1, 5, 8, '[\"Dhaka\"]', 1, 0, 0, NULL, NULL, 0, 0, '2018-02-10 22:32:11', '2018-02-10 22:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
CREATE TABLE IF NOT EXISTS `logos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2014_10_12_000000_create_users_table', 2),
(70, '2014_10_12_100000_create_password_resets_table', 2),
(71, '2017_12_20_070255_create_admins_table', 2),
(72, '2017_12_20_070705_create_applications_table', 2),
(73, '2017_12_20_070739_create_archives_table', 2),
(74, '2017_12_20_070809_create_companies_table', 2),
(75, '2017_12_20_070843_create_final_lists_table', 2),
(76, '2017_12_20_070918_create_interviews_table', 2),
(77, '2017_12_20_070953_create_job_posts_table', 2),
(22, '2017_12_20_071021_create_profiles_table', 1),
(78, '2017_12_20_071055_create_rejects_table', 2),
(79, '2017_12_20_071122_create_short_lists_table', 2),
(80, '2017_12_21_044607_create_roles_table', 2),
(81, '2017_12_21_044916_create_role_admins_table', 2),
(82, '2017_12_22_180745_create_logos_table', 2),
(83, '2018_02_19_084045_create_recruitment_requisition_form_ones_table', 3),
(84, '2018_02_19_084113_create_recruitment_requisition_form_twos_table', 3),
(85, '2018_02_19_084137_create_recruitment_requisition_form_threes_table', 3),
(86, '2018_02_19_112925_create_test_mos_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sherealik@gmail.com', '$2y$10$NzLeFimwktYXrdI3pPeLzeruHKfiaa19Su4cX9zKzKp4G8.wRIqxO', '2017-12-25 12:28:08'),
('sqzaman12@gmail.com', '$2y$10$j1F/psimnI4VcJWjdTV98.DJQT4ZdbCyK5WhHU0a8wo1n51rpfdfW', '2018-01-04 09:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_requisition_form_ones`
--

DROP TABLE IF EXISTS `recruitment_requisition_form_ones`;
CREATE TABLE IF NOT EXISTS `recruitment_requisition_form_ones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_employees_required` int(11) DEFAULT NULL,
  `no_of_existing_positions` int(11) DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy_created_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anticipated_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_hiring_for_same` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replaced_employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replaced_employee_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_requirements` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `internal_or_transfer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newspaper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment_requisition_form_ones`
--

INSERT INTO `recruitment_requisition_form_ones` (`id`, `unit_name`, `position`, `no_of_employees_required`, `no_of_existing_positions`, `department`, `vacancy_created_on`, `anticipated_start_date`, `last_hiring_for_same`, `replaced_employee_name`, `requested_by`, `replaced_employee_designation`, `requester_designation`, `education`, `work_experience`, `training`, `skills`, `additional_requirements`, `remarks`, `internal_or_transfer`, `newspaper`, `online`, `cv_bank`, `referral`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'gelo', 3, 2, 'cement', '02/02/2020', '02/01/2018', '02/02/2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-20 03:39:59', '2018-02-20 03:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_requisition_form_threes`
--

DROP TABLE IF EXISTS `recruitment_requisition_form_threes`;
CREATE TABLE IF NOT EXISTS `recruitment_requisition_form_threes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modification` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment_requisition_form_threes`
--

INSERT INTO `recruitment_requisition_form_threes` (`id`, `modification`, `created_at`, `updated_at`) VALUES
(1, 'wearsfdas', '2018-02-20 03:52:28', '2018-02-20 03:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_requisition_form_twos`
--

DROP TABLE IF EXISTS `recruitment_requisition_form_twos`;
CREATE TABLE IF NOT EXISTS `recruitment_requisition_form_twos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `head_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `factory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temporary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `casual` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slary_grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment_requisition_form_twos`
--

INSERT INTO `recruitment_requisition_form_twos` (`id`, `head_office`, `factory`, `field`, `permanent`, `contract`, `temporary`, `casual`, `slary_grade`, `job_class`, `comments`, `created_at`, `updated_at`) VALUES
(1, 'L1', 'L2', NULL, NULL, 'ET2', NULL, NULL, 'a', 'b', 'er twertfgv4ewbvtgrt', '2018-02-20 03:40:43', '2018-02-20 03:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `rejects`
--

DROP TABLE IF EXISTS `rejects`;
CREATE TABLE IF NOT EXISTS `rejects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-12-23 18:00:00', '2017-12-23 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_admins`
--

DROP TABLE IF EXISTS `role_admins`;
CREATE TABLE IF NOT EXISTS `role_admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admins`
--

INSERT INTO `role_admins` (`id`, `role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-12-23 18:00:00', '2017-12-23 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `short_lists`
--

DROP TABLE IF EXISTS `short_lists`;
CREATE TABLE IF NOT EXISTS `short_lists` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ExpectedSalary` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `short_lists`
--

INSERT INTO `short_lists` (`id`, `job_post_id`, `user_id`, `ExpectedSalary`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 20000, 0, 0, '2017-12-25 12:34:33', '2017-12-30 12:37:15'),
(2, 4, 2, 40000, 0, 1, '2017-12-27 08:45:51', '2018-01-30 22:21:59'),
(3, 1, 3, 20000, 0, 0, '2017-12-27 12:00:45', '2017-12-30 12:37:20'),
(4, 2, 3, 18000, 0, 0, '2017-12-27 12:01:01', '2017-12-27 12:01:01'),
(5, 4, 4, 100000, 0, 1, '2017-12-27 12:03:23', '2017-12-27 12:04:52'),
(6, 5, 5, 20000, 0, 0, '2017-12-27 16:06:04', '2017-12-27 16:06:04'),
(7, 5, 7, 25000, 0, 0, '2017-12-27 16:06:08', '2017-12-27 16:06:08'),
(8, 5, 9, 25000, 0, 0, '2017-12-27 16:06:11', '2017-12-27 16:06:11'),
(9, 5, 10, 18000, 0, 0, '2017-12-27 16:06:14', '2017-12-27 16:06:14'),
(10, 5, 12, 15000, 0, 1, '2017-12-27 16:06:17', '2017-12-30 14:39:39'),
(11, 5, 15, 350, 0, 0, '2017-12-27 16:06:19', '2017-12-27 16:06:19'),
(12, 5, 6, 20000, 0, 0, '2017-12-27 16:06:22', '2017-12-27 16:06:22'),
(13, 5, 16, 25000, 0, 0, '2017-12-27 16:06:26', '2017-12-27 16:06:26'),
(14, 5, 18, 25000, 0, 0, '2017-12-27 16:21:32', '2017-12-27 16:21:32'),
(15, 5, 21, 20000, 0, 0, '2017-12-27 17:00:00', '2017-12-27 17:00:00'),
(16, 5, 22, 15000, 0, 0, '2017-12-27 17:00:04', '2017-12-27 17:00:04'),
(17, 5, 2, 12000, 0, 1, '2017-12-27 17:00:10', '2017-12-30 16:46:59'),
(18, 5, 23, 15000, 0, 0, '2017-12-28 08:33:13', '2017-12-28 08:33:13'),
(19, 5, 25, 20000, 0, 0, '2017-12-28 08:33:17', '2017-12-28 08:33:17'),
(20, 5, 28, 20000, 0, 0, '2017-12-28 08:33:21', '2017-12-28 08:33:21'),
(21, 5, 27, 20000, 0, 0, '2017-12-28 08:33:26', '2017-12-28 08:33:26'),
(22, 5, 31, 22000, 0, 0, '2017-12-28 08:33:30', '2017-12-28 08:33:30'),
(23, 5, 29, 22000, 0, 0, '2017-12-28 08:33:35', '2017-12-28 08:33:35'),
(24, 5, 32, 25000, 0, 0, '2017-12-28 08:33:38', '2017-12-28 08:33:38'),
(25, 5, 35, 25000, 0, 0, '2017-12-28 08:33:42', '2017-12-28 08:33:42'),
(26, 5, 36, 20000, 0, 0, '2017-12-28 08:33:48', '2017-12-28 08:33:48'),
(27, 5, 37, 22000, 0, 0, '2017-12-28 08:33:54', '2017-12-28 08:33:54'),
(28, 5, 38, 30000, 0, 0, '2017-12-28 08:34:02', '2017-12-28 08:34:02'),
(29, 5, 39, 20000, 0, 0, '2017-12-28 08:34:12', '2017-12-28 08:34:12'),
(30, 5, 40, 22000, 0, 0, '2017-12-28 08:34:16', '2017-12-28 08:34:16'),
(31, 5, 41, 22000, 0, 0, '2017-12-28 08:34:20', '2017-12-28 08:34:20'),
(32, 5, 43, 25000, 0, 0, '2017-12-28 08:34:24', '2017-12-28 08:34:24'),
(33, 5, 44, 30000, 0, 0, '2017-12-28 08:34:29', '2017-12-28 08:34:29'),
(34, 5, 46, 45000, 0, 0, '2017-12-28 08:34:34', '2017-12-28 08:34:34'),
(35, 5, 47, 20000, 0, 0, '2017-12-28 08:34:39', '2017-12-28 08:34:39'),
(36, 5, 48, 20000, 0, 0, '2017-12-28 08:34:43', '2017-12-28 08:34:43'),
(37, 5, 50, 25000, 0, 1, '2017-12-28 08:34:46', '2017-12-28 08:38:57'),
(38, 5, 49, 15000, 0, 0, '2017-12-28 08:34:49', '2017-12-28 08:34:49'),
(39, 5, 52, 25000, 0, 0, '2017-12-28 12:10:37', '2017-12-28 12:10:37'),
(40, 5, 51, 18000, 0, 0, '2017-12-28 12:10:41', '2017-12-28 12:10:41'),
(41, 5, 53, 25000, 0, 0, '2017-12-28 12:10:46', '2017-12-28 12:10:46'),
(42, 5, 56, 15000, 0, 0, '2017-12-28 12:10:50', '2017-12-28 12:10:50'),
(43, 5, 57, 30000, 0, 0, '2017-12-28 12:10:53', '2017-12-28 12:10:53'),
(44, 5, 59, 25000, 0, 0, '2017-12-28 15:13:36', '2017-12-28 15:13:36'),
(45, 5, 60, 25000, 0, 0, '2017-12-28 15:13:51', '2017-12-28 15:13:51'),
(46, 5, 62, 25000, 0, 0, '2017-12-28 15:13:56', '2017-12-28 15:13:56'),
(47, 5, 63, 25000, 0, 0, '2017-12-28 15:14:00', '2017-12-28 15:14:00'),
(48, 5, 65, 450, 0, 0, '2017-12-30 14:41:47', '2017-12-30 14:41:47'),
(49, 5, 64, 30000, 0, 0, '2017-12-30 14:45:48', '2017-12-30 14:45:48'),
(50, 5, 66, 30000, 0, 0, '2017-12-30 14:45:54', '2017-12-30 14:45:54'),
(51, 5, 67, 30000, 0, 0, '2017-12-30 14:45:54', '2017-12-30 14:45:54'),
(52, 5, 74, 250, 0, 0, '2017-12-30 14:48:25', '2017-12-30 14:48:25'),
(53, 5, 71, 250, 0, 0, '2017-12-30 14:48:25', '2017-12-30 14:48:25'),
(54, 5, 24, 250, 0, 0, '2017-12-30 14:48:25', '2017-12-30 14:48:25'),
(55, 5, 72, 250, 0, 0, '2017-12-30 14:48:25', '2017-12-30 14:48:25'),
(57, 6, 76, 70000, 0, 0, '2018-01-03 02:30:19', '2018-01-03 02:30:19'),
(58, 6, 77, 100000, 0, 0, '2018-01-03 02:30:21', '2018-01-03 02:30:21'),
(59, 6, 78, 35000, 0, 0, '2018-01-03 02:30:23', '2018-01-03 02:30:23'),
(60, 6, 2, 40000, 1, 1, '2018-01-03 02:32:13', '2018-01-04 02:40:12'),
(61, 7, 2, 30000, 0, 1, '2018-01-30 22:27:02', '2018-01-31 00:27:24'),
(62, 9, 90, 15000, 0, 0, '2018-02-06 04:28:32', '2018-02-13 21:58:51'),
(63, 9, 91, 15000, 1, 0, '2018-02-06 04:28:34', '2018-02-13 21:58:54'),
(64, 9, 93, 15000, 1, 0, '2018-02-06 04:28:36', '2018-02-13 21:59:02'),
(65, 9, 48, 15000, 1, 1, '2018-02-06 04:28:44', '2018-02-06 04:43:53'),
(66, 9, 96, 15000, 1, 1, '2018-02-06 04:28:45', '2018-02-06 04:45:03'),
(67, 9, 97, 15000, 1, 1, '2018-02-06 04:28:47', '2018-02-06 04:45:30'),
(68, 9, 98, 15000, 1, 1, '2018-02-06 04:29:13', '2018-02-06 04:46:21'),
(69, 9, 99, 20000, 1, 1, '2018-02-06 04:29:20', '2018-02-06 04:47:06'),
(70, 9, 101, 15000, 0, 1, '2018-02-06 04:29:22', '2018-02-11 00:39:07'),
(71, 9, 100, 15000, 1, 1, '2018-02-06 04:29:25', '2018-02-06 04:48:05'),
(72, 9, 102, 15000, 1, 1, '2018-02-06 04:29:28', '2018-02-06 04:48:51'),
(73, 9, 103, 15000, 1, 1, '2018-02-06 04:29:31', '2018-02-06 04:50:59'),
(74, 9, 105, 15000, 1, 1, '2018-02-06 04:29:47', '2018-02-06 04:52:33'),
(75, 9, 110, 15000, 1, 1, '2018-02-06 04:29:55', '2018-02-06 04:51:35'),
(76, 9, 108, 13000, 1, 1, '2018-02-06 04:30:01', '2018-02-06 05:21:20'),
(77, 9, 56, 15000, 1, 1, '2018-02-06 04:32:10', '2018-02-11 00:39:41'),
(78, 9, 119, 15000, 0, 1, '2018-02-06 04:32:12', '2018-02-11 00:39:43'),
(79, 9, 117, 15000, 0, 1, '2018-02-06 04:32:14', '2018-02-06 05:22:26'),
(80, 9, 124, 15000, 0, 1, '2018-02-06 04:32:16', '2018-02-06 05:23:33'),
(81, 9, 122, 15000, 0, 1, '2018-02-06 04:32:18', '2018-02-06 05:22:49'),
(82, 9, 120, 15000, 1, 1, '2018-02-06 04:32:21', '2018-02-06 05:23:58'),
(83, 9, 125, 15000, 0, 1, '2018-02-06 04:32:24', '2018-02-06 05:25:39'),
(84, 9, 127, 15000, 0, 1, '2018-02-06 04:32:27', '2018-02-06 05:25:44'),
(85, 9, 131, 15000, 1, 1, '2018-02-06 04:32:28', '2018-02-06 05:26:09'),
(86, 9, 87, 15000, 0, 1, '2018-02-06 04:32:35', '2018-02-11 00:39:46'),
(87, 9, 133, 15000, 1, 1, '2018-02-06 04:32:37', '2018-02-06 05:27:04'),
(88, 9, 135, 15000, 1, 1, '2018-02-06 04:32:40', '2018-02-06 05:27:30'),
(89, 9, 138, 15000, 1, 1, '2018-02-06 04:32:42', '2018-02-06 05:28:05'),
(90, 9, 141, 15000, 1, 1, '2018-02-06 04:32:44', '2018-02-06 05:28:34'),
(91, 9, 140, 15000, 0, 1, '2018-02-06 04:32:46', '2018-02-06 05:29:05'),
(92, 9, 137, 15000, 0, 1, '2018-02-06 04:32:47', '2018-02-11 00:39:48'),
(93, 9, 132, 15000, 0, 1, '2018-02-06 04:32:54', '2018-02-11 00:39:50'),
(94, 9, 143, 15000, 0, 1, '2018-02-06 04:32:56', '2018-02-11 00:39:53'),
(95, 9, 144, 15000, 0, 1, '2018-02-06 04:32:58', '2018-02-11 00:39:59'),
(96, 9, 145, 15000, 0, 1, '2018-02-06 04:32:59', '2018-02-11 00:40:08'),
(97, 9, 147, 15000, 0, 1, '2018-02-06 04:33:00', '2018-02-11 00:40:14'),
(98, 9, 146, 14000, 0, 1, '2018-02-06 04:33:02', '2018-02-11 00:40:19'),
(99, 9, 148, 15000, 0, 1, '2018-02-06 04:33:11', '2018-02-11 00:40:24'),
(100, 9, 150, 15000, 0, 1, '2018-02-06 04:33:12', '2018-02-11 00:40:29'),
(101, 9, 153, 15000, 0, 1, '2018-02-06 04:33:14', '2018-02-11 00:40:33'),
(102, 9, 152, 15000, 0, 1, '2018-02-06 04:33:15', '2018-02-11 00:40:50'),
(103, 9, 158, 15000, 0, 1, '2018-02-06 04:33:17', '2018-02-11 00:40:55'),
(104, 9, 161, 15000, 0, 1, '2018-02-06 04:33:19', '2018-02-11 00:41:00'),
(105, 9, 162, 15000, 0, 1, '2018-02-06 04:33:21', '2018-02-11 00:41:06'),
(106, 9, 163, 15000, 0, 1, '2018-02-06 04:33:23', '2018-02-11 00:41:13'),
(107, 9, 157, 15000, 0, 1, '2018-02-06 04:33:28', '2018-02-11 00:41:18'),
(108, 9, 164, 15000, 0, 1, '2018-02-06 04:33:29', '2018-02-11 00:41:25'),
(109, 9, 168, 15000, 0, 1, '2018-02-06 04:33:31', '2018-02-11 00:41:34'),
(110, 9, 160, 15000, 0, 1, '2018-02-06 04:33:33', '2018-02-11 00:41:38'),
(111, 9, 166, 15000, 0, 1, '2018-02-06 04:33:35', '2018-02-11 00:41:42'),
(112, 9, 173, 15000, 0, 1, '2018-02-10 04:04:57', '2018-02-11 00:41:46'),
(113, 9, 177, 15000, 0, 1, '2018-02-10 04:06:02', '2018-02-11 00:41:50'),
(114, 9, 178, 15000, 0, 1, '2018-02-10 04:32:48', '2018-02-11 00:41:56'),
(115, 9, 190, 15000, 0, 1, '2018-02-10 04:34:06', '2018-02-11 00:42:04'),
(116, 9, 192, 15000, 1, 1, '2018-02-11 00:38:05', '2018-02-11 00:39:21'),
(117, 9, 194, 15000, 1, 1, '2018-02-11 00:38:40', '2018-02-11 00:39:24'),
(118, 9, 195, 15000, 1, 1, '2018-02-11 00:38:43', '2018-02-11 00:39:27'),
(119, 9, 41, 15000, 1, 1, '2018-02-11 00:38:48', '2018-02-11 00:39:29'),
(120, 9, 199, 17000, 0, 0, '2018-02-13 21:58:24', '2018-02-13 21:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `test_mos`
--

DROP TABLE IF EXISTS `test_mos`;
CREATE TABLE IF NOT EXISTS `test_mos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender` int(11) DEFAULT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Photo` text COLLATE utf8mb4_unicode_ci,
  `CV` text COLLATE utf8mb4_unicode_ci,
  `Username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Possition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Experience` text COLLATE utf8mb4_unicode_ci,
  `TotalYearsExperience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gender`, `FirstName`, `LastName`, `Photo`, `CV`, `Username`, `email`, `Phone`, `Education`, `Institution`, `Company`, `Possition`, `Experience`, `TotalYearsExperience`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Shere', 'Ali', 'Darshan-Raval-(1).jpg', 'shereali.docx', 'sherealik', 'sherealik@gmail.com', '01749240901', NULL, NULL, 'Madina Limited', 'Software Engineer', NULL, '5', '$2y$10$uBnjEyJVWM9k1P1/qIzYqu3sF94SSNux/K7sA5SMhNruIyCoFpK2W', 'Vqh33COuvCEKdYtG3k5DqDAxrCMIw0dn1qa3ZWQulaaFiXKFdG8kht3fQxpd', '2017-12-25 09:57:53', '2018-01-03 05:52:32'),
(79, NULL, 'Md.', 'Quamruzzaman', 'qzaman.jpg', 'Quamrul.doc', 'Sintu', 'sqzaman12@gmail.com', '01712834740', 'CMA - Partial', 'ICMAB', 'Softex Sweater Industries (Pvt) Ltd.', 'Manager - Cost & Budget', '1.8 Yrs', '11', '$2y$10$xzhzy1yZyxJbh1qMhTIFi.ikKFnLxWX5CuU0kKNzDgP4fbFvLjeqm', 'Ga4xHFyIy3K9Z0aLqnt5roTpUNJ4MDshYwwv9KHpKHe2XKYP6T0LXSr9sUqw', '2018-01-04 07:09:23', '2018-01-04 07:16:35'),
(2, NULL, 'Ashraful', 'islam', NULL, 'Md._Ashraful_Islam_CV.doc', 'siam', 'muhammad.ashraful@yahoo.com', '01755535189', NULL, NULL, 'Madina Group', 'Sr. Executive', NULL, NULL, '$2y$10$p1voP56WyBQAe7QNzRq5X.N/D.IxFiOHCExCvHnYDCE/3tPjc7./.', 'G133cOTuRRQI0pvgGkKyApzDPHycN8CFTmeFLf0aNj0UqhQkvsJtjG0C2jD8', '2017-12-25 12:30:04', '2017-12-25 12:30:56'),
(3, NULL, 'Md.', 'Juwel  Miah', NULL, 'juwel-CV.doc', 'juwel', 'rotno07@gmail.com', '01727202087', NULL, NULL, 'ujala paints', 'brand promotion officer', NULL, NULL, '$2y$10$mf2wuEv65ZDHt/WMmR1y.edoVvUeO0biiCRP/0IDUAACKHWeip17W', NULL, '2017-12-26 22:49:59', '2017-12-26 22:50:51'),
(4, NULL, 'Tarannum', 'Irin', NULL, 'Tarannum_Irin_CV BDJOBS.doc', 'tarannum', 'tarannumirin@gmail.com', '01726289896', NULL, NULL, 'Madina Group', 'Executive', NULL, NULL, '$2y$10$yNTWyWgb7PJF14mnBKiSCeMHkEI8mMvrmM9Loy1mbxuvNzNLyuQLO', 'wl0sxMBPZRXhPs2AdLim17SUqyb9iGmC4mniHbAUcx253gFZqxA4K6fYyzW9', '2017-12-27 11:57:55', '2017-12-27 12:02:12'),
(5, NULL, 'S. M. RIFAT', 'HASSAN', 'S_M_Rifat_Hassan_Photograph.jpg', 'S._M._RIFAT_HASSAN_CV.pdf', 'rifathasaan', 'rifat@live.in', '1618121121', 'BBA (Major: Finance, Minor: Accounting)', 'BRAC University', 'Export Import Bank of Bangladesh Limited', 'Intern', 'General Banking', '0.3', '$2y$10$vO8Uomc3AJT38JCz5uUJxOKb2FWBb58O4Gbyrt.0L1D55IWy9Q986', NULL, '2017-12-27 15:26:26', '2017-12-27 15:31:14'),
(6, NULL, 'Md. Shaniat', 'Hossain', 'Md. Shaniat Hossain.jpg', 'Md. Shaniat Hossain.pdf', 'Shaniat', 'shaniat.hossain@yahoo.com', '01948843558', 'BBA in Finance', 'East West University', 'N/A', 'N/A', 'N/A', '0', '$2y$10$kzftvVqho6NA/pkdkqAj1OzWm/UaMGFnEcaNrCixlq37.1GLbKceC', '1HKq3eZrUu38boy8jHf55uD3Gec6x0gSg7ULFegJsCxkZ4KKlZpWZkTeuR7w', '2017-12-27 15:26:29', '2017-12-27 15:48:44'),
(7, NULL, 'Omar', 'Faruque', NULL, 'Omar Faruque_MBA_2.doc', 'farukiiuc', 'faruque.iiuc@gmail.com', '01822967987', NULL, NULL, 'InnStar LTd.', 'Accounts Officer', NULL, NULL, '$2y$10$wUwrFO6ITMPQd3sthPvru.LtEvbfAWa/zbOP3G64RgTnyH0Up4jaq', NULL, '2017-12-27 15:36:44', '2017-12-27 15:38:25'),
(8, NULL, 'Arzumand Rahman', 'Sabik', 'PICTURE.jpg', 'Arzumand Rahman-CV.pdf', 'Arzumand', 'sabik0001@gmail.com', '01717369930', 'BBA (Marketing)', 'North South University', 'Transcom Group (ABC Radio 89.2 FM)', 'Executive', NULL, '1', '$2y$10$oOU3ysw6UKXa3byIOaimAe2JK2J76IxYKfjUDzN9l80wT.GnkynC2', NULL, '2017-12-27 15:37:57', '2017-12-27 15:55:37'),
(9, NULL, 'Noman', 'Ahmed', 'Noman.jpg', 'Resume_Noman_IUB.pdf', 'Noman', 'nahmed1030106@gmail.com', '01686331059', 'BBA', 'Independent University, Bangladesh', 'Inovio, Dhaka', 'Digital Marketing Associate', NULL, '2', '$2y$10$Rzn0t.8wG8897nVvFFIWiuJsMLOApHM.bE2cpcg6c73QLfaGtDXjO', 'fRKlMBtaS2B4ZlDZ2owHPu7hbpsw24cbRCsUzamcoL4A5TLbLJxFDStDRAX1', '2017-12-27 15:40:15', '2017-12-27 15:45:57'),
(10, NULL, 'Muhammed Junaed', 'Hussain', 'Muhammed Junaed Hussain.jpg', 'Muhammed Junaed Hussain.pdf', 'junaed.hussain', 'junaed.hussain@northsouth.edu', '01791919002', NULL, NULL, 'NSU Finance Club', 'Founder, General Secratory', NULL, NULL, '$2y$10$zgOTza/8DUMlp.Iy3zWd7uPnpCfYJy0tFkcn4KD2R9Eer6N09bNMO', NULL, '2017-12-27 15:42:35', '2017-12-29 13:13:32'),
(11, NULL, 'Duti', 'Aroni', 'Picture.jpg', NULL, 'dutiaroni', 'dutiaroni@gmail.com', '01558986310', 'M.S. in Statistics', 'University of Dhaka', 'N/A', 'N/A', NULL, '0', '$2y$10$kS9Ho113KospL/e0oBKhTO8Qxm4dDt02NOkBmTAsUeWyjLO.Xt0Yi', NULL, '2017-12-27 15:42:50', '2017-12-27 15:49:02'),
(12, NULL, 'Jowad', 'Jossain', NULL, 'Md-Jowad-Hossain pic.docx', 'Jowad Hossain', 'jowadhossain378@gmail.com', '01681456699', NULL, NULL, 'Banglalion', 'Sales Executive', NULL, NULL, '$2y$10$isep0MD348WxRvIO1EWtEetD8hRLimCGGLWIIvMMONBsU6XjrVaFi', NULL, '2017-12-27 15:43:38', '2017-12-27 15:47:14'),
(13, NULL, 'Mohammed', 'Alamgir', 'alam.jpg', 'ALAM CV.doc', 'alamgirsiddique', 'alamgirsiddique@yahoo.com', '01813630438', 'B.Sc.Engineering in Electrical & electronics Engineering', 'University of Science & Technology Chittagong', 'Trade Solution Bangladesh', 'Supply Chain Executive', '1.5 Years', '1', '$2y$10$QtgkhfSUWIhx2T7utDCCVeWIVdsKaESORJ5VsYtqE7H0z7Cf45FxW', NULL, '2017-12-27 15:43:53', '2017-12-27 15:48:52'),
(14, NULL, 'Mizanur', 'Rahman', 'Mizan Vai.JPG', 'Mizan_MBA (Finance and Banking)_MBS (Accounting)_BBS Honours (Accounting).pdf', 'Mizan', 'mizanbutterfly@gmail.com', '+8801839553690', 'MBA and MBS', 'International Islamic University Chittagong and National University.', 'S.I Electronics (A dealer of Butterfly Sewing Machine Co.)', 'Branch Manager', NULL, '2', '$2y$10$vZCeJzbNwXm9wvhcfQr8p.hazlS0z1g1MsJtGVgYoSvpzlAM.lCBO', NULL, '2017-12-27 15:44:15', '2018-01-02 12:02:52'),
(15, NULL, 'masud', 'rana', NULL, 'Resume of Masud CV.doc', 'masudrana03', 'masudpacific@gmail.com', '01745922031', NULL, NULL, 'Pacific Associates Ltd.', 'Execuitve, Accounts', NULL, NULL, '$2y$10$yDSUebx4jK.AZUyp2cGh/ulvomHAIKZuUYvLFeUNGomnFZX.sYnS.', NULL, '2017-12-27 15:52:21', '2017-12-27 15:53:45'),
(16, NULL, 'Ripon', 'Saha', NULL, 'Repon saha 01670-548776.doc', 'riponsaha', 'reponsaha776@gmail.com', '01670-548776', NULL, NULL, 'Epyllion Style Ltd', 'Executive', NULL, NULL, '$2y$10$R01LK9HcG2xHAW2oZ7lyCe24aYnEpKsjJWTxvXtKg.hLeVgn5hXmS', NULL, '2017-12-27 15:54:39', '2017-12-27 15:56:22'),
(17, NULL, 'Md. Showkat', 'Akbar', NULL, 'Resume of Md. Showkat Akbar.pdf', 'showkat', 'showkatakbar2013@yahoo.com', '01911303466', NULL, NULL, 'ILCB', 'Executive- Investor Wing', NULL, NULL, '$2y$10$0pWzjbrgs2DI89oG0nugU.UgsUhvcozc5vT5Ivf1vMzmuKfAFW9O2', NULL, '2017-12-27 16:03:25', '2017-12-27 16:04:41'),
(18, NULL, 'Asadullah Muhammad Hossain Saad', 'Shihab', NULL, 'CV of Shad shihab.docx', 'shadshihab', 'Shadshihab200@gmail.com', '01773398522', NULL, NULL, 'EA Group', 'Assit. Engineer', NULL, NULL, '$2y$10$MOJo3Bj1jwLSyJQtqL8.C.JZY0jl0mhmAPOvBRO.n53RsRoZzkb7y', NULL, '2017-12-27 16:13:04', '2017-12-27 16:13:56'),
(19, NULL, 'Md Anamul', 'Haque', NULL, 'CV_ Md Anamul Haque.docx', 'anamulb2@gmail.com', 'anamulb2@gmail.com', '01746708002', NULL, NULL, 'Brightway Computer', 'Chief Executive', NULL, NULL, '$2y$10$/O8k5v4edW4SjzVryx8udenG67wdyG6dbfU/NGNuS/yAqszE8.acC', NULL, '2017-12-27 16:14:52', '2017-12-27 16:17:44'),
(20, NULL, 'Md. Istaharul', 'Alam', NULL, 'Md. Istaharul Alam-marketing (1).rtf', 'sincity', 'ista.allam@gmail.com', '01635597107', NULL, NULL, 'Handymama.co', 'Executive', NULL, NULL, '$2y$10$oRNcR2TDRqjPgJ5B2MlhJeWUsgsHkLemAtrxRXLvg.QMEsiOnlQQO', NULL, '2017-12-27 16:23:37', '2017-12-27 16:24:53'),
(21, NULL, 'Md. Faisal', 'Samad', 'c no=28059 faisal .jpg', 'CV of Faisal with photo.pdf', 'fsamad', 'fysalsamad@yahoo.com', '01912222900', 'MBA in Accounting and Information Systems', 'Jagannath University', 'Navana Printing Works', 'Senior Executive, Accounts and Admin', NULL, '2', '$2y$10$DuytmC72UirYy3p8Ptj5DOZkLjzeqJJXPkWByujLQtQ/lRGXKWchW', NULL, '2017-12-27 16:49:28', '2017-12-27 16:58:49'),
(22, NULL, 'Md Asif', 'Hassan', NULL, 'Asif CV pdf..pdf', 'asif714', 'asif.hassan7148@gmail.com', '01710708348', NULL, NULL, 'Delta Brac Housing Finance Corporation ltd.', 'Product Marketing Officer', NULL, NULL, '$2y$10$QV2qqRJIb2eJ81ELuyxTq.HXrRcQuLkBFyQLw9/Zn3C8Z8ltcAUmK', NULL, '2017-12-27 16:49:38', '2017-12-27 16:55:16'),
(23, NULL, 'Fahad', 'Hemu', '13043624_10207433585831267_5600640205796054819_n.jpg', 'Fahad Hemu-cv.pdf', 'fahadhemu02', 'fahadhemu02@gmail.com', '01753562231', 'BBA in Accounting & Finance', 'American International University-Bangladesh', 'None', 'None', '4 months of experience as an Business Development Executive', '1', '$2y$10$YVF2/eAYPwQ3/pxP3nANzuHBKPABNEQ4fvMmXbK96ORDbun3lm7im', NULL, '2017-12-27 17:06:41', '2017-12-27 17:19:44'),
(24, NULL, 'Abdul', 'Awal', NULL, 'cv awal updet.pdf', 'awal4960', 'awal.fgc@gmail.com', '01823774960', 'MBA in Finanace', 'Jagannath University', 'COAST Trust', 'Branch Accountant', 'Accounting Activities', '1', '$2y$10$lvg/Vm3i184gnthOd6lnEe2UcYmrPfWc3HFCMJFHSDt/S.RS7yfwy', NULL, '2017-12-27 17:30:21', '2018-02-06 11:23:08'),
(178, NULL, 'Md. Farhad', 'Hossain', NULL, 'FARHAD  CV .pdf', 'Farhadais', 'farhadais16ru@gmail.com', '01720116544', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$1H8zrClCnq6XEXlWSTTq6et70bB9uxRR0cNPtwQtbXloC35tVWIwK', NULL, '2018-02-06 11:27:56', '2018-02-06 11:28:40'),
(25, NULL, 'Towqeer', 'Ahmed', NULL, 'Towqeer Ahmed.pdf', 'Towqeer', 'ahmedtowqeer@yahoo.com', '01837709137', NULL, NULL, 'Asiatic Laboratories Ltd.', 'HR Executive', NULL, NULL, '$2y$10$SoYzUuFAJzpMaCQhMGeFZe3aPItUQ/qW17Qf7r189fsiEQSIHgGsm', NULL, '2017-12-27 17:31:17', '2017-12-27 17:32:03'),
(26, NULL, 'M. Tanveer Hussain', 'Khan', NULL, 'CV, M. Tanveer Hussain Khan.pdf', 'tanveer.khan', 'tanveer.aneek@gmail.com', '01717167656', NULL, NULL, 'Telenor Health', 'Senior Executive', NULL, NULL, '$2y$10$gLrmjcCZXinbzzwmNeKkXOGBfzr7O5nJX4o79BW.Ukhfkgnt4cdx2', NULL, '2017-12-27 17:49:56', '2017-12-27 17:51:33'),
(27, NULL, 'taufiqul', 'Alam', '8.jpg', 'Resume of Taufiqul Alam.doc.docx', 'taufiqul92', 'taufiqul92@gmail.com', '01671058410', 'BBA', 'East Wast University', 'Uber', 'Operational assiocate', NULL, '1', '$2y$10$zSUOAgQ88jReKFsb/FHa2uID8BX3aYQMyZrjic2wWxUbm2a7OhYba', 'CcqGwtTDtEJVb6YY8tUqtyvap9JNAYkJITIRmEtZiyddmGYCDUSFAy5oJ8vX', '2017-12-27 17:57:31', '2017-12-27 18:02:35'),
(28, NULL, 'Md.Nafiur', 'Rahman', 'Nafiur Picture.jpg', 'Nafiur Rahman New.docx', 'rana8226', 'rana8226@gmail.com', '01791818080', 'MBA in Accounting', 'National University( Kazi Azim Uddin College, Gazipur0', 'Grameenphone Ltd', 'Customer Manager ( Grameenphone Center)', 'Reatailer & Sales Service', '4', '$2y$10$4tUWK7BKM70WNB4yNmPfTOuadn2lvF7mB8tcl2P2RmqsIOsBixEja', 'bpxyaojdINbQJnfkghAH2eOozBTXNjlfIJAmuBRiK8iMhOTcWxdf5deqTWbz', '2017-12-27 17:59:22', '2017-12-27 18:14:19'),
(29, NULL, 'Rafayat', 'Rahman', 'rafat66.jpg', 'Resume of Rafayat Rahman.pdf', 'RafayatRahman', 'rafayatrahaman@ymail.com', '01911019430', 'Bachelor Of Business Administration (BBA', 'American International University-Bangladesh (AIUB)', 'N. A', 'N.A', NULL, NULL, '$2y$10$qbQoytSyHgF7dO72fRf4C.scshbuozbUT6pPt2gwvz65qnszIJ/.C', NULL, '2017-12-27 18:09:06', '2017-12-27 19:44:05'),
(30, NULL, 'Muhammad', 'Ahmed', NULL, NULL, 'mahmed941', 'muhammad.ahmed941@gmail.com', '+92-3072381989', NULL, NULL, 'PARKER RANDALL AJS', 'ACCOUNTANT AND AUDITOR', NULL, NULL, '$2y$10$MFHxAmVnPYuyaMTZSUsTRew2gF.OpkmRpdshw7JPaEj/8MAOWHEMa', NULL, '2017-12-27 18:41:40', '2017-12-27 18:41:40'),
(31, NULL, 'MD. SHAKHAWAT', 'HOSSAIN', NULL, 'Shakhawat CV .pdf', 'shakil2389', 'mail_shakil@ymail.com', '01674083199', NULL, NULL, 'ACI Limited', 'Cash Officer', NULL, NULL, '$2y$10$FrKUxad1r6Fxr9G7EIseuOzqWnqdBYPyDCwEcPwdBv0pTqh8I5lDm', NULL, '2017-12-27 19:38:48', '2017-12-27 19:40:22'),
(32, NULL, 'Moinul Hossain', 'Chowdhury', 'Moinul Hossain Chowdhury.jpg', 'Moinul Hossain Chowdhury.pdf', 'moinulchy', 'moinulchowdhury@hotmail.com', '01675754356', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$/JvGR4kkTowLr95kns8zBOjVxRcQEixXpkD4lzs9ln705J1peMgM.', NULL, '2017-12-27 20:30:32', '2017-12-27 20:36:33'),
(33, NULL, 'Shawon', 'Rahman', NULL, 'Shawon-Rahman CV.doc', 'Shawonrahman', 'shawonrahman566@gmail.com', '+01681915007', NULL, NULL, 'Rizikh.com', 'Manager', NULL, NULL, '$2y$10$rGYc9pkj4P21JhMGFo4rxehkBJub54K09hDPlL08iJFMM.iYcX7Qq', NULL, '2017-12-27 20:40:20', '2017-12-27 20:41:09'),
(34, NULL, 'km.', 'Nahiduzzaman', NULL, 'NAHID CV.pdf', 'km.nahid58@gmail.com', 'km.nahid58@gmail.com', '01748160526', NULL, NULL, 'Northern Universirty Bangladesh', 'Student', NULL, NULL, '$2y$10$An64ep7gtKXAn/h4Adz7wuLmaEw0Eh.IzFTDy7sA7GMjV1/grw7rK', NULL, '2017-12-27 20:51:47', '2017-12-27 21:00:42'),
(35, NULL, 'Md.', 'Atikuzzaman', NULL, 'CV of Md. Atikuzzaman.pdf', 'atikuzzaman', 'atiikuzzaman@gmail.com', '01712792503', NULL, NULL, 'Ahsan Manzur & Co.', 'Assistant Manager (Audit & Assurance)', NULL, NULL, '$2y$10$PitBBgeSYaqYiw7o4Edpke0.isBDYB.YdW0N.ikOBLC0HodxRX36e', 'EEI8o3eKpnTUUxt8mseZzC5rxB9QuDFD8rf8VddrgIhaDIBCN2Ggi0TPxyfy', '2017-12-27 21:03:51', '2017-12-27 21:05:27'),
(36, NULL, 'Md Shamim', 'Rahman', NULL, 'CV__Md Shamim Rahman.pdf', 'MDSR', 'mdsr4592@gmail.com', '01685217242', NULL, NULL, 'Abdul Monem Ltd', 'Executive, Business Development', NULL, NULL, '$2y$10$h50Ze1haFDdEwsgFLtaD4u8c9N5j308WTf8mvUrwH9RSYeVWMYnyO', NULL, '2017-12-27 21:09:40', '2017-12-27 21:10:57'),
(37, NULL, 'Ovidh', 'Khan', NULL, 'CV_Ovidh Khan.pdf', 'ovidh', 'ovidhk9@gmail.com', '01911666342', NULL, NULL, 'Radio Today 89.6FM', 'Audio Editor', NULL, NULL, '$2y$10$SH3fx.U3MCnxgsTJVPxcd.e4WRP7fPmyUM3M68.XKzV5FEbk/KGSq', NULL, '2017-12-27 21:36:18', '2017-12-27 21:37:21'),
(38, NULL, 'Riadus Saleheen', 'Xihan', NULL, 'RIADUS SALEHEEN cv.pdf', 'xihanrs', 'xihanmail@gmail.com', '01914903983', NULL, NULL, 'Student', 'Student', NULL, NULL, '$2y$10$mPn51YEV5YQU9T/PfnLwIOP7jNC3V408ZY/vyFSI7//ufY2GbjO6O', NULL, '2017-12-27 22:11:21', '2017-12-27 22:12:12'),
(39, NULL, 'Md. Faisal', 'Rabbi', NULL, 'cv-of-Faisal1.docx', 'faisalrabbi', 'f.rabbi2193@gmail.com', '01717817330', 'Bachelor in Business Administration', 'American International University- Bangladesh', 'Bagdoom.com', 'Junior Executive', NULL, '1', '$2y$10$RTVZJQ9Av1mzxjsKxR7cc.pi9.K/W6tDJ5JkE2QDiM5dYq8Jtp27O', NULL, '2017-12-27 22:13:54', '2017-12-27 22:17:46'),
(40, NULL, 'Iftekhar Shahid', 'Chowdhury', NULL, 'RESUME UPDATED (DHA)IFTEKHAR SHAHID  17.doc', 'Iftekhar', 'shahid.iftekhar@yahoo.com', '01742627459', NULL, NULL, 'Kay Kraft', 'Distribution Executive', NULL, NULL, '$2y$10$A1tiRYwZoOAeYa7qdNP4I.ZRF2uEGRkSQW4ZhycswcwQ6X9VRMdyy', NULL, '2017-12-27 22:18:28', '2017-12-27 22:20:13'),
(41, NULL, 'Amit Kumar', 'Basak', 'Amit pic.jpg', 'Amit Kumar Basak (CV).doc', 'amitbasak', 'amit.basak001@gmail.com', '01723884531', 'M.B.A Human Resource Management (HRM)', 'Eastern University', 'Tanvir Consumer Food (Pvt.) Ltd.', 'Accounts Officer', '•	Monthly prepare Head Office and Field level salary sheet.\r\n•	Prepare Invoice bill, VAT Challan and Musuk etc.\r\n•	Prepare and daily maintain all party ledgers.\r\n•	Daily maintain company product stock through ledger. \r\n•	Daily prepare company all expenses voucher and daily input in company ledger.', '1', '$2y$10$R4ibyieIuPj8w.GxAyyeHe28lYlp4/OBHCYznC.r/Y6ZFcdnc161W', NULL, '2017-12-27 22:27:09', '2017-12-27 22:35:57'),
(42, NULL, 'Ahsan', 'Wahab', NULL, NULL, 'modina', 'ahsanulwahab93@gmail.com', '01857823861', NULL, NULL, 'Regent Holdings Development Ltd. (Ahsan Group)', 'Executive', NULL, NULL, '$2y$10$Ehf0akwRP4pK5inTKWi78ejHkIbXLEYM9ThbHrSWhWAS96pB1arwe', NULL, '2017-12-27 23:00:44', '2017-12-27 23:00:44'),
(43, NULL, 'Abdullah Al', 'Navid', '25360736_1834450653263511_1172640327_n.jpg', 'Resume_Navid.pdf', 'Navid7', 'abdnavid7@gmail.com', '01753496202', 'BSc in Electrical and Electronics Engineering', 'American International University-Bangladesh', 'Taskeater', 'Analyst', NULL, '1', '$2y$10$AlI7BWKYCaKkAyUmuZzQi.ts8v68JWTvym16SoMNr86dD8iLrfUZm', 'pipcdBsdf490ZZc0uUBbgntmBK9HKTLfRWL3cEKBiEWvkQZuMWc3rAjyk6TR', '2017-12-27 23:12:48', '2017-12-27 23:34:29'),
(44, NULL, 'Md. Shafiqur Rahman', 'Khan', NULL, 'MD. Shafiqur Rahman Khan.pdf', 'srk', 'ridoy1993@gmail.com', '01758855359', NULL, NULL, 'Metro Group', 'Position: Product Development Officer', NULL, NULL, '$2y$10$WvwQjdXuGuoeKiwIHGVyMeWArmcJlE0Rnjpb1kfe3wpL3C9.fdg3q', NULL, '2017-12-27 23:28:20', '2017-12-27 23:29:52'),
(45, NULL, 'Rakib', 'Zoha', NULL, 'CV Rakib Zoha2.pdf', 'Zoha', 'rakib.zoha@gmail.com', '1625003193', NULL, NULL, 'WhiteSpot Digital', 'Account Manager', NULL, NULL, '$2y$10$27zCh.MBmJycBGacmVs/ZuuNu8ct5wnJfvdqCQmSigKam8px5FEOq', NULL, '2017-12-27 23:35:26', '2017-12-27 23:36:53'),
(46, NULL, 'Omar', 'Mahee', NULL, 'CV_Omar Bin Reza.pdf', 'Omar_Mahee', 'omar.reza132@gmail.com', '+8801853586903', NULL, NULL, 'ACI Limited', 'Intern', NULL, NULL, '$2y$10$bLdlojDrO5YDixC.iYApW.3OlhJcZP7xo8BEVxJRq7qmksfLhXs1S', NULL, '2017-12-27 23:52:31', '2017-12-27 23:55:08'),
(47, NULL, 'sk', 'azom', NULL, 'My cv-21.docx', 'sk.azm777', 'sk.azom777@gmail.com', '1723826437', NULL, NULL, 'nevigator BD', 'accountant', NULL, NULL, '$2y$10$SvpVPKX5uoW0kFQnUEItweBo1k3uBSl6G77.d25JwPeKNVjInF4Oy', NULL, '2017-12-28 00:38:10', '2017-12-28 00:38:49'),
(48, NULL, 'Imran', 'Hossain', 'CV PC.JPG', 'Md._Imran_Hossain_CV.pdf', 'Shopon', 'imran3465@diu.edu.bd', '01677877108', 'BBA in Accounting', 'Daffodil International University', 'no', 'no', 'I have no job experience but I have many marketing event experience under many companies', NULL, '$2y$10$GPT6jKyzhANvNpK8UGAH7.jeya7i7aTziVKOwXvIf5TagamS9Vmhq', 'zmeS32Q4HA5aUcw7MdE3r2tFElZUTaJsgVpMsEO7I2oVdcHezWROetjzENZM', '2017-12-28 03:38:00', '2017-12-28 03:41:42'),
(49, NULL, 'abir', 'hossain', NULL, 'resume with cover.docx', 'a bir', 'im_abir@outlook.com', '01535773072', NULL, NULL, 'n/a', 'n/a', NULL, NULL, '$2y$10$EJZ5HEpP3hjzdCzShvWl.O2fKzBRMZ9W8rZKlHFITzfyBYQ8V3xXq', NULL, '2017-12-28 06:15:24', '2017-12-28 07:26:01'),
(50, NULL, 'Md. Nahid', 'Hasan', NULL, 'Md.Nahid Hasan.pdf', 'nhasan67', 'nahid89.se@gmail.com', '01752024851', NULL, NULL, 'ServicEngine BPO', 'Executive', NULL, NULL, '$2y$10$UpQbyhF5rYFLYi0mPr19m.XlLnfGUrL4ElAJEpN8MM8eNcYk.zche', NULL, '2017-12-28 06:41:13', '2017-12-28 06:41:44'),
(51, NULL, 'Jahidur Rahman', 'Jubayer', 'Jubayer Islam.jpg', 'Jahidur Rahman Resume.pdf', 'Jahidur Rahman Jubayer', 'jubayerislam816@gmail.com', '+88 01684251594', 'Bachelor of Business Administration (BBA)', 'Daffodil International University', 'Kiva Han', 'Executive Accounts', '6 months running', '1', '$2y$10$o2CJgnjQpOCqDB1c.XnG0ufPu8WpkqOHPYysi.3L.awLi118P3Kpa', 'nhWcIDN0qv8M8mNMR7tUR5jxCAXODWdEukWs11uh9EkpSEKUcX55PMVh59jG', '2017-12-28 08:53:59', '2017-12-28 13:35:55'),
(52, NULL, 'Mahbubur', 'Rashid', NULL, 'New Update Resume.docx', 'Mahbubur', 'mmahbub559@yahoo.com', '01760390829', NULL, NULL, 'Progga', 'Networking Officer', NULL, NULL, '$2y$10$bQLTl5eugPJ4/XSC35q.jOEilV.mL7k/XknE0o3Lz9DgEYoboIaoi', 'nilstqCpH7jP5wbzHV9VcW3XXatdHwNbc2mPHjRoSDtzUusYFlUv7A8rXt8k', '2017-12-28 09:09:39', '2017-12-28 09:10:44'),
(53, NULL, 'Rizvy', 'Ahmed', 'rizvy.jpg', 'RIZVY AHMED CV.pdf', 'Rizvy Ahmed', 'rizvy016@gmail.com', '01772564636', 'BBA in Finance', 'Independent university, Bangladesh', 'Padma flour mills', 'Executive Accounts Officer', NULL, '2', '$2y$10$bRlcrcf5Qe53d5yBsQN3UOJ8fHKPcZ8soarqL9dyGwG0QgkytUvj6', NULL, '2017-12-28 10:13:32', '2017-12-28 10:19:31'),
(54, NULL, 'Liton', 'Chowdhury', NULL, NULL, 'liton', 'litonchowdhuryit@gmail.com', '01766691118', NULL, NULL, 'MG', 'Executive', NULL, NULL, '$2y$10$EGexNxGKyU.HeiAp9SkTD.sn1FZgxDY2ViHnGZmEXIMk5yboJY2Za', 'QNypUcFEm9Bu4fehkpFUGYR1F78XbLaUev8SjYX7L82B9Jj3r2DoakHGJmVZ', '2017-12-28 10:18:01', '2017-12-28 10:18:01'),
(55, NULL, 'Rasiduzzaman', 'Masum', '23619011_365309153929975_304874419_n.jpg', 'Resume of Masum_BBA_AIUB (1).pdf', 'masumzaman', 'masumzaman07@gmail.com', '01682716611', 'Master of Business Administration (MBA)', 'Independent University, Bangladesh (IUB)', 'N/A', 'N/A', 'Intern at “Janata Bank Limited” Gulshan-1, Corporate Branch (3 Months )', '0', '$2y$10$Aev4x2mLvEbrhTPWKQPyUugnuSQzPkl7r8QKXXBIPGG1kNc7Vz6Lq', 'nktpCSVIN3svN4R67QUCdTojv0FYPX8sf0N1wNE8gkxgogkDtS2n8Suy5Qbe', '2017-12-28 10:30:54', '2017-12-28 10:55:30'),
(56, NULL, 'Md. Tofayel', 'Ahmed', 'media.jpg', 'Md. Tofayel Ahmed.doc', 'Tofayel_93', 'tofayel.somel@gmail.com', '01707566544', 'BBA', 'University of Liberal Arts Bangladesh', 'LankaBangla Finance Limited', 'Business Support Officer', '1 year', '1', '$2y$10$nVbzA6EICUQUdk76LDTS.erSZRj7yULkIxj84ISRQkbY6KLw7aiLe', 'W8tpQibV4lPJwzKiiPxzSNTSzwSgaWWB3OCXaC4zsf6vxukScdFsHi2fxa1I', '2017-12-28 11:29:46', '2018-02-05 08:05:17'),
(57, NULL, 'NAFISA NAZNEEN', 'HAQUE', NULL, 'Resume of Nafisa Nazneen.docx', 'nafis177', 'nafseen17@gmail.com', '01750932697', NULL, NULL, 'Thyrocare Bangladesh Limited', 'Executive Operation', NULL, NULL, '$2y$10$pCRdsxsWEh44JBd5vYWKNurMvnZPeK78uoHBBuJKmmlk3ow1ZamPq', 'LCSKsMQnB8bxPTym3MbkysALHD75Jsr8pdodegKQ1ftLokw4pjRnPxnWGmxV', '2017-12-28 11:30:05', '2017-12-28 11:45:43'),
(58, NULL, 'Tamur', 'Islam', NULL, 'Tamur Islam CV.pdf', 'Tamur Islam', 'tamur0481@gmail.com', '01681744392', NULL, NULL, 'Beatnik', 'Executive, BTL & Event Activation', NULL, NULL, '$2y$10$/17n5aKZbXFrLLtwFDnf1eoAeGTpLqJwZb1CfGfxNLZaATj/lpr8q', 'wZ2KxpUWoQKsRA96Uv4WcnhsQFszOiO9vhUbbgCegpNZOucYGWaqgZpsRR4t', '2017-12-28 12:02:03', '2017-12-28 12:06:56'),
(59, NULL, 'Sumaita', 'Khan', NULL, 'Sumaita Khan\'s CV.pdf', 'Sumaita Khan', 'khansumaita35@yahoo.com', '01685853235', NULL, NULL, 'Pathao', 'Jr. Executive, Finance & Accounts', NULL, NULL, '$2y$10$b0aUYatxClv/Jbu2tfUSwOAOrk8AuPEHXbC9/yTXTmumRiNWlkIia', NULL, '2017-12-28 12:33:28', '2017-12-28 12:34:06'),
(60, NULL, 'Afsar Alam', 'Rabby', NULL, 'AFSAR ALAM RABBY.pdf', 'afsarrabby', 'afsar.12205191@gmail.com', '+8801680060147', NULL, NULL, 'Silicon Valley Nest', 'Business Development Manager', NULL, NULL, '$2y$10$NPkDgKqNYgYJ0gXHEXY4pOGMpyl2rZplz.f2Rll0C.K935GGincBy', NULL, '2017-12-28 12:36:37', '2017-12-28 12:37:41'),
(61, NULL, 'Md. Mostafizur', 'Rahman', NULL, 'Resume of Md  Mostafizur Rahman (HR).docx', 'mostafizz', 'mostafizz0110@gmail.com', '+8801711090649', NULL, NULL, 'Grameenphone Ltd.', 'Senior Trainee', NULL, NULL, '$2y$10$.DZQoMtxxSwcv4Iz6GFmquSb.xsghxICqrJmVgHB9Ev9oaVKkCtCa', NULL, '2017-12-28 12:52:13', '2017-12-28 12:53:17'),
(62, NULL, 'Nahid', 'Hasan', NULL, 'nahid Hasan.doc', 'Nahid05580889', 'nahid.nt123@gmail.com', '01681034343', NULL, NULL, 'Bangladesh Eye Hospital LTd', 'Accounts Officer', NULL, NULL, '$2y$10$pO.W3T5slB2cJlif563VwObrEJnHU7tnDGojw5Ula2VHOEofHv/CW', NULL, '2017-12-28 13:30:52', '2017-12-28 13:36:41'),
(63, NULL, 'Md. Tariqul', 'Islam', 'Md. Tariqul Islam.jpg', 'Md. Tariqul Islam.doc', 'Tariqultareq', 'tariqulislamhstu@gmail.com', '01723605232', 'M.B.A. ( AIS)', 'Hajee Mohammad Danesh Science & Technology University, Dinajpur', 'OPPO Bangladesh Communication Equipment Co. Ltd.', 'Executive : Accounts', NULL, '1', '$2y$10$QTk55J6VUXlzPNDocEiaKe2d6rxsrBcB8f2W3YFGs5NDJ6fAHQWFW', NULL, '2017-12-28 14:21:46', '2017-12-28 14:37:06'),
(64, NULL, 'Omor', 'Faruk', NULL, 'OMOR CV Latest.docx', 'omorfaruk', 'omorjnumba@gmail.com', '01721429463', 'MBA', 'JAGANNATH UNIVERSITY', 'NABANNA GROUP', 'SENIOR EXECUTIVE', 'I AM FIVE YEARS EXPERIENCED IN MARKETING AND COMMERCIAL DIVISION', '5', '$2y$10$no.PkPHNsmsu8mObIPrnMe5HRHA3ZIclsCOWDjVgAJGuFGs0w.eQC', NULL, '2017-12-28 15:10:11', '2017-12-28 15:17:12'),
(65, NULL, 'SAIFUL', 'ISLAM', NULL, '01.saiful islam cv 1.docx', 'saifuldupa94@gmail.com', 'saifuldupa94@gmail.com', '01917787291', NULL, NULL, 'No', 'No', NULL, NULL, '$2y$10$W602Xum/mX57CWVYBxM4j.DbWHUSMIAhK7nS5wm0J9/QXQT7jfG3W', NULL, '2017-12-28 15:17:46', '2017-12-28 15:19:08'),
(66, NULL, 'Shajedul', 'Amil', NULL, 'Amil CV (1).pdf', 'shajedul', 'shajedulhaqueamil@gmail.com', '01878117475', NULL, NULL, 'Tripooly Travel Agency', 'Executive', NULL, NULL, '$2y$10$qzZI7S6Jm7e72jjSeHHt7.otL8i24oxlQwpSMJuyZoGaL9Mw8Es.6', NULL, '2017-12-28 16:36:55', '2017-12-28 16:37:40'),
(67, NULL, 'Tanzina', 'Habib Khan', NULL, 'RESUME of Tanzina Habib Khan.pdf', 'Tanzinahabib', 'tanzinahabib@gmail.com', '01684860806', NULL, NULL, 'Bikroy.com', 'Corporate Sales Officer', NULL, NULL, '$2y$10$0mQ3VtNMPAVG94sS2t3RlOoh7HBHEH4du29z0zizaLAv7AKzHW6ra', NULL, '2017-12-28 19:34:12', '2017-12-28 19:35:03'),
(68, NULL, 'Khondaker Imtiaz', 'Hasan', NULL, NULL, 'imtiaz', 'imti.hasan1@gmail.com', '01912354260', NULL, NULL, 'Sheba.xyz', 'Trainee', NULL, NULL, '$2y$10$XeC8XFFQFWChvj938hM4dOQrDIZFzWRIgf0JenfUEpFFiLVNSICqi', 'L13uuWPyxPezP0oV63OQcQB1AlRE2ocRp2EGI5A4oL00xt3XFO2mbQyhOhKU', '2017-12-28 19:57:22', '2017-12-28 19:57:22'),
(69, NULL, 'Mithul', 'Chowdhury', 'PIC.jpg', 'RESUME OF MITHUL.pdf', 'mithulchy@gmail.com', 'mithulchy@gmail.com', '01818586536', 'MBA in HRM', 'University Of Information Technology and Sciences', 'Oman Air', 'Customer Service Supervisor', 'Customer-focused professional with over 08 years’ experience in facilitating airline ground operations at regional and international airports. Accomplished in enhancing airline operations through process improvement, internal audits, and staff development. History of success in de-escalating customer issues, enhancing customer experiences and satisfaction, and uniting teams to deliver exceptional service. Looking to take next career step in customer service and leadership with a well known company committed to elevating customer experiences.', '8', '$2y$10$ZWWF8MXa0jsjv5NFCI0F1OpqPMh78XZLOHi8xqxjChZLxAOBJ35Nq', '8IqnfNafvSVswusQLxNeVPJqrOZTaptZvuUYfxy4Mdi1Od687kEbm59qJo9z', '2017-12-28 21:01:13', '2017-12-28 21:08:48'),
(70, NULL, 'Mubtasim Bin', 'Zaman', NULL, 'CV of Mubtasim Bin Zaman.pdf', 'choton', 'mubtasimzaman@yahoo.com', '01778686613', NULL, NULL, 'No', 'No', NULL, NULL, '$2y$10$B/UQkkV1J4WHKnTggfdApOmE6PgZl8gU3Xaz9u7R0FUFCa5rsqSi6', NULL, '2017-12-28 23:34:57', '2017-12-29 00:31:12'),
(71, NULL, 'Nurnahar', 'Mousumi', 'ma-075060_opt (1).jpg', 'Curriculum Vitae Nurnahar Mousumi.doc', 'Nurnaharmousumi10', 'nurnaharmousumi10@gmail.com', '01763088924', 'Bachelor of Business Administration (BBA)', 'Atish Dipankar University of Science and  Technology', 'Grameenphone Limited', 'Customer Service Manager', '	Manage large amounts of inbound and outbound calls in a timely manner.\r\n	Identify customers’ needs, clarify information, research every issue and provide solutions and/or alternatives.\r\n	Follow communication  when handling different topics.\r\n	Meet personal/team qualitative and quantitative targets.\r\n	Participate special assignment by Manager.', '3', '$2y$10$.epNuZyWkq.yLg6l28By4O99rmG7ua.I5e.IW932raj8FgtZUw9ke', 'audxaHJ0wbmECXDaSPh6umBpDTGiHqcSswswA2oUlWZfkCcVK9gIsm9AI4QG', '2017-12-28 23:51:20', '2017-12-28 23:59:11'),
(72, NULL, 'redwanul', 'islam', NULL, 'redwan CV with pic.docx', 'redwan shihab', 'redwanul094@gmail.com', '01737989655', NULL, NULL, 'Matador Ball Industry', 'Customer Care Executive', NULL, NULL, '$2y$10$SZQMEMxaAX47YRUjWtS6b.F8BdQykzJmIfqFW5T2kiuZcO1Nwa.DC', NULL, '2017-12-29 00:39:21', '2017-12-29 00:41:21'),
(73, NULL, 'Mohammad', 'Abu Yasin', NULL, 'Abu_Yasin_CV.doc', 'yasin', 'yasinbubt25th@gmail.com', '01670493695', 'BBA', 'Bangladesh University of Business and Technology', 'I-Station ltd', 'Executive -Business Development', '1 year of ICT Division field around 15 district for LEDP fair and also Different kind of Event/fair,as a coordinator', '1', '$2y$10$ecFY7SR9XRHkK9aWBsUyhuU2rDirxjX0EjGzBlI6mXH4rsgjA8UR.', 'gLjZMqEU3cPTsV4jlcHumW6ONCooEFkUjA3Y60JK0iibxwHzTpAY0OUS8dwD', '2017-12-29 00:51:49', '2017-12-29 01:00:47'),
(74, NULL, 'NARGIS', 'AKTARY', '16711950_106352579888492_1250610906149740747_n.jpg', 'Nargis_Aktary_CV.doc', 'nargis', 'nargisaktary@gmail.com', '01746416584', 'Masters of Social Science (MSS)', 'Rajendra College , Faridpur.', 'IBT', 'Jr. Executive', 'Working  as junir Executive   in the Ibt- Institute of Basic Teaching from 8th Feb 2016.', NULL, '$2y$10$LeJR7oFNSaXSdKf56OLUC.iRQGaS0kj1kl1h9Sd15tHOgu1wX/ZCW', 'WJ0g9uPR39bgaist3ZoJWPhFTDie7cQIK5h2wrtud8QL4KJ5aIk3vKuVFnh6', '2017-12-29 20:08:22', '2017-12-29 20:36:55'),
(75, NULL, 'Md:', 'Joynul Abdin', NULL, NULL, 'Joynul Abdin', 'riaztoomchar1992@gmail.com', '01723947320', 'BBA( Hon\'s)  Management', 'Laxmipur Government College', 'Globe Pharmaceuticals Limited', 'Medical Promotion Officer', NULL, NULL, '$2y$10$xxy0gYs4KSmphhTNpdV41eGbtenFTyoVHj7LtCk16CBIsjMK5wvuO', NULL, '2018-01-01 17:33:49', '2018-01-01 17:47:44'),
(76, NULL, 'Md Jaker', 'Hossain', 'B Bank.jpg', 'Md Jaker Hossain.pdf', 'jakerhossain21', 'jakerhossain21@gmail.com', '01701202120', 'MBS - Accounting', 'Government Titumir College', 'Grow Biz Industries Ltd.(Polycell)', 'Assistant Manager-Accounts & Commercial', '•	Preparing monthly and yearly financial statements.\r\n•	Ensuring the payment procedure such as check the bill & process for approval.\r\n•	Coordinate external and internal auditors.\r\n•	Calculation product wise costing end of the every month. \r\n•	Reconciliation all bank accounts end of the every month. \r\n•	Prepare Salary Sheet & Bank advice at every month. \r\n•	Assisting senior financial management in preparation of annual budget and financial reports.\r\n•	Ensure updates of general ledger & records of all accounts payable, receivable, cash receipts and bank transactions.\r\n•	Ensure that all accounting source documents are accurately preserved and all financial activities are kept in true and fair manner.\r\n•	Ensure compliance to rules and regulations of Income Tax, VAT,Customs & Bond Act etc.\r\n•	Maintaining Bonded warehouse such as UP making and taken approval from UP officer, In Bonding & Ex Bonding.\r\n•	L/C Checking & amendment arrangement, all kind of L/C opening & others L/C related activities.\r\n•	Create Bank loan proposal, handle & manage bank loan.\r\n•	Supervise & monitor the daily activities of departmental staff.\r\n•	I am completing the task which is assigning time to time from Departmental Head.', '6.5', '$2y$10$NbOyjwPfJZEIzmYPs0WSRukV8AcUn0mJg7Hc.OCAqgu2bjmfUcr7O', NULL, '2018-01-02 13:20:21', '2018-01-02 13:47:07'),
(77, NULL, 'Md. Golam', 'Mostofa', NULL, 'CV of Md. Golam Mostofa.pdf', 'mostofabijoy', 'mostofa783@gmail.com', '01521498260', NULL, NULL, 'ServiceEngineBPO', 'Sr. Executive', NULL, NULL, '$2y$10$2ihQBnTocklW6ASROSXbAOjk23smqzJMAunMh9iOFXEcKjyx2ZujW', NULL, '2018-01-02 18:10:40', '2018-01-02 18:11:55'),
(78, NULL, 'Md. Washiul', 'Alam', NULL, 'CV OF MD. WASHIUL ALAM WITH PICTURE AND SIGNETURE..doc', 'washiul55@gmail.com', 'washiul55@gmail.com', '01768608098', NULL, NULL, 'IBRAHIM CARDIAC HOSPITAL AND RESEARCH INSTITUTE', 'CASH ACCOUNTS OFFICER', NULL, NULL, '$2y$10$8ro9DC770KlhVkIeVgTt0uksAEMGZrGdffu71dUQEU8wNTfzlcN/u', NULL, '2018-01-02 21:35:35', '2018-01-02 21:37:06'),
(80, NULL, 'Aktaruzzaman', 'Sumon', 'Sumon Passport.JPG', 'CV-SUMON (1).doc', 'sumon1273@gmail.com', 'sumon1273@gmail.com', '01764949675', 'Bachelor of Business studies (BBS)', 'Bangladesh Open University (BOU)', 'Peoples Oriented Program Implementation (POPI)', 'Support Staff (Project)', 'I have 5 years experience of international development project as a project support staff. I have completed 6 months computer training course with others official database software during this experience time. Finally, my education background is business studies so that i can capable to business related job to this company.', '5', '$2y$10$AzDpj6vYPXp88yridlspmOFgytP/SLsZa02tODASx8hKXR9SVoKb.', 'yA1Nsczutzv06nvfhhMzav57UTOrz8AjmTsDCsFWVvhyy4zmtGtOdno9iXGu', '2018-01-04 09:26:19', '2018-01-04 09:56:14'),
(81, NULL, 'MD.Kamrul', 'Islam', 'kamrul islam.jpg', '+++ (2).pdf', 'kamrul251290', 'kamrul251290@gmail.com', '01722997473', 'Bachelor of Business Studies', 'Chowbari DR. Salam Jahanara Degree Collage', 'Sadia Textile Mills Ltd.', 'Kamrul Islam', '02 years', '02', '$2y$10$m7IAb07Fhjz5f9ryaHGweehZwWUth4aPDmjpX7J5HA/Iw1xAxszom', 'N5D22U8bBakudI3G2slgS0ljC6GOXS5K4INPGtlBxCyhlYwIM4e5SEb7YpE5', '2018-01-14 08:23:35', '2018-02-06 08:35:58'),
(82, NULL, 'Md.', 'Saiful Islam', NULL, NULL, 'saifulislam', 'saifulbmpr@gmail.com', '01717692296', NULL, NULL, 'Madina Group', 'Sr. Executive', NULL, NULL, '$2y$10$m592hqc5Wuejl8zIBvFUJewHRkuQ3rl5NvNS.7MKJB.d17alhEmI6', NULL, '2018-01-23 22:29:37', '2018-01-23 22:29:37'),
(83, NULL, 'Md. Morshed', 'Kabir', 'RIP_2583a.jpg', '1.1 Resume of Md Morshed Kabir.docx', 'mokabir', 'morshed.kabir@gmail.com', '+8801911213227', 'MBA (Finance)', 'City University', 'jobless', 'n/a', '1.	Assistant General Manager (and head of the department) ( December 1, 2014 - June 30, 2017)\r\n2.	Manager - Finance ( January 1, 2013 - October 31, 2014)\r\n3.	Deputy Manager - Finance ( January 1, 2010 - December 31, 2012)\r\n4.	Senior Executive - Finance ( January 1, 2006 - December 31, 2009)\r\n5.	Executive - Finance ( March 24, 2003 - December 31, 2005)\r\n6.	Executive - Administration ( March 2, 2002 - March 23, 2003)\r\n7.	Executive - Dealer Sales ( May 1, 2001 - March 2, 2002)\r\n8.	Senior Sales Officer ( December 1, 1997 - May 1, 2001)', '19', '$2y$10$.eRRFfQFRnocDA77AKOa1e7FPorfQkv7v7XTOtuZElS4Uvb5BdTRW', 'IiZbDWleQQ9GkAtZUJ6dbiFvuOpKdnqkydFk5B2WzoVC3d3j5dUjfQvKRL6T', '2018-01-24 10:53:39', '2018-01-24 10:59:24'),
(84, NULL, 'MD:Maksudur', 'Rahman', NULL, NULL, 'maksudurr351@gmail.com', 'maksudurr351@gmail.com', '01727288286', NULL, NULL, 'Top Polymers', 'Marketing & Admin Officer', NULL, NULL, '$2y$10$PuRLzq1eQ/fTQxcJJhelq.hxzLdogYffaZd5k5C0GSLpkkF5xlCFi', NULL, '2018-01-26 22:52:35', '2018-01-26 22:52:35'),
(85, NULL, 'Md. Hafizur', 'Rahman', NULL, NULL, 'sabujbba', 'sabuj_bba@yahoo.com', '01911506502', NULL, NULL, 'Anontex Group', 'Sr. Executive (HR & Admin)', NULL, NULL, '$2y$10$MMg5wD9ctebTVv7vA6VVt.a2tNwet5LzZEAn48KtnHVvCLWOeyXxy', NULL, '2018-01-27 04:13:58', '2018-01-27 04:13:58'),
(86, NULL, 'Alok', 'Banik', NULL, NULL, 'alokbanik7890', 'alokbanik7890@gmail.com', '01820232838', NULL, NULL, 'A. Ahad Trade International', 'Head of Commercial', NULL, NULL, '$2y$10$CbK9zcl66RCOd4zhZE4VKetV02oPBpiNHv38aHtsi00wCEMtXxo8O', NULL, '2018-02-03 23:19:38', '2018-02-03 23:19:38'),
(87, NULL, 'Susmoy Saha', 'Rocky', 'CD=223P0868 copy.jpg', 'susmoy Saha Rocky.pdf', 'susmoy_rocky', 'rockysaha0167@gmail.com', '01676356018', 'B.B.A Finance', 'Daffodil International University', 'Fresher', 'Fresher', 'Internship', '0', '$2y$10$NOmrlgQEA1IoyJIe9XG7WO6yOURXr3GcCCPDMDhf8dnWtQuuR8Kf6', 'H1EthalQhytoGmOLSfz60LEL4qoe5rCwMrCGBURc44hO7BvepsfPhlC2uMZj', '2018-02-04 04:15:04', '2018-02-05 10:17:44'),
(88, NULL, 'Aroyun', 'Jahan', NULL, 'Resume of Aroyun.docx', 'aroyunjahan', 'aroyunjahan2@gmail.com', '01674160444', NULL, NULL, 'student of MBA', 'Student', NULL, NULL, '$2y$10$bcDdKbcgwSIj4ND/m8S6j.btgHdzIHA0/331lcO3RgJinvZGj9Aki', 'rnExC3dUK8jZF4KnmpitQd7M0CGqmO0GOqUZzXxWrmHoRuJB5JDXEkTXvabb', '2018-02-04 11:04:39', '2018-02-04 11:06:14'),
(89, NULL, 'Mohammad', 'Bin yeamin', NULL, 'Yeamin.pdf', 'Yeamin Molla', 'mbyeamin@gmail.com', '01630799651', NULL, NULL, 'Student', 'Student', NULL, NULL, '$2y$10$.tQNGY70zPwxgGZ7A3R1ZuA48PVeEH6wki7UnZQQyXFn8MUnZll2e', NULL, '2018-02-05 00:17:39', '2018-02-05 00:23:30'),
(90, NULL, 'Istiyak Mahmud', 'Saad', NULL, 'Resume of _ _Istiyak Mahmud Saad.pdf', 'Istiyak Mahmud saad', 'imahmudsaad@gmail.com', '01676117973', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$KWaBM/zpwDl4kclAEB7p7u1aCkzAHyitHq6jb5SUaSaV01K5TG.g.', NULL, '2018-02-05 04:58:06', '2018-02-05 04:58:41'),
(91, NULL, 'Md. Razib', 'Hossain', NULL, 'Md. Razib Hossain, Jagannath University.pdf', 'razibhossain08', 'razibhossain08@gmail.com', '01672332623', NULL, NULL, 'NA', 'NA', NULL, NULL, '$2y$10$/AZmTr64msa8PS1GVzIVAOIeQQQEExP1fOeqsJw/27djlGFclEkiC', NULL, '2018-02-05 04:58:35', '2018-02-05 05:01:56'),
(92, NULL, 'SHAFIUL', 'BARI', NULL, 'shafiul resume -.pdf', 'Shafiul', 'shafiul278@gmail.com', '01913060278', NULL, NULL, 'Eon Group', 'Jr. Accounts Offcier', NULL, NULL, '$2y$10$u7zOL3UOcJ0uJ2LBtfCVseY3/1byQl.uFP0K6et2qhLNNIN9xGHq.', NULL, '2018-02-05 05:09:34', '2018-02-05 09:15:06'),
(93, NULL, 'MD Rashedul', 'islam', 'M-1312782.jpg', 'Rashed-cv.doc', 'rashed1189', 'rashedulislammd90@gmail.com', '01851610370', 'BBA', 'Daffodil international university', 'Jamalpur Somoty', 'Assistant account officer', '6 month', '1', '$2y$10$0yz0vmQ3Z5pv6usb8y/7QeKb23zrP3fL1YGKDQVWY6RV2lrasq.L2', NULL, '2018-02-05 05:11:54', '2018-02-05 05:16:38'),
(94, NULL, 'Md. Abdus', 'Salam', 'rsz_2752420[4].jpg', 'Md_Abdus_Salam_CV.doc', 'salambbs89', 'salambbs89@gmail.com', '1734553971', 'MBS (Accounting)', 'National University', 'Nasir Group of Industries', 'Accounts Officer', '02 Years', '5', '$2y$10$pV5toF2a/cg.TgVCuASxk.gS4GT/hytFZbf4vLC8L6z.TV9PnFWEK', NULL, '2018-02-05 05:15:57', '2018-02-05 05:38:52'),
(95, NULL, 'Muhammad Ibrahim', 'Khalil', NULL, 'CV_of_Ibrahim.pdf', 'Muhammad Ibrahim', 'md.ibrahimcad@gmail.com', '01671704450', NULL, NULL, 'NO', 'NO', NULL, NULL, '$2y$10$Dy1nDxh9i/av3ovJx..jD.oRNgEJc0iVfeICYBLTsk0m6QkEEALIe', NULL, '2018-02-05 05:19:15', '2018-02-05 05:19:52'),
(96, NULL, 'MD Shadat', 'Hossain', NULL, 'MD. Shadat Hossain.rtf', 'roveel', 'roveel0001@gmail.com', '01919687349', NULL, NULL, 'The Destination', 'Executive Officer', NULL, NULL, '$2y$10$WNP2D3RVreq8iShot2vzwOgWdjcG9J8tLaI3RbmDbEtJ1jM6uK88a', NULL, '2018-02-05 05:20:35', '2018-02-05 05:23:29'),
(97, NULL, 'Wakil', 'Ahmed', '05072011245.jpg', 'Wakil cv with photo.pdf', 'wakilahmed12@gmail.com', 'wakilahmed12@gmail.com', '01714647475', 'MBA', 'University of Information Technology & Sciences', 'Sonar Courier Service Ltd.', 'HR & Admin Executive', 'Dear Sir,\r\n\r\nI would like to inform you that I have completed BBA and MBA study Program from University of Information Technology & Sciences major in Human Resource Management. I have experience of total 3 Years more than in Human Resource Management, Administration and different challenging jobs.\r\nI would like to contribute myself in your reputed organization. I am confident and will give the full efforts honestly to perform every single activity very effectively that will be given by your organization.\r\n\r\nIf you think that my profile meets your requirements then feel free to call me or email me on contacts provided in the CV.\r\n\r\nThank you for your kind attention and I am looking forward to your reply.\r\n\r\n \r\nSincerely yours\r\n\r\nName: Wakil Ahmed\r\n\r\nHouse : 67\r\nWest Rampura, Wapda Road \r\nDhaka -1219 \r\nMobile : 01714647475 \r\nEmail : wakilahmed12@gmail.com', '3', '$2y$10$MsF/g0fwV4HAZchX./IynuM0dBY2I8gcOKU/t1ml319YRB5TlM7ie', NULL, '2018-02-05 05:23:58', '2018-02-05 05:30:29'),
(98, NULL, 'Md Shiamul', 'Haque', NULL, 'Shiamul-Haque-CV.pdf', 'Mukul', 'shmukulewu@gmail.com', '01681912767', NULL, NULL, 'Bengal Express', 'Customer Relationship Manager', NULL, NULL, '$2y$10$aT.0j.Ka246kNwzk15GNAuSbZy6p6mK3DrkJV2f5cg34sB6Mhgzk.', NULL, '2018-02-05 05:28:24', '2018-02-05 05:29:15'),
(99, NULL, 'Sanjid', 'Mahmud', NULL, 'Sanjid Mahmud_FIN_BBA_EWU.pdf', 'sanjidswarup@gmail.com', 'sanjidswarup@gmail.com', '01670225532', NULL, NULL, 'East West University', 'Undergraduate Teaching Assistant', NULL, NULL, '$2y$10$yGok8joTJdeiLUMswbJjkeN8i/J/BbGoeCJRb.7bctrsn70ibNEFO', NULL, '2018-02-05 05:34:41', '2018-02-05 05:35:11'),
(100, NULL, 'Forhad', 'Sarker', 'MR9.jpg', 'Forhad pro .pdf', 'Forhad_Sarker', 'farhadsarker201@gmail.com', '01677074891', 'BBA in Finance', 'Independent University, Bangladesh', 'No', 'No', NULL, NULL, '$2y$10$ttq65RZMG6OyvBzsry20le6RkwrSXtO4jlt69GTAe5407coLgY3Gm', NULL, '2018-02-05 05:53:57', '2018-02-05 06:13:30'),
(101, NULL, 'Sefat', 'Arabi', NULL, 'Sefat Arabi.pdf', 'arabi.sefat@gmail.com', 'arabi.sefat@gmail.com', '01737620067', NULL, NULL, 'Signature collection', 'Query Manager', NULL, NULL, '$2y$10$KRp4dNPCo0cegQPVxevfZeV7hapx5xnMLKoDxQSgr/nYk8ff/UJO2', NULL, '2018-02-05 05:55:52', '2018-02-05 05:58:21'),
(102, NULL, 'Md. Rayhan', 'Ali', 'R=62422.jpg', 'Rayhan-Fin & Act -2.95.pdf', 'rayhan07', 'rayhanali524@gmail.com', '+8801764993886', 'BBA  (Act & Fin major)', 'North South University', 'Assurance Air Service', 'Intern', NULL, NULL, '$2y$10$MKggCeSSQCc/fJRADIxHAOSs6BFWxzNLh1rrcevdOtVUhv4./OB66', 'ArmbWMZLXYGO3dCEKd5zh7tSPFvctBIMABDyPbuJ3gxcTOWI8QiHACzfr7OJ', '2018-02-05 06:02:05', '2018-02-05 06:08:18'),
(103, NULL, 'Arafath Rahman', 'Tanjil', NULL, 'Arafath Rahman Tanjil-6.docx', 'arafat_884', 'arafat_884@yahoo.com', '01623405715', NULL, NULL, 'Pathao', 'Call centre Executive', NULL, NULL, '$2y$10$kWFmZaFFthXhS3gfrQb8VeWh6QlIrc4.8M/k47Nwl6AT8jLWl00Ju', NULL, '2018-02-05 06:05:20', '2018-02-05 06:05:56'),
(104, NULL, 'Pranjal', 'Chowdhury', NULL, 'CV.docx', 'Pranjal_Chowdhury', 'pranjalpappu@gmail.com', '+8801725628127', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$57q7ogo20LPwLo3kL8o4wenShU9wb3efHzXvmjaqohNrRH3dppIxK', NULL, '2018-02-05 06:07:21', '2018-02-05 06:08:54'),
(105, NULL, 'Md. Mohiul', 'Islam', NULL, 'Md. Mohiul Islam_RU_Fresher.pdf', 'alokdhrovo', 'memohiul@gmail.com', '01921814150', NULL, NULL, 'None', 'none', NULL, NULL, '$2y$10$IRmebC5FAi/ZUU4kt34w6uTuqfbg.sZr.F/xEF8grj7Eqnu1nkoKq', NULL, '2018-02-05 06:22:59', '2018-02-05 06:23:40'),
(106, NULL, 'Md. Mahfuzul', 'Islam', NULL, 'Md.Mahfuzul Islam December.docx', 'Mahfuzul Islam', 'mahfuzul549@gmail.com', '01840651335', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$3tUdY8IH2/hUIzR2Ito4u.ckFJtcDXlqHsj62XVAChQiVtEpUDvUq', NULL, '2018-02-05 06:25:59', '2018-02-05 06:34:23'),
(107, NULL, 'Md.Nazrul', 'Islam', '25.jpg', 'Md.Nazrul Islam_HRM Graduate.pdf', 'nazrulslm60@gmail.com', 'nazrulslm60@gmail.com', '01740933505', 'B.B.A (Graduated ) (H.R.M)', 'Eastern University,Dhaka', 'bKash Ltd.', 'Executive', 'MAFS (Mobile Account Financial Service) Executive in Customer Service Division', '2', '$2y$10$TlhpFlkkJu.t./MmlsULIuxJeuxOs4dktPSrDhI6E09C.lveFk0IK', NULL, '2018-02-05 06:27:17', '2018-02-05 07:17:50'),
(108, NULL, 'Zahirul', 'Islam', 'zahirul Ilam.jpg', 'ZAHIRUL ISLAM_Finance_cgpa 3.76.pdf', 'islamzahirul326', 'islamzahirul326@gmail.com', '8801825635516', 'BBA with Finance Major', 'Eastern University', NULL, NULL, 'Fresher', NULL, '$2y$10$4B6yWQutR6m2N3hKftBNX.t2/zxi3jVegFMDij6ls.3WMv18urv2G', NULL, '2018-02-05 06:39:22', '2018-02-05 06:45:17'),
(109, NULL, 'Md.Saif', '-al-arafin', NULL, NULL, 'saifw', 'saifrw@yahoo.com', '01912689187', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$GvSo2D4Z/ZW3pHEdgudsaeNzK/dAkAzXxem6Jvh0LsZKHTsSKTXLG', NULL, '2018-02-05 06:41:42', '2018-02-05 06:41:42'),
(110, NULL, 'Md', 'Rifat', NULL, 'Md. Rifat Resume.docx', 'Md.rifat', 'mderash@gmail.com', '01681444825', NULL, NULL, '21/1 debidash ghat lane, chowk bazaar, dhaka', 'Accountant', NULL, NULL, '$2y$10$S/jZWipFX5FBlpkBM.LLIup91ID3CrCU0fjwPRhh22u99AlLVs3qC', NULL, '2018-02-05 06:53:29', '2018-02-05 06:54:09'),
(111, NULL, 'Masud', 'Rana', NULL, NULL, 'MasudRana', 'ranamasud63@gmail.com', '01716286861', NULL, NULL, 'Ananta Group', 'Junior Officer', NULL, NULL, '$2y$10$Y3duSmN5VMBIGWKbk18hROw5aKPh9rzQDSu4B/x.f/JjIB6zuiKWy', NULL, '2018-02-05 06:59:56', '2018-02-05 06:59:56'),
(112, NULL, 'naffi', 'badhon', NULL, 'Badhon 222.doc', 'naffibadhon', 'naffi420@gmail.com', '01670176416', NULL, NULL, 'PRAN-RFL', 'Operation Manager', NULL, NULL, '$2y$10$QiBqtdrFRRJgTXIpVuGxg.Ri6WZTTSgsmKXwjX04WyvwenBH6muOK', NULL, '2018-02-05 07:07:10', '2018-02-05 07:08:02'),
(113, NULL, 'Noor Mohammad', 'Shakil', '31055.JPG', 'Noor Mohammad Shakil_CV.docx', 'NM Shakil', 'shakil.noor91@gmail.com', '+8801515629266', 'MBA (Major in Finance)', 'United International University', 'ServicEngine Ltd.', 'Senior Executive', NULL, '3.5', '$2y$10$KObtQkr3lGza.GDr/6KpQOEXCqrmkbKxgeS1xj/Zk0JFuDxjU.s9G', '1gXTJtZuvJNrkoTIS8mVGe8IROKJJqjdHRI4PCPquQdTuLogLUKmLLI3YwxE', '2018-02-05 07:20:51', '2018-02-05 07:47:14'),
(114, NULL, 'Afsana', 'Hossain', NULL, 'Afsana_Hossain_CV (2).doc.pdf', 'afsanafin', 'Afsana.fin@gmail.com', '+8801849419577', NULL, NULL, 'Sidko group', 'Executive Assistant', NULL, NULL, '$2y$10$ga0tVU6xPYNxnxK7./jEE.CfxkLRkZ8yiwkBWaMJ/9FJTxEsXO8rm', NULL, '2018-02-05 07:26:33', '2018-02-05 07:27:22'),
(115, NULL, 'Md. Zakir', 'Hussen', 'rsz_img_20171211_0002edit.jpg', 'Md. Zakir Hussen.pdf', 'jnuzakir@gmail.com', 'jnuzakir@gmail.com', '01735430050', 'MBA, BBA (Finance)', 'Jagannath University, Dhaka.', 'Not Applicable', 'Not Applicable', 'Fresher', '0', '$2y$10$owhATqTrj317XY31clDCCOnq5H8JSpLHd2cUPEfDk3u6gO.vjetSC', 'VcZd89kUipLebePBQjwg9e3JLYDLqamNuK1YDNasSJQPFojhrP27fhUCCinX', '2018-02-05 07:39:05', '2018-02-05 08:09:21'),
(116, NULL, 'Md.Hridoy', 'Hossain', NULL, NULL, 'Md.Hridoy Hossain', 'rubel01729154198@gmail.com', '01729154198', NULL, NULL, 'SSL', 'customer care officer', NULL, NULL, '$2y$10$x4cg9f39eFNHFHAgNQVXMesyxQVzvBOhIgdHZs047WOZWiwBubstG', NULL, '2018-02-05 07:56:08', '2018-02-05 07:56:08'),
(117, NULL, 'Md. Nafiur', 'Rahman', 'arafat 2-002.jpg', 'Md. Nafiur Rahman Resume.docx', 'nafiurrahman43', 'nafiurrahman43@gmail.com', '01717014643', 'M.B.A in Human Resource Management', 'Daffodil International University', 'Sweater Makers Ltd.', 'Asst. Merchandiser', '( June 1, 2014 - October 3, 2015)\r\nI was responsible for looking Buyer Orders, Production report, Packing list, maintenance shipment, and others paper work.', '1.3', '$2y$10$Kd4vskyYigoywiP5FcGeX.UK2/ZssmpHtA/obWA73lriCyWHVDC6W', NULL, '2018-02-05 08:00:41', '2018-02-05 08:47:33'),
(118, NULL, 'Sohel', 'Rana', NULL, 'cv_ sohel Rana.pdf', 'ranasohel', 'ranasohel_90@ymail.com', '01949179799', NULL, NULL, 'Janasheba Foundation', 'Junior Admin Officer', NULL, NULL, '$2y$10$Bxi5zVpTJBfbb6WD/vmRTOgqBq34ytO.RpX4COAODrzgHVNSffOOa', 'heb3IaKnbjeBrRVv49AjxUucY4icC1t1UB5762V9z1QBmdtR2RjeSXqiLmdx', '2018-02-05 08:25:33', '2018-02-05 08:28:16'),
(119, NULL, 'Abdullah-Al', 'Sohel', NULL, 'CV_ Sohel_Revised.docx', 'sohel_11', 'zsohel365@gmail.com', '01736877381', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$fxOj/VvKmuc9B806Q7nX.uuu8B0pEj8SNYNCBFTw7uAJ0VabLGvbu', NULL, '2018-02-05 08:40:29', '2018-02-05 08:41:20'),
(120, NULL, 'Atiquar Rashid', 'Upal', NULL, 'Atiquar Rashid Upal.doc', 'atiqupal', 'atiqupal@gmail.com', '01621509930', NULL, NULL, 'JASUS', 'Accounts Officer', NULL, NULL, '$2y$10$pBzymUOvMPqJhzAb88dp9.qYAcq1vRVG4Uv5EZb7/9/7f376.D5Ym', NULL, '2018-02-05 08:45:58', '2018-02-05 08:46:43'),
(121, NULL, 'Shabuz', 'Hossain', NULL, 'green (1).doc', 'greenlax', 'greenlax123@gmail.com', '01825347320', NULL, NULL, 'Zarif Fashion House', 'Executive Accounts', NULL, NULL, '$2y$10$rfYZjzj0CWl5Fc9Brk4bkOf/OlsOH1ZtOnMPSeHib25qWSWW0Lgla', 'uyt3zgZO02oy3rjBKlPcUg8JsWz82dxvmLkKJsr4fxot89yU47hZD3fk8wUb', '2018-02-05 08:51:14', '2018-02-05 08:51:58'),
(122, NULL, 'Md', 'Shohel', NULL, 'CV (shohel)new.doc', 'Mdshohel', 'mdshohel44@gmail.com', '01813947410', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$WGlxJxQykeICp8nmQdFJ/OaD2TUfh0lNqjJcriUIF2W5OnXUEhAOW', NULL, '2018-02-05 08:53:37', '2018-02-05 08:55:15'),
(123, NULL, 'MD Rafiqul', 'Hasan', NULL, 'Md Rafiqul Hasan-1.pdf', 'Rafiqul Hasan', 'rratulhasan@gmail.com', '01631003284', NULL, NULL, 'Navigator Tourism', 'Visa officer', NULL, NULL, '$2y$10$T7ZuS6Np9ngcy1A831tMzOA3VkidNxOTgVa6uDdaWtmRNaxnMeJXK', NULL, '2018-02-05 09:09:48', '2018-02-05 09:11:31'),
(124, NULL, 'Abutorab', 'Himel', NULL, 'Resume of Himel.doc', 'himel398', 'himel398@gmail.com', '+8801914135624', NULL, NULL, 'none', 'none', NULL, NULL, '$2y$10$bTWCaEsNIaa4LHvQEGozdOGem4o03nvHunw.hwrjGHu6z2uiY9L.m', NULL, '2018-02-05 09:14:29', '2018-02-05 09:16:19'),
(125, NULL, 'Mahbub', 'Alam', NULL, '(MD MAHBUB ALAM) CV.pdf', 'Mahbub123', 'alammahbubsumon@gmail.com', '01681474981', NULL, NULL, 'Micro Fibre Group', 'Data Entry Operator(Accounts)', NULL, NULL, '$2y$10$zqL9xWcoijO4ka7rkrwA4uQeF4F.blVeuD8t3r3PPQNkC9keN84ri', NULL, '2018-02-05 09:29:54', '2018-02-05 09:31:40'),
(126, NULL, 'MD', 'Hasanuzzaman', NULL, NULL, 'hasanhzh45', 'hasanhzh45@gmail.com', '01712768437', NULL, NULL, 'Bishwo Shahitto kendro', 'Program Officer', NULL, NULL, '$2y$10$gS70Ia4eetNFDSt/LI.NRe7BXenrd30iSOjLcL1.h9R.BnfX7Odpy', 'LZRubq9zmMfx2xRBpWuCrzOpH5dReOA98b1TQUn9IUMmb3dj4K2Yyg7zs0U9', '2018-02-05 09:36:44', '2018-02-05 09:36:44'),
(127, NULL, 'Tania', 'Siddika', NULL, 'tuCV-tania siddika.docx', 'tstani', 'tani.siddika.jnu@gmail.com', '01685813296', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$o/su42NOWobxT9o2udkZzesjtF3RnVD8lWlzjgjvTrR0trOmdqXc.', NULL, '2018-02-05 09:38:53', '2018-02-05 09:53:08'),
(128, NULL, 'Afzal', 'kabir', NULL, 'Afzal kabir.docx', 'afzalkabir', 'afzal3501@diu.edu.bd', '01736363618', NULL, NULL, 'n/a', 'n/a', NULL, NULL, '$2y$10$a3Gun.1sTpB./D1x3x046O.sSNcaw3tD82LsRyRczn9VKScsANJ62', NULL, '2018-02-05 09:40:17', '2018-02-05 09:41:17'),
(129, NULL, 'Md. Rokibul Islam', 'Tushar', NULL, 'Resume of Tushar.docx', 'tusharsjob', 'tushar.adust@gmail.com', '+8801681429232', NULL, NULL, 'My Outsourcing Ltd.', 'Training Supervisor', NULL, NULL, '$2y$10$5Ph5jI/EDpDGZnM0coPXieENJwGXO7p3OKgX/.LIZJlJ3B.NALQja', NULL, '2018-02-05 09:44:31', '2018-02-05 09:45:32'),
(130, NULL, 'Jannatul', 'Fardous', NULL, NULL, 'Himi', 'Jannatulhimi@gmail.com', '01797569626', NULL, NULL, 'Freasher', 'Freasher', NULL, NULL, '$2y$10$VmI6nzyxWmWWkUIuBez5EuEaturIOXcDf7lXnUVWUPf4TF5A8LBmu', NULL, '2018-02-05 10:16:19', '2018-02-05 10:16:19'),
(131, NULL, 'Rahul Paul', 'Apu', NULL, 'Rahul Paul CV BBA With photo.pdf', 'rahulpaul', 'rahulpaul135@live.com', '01822123259', NULL, NULL, 'No', 'No', NULL, NULL, '$2y$10$WC1KFxDtdITu60Bom.7LteyJ3fZK1SV/HH6TCzJUUrFnTXlUqjikC', NULL, '2018-02-05 10:18:57', '2018-02-05 10:19:32'),
(132, NULL, 'kazi', 'sizan', NULL, 'Kazi Sizan - 01745 245063..pdf', 'kazi sizan', 'quazi.sizan@gmail.com', '01745245063', NULL, NULL, 'Mak and Co chartered accountants', 'audit trainee', NULL, NULL, '$2y$10$L/7x1Yyb3y2cRcyz8iaX9.lJuwbDxoWAbUVIczHTV5qc3asHQGL/2', NULL, '2018-02-05 10:41:42', '2018-02-05 10:42:11'),
(133, NULL, 'MD. ZAHIDUL', 'GONI', NULL, 'zahidul goni (1).doc', 'zahidul goni', 'zahidulgoni08@gmail.com', '01969565260', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$yoBY4nbqz68KUlTv/qDJPOK01rJCF/BsWCflLrZOPo5VUlFzgc6Pm', NULL, '2018-02-05 10:45:47', '2018-02-05 10:47:40');
INSERT INTO `users` (`id`, `gender`, `FirstName`, `LastName`, `Photo`, `CV`, `Username`, `email`, `Phone`, `Education`, `Institution`, `Company`, `Possition`, `Experience`, `TotalYearsExperience`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(134, NULL, 'Golam', 'Sabbir', NULL, NULL, 'Sabbir', 'sojib.iub@gmail.com', '01673008882', NULL, NULL, 'Al-Arafah Islami Bank Lit.', 'Internship', NULL, NULL, '$2y$10$lWG4/.ZM4Awfj8hB1HkzMeSMKGy9C1aVUaF40Vnui6McjRKM36UPi', NULL, '2018-02-05 11:03:28', '2018-02-05 11:03:28'),
(135, NULL, 'Abidur', 'Rahman', 'IMG (2).jpg', '2.docx', 'obhee', 'obheerahman@gmail.com', '01685295165', 'MBA, BBA', 'Jagannath University', '140/1 West monipur, Mirpur-2.', 'Mr.', NULL, NULL, '$2y$10$V3NA.Z1c9FuIwd7wVGjzfOmT/cTtK1y0QSy7KvQhxoj3CEv2l2Lxy', NULL, '2018-02-05 11:07:59', '2018-02-05 11:14:42'),
(136, NULL, 'Chayan', 'Deb', NULL, 'CV.pdf', 'chayan123', 'chayandeb67@gmail.com', '01921602617', NULL, NULL, 'Not Yet', 'Not yet', NULL, NULL, '$2y$10$YXVFo7NksIftGJggkimv1urYhX/ai3FE95/l7EyOhbKHRjUcgIkwi', NULL, '2018-02-05 11:15:04', '2018-02-05 11:16:01'),
(137, NULL, 'Dipankar', 'Dhar', NULL, 'Dipankar Dhar-1.doc', 'Dipankar Dhar', 'Dipdhardip@gmail.com', '01719526955', NULL, NULL, 'Fresher', 'N/A', NULL, NULL, '$2y$10$/zaPk3UdaRVCiclKJEK.nOM7QEVUl6nhLNPPPAykVCgDYIP7SESXC', NULL, '2018-02-05 11:21:23', '2018-02-05 11:23:06'),
(138, NULL, 'Imran', 'Shimul', NULL, 'Md. Imran Hossen.doc', 'ImranShimul', 'imranshimul1992@gmail.com', '+8801719392055', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$5av7xsv3fBwMS1Iun76Qu.Tfw.NhT9gVgEaE8Rmt/ToXHBHw/4o/q', NULL, '2018-02-05 11:24:27', '2018-02-05 11:34:01'),
(139, NULL, 'Raihanul azim', 'Talukder', NULL, 'Raihanul azim(CV).docx', 'Raihan', 'Raihanul.azim.talukder@gmail.com', '01767690163', NULL, NULL, 'Mra Enterprise Limited', 'Accounts Executive', NULL, NULL, '$2y$10$OEZavogwWbuylPYbHVDkk.LwfF7aaNPDcuy0ukWIuEwb0hl79qGCG', NULL, '2018-02-05 11:48:23', '2018-02-05 11:54:48'),
(140, NULL, 'Mizanul', 'Islam', NULL, 'Mizanul_Islam_CV.docx', 'mihk', 'mihridoyhk@gmail.com', '01680680214', 'BBA', 'American International University Bangladesh', 'N/A', 'N/A', NULL, NULL, '$2y$10$XPJO3TnoT0r7AxuW2RMIT.ZWEs9oFeMfRDTqj48AZHRUzpwfEqomy', 'YqDllUL8SOgAwCg5RSUp7eatZAKu8KHeln6eNfJJtcmvhhDeHMNJvsTlKDm8', '2018-02-05 12:18:25', '2018-02-05 12:22:00'),
(141, NULL, 'Md Akramul', 'Islam', NULL, 'Resume(1).docx', 'shikder', 'infoakan@gmail.com', '01914460355', NULL, NULL, 'nil', 'nil', NULL, NULL, '$2y$10$V7tRIS7Y6iqFqnQtGIEtrOr9OketwjaexVNl2zzobOMPreu1HjTPW', NULL, '2018-02-05 12:41:58', '2018-02-05 12:46:53'),
(142, NULL, 'muid', 'hossain', NULL, NULL, 'muidhossain', 'muidhossain017@gmail.com', '01741300189', NULL, NULL, 'na', 'MBA student Major in HRM.', NULL, NULL, '$2y$10$oVWJjfxzdXIW0AwbUtHUouN1sCKeAuBNSjGvxqidaAnedNxc.HjcG', NULL, '2018-02-05 12:42:50', '2018-02-05 12:42:50'),
(143, NULL, 'Mohammad Saiduzzaman', 'Sabuj', NULL, 'Sabuj cv.doc', 'sabujctg', 'sabuj2021@gmail.com', '01681252595', NULL, NULL, 'intimate apparels', 'Assistant Merchandiser', NULL, NULL, '$2y$10$TJuvf.AfWHlpHt4IuPG5zOe0VdSXId0Br1j/jIQm0lWWp5NCxhgou', NULL, '2018-02-05 12:56:41', '2018-02-05 12:58:25'),
(144, NULL, 'Abdulla Al', 'Noman', NULL, 'C.V ABDULA ALNOMAN.docx', 'nomanbsl', 'abdullaalnomanbsl@gmail.com', '+8801728330022', 'Professional BBA', 'Institute of Science Trade &Technology (under National University)', 'no', 'no', 'Internship from ACME Agrovet and Beverage Ltd, under Account & Finance Department.', NULL, '$2y$10$DOa90ffJ2w8f.Vew5ATitewU1C5f6G9Kz2fF8fx7gU22ThrmC8vGC', 'qOYcIUZfIwjTUlMnaxINKHmgLaO6Gk7zfLrDr5hJd4UG9En8emEogQL7Tf5r', '2018-02-05 13:06:21', '2018-02-05 13:21:34'),
(145, NULL, 'KH. MOKTADIR RAHMAN', 'KH. HABIBUR RAHMAN', NULL, 'accounts cv final.pdf', 'kh.rahman33', 'kh.rahman345@gmail.com', '8801925045498', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$zKLl1lkIBzu7yIMU/xRKveRV0PcsZujW8tI//czumPaTNP25gi.JC', NULL, '2018-02-05 13:20:20', '2018-02-05 13:22:56'),
(146, NULL, 'Md Ratan', 'Miah', NULL, 'Md Ratan cv with pic.docx', 'ratan076', 'belalahmed2014145@gmail.com', '01767377396', NULL, NULL, 'nill', 'nill', NULL, NULL, '$2y$10$Vq5l/AtjUwEAHEcX6r9Wz.an1CfO4/9l0vGtcsDpzwjAiATIv9lc2', NULL, '2018-02-05 13:44:47', '2018-02-05 13:51:35'),
(147, NULL, 'Md. Ehasan', 'Mourtaza', NULL, 'Curriculum Vitae_Md. Ehasan Mourtaza_EWU.pdf', 'Ehasan', 'ehasanmourtaza@gmail.com', '01620326404', NULL, NULL, 'Finance Graduate', 'Undergraduate Teaching Assistant', NULL, NULL, '$2y$10$oznwrHkSECburrD5jl0sheO7CYFW.SB2G09AToe1lhRsEjPYMZ2gC', NULL, '2018-02-05 13:45:13', '2018-02-05 13:46:03'),
(148, NULL, 'MD. Shawon', 'Miah', '10.jpg', 'Shawon CV.pdf', 'Plabon_fs', 'encryptedplabon@gmail.com', '01676731088', NULL, NULL, 'DBBL', 'ARO', NULL, NULL, '$2y$10$GGTuRtvbaJInXBdsYxkUNeQ0z9fYql9r3bRBblRbhOc1KXnk0Lk6u', NULL, '2018-02-05 13:52:55', '2018-02-05 13:55:00'),
(149, NULL, 'Md. Asif', 'Khan', NULL, 'Md. Asif Khan.doc', 'asif@khan', 'asifkhan01734@gmail.com', '01734491114', NULL, NULL, 'Fresher', 'Fresher', NULL, NULL, '$2y$10$gKKXaX.cGHH3qDGhsyvtYOLXF/q04SQKwXQfN7zQCihMpkOkgJ76W', NULL, '2018-02-05 13:54:11', '2018-02-05 13:58:53'),
(150, NULL, 'Foyez uddin', 'Mahmud', NULL, 'Foyez uddin mahmudCV.pdf', 'foyeztareq', 'foyeztareq@gmail.com', '01625121583', NULL, NULL, 'Ajkerdeal.com', 'Executive (supply chain management)', NULL, NULL, '$2y$10$Dl0BmAW7KSueOlEz.arIcOzMxfQS1cEUYsRLNLarTCGzQZO8ZxHve', NULL, '2018-02-05 14:02:06', '2018-02-05 14:08:24'),
(151, NULL, 'MD. FORHAD', 'HOSSAIN', 'My formal pic.jpg', 'Md. Forhad Hossain_EWU_Finace.pdf', 'forforhad', 'for.forhad@gmail.com', '01676726620', 'BBA in Finance', 'East West University', 'KINSHIP SOLUTION', 'Senior CRO', NULL, NULL, '$2y$10$TnzbB/pTnMAfejhXICfhGucrnPyGHNjhvem9JQpyyqnXygQewRe3.', NULL, '2018-02-05 14:02:40', '2018-02-05 14:04:55'),
(152, NULL, 'Mujakkir', 'Alam', NULL, 'CV of Mujakkir.pdf', 'Mujakkir', 'alamsust2010@gmail.com', '01721223763', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$0/CEFOBMUXmuCNJ/H/omVu97Rn.iHTGgMbGpKgY4HWgLIdcSqd.j2', NULL, '2018-02-05 14:06:50', '2018-02-05 14:21:05'),
(153, NULL, 'Md. Raihan', 'Ahmed', '55327.jpg', 'CV of raihan ahmed (1).pdf', 'raihan99', 'ahmedraihan2035@gmail.com', '01715542035', 'Masters in Accounting ( 2017 )', 'National University of Bangladesh', 'N/A', 'N/A', 'Fresher', '0', '$2y$10$Mvrkne/C0UzVNTolWFuQTekzO3yYfSGggQIUiSCOFXYcDxcOL9tb2', 'iYCo7NsdXxc9sDDUQoqMdRfozpusCTtEhGtLS7Dnv4MYCE2i7qLFgIO0Wu7Z', '2018-02-05 20:13:19', '2018-02-06 20:16:07'),
(154, NULL, 'Md', 'imran', NULL, 'IMRAN.pdf', 'mdImran', 'shishirimran@yahoo.com', '+8801674562773', NULL, NULL, 'British Standard school', 'HR Executive', NULL, NULL, '$2y$10$yaPWJAAY8jurEQRraW2BrurTZtxgcRjsEYId0/wDX6E2d0UzIY/M2', 'dNiAjoCH9XPYw58VMohisa5YVP8GZjHRn6OdXvaYCapXQyCSMPk9Rr5as6P5', '2018-02-05 20:22:22', '2018-02-05 20:35:36'),
(155, NULL, 'Juwel', 'Dutta', 'IMG_20171129_112858.jpg', 'Juwel Dutta,\'.pdf', 'Duttababu', 'juweldutta94@gmail.com', '+8801790435006', 'Bachelor of Business Administration (BBA)', 'University of Science & Technology Chittagong (USTC)', 'MGH Group', 'Trainee Assistant', NULL, '2', '$2y$10$/ierZtEEgONPT62gJFWJ4uK/mX3/oILRVMWTvTR7M7KkUPhAkvh8K', NULL, '2018-02-05 20:48:42', '2018-02-05 21:01:27'),
(156, NULL, 'Md.Bakibillah', 'Shanto', 'IMG_1456.jpg', 'Resume of Md. Bakibillah_2017.docx', 'bshanto', 'billahshanto@gmail.com', '01833228833', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$NQmKavohewgaKNmVslwjOOdzTorwo2MDTxffrfmhNGKvmpw/R/yIW', NULL, '2018-02-05 20:58:33', '2018-02-05 21:05:08'),
(157, NULL, 'Solaiman', 'Hossain', NULL, 'SOLAIMAN.pdf', 'mdshmamun', 'mdshmamun007@gmail.com', '01858293339', NULL, NULL, 'None', 'None', NULL, NULL, '$2y$10$Kkv0TV/sYfFddiPLOyDmAuB.9lFij01o4BhyFnN13oVttLyzpeq5e', NULL, '2018-02-05 21:19:47', '2018-02-05 21:20:27'),
(158, NULL, 'Md.Ataul', 'Bin Gani', NULL, 'cv of Ataul.doc', 'ankur', 'ankur.nsu@gmail.com', '01717364505', NULL, NULL, 'wimcyber technology', 'accounts executive', NULL, NULL, '$2y$10$9jUvw0rsS34vKyJ9N1lG3.Osw9wYVo44.3TCQVDniovNH5in/8jXK', NULL, '2018-02-05 21:21:11', '2018-02-05 21:22:48'),
(159, NULL, 'Md. kamal', 'Hossain Bhuiyan', NULL, NULL, 'kamalhossain', 'kamalhossain1673@gmail.com', '01673114392', NULL, NULL, 'No', 'No', NULL, NULL, '$2y$10$V0HBqhg7GQUsC6wpjIFzQeiprplajHFzuCHLCUZifIzzOsbYcX.5W', NULL, '2018-02-05 23:14:49', '2018-02-05 23:14:49'),
(160, NULL, 'PALASH', 'DAS', NULL, 'Palash Das1.doc', 'palash552903', 'palashdasp@gmail.com', '01725903601', NULL, NULL, 'Nagari kali mondir co-operative union ltd.', 'Accounts Officer', NULL, NULL, '$2y$10$LrlftacO80ZeuzGuQ.GuO.RNecWRSx6J/1AJ9d1o6SkawjN7h1Qni', NULL, '2018-02-05 23:36:52', '2018-02-05 23:37:50'),
(161, NULL, 'Mijanur', 'Rahaman', NULL, 'update cv.docx', 'Mijan76', 'Sojibmrsbhuiyan431@gmail.com', '01814256176', NULL, NULL, 'Milvik Bangladesh Ltd', 'Telesales Officer', NULL, NULL, '$2y$10$ar43UpmxJ72KRRvaAdD1VeTVs6i4FN70QLB.DiRdcRGI4aHj2H98q', NULL, '2018-02-05 23:51:03', '2018-02-05 23:53:12'),
(162, NULL, 'Chanchal', 'Pal', '61656.JPG', 'CV.doc', 'chanchal.pal', 'chanchal.pal139@gmail.com', '01937517961', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$tBUdUb8qOoMjKmzl60Ejl.23CAzQ6IPP6ig9y7W0xogC3zWK/m9iG', 'aaWRxMeuViX5JHELZCNtrGpDLV2ztNq9xhbeywrYfJIOrGHkhdV6e9no0CfS', '2018-02-06 00:35:45', '2018-02-06 00:38:14'),
(163, NULL, 'robin', 'alam', NULL, 'Robiul Alam Robin CV.pdf', 'robin', 'robinalamb3n@gmail.com', '01789690495', NULL, NULL, 'none', 'none', NULL, NULL, '$2y$10$K3iq9Y4hCKBUXBjE.7uqs.HHEUtjVwHHzU6C81dgIxGFW972UQz.G', NULL, '2018-02-06 00:41:06', '2018-02-06 00:41:51'),
(164, NULL, 'MD. MAHFUZUR', 'RAHMAN', 'img155.jpg', 'Mahfuzur Rahman.pdf', 'RAZUMAHFUZ', 'm.r.razu1991@gmail.com', '01675128654', NULL, NULL, '66/5 Balughat,Dhaka Cantonment,Dhaka-1206', 'Executive, Accounts Administration', NULL, NULL, '$2y$10$1rX6Omf1GofUltoY9.4OY.p5dNA6pRm/qL8uHm6rPCCZffpvUaz.K', NULL, '2018-02-06 00:42:03', '2018-02-06 00:46:29'),
(165, NULL, 'Amena', 'Akter', '300.jpg', 'CV-Amena Akter.docx', 'amena', 'amena005@yahoo.com', '01740544708', 'BSC in CSE', 'Eastern University', 'Dutch-Bangla Bank Limited - Agent Banking', 'Sub Agent Relationship Officer', '➢Cash Payment, Cash Received, Bill Pay By Cash, Bill Pay From Account.\r\n➢ Account Opening, Fund Transfer, Balance Inquiry, P2P Service.\r\n➢ Statement Inquiry, DSR Cash Payment , DSR Cash Received.\r\n➢ ATM-Withdraw, Deposit Plus Scheme, Fixed Deposit Receipt.', NULL, '$2y$10$jSXV7upgR5JisYVJHpfYeeDVAoHXxz.9uwzfqritKrGxzA.2HSm6G', 'MmsvOBKxLaCHEKObW2bHTKW6CYz9QZdyLhv5vYDUoAL8LVnj19k8kXRrL5iI', '2018-02-06 00:43:23', '2018-02-06 00:49:42'),
(166, NULL, 'Tanvir', 'bhuiyan', NULL, 'Tanvir 0.docx', 'Tanvir', 'rony.tanvir2@gmail.com', '01718126437', NULL, NULL, 'Imax Mobile', 'Customer care ex.', NULL, NULL, '$2y$10$Lnvj6hahFOJ.LAXuPjuvB.xQ4bjV4rfoUNTytZEi07H10or11qZaW', NULL, '2018-02-06 00:51:49', '2018-02-06 00:52:28'),
(167, NULL, 'Md. Maruf', 'Hossain', NULL, 'CV of Md Maruf Hossain.pdf', 'maruh', 'maruf16th@gmail.com', '01914272783', NULL, NULL, 'bKash', 'Compliance Officer', NULL, NULL, '$2y$10$o9TmiIglVqe4J0TbUvvebufLu24.LzaWguumPQyPRx3KiRBETajVi', NULL, '2018-02-06 01:43:50', '2018-02-06 01:44:30'),
(168, NULL, 'Saiful', 'Islam', NULL, 'Resume of Saiful Islam.docx', 'rajusaiful', 'rajusaiful21@gmail.com', '01703636420', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$05xpJjio2EEznKa2RYiWmuPFNaMk7Tckir//I/CJAgK9S2OQTZ7VO', NULL, '2018-02-06 02:54:55', '2018-02-06 02:55:55'),
(169, NULL, 'Md. Sohag', 'Ahmed', NULL, 'Sohag_ahmed_Pau_CV-4.docx', 'Sohag Ahmed', 'sohag343zia@gmail.com', '01729468634', NULL, NULL, 'no', 'no', NULL, NULL, '$2y$10$GX/aiYlibZ8vOd99W/zUc.X0.xhem9d112dQexWprdKVhUPpszj/W', NULL, '2018-02-06 03:16:19', '2018-02-06 03:19:12'),
(170, NULL, 'Md. Akibur', 'Rahman', NULL, 'CV of Md. Akibur Rahman.docx', 'Md. Akibur Rahman', 'nayanakib@gmail.com', '01924290826', NULL, NULL, 'First Capital University', 'Junior Accounts officer', NULL, NULL, '$2y$10$SyIg4uK4AcrgDKm3vDRw/.nvwbPr5kb1N20ZKShkut4FNoig9KStS', NULL, '2018-02-06 04:21:04', '2018-02-06 04:24:29'),
(171, NULL, 'Mahmuda Sultana', 'Mitu', NULL, 'CV.docx', 'Mahmuda Sultana Mitu', 'mahmudamitu94@gmail.com', '01757344633', NULL, NULL, 'None', 'None', NULL, NULL, '$2y$10$KottUd06PkKc.sDUYs9nDuNsE2rh3D8SAEPyLFyTaKVJutMajZq9S', NULL, '2018-02-06 04:48:32', '2018-02-06 04:49:12'),
(172, NULL, 'Akib', 'Anwar', NULL, 'C M AKIB ANWAR CV 2018.docx', 'akibanwar', 'akibanwar86@gmail.com', '+8801709611160', NULL, NULL, 'Unemployed', 'none', NULL, NULL, '$2y$10$rFiDVIX76VBS6MqEKB6bDeyVKvpFLS7IFrFRacDp/fMBPSUgmRwem', NULL, '2018-02-06 05:29:59', '2018-02-06 05:33:39'),
(173, NULL, 'Sujit', 'Sutradhar', NULL, 'Sujit CV.doc', 'sujit.shawon', 'sujit.shawon@gmail.com', '01671308463', NULL, NULL, 'Non', 'Non', NULL, NULL, '$2y$10$15MN5VUUcF6dVlRFDw/eQ.qEu32haUfthoCXDfOStIg8kQlYlw.9O', 'KCtXOKxGO4T8H3t9hggmq6nxwZhfsZpOqUJIs2XaIIK6A9ZS1ZFiLFjstrut', '2018-02-06 06:05:40', '2018-02-06 06:18:34'),
(174, NULL, 'MD.RASHEL', 'MIAH', '16933876_1122068477916402_744527508_n.jpg', 'Md.Rashel Miah.doc 2N.doc', 'aahnad', 'aahnad464@gmail.com', '01992492038', 'BBA', 'Primeasia University', 'A K TAJ GROUP', 'ACCOUNTS OFFICER', '1 year', '1', '$2y$10$S05lR9lNj9aJXjFSmJthpO5DRhoTUqmUwsmr/mWpRL513EfpYVyJi', 'Jw0W4ddIbVEwR8xnyXedZqtxzzwJOHYO3aNzZ0jzUFHLye8nG6cH9FVpAReh', '2018-02-06 06:42:12', '2018-02-06 06:50:43'),
(175, NULL, 'Md. Shajjad', 'Hossain', NULL, 'shajjad.pdf', 'shajjad@2222', 'shajjadhossain222@gmail.com', '01839407301', NULL, NULL, 'Gazipur Residential Model School & College', 'Accounts & Office Administration', NULL, NULL, '$2y$10$NmjJ8AwW69McM.OlH08iNOYgAZ8aDkPjqZ6qpPw6c4Zz9.MXCxgki', NULL, '2018-02-06 08:26:21', '2018-02-06 08:27:12'),
(176, NULL, 'Md. Ariful', 'Alam', NULL, 'final cv - Copy.docx', 'Arifony', 'arifony@gmail.com', '01680501371', NULL, NULL, 'Rahman Hasan Associates Ltd.', 'Trainee Executive', NULL, NULL, '$2y$10$NpEPrHIBcBoxCc8hn2vFJOD0rmpKxH9Qc9QRiNxbiU5asFRIi3VgK', NULL, '2018-02-06 09:25:48', '2018-02-06 09:31:06'),
(177, NULL, 'Imajuddin', 'Ahmed', NULL, 'shaikat cv.pdf', 'shaikat.imaj', 'shaikat57@gmail.com', '+8801672224481', NULL, NULL, 'Otobi Ltd.', 'Junior Account Executive', NULL, NULL, '$2y$10$7pr2vUJBCwiOqWDZDq/DCuMf09Tx2IRSjZlxi4RWyzde3m2xgwfj2', '5GdFfTFs0jms1XItbBABRaG49A1rsGQqvvnkzF907hJaR7c1mtaqI1ToUVA0', '2018-02-06 10:04:01', '2018-02-06 10:28:17'),
(179, NULL, 'Sazzad', 'Husen', 'Photo-Sazzad Husen.jpg', 'Resume-Sazzad Husen.pdf', 'sazzadhusen', 'sazzadjihan@gmail.com', '01711283097', 'BBA', 'Dhaka City College (Under National University)', 'Nahar Monjil, 1202 Hajrat Omar (R) Road,   East Kalameshar,Board Bazar,Gazipur.', 'Student', '3 months experience as an internee in Al-Arafah Islami Bank.', '0', '$2y$10$PcAdV2PcfD03oG8BF8YWGuO1dIwTeXYVywWPhFeITo9IEwOzzav32', NULL, '2018-02-06 13:07:12', '2018-02-06 13:14:27'),
(180, NULL, 'M', 'Al Amin', 'pp.jpg', 'Md. Al Amin CV.pdf', 'alaminshakil', 'info.alaminshakil@gmail.com', '01515261234', NULL, NULL, 'NA', 'NA', NULL, NULL, '$2y$10$Wv.vF6gU1b3cPXSI6R4hdes2vRvwVyKbOvPccVzLCjRZxUXItOit.', NULL, '2018-02-07 01:04:28', '2018-02-07 01:08:29'),
(181, NULL, 'Md. Asaduzzaman', 'Akand', NULL, NULL, 'asaduzzaman757', 'asaduzzamansohag6@gmail.com', '01515245828', NULL, NULL, 'Faiza Button and Zipper Ltd', 'Exclusive Officer', NULL, NULL, '$2y$10$UR3n5OFf0xA2h7yFtHTQz.fZFAwNbWofC4cUfRNx/PW/vfAhm.JPC', NULL, '2018-02-07 06:11:56', '2018-02-07 06:11:56'),
(182, NULL, 'Md', 'Akther', NULL, 'Curriculum Vitae of Md. Rajib Akther.pdf', 'mdrajib2014', 'mdrajib2014@gmail.com', '01515619628', NULL, NULL, 'Master Sound Event Organization, 28, Dilu Road, New Eskaton, Moghbajar, Dhaka.', 'Marketing, Executive', NULL, NULL, '$2y$10$XSH1tiDiT7kcuJEdHmwho.u9LOIiNGiAXXisuyiv69Q14rrHLsxpm', NULL, '2018-02-07 12:02:42', '2018-02-07 12:09:59'),
(183, NULL, 'Azher Uddin', 'Akib', NULL, 'Azher_Uddin_Akib_CV.doc', 'Azhaarakib', 'azharuddin.akib@gamil.com', '01840751707', NULL, NULL, 'NA', 'NA', NULL, NULL, '$2y$10$l5Acy1VbC.sUNl8GyJOWe.w56REEPMyBXWjHPc3bQECElrnN6QeMO', NULL, '2018-02-07 12:09:58', '2018-02-07 12:11:10'),
(184, NULL, 'muhib', 'Rahman', NULL, 'MUHIB.pdf', 'muhib', 'muhibunique758@gmail.com', '01704609454', NULL, NULL, 'symphony', 'Emi supervision', NULL, NULL, '$2y$10$0gtor2TBRWxUyU57jhPakuNtnh2ZC62jLOXVY1CEty4.4/rHc6R6q', NULL, '2018-02-07 12:16:20', '2018-02-07 12:17:12'),
(185, NULL, 'Prodip', 'Sarker', '1508523140147.jpg', 'Curriculum Vitae(prodip) final.pdf', 'Prodip', 's.prodi247@gmail.com', '01670470375', 'Bachelor of Business Administration', 'Ahsanullah University of Science and Technology', 'no', 'no', NULL, NULL, '$2y$10$WvUNlzHTGFzBU7NR1F6EleFwf8HuMAUyx8hfo3fUWBK6nMsm/fI6u', NULL, '2018-02-07 12:50:52', '2018-02-07 12:57:45'),
(186, NULL, 'MD. ARIFUR', 'RAHMAN', NULL, NULL, 'sajib0921', 'sajib0921@gmail.com', '01674466185', NULL, NULL, 'Fair Distribution Ltd (fdl)', 'SEC ( Samsung Experience Consultants )', NULL, NULL, '$2y$10$0QK7ZPbmkM7OW9/u0O0bWevYwrOpyVqGEygx5UvyvHDkOvjwTG.OW', NULL, '2018-02-07 12:57:53', '2018-02-07 12:57:53'),
(187, NULL, 'Soumen Kumar', 'Sarkar', 'soumen 300.jpg', 'Soumen CV.docx', 'soumenkajol', 'soumen01.2016@gmail.com', '01718336381', 'BBA in Accounting', 'Natoinal University', 'Borendro Radio', 'R. J.', NULL, '2', '$2y$10$O/64ARwq14Ovsljk0PoOA./wJKOXw6S9u7r8Ict2zO.87jAP7viIe', NULL, '2018-02-07 13:13:57', '2018-02-07 13:17:44'),
(188, NULL, 'MD.MOSADDEK', 'HOSSAIN', NULL, 'Mosaddek_Cv.pdf', 'mosaddek', 'mosaddekru@gmail.com', '+8801918474975', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$g3ufHrtu4aREHebK4imPvewYYx0D5n5/6t27kSiYrfgzWBj5mku4a', NULL, '2018-02-07 19:18:56', '2018-02-07 19:20:50'),
(189, NULL, 'Md. Moyen', 'Uddin', NULL, 'Moyen cv  for Accounting.pdf', 'md_moyen_uddin', 'moyenu94@gmail.com', '01744982344', 'B.B.A in Accounting', 'National University', 'Royal Express Logistics', 'Accounts', 'April 2017 - November 2017', NULL, '$2y$10$gYEAX0c8auTpYXBIAUeduubw/cv1Mueqy4c4lxHtkI.FOSgunjgTC', NULL, '2018-02-07 19:38:32', '2018-02-07 19:45:55'),
(190, NULL, 'Md. Mahmudur', 'Rahman', NULL, 'Resume of Md. Mahmudur Rahman....pdf', 'mdmahmudurrahman41', 'mdmahmudurrahman41@gmail.com', '01715113365', NULL, NULL, 'none', 'none', NULL, NULL, '$2y$10$mFS5RGal2IX9TuMlV0lwI.qgo.prXOrrIpPB/O9Su6uUvsk3cBMXe', 'Rya7a15QuZnAPE7WJSmxG535wjFOyolDxYbluf3qLyfXVIFrHphO8rAuUdPd', '2018-02-08 01:07:49', '2018-02-08 01:08:50'),
(191, NULL, 'Mohammad Sajid', 'Hasan', NULL, 'Mohammad Sajid Hasan.pdf', 'msajidzhd', 'msajidzhd@gmail.com', '01670234049', NULL, NULL, 'Na', 'Na', NULL, NULL, '$2y$10$fPNtUDbFKX8CJn8qNc6Qxuhxu5j3UFxOIS0vQSda9cPnw9zJATD2.', 'Q8WER2YYvc93JiP9r5h55vuB7FnYXuNcDFhcFoL2jmfjgoYGPWFCtR7tD6o0', '2018-02-08 01:31:09', '2018-02-08 01:33:03'),
(192, NULL, 'Fatema tuz', 'Zohra', NULL, 'Fatema cv (2).docx', 'Promi', 'promipearl@gmail.com', '01680394802', NULL, NULL, 'Not employed', 'Student of MBA', NULL, NULL, '$2y$10$Rxk1eJLncLCAVImODvf0P.odttKhYZSaInGPEoCDkvHHsHNrOD8V.', NULL, '2018-02-08 07:43:17', '2018-02-08 07:44:00'),
(193, NULL, 'Samsun', 'Nahar', NULL, NULL, 'Samsun ronu', 'nahar9308@gmail.com', '01843999026', NULL, NULL, 'Study on going', 'No', NULL, NULL, '$2y$10$dNQMQiZ5rE0ZemgTQUIpa.u4RKBKglT0rFtIFq1epP6d1LqQWz/8i', NULL, '2018-02-08 07:47:31', '2018-02-08 07:47:31'),
(194, NULL, 'Shahin', 'Aktar', NULL, 'new CV.docx', 'shahinakter663@gmail.com', 'shahinakter663@gmail.com', '01676632615', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$t0su1LMACgGw3eM08QVPKuAgNlbWqHZHyGIdOiloPrizZ2bjRCpt6', NULL, '2018-02-08 08:19:56', '2018-02-08 08:20:56'),
(195, NULL, 'Kamrul', 'Hasan', 'aaaaa.jpg', 'Kamrul Hasan (CV).pdf', 'Kamrul_14', 'kamrulrobinhasan7@gmail.com', '01515612724', 'Bachelor of Business Administration (BBA)', 'Eastern University', 'n/a', 'n/a', NULL, NULL, '$2y$10$Y04ZAC9F6IH7RwLsRCwBMOSs6OIIOXmYE1wok7kcjCUm6CiIKzcYy', NULL, '2018-02-08 09:36:41', '2018-02-08 09:41:47'),
(196, NULL, 'Sharmin', 'Rahman', NULL, NULL, 'tuly', 'fatema@dropndot.com', '01778981502', NULL, NULL, 'N/A', 'N/A', NULL, NULL, '$2y$10$YHhu6F8XfC1LiB38n5NGJ.D3kjp0hum9hvdhLU0wqji3fbx4aD5zm', 'Zt6ZP0afjqK9WH650IWT8Ye1jBv0gYX4FXoPbZi1jyFAqkuk1w0SNWv2OJao', '2018-02-08 10:59:21', '2018-02-08 10:59:21'),
(197, NULL, 'Tabasmum', 'Azam', NULL, 'Tabasmum_Azam_pdf', 'Tabs', 'tabasmumazam@gmail.com', '01722634987', NULL, NULL, 'Alliant LTD.', 'Pr assistant', NULL, NULL, '$2y$10$RE8OZGmDoO38MY7dzZGfD.cXlfheMuXqHfWyeE98frSiqsoVx/DT.', NULL, '2018-02-08 11:23:52', '2018-02-08 11:25:03'),
(198, NULL, 'Muhammad', 'Shahid Ullah', NULL, 'Shahid CV.docx', 'shahidjnu150', 'ssshahidjnu150@gmail.com', '01914041110', NULL, NULL, 'Prime Bank Limited', 'Intern', NULL, NULL, '$2y$10$1WZLdPE.vKbwAcaFI9RqMurnpkk2dM3ZJ2PMDJv4Clua0LbNfSf.2', NULL, '2018-02-10 07:30:17', '2018-02-10 07:36:33'),
(199, NULL, 'Md.Saiful Islam', 'Siblu', 'received_823051837797428.jpeg', 'cv with Hassan and brothers picture.docx', 'siblu034', 'siblu034@gmail.com', '+8801834540354', 'B.B.S', 'National University', 'Hassan & Brothers Ltd.', 'Project Accounts officer', '2 yrs', '4.5', '$2y$10$TYe2JQpJEVQNg3VRgZurfOT1KJD/k5c0ob2ZIiTXrTEzKIOvXypxW', NULL, '2018-02-11 05:40:14', '2018-02-11 05:47:22'),
(200, NULL, 'Mehnaz', 'Chowdhury', NULL, 'Mehnaz Chowdhury _CV.doc', 'Mehnaz', 'mehnazchowdury.ewu@gmail.com', '01689737610', NULL, NULL, 'No', 'no', NULL, NULL, '$2y$10$VRqNVK4i2JvQlL3YrfnSA.mLk6Z.fYgG9GNFvPwyTALy8I.3qCBRW', NULL, '2018-02-11 07:50:11', '2018-02-11 07:51:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
