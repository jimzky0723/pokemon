-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 12:43 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `common` int(11) NOT NULL,
  `normal` int(11) NOT NULL,
  `rare` int(11) NOT NULL,
  `epicOrLegendary` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `name`, `common`, `normal`, `rare`, `epicOrLegendary`, `created_at`, `updated_at`) VALUES
(6, 'Pallet Town 1', 19, 0, 0, 0, '2018-09-16 01:57:57', '2018-09-16 01:57:57'),
(7, 'Pallet Town 1', 5, 0, 0, 0, '2018-09-16 01:58:54', '2018-09-16 01:58:54'),
(8, 'Pallet Town 1', 26, 0, 0, 0, '2018-09-16 01:59:14', '2018-09-16 01:59:49'),
(9, 'Pallet Town 1', 24, 0, 0, 0, '2018-09-16 02:56:05', '2018-09-16 02:56:05'),
(10, 'Pallet Town 1', 28, 0, 0, 0, '2018-09-16 03:00:56', '2018-09-16 03:00:56'),
(11, 'Pallet Town 1', 9, 0, 0, 0, '2018-09-16 03:01:49', '2018-09-16 03:01:49'),
(12, 'Pallet Town 2', 26, 0, 0, 0, '2018-09-16 03:03:10', '2018-09-16 03:03:10'),
(13, 'Pallet Town 2', 17, 0, 0, 0, '2018-09-16 03:03:16', '2018-09-16 03:03:16'),
(14, 'Pallet Town 2', 28, 45, 0, 0, '2018-09-16 03:07:46', '2018-09-16 03:07:46'),
(15, 'Pallet Town 2', 5, 41, 0, 0, '2018-09-16 03:07:59', '2018-09-16 03:07:59'),
(16, 'Pallet Town 2', 18, 32, 76, 0, '2018-09-16 03:16:25', '2018-09-16 03:16:25'),
(17, 'Pallet Town 2', 24, 42, 0, 0, '2018-09-16 03:16:43', '2018-09-16 03:16:43'),
(18, 'Pallet Town 2', 19, 46, 0, 0, '2018-09-16 03:17:30', '2018-09-16 03:17:30'),
(19, 'Pallet Town 2', 14, 0, 0, 0, '2018-09-16 03:18:48', '2018-09-16 03:18:48'),
(20, 'Pallet Town 2', 28, 0, 0, 0, '2018-09-16 03:18:53', '2018-09-16 03:18:53'),
(21, 'Memory Waterland 1', 5, 35, 0, 0, '2018-09-16 03:21:16', '2018-09-16 03:21:16'),
(22, 'Memory Waterland 1', 16, 0, 0, 0, '2018-09-16 03:21:34', '2018-09-16 03:21:34'),
(23, 'Memory Waterland 1', 23, 0, 0, 0, '2018-09-16 03:21:39', '2018-09-16 03:21:39'),
(24, 'Memory Waterland 1', 5, 0, 0, 0, '2018-09-16 03:22:00', '2018-09-16 03:22:00'),
(25, 'Memory Waterland 1', 26, 37, 0, 0, '2018-09-16 03:22:12', '2018-09-16 03:22:12'),
(26, 'Memory Waterland 1', 24, 41, 57, 0, '2018-09-16 03:22:45', '2018-09-16 03:22:45'),
(27, 'Memory Waterland 2', 21, 40, 7, 96, '2018-09-16 03:26:03', '2018-09-16 03:26:03'),
(28, 'Memory Waterland 2', 13, 33, 73, 0, '2018-09-16 03:27:55', '2018-09-16 03:27:55'),
(29, 'Memory Waterland 2', 16, 40, 69, 0, '2018-09-16 03:28:13', '2018-09-16 03:28:13'),
(30, 'Memory Waterland 2', 3, 0, 0, 0, '2018-09-16 03:28:37', '2018-09-16 03:28:37'),
(31, 'Memory Waterland 2', 15, 0, 0, 0, '2018-09-16 03:28:43', '2018-09-16 03:28:43'),
(32, 'Memory Waterland 2', 5, 41, 0, 0, '2018-09-16 03:28:54', '2018-09-16 03:28:54'),
(33, 'Viridian City', 21, 38, 0, 0, '2018-09-16 03:32:39', '2018-09-16 03:32:39'),
(34, 'Viridian City', 23, 0, 0, 0, '2018-09-16 03:32:48', '2018-09-16 03:32:48'),
(35, 'Viridian City', 5, 0, 0, 0, '2018-09-16 03:32:53', '2018-09-16 03:32:53'),
(36, 'Viridian City', 15, 31, 0, 0, '2018-09-16 03:33:18', '2018-09-16 03:33:18'),
(37, 'Viridian City', 28, 37, 66, 0, '2018-09-16 03:33:35', '2018-09-16 03:33:35'),
(38, 'Viridian City', 23, 41, 0, 0, '2018-09-16 03:33:53', '2018-09-16 03:33:53'),
(39, 'Viridian City', 23, 34, 78, 12, '2018-09-16 03:34:18', '2018-09-16 03:34:18'),
(40, 'New Viridian Forest 1', 15, 34, 71, 89, '2018-09-16 03:36:10', '2018-09-16 03:36:10'),
(41, 'New Viridian Forest 1', 25, 35, 51, 0, '2018-09-16 03:36:29', '2018-09-16 03:36:29'),
(42, 'New Viridian Forest 1', 9, 29, 68, 0, '2018-09-16 03:37:03', '2018-09-16 03:37:03'),
(43, 'New Viridian Forest 1', 19, 34, 0, 0, '2018-09-16 03:37:14', '2018-09-16 03:37:14'),
(44, 'New Viridian Forest 1', 20, 37, 72, 0, '2018-09-16 03:37:35', '2018-09-16 03:37:35'),
(45, 'New Viridian Forest 1', 13, 34, 0, 0, '2018-09-16 03:37:59', '2018-09-16 03:37:59'),
(46, 'New Viridian Forest 2', 17, 31, 72, 0, '2018-09-16 03:38:41', '2018-09-16 03:38:41'),
(47, 'New Viridian Forest 2', 26, 32, 0, 0, '2018-09-16 03:38:54', '2018-09-16 03:38:54'),
(48, 'New Viridian Forest 2', 27, 45, 74, 0, '2018-09-16 03:39:17', '2018-09-16 03:39:17'),
(49, 'New Viridian Forest 2', 25, 42, 66, 93, '2018-09-16 03:39:32', '2018-09-16 03:39:32'),
(50, 'New Viridian Forest 2', 9, 40, 0, 0, '2018-09-16 03:39:49', '2018-09-16 03:39:49'),
(51, 'Teakwood Forest 1', 17, 45, 60, 0, '2018-09-16 03:40:41', '2018-09-16 03:40:41'),
(52, 'Teakwood Forest 1', 25, 31, 63, 0, '2018-09-16 03:40:56', '2018-09-16 03:40:56'),
(53, 'Teakwood Forest 1', 15, 32, 78, 12, '2018-09-16 03:41:17', '2018-09-16 03:41:17'),
(54, 'Teakwood Forest 1', 3, 33, 70, 0, '2018-09-16 03:41:55', '2018-09-16 03:41:55'),
(55, 'Teakwood Forest 1', 16, 46, 62, 0, '2018-09-16 03:42:28', '2018-09-16 03:42:28'),
(56, 'Teakwood Forest 2', 21, 39, 59, 0, '2018-09-16 03:43:08', '2018-09-16 03:43:08'),
(57, 'Teakwood Forest 2', 24, 40, 52, 0, '2018-09-16 03:43:24', '2018-09-16 03:43:24'),
(58, 'Teakwood Forest 2', 5, 39, 73, 99, '2018-09-16 03:43:46', '2018-09-16 03:43:46'),
(59, 'Teakwood Forest 2', 23, 37, 68, 2, '2018-09-16 03:44:11', '2018-09-16 03:44:11'),
(60, 'Teakwood Forest 2', 18, 41, 7, 0, '2018-09-16 03:44:41', '2018-09-16 03:44:41'),
(61, 'Cream Jokul 1', 17, 42, 77, 0, '2018-09-16 03:45:22', '2018-09-16 03:45:22'),
(62, 'Cream Jokul 1', 18, 43, 64, 0, '2018-09-16 03:45:50', '2018-09-16 03:45:50'),
(63, 'Cream Jokul 1', 19, 36, 52, 94, '2018-09-16 03:46:13', '2018-09-16 03:46:13'),
(64, 'Cream Jokul 1', 15, 37, 54, 0, '2018-09-16 03:46:30', '2018-09-16 03:46:30'),
(65, 'Cream Jokul 2', 18, 32, 76, 0, '2018-09-16 03:47:10', '2018-09-16 03:47:10'),
(66, 'Cream Jokul 2', 17, 39, 55, 121, '2018-09-16 03:47:30', '2018-09-16 03:47:30'),
(67, 'Cream Jokul 2', 21, 41, 7, 0, '2018-09-16 03:47:46', '2018-09-16 03:47:46'),
(68, 'Cream Jokul 2', 15, 43, 63, 96, '2018-09-16 03:48:04', '2018-09-16 03:48:04'),
(69, 'Cream Jokul 2', 28, 45, 63, 0, '2018-09-16 03:48:24', '2018-09-16 03:48:24'),
(70, 'Cream Jokul 2', 25, 38, 76, 0, '2018-09-16 03:48:40', '2018-09-16 03:48:40'),
(71, 'Frozen Ice Lake 1', 25, 33, 65, 0, '2018-09-16 03:50:27', '2018-09-16 03:50:27'),
(72, 'Frozen Ice Lake 1', 28, 43, 49, 0, '2018-09-16 03:50:41', '2018-09-16 03:50:41'),
(73, 'Frozen Ice Lake 1', 14, 39, 55, 0, '2018-09-16 03:51:07', '2018-09-16 03:51:07'),
(74, 'Frozen Ice Lake 1', 5, 37, 61, 0, '2018-09-16 03:51:22', '2018-09-16 03:51:22'),
(75, 'Frozen Ice Lake 2', 17, 43, 51, 0, '2018-09-16 03:57:29', '2018-09-16 03:57:29'),
(76, 'Frozen Ice Lake 2', 26, 1, 76, 0, '2018-09-16 03:57:46', '2018-09-16 03:57:46'),
(77, 'Frozen Ice Lake 2', 20, 35, 50, 134, '2018-09-16 03:58:18', '2018-09-16 03:58:18'),
(78, 'Frozen Ice Lake 2', 14, 1, 53, 0, '2018-09-16 04:00:12', '2018-09-16 04:00:12'),
(79, 'Frozen Ice Lake 2', 24, 36, 62, 0, '2018-09-16 04:00:33', '2018-09-16 04:00:33'),
(80, 'Frozen Ice Lake 2', 25, 41, 53, 97, '2018-09-16 04:01:02', '2018-09-16 04:01:02'),
(81, 'Wave Sea Route', 25, 0, 0, 0, '2018-09-16 04:05:07', '2018-09-16 04:05:07'),
(82, 'Wave Sea Route', 21, 0, 0, 0, '2018-09-16 04:05:15', '2018-09-16 04:05:15'),
(83, 'Wave Sea Route', 27, 38, 75, 0, '2018-09-16 04:05:40', '2018-09-16 04:05:40'),
(84, 'Wave Sea Route', 24, 32, 48, 0, '2018-09-16 04:38:58', '2018-09-16 04:38:58'),
(85, 'Wave Sea Route', 15, 30, 48, 101, '2018-09-16 04:39:42', '2018-09-16 04:41:02'),
(86, 'Wave Sea Route', 21, 35, 60, 0, '2018-09-16 04:41:26', '2018-09-16 04:41:26'),
(87, 'Wave Sea Route', 13, 29, 68, 0, '2018-09-16 04:41:50', '2018-09-16 04:41:50'),
(88, 'Wave Sea Route', 19, 46, 7, 0, '2018-09-16 04:42:13', '2018-09-16 04:42:13'),
(89, 'Wave Sea Route', 17, 1, 10, 95, '2018-09-16 04:42:35', '2018-09-16 04:42:35'),
(90, 'Wave Sea Route', 16, 43, 7, 126, '2018-09-16 04:43:13', '2018-09-16 04:43:13'),
(91, 'Wave Sea Route', 20, 29, 56, 0, '2018-09-16 04:43:34', '2018-09-16 04:43:34'),
(92, 'Ardor Bay', 9, 30, 75, 87, '2018-09-16 04:44:25', '2018-09-16 04:44:25'),
(93, 'Ardor Bay', 20, 46, 54, 0, '2018-09-16 04:44:42', '2018-09-16 04:44:42'),
(94, 'Ardor Bay', 25, 42, 53, 0, '2018-09-16 04:45:05', '2018-09-16 04:45:05'),
(95, 'Ardor Bay', 3, 30, 51, 0, '2018-09-16 04:45:26', '2018-09-16 04:45:26'),
(96, 'Ardor Bay', 14, 30, 77, 88, '2018-09-16 04:45:53', '2018-09-16 04:45:53'),
(97, 'Ardor Bay', 9, 37, 74, 0, '2018-09-16 04:46:11', '2018-09-16 04:46:11'),
(98, 'Ardor Bay', 19, 46, 72, 122, '2018-09-16 04:46:35', '2018-09-16 04:46:35'),
(99, 'Ardor Bay', 21, 39, 69, 0, '2018-09-16 04:46:52', '2018-09-16 04:46:52'),
(100, 'Ardor Bay', 26, 1, 48, 0, '2018-09-16 04:47:26', '2018-09-16 04:47:26'),
(101, 'Ardor Bay', 21, 39, 55, 0, '2018-09-16 04:47:39', '2018-09-16 04:47:39'),
(102, 'God Mountains 1', 21, 39, 71, 6, '2018-09-16 04:49:34', '2018-09-16 04:49:34'),
(103, 'God Mountains 1', 27, 38, 49, 0, '2018-09-16 04:49:53', '2018-09-16 04:49:53'),
(104, 'God Mountains 1', 23, 31, 50, 0, '2018-09-16 04:50:19', '2018-09-16 04:50:19'),
(105, 'God Mountains 1', 19, 36, 61, 0, '2018-09-16 04:51:00', '2018-09-16 04:51:00'),
(106, 'God Mountains 2', 21, 39, 0, 0, '2018-09-16 04:51:35', '2018-09-16 04:51:35'),
(107, 'God Mountains 2', 25, 38, 74, 125, '2018-09-16 04:51:52', '2018-09-16 04:51:52'),
(108, 'God Mountains 2', 5, 30, 75, 0, '2018-09-16 04:52:12', '2018-09-16 04:52:12'),
(109, 'Crown Road 1', 14, 37, 68, 0, '2018-09-16 04:52:45', '2018-09-16 04:54:11'),
(110, 'Crown Road 1', 9, 39, 59, 100, '2018-09-16 04:53:09', '2018-09-16 04:54:19'),
(111, 'Crown Road 1', 21, 36, 52, 0, '2018-09-16 04:53:31', '2018-09-16 04:54:24'),
(112, 'Crown Road 1', 14, 29, 54, 0, '2018-09-16 04:53:50', '2018-09-16 04:54:28'),
(113, 'Crown Road 2', 9, 1, 10, 0, '2018-09-16 04:56:24', '2018-09-16 04:56:24'),
(114, 'Crown Road 2', 24, 40, 70, 0, '2018-09-16 04:56:43', '2018-09-16 04:56:43'),
(115, 'Crown Road 2', 18, 35, 69, 84, '2018-09-16 04:57:11', '2018-09-16 04:57:11'),
(116, 'Crown Road 2', 26, 35, 58, 0, '2018-09-16 04:57:34', '2018-09-16 04:57:34'),
(117, 'Crown Road 2', 28, 30, 79, 131, '2018-09-16 04:57:57', '2018-09-16 04:57:57'),
(118, 'Crown Road 2', 9, 39, 75, 0, '2018-09-16 04:58:16', '2018-09-16 04:58:16'),
(119, 'Mirage Desert', 18, 46, 72, 0, '2018-09-16 04:59:25', '2018-09-16 04:59:25'),
(120, 'Mirage Desert', 17, 31, 71, 0, '2018-09-16 04:59:42', '2018-09-16 04:59:42'),
(121, 'Mirage Desert', 20, 35, 71, 0, '2018-09-16 05:00:00', '2018-09-16 05:00:00'),
(122, 'Mirage Desert', 23, 37, 61, 0, '2018-09-16 05:00:27', '2018-09-16 05:00:27'),
(123, 'Mirage Desert', 28, 33, 76, 91, '2018-09-16 05:00:49', '2018-09-16 05:00:49'),
(124, 'Mirage Desert', 28, 34, 70, 0, '2018-09-16 05:01:19', '2018-09-16 05:01:19'),
(125, 'Mirage Desert', 9, 30, 74, 92, '2018-09-16 05:01:38', '2018-09-16 05:01:38'),
(126, 'Mirage Desert', 25, 41, 7, 135, '2018-09-16 05:02:47', '2018-09-16 05:02:47'),
(127, 'Mirage Desert', 25, 45, 49, 0, '2018-09-16 05:03:01', '2018-09-16 05:03:01'),
(128, 'Moon Plateau 1', 20, 46, 62, 124, '2018-09-16 05:03:52', '2018-09-16 05:03:52'),
(129, 'Moon Plateau 1', 14, 32, 59, 97, '2018-09-16 05:04:16', '2018-09-16 05:04:16'),
(130, 'Moon Plateau 1', 17, 39, 59, 0, '2018-09-16 05:04:37', '2018-09-16 05:04:37'),
(131, 'Moon Plateau 1', 26, 37, 53, 0, '2018-09-16 05:04:51', '2018-09-16 05:04:51'),
(132, 'Moon Plateau 2', 26, 37, 61, 0, '2018-09-16 05:05:38', '2018-09-16 05:05:38'),
(133, 'Moon Plateau 2', 21, 46, 64, 0, '2018-09-16 05:05:54', '2018-09-16 05:05:54'),
(134, 'Moon Plateau 2', 19, 45, 72, 86, '2018-09-16 05:06:14', '2018-09-16 05:06:14'),
(135, 'Moon Plateau 2', 28, 41, 48, 0, '2018-09-16 05:06:29', '2018-09-16 05:06:29'),
(136, 'Moon Plateau 2', 27, 42, 50, 0, '2018-09-16 05:06:51', '2018-09-16 05:06:51'),
(137, 'Moon Plateau 2', 20, 31, 61, 128, '2018-09-16 05:07:10', '2018-09-16 05:07:10'),
(138, 'Wonder Forest 1', 23, 36, 76, 0, '2018-09-16 05:08:06', '2018-09-16 05:08:06'),
(139, 'Wonder Forest 1', 14, 39, 78, 0, '2018-09-16 05:08:25', '2018-09-16 05:08:25'),
(140, 'Wonder Forest 1', 16, 37, 66, 82, '2018-09-16 05:08:55', '2018-09-16 05:08:55'),
(141, 'Wonder Forest 1', 28, 37, 74, 0, '2018-09-16 05:09:13', '2018-09-16 05:09:13'),
(142, 'Wonder Forest 1', 20, 45, 58, 0, '2018-09-16 05:09:30', '2018-09-16 05:09:30'),
(143, 'Wonder Forest 2', 3, 38, 56, 98, '2018-09-16 05:10:43', '2018-09-16 05:10:43'),
(144, 'Wonder Forest 2', 28, 42, 73, 0, '2018-09-16 05:10:59', '2018-09-16 05:10:59'),
(145, 'Wonder Forest 2', 20, 38, 59, 0, '2018-09-16 05:11:16', '2018-09-16 05:11:16'),
(146, 'Wonder Forest 2', 25, 29, 47, 0, '2018-09-16 05:11:38', '2018-09-16 05:11:38'),
(147, 'Wonder Forest 2', 15, 36, 49, 123, '2018-09-16 05:11:57', '2018-09-16 05:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_09_15_104859_create_types_table', 2),
(3, '2018_09_15_120243_create_pokemon_table', 3),
(4, '2018_09_15_120453_create_pokemon_types_table', 3),
(5, '2018_09_16_051918_create_maps_table', 4),
(6, '2018_09_16_152927_create_suggestions_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rarity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id`, `name`, `rarity`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pikachu', 'Normal', 'Pikachu.jpg', '2018-09-15 05:08:18', '2018-09-15 06:23:51'),
(2, 'Lugia', 'Legendary', 'Lugia.jpg', '2018-09-15 05:09:17', '2018-09-15 06:23:30'),
(3, 'Charmander', 'Common', 'Charmander.jpg', '2018-09-15 05:21:52', '2018-09-15 06:23:22'),
(5, 'Squirtle', 'Common', 'Squirtle.jpg', '2018-09-15 05:33:31', '2018-09-15 18:34:26'),
(6, 'Aerodactyl', 'Epic', 'Aerodactyl.jpg', '2018-09-15 05:34:22', '2018-09-15 06:25:07'),
(7, 'Primarina', 'Rare', 'Primarina.jpg', '2018-09-15 05:35:23', '2018-09-15 06:24:01'),
(9, 'Pichu', 'Common', 'Pichu.jpg', '2018-09-15 06:08:04', '2018-09-15 06:23:37'),
(10, 'Raichu', 'Rare', 'Raichu.jpg', '2018-09-15 06:08:52', '2018-09-16 00:35:59'),
(12, 'Entei', 'Epic', 'Entei.jpg', '2018-09-15 21:27:30', '2018-09-16 01:17:59'),
(13, 'Piplup', 'Common', 'Piplup.jpg', '2018-09-15 23:47:30', '2018-09-15 23:47:30'),
(14, 'Chimchar', 'Common', 'Chimchar.jpg', '2018-09-15 23:49:43', '2018-09-15 23:49:43'),
(15, 'Fennekin', 'Common', 'Fennekin.jpg', '2018-09-15 23:51:00', '2018-09-15 23:51:00'),
(16, 'Mudkip', 'Common', 'Mudkip.jpg', '2018-09-15 23:55:05', '2018-09-15 23:55:05'),
(17, 'Pidgeotto', 'Common', 'Pidgeotto.jpg', '2018-09-15 23:57:43', '2018-09-15 23:57:43'),
(18, 'Torchic', 'Common', 'Torchic.jpg', '2018-09-16 00:03:21', '2018-09-16 00:03:21'),
(19, 'Treecko', 'Common', 'Treecko.jpg', '2018-09-16 00:04:01', '2018-09-16 00:04:01'),
(20, 'Bulbasaur', 'Common', 'Bulbasaur.jpg', '2018-09-16 00:04:58', '2018-09-16 00:04:58'),
(21, 'Geodude', 'Common', 'Geodude.jpg', '2018-09-16 00:06:00', '2018-09-16 00:06:59'),
(22, 'Ditto I', 'Common', 'Ditto I.jpg', '2018-09-16 00:09:11', '2018-09-16 00:09:11'),
(23, 'Psyduck', 'Common', 'Psyduck.jpg', '2018-09-16 00:10:37', '2018-09-16 00:10:37'),
(24, 'Meowth', 'Common', 'Meowth.jpg', '2018-09-16 00:11:15', '2018-09-16 00:11:15'),
(25, 'Golbat', 'Common', 'Golbat.jpg', '2018-09-16 00:15:26', '2018-09-16 00:15:26'),
(26, 'Wigglytuff', 'Common', 'Wigglytuff.jpg', '2018-09-16 00:16:11', '2018-09-16 00:16:11'),
(27, 'Clefable', 'Common', 'Clefable.jpg', '2018-09-16 00:17:14', '2018-09-16 00:17:14'),
(28, 'Raticate', 'Common', 'Raticate.jpg', '2018-09-16 00:17:48', '2018-09-16 00:17:48'),
(29, 'Prinplup', 'Normal', 'Prinplup.jpg', '2018-09-16 00:18:22', '2018-09-16 00:18:22'),
(30, 'Monferno', 'Normal', 'Monferno.jpg', '2018-09-16 00:20:11', '2018-09-16 00:20:11'),
(31, 'Beautifly', 'Normal', 'Beautifly.jpg', '2018-09-16 00:21:11', '2018-09-16 00:21:11'),
(32, 'Charmeleon', 'Normal', 'Charmeleon.jpg', '2018-09-16 00:22:35', '2018-09-16 00:22:35'),
(33, 'Combusken', 'Normal', 'Combusken.jpg', '2018-09-16 00:23:26', '2018-09-16 00:23:26'),
(34, 'Ivysaur', 'Normal', 'Ivysaur.jpg', '2018-09-16 00:23:57', '2018-09-16 00:23:57'),
(35, 'Grovyle', 'Normal', 'Grovyle.jpg', '2018-09-16 00:24:38', '2018-09-16 00:24:38'),
(36, 'Magikarp', 'Normal', 'Magikarp.jpg', '2018-09-16 00:25:10', '2018-09-16 00:25:10'),
(37, 'Mr. Mime', 'Normal', 'Mr. Mime.jpg', '2018-09-16 00:25:50', '2018-09-16 00:25:50'),
(38, 'Hitmonchan', 'Normal', 'Hitmonchan.jpg', '2018-09-16 00:27:07', '2018-09-16 00:27:07'),
(39, 'Hitmonlee', 'Normal', 'Hitmonlee.jpg', '2018-09-16 00:27:42', '2018-09-16 00:27:42'),
(40, 'Marshtomp', 'Normal', 'Marshtomp.jpg', '2018-09-16 00:29:01', '2018-09-16 00:29:01'),
(41, 'Wartortle', 'Normal', 'Wartortle.jpg', '2018-09-16 00:30:21', '2018-09-16 00:30:21'),
(42, 'Weezing', 'Normal', 'Weezing.jpg', '2018-09-16 00:30:50', '2018-09-16 00:30:50'),
(43, 'Braixen', 'Normal', 'Braixen.jpg', '2018-09-16 00:31:45', '2018-09-16 00:31:45'),
(44, 'Ditto II', 'Normal', 'Ditto II.jpg', '2018-09-16 00:32:06', '2018-09-16 00:32:06'),
(45, 'Beedrill', 'Normal', 'Beedrill.jpg', '2018-09-16 00:32:53', '2018-09-16 00:32:53'),
(46, 'Butterfree', 'Normal', 'Butterfree.jpg', '2018-09-16 00:33:34', '2018-09-16 00:33:34'),
(47, 'Magmar', 'Rare', 'Magmar.jpg', '2018-09-16 00:34:20', '2018-09-16 00:34:20'),
(48, 'Delphox', 'Rare', 'Delphox.jpg', '2018-09-16 00:35:24', '2018-09-16 00:35:24'),
(49, 'Absol', 'Rare', 'Absol.jpg', '2018-09-16 00:37:14', '2018-09-16 00:37:14'),
(50, 'Claydol', 'Rare', 'Claydol.jpg', '2018-09-16 00:37:50', '2018-09-16 00:37:50'),
(51, 'Incineroar', 'Rare', 'Incineroar.jpg', '2018-09-16 00:39:03', '2018-09-16 00:39:03'),
(52, 'Chandelure', 'Rare', 'Chandelure.jpg', '2018-09-16 00:39:56', '2018-09-16 00:39:56'),
(53, 'Vanilluxe', 'Rare', 'Vanilluxe.jpg', '2018-09-16 00:41:00', '2018-09-16 00:41:00'),
(54, 'Gothitelle', 'Rare', 'Gothitelle.jpg', '2018-09-16 00:41:37', '2018-09-16 00:41:37'),
(55, 'Sawk', 'Rare', 'Sawk.jpg', '2018-09-16 00:42:01', '2018-09-16 00:42:01'),
(56, 'Throh', 'Rare', 'Throh.jpg', '2018-09-16 00:42:34', '2018-09-16 00:42:34'),
(57, 'Seismitoad', 'Rare', 'Seismitoad.jpg', '2018-09-16 00:44:12', '2018-09-16 00:44:12'),
(58, 'Skuntank', 'Rare', 'Skuntank.jpg', '2018-09-16 00:45:08', '2018-09-16 00:45:08'),
(59, 'Bastiodon', 'Rare', 'Bastiodon.jpg', '2018-09-16 00:46:02', '2018-09-16 00:46:02'),
(60, 'Slacking', 'Rare', 'Slacking.jpg', '2018-09-16 00:46:50', '2018-09-16 00:47:42'),
(61, 'Alakazam', 'Rare', 'Alakazam.jpg', '2018-09-16 00:48:36', '2018-09-16 00:48:36'),
(62, 'Decidueye', 'Rare', 'Decidueye.jpg', '2018-09-16 00:49:19', '2018-09-16 00:49:19'),
(63, 'Empoleon', 'Rare', 'Empoleon.jpg', '2018-09-16 00:50:06', '2018-09-16 00:50:06'),
(64, 'Pinsir', 'Rare', 'Pinsir.jpg', '2018-09-16 00:50:46', '2018-09-16 00:50:46'),
(65, 'Infernape', 'Rare', 'Infernape.jpg', '2018-09-16 00:51:21', '2018-09-16 00:51:21'),
(66, 'Weavile', 'Rare', 'Weavile.jpg', '2018-09-16 00:52:12', '2018-09-16 00:52:12'),
(67, 'Ditto III', 'Rare', 'Dito III.jpg', '2018-09-16 00:52:32', '2018-09-16 00:52:50'),
(68, 'Gardevoir', 'Rare', 'Gardevoir.jpg', '2018-09-16 00:53:38', '2018-09-16 00:53:38'),
(69, 'Swampert', 'Rare', 'Swampert.jpg', '2018-09-16 00:54:19', '2018-09-16 00:54:19'),
(70, 'Blaziken', 'Rare', 'Blaziken.jpg', '2018-09-16 00:54:57', '2018-09-16 01:36:15'),
(71, 'Sceptile', 'Rare', 'Sceptile.jpg', '2018-09-16 00:55:36', '2018-09-16 00:55:36'),
(72, 'Scizor', 'Rare', 'Scizor.jpg', '2018-09-16 00:56:14', '2018-09-16 00:56:14'),
(73, 'Gyarados', 'Rare', 'Gyarados.jpg', '2018-09-16 00:56:44', '2018-09-16 00:56:44'),
(74, 'Gengar', 'Rare', 'Gengar.jpg', '2018-09-16 00:57:13', '2018-09-16 00:57:13'),
(75, 'Machamp', 'Rare', 'Machamp.jpg', '2018-09-16 00:57:58', '2018-09-16 00:58:14'),
(76, 'Arcanine', 'Rare', 'Arcanine.jpg', '2018-09-16 00:58:53', '2018-09-16 00:58:53'),
(77, 'Blastoise', 'Rare', 'Blastoise.jpg', '2018-09-16 01:01:41', '2018-09-16 01:32:40'),
(78, 'Charizard', 'Rare', 'Charizard.jpg', '2018-09-16 01:02:57', '2018-09-16 01:02:57'),
(79, 'Venusaur', 'Rare', 'Venusaur.jpg', '2018-09-16 01:03:40', '2018-09-16 01:03:40'),
(80, 'Tyranitar', 'Epic', 'Tyranitar.jpg', '2018-09-16 01:04:38', '2018-09-16 01:04:38'),
(81, 'Dragonite', 'Epic', 'Dragonite.jpg', '2018-09-16 01:05:35', '2018-09-16 01:05:35'),
(82, 'Lapras', 'Epic', 'Lapras.jpg', '2018-09-16 01:06:11', '2018-09-16 01:06:39'),
(83, 'Deoxys', 'Epic', 'Deoxys.jpg', '2018-09-16 01:07:51', '2018-09-16 01:07:51'),
(84, 'Diancie', 'Epic', 'Diancie.jpg', '2018-09-16 01:08:32', '2018-09-16 01:08:32'),
(85, 'Haxorus', 'Epic', 'Haxorus.jpg', '2018-09-16 01:09:15', '2018-09-16 01:09:15'),
(86, 'Escavalier', 'Epic', 'Escavalier.jpg', '2018-09-16 01:10:53', '2018-09-16 01:10:53'),
(87, 'Zoroark', 'Epic', 'Zoroark.jpg', '2018-09-16 01:11:28', '2018-09-16 01:11:28'),
(88, 'Regice', 'Epic', 'Regice.jpg', '2018-09-16 01:12:11', '2018-09-16 01:12:11'),
(89, 'Regirock', 'Epic', 'Regirock.jpg', '2018-09-16 01:12:51', '2018-09-16 01:12:51'),
(90, 'Ditto IV', 'Epic', 'Ditto IV.jpg', '2018-09-16 01:13:13', '2018-09-16 01:13:13'),
(91, 'Metagross', 'Epic', 'Metagross.jpg', '2018-09-16 01:14:58', '2018-09-16 01:14:58'),
(92, 'Garchomp', 'Epic', 'Garchomp.jpg', '2018-09-16 01:15:25', '2018-09-16 01:15:25'),
(93, 'Lucario', 'Epic', 'Lucario.jpg', '2018-09-16 01:15:40', '2018-09-16 01:15:40'),
(94, 'Darkrai', 'Epic', 'Darkrai.jpg', '2018-09-16 01:15:59', '2018-09-16 01:15:59'),
(95, 'Raikou', 'Epic', 'Raikou.jpg', '2018-09-16 01:17:42', '2018-09-16 01:17:42'),
(96, 'Suicune', 'Epic', 'Suicune.jpg', '2018-09-16 01:18:16', '2018-09-16 01:18:16'),
(97, 'Salamence', 'Epic', 'Salamence.jpg', '2018-09-16 01:18:31', '2018-09-16 01:18:56'),
(98, 'Snorlax', 'Epic', 'Snorlax.jpg', '2018-09-16 01:20:29', '2018-09-16 01:20:29'),
(99, 'Articuno', 'Epic', 'Articuno.jpg', '2018-09-16 01:20:50', '2018-09-16 01:20:50'),
(100, 'Zapdos', 'Epic', 'Zapdos.jpg', '2018-09-16 01:21:05', '2018-09-16 01:21:05'),
(101, 'Moltres', 'Epic', 'Moltres.jpg', '2018-09-16 01:21:26', '2018-09-16 01:21:26'),
(102, 'Zekrom', 'Legendary', 'Zekrom.jpg', '2018-09-16 01:23:39', '2018-09-16 01:26:18'),
(103, 'Reshiram', 'Legendary', 'Reshiram.jpg', '2018-09-16 01:23:56', '2018-09-16 01:26:29'),
(104, 'Kyurem', 'Legendary', 'Kyurem.jpg', '2018-09-16 01:24:09', '2018-09-16 01:26:45'),
(105, 'Mega Absol', 'Legendary', 'Mega Absol.jpg', '2018-09-16 01:26:01', '2018-09-16 01:26:01'),
(106, 'Xerneas', 'Legendary', 'Xerneas.jpg', '2018-09-16 01:27:02', '2018-09-16 01:27:02'),
(107, 'Yveltal', 'Legendary', 'Yveltal.jpg', '2018-09-16 01:27:31', '2018-09-16 01:27:31'),
(108, 'Zygrade', 'Legendary', 'Zygrade.jpg', '2018-09-16 01:27:50', '2018-09-16 01:27:50'),
(109, 'Mega Gardevoir', 'Legendary', 'Mega Gardevoir.jpg', '2018-09-16 01:30:02', '2018-09-16 01:30:02'),
(110, 'Mew', 'Legendary', 'Mew.jpg', '2018-09-16 01:30:12', '2018-09-16 01:30:12'),
(111, 'Greninja', 'Legendary', 'Greninja.jpg', '2018-09-16 01:30:26', '2018-09-16 01:30:26'),
(112, 'Mega Scizor', 'Legendary', 'Mega Scizor.jpg', '2018-09-16 01:30:45', '2018-09-16 01:30:45'),
(113, 'Mega Blastoise', 'Legendary', 'Mega Blastoise.jpg', '2018-09-16 01:33:07', '2018-09-16 01:33:07'),
(114, 'Mega Venusaur', 'Legendary', 'Mega Venusaur.jpg', '2018-09-16 01:33:23', '2018-09-16 01:33:23'),
(115, 'Mega Gengar', 'Legendary', 'Mega Gengar.jpg', '2018-09-16 01:33:37', '2018-09-16 01:33:37'),
(116, 'Mega Gyarados', 'Legendary', 'Mega Gyarados.jpg', '2018-09-16 01:33:56', '2018-09-16 01:33:56'),
(117, 'Mega Blaziken', 'Legendary', 'Mega Blaziken.jpg', '2018-09-16 01:37:11', '2018-09-16 01:37:11'),
(118, 'Mega Swampert', 'Legendary', 'Mega Swampert.jpg', '2018-09-16 01:37:28', '2018-09-16 01:37:28'),
(119, 'Mega Sceptile', 'Legendary', 'Mega Sceptile.jpg', '2018-09-16 01:37:45', '2018-09-16 01:37:45'),
(120, 'Mega Charizard', 'Legendary', 'Mega Charizard.jpg', '2018-09-16 01:38:02', '2018-09-16 01:38:02'),
(121, 'Lunala', 'Legendary', 'Lunala.jpg', '2018-09-16 01:39:11', '2018-09-16 01:39:11'),
(122, 'Genesect', 'Legendary', 'Genesect.jpg', '2018-09-16 01:39:24', '2018-09-16 01:39:24'),
(123, 'Hoopa', 'Legendary', 'Hoopa.jpg', '2018-09-16 01:39:38', '2018-09-16 01:39:38'),
(124, 'Celebi', 'Legendary', 'Celebi.jpg', '2018-09-16 01:39:52', '2018-09-16 01:39:52'),
(125, 'Regigigas', 'Legendary', 'Regigigas.jpg', '2018-09-16 01:41:27', '2018-09-16 01:41:27'),
(126, 'Arceus', 'Legendary', 'Arceus.jpg', '2018-09-16 01:41:40', '2018-09-16 01:41:40'),
(127, 'Ditto V', 'Legendary', 'Ditto V.jpg', '2018-09-16 01:41:59', '2018-09-16 01:41:59'),
(128, 'Solgaleo', 'Legendary', 'Solgaleo.jpg', '2018-09-16 01:42:15', '2018-09-16 01:42:15'),
(129, 'Groudon', 'Legendary', 'Groudon.jpg', '2018-09-16 01:43:56', '2018-09-16 01:43:56'),
(130, 'Rayquaza', 'Legendary', 'Rayquaza.jpg', '2018-09-16 01:52:44', '2018-09-16 01:52:44'),
(131, 'Dialga', 'Legendary', 'Dialga.jpg', '2018-09-16 01:53:13', '2018-09-16 01:53:13'),
(132, 'Palkia', 'Legendary', 'Palkia.jpg', '2018-09-16 01:53:38', '2018-09-16 01:53:38'),
(133, 'Mewtwo', 'Legendary', 'Mewtwo.jpg', '2018-09-16 01:55:02', '2018-09-16 01:55:02'),
(134, 'Ho-oh', 'Legendary', 'Ho-oh.jpg', '2018-09-16 01:55:30', '2018-09-16 01:55:30'),
(135, 'Kyogre', 'Legendary', 'Kyogre.jpg', '2018-09-16 01:55:44', '2018-09-16 01:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `pokemontype`
--

CREATE TABLE `pokemontype` (
  `id` int(10) UNSIGNED NOT NULL,
  `pokemonId` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokemontype`
--

INSERT INTO `pokemontype` (`id`, `pokemonId`, `typeId`, `created_at`, `updated_at`) VALUES
(28, 3, 3, NULL, NULL),
(29, 2, 9, NULL, NULL),
(30, 2, 15, NULL, NULL),
(31, 9, 14, NULL, NULL),
(33, 1, 14, NULL, NULL),
(34, 7, 5, NULL, NULL),
(35, 7, 2, NULL, NULL),
(38, 6, 9, NULL, NULL),
(39, 6, 11, NULL, NULL),
(41, 5, 2, NULL, NULL),
(43, 13, 2, NULL, NULL),
(44, 14, 3, NULL, NULL),
(45, 15, 3, NULL, NULL),
(46, 16, 2, NULL, NULL),
(47, 17, 9, NULL, NULL),
(48, 17, 4, NULL, NULL),
(49, 18, 3, NULL, NULL),
(50, 19, 7, NULL, NULL),
(51, 20, 7, NULL, NULL),
(52, 20, 17, NULL, NULL),
(55, 21, 13, NULL, NULL),
(56, 21, 11, NULL, NULL),
(57, 22, 4, NULL, NULL),
(58, 23, 2, NULL, NULL),
(59, 24, 4, NULL, NULL),
(60, 25, 9, NULL, NULL),
(61, 25, 17, NULL, NULL),
(62, 26, 5, NULL, NULL),
(63, 26, 4, NULL, NULL),
(64, 27, 5, NULL, NULL),
(65, 28, 4, NULL, NULL),
(66, 29, 2, NULL, NULL),
(67, 30, 8, NULL, NULL),
(68, 30, 3, NULL, NULL),
(69, 31, 18, NULL, NULL),
(70, 31, 9, NULL, NULL),
(71, 32, 3, NULL, NULL),
(72, 33, 8, NULL, NULL),
(73, 33, 3, NULL, NULL),
(74, 34, 7, NULL, NULL),
(75, 34, 17, NULL, NULL),
(76, 35, 7, NULL, NULL),
(77, 36, 2, NULL, NULL),
(78, 37, 5, NULL, NULL),
(79, 37, 15, NULL, NULL),
(80, 38, 8, NULL, NULL),
(81, 39, 8, NULL, NULL),
(82, 40, 13, NULL, NULL),
(83, 40, 2, NULL, NULL),
(84, 41, 2, NULL, NULL),
(85, 42, 17, NULL, NULL),
(86, 43, 3, NULL, NULL),
(87, 44, 4, NULL, NULL),
(88, 45, 18, NULL, NULL),
(89, 45, 17, NULL, NULL),
(90, 46, 18, NULL, NULL),
(91, 46, 9, NULL, NULL),
(92, 47, 3, NULL, NULL),
(93, 48, 3, NULL, NULL),
(94, 48, 15, NULL, NULL),
(95, 10, 14, NULL, NULL),
(96, 49, 6, NULL, NULL),
(97, 50, 13, NULL, NULL),
(98, 50, 15, NULL, NULL),
(99, 51, 6, NULL, NULL),
(100, 51, 3, NULL, NULL),
(101, 52, 3, NULL, NULL),
(102, 52, 19, NULL, NULL),
(103, 53, 20, NULL, NULL),
(104, 54, 15, NULL, NULL),
(105, 55, 8, NULL, NULL),
(106, 56, 8, NULL, NULL),
(107, 57, 13, NULL, NULL),
(108, 57, 2, NULL, NULL),
(109, 58, 6, NULL, NULL),
(110, 58, 17, NULL, NULL),
(111, 59, 11, NULL, NULL),
(112, 59, 10, NULL, NULL),
(114, 60, 4, NULL, NULL),
(115, 61, 15, NULL, NULL),
(116, 62, 19, NULL, NULL),
(117, 62, 7, NULL, NULL),
(118, 63, 10, NULL, NULL),
(119, 63, 2, NULL, NULL),
(120, 64, 18, NULL, NULL),
(121, 65, 8, NULL, NULL),
(122, 65, 3, NULL, NULL),
(123, 66, 6, NULL, NULL),
(124, 66, 20, NULL, NULL),
(126, 67, 4, NULL, NULL),
(127, 68, 5, NULL, NULL),
(128, 68, 15, NULL, NULL),
(129, 69, 13, NULL, NULL),
(130, 69, 2, NULL, NULL),
(133, 71, 7, NULL, NULL),
(134, 72, 18, NULL, NULL),
(135, 72, 10, NULL, NULL),
(136, 73, 9, NULL, NULL),
(137, 73, 2, NULL, NULL),
(138, 74, 19, NULL, NULL),
(139, 74, 17, NULL, NULL),
(141, 75, 8, NULL, NULL),
(142, 76, 3, NULL, NULL),
(144, 78, 3, NULL, NULL),
(145, 78, 9, NULL, NULL),
(146, 79, 7, NULL, NULL),
(147, 79, 17, NULL, NULL),
(148, 80, 6, NULL, NULL),
(149, 80, 11, NULL, NULL),
(150, 81, 21, NULL, NULL),
(151, 81, 9, NULL, NULL),
(154, 82, 20, NULL, NULL),
(155, 82, 2, NULL, NULL),
(156, 83, 15, NULL, NULL),
(157, 84, 5, NULL, NULL),
(158, 84, 11, NULL, NULL),
(159, 85, 21, NULL, NULL),
(160, 86, 18, NULL, NULL),
(161, 86, 10, NULL, NULL),
(162, 87, 6, NULL, NULL),
(163, 88, 20, NULL, NULL),
(164, 89, 11, NULL, NULL),
(165, 90, 4, NULL, NULL),
(166, 91, 15, NULL, NULL),
(167, 91, 10, NULL, NULL),
(168, 92, 21, NULL, NULL),
(169, 92, 13, NULL, NULL),
(170, 93, 8, NULL, NULL),
(171, 93, 10, NULL, NULL),
(172, 94, 6, NULL, NULL),
(173, 95, 14, NULL, NULL),
(174, 12, 3, NULL, NULL),
(175, 96, 2, NULL, NULL),
(178, 97, 21, NULL, NULL),
(179, 97, 9, NULL, NULL),
(180, 98, 4, NULL, NULL),
(181, 99, 9, NULL, NULL),
(182, 99, 20, NULL, NULL),
(183, 100, 14, NULL, NULL),
(184, 100, 9, NULL, NULL),
(185, 101, 3, NULL, NULL),
(186, 101, 9, NULL, NULL),
(193, 105, 6, NULL, NULL),
(194, 102, 21, NULL, NULL),
(195, 102, 14, NULL, NULL),
(196, 103, 21, NULL, NULL),
(197, 103, 3, NULL, NULL),
(198, 104, 21, NULL, NULL),
(199, 104, 20, NULL, NULL),
(200, 106, 5, NULL, NULL),
(201, 107, 6, NULL, NULL),
(202, 107, 9, NULL, NULL),
(203, 108, 21, NULL, NULL),
(204, 108, 13, NULL, NULL),
(205, 109, 5, NULL, NULL),
(206, 109, 15, NULL, NULL),
(207, 110, 15, NULL, NULL),
(208, 111, 6, NULL, NULL),
(209, 111, 2, NULL, NULL),
(210, 112, 18, NULL, NULL),
(211, 112, 10, NULL, NULL),
(213, 77, 2, NULL, NULL),
(214, 113, 2, NULL, NULL),
(215, 114, 7, NULL, NULL),
(216, 114, 17, NULL, NULL),
(217, 115, 19, NULL, NULL),
(218, 115, 17, NULL, NULL),
(219, 116, 6, NULL, NULL),
(220, 116, 2, NULL, NULL),
(221, 70, 8, NULL, NULL),
(222, 70, 3, NULL, NULL),
(223, 117, 8, NULL, NULL),
(224, 117, 3, NULL, NULL),
(225, 118, 13, NULL, NULL),
(226, 118, 2, NULL, NULL),
(227, 119, 21, NULL, NULL),
(228, 119, 7, NULL, NULL),
(229, 120, 21, NULL, NULL),
(230, 120, 3, NULL, NULL),
(231, 121, 19, NULL, NULL),
(232, 121, 15, NULL, NULL),
(233, 122, 18, NULL, NULL),
(234, 122, 10, NULL, NULL),
(235, 123, 19, NULL, NULL),
(236, 123, 15, NULL, NULL),
(237, 124, 7, NULL, NULL),
(238, 124, 15, NULL, NULL),
(239, 125, 4, NULL, NULL),
(240, 126, 4, NULL, NULL),
(241, 127, 4, NULL, NULL),
(242, 128, 15, NULL, NULL),
(243, 128, 10, NULL, NULL),
(244, 129, 13, NULL, NULL),
(245, 130, 21, NULL, NULL),
(246, 130, 9, NULL, NULL),
(247, 131, 21, NULL, NULL),
(248, 131, 10, NULL, NULL),
(249, 132, 21, NULL, NULL),
(250, 132, 2, NULL, NULL),
(251, 133, 15, NULL, NULL),
(252, 134, 3, NULL, NULL),
(253, 134, 9, NULL, NULL),
(254, 135, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `name`, `server`, `message`, `created_at`, `updated_at`) VALUES
(1, 'anon', '33', 'keep it up!', '2018-09-16 07:40:43', '2018-09-16 07:40:43'),
(2, 'bot', '33', 'nice ka nice!', '2018-09-16 07:41:04', '2018-09-16 07:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Water', '2018-09-15 02:54:34', '2018-09-15 02:54:34'),
(3, 'Fire', '2018-09-15 02:54:37', '2018-09-15 02:54:37'),
(4, 'Normal', '2018-09-15 02:54:39', '2018-09-15 02:54:39'),
(5, 'Fairy', '2018-09-15 02:54:42', '2018-09-15 02:54:42'),
(6, 'Dark', '2018-09-15 02:54:44', '2018-09-15 02:54:44'),
(7, 'Grass', '2018-09-15 02:54:46', '2018-09-15 02:54:46'),
(8, 'Fighting', '2018-09-15 02:54:48', '2018-09-15 02:54:48'),
(9, 'Flying', '2018-09-15 02:54:51', '2018-09-15 02:54:51'),
(10, 'Steel', '2018-09-15 02:54:53', '2018-09-15 02:54:53'),
(11, 'Rock', '2018-09-15 03:40:38', '2018-09-15 03:40:38'),
(13, 'Ground', '2018-09-15 03:40:56', '2018-09-15 03:40:56'),
(14, 'Electric', '2018-09-15 04:07:01', '2018-09-15 04:07:01'),
(15, 'Psychic', '2018-09-15 04:43:20', '2018-09-15 04:43:20'),
(17, 'Poison', '2018-09-16 00:04:17', '2018-09-16 00:04:17'),
(18, 'Bug', '2018-09-16 00:20:58', '2018-09-16 00:20:58'),
(19, 'Ghost', '2018-09-16 00:39:38', '2018-09-16 00:39:38'),
(20, 'Ice', '2018-09-16 00:40:47', '2018-09-16 00:40:47'),
(21, 'Dragon', '2018-09-16 01:05:22', '2018-09-16 01:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `server`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'JiMzKy', 33, 'anon', '$2y$10$fH78enxAQDjBINsFho20kehs2PawXdUlRgH3i97aQSbbJt5qABj..', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pokemontype`
--
ALTER TABLE `pokemontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `pokemontype`
--
ALTER TABLE `pokemontype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
