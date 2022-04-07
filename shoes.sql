-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2022 at 10:34 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(35, 1, 'Ravat', 'K.', 'ravatjit777@gmail.com', '09773020756', 'Satimal patel Faliyu Ta:vansda Dist:navsari', 396051, '0', '2022-04-01 03:52:47', '2022-04-01 03:52:47'),
(38, 7, 'Ravat', 'Jitendra', 'ravatjit777@gmail.com', '09773020756', 'Satimal patel Faliyu Ta:vansda Dist:navsari', 396051, '0', '2022-04-05 07:53:21', '2022-04-05 07:53:21'),
(33, 1, 'PATEL', 'DIPAKBHAI', 'zinal.patel1920@gmail.com', '07990765913', 'Chanod Vapi', 396195, '0', '2022-04-01 02:28:31', '2022-04-04 10:42:23'),
(37, 1, 'Ravat', 'Kamleshbhai', 'ravatjit777@gmail.com', '07990883536', '397 Patel Faliyu Satimal\r\nTa:Vansda Dist:Navsari', 396051, '0', '2022-04-01 05:43:06', '2022-04-01 05:43:06'),
(36, 1, 'Ravat', 'Kamleshbhai', 'ravatjit777@gmail.com', '07990883536', '397 \nTa:Vansda Dist:Navsari', 396051, '0', '2022-04-01 05:40:30', '2022-04-04 10:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adidas', 'Y', '2022-01-18 02:04:55', '2022-03-26 06:14:13'),
(3, 1, 'Puma', 'Y', '2022-01-18 02:06:31', '2022-03-27 22:56:13'),
(4, 1, 'bata', 'N', '2022-01-18 02:06:31', '2022-03-26 06:13:59'),
(28, 1, 'nike', 'Y', '2022-02-05 02:34:46', '2022-03-01 22:06:37'),
(10, 1, 'peragon', 'Y', '2022-02-03 05:09:00', '2022-02-03 05:16:04'),
(6, 1, 'VKC', 'Y', '2022-01-30 01:03:31', '2022-03-15 06:29:41'),
(7, 1, 'POLO', 'Y', '2022-01-30 01:04:40', '2022-02-08 05:42:08'),
(31, 1, 'brnad', 'Y', '2022-03-26 05:35:21', '2022-03-26 05:35:21'),
(32, 1, 'adfdf', 'T', '2022-03-26 06:03:06', '2022-03-27 09:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(251, 93, 1, 1, '2022-04-07 05:24:20', NULL),
(236, 91, 13, 1, '2022-04-02 06:39:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `fk_color` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(157, 1, 'darkpink', 'Y', '2022-02-03 04:40:50', '2022-03-27 22:58:50'),
(2, 1, 'green', 'Y', '2022-01-18 02:08:06', '2022-03-26 05:02:18'),
(3, 7, 'blue', 'Y', '2022-01-18 02:08:06', '2022-02-24 22:08:35'),
(150, 7, 'bluesky', 'Y', '2022-01-27 23:18:39', '2022-03-26 04:52:20'),
(151, 1, 'gold', 'Y', '2022-01-28 00:27:41', '2022-02-03 05:03:52'),
(145, 1, 'silver', 'Y', '2022-01-27 03:00:50', '2022-02-24 02:09:55'),
(154, 7, 'darkblue', 'N', '2022-02-02 04:25:19', '2022-02-24 22:29:52'),
(143, 1, 'aqua', 'Y', '2022-01-27 02:58:27', '2022-02-11 04:41:12'),
(160, 7, 'lightgreen', 'Y', '2022-02-04 00:46:31', '2022-02-04 02:19:55'),
(166, 1, 'skyblue', 'Y', '2022-02-17 07:32:27', '2022-03-07 06:59:14'),
(170, 1, 'Black', 'Y', '2022-03-23 06:46:57', '2022-03-23 06:46:57'),
(171, 1, 'dlfd', 'T', '2022-03-26 05:07:55', '2022-03-27 09:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_price` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(52, 71, 11, 1, 2499, '2022-04-01 07:38:46', '2022-04-01 07:38:46'),
(53, 71, 4, 1, 2999, '2022-04-01 07:38:46', '2022-04-01 07:38:46'),
(54, 72, 4, 5, 14995, '2022-04-01 07:43:28', '2022-04-01 07:43:28'),
(55, 73, 4, 5, 14995, '2022-04-01 07:48:48', '2022-04-01 07:48:48'),
(56, 74, 1, 1, 2300, '2022-04-01 12:06:28', '2022-04-01 12:06:28'),
(57, 74, 4, 3, 8997, '2022-04-01 12:06:28', '2022-04-01 12:06:28'),
(58, 75, 91, 1, 8999, '2022-04-01 13:18:31', '2022-04-01 13:18:31'),
(59, 75, 2, 2, 2798, '2022-04-01 13:18:31', '2022-04-01 13:18:31'),
(60, 76, 1, 4, 9200, '2022-04-05 04:10:37', '2022-04-05 04:10:37'),
(61, 76, 9, 1, 500, '2022-04-05 04:10:37', '2022-04-05 04:10:37'),
(62, 76, 4, 1, 2999, '2022-04-05 04:10:37', '2022-04-05 04:10:37'),
(63, 76, 3, 2, 48000, '2022-04-05 04:10:37', '2022-04-05 04:10:37'),
(64, 77, 4, 5, 14995, '2022-04-05 13:23:40', '2022-04-05 13:23:40'),
(65, 77, 8, 3, 5997, '2022-04-05 13:23:40', '2022-04-05 13:23:40'),
(66, 79, 3, 1, 24000, '2022-04-05 16:00:20', '2022-04-05 16:00:20'),
(67, 79, 2, 1, 1399, '2022-04-05 16:00:20', '2022-04-05 16:00:20'),
(68, 80, 3, 1, 24000, '2022-04-06 08:20:34', '2022-04-06 08:20:34'),
(69, 80, 2, 2, 2798, '2022-04-06 08:20:34', '2022-04-06 08:20:34'),
(70, 80, 10, 1, 730, '2022-04-06 08:20:34', '2022-04-06 08:20:34'),
(71, 80, 9, 1, 500, '2022-04-06 08:20:34', '2022-04-06 08:20:34'),
(72, 81, 93, 1, 3499, '2022-04-07 10:05:15', '2022-04-07 10:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `shipping_id` int NOT NULL,
  `billing_id` int NOT NULL,
  `payment_id` int NOT NULL DEFAULT '0',
  `total_price` int NOT NULL,
  `quantity` int NOT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Order in Process',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `billing_id`, `payment_id`, `total_price`, `quantity`, `order_status`, `created_at`, `updated_at`) VALUES
(74, 1, 37, 33, 1, 11297, 4, 'On the Way', '2022-04-01 06:36:27', '2022-04-06 22:48:02'),
(75, 1, 33, 36, 16, 11797, 3, 'On The Way', '2022-04-01 07:48:31', '2022-04-06 09:59:07'),
(76, 1, 36, 36, 22, 60699, 8, 'Success', '2022-04-04 22:40:37', '2022-04-06 09:59:18'),
(77, 7, 38, 38, 24, 20992, 8, 'Order in Process', '2022-04-05 07:53:40', '2022-04-06 09:56:12'),
(78, 7, 38, 38, 26, 25399, 2, 'On The Way', '2022-04-05 10:29:22', '2022-04-06 09:59:58'),
(79, 7, 38, 38, 26, 25399, 2, 'Order in Process', '2022-04-05 10:30:20', '2022-04-05 10:30:20'),
(80, 1, 36, 36, 27, 27528, 4, 'On the Way', '2022-04-06 02:50:34', '2022-04-06 05:28:32'),
(81, 7, 38, 38, 28, 3499, 1, 'On the Way', '2022-04-07 04:35:14', '2022-04-07 04:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mitalichavdhari@gmail.com', '$2y$10$uFY9y2xRbjvAU11ptNpN3OGGjx6AHLj0KQo4ElW1Cz97GTsbjpJ4G', '2022-01-31 09:48:24'),
('ravatjit777@gmail.com', '$2y$10$RiVlrS4QviDXNbiMjGKmUuhkX310ondOkxPCX4YI183nG1mdc8gEO', '2022-03-15 03:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `first_name`, `last_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ravat', 'K.', '1', '2022-04-01 03:52:57', '2022-04-01 03:52:57'),
(23, 1, 'Ravat', 'Kamleshbhai', '1', '2022-04-05 06:33:50', '2022-04-05 06:33:50'),
(3, 1, 'Ravat', 'Kamleshbhai', '1', '2022-04-01 05:43:11', '2022-04-01 05:43:11'),
(22, 1, 'Ravat', 'Kamleshbhai', '1', '2022-04-04 22:38:34', '2022-04-04 22:38:34'),
(28, 7, 'Ravat', 'Jitendra', '1', '2022-04-07 04:35:10', '2022-04-07 04:35:10'),
(16, 1, 'PATEL', 'DIPAKBHAI', '1', '2022-04-01 06:28:43', '2022-04-01 06:28:43'),
(27, 1, 'Ravat', 'Kamleshbhai', '1', '2022-04-06 02:50:13', '2022-04-06 02:50:13'),
(26, 7, 'Ravat', 'Jitendra', '1', '2022-04-05 10:28:57', '2022-04-05 10:28:57'),
(25, 7, 'Ravat', 'Jitendra', '1', '2022-04-05 10:22:42', '2022-04-05 10:22:42'),
(24, 7, 'Ravat', 'Jitendra', '1', '2022-04-05 07:53:35', '2022-04-05 07:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

DROP TABLE IF EXISTS `productimages`;
CREATE TABLE IF NOT EXISTS `productimages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sort` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `images`, `sort`, `created_at`, `updated_at`) VALUES
(112, 1, '1_1649268751.png', 2, '2022-02-21 23:20:06', '2022-04-06 12:42:31'),
(127, 2, '1_1645520355.png', 1, '2022-02-22 03:29:15', '2022-02-23 03:59:16'),
(136, 88, '987654321123_s6.jpg', 1, '2022-02-23 06:58:53', NULL),
(137, 89, '152452136515_s3.jpg', 1, '2022-02-23 07:30:00', NULL),
(138, 9, '9_1646052391.png', 2, '2022-02-28 07:16:31', '2022-02-28 07:16:31'),
(139, 9, '9_1646052424.png', 3, '2022-02-28 07:17:04', '2022-02-28 07:17:04'),
(140, 90, '111111111112_a2.jpg', 1, '2022-03-02 12:24:27', NULL),
(141, 90, '111111111112_a3.jpg', 2, '2022-03-02 12:24:27', NULL),
(142, 90, '111111111112_a4.jpg', 3, '2022-03-02 12:24:27', NULL),
(150, 8, '8_1646224436.png', 2, '2022-03-02 07:03:56', '2022-03-02 07:03:56'),
(151, 8, '8_1646224471.png', 3, '2022-03-02 07:04:31', '2022-03-02 07:04:31'),
(20, 10, 's9.jpg', 8, '2022-02-09 07:39:17', '2022-02-17 07:23:27'),
(128, 3, '3_1645594675.png', 1, '2022-02-23 04:00:19', '2022-02-23 00:07:55'),
(129, 4, '4_1649269145.png', 1, '2022-02-23 04:00:19', '2022-04-06 12:49:05'),
(130, 8, '8_1646224552.png', 1, '2022-02-23 04:00:19', '2022-03-02 07:05:52'),
(14, 9, 's5.jpg', 1, '2022-02-09 07:24:46', '2022-02-17 07:23:27'),
(15, 11, 's4.jpg', 2, '2022-02-09 07:24:46', '2022-02-23 04:22:07'),
(16, 63, 's3.jpg', 3, '2022-02-09 07:24:46', '2022-02-23 04:12:43'),
(17, 3, 's2.jpg', 1, '2022-02-09 07:36:58', '2022-02-17 07:23:27'),
(135, 87, '123456789123_s3.jpg', 2, '2022-02-23 06:27:50', NULL),
(133, 1, '1_1649268764.png', 1, '2022-02-23 00:54:03', '2022-04-06 12:42:44'),
(134, 87, '123456789123_s5.jpg', 1, '2022-02-23 06:27:50', NULL),
(145, 91, '111111111113_d2.jpg', 1, '2022-03-02 12:27:10', NULL),
(146, 91, '111111111113_d3.jpg', 2, '2022-03-02 12:27:10', NULL),
(147, 91, '111111111113_d4.jpg', 3, '2022-03-02 12:27:10', NULL),
(148, 91, '111111111113_d5.jpg', 4, '2022-03-02 12:27:10', NULL),
(149, 91, '111111111113_d6.jpg', 5, '2022-03-02 12:27:10', NULL),
(153, 8, '8_1646224751.png', 4, '2022-03-02 07:09:11', '2022-03-02 07:09:11'),
(157, 92, '152452136555_q3.jpg', 1, '2022-04-06 17:55:21', NULL),
(156, 1, '1_1649268776.png', 4, '2022-04-03 00:49:10', '2022-04-06 12:42:56'),
(158, 92, '152452136555_q4.jpg', 2, '2022-04-06 17:55:21', NULL),
(159, 92, '152452136555_q2.jpg', 3, '2022-04-06 17:55:21', NULL),
(161, 93, '152452136519_e3.jpg', 2, '2022-04-06 17:59:43', NULL),
(162, 94, '152452199999_r5.jpg', 1, '2022-04-06 18:03:54', NULL),
(163, 94, '152452199999_r2.jpg', 2, '2022-04-06 18:03:54', NULL),
(164, 94, '152452199999_r3.jpg', 3, '2022-04-06 18:03:54', NULL),
(165, 94, '152452199999_r4.jpg', 4, '2022-04-06 18:03:54', NULL),
(166, 95, '555452136515_z2.jpg', 2, '2022-04-06 18:08:39', NULL),
(167, 95, '555452136515_z3.jpg', 1, '2022-04-06 18:08:39', NULL),
(168, 95, '555452136515_z4.jpg', 3, '2022-04-06 18:08:39', NULL),
(169, 95, '555452136515_z5.jpg', 4, '2022-04-06 18:08:39', NULL),
(170, 95, '555452136515_z6.jpg', 5, '2022-04-06 18:08:39', NULL),
(171, 4, '4_1649269297.png', 2, '2022-04-06 12:51:37', '2022-04-06 12:51:37'),
(172, 4, '4_1649269317.png', 3, '2022-04-06 12:51:57', '2022-04-06 12:51:57'),
(173, 4, '4_1649269336.png', 4, '2022-04-06 12:52:16', '2022-04-06 12:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idealfor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `upc` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stock` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `color_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y',
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `upc` (`upc`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `idealfor`, `upc`, `url`, `size`, `price`, `stock`, `user_id`, `color_id`, `brand_id`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'lowa men 45', 'Child', '123456789612', 'lowa-men-45', '7', '2300', '45', 1, 3, 3, 'good quality', 'Y', '1649269060.webp', '2022-02-03 12:07:38', '2022-04-07 04:31:56'),
(2, 'PROVOGUE', 'Men', '856947142536', 'provogue-', '8', '1399', '40', 1, 154, 10, 'Sneakers For Men  (Black)', 'Y', 'men.jpg', '2022-02-06 10:16:02', '2022-04-06 02:50:34'),
(3, 'Ryzon_34', 'Women', '362514475869', 'ryzon_34', '6', '24000', '246', 1, 3, 7, 'Women Blue Casual Sandal', 'Y', 'women.jpeg', '2022-02-06 10:25:31', '2022-04-06 02:50:34'),
(4, 'Velcro Sports Sandals For Boys  Girls  Green', 'Child', '231245569878', 'velcro-sports-sandals-for-boys-girls-green', '4', '2999', '50', 1, 2, 28, NULL, 'Y', '1649269268.webp', '2022-02-06 10:37:32', '2022-04-06 12:53:23'),
(8, 'new shoes', 'Men', '857469362514', 'new-shoes', '12cm', '1999', '42', 1, 2, 4, 'ghgh', 'Y', '1646224402.jpg', '2022-02-06 13:23:35', '2022-04-05 07:53:40'),
(9, 'Women Black Heels Sandal', 'Men', '1524521365', 'women-black-heels-sandal', '8', '500', '122', 1, 150, 3, 'gygg', 'Y', '1644402909.jpg', '2022-02-08 04:53:22', '2022-04-06 02:50:34'),
(10, 'Sneakers For Men  (Navy)', 'Men', '235689784525', 'sneakers-for-men-(navy)', '7', '730', '419', 1, 150, 3, 'Good very comfortable', 'Y', '1644316692.jpg', '2022-02-08 05:08:12', '2022-04-06 02:50:34'),
(11, 'Lace Sneakers For Boys & Girls', 'Child', '1526352415', 'lace-sneakers-for-boys-&-girls', '8c', '2499', '100', 1, 150, 3, 'FEETWELL SHOES', 'Y', '1644317906.jpg', '2022-02-08 05:28:26', '2022-04-06 08:36:24'),
(63, 'Sling Back Wedges For Girls', 'Women', '1001', 'sling-back-wedges-for-girls', 'sd', '1000', '123', 1, 150, 3, 'sdcc', 'T', '1644556758.jpg', '2022-02-10 23:49:18', '2022-03-07 07:11:37'),
(92, 'Stylish Loafers For Men  Black', 'Men', '152452136555', 'stylish-loafers-for-men-black', '7', '1999', '400', 1, 170, 7, 'good Products', 'Y', '1649267720.webp', '2022-04-06 12:25:21', '2022-04-06 12:25:21'),
(90, 'Wedding Wear Shoes For Men', 'Men', '111111111112', 'wedding-wear-shoes-for-men', '8', '9999', '0', 1, 157, 30, 'Wedding Wear Shoes For Men  (Brown)', 'Y', '1646223866.jpg', '2022-03-02 06:54:27', '2022-03-15 08:48:32'),
(91, 'Running Shoes For Men', 'Men', '111111111113', 'running-shoes-for-men', '8', '8999', '1999', 1, 3, 3, 'Running Shoes For Men  (Blue)', 'Y', '1646224030.jpg', '2022-03-02 06:57:10', '2022-04-01 07:48:31'),
(93, 'Best Exclusive Stylish Casual Shoes Sneakers For Men  Black', 'Men', '152452136519', 'best-exclusive-stylish-casual-shoes-sneakers-for-men-black', '9', '3499', '119', 1, 170, 1, NULL, 'Y', '1649269772.webp', '2022-04-06 12:29:43', '2022-04-07 04:35:15'),
(94, 'Black Heels Sandal', 'Women', '152452199999', 'black-heels-sandal', '6', '999', '100', 1, 170, 6, NULL, 'Y', '1649268234.webp', '2022-04-06 12:33:54', '2022-04-06 18:26:38'),
(95, 'Heels Sandal', 'Women', '555452136515', 'heels-sandal', '6', '799', '50', 1, 170, 28, 'Very comfortable , nice looking heels', 'Y', '1649268519.webp', '2022-04-06 12:38:39', '2022-04-06 18:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('A','U') COLLATE utf8mb4_unicode_ci DEFAULT 'U',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phoneno`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jitendra', 'ravat Jitendra', '', 'ravatjit777@gmail.com', NULL, 'A', '$2y$10$zN.8xcEQt9tR3yRPYZNOKOo4WL10DDdi5a6JyEM0L0x.OK5HxsCZK', 'E2t3EW2zNBkMcBYN6XNR5hpTNqbDFEKIaPXrcVfNKl1RDUmxmophx1oWiRda', '2022-01-18 01:12:13', '2022-04-07 10:10:29'),
(7, 'ravat Jitendra', 'phoenix', '1425361524', 'poenix@gmail.com', NULL, 'U', '$2y$10$zN.8xcEQt9tR3yRPYZNOKOo4WL10DDdi5a6JyEM0L0x.OK5HxsCZK', NULL, '2022-01-21 22:06:12', '2022-02-27 05:34:34'),
(13, 'ravat Jitendra', 'hms.northside@gmail.com', '5869471425', 'hms.northside@gmail.com', NULL, 'U', '$2y$10$vDKJa9rRErTAjnIrHkGqk.9LLDUs14f.BAXBz9i2xZ3pKF9gpCCFy', NULL, '2022-02-27 00:06:09', '2022-02-27 00:06:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
