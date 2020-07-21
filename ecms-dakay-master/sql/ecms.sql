-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 09:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `equipment_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_hauling` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_date` datetime NOT NULL,
  `equipment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_displacement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chassis_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `created_user_id`, `equipment_code`, `equipment_description`, `equipment_make`, `equipment_model`, `for_hauling`, `capacity`, `equipment_date`, `equipment_type`, `engine_displacement`, `engine_code`, `engine_no`, `chassis_no`, `body_no`, `color`, `fuel`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 'CBH-01', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'yes', '0.40 Cu.M', '2017-09-06 02:27:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2017-09-06 16:27:40', '2017-09-06 16:27:40', NULL),
(3, 2, 'CT-03', 'Cargo Truck w/ 3.0 ton cap.', 'Isuzu', 'CXM19V', 'yes', '25 Tons', '2017-09-06 02:27:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2017-09-06 16:27:40', '2017-09-06 16:27:40', NULL),
(4, 2, 'BDZ-01', 'Bulldozer-01', 'Caterpillar', 'D8K', 'yes', '400 HP', '2017-09-16 00:00:00', 'NA', 'NA', 'NA', '77V9936', 'NA', 'NA', 'YELLOW', 'DIESEL', 'active', '2017-09-16 16:50:42', '2017-09-16 16:50:42', NULL),
(5, 2, 'D6H', 'Bulldozer', 'Caterpillar', 'D6H', 'yes', '180 fhp', '2017-09-16 00:00:00', 'Bulldozer', 'na', 'na', 'na', 'na', 'na', 'orange', 'diesel', 'active', '2017-09-16 17:33:08', '2018-01-26 08:49:42', NULL),
(6, 2, 'PL-01', 'Wheel Loader 01', 'Caterpillar', '910 B', 'no', '65 FHP', '2017-09-15 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-16 18:02:05', '2017-09-16 18:03:08', NULL),
(7, 3, 'PL-02', 'Wheel Loader 02', 'Komatsu', 'WA-200-1', 'no', '2.0 Cu.M', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 22:25:44', '2017-09-20 22:30:42', NULL),
(8, 3, 'PL-03', 'Wheel Loader 03', 'Komatsu', 'WA-350', 'no', '3.5 Cu. M', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 22:28:08', '2017-09-20 22:30:09', NULL),
(9, 3, 'PL-04', 'Wheel Loader 04', 'Michigan', 'TCM-75B', 'no', '3.0 CU.M.', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 22:29:41', '2017-09-20 22:29:41', NULL),
(10, 3, 'PL-05', 'Wheel Loader 05', 'TCM', 'L26', 'no', '2.6 Cu. M', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 22:31:45', '2017-09-20 22:31:45', NULL),
(11, 3, 'PL-06', 'Wheel Loader 06', 'Caterpillar', '938G', 'no', '2.6 Cu. M', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 22:33:29', '2017-09-20 22:33:29', NULL),
(12, 3, 'VC-01', 'Vibratory Compactor 01', 'Kawasaki', 'KVR4', 'no', '4tons', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 22:34:51', '2017-09-20 22:34:51', NULL),
(13, 3, 'VC-02', 'Vibratory Compactor 02', 'Sakai', 'TG41', 'no', '4.0 Tons', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 23:01:35', '2017-09-20 23:01:35', NULL),
(14, 3, 'VC-03', 'Vibratory Compactor 03', 'Sakai', 'NA', 'no', '4.0 Tons', '2017-09-20 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-20 23:02:37', '2017-09-20 23:02:37', NULL),
(15, 3, 'VC-04', 'Vibratory Compactor 04', 'Komatsu', 'JV40CW-2', 'no', '4.0 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 15:29:24', '2017-09-21 15:29:24', NULL),
(16, 3, 'VC-05', 'Vibratory Compactor 05', 'Komatsu', 'JV100A-1', 'no', '10 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 15:30:27', '2017-09-21 15:30:27', NULL),
(17, 3, 'vc-06', 'Vibratory Compactor 06', 'Sakai', 'TG-41', 'no', '4.0 Tons', '2017-09-21 00:00:00', 'NA', 'N/A', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 15:31:53', '2017-09-21 15:31:53', NULL),
(18, 3, 'VC-07', 'Vibratory Compactor 07', 'Kawasaki', 'KV4A2', 'no', '4.0 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 19:55:50', '2017-09-21 19:55:50', NULL),
(19, 3, 'VC-08', 'Vibratory Compactor 08', 'Sakai', 'TW500W', 'no', '4.0 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 19:57:47', '2017-09-21 19:57:47', NULL),
(20, 3, 'VC-09', 'Vibratory Compactor 09', 'Sakai', 'TG-41', 'no', '4.0 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 19:58:36', '2017-09-21 19:58:36', NULL),
(21, 3, 'VC-10', 'Vibratory Compactor 10', 'Sakai', 'TW41', 'no', '4.0 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 19:59:25', '2017-09-21 19:59:25', NULL),
(22, 3, 'VC-11', 'Vibratory Compactor 11', 'Kawasaki', 'KV5A', 'no', '5.0 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:00:25', '2017-09-21 20:00:25', NULL),
(23, 3, 'CRN-01', 'Crane w/ Lattice Boom, Truck Mounted', 'Linkbelt', 'HC-78BS', 'no', '35 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:02:15', '2017-09-21 20:02:15', NULL),
(24, 3, 'CRN-02', 'Crane, Crawler 01', 'Linkbelt', 'LS118RH-2', 'no', '50 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:03:20', '2017-09-21 20:03:51', NULL),
(25, 3, 'CRN-03', 'Crane, Crawler 02', 'Nippon Sharyo', 'DH500-2', 'no', '50 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:05:18', '2017-09-21 20:05:18', NULL),
(26, 3, 'CRN-04', 'Crane, Crawler 03', 'Hitachi', 'KH150', 'no', '40 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NAn', 'Orange', 'Diesel', 'active', '2017-09-21 20:06:22', '2017-09-21 20:06:22', NULL),
(27, 3, 'CRN-06', 'Crane, Telescopic, Rough Terrain 01', 'Kato', 'KR25H-3', 'no', '25 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:07:53', '2017-09-21 20:07:53', NULL),
(28, 3, 'CRN-07', 'Crane, Telescopic, Rough Terrain 02', 'Komatsu', 'LW250-1', 'no', '25 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:11:22', '2017-09-21 20:11:22', NULL),
(29, 3, 'CRN-08', 'Crane, Telescopic, Rough Terrain 03', 'Tadano', 'TR250M-4', 'no', '25 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:12:40', '2017-09-21 20:12:40', NULL),
(30, 3, 'CRN-09', 'Crane, Telescopic, Rough Terrain 04', 'Komatsu Wing', 'LW-250-5', 'no', '26 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:14:32', '2017-09-21 20:14:32', NULL),
(31, 3, 'CRN-10', 'Crane, Telescopic, Rough Terrain 05', 'Kato', 'KR25H-3', 'no', '25 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:15:53', '2017-09-21 20:15:53', NULL),
(32, 3, 'CRN-11', 'Crane, Telescopic, Rough Terrain 06', 'Komatsu', 'LW200-1', 'no', '20 Tons', '2017-09-21 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-21 20:26:26', '2017-09-21 20:26:26', NULL),
(33, 3, 'CRN-12', 'Crane, Telescopic, Rough Terrain 07', 'Tadano', 'TR-100mL', 'no', '10 Tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:28:15', '2017-09-28 20:28:15', NULL),
(34, 3, 'CRN-14', 'Crane, Telescopic, Rough Terrain 08', 'Kato', 'KR35H-3', 'no', '35 Tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:29:19', '2017-09-28 20:29:19', NULL),
(35, 3, 'CRN-15', 'Crane, Telescopic, Rough Terrain', 'Kobelco', 'EZ3-7081', 'no', '25 Tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:30:43', '2017-09-28 20:30:43', NULL),
(36, 3, 'FL-01', 'Forklift 01', 'TCM', 'FD-35', 'no', '3.5 Tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:32:19', '2017-09-28 20:32:19', NULL),
(37, 3, 'FL-02', 'Forklift 02', 'Caterpillar', 'DPL-40', 'no', '4tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:33:23', '2017-09-28 20:33:23', NULL),
(38, 3, 'FL-03', 'Forklift 03', 'Komatsu', 'FD705', 'no', '7tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:34:20', '2017-09-28 20:34:20', NULL),
(39, 3, 'FL-04', 'Forklift 04', 'TCM', 'FD-70', 'no', '7tons', '2017-09-28 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:35:24', '2017-09-28 20:35:24', NULL),
(40, 3, 'CBH-01', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:37:47', '2017-09-28 20:37:47', NULL),
(41, 3, 'CBH-02', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:38:43', '2017-09-28 20:38:43', NULL),
(42, 3, 'CBH-03', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:39:43', '2017-09-28 20:39:43', NULL),
(43, 3, 'CBH-04', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:41:08', '2017-09-28 20:41:08', NULL),
(44, 3, 'CBH-05', 'Backhoe, Crawler Mini', 'Yanmar', 'VIO30-3', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:42:14', '2017-09-28 20:42:14', NULL),
(45, 3, 'CBH-06', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:43:02', '2017-09-28 20:43:02', NULL),
(46, 3, 'CBH-07', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.25 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:44:04', '2017-09-28 20:44:04', NULL),
(47, 3, 'CBH-08', 'Backhoe, Crawler Mini', 'Komatsu', 'PC25', 'no', '.15 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:51:07', '2017-09-28 20:51:07', NULL),
(48, 3, 'CBH-09', 'Backhoe, Crawler Mini', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:51:58', '2017-09-28 20:51:58', NULL),
(49, 3, 'CBH-10', 'Backhoe, Crawler', 'Komatsu', 'PC 75UU-2', 'no', '.40 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 20:52:50', '2017-09-28 20:52:50', NULL),
(50, 3, 'CBH-11', 'Backhoe, Crawler', 'Caterpillar', '320 CL', 'no', '.7 Cu.M', '2017-09-28 00:00:00', 'Excavating', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-09-28 21:55:47', '2017-09-28 21:55:47', NULL),
(51, 3, 'AC-01', 'Air Compressor', 'Denyo', '31LB1', 'no', '90 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'K2B', 'K2B-00516', 'NA', 'NA', 'Orange', 'diesel', 'active', '2017-10-04 19:50:32', '2017-10-04 19:50:32', NULL),
(52, 3, 'AC-02', 'AIr Compressor', 'NIssan', '185 DPQ', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', '53', '53-5024140', 'NA', 'NA', 'ORa', 'Diesel', 'active', '2017-10-04 19:52:19', '2017-10-04 19:52:19', NULL),
(53, 3, 'AC-04', 'AIr Compressor', 'Denyo', 'DIS-550HS', 'no', '550 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-01', 'Orange', 'Diesel', 'active', '2017-10-04 19:55:59', '2017-10-04 19:55:59', NULL),
(54, 3, 'AC-06', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-06', 'Orange', 'Diesel', 'active', '2017-10-04 19:57:52', '2017-10-04 19:57:52', NULL),
(55, 3, 'AC-07', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-07', 'Orange', 'Diesel', 'active', '2017-10-04 20:00:35', '2017-10-04 20:00:35', NULL),
(56, 3, 'AC-08', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'Ac-08', 'Orange', 'Diesel', 'active', '2017-10-04 20:24:43', '2017-10-04 20:24:43', NULL),
(57, 3, 'AC-09', 'Air Compressor', 'Denyo', 'DIS275SB2', 'no', '275 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-09', 'Orange', 'Diesel', 'active', '2017-10-04 20:26:21', '2017-10-04 20:26:21', NULL),
(58, 3, 'AC-10', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-10', 'Orange', 'Diesel', 'active', '2017-10-04 20:28:17', '2017-10-04 20:28:17', NULL),
(59, 3, 'AC-11', 'Air Compressor', 'Airman', 'PDS265', 'no', '265 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-11', 'Orange', 'Diesel', 'active', '2017-10-04 20:32:20', '2017-10-04 20:32:20', NULL),
(60, 3, 'AC-12', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-12', 'Orange', 'Diesel', 'active', '2017-10-04 20:35:10', '2017-10-04 20:35:10', NULL),
(61, 3, 'AC-14E', 'Air Compressor', 'Airman', 'SMS75S-54', 'no', '285 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', '285 CFA', 'Orange', 'Diesel', 'active', '2017-10-04 20:38:18', '2017-10-04 20:38:18', NULL),
(62, 3, 'AC-15E', 'Air Compressor', 'Denyo', 'MPS-18SS', 'no', '185 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-15E', 'Orange', 'Diesel', 'active', '2017-10-04 20:39:55', '2017-10-04 20:39:55', NULL),
(63, 3, 'AC-16E', 'Air Compressor', 'Denyo', 'MPS-127ss', 'no', '125 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-16E', 'Orange', 'Diesel', 'active', '2017-10-04 20:42:10', '2017-10-04 20:42:10', NULL),
(64, 3, 'AC-17', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-17', 'Orange', 'Diesel', 'active', '2017-10-04 20:43:20', '2017-10-04 20:43:20', NULL),
(65, 3, 'AC-18', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-18', 'Orange', 'Diesel', 'active', '2017-10-04 20:44:32', '2017-10-04 20:44:32', NULL),
(66, 3, 'AC-19', 'Air Compressor', 'Airman', 'PDS175S', 'yes', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-19', 'Orange', 'Diesel', 'active', '2017-10-04 20:45:48', '2017-10-04 20:45:48', NULL),
(67, 3, 'AC-20', 'Air Compressor', 'Denyo', 'DPS--180SSB2', 'no', '180 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-20', 'Orange', 'Diesel', 'active', '2017-10-04 20:47:59', '2017-10-04 20:47:59', NULL),
(68, 3, 'AC-21', 'Air Compressor', 'Atlas Copco', 'XA90', 'no', '185 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-21', 'Orange', 'Diesel', 'active', '2017-10-04 20:50:43', '2017-10-04 20:50:43', NULL),
(69, 3, 'AC-22', 'Air Compressor', 'Airman', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-22', 'Orange', 'Diesel', 'active', '2017-10-04 20:53:01', '2017-10-04 20:53:01', NULL),
(70, 3, 'AC-23', 'Air Compressor', 'Nissan', 'PDS175S', 'no', '175 CFM', '2017-10-04 00:00:00', 'Air Compressor', 'NA', 'NA', 'NA', 'NA', 'AC-23', 'Orange', 'Diesel', 'active', '2017-10-04 20:54:53', '2017-10-04 20:54:53', NULL),
(71, 3, 'Genset-01', 'Generator', 'Airman', '4DR30', 'no', '35KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-01', 'Orange', 'Diesel', 'active', '2017-10-04 20:57:10', '2017-10-04 20:57:10', NULL),
(72, 3, 'Genset-02', 'Generator', 'Hino', 'EB100', 'no', '210KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-02', 'Orange', 'Diesel', 'active', '2017-10-04 21:12:11', '2017-10-04 21:12:11', NULL),
(73, 3, 'Genset-06', 'Generator', 'Caterpillar', 'SR4', 'no', '281KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-06', 'Orange', 'Diesel', 'active', '2017-10-04 21:14:00', '2017-10-04 21:14:00', NULL),
(74, 3, 'Genset-07', 'Generator', 'Caterpillar', 'SR4', 'no', '281KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-07', 'Orange', 'Diesel', 'active', '2017-10-04 21:19:18', '2017-10-04 21:19:18', NULL),
(75, 3, 'Genset-08', 'Generator', 'Denyo', 'DCA45SP', 'no', '45KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-08', 'Orange', 'Diesel', 'active', '2017-10-04 21:20:47', '2017-10-04 21:20:47', NULL),
(76, 3, 'Genset-09', 'Generator', 'Denyo', 'SDG100S', 'no', '110KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-09', 'Orange', 'Diesel', 'active', '2017-10-04 21:51:11', '2017-10-04 21:51:11', NULL),
(77, 3, 'Genset-10', 'Generator', 'Cummins', 'NTC8', 'no', '375KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-10', 'Orange', 'Diesel', 'active', '2017-10-04 21:52:11', '2017-10-04 21:52:11', NULL),
(78, 3, 'Genset-11', 'Generator', 'Denyo', 'DCA-40SS-H', 'no', '40KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-11', 'Orange', 'Diesel', 'active', '2017-10-04 21:53:27', '2017-10-04 21:53:27', NULL),
(79, 3, 'Genset-12', 'Generator', 'Denyo', 'NA', 'no', '45KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-12', 'Orange', 'Diesel', 'active', '2017-10-04 21:54:58', '2017-10-04 21:54:58', NULL),
(80, 3, 'Genset-14', 'Generator', 'Kobuta', 'CH-2151', 'no', '25KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-14', 'Orange', 'Diesel', 'active', '2017-10-04 21:56:42', '2017-10-04 21:56:42', NULL),
(81, 3, 'Genset-15', 'Generator', 'Denyo', '6BD1', 'no', '60KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-15', 'Orange', 'Diesel', 'active', '2017-10-04 21:58:15', '2017-10-04 21:58:15', NULL),
(82, 3, 'Genset-16', 'Generator', 'Hino', 'HO6C-T', 'no', '90KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-16', 'Orange', 'Diesel', 'active', '2017-10-04 21:59:32', '2017-10-04 21:59:32', NULL),
(83, 3, 'Genset-17', 'Ge', 'Airman', '4BG1-T', 'yes', '60KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-17', 'Orange', 'Diesel', 'active', '2017-10-04 22:05:31', '2017-10-04 22:05:31', NULL),
(84, 3, 'Genset-18', 'Generator', 'Mitsubishi', '6D14', 'no', '108KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-18', 'Orange', 'diesel', 'active', '2017-10-04 22:09:05', '2017-10-04 22:09:05', NULL),
(85, 3, 'Genset-19', 'Generator', 'Caterpillar', '3116', 'no', '150KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-19', 'Orange', 'Diesel', 'active', '2017-10-04 22:10:12', '2017-10-04 22:10:12', NULL),
(86, 3, 'CBH-12', 'Backhoe, Crawler', 'Caterpillar', '320 CL', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-04 22:16:16', '2017-10-04 22:16:16', NULL),
(87, 3, 'Genset-20', 'Generator', 'Airman', 'SPG150S', 'no', '150 KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-20', 'Orange', 'Diesel', 'active', '2017-10-04 22:17:25', '2017-10-04 22:19:52', NULL),
(88, 3, 'CBH-14', 'Backhoe, Crawler', 'Caterpillar', '320D', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-04 22:17:29', '2017-10-04 22:17:29', NULL),
(89, 3, 'Genset-21', 'Generator', 'Denyo', 'DCA-125SAR', 'no', '125 KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-21', 'Orange', 'Diesel', 'active', '2017-10-04 22:18:46', '2017-10-04 22:18:46', NULL),
(90, 3, 'CBH-15', 'Backhoe, Crawler', 'Caterpillar', '320BL', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-04 22:19:24', '2017-10-04 22:19:24', NULL),
(91, 3, 'CBH-16', 'Backhoe, Crawler', 'Caterpillar', '320D', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-04 22:20:23', '2017-10-04 22:20:23', NULL),
(92, 3, 'Genset-22', 'Generator', 'Nishihatsu', 'GP668', 'no', '175KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-22', 'Orange', 'Diesel', 'active', '2017-10-04 22:21:41', '2017-10-04 22:21:41', NULL),
(93, 3, 'Genset-23', 'Generator', 'Nippon Sharyo', '220SP', 'no', '220KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-23', 'Orange', 'Diesel', 'active', '2017-10-04 22:22:45', '2017-10-04 22:22:45', NULL),
(94, 3, 'Genset-24', 'Generator', 'Denyo', 'DCA-150 SPM', 'yes', '150 KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-24', 'Orange', 'Diesel', 'active', '2017-10-04 22:23:52', '2017-10-04 22:23:52', NULL),
(95, 3, 'Genset-25', 'Generator', 'Tropic Power', '1006TG1', 'no', '125 KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-25', 'Orange', 'Diesel', 'active', '2017-10-04 22:24:56', '2017-10-04 22:24:56', NULL),
(96, 3, 'Genset-26', 'Generator', 'Denyo', 'DCA45ESI', 'no', '45KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-26', 'Orange', 'Diesel', 'active', '2017-10-04 22:26:01', '2017-10-04 22:26:01', NULL),
(97, 3, 'Genset-27', 'Generator', 'Hino', 'W04D-TG', 'no', '50KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-27', 'Orange', 'Diesel', 'active', '2017-10-04 22:26:57', '2017-10-04 22:26:57', NULL),
(98, 3, 'Genset-28', 'Generator', 'Isuzu', 'BB-4JGI', 'no', '60KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-28', 'Orange', 'Diesel', 'active', '2017-10-04 22:28:10', '2017-10-04 22:28:10', NULL),
(99, 3, 'Genset-29', 'Generator', 'Airman', '6BG1', 'no', '65 KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-29', 'Orange', 'Diesel', 'active', '2017-10-04 22:29:12', '2017-10-04 22:29:12', NULL),
(100, 3, 'Genset-30', 'Generator', 'Airman', 'NA', 'no', '30KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'Genset-30', 'Orange', 'Diesel', 'active', '2017-10-04 22:31:20', '2017-10-04 22:31:20', NULL),
(101, 3, 'WG-01', 'Welding Generator', 'Denyo', 'BLW-2805SW', 'no', '10KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'WG-01', 'Orange', 'Diesel', 'active', '2017-10-04 22:34:35', '2017-10-04 22:34:35', NULL),
(102, 3, 'WG-02', 'Welding Generator', 'Denyo', 'TLW-3005SWK', 'no', '10KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'WG-02', 'Orange', 'Diesel', 'active', '2017-10-04 22:36:12', '2017-10-04 22:36:12', NULL),
(103, 3, 'WG-03', 'Welding Generator', 'Denyo', '2805SW', 'no', '10KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'WG-03', 'Orange', 'Diesel', 'active', '2017-10-04 22:37:36', '2017-10-04 22:37:36', NULL),
(104, 3, 'CBH-18', 'Backhoe, Crawler', 'Caterpillar', '311C', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-04 22:38:11', '2017-10-04 22:38:11', NULL),
(105, 3, 'WG-04', 'Welding Generator', 'Denyo', 'D905-307106', 'no', '10KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'WG-04', 'Orange', 'Diesel', 'active', '2017-10-04 22:39:13', '2017-10-04 22:39:13', NULL),
(106, 3, 'WG-05', 'Welding Generator', 'Denyo', 'TLW-230SSK', 'no', '10KVA', '2017-10-04 00:00:00', 'Power Generating', 'NA', 'NA', 'NA', 'NA', 'WG-05', 'Orange', 'Diesel', 'active', '2017-10-04 22:41:00', '2017-10-04 22:41:00', NULL),
(107, 3, 'CBH-19', 'Backhoe, Crawler', 'Caterpillar', '320DRRE', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:32:01', '2017-10-05 00:32:01', NULL),
(108, 3, 'CBH-20', 'Backhoe, Crawler', 'Caterpillar', '320L', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:33:11', '2017-10-05 00:33:11', NULL),
(109, 3, 'CBH-21', 'Backhoe, Crawler', 'Komatsu', 'PC 75UU-2', 'no', '0.40 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:34:45', '2017-10-05 00:34:45', NULL),
(110, 3, 'CBH-22', 'Backhoe, Crawler', 'Komatsu', 'PC75UU-3C', 'no', '0.40 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:37:42', '2017-10-05 00:37:42', NULL),
(111, 3, 'CBH-23', 'Backhoe, Crawler', 'Caterpillar', '312', 'no', '0.5 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:39:05', '2017-10-05 00:39:05', NULL),
(112, 3, 'CBH-24', 'Backhoe, Crawler', 'Caterpillar', '312', 'no', '0.5 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:40:06', '2017-10-05 00:40:06', NULL),
(113, 3, 'CBH-25', 'Backhoe, Crawler', 'Caterpillar', '320DRR', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NAN', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:41:38', '2017-10-05 00:41:38', NULL),
(114, 3, 'CBH-26', 'Backhoe, Crawler', 'Caterpillar', '314CCR', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:44:13', '2017-10-05 00:44:13', NULL),
(115, 3, 'CBH-27', 'Backhoe, Crawler', 'Caterpillar', '314CCR', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:45:34', '2017-10-05 00:45:34', NULL),
(116, 3, 'CBH-28', 'Backhoe, Crawler', 'Caterpillar', '308-C', 'no', '0.40 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:50:21', '2017-10-05 00:50:21', NULL),
(117, 3, 'CBH-29', 'Backhoe, Crawler', 'Caterpillar', '314CR-3', 'no', '0.7 Cu.M', '2017-10-04 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 00:53:58', '2017-10-05 00:53:58', NULL),
(118, 3, 'MT-01', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 15:59:13', '2017-10-05 15:59:13', NULL),
(119, 3, 'MT-02', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:12:33', '2017-10-05 17:12:33', NULL),
(120, 3, 'MT-03', 'Mixer Truck', 'Isuzu', 'CXM70K', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:14:18', '2017-10-05 17:14:18', NULL),
(121, 3, 'MT-04', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:15:10', '2017-10-05 17:15:10', NULL),
(122, 3, 'MT-05', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:16:55', '2017-10-05 17:16:55', NULL),
(123, 3, 'MT-06', 'Mixer Truck', 'Isuzu', 'FRR12DA', 'no', '2.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:17:53', '2017-10-05 17:17:53', NULL),
(124, 3, 'MT-07', 'Mixer Truck', 'Isuzu', 'NRR12D', 'no', '2.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:20:10', '2017-10-05 17:20:10', NULL),
(125, 3, 'MT-08', 'Mixer Truck', 'Isuzu', 'FRR12DA', 'no', '2.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:22:40', '2017-10-05 17:22:40', NULL),
(126, 3, 'MT-09', 'Mixer Truck', 'Isuzu', 'FSR32DB', 'no', '2.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:24:27', '2017-10-05 17:24:27', NULL),
(127, 3, 'MT-10', 'Mixer Truck', 'Fuso', 'FK315C', 'no', '2.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:25:18', '2017-10-05 17:25:18', NULL),
(128, 3, 'MT-11', 'Mixer Truck', 'Isuzu', 'FV415J', 'no', '2.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:26:11', '2017-10-05 17:26:11', NULL),
(129, 3, 'MT-12', 'Mixer Truck', 'Isuzu', 'CXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:28:10', '2017-10-05 17:28:10', NULL),
(130, 3, 'MT-14', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:28:52', '2017-10-05 17:28:52', NULL),
(131, 3, 'MT-15', 'Mixer Truck', 'Isuzu', 'CXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:29:40', '2017-10-05 17:29:40', NULL),
(132, 3, 'MT-16', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:30:27', '2017-10-05 17:30:27', NULL),
(133, 3, 'MT-17', 'Mixer Truck', 'Isuzu', 'CXZ19J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:31:14', '2017-10-05 17:31:14', NULL),
(134, 3, 'MT-18', 'Mixer Truck', 'Isuzu', 'CXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:34:23', '2017-10-05 17:34:23', NULL),
(135, 3, 'MT-19', 'Mixer Truck', 'Isuzu', 'CXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:37:30', '2017-10-05 17:37:30', NULL),
(136, 3, 'MT-20', 'Mixer Truck', 'Isuzu', 'JALCXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:38:49', '2017-10-05 17:38:49', NULL),
(137, 3, 'MT-21', 'Mixer Truck', 'Isuzu', 'JALCXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:40:01', '2017-10-05 17:40:01', NULL),
(138, 3, 'MT-22', 'Mixer Truck', 'Isuzu', 'JALCXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:42:14', '2017-10-05 17:42:14', NULL),
(139, 3, 'MT-23', 'Mixer Truck', 'Isuzu', 'CXZ71J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:43:11', '2017-10-05 17:43:11', NULL),
(140, 3, 'TL-01', 'Tower light', 'Airman', 'EP-300SD', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'TL-01', 'Orange', 'Diesel', 'active', '2017-10-05 17:43:17', '2017-10-05 17:45:12', NULL),
(141, 3, 'MT-24', 'Mixer Truck', 'Fuso', 'FV415J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:44:00', '2017-10-05 17:44:00', NULL),
(142, 3, 'TL-02', 'Tower light', 'Yanmar', 'YDG--200S', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'TL-02', 'Orange', 'Diesel', 'active', '2017-10-05 17:44:38', '2017-10-05 17:44:53', NULL),
(143, 3, 'MT-25', 'Mixer Truck', 'Fuso', 'FV50KJX', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:44:57', '2017-10-05 17:44:57', NULL),
(144, 3, 'MT-26', 'Mixer Truck', 'Fuso', 'FV419J', 'no', '5.5Cu.M', '2017-10-05 00:00:00', 'Mixer', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:45:43', '2017-10-05 17:45:43', NULL),
(145, 3, 'TL-03', 'Tower light', 'Airman', '425W-11', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'n', 'TL-03', 'Orange', 'Diesel', 'active', '2017-10-05 17:46:13', '2017-10-05 17:46:13', NULL),
(146, 3, 'TL-04', 'Tower light', 'Airman', 'LB 53655', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'TL-04', 'Orange', 'Diesel', 'active', '2017-10-05 17:47:09', '2017-10-05 17:47:09', NULL),
(147, 3, 'TL-05', 'Tower light', 'Airman', 'LGLH4', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'TL-05', 'Orange', 'Diesel', 'active', '2017-10-05 17:48:05', '2017-10-05 17:48:05', NULL),
(148, 3, 'TL-06', 'Tower light', 'Yanmar', 'YDG250SS', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'TL-06', 'Orange', 'Diesel', 'active', '2017-10-05 17:49:00', '2017-10-05 17:49:00', NULL),
(149, 3, 'TOWER 01', 'Crane, Tower Static/Climbing', 'Linden', '5102', 'no', '9tons@10m', '2017-10-05 00:00:00', 'Tower Crane', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:49:21', '2017-10-05 17:49:21', NULL),
(150, 3, 'TL-07', 'Tower light', 'Denyo', 'S6U-4251-I', 'no', '3000 watts', '2017-10-05 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'TL-07', 'Orange', 'Diesel', 'active', '2017-10-05 17:50:05', '2017-10-05 17:50:05', NULL),
(151, 3, 'FT-01', 'Fuel Truck', 'Isuzu', 'NKR', 'no', '2000 liters', '2017-10-05 00:00:00', 'Special Support', 'NA', 'NA', 'NA', 'NKR5E-7152612', 'FT-01', 'Orange', 'Diese', 'active', '2017-10-05 17:52:15', '2017-10-05 17:52:15', NULL),
(152, 3, 'TOWER 02', 'Crane, Tower Static', 'Comedil', 'CT-4824', 'no', '8tons@10m', '2017-10-05 00:00:00', 'Tower Crane', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:52:17', '2017-10-05 17:52:17', NULL),
(153, 3, 'TOWER 03', 'Crane, Tower Static', 'Comedil', 'CT-4824', 'no', '8tons@10m', '2017-10-05 00:00:00', 'Tower Crane', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2017-10-05 17:53:27', '2017-10-05 17:53:27', NULL),
(154, 3, 'FT-02', 'Fuel Truck', 'Isuzu', 'NPR', 'no', '2000 liters', '2017-10-05 00:00:00', 'Special Support', 'NA', 'NA', 'n', 'NPR66G-7100284', 'FT-02', 'Orange', 'Diesel', 'active', '2017-10-05 17:55:25', '2017-10-05 17:55:25', NULL),
(155, 3, 'WT-01', 'Water Truck', 'Isuzu', 'CXG23M', 'no', '12 Cu.m', '2017-10-05 00:00:00', 'Special Support', 'NA', 'NA', 'NA', 'CXG23M-3000323', 'WT-01', 'Orange', 'Diesel', 'active', '2017-10-05 17:57:02', '2017-10-05 17:57:02', NULL),
(156, 3, 'GT-01', 'Garbage Truck', 'Isuzu', '4HG', 'no', '4 Cu.m', '2017-10-05 00:00:00', 'Special Support', 'NA', 'NA', 'NA', 'NPR71L7403492', 'GT-01', 'Orange', 'Diesel', 'active', '2017-10-05 17:58:26', '2017-10-05 17:58:26', NULL),
(157, 3, 'CD-01', 'Crawler Dumptruck', 'Murooka', 'MST-1000', 'yes', '115HP', '2017-10-05 00:00:00', 'Special Support', 'NA', 'NA', 'NA', 'NA', 'CD-01', 'Orange', 'Diesel', 'active', '2017-10-05 18:00:03', '2017-10-05 18:00:03', NULL),
(158, 3, 'LL-01', 'Laser level', 'Topcon', 'RL-H3C', 'yes', '300 meter radius', '2017-10-05 00:00:00', 'Surveying Equipment', 'NA', 'NA', 'NA', 'NA', 'LL-01', 'Orange', 'NA', 'active', '2017-10-05 19:56:22', '2017-10-05 19:56:22', NULL),
(159, 3, 'LL-02', 'Laser level', 'Topcon', 'RL-H3C', 'no', '300 meter radius', '2017-10-05 00:00:00', 'Surveying Equipment', 'NA', 'NA', 'NA', 'NA', 'LL-02', 'Orange', 'NA', 'active', '2017-10-05 19:57:26', '2017-10-05 19:57:26', NULL),
(160, 3, 'LL-03', 'Laser level', 'Topcon', 'RL-H3C', 'no', '300 meter radius', '2017-10-05 00:00:00', 'Surveying Equipment', 'NA', 'NA', 'NA', 'NA', 'LL-03', 'Orange', 'NA', 'active', '2017-10-05 19:58:20', '2017-10-05 19:58:20', NULL),
(161, 3, 'LL-04', 'Laser level', 'Topcon', 'RL-H4C', 'no', '300 meter radius', '2017-10-05 00:00:00', 'Surveying Equipment', 'NA', 'NA', 'NA', 'NA', 'LL-04', 'Orange', 'NA', 'active', '2017-10-05 19:59:43', '2017-10-05 19:59:43', NULL),
(162, 3, 'LL-05', 'Laser level', 'Topcon', 'RL-H4C', 'no', '300 meter radius', '2017-10-05 00:00:00', 'Surveying Equipment', 'NA', 'NA', 'NA', 'NA', 'LL-05', 'Orange', 'NA', 'active', '2017-10-05 20:00:43', '2017-10-05 20:00:43', NULL),
(163, 3, 'BM-01', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-01', 'Orange', 'Unleaded', 'active', '2017-10-05 20:45:36', '2017-10-05 20:45:36', NULL),
(164, 3, 'BM-02', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-02', 'Orange', 'Unleaded', 'active', '2017-10-05 20:46:51', '2017-10-05 20:46:51', NULL),
(165, 3, 'BM-03', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-03', 'Orange', 'Unleaded', 'active', '2017-10-05 20:48:01', '2017-10-05 20:48:01', NULL),
(166, 3, 'BM-04', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-04', 'Orange', 'Unleaded', 'active', '2017-10-05 20:49:02', '2017-10-05 20:49:02', NULL),
(167, 3, 'BM-05', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-05', 'Orange', 'Unleaded', 'active', '2017-10-05 20:50:35', '2017-10-05 21:07:52', NULL),
(168, 3, 'BM-06', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-06', 'Orange', 'Unleaded', 'active', '2017-10-05 21:26:59', '2017-10-05 21:26:59', NULL),
(169, 3, 'BM-07', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-07', 'Orange', 'Unleaded', 'active', '2017-10-05 21:42:24', '2017-10-05 21:42:24', NULL),
(170, 3, 'BM-08', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-08', 'Orange', 'Unleaded', 'active', '2017-10-05 21:44:11', '2017-10-05 21:44:11', NULL),
(171, 3, 'BM-09', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-09', 'Orange', 'Unleaded', 'active', '2017-10-05 21:45:05', '2017-10-05 21:45:05', NULL),
(172, 3, 'BM-10', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-10', 'Orange', 'Unleaded', 'active', '2017-10-05 21:46:04', '2017-10-05 21:46:04', NULL),
(173, 3, 'BM-11', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-11', 'Orange', 'Unleaded', 'active', '2017-10-05 21:49:47', '2017-10-05 21:49:47', NULL),
(174, 3, 'BM-12', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-12', 'Orange', 'Unleaded', 'active', '2017-10-05 21:50:48', '2017-10-05 21:50:48', NULL),
(175, 3, 'BM-14', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-14', 'Orange', 'Unleaded', 'active', '2017-10-05 21:51:37', '2017-10-05 21:51:37', NULL),
(176, 3, 'BM-15', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-15', 'Orange', 'Unleaded', 'active', '2017-10-05 21:52:37', '2017-10-05 21:52:37', NULL),
(177, 3, 'BM-16', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-16', 'Orange', 'Unleaded', 'active', '2017-10-05 21:53:23', '2017-10-05 21:53:23', NULL),
(178, 3, 'BM-17', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-17', 'Orange', 'Unleaded', 'active', '2017-10-05 21:54:22', '2017-10-05 21:54:22', NULL),
(179, 3, 'BM-18', 'Bagger Mixer', 'Robin', 'EY28B', 'no', '7.5HP', '2017-10-05 00:00:00', 'Concreting Equipment', 'NA', 'NA', 'NA', 'NA', 'BM-18', 'Orange', 'Unleaded', 'active', '2017-10-05 21:55:33', '2017-10-05 21:55:33', NULL),
(180, 3, 'CS-01', 'Chainsaw', 'STiHL', '070', 'no', 'NA', '2017-10-05 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'CS-01', 'Orange', 'Unleaded', 'active', '2017-10-05 22:02:31', '2017-10-05 22:02:31', NULL),
(181, 3, 'CS-02', 'Chainsaw', 'STiHL', '070', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'CS-02', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 16:14:33', '2017-10-06 16:14:33', NULL),
(182, 3, 'CS-03', 'Chainsaw', 'STiHL', '070', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'CS-03', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 16:15:30', '2017-10-06 16:15:30', NULL),
(183, 3, 'CS-04', 'Chainsaw', 'STiHL', '070', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'CS-04', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 16:16:36', '2017-10-06 16:16:36', NULL),
(184, 3, 'CS-05', 'Chainsaw', 'STiHL', '070', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'CS-05', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 16:17:31', '2017-10-06 16:17:31', NULL),
(185, 3, 'CG-01', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-01', 'Metal', 'NA', 'active', '2017-10-06 16:19:04', '2017-10-06 16:19:04', NULL),
(186, 3, 'CG-02', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-02', 'Metal', 'NA', 'active', '2017-10-06 16:20:28', '2017-10-06 16:20:28', NULL),
(187, 3, 'CG-03', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-03', 'Metal', 'NA', 'active', '2017-10-06 16:21:25', '2017-10-06 16:21:25', NULL),
(188, 3, 'CG-04', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-04', 'Metal', 'NA', 'active', '2017-10-06 16:22:22', '2017-10-06 16:22:22', NULL),
(189, 3, 'CG-05', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-05', 'Metal', 'NA', 'active', '2017-10-06 16:23:50', '2017-10-06 16:23:50', NULL),
(190, 3, 'CG-06', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-06', 'Metal', 'NA', 'active', '2017-10-06 16:25:49', '2017-10-06 16:25:49', NULL),
(191, 3, 'CG-07', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-07', 'Metal', 'NA', 'active', '2017-10-06 16:26:46', '2017-10-06 16:26:46', NULL),
(192, 3, 'CG-08', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-08', 'Metal', 'NA', 'active', '2017-10-06 16:28:30', '2017-10-06 16:28:30', NULL),
(193, 3, 'CG-09', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-09', 'Metal', 'NA', 'active', '2017-10-06 16:29:27', '2017-10-06 16:29:27', NULL),
(194, 3, 'CG-10', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-01', 'Metal', 'NA', 'active', '2017-10-06 16:31:10', '2017-10-06 16:31:10', NULL),
(195, 3, 'CG-11', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-11', 'Metal', 'NA', 'active', '2017-10-06 16:32:21', '2017-10-06 16:32:21', NULL),
(196, 3, 'CG-12', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-12', 'Metal', 'NA', 'active', '2017-10-06 16:40:56', '2017-10-06 16:40:56', NULL),
(197, 3, 'CG-14', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-14', 'Metal', 'NA', 'active', '2017-10-06 16:41:59', '2017-10-06 16:41:59', NULL),
(198, 3, 'CG-15', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-15', 'Metal', 'NA', 'active', '2017-10-06 16:42:55', '2017-10-06 16:42:55', NULL),
(199, 3, 'CG-16', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-16', 'Metal', 'NA', 'active', '2017-10-06 16:43:43', '2017-10-06 16:43:43', NULL),
(200, 3, 'CG-17', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-17', 'Metal', 'NA', 'active', '2017-10-06 16:44:57', '2017-10-06 16:44:57', NULL),
(201, 3, 'CG-18', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-18', 'Metal', 'NA', 'active', '2017-10-06 16:45:51', '2017-10-06 16:45:51', NULL),
(202, 3, 'CG-19', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-19', 'Metal', 'NA', 'active', '2017-10-06 16:46:54', '2017-10-06 16:46:54', NULL),
(203, 3, 'CG-20', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-20', 'Metal', 'NA', 'active', '2017-10-06 16:48:08', '2017-10-06 16:48:08', NULL),
(204, 3, 'CG-21', 'Chipping gun', 'Toku', 'TCA-7', 'no', '16mm shaft', '2017-10-06 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'CG-21', 'Metal', 'NA', 'active', '2017-10-06 16:49:02', '2017-10-06 16:49:02', NULL),
(205, 3, 'CV-01', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NAn', 'NA', 'CV-01', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 16:55:36', '2017-10-06 16:55:36', NULL),
(206, 3, 'CV-02', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-02', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 16:56:57', '2017-10-06 16:56:57', NULL),
(207, 3, 'CV-03', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-03', 'Orange', 'NA', 'active', '2017-10-06 17:01:45', '2017-10-06 17:01:45', NULL),
(208, 3, 'CV-04', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-04', 'Orange', 'NA', 'active', '2017-10-06 17:02:58', '2017-10-06 17:02:58', NULL),
(209, 3, 'CV-05', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-05', 'Orange', 'NA', 'active', '2017-10-06 17:04:25', '2017-10-06 17:04:25', NULL),
(210, 3, 'CV-06', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-06', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:05:27', '2017-10-06 22:00:26', NULL),
(211, 3, 'CV-21', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-07', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:07:28', '2017-10-06 21:59:59', NULL),
(212, 3, 'CV-07', 'Concrete Vibrator', 'Robin', 'EY20', 'yes', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-07', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:09:53', '2017-10-06 21:59:08', NULL),
(213, 3, 'CV-08', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-08', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:16:03', '2017-10-06 21:58:31', NULL),
(214, 3, 'CV-09', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-09', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:30:49', '2017-10-06 21:58:17', NULL),
(215, 3, 'CV-10', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-10', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:33:15', '2017-10-06 21:58:02', NULL),
(216, 3, 'CV-11', 'Concrete Vibrator', 'Robin', 'EX17', 'no', '6.0', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-11', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:34:18', '2017-10-06 21:57:46', NULL),
(217, 3, 'CV-12', 'Concrete Vibrator', 'Robin', 'EX17', 'no', '6.0', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-12', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 17:37:50', '2017-10-06 21:57:33', NULL),
(218, 3, 'CV-14', 'Concrete Vibrator', 'Robin', 'EX17', 'no', '6.0', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-14', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:47:39', '2017-10-06 21:57:19', NULL),
(219, 3, 'CV-15', 'Concrete Vibrator', 'Robin', 'EX17', 'no', '6.0', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-15', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:49:41', '2017-10-06 21:57:07', NULL);
INSERT INTO `equipments` (`id`, `created_user_id`, `equipment_code`, `equipment_description`, `equipment_make`, `equipment_model`, `for_hauling`, `capacity`, `equipment_date`, `equipment_type`, `engine_displacement`, `engine_code`, `engine_no`, `chassis_no`, `body_no`, `color`, `fuel`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(220, 3, 'CV-16', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-16', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:50:49', '2017-10-06 21:56:49', NULL),
(221, 3, 'CV-17', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-17', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:51:47', '2017-10-06 21:56:33', NULL),
(222, 3, 'CV-18', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-18', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:52:49', '2017-10-06 21:56:18', NULL),
(223, 3, 'CV-19', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-19', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:54:49', '2017-10-06 21:56:03', NULL),
(224, 3, 'CV-20', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-20', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 21:55:49', '2017-10-06 21:55:49', NULL),
(225, 3, 'CV-22', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-22', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:02:10', '2017-10-06 22:02:10', NULL),
(226, 3, 'CV-23', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-23', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:10:44', '2017-10-06 22:10:44', NULL),
(227, 3, 'CV-24', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-24', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:12:08', '2017-10-06 22:12:08', NULL),
(228, 3, 'CV-25', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-25', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:13:44', '2017-10-06 22:13:44', NULL),
(229, 3, 'CV-25', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-25', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:18:14', '2017-10-06 22:18:14', NULL),
(230, 3, 'CV-26', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-26', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:19:36', '2017-10-06 22:19:36', NULL),
(231, 3, 'CV-27', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-27', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:20:32', '2017-10-06 22:20:32', NULL),
(232, 3, 'CV-28', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-28', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:21:53', '2017-10-06 22:21:53', NULL),
(233, 3, 'CV-29', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-29', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:23:17', '2017-10-06 22:23:17', NULL),
(234, 3, 'CV-30', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-30', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:24:15', '2017-10-06 22:24:15', NULL),
(235, 3, 'CV-31', 'Concrete Vibrator', 'Robin', 'EY20', 'no', '5HP', '2017-10-06 00:00:00', 'Specialty Equipment', 'NA', 'NA', 'NA', 'NA', 'CV-31', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-06 22:25:40', '2017-10-06 22:25:40', NULL),
(236, 3, 'CM-01', 'Couring Machine', 'Hilti', 'DD-130', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'CM-01', 'Orange', 'NA', 'active', '2017-10-06 22:41:17', '2017-10-06 22:43:03', NULL),
(237, 3, 'DH-01', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-01', 'Metal', 'NA', 'active', '2017-10-06 22:51:53', '2017-10-06 22:51:53', NULL),
(238, 3, 'DH-02', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-02', 'Orange', 'NA', 'active', '2017-10-06 22:54:06', '2017-10-06 22:54:06', NULL),
(239, 3, 'DH-03', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-03', 'Metal', 'NA', 'active', '2017-10-06 22:55:47', '2017-10-06 22:55:47', NULL),
(240, 3, 'DH-04', 'Demolition Hammer', 'Makita', 'HM1201', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-04', 'Metal', 'NA', 'active', '2017-10-06 22:58:53', '2017-10-06 22:58:53', NULL),
(241, 3, 'DH-05', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-05', 'Metal', 'NA', 'active', '2017-10-06 23:13:58', '2017-10-06 23:13:58', NULL),
(242, 3, 'DH-06', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-06', 'Metal', 'NA', 'active', '2017-10-06 23:17:16', '2017-10-06 23:17:16', NULL),
(243, 3, 'DH-07', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-06 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-07', 'Metal', 'NA', 'active', '2017-10-06 23:19:57', '2017-10-06 23:19:57', NULL),
(244, 3, 'DH-08', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-08', 'Metal', 'NA', 'active', '2017-10-07 20:30:28', '2017-10-07 20:30:28', NULL),
(245, 3, 'DH-09', 'Demolition Hammer', 'Makita', 'HM1201', 'yes', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-09', 'Metal', 'NA', 'active', '2017-10-07 20:34:59', '2017-10-07 20:34:59', NULL),
(246, 3, 'DH-10', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'NA', 'Metal', 'NA', 'active', '2017-10-07 20:36:26', '2017-10-07 20:36:26', NULL),
(247, 3, 'DH-11', 'Demolition Hammer', 'Makita', 'HM1201', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-11', 'Metal', 'NA', 'active', '2017-10-07 20:37:35', '2017-10-07 20:37:35', NULL),
(248, 3, 'DH-12', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-12', 'Metal', 'NA', 'active', '2017-10-07 20:39:34', '2017-10-07 20:39:34', NULL),
(249, 3, 'DH-14', 'Demolition Hammer', 'Makita', 'TE-800', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-14', 'Metal', 'NA', 'active', '2017-10-07 20:40:56', '2017-10-07 20:40:56', NULL),
(250, 3, 'DH-15', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-15', 'Metal', 'NA', 'active', '2017-10-07 20:43:54', '2017-10-07 20:43:54', NULL),
(251, 3, 'DH-16', 'Demolition Hammer', 'Makita', 'HM1201', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-16', 'Metal', 'NA', 'active', '2017-10-07 20:48:49', '2017-10-07 20:48:49', NULL),
(252, 3, 'DH-17', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-17', 'Metal', 'NA', 'active', '2017-10-07 21:38:24', '2017-10-07 21:38:24', NULL),
(253, 3, 'DH-18', 'Demolition Hammer', 'Bosch', 'GSH-27VC', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-18', 'Metal', 'NA', 'active', '2017-10-07 21:39:34', '2017-10-07 21:39:34', NULL),
(254, 3, 'DH-19', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-07 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-19', 'Metal', 'NA', 'active', '2017-10-07 21:41:21', '2017-10-07 21:41:21', NULL),
(255, 3, 'DH-20', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-20', 'Metal', 'NA', 'active', '2017-10-09 20:02:31', '2017-10-09 20:02:31', NULL),
(256, 3, 'DH-21', 'Demolition Hammer', 'Makita', 'HM1306', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-21', 'Metal', 'NA', 'active', '2017-10-09 20:03:58', '2017-10-09 20:03:58', NULL),
(257, 3, 'DH-22', 'Demolition Hammer', 'Makita', 'HM0810T', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-22', 'Metal', 'NA', 'active', '2017-10-09 20:05:34', '2017-10-09 20:05:34', NULL),
(258, 3, 'DH-23', 'Demolition Hammer', 'Makita', 'HM0810T', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-23', 'Metal', 'NA', 'active', '2017-10-09 20:06:26', '2017-10-09 20:06:26', NULL),
(259, 3, 'DH-24', 'Demolition Hammer', 'Makita', 'HM1201', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-24', 'Metal', 'NA', 'active', '2017-10-09 20:08:47', '2017-10-09 20:08:47', NULL),
(260, 3, 'DH-25', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-25', 'Metal', 'NA', 'active', '2017-10-09 20:09:39', '2017-10-09 20:09:39', NULL),
(261, 3, 'DH-26', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-26', 'Metal', 'NA', 'active', '2017-10-09 20:11:01', '2017-10-09 20:11:01', NULL),
(262, 3, 'DH-27', 'Demolition Hammer', 'Hilti', 'TE-800', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-27', 'Metal', 'NA', 'active', '2017-10-09 20:11:58', '2017-10-09 20:11:58', NULL),
(263, 3, 'DH-28', 'Demolition Hammer', 'Makita', 'HM0810T', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'DH-28', 'Metal', 'NA', 'active', '2017-10-09 20:13:11', '2017-10-09 20:13:11', NULL),
(264, 3, 'EV-01', 'External VIbrator', 'Exen', 'Ekca', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'NA', 'EV-01', 'NA', 'active', '2017-10-09 20:15:12', '2017-10-09 20:15:12', NULL),
(265, 3, 'EV-02', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-02', 'Metal', 'NA', 'active', '2017-10-09 20:16:27', '2017-10-09 20:16:27', NULL),
(266, 3, 'EV-03', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-03', 'Metal', 'NA', 'active', '2017-10-09 20:17:36', '2017-10-09 20:17:36', NULL),
(267, 3, 'EV-04', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-04', 'Metal', 'NA', 'active', '2017-10-09 20:18:32', '2017-10-09 20:18:32', NULL),
(268, 3, 'EV-05', 'External VIbrator', 'Exen', 'Ekca', 'yes', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-05', 'Metal', 'NA', 'active', '2017-10-09 20:19:25', '2017-10-09 20:19:25', NULL),
(269, 3, 'EV-06', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-06', 'Metal', 'NA', 'active', '2017-10-09 20:20:37', '2017-10-09 20:20:37', NULL),
(270, 3, 'EV-07', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'NA', 'Metal', 'NA', 'active', '2017-10-09 20:21:27', '2017-10-09 20:21:27', NULL),
(271, 3, 'EV-08', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-08', 'Metal', 'NA', 'active', '2017-10-09 20:22:21', '2017-10-09 20:22:21', NULL),
(272, 3, 'EV-09', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-09', 'Metal', 'NA', 'active', '2017-10-09 20:23:34', '2017-10-09 20:23:34', NULL),
(273, 3, 'EV-10', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-10', 'Metal', 'NA', 'active', '2017-10-09 20:24:25', '2017-10-09 20:24:25', NULL),
(274, 3, 'EV-11', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-11', 'Metal', 'NA', 'active', '2017-10-09 20:25:11', '2017-10-09 20:25:11', NULL),
(275, 3, 'EV-12', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NAn', 'NA', 'NA', 'EV-12', 'Metal', 'NA', 'active', '2017-10-09 20:26:14', '2017-10-09 20:26:14', NULL),
(276, 3, 'EV-14', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-14', 'Metal', 'NA', 'active', '2017-10-09 20:27:48', '2017-10-09 20:27:48', NULL),
(277, 3, 'EV-15', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-15', 'Metal', 'NA', 'active', '2017-10-09 20:30:04', '2017-10-09 20:30:04', NULL),
(278, 3, 'EV-16', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-16', 'Metal', 'NA', 'active', '2017-10-09 20:30:54', '2017-10-09 20:30:54', NULL),
(279, 3, 'EV-17', 'External VIbrator', 'Exen', 'Ekca', 'no', '220V', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'EV-17', 'Metal', 'NA', 'active', '2017-10-09 20:31:34', '2017-10-09 20:31:34', NULL),
(280, 3, 'HD-01', 'Hammer Drill Rotary', 'Makita', 'HR2810', 'yes', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-01', 'Metal', 'NA', 'active', '2017-10-09 20:32:53', '2017-10-09 20:32:53', NULL),
(281, 3, 'HD-02', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-02', 'Metal', 'NA', 'active', '2017-10-09 20:33:44', '2017-10-09 20:33:44', NULL),
(282, 3, 'HD-03', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-03', 'Metal', 'NA', 'active', '2017-10-09 20:34:44', '2017-10-09 20:34:44', NULL),
(283, 3, 'HD-04', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'NA', 'Metal', 'NA', 'active', '2017-10-09 20:35:32', '2017-10-09 20:35:32', NULL),
(284, 3, 'HD-05', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-05', 'Metal', 'NA', 'active', '2017-10-09 20:37:14', '2017-10-09 20:37:14', NULL),
(285, 3, 'HD-06', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-06', 'Metal', 'NA', 'active', '2017-10-09 20:38:06', '2017-10-09 20:38:06', NULL),
(286, 3, 'HD-07', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-07', 'Metal', 'NA', 'active', '2017-10-09 20:39:00', '2017-10-09 20:39:00', NULL),
(287, 3, 'HD-08', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-08', 'Metal', 'NA', 'active', '2017-10-09 20:40:21', '2017-10-09 20:40:21', NULL),
(288, 3, 'HD-09', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-09', 'Metal', 'NA', 'active', '2017-10-09 20:47:07', '2017-10-09 20:47:07', NULL),
(289, 3, 'HD-10', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-10', 'Metal', 'NA', 'active', '2017-10-09 20:47:49', '2017-10-09 20:47:49', NULL),
(290, 3, 'HD-11', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-11', 'Metal', 'NA', 'active', '2017-10-09 20:48:54', '2017-10-09 20:48:54', NULL),
(291, 3, 'HD-12', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-12', 'Metal', 'NA', 'active', '2017-10-09 20:49:39', '2017-10-09 20:49:39', NULL),
(292, 3, 'HD-14', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-14', 'Metal', 'NA', 'active', '2017-10-09 20:50:25', '2017-10-09 20:50:25', NULL),
(293, 3, 'HD-15', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-15', 'Metal', 'NA', 'active', '2017-10-09 20:51:29', '2017-10-09 20:51:29', NULL),
(294, 3, 'HD-16', 'Hammer Drill Rotary', 'Hilti', 'TE-30', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-16', 'Metal', 'NA', 'active', '2017-10-09 20:52:15', '2017-10-09 20:52:15', NULL),
(295, 3, 'HD-17', 'Hammer Drill Rotary', 'Hilti', 'TE-02', 'no', 'NA', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'HD-17', 'Metal', 'NA', 'active', '2017-10-09 20:53:18', '2017-10-09 20:53:18', NULL),
(296, 3, 'JH-01', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-01', 'Metal', 'NA', 'active', '2017-10-09 20:55:31', '2017-10-09 20:55:31', NULL),
(297, 3, 'JH-02', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-02', 'Metal', 'NA', 'active', '2017-10-09 20:57:42', '2017-10-09 20:57:42', NULL),
(298, 3, 'JH-03', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-03', 'Metal', 'NA', 'active', '2017-10-09 20:58:33', '2017-10-09 21:12:41', NULL),
(299, 3, 'JH-04', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-04', 'Metal', 'NA', 'active', '2017-10-09 20:59:17', '2017-10-09 20:59:17', NULL),
(300, 3, 'JH-05', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-05', 'Metal', 'NA', 'active', '2017-10-09 21:00:03', '2017-10-09 21:00:03', NULL),
(301, 3, 'JH-06', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-06', 'Metal', 'NA', 'active', '2017-10-09 21:00:47', '2017-10-09 21:00:47', NULL),
(302, 3, 'JH-07', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-07', 'Metal', 'NA', 'active', '2017-10-09 21:01:41', '2017-10-09 21:01:41', NULL),
(303, 3, 'JH-08', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'JH-08', 'Metal', 'NA', 'active', '2017-10-09 21:07:07', '2017-10-09 21:07:07', NULL),
(304, 3, 'JH- 09', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-09', 'Metal', 'NA', 'active', '2017-10-09 21:12:21', '2017-10-09 21:12:21', NULL),
(305, 3, 'JH-10', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-10', 'Metal', 'NA', 'active', '2017-10-09 21:13:30', '2017-10-09 21:13:30', NULL),
(306, 3, 'JH-11', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-11', 'Metal', 'NA', 'active', '2017-10-09 21:14:15', '2017-10-09 21:14:15', NULL),
(307, 3, 'JH-12', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-12', 'Metal', 'NA', 'active', '2017-10-09 21:15:20', '2017-10-09 21:15:20', NULL),
(308, 3, 'JH-14', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-14', 'Metal', 'NA', 'active', '2017-10-09 21:16:07', '2017-10-09 21:16:07', NULL),
(309, 3, 'JH-15', 'Demolition Hammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-15', 'Metal', 'NA', 'active', '2017-10-09 21:16:49', '2017-10-09 21:16:49', NULL),
(310, 3, 'JH-16', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-16', 'Metal', 'NA', 'active', '2017-10-09 21:17:25', '2017-10-09 21:17:25', NULL),
(311, 3, 'JH-17', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-17', 'Metal', 'NA', 'active', '2017-10-09 21:18:13', '2017-10-09 21:18:13', NULL),
(312, 3, 'JH-18', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-18', 'Metal', 'NA', 'active', '2017-10-09 21:26:43', '2017-10-09 21:26:43', NULL),
(313, 3, 'JH-19', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-19', 'Metal', 'NA', 'active', '2017-10-09 21:27:33', '2017-10-09 21:27:33', NULL),
(314, 3, 'JH-20', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-20', 'Metal', 'NA', 'active', '2017-10-09 21:30:20', '2017-10-09 21:30:20', NULL),
(315, 3, 'JH-21', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-21', 'Metal', 'NA', 'active', '2017-10-09 21:46:26', '2017-10-09 21:46:26', NULL),
(316, 3, 'JH-22', 'JackHammer', 'Gardner Denver', 'B87C', 'no', '32mmx160mm', '2017-10-09 00:00:00', 'Air Compressor Accessories', 'NA', 'NA', 'NA', 'NA', 'JH-22', 'Metal', 'NA', 'active', '2017-10-09 21:47:16', '2017-10-09 21:47:16', NULL),
(317, 3, 'MG-01', 'Marble Grinder', 'NA', 'YCIIM-4', 'no', '3HP', '2017-10-09 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'MG-01', 'Metal', 'NA', 'active', '2017-10-09 21:49:43', '2017-10-09 21:49:43', NULL),
(318, 3, 'MG-02', 'Marble Grinder', 'NA', 'YCIIM-4', 'no', '3HP/220V', '2017-10-09 00:00:00', 'Marble Grinder', 'NA', 'NA', 'NA', 'NA', 'MG-02', 'Metal', 'NA', 'active', '2017-10-09 21:52:04', '2017-10-09 21:52:04', NULL),
(319, 3, 'MP-01', 'Mechanical Pump', 'Robin', 'NA', 'no', 'NA', '2017-10-10 00:00:00', 'Mechanical Pump', 'NA', 'NA', 'NA', 'NA', 'MP-01', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-10 20:20:43', '2017-10-10 20:20:43', NULL),
(320, 3, 'MP-02', 'Mechanical Pump', 'Robin', 'NA', 'no', 'NA', '2017-10-10 00:00:00', 'Mechanical Pump', 'NA', 'NA', 'NA', 'NA', 'MP-02', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-10 20:22:15', '2017-10-10 20:22:15', NULL),
(321, 3, 'MP-03', 'Mechanical Pump', 'Robin', 'NA', 'no', 'NA', '2017-10-10 00:00:00', 'Mechanical Pump', 'NA', 'NA', 'NA', 'NA', 'MP-03', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-10 20:36:51', '2017-10-10 20:36:51', NULL),
(322, 3, 'MP-04', 'Mechanical Pump', 'Robin', 'NA', 'no', 'NA', '2017-10-10 00:00:00', 'Mechanical Pump', 'NA', 'NA', 'NA', 'NA', 'MP-04', 'Orange', 'Unleaded Gasoline', 'active', '2017-10-10 21:59:09', '2017-10-10 21:59:09', NULL),
(323, 3, 'PC-01', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'PC-01', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:01:35', '2017-10-10 22:01:35', NULL),
(324, 3, 'PC-02', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'pc-02', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:03:44', '2017-10-10 22:03:44', NULL),
(325, 3, 'PC-03', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'PL-03', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:04:52', '2017-10-10 22:04:52', NULL),
(326, 3, 'PC-04', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'PC-04', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:06:17', '2017-10-10 22:06:17', NULL),
(327, 3, 'PC-05', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'PC-05', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:09:07', '2017-10-10 22:09:07', NULL),
(328, 3, 'PC-06', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'PC-06', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:10:34', '2017-10-10 22:10:34', NULL),
(329, 3, 'PC-07', 'Plate Compactor', 'Robin', 'EY20D', 'no', 'NA', '2017-10-10 00:00:00', 'Plate Compactor', 'NA', 'NA', 'NA', 'NA', 'PC-07', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 22:12:01', '2017-10-10 22:12:01', NULL),
(330, 3, 'PW-01', 'Power wash', 'Yamada', 'YC90L-4', 'no', 'NA', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-01', 'Metal', 'NA', 'active', '2017-10-10 22:30:22', '2017-10-10 23:13:50', NULL),
(331, 3, 'PW-02', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-02', 'Metal', 'NA', 'active', '2017-10-10 22:31:43', '2017-10-10 23:14:00', NULL),
(332, 3, 'PW-03', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-03', 'Metal', 'NA', 'active', '2017-10-10 22:32:46', '2017-10-10 23:14:10', NULL),
(333, 3, 'PW-04', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-04', 'Metal', 'NA', 'active', '2017-10-10 22:33:37', '2017-10-10 23:14:20', NULL),
(334, 3, 'PW-05', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-05', 'Metal', 'NA', 'active', '2017-10-10 22:34:30', '2017-10-10 23:14:29', NULL),
(335, 3, 'PW-06', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-06', 'Metal', 'NA', 'active', '2017-10-10 22:35:30', '2017-10-10 23:14:45', NULL),
(336, 3, 'PW-07', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-07', 'Metal', 'NA', 'active', '2017-10-10 22:36:20', '2017-10-10 23:12:16', NULL),
(337, 3, 'PW-08', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-08', 'Metal', 'NA', 'active', '2017-10-10 22:37:36', '2017-10-10 23:11:59', NULL),
(338, 3, 'PW-09', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-09', 'Metal', 'NA', 'active', '2017-10-10 23:04:36', '2017-10-10 23:11:45', NULL),
(339, 3, 'PW-10', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'NA', 'Metal', 'NA', 'active', '2017-10-10 23:10:00', '2017-10-10 23:11:28', NULL),
(340, 3, 'PW-11', 'Power wash', 'Yamada', 'YC90L-4', 'no', 'NA', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-11', 'Metal', 'NA', 'active', '2017-10-10 23:11:13', '2017-10-10 23:11:13', NULL),
(341, 3, 'PW-12', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-12', 'Metal', 'NA', 'active', '2017-10-10 23:15:36', '2017-10-10 23:15:36', NULL),
(342, 3, 'PW-14', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-14', 'Metal', 'NA', 'active', '2017-10-10 23:16:27', '2017-10-10 23:16:27', NULL),
(343, 3, 'PW-15', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-15', 'Metal', 'NA', 'active', '2017-10-10 23:17:20', '2017-10-10 23:17:20', NULL),
(344, 3, 'PW-16', 'Power wash', 'Yamada', 'YC90L-4', 'no', '1.5HP', '2017-10-10 00:00:00', 'Power wash', 'NA', 'NA', 'NA', 'NA', 'PW-16', 'Metal', 'NA', 'active', '2017-10-10 23:18:17', '2017-10-10 23:18:17', NULL),
(345, 3, 'RC-01', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-01', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:19:30', '2017-10-10 23:19:30', NULL),
(346, 3, 'RC-02', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-02', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:20:10', '2017-10-10 23:20:10', NULL),
(347, 3, 'RC-03', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-03', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:20:54', '2017-10-10 23:20:54', NULL),
(348, 3, 'RC-04', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-04', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:21:38', '2017-10-10 23:21:38', NULL),
(349, 3, 'RC-05', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-05', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:22:21', '2017-10-10 23:22:21', NULL),
(350, 3, 'RC-06', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-06', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:23:16', '2017-10-10 23:23:16', NULL),
(351, 3, 'RC-07', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-07', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:24:33', '2017-10-10 23:24:33', NULL),
(352, 3, 'RC-07', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-07', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:25:19', '2017-10-10 23:25:19', NULL),
(353, 3, 'RC-08', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-08', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:26:26', '2017-10-10 23:26:26', NULL),
(354, 3, 'RC-09', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-09', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:27:40', '2017-10-10 23:27:40', NULL),
(355, 3, 'RC-10', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-10', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:29:13', '2017-10-10 23:29:13', NULL),
(356, 3, 'RC-11', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-11', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:30:52', '2017-10-10 23:30:52', NULL),
(357, 3, 'RC-12', 'Rammer Compactor', 'Robin', 'EY20', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-12', 'Metal', 'u', 'active', '2017-10-10 23:31:41', '2017-10-10 23:31:41', NULL),
(358, 3, 'RC-14', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-14', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:32:36', '2017-10-10 23:32:36', NULL),
(359, 3, 'RC-15', 'Rammer Compactor', 'Robin', 'EY20D', 'no', '5HP', '2017-10-10 00:00:00', 'Rammer Compactor', 'NA', 'NA', 'NA', 'NA', 'RC-15', 'Metal', 'Unleaded Gasoline', 'active', '2017-10-10 23:33:44', '2017-10-10 23:33:44', NULL),
(360, 3, 'SM-01', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-10 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-01', 'Metal', 'NA', 'active', '2017-10-10 23:35:33', '2017-10-10 23:35:33', NULL),
(361, 3, 'SM-02', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-10 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-02', 'Metal', 'NA', 'active', '2017-10-10 23:36:31', '2017-10-10 23:36:31', NULL),
(362, 3, 'SM-03', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-10 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-03', 'Metal', 'NA', 'active', '2017-10-10 23:37:41', '2017-10-10 23:37:41', NULL),
(363, 3, 'SM-04', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-10 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-04', 'Metal', 'NA', 'active', '2017-10-10 23:38:28', '2017-10-10 23:38:28', NULL),
(364, 3, 'SM-05', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-10 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-05', 'Metal', 'NA', 'active', '2017-10-10 23:39:14', '2017-10-10 23:39:14', NULL),
(365, 3, 'SM-06', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-06', 'Metal', 'NA', 'active', '2017-10-13 20:27:44', '2017-10-13 20:27:44', NULL),
(366, 3, 'SM-07', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-07', 'Metal', 'NA', 'active', '2017-10-13 20:28:40', '2017-10-13 20:28:40', NULL),
(367, 3, 'SM-08', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-08', 'Metal', 'NA', 'active', '2017-10-13 20:30:38', '2017-10-13 20:30:38', NULL),
(368, 3, 'SM-09', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-09', 'Metal', 'NA', 'active', '2017-10-13 20:31:33', '2017-10-13 20:31:33', NULL),
(369, 3, 'SM-10', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-10', 'Metal', 'NA', 'active', '2017-10-13 20:33:00', '2017-10-13 20:33:00', NULL),
(370, 3, 'SM-11', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-11', 'Metal', 'NA', 'active', '2017-10-13 20:36:14', '2017-10-13 20:36:14', NULL),
(371, 3, 'SM-12', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-12', 'Metal', 'NA', 'active', '2017-10-13 20:37:00', '2017-10-13 20:37:00', NULL),
(372, 3, 'SM-14', 'Sewing Machine', 'Yaohan', 'F300A', 'no', 'NA', '2017-10-13 00:00:00', 'Sewing machine', 'NA', 'NA', 'NA', 'NA', 'SM-14', 'Metal', 'NA', 'active', '2017-10-13 20:37:45', '2017-10-13 20:37:45', NULL),
(373, 3, 'SP-01', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-01', 'Orange', 'NA', 'active', '2017-10-13 20:41:35', '2017-10-13 20:41:35', NULL),
(374, 3, 'SP-02', 'Submersible Pump', 'Tsurumi', 'KTZ', 'yes', '7.5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-02', 'Orange', 'NA', 'active', '2017-10-13 20:45:26', '2017-10-13 20:45:26', NULL),
(375, 3, 'SP-03', 'Submersible Pump', 'Tsurumi', 'KTZ', 'yes', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-03', 'Orange', 'NA', 'active', '2017-10-13 20:51:11', '2017-10-13 20:51:11', NULL),
(376, 3, 'SP-04', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-04', 'Orange', 'NA', 'active', '2017-10-13 20:52:05', '2017-10-13 20:52:05', NULL),
(377, 3, 'SP-05', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-05', 'Orange', 'NA', 'active', '2017-10-13 20:52:54', '2017-10-13 20:52:54', NULL),
(378, 3, 'SP-06', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-06', 'Orange', 'NA', 'active', '2017-10-13 20:54:16', '2017-10-13 20:54:16', NULL),
(379, 3, 'SP-07', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-07', 'Orange', 'NA', 'active', '2017-10-13 20:55:19', '2017-10-13 20:55:19', NULL),
(380, 3, 'SP-08', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-08', 'Orange', 'NA', 'active', '2017-10-13 20:56:32', '2017-10-13 20:56:32', NULL),
(381, 3, 'SP-09', 'Submersible Pump', 'Stainless', 'NA', 'no', '1 phase', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-09', 'Orange', 'NA', 'active', '2017-10-13 20:57:50', '2017-10-13 20:57:50', NULL),
(382, 3, 'SP-10', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-10', 'Orange', 'NA', 'active', '2017-10-13 20:59:42', '2017-10-13 20:59:42', NULL),
(383, 3, 'SP-11', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-11', 'Orange', 'NA', 'active', '2017-10-13 21:00:30', '2017-10-13 21:00:30', NULL),
(384, 3, 'SP-12', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-12', 'Orange', 'NA', 'active', '2017-10-13 21:01:24', '2017-10-13 21:01:24', NULL),
(385, 3, 'SP-14', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-14', 'Orange', 'NA', 'active', '2017-10-13 21:09:56', '2017-10-13 21:09:56', NULL),
(386, 3, 'SP-15', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Shop Equipment', 'NA', 'NA', 'NA', 'NA', 'SP-15', 'Orange', 'NA', 'active', '2017-10-13 21:11:10', '2017-10-13 21:11:10', NULL),
(387, 3, 'SP-16', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', 'NA', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-15', 'Orange', 'NA', 'active', '2017-10-13 21:12:06', '2017-10-13 21:12:06', NULL),
(388, 3, 'SP-17', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-17', 'Orange', 'NA', 'active', '2017-10-13 21:12:55', '2017-10-13 21:12:55', NULL),
(389, 3, 'SP-18', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-18', 'Orange', 'NA', 'active', '2017-10-13 21:13:41', '2017-10-13 21:13:41', NULL),
(390, 3, 'SP-19', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-19', 'Orange', 'NA', 'active', '2017-10-13 21:14:32', '2017-10-13 21:14:32', NULL),
(391, 3, 'SP-20', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-20', 'Orange', 'NA', 'active', '2017-10-13 21:16:44', '2017-10-13 21:16:44', NULL),
(392, 3, 'SP-21', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '10HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-21', 'Orange', 'NA', 'active', '2017-10-13 21:17:37', '2017-10-13 21:17:37', NULL),
(393, 3, 'SP-22', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '7.5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-22', 'Orange', 'NA', 'active', '2017-10-13 21:18:30', '2017-10-13 21:18:30', NULL),
(394, 3, 'SP-23', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-23', 'Orange', 'NA', 'active', '2017-10-13 21:19:57', '2017-10-13 21:19:57', NULL),
(395, 3, 'SP-24', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-24', 'Orange', 'NA', 'active', '2017-10-13 21:24:00', '2017-10-13 21:24:00', NULL),
(396, 3, 'SP-25', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-25', 'Orange', 'NA', 'active', '2017-10-13 21:24:48', '2017-10-13 21:24:48', NULL),
(397, 3, 'SP-26', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-26', 'Orange', 'NA', 'active', '2017-10-13 21:25:51', '2017-10-13 21:25:51', NULL),
(398, 3, 'SP-27', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-27', 'Orange', 'NA', 'active', '2017-10-13 21:26:37', '2017-10-13 21:26:37', NULL),
(399, 3, 'SP-28', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-28', 'Orange', 'NA', 'active', '2017-10-13 21:59:09', '2017-10-13 21:59:09', NULL),
(400, 3, 'SP-29', 'Submersible Pump', 'Tsurumi', 'KTZ', 'yes', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-29', 'Orange', 'NA', 'active', '2017-10-13 22:04:30', '2017-10-13 22:04:30', NULL),
(401, 3, 'SP-30', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NAn', 'NA', 'NA', 'NA', 'SP-30', 'Orange', 'NA', 'active', '2017-10-13 22:07:53', '2017-10-13 22:07:53', NULL),
(402, 3, 'SP-31', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-31', 'Orange', 'NA', 'active', '2017-10-13 22:12:01', '2017-10-13 22:12:01', NULL),
(403, 3, 'SP-32', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'NA', 'active', '2017-10-13 22:13:43', '2017-10-13 22:13:43', NULL),
(404, 3, 'SP-33', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-33', 'Orange', 'NA', 'active', '2017-10-13 22:16:23', '2017-10-13 22:16:23', NULL),
(405, 3, 'SP-34', 'Submersible Pump', 'Stainless', 'NA', 'no', '1 phase', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-34', 'Orange', 'NA', 'active', '2017-10-13 22:17:33', '2017-10-13 22:17:33', NULL),
(406, 3, 'SP-35', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-35', 'Orange', 'NA', 'active', '2017-10-13 22:18:16', '2017-10-13 22:18:16', NULL),
(407, 3, 'SP-36', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-36', 'Orange', 'NA', 'active', '2017-10-13 22:20:04', '2017-10-13 22:20:04', NULL),
(408, 3, 'SP-37', 'Submersible Pump', 'Stainless', 'NA', 'no', '1 phase', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-37', 'Orange', 'NA', 'active', '2017-10-13 22:21:26', '2017-10-13 22:21:26', NULL),
(409, 3, 'SP-38', 'Submersible Pump', 'Stainless', 'NA', 'no', '1 phase', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-38', 'Orange', 'NA', 'active', '2017-10-13 22:22:08', '2017-10-13 22:22:08', NULL),
(410, 3, 'SP-39', 'Submersible Pump', 'Stainless', 'NA', 'no', '1 phase', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-39', 'Orange', 'NA', 'active', '2017-10-13 22:23:01', '2017-10-13 22:23:01', NULL),
(411, 3, 'SP-40', 'Submersible Pump', 'Tsurumi', 'KTZ', 'no', '5HP', '2017-10-13 00:00:00', 'Submersible Pump', 'NA', 'NA', 'NA', 'NA', 'SP-40', 'Orange', 'NA', 'active', '2017-10-13 22:23:54', '2017-10-13 22:23:54', NULL),
(412, 3, 'BMG-01', 'Walk Behind', 'Bomag', 'BW60HD', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-01', 'Orange', 'Diesel', 'active', '2017-10-16 20:05:35', '2017-10-16 20:08:28', NULL),
(413, 3, 'BMG-02', 'Walk Behind', 'Bomag', 'BW60HD', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-02', 'Orange', 'Diesel', 'active', '2017-10-16 20:09:34', '2017-10-16 20:09:34', NULL),
(414, 3, 'BMG-03', 'Walk Behind', 'Bomag', 'BW65S-2', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-03', 'Orange', 'Diesel', 'active', '2017-10-16 20:10:58', '2017-10-16 20:10:58', NULL),
(415, 3, 'BMG-04', 'Walk Behind', 'Mikasa', 'BG04', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-04', 'Orange', 'Diesel', 'active', '2017-10-16 20:12:27', '2017-10-16 20:12:27', NULL),
(416, 3, 'BMG-05', 'Walk Behind', 'Bomag', 'BW60HD', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-05', 'Orange', 'Diesel', 'active', '2017-10-16 20:13:42', '2017-10-16 20:13:42', NULL),
(417, 3, 'BMG-06', 'Walk Behind', 'Kobuto', 'EGO-N', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-06', 'Orange', 'Diesel', 'active', '2017-10-16 20:15:00', '2017-10-16 20:15:00', NULL),
(418, 3, 'BMG-07', 'Walk Behind', 'Sakai', 'SV6', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-07', 'Orange', 'Diesel', 'active', '2017-10-16 20:16:20', '2017-10-16 20:16:20', NULL),
(419, 3, 'BMG-08', 'Walk Behind', 'Sakai', 'SV8', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-08', 'Orange', 'Diesel', 'active', '2017-10-16 20:17:15', '2017-10-16 20:17:15', NULL),
(420, 3, 'BMG-09', 'Walk Behind', 'Sakai', 'HV-700S', 'no', '670KG', '2017-10-16 00:00:00', 'Walk Behind', 'NA', 'NA', 'NA', 'NA', 'BMG-09', 'Orange', 'Diesel', 'active', '2017-10-16 20:18:25', '2017-10-16 20:18:25', NULL),
(421, 2, 'ST-28', 'Mini Dumptruck', 'NA', 'NA', 'yes', 'NA', '2018-01-11 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'ST-28', 'Orange', 'Diesel', 'active', '2018-01-11 14:49:11', '2018-01-11 14:49:11', NULL),
(422, 2, 'CT-01', 'Forward Truck', 'NA', 'NA', 'no', 'NA', '2018-01-11 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'CT-01', 'Orange', 'Diesel', 'active', '2018-01-11 14:57:33', '2018-01-11 14:57:33', NULL),
(423, 2, 'Batching Plant 2', 'Batching Plant 2', 'NA', 'NA', 'no', 'NA', '2018-01-11 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'Batching Plant 2', 'Orange', 'Electrical use', 'active', '2018-01-11 16:00:39', '2018-01-11 16:00:39', NULL),
(424, 2, 'CBH-30', 'Backhoe, Crawler', 'Caterpillar', '320', 'no', '0.7 Cu.M', '2018-01-31 00:00:00', 'Backhoe', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2018-01-31 17:11:48', '2018-01-31 17:40:22', NULL),
(425, 2, 'Batching Plant 4', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-08 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Batching Plant 4', 'Orange', 'NA', 'active', '2018-02-08 16:56:18', '2018-02-08 16:56:18', NULL),
(426, 2, 'ST-08', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-08 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'ST-08', 'Orange', 'Diesel', 'active', '2018-02-08 16:59:42', '2018-02-08 16:59:42', NULL),
(427, 2, 'ST-15', 'NA', 'NA', 'NA', 'yes', 'NA', '2018-02-08 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2018-02-08 17:03:12', '2018-02-08 17:03:12', NULL),
(428, 2, 'ZDL-153 Mercedes Benz', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-08 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'na', 'Unleaded Gasoline', 'active', '2018-02-08 17:08:11', '2018-02-08 17:08:11', NULL),
(429, 2, 'CT-02', 'NA', 'NA', 'NA', 'no', 'NA', '2018-02-08 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'CT-02', 'orange', 'Diesel', 'active', '2018-02-08 17:09:10', '2018-02-08 17:09:10', NULL),
(430, 2, 'CT-04', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-08 00:00:00', 'na', 'NA', 'na', 'NA', 'NA', 'CT-04', 'Orange', 'Diesel', 'active', '2018-02-08 17:10:23', '2018-02-08 17:10:23', NULL),
(431, 2, 'DT-14', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-08 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Dt-14', 'Orange', 'Diesel', 'active', '2018-02-08 17:12:02', '2018-02-08 17:12:02', NULL),
(432, 2, 'DT-12', 'NA', 'NA', 'NA', 'yes', 'NA', '2018-02-08 00:00:00', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2018-02-08 17:13:29', '2018-02-08 17:13:29', NULL),
(433, 2, 'CT-15', 'na', 'na', 'na', 'no', 'na', '2018-02-08 00:00:00', 'na', 'na', 'na', 'na', 'na', 'CT-15', 'orange', 'diesel', 'active', '2018-02-08 17:26:01', '2018-02-08 17:26:01', NULL),
(434, 2, 'ST-27', 'na', 'na', 'na', 'yes', 'na', '2018-02-08 00:00:00', 'na', 'na', 'na', 'na', 'na', 'ST-27', 'orange', 'diesel', 'active', '2018-02-08 17:28:43', '2018-02-08 17:28:43', NULL),
(435, 2, 'ST-18', 'na', 'na', 'na', 'yes', 'na', '2018-02-08 00:00:00', 'na', 'na', 'na', 'na', 'na', 'ST-18', 'orange', 'diesel', 'active', '2018-02-08 20:52:15', '2018-02-08 20:52:15', NULL),
(436, 2, 'ST-02', 'na', 'na', 'na', 'yes', 'na', '2018-02-08 00:00:00', 'na', 'na', 'na', 'na', 'na', 'ST-02', 'orange', 'diesel', 'active', '2018-02-08 21:07:44', '2018-02-08 21:07:44', NULL),
(437, 2, 'Tower 5', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-09 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Tower 5', 'NA', 'active', '2018-02-09 14:34:04', '2018-02-09 14:34:04', NULL),
(438, 2, 'DT-01', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-09 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-01', 'Orange', 'Diesel', 'active', '2018-02-09 14:39:11', '2018-02-09 14:39:11', NULL),
(439, 2, 'DT-07', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-12 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-07', 'Orange', 'Diesel', 'active', '2018-02-12 13:35:08', '2018-02-12 13:35:08', NULL),
(441, 2, 'DT-16', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-12 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2018-02-12 13:38:24', '2018-02-12 13:38:24', NULL),
(442, 2, 'DT-20', 'na', 'NA', 'NA', 'yes', 'NA', '2018-02-12 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'Diesel', 'active', '2018-02-12 13:39:30', '2018-02-12 13:39:30', NULL),
(443, 2, 'Bar Binder BB-14', 'Bar Binder', 'NA', 'NA', 'yes', 'NA', '2018-02-15 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'NA', 'active', '2018-02-15 11:39:39', '2018-02-15 11:39:39', NULL);
INSERT INTO `equipments` (`id`, `created_user_id`, `equipment_code`, `equipment_description`, `equipment_make`, `equipment_model`, `for_hauling`, `capacity`, `equipment_date`, `equipment_type`, `engine_displacement`, `engine_code`, `engine_no`, `chassis_no`, `body_no`, `color`, `fuel`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(444, 2, 'MT-35', 'Mixer Truck', 'NA', 'NA', 'no', 'NA', '2018-02-15 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'MT-35', 'Orange', 'Diesel', 'active', '2018-02-15 14:06:54', '2018-02-15 14:06:54', NULL),
(445, 2, 'ST-19', 'Mini dumptruck', 'NA', 'NA', 'yes', 'NA', '2018-02-15 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'ST-19', 'Orange', 'Diesel', 'active', '2018-02-15 14:13:30', '2018-02-15 14:13:30', NULL),
(446, 2, 'CT-14', 'Cargo Truck', 'NA', 'NA', 'no', 'NA', '2018-02-15 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'CT-14', 'Orange', 'd', 'active', '2018-02-15 14:52:56', '2018-02-15 14:52:56', NULL),
(447, 2, 'Tower 06', 'Tower Crane', 'NA', 'NA', 'no', 'NA', '2018-02-15 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Tower 06', 'Orange', 'NA', 'active', '2018-02-15 15:11:26', '2018-02-15 15:11:26', NULL),
(448, 2, 'Batching Plant 1', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-15 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'NA', 'active', '2018-02-15 17:43:23', '2018-02-15 17:43:23', NULL),
(449, 2, 'Tower 08', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-21 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Tower 08', 'Orange', 'NA', 'active', '2018-02-21 15:33:22', '2018-02-21 15:33:22', NULL),
(450, 2, 'Motorized Gondola 1', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Motorized Gondola 1', 'Orange', 'NA', 'active', '2018-02-28 10:18:18', '2018-02-28 10:18:18', NULL),
(451, 2, 'Construction elevator lift ( Alemac) 3', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Construction elevator lift ( Alemac) 3', 'Orange', 'NA', 'active', '2018-02-28 10:20:47', '2018-02-28 10:20:47', NULL),
(452, 2, 'Tower 04', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Tower 04', 'Orange', 'NA', 'active', '2018-02-28 10:38:58', '2018-02-28 10:38:58', NULL),
(453, 2, 'Bar Cutter BC-03', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Bar Cutter BC-03', 'Orange', 'NA', 'active', '2018-02-28 10:42:25', '2018-02-28 10:42:25', NULL),
(454, 2, 'CT-11', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'CT-11', 'Orange', 'Diesel', 'active', '2018-02-28 13:57:01', '2018-02-28 13:57:01', NULL),
(455, 2, 'DT-08', 'na', 'NA', 'NAn', 'yes', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-08', 'Orange', 'Diesel', 'active', '2018-02-28 14:43:29', '2018-02-28 14:43:29', NULL),
(456, 2, 'Roller Gate', 'na', 'NA', 'NA', 'no', 'NA', '2018-02-28 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'na', 'NA', 'active', '2018-02-28 14:49:46', '2018-02-28 14:49:46', NULL),
(457, 2, 'MT-31', 'na', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'MT-31', 'Orange', 'Diesel', 'active', '2018-03-01 09:39:36', '2018-03-01 09:39:36', NULL),
(458, 2, 'ST-11', 'na', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'ST-11', 'Orange', 'Diesel', 'active', '2018-03-01 09:41:46', '2018-03-01 09:41:46', NULL),
(459, 2, 'ST-12', 'Elf Truck', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'ST-12', 'Orange', 'Diesel', 'active', '2018-03-01 09:44:17', '2018-03-01 09:44:17', NULL),
(460, 2, 'TL-08', 'Tower light', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'TL-08', 'Orange', 'NA', 'active', '2018-03-01 10:37:16', '2018-03-01 10:37:16', NULL),
(461, 2, 'TL-09', 'Tower light', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'TL-09', 'Orange', 'NA', 'active', '2018-03-01 10:37:54', '2018-03-01 10:37:54', NULL),
(462, 2, 'TL-10', 'Tower light', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'NA', 'active', '2018-03-01 10:39:18', '2018-03-01 10:39:18', NULL),
(463, 2, 'CBH-31', 'Backhoe, Crawler', 'Na', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'CBH-31', 'Orange', 'Diesel', 'active', '2018-03-01 10:41:14', '2018-03-01 10:41:14', NULL),
(464, 2, 'SV-02', 'Service Vehicle', 'Na', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'SV-02', 'Orange', 'Unleaded Gasoline', 'active', '2018-03-01 11:10:38', '2018-03-01 11:10:38', NULL),
(465, 2, 'DT-05', 'Dumptruck', 'NA', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-05', 'Orange', 'Diesel', 'active', '2018-03-01 11:18:32', '2018-03-01 11:18:32', NULL),
(466, 2, 'DT-11', 'Dumptruck', 'NA', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-11', 'Orange', 'Diesel', 'active', '2018-03-01 11:22:27', '2018-03-01 11:22:27', NULL),
(467, 2, 'DT-18', 'Dumptruck', 'NA', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-18', 'Orange', 'Diesel', 'active', '2018-03-01 11:38:00', '2018-03-01 11:38:00', NULL),
(468, 2, 'DT-19', 'Dumptruck', 'Na', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'DT-19', 'Orange', 'Diesel', 'active', '2018-03-01 11:48:26', '2018-03-01 11:48:26', NULL),
(469, 2, 'ST-05', 'Elf Truck', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'ST-05', 'Orange', 'Diesel', 'active', '2018-03-01 11:57:17', '2018-03-01 11:57:17', NULL),
(470, 2, 'ST-17', 'Mini dumptruck', 'NA', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'na', 'NA', 'NA', 'ST-17', 'Orange', 'Diesel', 'active', '2018-03-01 11:59:11', '2018-03-01 11:59:11', NULL),
(471, 2, 'CT-05', 'Boom Truck', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'n', 'NA', 'CT-05', 'Orange', 'Diesel', 'active', '2018-03-01 13:20:49', '2018-03-01 13:20:49', NULL),
(472, 2, 'CT-06', 'Boom Truck', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'CT-06', 'Orange', 'Diesel', 'active', '2018-03-01 13:22:56', '2018-03-01 13:22:56', NULL),
(473, 2, 'CT-08', 'Self Loader Truck', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'CT-08', 'Orange', 'Diesel', 'active', '2018-03-01 13:25:24', '2018-03-01 13:25:24', NULL),
(474, 2, 'CT-09', 'Cargo Truck', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'CT-09', 'Orange', 'Diesel', 'active', '2018-03-01 13:26:21', '2018-03-01 13:26:21', NULL),
(475, 2, 'Welding Machine 300 amps', 'Welding Machine', 'NA', 'NA', 'yes', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'na', 'NA', 'active', '2018-03-01 15:42:13', '2018-03-01 15:42:13', NULL),
(476, 2, 'Welding Machine  064', 'Welding Machine', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'na', 'NA', 'active', '2018-03-01 15:46:54', '2018-03-01 15:46:54', NULL),
(477, 2, 'Tower 07', 'Tower Crane', 'NA', 'NA', 'no', 'NA', '2018-03-01 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'Tower 07', 'Orange', 'Diesel', 'active', '2018-03-01 15:53:41', '2018-03-01 15:53:41', NULL),
(478, 2, 'Batching Plant 5', 'na', 'NA', 'NA', 'no', 'NA', '2018-03-02 00:00:00', 'na', 'NA', 'NA', 'NA', 'NA', 'NA', 'Orange', 'NA', 'active', '2018-03-02 09:35:02', '2018-03-02 09:35:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_images`
--

CREATE TABLE `equipment_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipment_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_monitoring`
--

CREATE TABLE `fuel_monitoring` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `equipment` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` decimal(10,3) DEFAULT NULL,
  `out` decimal(10,3) DEFAULT NULL,
  `total_consumption_per_unit` decimal(10,3) DEFAULT NULL,
  `balance` decimal(10,3) NOT NULL DEFAULT '0.000',
  `vendor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_hours` int(11) DEFAULT NULL,
  `millage` int(11) DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `updated_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuel_monitoring`
--

INSERT INTO `fuel_monitoring` (`id`, `transaction_no`, `transaction_date`, `transaction_time`, `reference_no`, `location`, `equipment`, `operator`, `project`, `remarks`, `in`, `out`, `total_consumption_per_unit`, `balance`, `vendor`, `no_of_hours`, `millage`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(61, 'FMS20180208085617', '2018-02-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '5', NULL, '30.000', NULL, '-330.000', '30.000', 'Shell', NULL, NULL, 2, 2, '2018-02-08 16:56:32', '2018-02-08 17:00:04', NULL),
(62, 'FMU20180208090333', '2018-02-01 00:00:00', '2018-02-08 09:00:00', NULL, NULL, 427, 6, '5', NULL, NULL, '30.000', '0.000', '0.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:04:18', '2018-02-08 21:01:16', NULL),
(63, 'FMS20180208090442', '2018-02-02 00:00:00', NULL, '555748', NULL, NULL, NULL, '5', NULL, '600.000', NULL, '0.000', '600.000', 'Shell', NULL, NULL, 2, 2, '2018-02-08 17:05:10', '2018-02-08 21:01:16', NULL),
(64, 'FMU20180208090610', '2018-02-02 00:00:00', '2018-02-08 09:30:00', NULL, NULL, 107, 7, '5', NULL, NULL, '200.000', '200.000', '400.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:06:58', '2018-02-08 21:02:03', NULL),
(65, 'FMU20180208090916', '2018-02-02 00:00:00', '2018-02-08 10:00:00', NULL, NULL, 429, 8, '5', NULL, NULL, '100.000', '300.000', '300.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:09:55', '2018-02-08 21:02:46', NULL),
(66, 'FMU20180208091010', '2018-02-02 00:00:00', '2018-02-08 10:10:00', NULL, NULL, 23, 9, '5', NULL, NULL, '60.000', '360.000', '240.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:10:45', '2018-02-08 21:03:20', NULL),
(67, 'FMU20180208091104', '2018-02-02 00:00:00', '2018-02-08 10:20:00', NULL, NULL, 52, 10, '5', NULL, NULL, '50.000', '410.000', '190.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:11:31', '2018-02-08 21:04:15', NULL),
(68, 'FMU20180208091351', '2018-02-02 00:00:00', '2018-02-08 11:00:00', NULL, NULL, 432, 11, '5', NULL, NULL, '40.000', '450.000', '150.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:14:27', '2018-02-08 21:05:16', NULL),
(69, 'FMU20180208091623', '2018-02-02 00:00:00', '2018-02-08 11:10:00', NULL, NULL, 117, 12, '5', NULL, NULL, '150.000', '600.000', '0.000', NULL, NULL, NULL, 2, 2, '2018-02-08 17:17:00', '2018-02-08 21:05:53', NULL),
(70, 'FMS20180208092311', '2018-02-01 00:00:00', NULL, '0', NULL, NULL, NULL, '2', NULL, '3437.281', NULL, '3437.281', '3437.281', 'SHELL', NULL, NULL, 2, 2, '2018-02-08 17:23:36', '2018-02-08 21:05:53', NULL),
(71, 'FMU20180208092349', '2018-02-08 00:00:00', '2018-02-08 09:29:00', NULL, NULL, 156, 1, '2', NULL, NULL, '43.000', '643.000', '3394.281', NULL, 0, 0, 2, 2, '2018-02-08 17:24:20', '2018-02-08 21:05:53', NULL),
(72, 'FMU20180208092605', '2018-02-08 00:00:00', '2018-02-08 09:38:00', NULL, NULL, 433, 1, '2', NULL, NULL, '41.000', '684.000', '3353.281', NULL, 0, 0, 2, 2, '2018-02-08 17:26:41', '2018-02-08 21:05:53', NULL),
(73, 'FMU20180208092658', '2018-02-08 00:00:00', '2018-02-08 09:48:00', NULL, NULL, 39, 1, '2', NULL, NULL, '64.000', '748.000', '3289.281', NULL, 0, 0, 2, 2, '2018-02-08 17:27:22', '2018-02-08 21:05:53', NULL),
(74, 'FMU20180208092848', '2018-02-08 00:00:00', '2018-02-08 10:06:00', NULL, NULL, 434, 1, '2', NULL, NULL, '18.000', '766.000', '3271.281', NULL, 0, 0, 2, 2, '2018-02-08 17:29:27', '2018-02-08 21:05:53', NULL),
(75, 'FMS20180208113434', '2018-02-01 00:00:00', NULL, '71097', NULL, NULL, NULL, '3', NULL, '400.000', NULL, '3837.281', '3671.281', 'SHELL', NULL, NULL, 2, 2, '2018-02-08 19:34:53', '2018-02-08 21:05:53', NULL),
(76, 'FMU20180208113537', '2018-02-01 00:00:00', '2018-02-08 16:15:00', NULL, NULL, 51, 3, '3', NULL, NULL, '20.000', '786.000', '3651.281', NULL, NULL, NULL, 2, 2, '2018-02-08 19:46:30', '2018-02-08 21:05:53', NULL),
(77, 'FMU20180208115305', '2018-02-01 00:00:00', '2018-02-08 16:20:00', NULL, NULL, 56, 4, '3', NULL, NULL, '40.000', '826.000', '3611.281', NULL, NULL, NULL, 2, 2, '2018-02-08 19:53:54', '2018-02-08 21:05:53', NULL),
(78, 'FMU20180208115534', '2018-02-01 00:00:00', '2018-02-08 16:30:00', NULL, NULL, 24, 2, '3', NULL, NULL, '40.000', '866.000', '3571.281', NULL, NULL, NULL, 2, 2, '2018-02-08 19:56:15', '2018-02-08 21:05:53', NULL),
(79, 'FMU20180208122720', '2018-02-05 00:00:00', '2018-02-08 07:10:00', NULL, NULL, 99, 5, '3', NULL, NULL, '60.000', '926.000', '3511.281', NULL, NULL, NULL, 2, 2, '2018-02-08 20:29:15', '2018-02-08 21:05:53', NULL),
(80, 'FMU20180208122928', '2018-02-05 00:00:00', '2018-02-08 07:15:00', NULL, NULL, 24, 2, '3', NULL, NULL, '40.000', '966.000', '3471.281', NULL, NULL, NULL, 2, 2, '2018-02-08 20:30:37', '2018-02-08 21:05:53', NULL),
(81, 'FMU20180208123543', '2018-02-08 00:00:00', '2018-02-08 08:45:00', NULL, NULL, 56, 4, '3', NULL, NULL, '40.000', '1006.000', '3431.281', NULL, 0, 0, 2, 2, '2018-02-08 20:38:29', '2018-02-08 21:05:53', NULL),
(82, 'FMU20180208123923', '2018-02-07 00:00:00', '2018-02-08 07:10:00', NULL, NULL, 99, 5, '3', NULL, NULL, '40.000', '1046.000', '3391.281', NULL, 0, 0, 2, 2, '2018-02-08 20:41:19', '2018-02-08 21:05:53', NULL),
(83, 'FMU20180208125219', '2018-02-08 00:00:00', '2018-02-08 07:50:00', NULL, NULL, 435, 3, '3', NULL, NULL, '20.000', '1066.000', '3371.281', NULL, 0, 0, 2, 2, '2018-02-08 20:52:57', '2018-02-08 21:05:53', NULL),
(84, 'FMU20180208125313', '2018-02-08 00:00:00', '2018-02-08 07:50:00', NULL, NULL, 24, 2, '3', NULL, NULL, '40.000', '1106.000', '3331.281', NULL, 0, 0, 2, 2, '2018-02-08 20:53:38', '2018-02-08 21:05:53', NULL),
(85, 'FMU20180208130747', '2018-02-02 00:00:00', NULL, '557716', NULL, NULL, NULL, '5', NULL, '600.000', NULL, '-20.000', '2731.281', 'SHELL', NULL, NULL, 2, 2, '2018-02-08 21:08:17', '2018-02-08 21:10:46', NULL),
(86, 'FMS20180208130843', '2018-02-08 00:00:00', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, '0.000', '2731.281', NULL, NULL, NULL, 2, 2, '2018-02-08 21:09:04', '2018-02-08 21:10:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_monitoring_logs`
--

CREATE TABLE `fuel_monitoring_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_value` decimal(10,3) DEFAULT NULL,
  `added_value` decimal(10,3) DEFAULT NULL,
  `updated_value` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuel_monitoring_logs`
--

INSERT INTO `fuel_monitoring_logs` (`id`, `user_id`, `location_id`, `username`, `remarks`, `type`, `previous_value`, `added_value`, `updated_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(55, 2, 0, 'dakay1', 'update stock fuel on #FMS20180208085617 from 360.000 to 360.000', 'stock', '21464.000', '360.000', '21464.000', '2018-02-08 16:58:47', '2018-02-08 16:58:47', NULL),
(56, 2, 0, 'dakay1', 'update stock fuel on #FMS20180208085617 from 360.000 to 30', 'stock', '21464.000', '30.000', '21134.000', '2018-02-08 17:00:04', '2018-02-08 17:00:04', NULL),
(57, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090610 from 200.000 to 200.000', 'use', '14309.000', '200.000', '14309.000', '2018-02-08 17:14:57', '2018-02-08 17:14:57', NULL),
(58, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090916 from 100.000 to 100.000', 'use', '14309.000', '100.000', '14309.000', '2018-02-08 17:15:16', '2018-02-08 17:15:16', NULL),
(59, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091010 from 60.000 to 60.000', 'use', '14309.000', '60.000', '14309.000', '2018-02-08 17:15:32', '2018-02-08 17:15:32', NULL),
(60, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091104 from 50.000 to 50.000', 'use', '14309.000', '50.000', '14309.000', '2018-02-08 17:15:45', '2018-02-08 17:15:45', NULL),
(61, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090333 from 30.000 to 30.000', 'use', '14309.000', '30.000', '14309.000', '2018-02-08 17:21:03', '2018-02-08 17:21:03', NULL),
(62, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208113537 from 20.000 to 20.000', 'use', '14309.000', '20.000', '14309.000', '2018-02-08 19:51:37', '2018-02-08 19:51:37', NULL),
(63, 2, 0, 'dakay1', 'update stock fuel on #FMS20180208113434 from 400.000 to 400.000', 'stock', '21134.000', '400.000', '21134.000', '2018-02-08 20:04:46', '2018-02-08 20:04:46', NULL),
(64, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208113537 from 20.000 to 20.000', 'use', '14309.000', '20.000', '14309.000', '2018-02-08 20:05:00', '2018-02-08 20:05:00', NULL),
(65, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208115305 from 40.000 to 40.000', 'use', '14309.000', '40.000', '14309.000', '2018-02-08 20:05:10', '2018-02-08 20:05:10', NULL),
(66, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208115534 from 40.000 to 40.000', 'use', '14309.000', '40.000', '14309.000', '2018-02-08 20:05:19', '2018-02-08 20:05:19', NULL),
(67, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208122928 from 40.000 to 40.000', 'use', '14309.000', '40.000', '14309.000', '2018-02-08 20:30:51', '2018-02-08 20:30:51', NULL),
(68, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208122720 from 60.000 to 60.000', 'use', '14309.000', '60.000', '14309.000', '2018-02-08 20:35:29', '2018-02-08 20:35:29', NULL),
(69, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208122928 from 40.000 to 40.000', 'use', '14309.000', '40.000', '14309.000', '2018-02-08 20:35:38', '2018-02-08 20:35:38', NULL),
(70, 2, 0, 'dakay1', 'update stock fuel on #FMS20180208090442 from 600.000 to 600.000', 'stock', '21134.000', '600.000', '21134.000', '2018-02-08 20:56:29', '2018-02-08 20:56:29', NULL),
(71, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090610 from 200.000 to 200.000', 'use', '14309.000', '200.000', '14309.000', '2018-02-08 20:56:40', '2018-02-08 20:56:40', NULL),
(72, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090916 from 100.000 to 100.000', 'use', '14309.000', '100.000', '14309.000', '2018-02-08 20:56:50', '2018-02-08 20:56:50', NULL),
(73, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091010 from 60.000 to 60.000', 'use', '14309.000', '60.000', '14309.000', '2018-02-08 20:58:36', '2018-02-08 20:58:36', NULL),
(74, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091104 from 50.000 to 50.000', 'use', '14309.000', '50.000', '14309.000', '2018-02-08 20:58:49', '2018-02-08 20:58:49', NULL),
(75, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091351 from 40.000 to 40.000', 'use', '14309.000', '40.000', '14309.000', '2018-02-08 20:59:01', '2018-02-08 20:59:01', NULL),
(76, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091623 from 150.000 to 150.000', 'use', '14309.000', '150.000', '14309.000', '2018-02-08 20:59:14', '2018-02-08 20:59:14', NULL),
(77, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090333 from 30.000 to 30.000', 'use', '14309.000', '30.000', '14309.000', '2018-02-08 21:01:16', '2018-02-08 21:01:16', NULL),
(78, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090610 from 200.000 to 200.000', 'use', '14309.000', '200.000', '14309.000', '2018-02-08 21:02:03', '2018-02-08 21:02:03', NULL),
(79, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208090916 from 100.000 to 100.000', 'use', '14309.000', '100.000', '14309.000', '2018-02-08 21:02:46', '2018-02-08 21:02:46', NULL),
(80, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091010 from 60.000 to 60.000', 'use', '14309.000', '60.000', '14309.000', '2018-02-08 21:03:20', '2018-02-08 21:03:20', NULL),
(81, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091104 from 50.000 to 50.000', 'use', '14309.000', '50.000', '14309.000', '2018-02-08 21:04:15', '2018-02-08 21:04:15', NULL),
(82, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091351 from 40.000 to 40.000', 'use', '14309.000', '40.000', '14309.000', '2018-02-08 21:05:16', '2018-02-08 21:05:16', NULL),
(83, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208091623 from 150.000 to 150.000', 'use', '14309.000', '150.000', '14309.000', '2018-02-08 21:05:53', '2018-02-08 21:05:53', NULL),
(84, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208130747 from 20.000 to ', 'use', '14309.000', NULL, '14289.000', '2018-02-08 21:10:17', '2018-02-08 21:10:17', NULL),
(85, 2, 0, 'dakay1', 'update stock fuel on #FMU20180208130747 from  to 600', 'stock', '21134.000', '600.000', '21734.000', '2018-02-08 21:10:46', '2018-02-08 21:10:46', NULL),
(86, 2, 0, 'dakay1', 'update stock fuel on #FMS20180208130843 from  to ', 'use', '14289.000', NULL, '14289.000', '2018-02-08 21:10:59', '2018-02-08 21:10:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_projects`
--

CREATE TABLE `fuel_projects` (
  `id` int(11) NOT NULL,
  `projects_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `total_fuel_consumed` int(11) NOT NULL,
  `total_fuel_stocked` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel_projects`
--

INSERT INTO `fuel_projects` (`id`, `projects_id`, `balance`, `total_fuel_consumed`, `total_fuel_stocked`, `updated_at`, `created_at`) VALUES
(1, 1, 1856, 0, 0, '2018-02-03 15:46:12', '2018-01-29 20:45:14'),
(2, 2, 0, 0, 0, '2018-01-29 20:45:14', '2018-01-29 20:45:14'),
(3, 3, 0, 0, 0, '2018-01-29 20:45:14', '2018-01-29 20:45:14'),
(4, 4, 0, 0, 0, '2018-01-29 20:45:14', '2018-01-29 20:45:14'),
(5, 5, 2930, 0, 0, '2018-02-01 05:47:36', '2018-01-29 20:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_date` datetime NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(56) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created_user_id`, `name`, `location_date`, `address`, `contact_person`, `phone_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Negros', '2017-12-26 00:00:00', 'n/a', 'n/a', '1234567890', '2017-12-26 16:27:49', '2018-02-08 16:47:38', NULL),
(2, 2, 'Tacloban', '2017-12-26 00:00:00', 'n/a', 'n/a', '1234567890', '2017-12-26 16:27:49', '2018-01-11 07:46:48', NULL),
(3, 2, 'CDO', '2017-12-26 00:00:00', 'n/a', 'n/a', '1234567890', '2017-12-26 16:27:49', '2018-01-11 07:46:24', NULL),
(4, 2, 'Bohol', '2017-12-26 00:00:00', 'n/a', 'n/a', '1234567890', '2017-12-26 16:27:49', '2018-01-11 07:45:53', NULL),
(5, 2, 'Cebu', '2018-03-16 00:00:00', NULL, NULL, '1234567890', '2017-12-26 16:27:49', '2018-01-11 07:45:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lubricant_monitoring`
--

CREATE TABLE `lubricant_monitoring` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` datetime NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `equipment` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_oil_id` int(10) UNSIGNED NOT NULL,
  `in` decimal(10,3) DEFAULT NULL,
  `out` decimal(10,3) DEFAULT NULL,
  `total_consumption_per_unit` decimal(10,3) DEFAULT NULL,
  `balance` decimal(10,3) NOT NULL DEFAULT '0.000',
  `vendor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `updated_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lubricant_monitoring`
--

INSERT INTO `lubricant_monitoring` (`id`, `transaction_no`, `transaction_date`, `reference_no`, `location`, `equipment`, `operator`, `project`, `remarks`, `type_of_oil_id`, `in`, `out`, `total_consumption_per_unit`, `balance`, `vendor`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LMS20180131143027', '2018-01-31 00:00:00', '000001', NULL, NULL, NULL, NULL, NULL, 1, '1000.000', NULL, '1000.000', '1000.000', 'Engine Oil Vendor A', 2, 2, '2018-01-31 22:30:36', '2018-01-31 22:30:36', NULL),
(2, 'LMS20180208162714', '2018-02-08 00:00:00', '898980', NULL, NULL, NULL, NULL, NULL, 1, '1500.000', NULL, '2500.000', '2500.000', 'Engine Oil Vendor A', 2, 2, '2018-02-09 00:27:32', '2018-02-09 00:27:32', NULL),
(3, 'LMS20180208162753', '2018-02-08 00:00:00', '92131', NULL, NULL, NULL, NULL, NULL, 2, '800.000', NULL, '800.000', '800.000', 'Lube Vendor B', 2, 2, '2018-02-09 00:28:12', '2018-02-09 00:28:12', NULL),
(4, 'LMS20180208162822', '2018-02-08 00:00:00', '1234987', NULL, NULL, NULL, NULL, NULL, 3, '750.000', NULL, '750.000', '750.000', 'Lube Vendor C', 2, 2, '2018-02-09 00:28:44', '2018-02-09 00:28:44', NULL),
(5, 'LMS20180208162853', '2018-02-08 00:00:00', '51231', NULL, NULL, NULL, NULL, NULL, 4, '800.000', NULL, '800.000', '800.000', 'Lube Vendor D', 2, 2, '2018-02-09 00:29:07', '2018-02-09 00:29:07', NULL),
(6, 'LMS20180208162937', '2018-02-08 00:00:00', '78151', NULL, NULL, NULL, NULL, NULL, 3, '700.000', NULL, '1450.000', '1450.000', 'Lube Vendor E', 2, 2, '2018-02-09 00:30:03', '2018-02-09 00:30:03', NULL),
(7, 'LMU20180208163349', '2018-02-08 00:00:00', NULL, 1, 51, 1, 'Lubricant', 'sample sample', 3, NULL, '1000.000', '1000.000', '450.000', NULL, 2, 2, '2018-02-09 00:34:15', '2018-02-09 00:34:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lubricant_monitoring_logs`
--

CREATE TABLE `lubricant_monitoring_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_value` decimal(10,3) DEFAULT NULL,
  `added_value` decimal(10,3) DEFAULT NULL,
  `updated_value` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lubricant_monitoring_logs`
--

INSERT INTO `lubricant_monitoring_logs` (`id`, `user_id`, `username`, `remarks`, `oil`, `type`, `previous_value`, `added_value`, `updated_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'dakay1', 'add 1000 on Engine Oil (15W40) stock lubricant', '1', 'stock', '0.000', '1000.000', '1000.000', '2018-01-31 22:30:36', '2018-01-31 22:30:36', NULL),
(2, 2, 'dakay1', 'add 1500 on Engine Oil (15W40) stock lubricant', '1', 'stock', '1000.000', '1500.000', '2500.000', '2018-02-09 00:27:32', '2018-02-09 00:27:32', NULL),
(3, 2, 'dakay1', 'add 800 on Hydraulic Oil (AW100) stock lubricant', '2', 'stock', '0.000', '800.000', '800.000', '2018-02-09 00:28:12', '2018-02-09 00:28:12', NULL),
(4, 2, 'dakay1', 'add 750 on Gear Oil stock lubricant', '3', 'stock', '0.000', '750.000', '750.000', '2018-02-09 00:28:44', '2018-02-09 00:28:44', NULL),
(5, 2, 'dakay1', 'add 800 on Telluse stock lubricant', '4', 'stock', '0.000', '800.000', '800.000', '2018-02-09 00:29:07', '2018-02-09 00:29:07', NULL),
(6, 2, 'dakay1', 'add 700 on Gear Oil stock lubricant', '3', 'stock', '750.000', '700.000', '1450.000', '2018-02-09 00:30:03', '2018-02-09 00:30:03', NULL),
(7, 2, 'dakay1', 'add 1000 on Gear Oil use lubricant', '3', 'use', '0.000', '1000.000', '1000.000', '2018-02-09 00:34:15', '2018-02-09 00:34:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_05_20_150813_create_location_table', 1),
(5, '2017_05_20_150839_create_operator_table', 1),
(6, '2017_05_20_150845_create_equipment_table', 1),
(7, '2017_06_09_043640_create_type_of_oils', 1),
(8, '2017_06_09_065404_create_lubricant_monitoring', 1),
(9, '2017_06_11_024734_create_fuel_monitoring', 1),
(10, '2017_06_11_165002_create_monitoring_table', 1),
(11, '2017_06_11_170048_create_fuel_monitoring_log_table', 1),
(12, '2017_06_12_085736_create_lubricant_monitoring_log', 1),
(13, '2017_07_07_191414_create_subcontractor_table', 1),
(14, '2017_07_08_145705_create_subcontractorwork_table', 1),
(15, '2017_07_08_180317_create_subcontractorwork_payment_table', 1),
(16, '2017_07_16_170603_create_equipment_images_table', 1),
(17, '2017_10_12_182646_add_warranty_column_subcontratorwork', 1),
(18, '2017_10_12_183241_add_operator_column_lubricant_monitoring', 1),
(19, '2017_10_13_201918_add_balance_lubricant_fuel_table', 1),
(20, '2017_12_02_052722_add_remarks_project_column_in_fuel_lubricant', 1),
(21, '2017_12_03_180823_change_int_to_decimal_both_fuel_and_lubricant', 1),
(22, '2018_01_01_090938_create_projects_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10,3) NOT NULL DEFAULT '0.000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id`, `code`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FS', 'Fuel Stock', '21734.000', NULL, '2018-02-08 21:10:46', NULL),
(2, 'FU', 'Fuel Use', '14289.000', NULL, '2018-02-08 21:10:59', NULL),
(3, 'LEOS', 'Lubricant Engine Oil (15W40) Stock', '2500.000', NULL, '2018-02-09 00:27:32', NULL),
(4, 'LEOU', 'Lubricant Engine Oil (15W40) Use', '0.000', NULL, NULL, NULL),
(5, 'LHOS', 'Lubricant Hydraulic Oil (AW100) Stock', '800.000', NULL, '2018-02-09 00:28:12', NULL),
(6, 'LHOU', 'Lubricant Hydraulic Oil (AW100) Use', '0.000', NULL, NULL, NULL),
(7, 'LGOS', 'Lubricant Gear Oil Stock', '1450.000', NULL, '2018-02-09 00:30:03', NULL),
(8, 'LGOU', 'Lubricant Gear Oil Use', '1000.000', NULL, '2018-02-09 00:34:15', NULL),
(9, 'LTS', 'Lubricant Telluse Stock', '800.000', NULL, '2018-02-09 00:29:07', NULL),
(10, 'LTU', 'Lubricant Telluse Use', '0.000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(520) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_no` varchar(520) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_code` varchar(520) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_date` datetime NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(56) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `created_user_id`, `name`, `alias`, `license_no`, `driver_code`, `operator_date`, `address`, `phone_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Amoren F.', 'Amoren', '12', 'G01-11-003947', '2017-12-26 08:27:49', 'n/a', '1234567890', '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL),
(2, 2, 'Archie Dieparine', 'na', '12', 'G02-31-103946', '2017-12-26 00:00:00', 'n/a', '1234567890', '2017-12-26 16:27:49', '2018-02-08 19:55:31', NULL),
(3, 2, 'Andrew Cagoco', 'na', '12', 'F01-12-333948', '2017-12-26 00:00:00', 'n/a', '1234567890', '2017-12-26 16:27:49', '2018-02-08 19:51:24', NULL),
(4, 2, 'Grapa Jr.', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Tacloban', 'na', '2018-02-08 19:52:50', '2018-02-08 19:52:50', NULL),
(5, 2, 'Jomar D.', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Tacloban', 'na', '2018-02-08 20:27:15', '2018-02-08 20:27:15', NULL),
(6, 2, 'Pepito Cadalin', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:00:59', '2018-02-08 21:00:59', NULL),
(7, 2, 'Ringo J.', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:01:49', '2018-02-08 21:01:49', NULL),
(8, 2, 'Danilo Ypanto', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Cebu', 'na', '2018-02-08 21:02:32', '2018-02-08 21:02:32', NULL),
(9, 2, 'Dodong Geonzon', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:03:09', '2018-02-08 21:03:09', NULL),
(10, 2, 'Ronel Taburada', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:04:05', '2018-02-08 21:04:05', NULL),
(11, 2, 'Jay R', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:05:02', '2018-02-08 21:05:02', NULL),
(12, 2, 'John Toquero', 'na', 'n', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:05:42', '2018-02-08 21:05:42', NULL),
(13, 2, 'Jojie G.', 'na', 'na', 'na', '2018-02-08 00:00:00', 'Kabankalan', 'na', '2018-02-08 21:06:36', '2018-02-08 21:06:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `location` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `created_user_id`, `location`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'Palawan Project', '2018-01-11 05:27:41', '2018-01-11 05:27:41', NULL),
(2, 2, 5, 'Cebu Projects', NULL, NULL, NULL),
(3, 2, 2, 'Ace Tacloban', '2018-02-09 05:27:41', '2018-02-08 19:35:26', NULL),
(4, 2, 3, 'CDO Project', '2018-02-09 05:27:41', '2018-01-11 05:27:41', NULL),
(5, 2, 1, 'Sonedco', '2018-02-09 05:27:41', '2018-02-08 16:47:55', NULL),
(6, 2, 2, 'Ace Hospital', '2018-02-08 16:44:52', '2018-02-08 16:44:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(2, 1, '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(3, 2, '2018-01-12 08:49:30', '2018-01-12 08:49:30'),
(4, 3, '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(5, 3, '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(6, 4, '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(7, 4, '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(8, 5, '2017-12-26 16:27:49', '2017-12-26 16:27:49'),
(9, 5, '2017-12-26 16:27:49', '2017-12-26 16:27:49'),
(10, 5, '2017-12-26 16:27:49', '2017-12-26 16:27:49'),
(11, 5, '2017-12-26 16:27:49', '2017-12-26 16:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `subcontractors`
--

CREATE TABLE `subcontractors` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcontractors`
--

INSERT INTO `subcontractors` (`id`, `created_user_id`, `name`, `address`, `contact_1`, `contact_2`, `website`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, 'Romulo Puyot', 'NA', 'na', 'na', 'n', '2018-01-11 14:42:13', '2018-01-11 14:42:13', NULL),
(5, 2, 'Rosenier Jordan', 'NA', 'na', 'na', 'NA', '2018-01-11 14:43:11', '2018-01-11 14:43:11', NULL),
(6, 2, 'Mynaldo Tabio', 'NA', 'na', 'na', 'NA', '2018-01-11 14:43:59', '2018-01-11 14:43:59', NULL),
(7, 2, 'Richieu Mendoza', 'NA', 'na', 'NA', 'NA', '2018-01-11 14:44:46', '2018-01-11 14:44:46', NULL),
(8, 2, 'Offshore Marine & Industrial Works Inc.', 'NA', 'na', 'NA', 'NA', '2018-01-11 14:46:04', '2018-01-11 14:46:04', NULL),
(9, 2, 'Samuel C. Zabala', 'NA', 'Na', 'NA', 'NA', '2018-01-26 08:47:46', '2018-01-26 08:47:46', NULL),
(10, 2, 'Louid Pilapil', 'NA', 'Na', 'NA', 'NA', '2018-01-31 16:23:57', '2018-01-31 16:23:57', NULL),
(11, 2, 'Ronald Pial and Emilio Handumon', 'NA', 'Na', 'NA', 'NA', '2018-02-08 16:39:01', '2018-02-08 16:39:01', NULL),
(12, 2, 'Ahead Petron Servicenter', 'NA', 'Na', 'NA', 'NA', '2018-02-08 16:42:01', '2018-02-08 16:42:01', NULL),
(13, 2, 'Wellmade Motors and Development Corporation', 'NA', 'Na', 'NA', 'NA', '2018-02-08 16:58:29', '2018-02-08 16:58:29', NULL),
(15, 2, 'Nicanor Manatad', 'NA', 'Na', 'NA', 'NA', '2018-02-09 14:23:36', '2018-02-09 14:23:36', NULL),
(16, 2, 'Fernando Dela Serna', 'NA', 'Na', 'NA', 'NA', '2018-02-12 10:49:01', '2018-02-12 10:49:01', NULL),
(18, 2, 'Eldred Sanchez', 'NA', 'Na', 'NA', 'NA', '2018-02-12 13:18:01', '2018-02-12 13:18:01', NULL),
(19, 2, 'Ryan Bacus', 'NA', 'Na', 'NA', 'NA', '2018-02-15 11:36:38', '2018-02-15 11:36:38', NULL),
(20, 2, 'RRPS Electrical and Equipment Motors Rewinding Ser.', 'NA', 'Na', 'NA', 'NA', '2018-02-15 13:56:36', '2018-02-15 13:56:36', NULL),
(21, 2, 'Celso Roble', 'NA', 'Na', 'NA', 'NA', '2018-02-15 14:38:43', '2018-02-15 14:38:43', NULL),
(22, 2, 'Wenceslao Villarosa', 'NA', 'Na', 'NA', 'NA', '2018-02-15 15:07:04', '2018-02-15 15:07:04', NULL),
(23, 2, 'Gerald Limpangog', 'NA', 'Na', 'NA', 'NA', '2018-02-21 15:28:47', '2018-02-21 15:28:47', NULL),
(24, 2, 'Roque Alerta', 'NA', 'Na', 'NA', 'NA', '2018-02-22 15:41:59', '2018-02-22 15:41:59', NULL),
(25, 2, 'TEST', 'NA', 'NA', 'NA', 'NA', '2018-02-24 15:51:01', '2018-02-24 15:51:01', NULL),
(26, 2, 'for delete', 'NA', 'Na', 'NA', 'NA', '2018-03-01 09:56:33', '2018-03-01 09:56:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcontractorworks`
--

CREATE TABLE `subcontractorworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` datetime NOT NULL,
  `subcontractor` int(10) UNSIGNED NOT NULL,
  `equipment` int(10) UNSIGNED NOT NULL,
  `project` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope_of_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_start_date` datetime NOT NULL,
  `percentage_status` decimal(8,2) NOT NULL DEFAULT '0.00',
  `contract_amount` decimal(8,2) UNSIGNED NOT NULL,
  `total_previous_paid_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `last_payment_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `payment_update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `total_current_paid_amount` decimal(8,2) DEFAULT NULL,
  `total_amount_due_left` decimal(8,2) NOT NULL DEFAULT '0.00',
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `updated_user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in-progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcontractorworks`
--

INSERT INTO `subcontractorworks` (`id`, `transaction_no`, `transaction_date`, `subcontractor`, `equipment`, `project`, `scope_of_work`, `project_start_date`, `percentage_status`, `contract_amount`, `total_previous_paid_amount`, `last_payment_amount`, `payment_update_at`, `total_current_paid_amount`, `total_amount_due_left`, `warranty`, `created_user_id`, `updated_user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(130, 'SCW20180208081509', '2018-02-08 00:00:00', 9, 18, 'Jeg Tower', 'Check vibro control circuit. Rewire electrical vibro control. Install provisional electrical switch. REpair vibro motor leak.', '2018-02-08 00:00:00', '0.00', '5500.00', '0.00', '5500.00', '2018-02-08 08:00:00', '5500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:16:46', '2018-02-08 16:16:46', NULL),
(131, 'SCW20180208081708', '2018-02-08 00:00:00', 9, 115, '38 Parks', 'Check and locate hydraulic pump oil leak. Repair source of oil leak.', '2018-02-08 00:00:00', '0.00', '3500.00', '0.00', '3500.00', '2018-02-08 08:00:00', '3500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:18:31', '2018-02-08 16:18:31', NULL),
(132, 'SCW20180208082807', '2018-02-08 00:00:00', 9, 5, 'SRP Pond A', 'Check/ Diagnose cause of engine, misfiring and consequent. Loss of power.Remove and replace defective fuel injector.', '2018-02-08 00:00:00', '0.00', '3800.00', '0.00', '3800.00', '2018-02-08 08:00:00', '3800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:33:48', '2018-02-08 16:33:48', NULL),
(133, 'SCW20180208083914', '2018-02-08 00:00:00', 11, 149, 'CDO Mesaverte', 'Assemble tower crane.', '2018-02-08 00:00:00', '0.00', '20000.00', '0.00', '20000.00', '2018-02-08 08:00:00', '20000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:40:01', '2018-02-08 16:40:01', NULL),
(134, 'SCW20180208084008', '2018-02-08 00:00:00', 11, 152, 'Ace Duamguete', 'Dis assemble tower crane.', '2018-02-08 00:00:00', '0.00', '20000.00', '0.00', '20000.00', '2018-02-08 08:00:00', '20000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:41:01', '2018-02-08 16:41:01', NULL),
(135, 'SCW20180208084734', '2018-02-08 00:00:00', 12, 47, 'MARIGONDON', '1 piece injection pump calibration, 3 pieces inejctor cleaning and testing.', '2018-02-08 00:00:00', '0.00', '1050.00', '0.00', '1050.00', '2018-02-08 08:00:00', '1050.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:48:59', '2018-02-08 16:48:59', NULL),
(136, 'SCW20180208085053', '2018-02-08 00:00:00', 12, 164, 'Yard 3', '1 piece nozzle tip, 1 piece return washer, 1 piece injection pump calibration, 1 piece  testing and cleaning.', '2018-02-08 00:00:00', '0.00', '1410.00', '0.00', '1410.00', '2018-02-15 05:43:25', '1410.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:52:40', '2018-02-15 13:43:25', NULL),
(137, 'SCW20180208085253', '2018-02-08 00:00:00', 12, 163, 'Ma.Luisa', '1pc plunger & barrel, 1pc nozzle tip,1pc delivery valve, 1pc holder oring,1pc injector oring, 1pc injector pump calibration,1pc inejctor cleaning & testing.', '2018-02-08 00:00:00', '0.00', '4911.70', '0.00', '0.00', '2018-02-15 05:47:49', '34000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:53:33', '2018-02-15 13:47:49', NULL),
(138, 'SCW20180208085344', '2018-02-08 00:00:00', 6, 423, 'Bohol', 'Bohol Batching Plant PMS, date 2/7/2018', '2018-02-08 00:00:00', '0.00', '9000.00', '0.00', '9000.00', '2018-02-08 08:00:00', '9000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:55:00', '2018-02-08 16:55:00', NULL),
(139, 'SCW20180208085625', '2018-02-08 00:00:00', 6, 425, 'Ace Dumaguete', 'Ace Dumaguete Batching Plant PMS date 2/7/2018', '2018-02-08 00:00:00', '0.00', '9000.00', '0.00', '9000.00', '2018-02-08 08:00:00', '9000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 16:57:23', '2018-02-08 16:57:23', NULL),
(140, 'SCW20180208085948', '2018-02-08 00:00:00', 13, 426, 'MARIGONDON', 'Resleeving or Reboring ,Machine liner \r\nV seat Ring Replace and Setting 8 pieces ,V-seat ring cutting and setting 8 pieces, Guide Replace and Honing 8 pieces .', '2018-02-08 00:00:00', '0.00', '8244.00', '0.00', '8244.00', '2018-02-08 08:00:00', '8244.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 17:05:42', '2018-02-08 17:05:42', NULL),
(141, 'SCW20180208090819', '2018-02-08 00:00:00', 4, 428, 'In House', 'Install fender skirt R-side 2 pieces.', '2018-02-08 00:00:00', '0.00', '1000.00', '0.00', '1000.00', '2018-02-08 08:00:00', '1000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 17:09:10', '2018-02-08 17:09:10', NULL),
(142, 'SCW20180208091032', '2018-02-08 00:00:00', 4, 430, 'Yard 3', 'Install bumper end L-R side.', '2018-02-08 00:00:00', '0.00', '500.00', '0.00', '500.00', '2018-02-08 08:00:00', '500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 17:11:11', '2018-02-08 17:11:11', NULL),
(143, 'SCW20180208091212', '2018-02-08 00:00:00', 4, 431, 'MARIGONDON', 'Repair act dump box padding L-R side and canopy and front bumper.', '2018-02-08 00:00:00', '0.00', '4000.00', '0.00', '4000.00', '2018-02-08 08:00:00', '4000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 17:13:00', '2018-02-08 17:13:00', NULL),
(144, 'SCW20180208091303', '2018-02-08 00:00:00', 4, 121, 'MARIGONDON', 'Align portion door L-side, Front bumper, Cowl lock, Install and welding exhaust pipe', '2018-02-08 00:00:00', '0.00', '3500.00', '0.00', '3500.00', '2018-02-08 08:00:00', '3500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 17:14:03', '2018-02-08 17:14:03', NULL),
(145, 'SCW20180208091408', '2018-02-08 00:00:00', 4, 25, 'CitiPark', 'Welding oil cooler.', '2018-02-08 00:00:00', '0.00', '1500.00', '0.00', '1500.00', '2018-02-08 08:00:00', '1500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-08 17:14:34', '2018-02-08 17:14:34', NULL),
(147, 'SCW20180209063151', '2018-02-09 00:00:00', 15, 115, '38 Parks', 'Cleaning, Grinding leaking portion. Welding, Testing.', '2018-02-09 00:00:00', '0.00', '850.00', '0.00', '850.00', '2018-02-09 08:00:00', '850.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-09 14:32:53', '2018-02-09 14:32:53', NULL),
(148, 'SCW20180209063411', '2018-02-09 00:00:00', 15, 437, 'Midpoint Residences', 'Dismantle , build up and machine of damage shaft.\r\nReplace damaged bearing. Assemble , Install and Setting.', '2018-02-09 00:00:00', '0.00', '3500.00', '0.00', '3500.00', '2018-02-09 08:00:00', '3500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-09 14:35:35', '2018-02-09 14:35:35', NULL),
(149, 'SCW20180209063553', '2018-02-09 00:00:00', 15, 11, 'SRP Batching Plant', 'Removal of old cutting edge blade. Install new one. Setting and align.', '2018-02-09 00:00:00', '0.00', '3200.00', '0.00', '3200.00', '2018-02-09 06:37:51', '3200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-09 14:37:01', '2018-02-09 14:37:51', NULL),
(150, 'SCW20180209063951', '2018-02-09 00:00:00', 15, 438, 'MARIGONDON', 'Cleaning and grinding. Fitting and welding put padding support.', '2018-02-09 00:00:00', '0.00', '1500.00', '0.00', '1500.00', '2018-02-09 08:00:00', '1500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-09 14:40:33', '2018-02-09 14:40:33', NULL),
(151, 'SCW20180209064038', '2018-02-09 00:00:00', 15, 431, 'MARIGONDON', 'Cutting of plate. Drilling, Fitting and Welding to set\r\nengine base. Fabricate support and welding. Install of engine.', '2018-02-09 00:00:00', '0.00', '3200.00', '0.00', '3200.00', '2018-02-09 08:00:00', '3200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-09 14:41:59', '2018-02-09 14:41:59', NULL),
(152, 'SCW20180212024925', '2018-02-12 00:00:00', 16, 149, 'CDO Mesaverte', 'Fabricate DCDC logo.', '2018-02-12 00:00:00', '0.00', '8000.00', '0.00', '8000.00', '2018-02-12 08:00:00', '8000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-12 10:50:05', '2018-02-12 10:50:05', NULL),
(153, 'SCW20180212054034', '2018-02-12 00:00:00', 18, 439, 'Sonedco', 'Check up grounded wiring tail light,signal light and wiper motor.', '2018-02-12 00:00:00', '0.00', '850.00', '0.00', '0.00', '2018-02-21 03:03:22', '950.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-12 13:42:30', '2018-02-21 11:03:22', NULL),
(1711, 'SCW2018021202492561', '2018-02-12 00:00:00', 16, 149, 'CDO Mesaverte', 'Fabricate DCDC logo.', '2018-02-12 00:00:00', '0.00', '8000.00', '0.00', '8000.00', '2018-02-12 08:00:00', '8000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-12 10:50:05', '2018-02-12 10:50:05', NULL),
(1712, 'SCW20180213062831', '2018-02-13 00:00:00', 18, 432, 'Sonedco', 'Pull-out alternator repair stator coil, soldering diode and assemble and install replace new AVR and topping.', '2018-02-13 00:00:00', '0.00', '1200.00', '0.00', '1200.00', '2018-02-14 09:29:37', '1200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-13 14:52:35', '2018-02-14 17:29:37', NULL),
(1713, 'SCW20180213102656', '2018-02-13 00:00:00', 4, 51, 'sample Project', 'asdasdasadasda', '2018-02-13 00:00:00', '0.00', '10000.00', '0.00', '0.00', '2018-02-21 07:56:02', '5000.00', '5000.00', '0', 2, 2, 'in-progress', '2018-02-13 18:27:09', '2018-02-21 15:56:02', NULL),
(1714, 'SCW20180214085756', '2018-02-14 00:00:00', 18, 441, 'SRP Batching Plant', 'Check up wiring back up light, install and topping light switch.', '2018-02-14 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-02-14 08:00:00', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-14 16:58:41', '2018-02-14 16:58:41', NULL),
(1715, 'SCW20180214085846', '2018-02-14 00:00:00', 18, 442, 'SRP Batching Plant', 'Check up wiring headlight, signal light and tail light.', '2018-02-14 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-02-14 08:00:00', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-14 16:59:22', '2018-02-14 16:59:22', NULL),
(1716, 'SCW20180214085926', '2018-02-14 00:00:00', 18, 130, 'Sonedco', 'General check up wiring install and topping new AVR 2 pcs tail light, signal light , wiper motor and battery relay.', '2018-02-14 00:00:00', '0.00', '1200.00', '0.00', '0.00', '2018-02-21 03:02:28', '1800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-14 17:00:33', '2018-02-21 11:02:28', NULL),
(1717, 'SCW20180214090039', '2018-02-14 00:00:00', 18, 134, 'Sonedco', 'Check wiring alternator install and rewiring AVR.', '2018-02-14 00:00:00', '0.00', '750.00', '0.00', '750.00', '2018-02-14 08:00:00', '750.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-14 17:01:18', '2018-02-14 17:01:18', NULL),
(1718, 'SCW20180214090123', '2018-02-14 00:00:00', 18, 110, 'MARIGONDON', 'Pull-out starter motor, check, repair soldering armature replace new solenoid assemble and install.', '2018-02-14 00:00:00', '0.00', '1400.00', '0.00', '1400.00', '2018-02-14 08:00:00', '1400.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-14 17:02:59', '2018-02-14 17:02:59', NULL),
(1719, 'SCW20180214090459', '2018-02-14 00:00:00', 18, 9, 'Sonedco', 'Check up wiring alternator install and wiring new AVR.', '2018-02-14 00:00:00', '0.00', '850.00', '0.00', '0.00', '2018-02-24 07:50:28', '850.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-14 17:05:42', '2018-02-24 15:50:28', NULL),
(1720, 'SCW20180215034030', '2018-02-15 00:00:00', 19, 443, 'Yard 3', 'Diagnose, troubleshooting clean all gear and bearing assemble & disassemble , testing and comissioning.', '2018-02-15 00:00:00', '0.00', '5000.00', '0.00', '0.00', '2018-03-01 02:58:30', '7000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 11:41:39', '2018-03-01 10:58:30', NULL),
(1721, 'SCW20180215034149', '2018-02-15 00:00:00', 19, 142, 'Yard 3', 'Diagnose, troubleshooting no voltage output  replace rotating diode of rotor replace generator stator coil replace capacitor and automotive relay testing and comissioning.', '2018-02-15 00:00:00', '0.00', '5000.00', '0.00', '0.00', '2018-03-02 03:03:55', '8500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 11:43:44', '2018-03-02 11:03:55', NULL),
(1722, 'SCW20180215034348', '2018-02-15 00:00:00', 19, 145, 'Yard 3', 'Diagnose, troubleshooting low voltage output and low frequency of the engine. Install starter and 2 lamps with ballast. Assemble and disassemble. Testing and comissioning.', '2018-02-15 00:00:00', '0.00', '5000.00', '0.00', '0.00', '2018-03-02 03:04:38', '8500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 11:47:54', '2018-03-02 11:04:38', NULL),
(1723, 'SCW20180215034800', '2018-02-15 00:00:00', 19, 317, 'Yard 3', 'Diagnose, troubleshooting replace 2 pcs capacitor assemble and disassemble. Testing and comissioning.', '2018-02-15 00:00:00', '0.00', '1500.00', '0.00', '0.00', '2018-03-01 02:55:56', '3000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 11:49:17', '2018-03-01 10:55:56', NULL),
(1724, 'SCW20180215055651', '2018-02-15 00:00:00', 20, 377, 'Yard 3', '1 unit for the complete rewinding of 4hp,3600,220 volts, 3,60hz sub pump motor.', '2018-02-15 00:00:00', '0.00', '4882.50', '0.00', '4882.50', '2018-02-15 08:00:00', '4882.50', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 13:58:39', '2018-02-15 13:58:39', NULL),
(1725, 'SCW20180215060155', '2018-02-15 00:00:00', 9, 44, 'Jeg Tower', 'Repair hydraulic control valve oil leak.', '2018-02-15 00:00:00', '0.00', '4500.00', '0.00', '4500.00', '2018-02-15 08:00:00', '4500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:02:50', '2018-02-15 14:02:50', NULL),
(1726, 'SCW20180215060304', '2018-02-15 00:00:00', 9, 116, 'Jeg Tower', 'Check repair engine oil leak thru the cylinder head and rocker arm cover.', '2018-02-15 00:00:00', '0.00', '4800.00', '0.00', '4800.00', '2018-02-15 08:00:00', '4800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:04:07', '2018-02-15 14:04:07', NULL),
(1727, 'SCW20180215060413', '2018-02-15 00:00:00', 9, 18, 'Jeg Tower', 'Check fuel system start up engine. Repair fuel leak on the loose thread filter base plug,', '2018-02-15 00:00:00', '0.00', '4500.00', '0.00', '4500.00', '2018-02-15 08:00:00', '4500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:05:12', '2018-02-15 14:05:12', NULL),
(1728, 'SCW20180215060704', '2018-02-15 00:00:00', 9, 444, 'SRP Batching Plant', 'Dismount gear box drive. Disassemble gear box and evaluate damage for possible parts replacement or repair.', '2018-02-15 00:00:00', '0.00', '6500.00', '0.00', '6500.00', '2018-02-15 06:09:58', '6500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:08:24', '2018-02-15 14:09:58', NULL),
(1729, 'SCW20180215061343', '2018-02-15 00:00:00', 7, 445, 'MARIGONDON', 'Create plate number 2pcs and replace sticker.', '2018-02-15 00:00:00', '0.00', '500.00', '0.00', '500.00', '2018-02-15 08:00:00', '500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:14:34', '2018-02-15 14:14:34', NULL),
(1732, 'SCW20180215062026', '2018-02-15 00:00:00', 7, 431, 'MARIGONDON', 'Repaint bumper and dump box siding padding and canopy,', '2018-02-15 00:00:00', '0.00', '1500.00', '0.00', '1500.00', '2018-02-15 08:00:00', '1500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:21:34', '2018-02-15 14:21:34', NULL),
(1733, 'SCW20180215063850', '2018-02-15 00:00:00', 21, 121, 'MARIGONDON', 'Install gear box and drag link and gear box fittings.', '2018-02-15 00:00:00', '0.00', '2900.00', '0.00', '2900.00', '2018-02-15 08:00:00', '2900.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:39:40', '2018-02-15 14:39:40', NULL),
(1734, 'SCW20180215064044', '2018-02-15 00:00:00', 21, 121, 'MARIGONDON', 'Install hydrovac big and relief valve and fittings lines.', '2018-02-15 00:00:00', '0.00', '2400.00', '0.00', '2400.00', '2018-02-15 08:00:00', '2400.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:42:25', '2018-02-15 14:42:25', NULL),
(1735, 'SCW20180215064228', '2018-02-15 00:00:00', 21, 121, 'MARIGONDON', 'Install power steering lines copper tubing and hose.', '2018-02-15 00:00:00', '0.00', '900.00', '0.00', '900.00', '2018-02-15 08:00:00', '900.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:43:10', '2018-02-15 14:43:10', NULL),
(1736, 'SCW20180215064316', '2018-02-15 00:00:00', 21, 121, 'MARIGONDON', 'Install clutch booster and fittings lines.', '2018-02-15 00:00:00', '0.00', '1200.00', '0.00', '1200.00', '2018-02-15 08:00:00', '1200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:43:51', '2018-02-15 14:43:51', NULL),
(1737, 'SCW20180215064407', '2018-02-15 00:00:00', 21, 121, 'MARIGONDON', 'Install hydrovac small and relief valve and fitting lines.', '2018-02-15 00:00:00', '0.00', '2200.00', '0.00', '2200.00', '2018-02-15 08:00:00', '2200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:45:14', '2018-02-15 14:45:14', NULL),
(1738, 'SCW20180215064518', '2018-02-15 00:00:00', 21, 132, 'MARIGONDON', 'Pull-out drag link and gearbox.', '2018-02-15 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-02-15 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:45:53', '2018-02-15 14:45:53', NULL),
(1739, 'SCW20180215065021', '2018-02-15 00:00:00', 8, 46, 'AA Comissary', '1 cylinder head komatsu 4D88E, surface grind, turbo wash.', '2018-02-15 00:00:00', '0.00', '1905.00', '0.00', '1905.00', '2018-02-15 08:00:00', '1905.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:51:39', '2018-02-15 14:51:39', NULL),
(1740, 'SCW20180215065323', '2018-02-15 00:00:00', 8, 446, 'Yard 3', '1 water pump isuzu 10 wheeleers. Press-out and install repair kit.', '2018-02-15 00:00:00', '0.00', '4256.00', '0.00', '4256.00', '2018-02-15 08:00:00', '4256.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:55:58', '2018-02-15 14:55:58', NULL),
(1741, 'SCW20180215065603', '2018-02-15 00:00:00', 8, 28, '38 Parks', '1 assy swivel for hydraulic press-out and press-in', '2018-02-15 00:00:00', '0.00', '3360.00', '0.00', '3360.00', '2018-02-15 08:00:00', '3360.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 14:59:05', '2018-02-15 14:59:05', NULL),
(1742, 'SCW20180215065924', '2018-02-15 00:00:00', 8, 28, '38 Parks', '1pc hydraulic rod, align.', '2018-02-15 00:00:00', '0.00', '1680.00', '0.00', '1680.00', '2018-02-15 08:00:00', '1680.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 15:00:01', '2018-02-15 15:00:01', NULL),
(1743, 'SCW20180215070033', '2018-02-15 00:00:00', 8, 66, 'Yard 3', '1 cylinder head nissan PD-27, surface grind, turbo wash.', '2018-02-15 00:00:00', '0.00', '1905.00', '0.00', '1905.00', '2018-02-15 08:00:00', '1905.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 15:01:49', '2018-02-15 15:01:49', NULL),
(1745, 'SCW20180215071929', '2018-02-15 00:00:00', 22, 447, 'Baseline', 'Services rendered in the inspection of your tower crane by First Phil Inspectors. They conducted testing using 3.1 tons of 38 meters radius & also testes the hoisting & trolley limit safety.', '2018-02-15 00:00:00', '0.00', '5000.00', '0.00', '5000.00', '2018-02-15 08:00:00', '5000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 15:23:27', '2018-02-15 15:23:27', NULL),
(1746, 'SCW20180215094341', '2018-02-15 00:00:00', 6, 448, 'SRP Batching Plant', 'Additional charge of Fabrication Filter Screen.\r\n1. Fabrication of filter screen  # 10mmx1mx2m=9 sheet\r\n2. Fabrication of Filter Screen # 10mmx1mx3m= 3 sheet', '2018-02-15 00:00:00', '0.00', '15000.00', '0.00', '15000.00', '2018-02-15 08:00:00', '15000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 17:45:29', '2018-02-15 17:45:29', NULL),
(1747, 'SCW20180215094534', '2018-02-15 00:00:00', 6, 448, 'SRP Batching Plant', 'SRP Batching Plant PMS Date Feb.15,2018.', '2018-02-15 00:00:00', '0.00', '6000.00', '0.00', '0.00', '2018-02-21 02:51:43', '8000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-15 17:46:14', '2018-02-21 10:51:43', NULL),
(1748, 'SCW20180216033554', '2018-01-26 00:00:00', 7, 121, 'MARIGONDON', 'Repaint cowl.', '2018-01-26 00:00:00', '0.00', '9000.00', '4000.00', '4000.00', '2018-02-24 08:05:16', NULL, '5000.00', '0', 2, 2, 'in-progress', '2018-02-16 11:37:11', '2018-02-24 16:05:16', NULL),
(1749, 'SCW20180220180434', '2018-02-20 00:00:00', 4, 53, 'test', 'testtesttesttesttesttest', '2018-02-20 00:00:00', '0.00', '3500.00', '0.00', '1000.00', '2018-02-20 20:53:32', '1000.00', '2000.00', '0', 2, 2, 'in-progress', '2018-02-21 02:05:00', '2018-02-21 04:53:32', NULL),
(1750, 'SCW20180221025542', '2018-02-21 00:00:00', 10, 111, 'Sonedco', 'Machine/ Implement slow movement', '2018-02-21 00:00:00', '0.00', '17500.00', '0.00', '17500.00', '2018-02-21 08:00:00', '17500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-21 10:56:50', '2018-02-21 10:56:50', NULL),
(1751, 'SCW20180221025654', '2018-02-21 00:00:00', 10, 107, 'Sonedco', 'Engine low power, sudden shutdown in long operation', '2018-02-21 00:00:00', '0.00', '17500.00', '0.00', '17500.00', '2018-02-21 08:00:00', '17500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-21 10:57:41', '2018-02-21 10:57:41', NULL),
(1752, 'SCW20180221061811', '2018-02-21 00:00:00', 4, 51, 'test test test', 'asdadadatest test test', '2018-02-21 00:00:00', '0.00', '12000.00', '0.00', '3000.00', '2018-02-21 08:00:00', '3000.00', '9000.00', '0', 2, 2, 'in-progress', '2018-02-21 14:18:35', '2018-02-21 14:18:35', NULL),
(1753, 'SCW20180221070427', '2018-02-09 00:00:00', 4, 51, 'tist', 'tist tist tist', '2018-02-09 00:00:00', '0.00', '8000.00', '2000.00', '2000.00', '2018-02-21 07:06:58', NULL, '8000.00', '0', 2, 2, 'in-progress', '2018-02-21 15:05:25', '2018-02-21 15:06:58', NULL),
(1754, 'SCW20180221072859', '2018-02-21 00:00:00', 23, 447, 'Baseline', 'Install & troubleshoot all limit switch, Setting of all limits hoisting, slewing and trolley. Conduct initial load testing. Set pulley block limit. Assist the inspector .', '2018-02-21 00:00:00', '0.00', '6000.00', '0.00', '6000.00', '2018-02-21 08:00:00', '6000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-21 15:31:37', '2018-02-21 15:31:37', NULL),
(1755, 'SCW20180221073332', '2018-02-21 00:00:00', 23, 449, 'Baseline', 'Install & troubleshoot all limits switch. Setting of all limits hoisting, slewing  & trolley. Conduct initial load testing. Set pulley block limit.', '2018-02-21 00:00:00', '0.00', '6000.00', '0.00', '6000.00', '2018-02-21 08:00:00', '6000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-21 15:35:28', '2018-02-21 15:35:28', NULL),
(1756, 'SCW20180222065158', '2018-02-22 00:00:00', 12, 32, 'MARIGONDON', '6 pcs plunger & barrel, 6pcs delivery valve,6pcs oring holder,6pcs D.V gasket,1pc governor oil seal,1pc governor oring,,,...injection pump calibration , injector cleaning & testing.', '2018-02-22 00:00:00', '0.00', '19518.00', '0.00', '19518.00', '2018-02-22 08:00:00', '19518.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-22 14:56:41', '2018-02-22 14:56:41', NULL),
(1757, 'SCW20180222065809', '2018-02-22 00:00:00', 12, 429, 'Yard 3', '1pc injection pump calibration,10pcs injector testing and cleaning.', '2018-02-22 00:00:00', '0.00', '2500.00', '0.00', '2500.00', '2018-02-22 08:00:00', '2500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-22 15:03:21', '2018-02-22 15:03:21', NULL),
(1758, 'SCW20180222070352', '2018-02-22 00:00:00', 12, 109, 'Baseline', '4 pcs oring holder,4pcs disc washer,1pc injector pump replace oring.', '2018-02-22 00:00:00', '0.00', '932.00', '0.00', '932.00', '2018-02-22 08:00:00', '932.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-22 15:05:20', '2018-02-22 15:05:20', NULL),
(1759, 'SCW20180224075620', '2018-02-09 00:00:00', 25, 51, '1234', '1 123 123123', '2018-02-09 00:00:00', '0.00', '15000.00', '15000.00', '15000.00', '2018-02-27 15:54:24', NULL, '0.00', '0', 2, 2, 'in-progress', '2018-02-24 15:57:03', '2018-02-27 23:54:24', NULL),
(1760, 'SCW20180227155545', '2018-02-15 00:00:00', 25, 51, 'gregorio', 'abcdefghijkl', '2018-02-15 00:00:00', '0.00', '30000.00', '10000.00', '10000.00', '2018-02-15 08:00:00', NULL, '20000.00', '0', 2, 2, 'in-progress', '2018-02-27 23:56:33', '2018-02-27 23:56:33', NULL),
(1761, 'SCW20180227160247', '2018-02-27 00:00:00', 25, 51, 'elavation', 'elavation12345 12345', '2018-02-27 00:00:00', '0.00', '3500.00', '0.00', '4000.00', '2018-02-27 16:05:28', '4000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 00:04:38', '2018-02-28 00:05:28', NULL),
(1762, 'SCW20180228020027', '2018-02-28 00:00:00', 9, 444, 'SRP Batching Plant', 'Recondition and assemble planetary gear box drive. Install gear box to unit.', '2018-02-28 00:00:00', '0.00', '5000.00', '0.00', '5000.00', '2018-02-28 08:00:00', '5000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 10:01:37', '2018-02-28 10:01:37', NULL),
(1763, 'SCW20180228021826', '2018-02-28 00:00:00', 24, 450, 'CDO Mesaverte', 'Check up motor 1.5 hp and topping.', '2018-02-28 00:00:00', '0.00', '1800.00', '0.00', '1800.00', '2018-02-28 08:00:00', '1800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 10:19:06', '2018-02-28 10:19:06', NULL),
(1764, 'SCW20180228022058', '2018-02-28 00:00:00', 24, 451, 'CDO Mesaverte', 'Topping and wirings.', '2018-02-28 00:00:00', '0.00', '6500.00', '0.00', '6500.00', '2018-02-28 08:00:00', '6500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 10:21:51', '2018-02-28 10:21:51', NULL),
(1765, 'SCW20180228023909', '2018-02-28 00:00:00', 20, 452, 'UP', '1 unit for the complete rewinding of 10hp,1750 rpm,220 volts,60hz.', '2018-02-28 00:00:00', '0.00', '8736.00', '0.00', '8736.00', '2018-03-01 02:51:25', '8736.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 10:40:12', '2018-03-01 10:51:25', NULL),
(1766, 'SCW20180228024242', '2018-02-28 00:00:00', 20, 453, 'Yard 3', '1 unit for the complete rewinding of  3.7 kW,(5hp) 1730rpm, 220/380 volts,3 60hz induction motor.', '2018-02-28 00:00:00', '0.00', '4882.50', '0.00', '4882.50', '2018-03-01 02:51:04', '4882.50', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 10:44:04', '2018-03-01 10:51:04', NULL),
(1767, 'SCW20180228033740', '2018-02-28 00:00:00', 24, 149, 'CDO Mesaverte', 'Swing and trolley panel board wiring to cabin switching control.', '2018-02-28 00:00:00', '0.00', '30000.00', '0.00', '30000.00', '2018-02-28 08:00:00', '30000.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 11:40:12', '2018-02-28 11:40:12', NULL),
(1768, 'SCW20180228034145', '2018-02-28 00:00:00', 8, 100, 'MARIGONDON', '1 Rotor coil, rebore to round  rotor coil, buil dup, machining rotor coil shaft, cut key way and fabricate key bar. Disassemble, re-assemble after repair.', '2018-02-28 00:00:00', '0.00', '8960.00', '0.00', '8960.00', '2018-02-28 08:00:00', '8960.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 11:43:39', '2018-02-28 11:43:39', NULL),
(1769, 'SCW20180228034348', '2018-02-28 00:00:00', 8, 46, 'AA Comissary', '1pc hydrauli rod, align.', '2018-02-28 00:00:00', '0.00', '1680.00', '0.00', '1680.00', '2018-02-28 08:00:00', '1680.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 11:44:27', '2018-02-28 11:44:27', NULL),
(1770, 'SCW20180228055708', '2018-02-28 00:00:00', 15, 454, 'Yard 3', 'Cutting , hammering to removed bolts 60/pc= 3pcs', '2018-02-28 00:00:00', '0.00', '180.00', '0.00', '360.00', '2018-03-01 09:19:38', '360.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 13:58:16', '2018-03-01 17:19:38', NULL),
(1771, 'SCW20180228055827', '2018-02-28 00:00:00', 15, 446, 'Yard 3', 'Cutting , Hammering to removed bolts  60/pc=5 pcs', '2018-02-28 00:00:00', '0.00', '300.00', '0.00', '600.00', '2018-03-01 09:28:30', '600.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 13:59:36', '2018-03-01 17:28:30', NULL),
(1772, 'SCW20180228055942', '2018-02-28 00:00:00', 15, 437, 'Midpoint Residences', 'Dismantle to check defect. Drilling and counter bore to oversize bolts. Assemble , install and settings.', '2018-02-28 00:00:00', '0.00', '5500.00', '0.00', '5500.00', '2018-02-28 08:00:00', '5500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:01:02', '2018-02-28 14:01:02', NULL),
(1773, 'SCW20180228060111', '2018-02-28 00:00:00', 15, 448, 'SRP Batching Plant', 'Drilling to remove broken bolts. Hand tapping.', '2018-02-28 00:00:00', '0.00', '350.00', '0.00', '350.00', '2018-02-28 08:00:00', '350.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:02:07', '2018-02-28 14:02:07', NULL),
(1774, 'SCW20180228060213', '2018-02-28 00:00:00', 15, 44, 'Jeg Tower', 'Welding of fitting connector.', '2018-02-28 00:00:00', '0.00', '380.00', '0.00', '380.00', '2018-02-28 08:00:00', '380.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:02:45', '2018-02-28 14:02:45', NULL),
(1775, 'SCW20180228060300', '2018-02-28 00:00:00', 15, 25, '38 Parks', 'Fabricate lock plate. Cutting of material , grinding , Lay-out and drlling. 180/pc= 2pcs', '2018-02-28 00:00:00', '0.00', '360.00', '0.00', '360.00', '2018-02-28 08:00:00', '360.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:04:42', '2018-02-28 14:04:42', NULL),
(1776, 'SCW20180228060456', '2018-02-28 00:00:00', 15, 25, '38 Parks', 'Machining pin  as required diameter and length,180/pc=2 pcs', '2018-02-28 00:00:00', '0.00', '380.00', '0.00', '380.00', '2018-02-28 08:00:00', '380.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:06:14', '2018-02-28 14:06:14', NULL),
(1777, 'SCW20180228060705', '2018-02-28 00:00:00', 15, 27, 'Bohol', 'Pull-out damaged bearing. Install & setting of new bearing. Grinding & sanding of pulley shaft and bushing for smooth surface.', '2018-02-28 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-03-01 01:50:42', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:25:27', '2018-03-01 09:50:42', NULL),
(1778, 'SCW20180228062536', '2018-02-28 00:00:00', 15, 439, 'Sonedco', 'Machining as required scale . Drilling 220/pc=2pcs', '2018-02-28 00:00:00', '0.00', '440.00', '0.00', '440.00', '2018-02-28 08:00:00', '440.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:27:07', '2018-02-28 14:27:07', NULL),
(1779, 'SCW20180228063500', '2018-02-28 00:00:00', 15, 439, 'Sonedco', 'Welding damaged portion using case iron welding rod. Machining to fit oil seal.', '2018-02-28 00:00:00', '0.00', '1800.00', '0.00', '1800.00', '2018-02-28 08:00:00', '1800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:42:11', '2018-02-28 14:42:11', NULL),
(1780, 'SCW20180228064517', '2018-02-28 00:00:00', 15, 455, 'MARIGONDON', 'Machine to round of starter shaft. Fabricated bushing and final machining.', '2018-02-28 00:00:00', '0.00', '1200.00', '0.00', '1200.00', '2018-02-28 08:00:00', '1200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:46:33', '2018-02-28 14:46:33', NULL),
(1781, 'SCW20180228064640', '2018-02-28 00:00:00', 15, 105, 'Yard 3', 'Welding crack portion, Machining , Fabricate sleeve, final machining to fit bearing.', '2018-02-28 00:00:00', '0.00', '850.00', '0.00', '850.00', '2018-02-28 08:00:00', '850.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:47:39', '2018-02-28 14:47:39', NULL),
(1782, 'SCW20180228064749', '2018-02-28 00:00:00', 15, 452, 'UP', 'Welding of casing using TIG welding machine with aluminum filler rod. Machining', '2018-02-28 00:00:00', '0.00', '3500.00', '0.00', '3500.00', '2018-02-28 08:00:00', '3500.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:48:48', '2018-02-28 14:48:48', NULL),
(1783, 'SCW20180228064954', '2018-02-28 00:00:00', 15, 456, '38 Parks', 'Machining of shaft as required form and scale. Threading to fit nut. Insert bearing 350/pc=12 pcs', '2018-02-28 00:00:00', '0.00', '4200.00', '0.00', '4200.00', '2018-02-28 08:00:00', '4200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:50:58', '2018-02-28 14:50:58', NULL),
(1784, 'SCW20180228065105', '2018-02-02 00:00:00', 26, 133, 'MARIGONDON', 'Re-condition of mixer drum and blades.', '2018-02-02 00:00:00', '0.00', '30000.00', '18000.00', '18000.00', '2018-03-01 09:02:32', NULL, '12000.00', '0', 2, 2, 'in-progress', '2018-02-28 14:52:45', '2018-03-01 17:02:32', NULL),
(1785, 'SCW20180228065351', '2018-02-28 00:00:00', 15, 144, 'SRP Batching Plant', 'Machining and threading as required scale. Welding of plate for lock.', '2018-02-28 00:00:00', '0.00', '550.00', '0.00', '550.00', '2018-02-28 08:00:00', '550.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:54:38', '2018-02-28 14:54:38', NULL),
(1786, 'SCW20180228065449', '2018-02-28 00:00:00', 15, 444, 'SRP Batching Plant', 'Grinding for grooving. Welding with procedure to prevent crack grinding.', '2018-02-28 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-02-28 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:55:47', '2018-02-28 14:55:47', NULL),
(1787, 'SCW20180228065551', '2018-02-28 00:00:00', 15, 444, 'SRP Batching Plant', 'Cutting of bearing to pull-out . Hammering', '2018-02-28 00:00:00', '0.00', '380.00', '0.00', '380.00', '2018-02-28 08:00:00', '380.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:56:38', '2018-02-28 14:56:38', NULL),
(1788, 'SCW20180228065645', '2018-02-28 00:00:00', 15, 39, 'Yard 3', 'Dismantle and check up . Replace bearing and assemble.', '2018-02-28 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-02-28 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:57:24', '2018-02-28 14:57:24', NULL),
(1789, 'SCW20180228065753', '2018-02-28 00:00:00', 15, 59, 'AA Comissary', 'Press to pull-out drive gear. Welding broken and damaged teeth. Machining and grinding wisely.', '2018-02-28 00:00:00', '0.00', '3200.00', '0.00', '3200.00', '2018-02-28 08:00:00', '3200.00', '0.00', '0', 2, 2, 'in-progress', '2018-02-28 14:59:09', '2018-02-28 14:59:09', NULL),
(1790, 'SCW20180301013506', '2018-03-01 00:00:00', 4, 121, 'MARIGONDON', 'Air tank fabricate bracket and welding oil tank.', '2018-03-01 00:00:00', '0.00', '2000.00', '0.00', '2000.00', '2018-03-01 08:00:00', '2000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:36:09', '2018-03-01 09:36:09', NULL),
(1791, 'SCW20180301013620', '2018-03-01 00:00:00', 26, 138, 'MARIGONDON', 'Cowl body Repair.', '2018-03-01 00:00:00', '0.00', '27000.00', '0.00', '17000.00', '2018-03-01 01:57:16', '17000.00', '10000.00', '0', 2, 2, 'in-progress', '2018-03-01 09:37:12', '2018-03-01 09:57:16', NULL),
(1792, 'SCW20180301013946', '2018-03-01 00:00:00', 4, 457, 'SRP Batching Plant', 'Repair act flooring R-side and pull-out footvalve and headlight R-side and front grill.', '2018-03-01 00:00:00', '0.00', '2500.00', '0.00', '2500.00', '2018-03-01 08:00:00', '2500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:40:51', '2018-03-01 09:40:51', NULL),
(1793, 'SCW20180301014157', '2018-03-01 00:00:00', 4, 458, 'MARIGONDON', 'Fabricate mufflier and install and amounting.', '2018-03-01 00:00:00', '0.00', '2000.00', '0.00', '2000.00', '2018-03-01 08:00:00', '2000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:42:42', '2018-03-01 09:42:42', NULL),
(1794, 'SCW20180301014429', '2018-03-01 00:00:00', 4, 459, 'MARIGONDON', 'Repair act front bumper and post up and align.', '2018-03-01 00:00:00', '0.00', '1500.00', '0.00', '1500.00', '2018-03-01 08:00:00', '1500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:45:11', '2018-03-01 09:45:11', NULL),
(1795, 'SCW20180301014516', '2018-03-01 00:00:00', 4, 421, 'Yard 3', 'Repair mufflier and post up and welding bracket.', '2018-03-01 00:00:00', '0.00', '1000.00', '0.00', '1000.00', '2018-03-01 08:00:00', '1000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:46:03', '2018-03-01 09:46:03', NULL),
(1796, 'SCW20180301014610', '2018-03-01 00:00:00', 4, 431, 'MARIGONDON', 'Repair mufflier post up and align. Fabricate accelerator bracket and replace door lock R-side headlight frame L-R side.', '2018-03-01 00:00:00', '0.00', '2500.00', '0.00', '2500.00', '2018-03-01 08:00:00', '2500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:47:27', '2018-03-01 09:47:27', NULL),
(1797, 'SCW20180301014737', '2018-03-01 00:00:00', 4, 32, 'MARIGONDON', 'Welding air suction 1pc.', '2018-03-01 00:00:00', '0.00', '500.00', '0.00', '500.00', '2018-03-01 08:00:00', '500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 09:48:05', '2018-03-01 09:48:05', NULL),
(1798, 'SCW20180301015724', '2018-02-05 00:00:00', 26, 138, 'MARIGONDON', 'Cowl body Repair.', '2018-02-05 00:00:00', '0.00', '27000.00', '17000.00', '17000.00', '2018-03-01 02:02:34', NULL, '10000.00', '0', 2, 2, 'in-progress', '2018-03-01 09:59:54', '2018-03-01 10:02:34', NULL),
(1799, 'SCW20180301020247', '2018-02-23 00:00:00', 26, 138, 'MARIGONDON', 'Cowl body Repair.', '2018-02-23 00:00:00', '0.00', '27000.00', '17000.00', '17000.00', '2018-03-01 08:01:33', NULL, '10000.00', '0', 2, 2, 'in-progress', '2018-03-01 10:03:52', '2018-03-01 16:01:33', NULL),
(1800, 'SCW20180301024128', '2018-03-01 00:00:00', 7, 463, 'Yard 3', 'Repaint whole body and boom.', '2018-03-01 00:00:00', '0.00', '18000.00', '0.00', '18000.00', '2018-03-01 08:00:00', '18000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 10:42:56', '2018-03-01 10:42:56', NULL),
(1801, 'SCW20180301024301', '2018-03-01 00:00:00', 7, 460, 'Yard 3', 'Replace sticker.', '2018-03-01 00:00:00', '0.00', '200.00', '0.00', '200.00', '2018-03-01 08:00:00', '200.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 10:43:38', '2018-03-01 10:43:38', NULL),
(1802, 'SCW20180301024346', '2018-03-01 00:00:00', 7, 461, 'Yard 3', 'Replace sticker.', '2018-03-01 00:00:00', '0.00', '200.00', '0.00', '200.00', '2018-03-01 08:00:00', '200.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 10:44:28', '2018-03-01 10:44:28', NULL),
(1803, 'SCW20180301024432', '2018-03-01 00:00:00', 7, 462, 'Yard 3', 'Replace sticker.', '2018-03-01 00:00:00', '0.00', '200.00', '0.00', '200.00', '2018-03-01 08:00:00', '200.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 10:45:04', '2018-03-01 10:45:04', NULL),
(1804, 'SCW20180301024512', '2018-03-01 00:00:00', 7, 421, 'Yard 3', 'Retouch the unit', '2018-03-01 00:00:00', '0.00', '500.00', '0.00', '500.00', '2018-03-01 08:00:00', '500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 10:45:58', '2018-03-01 10:45:58', NULL),
(1805, 'SCW20180301031157', '2018-03-01 00:00:00', 18, 464, 'Yard 3', 'Check up wiring ignition switch and signal light.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-03-01 05:34:14', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:14:00', '2018-03-01 13:34:14', NULL),
(1806, 'SCW20180301031855', '2018-03-01 00:00:00', 18, 465, 'MARIGONDON', 'Check up wiring alternator , repair AVR and cleaning contact point.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-03-01 05:34:26', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:20:00', '2018-03-01 13:34:26', NULL),
(1807, 'SCW20180301032433', '2018-03-01 00:00:00', 18, 466, 'MARIGONDON', 'Pull-out starter motor repair stator coil. Replace carbon brush assemble and install', '2018-03-01 00:00:00', '0.00', '1200.00', '0.00', '1200.00', '2018-03-01 08:00:00', '1200.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:26:00', '2018-03-01 11:26:00', NULL),
(1808, 'SCW20180301032721', '2018-03-01 00:00:00', 18, 431, 'MARIGONDON', 'Rewiring , re-topping and install tail light, PTO alternator, AVR, signal light, ignition switch and brake light', '2018-03-01 00:00:00', '0.00', '2500.00', '0.00', '2500.00', '2018-03-01 08:00:00', '2500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:30:21', '2018-03-01 11:30:21', NULL),
(1809, 'SCW20180301034637', '2018-03-01 00:00:00', 18, 467, 'MARIGONDON', 'Check up wiring PTO re topping PTO solenoid.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-03-01 08:00:00', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:47:19', '2018-03-01 11:47:19', NULL),
(1810, 'SCW20180301034837', '2018-03-01 00:00:00', 18, 468, 'Sonedco', 'Check up wiring alternator headlight, tail light install and topping new AVR.', '2018-03-01 00:00:00', '0.00', '950.00', '0.00', '950.00', '2018-03-01 08:00:00', '950.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:49:31', '2018-03-01 11:49:31', NULL),
(1811, 'SCW20180301035022', '2018-03-01 00:00:00', 18, 47, 'Sogod', 'Repair starter motor re-taping field coil replace solenoid carbon brush and assemble.', '2018-03-01 00:00:00', '0.00', '1400.00', '0.00', '1400.00', '2018-03-01 08:00:00', '1400.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:51:25', '2018-03-01 11:51:25', NULL),
(1812, 'SCW20180301035131', '2018-03-01 00:00:00', 18, 108, 'Ace Dumaguete', 'Repair starter motor bendex guide replace new solenoid , relay and assemble.', '2018-03-01 00:00:00', '0.00', '850.00', '0.00', '850.00', '2018-03-01 08:00:00', '850.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:52:49', '2018-03-01 11:52:49', NULL),
(1813, 'SCW20180301035256', '2018-03-01 00:00:00', 18, 110, 'MARIGONDON', 'Rewind alternator stator coil assemble and install & wiring new AVR.', '2018-03-01 00:00:00', '0.00', '1200.00', '0.00', '1800.00', '2018-03-02 03:09:24', '1800.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:53:41', '2018-03-02 11:09:24', NULL),
(1814, 'SCW20180301035345', '2018-03-01 00:00:00', 18, 144, 'SRP Batching Plant', 'Check up grounded wiring tail light and brake light.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-03-01 08:00:00', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:55:00', '2018-03-01 11:55:00', NULL),
(1815, 'SCW20180301035509', '2018-03-01 00:00:00', 18, 144, 'SRP Batching Plant', 'Pull-out mixer water pump motor, repair and cleaning empeller, replace carbon brush assemble and install.', '2018-03-01 00:00:00', '0.00', '750.00', '0.00', '750.00', '2018-03-01 08:00:00', '750.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:56:09', '2018-03-01 11:56:09', NULL),
(1816, 'SCW20180301035724', '2018-03-01 00:00:00', 18, 469, 'Yard 3', 'Install and wiring new ignition switch and starter relay.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-03-01 08:00:00', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 11:57:59', '2018-03-01 11:57:59', NULL),
(1817, 'SCW20180301035917', '2018-03-01 00:00:00', 18, 470, 'Yard 3', 'Install and topping tail light and check up wiring headlight.', '2018-03-01 00:00:00', '0.00', '750.00', '0.00', '750.00', '2018-03-01 08:00:00', '750.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 12:00:00', '2018-03-01 12:00:00', NULL),
(1818, 'SCW20180301051821', '2018-03-01 00:00:00', 18, 421, 'Yard 3', 'General wiring, install and topping headlight, signal light, clearance light.', '2018-03-01 00:00:00', '0.00', '3500.00', '0.00', '3500.00', '2018-03-01 08:00:00', '3500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:19:28', '2018-03-01 13:19:28', NULL),
(1819, 'SCW20180301052101', '2018-03-01 00:00:00', 18, 471, 'Yard 3', 'Rewiring clearance light and brake light and signal light.', '2018-03-01 00:00:00', '0.00', '850.00', '0.00', '850.00', '2018-03-01 08:00:00', '850.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:22:02', '2018-03-01 13:22:02', NULL),
(1820, 'SCW20180301052300', '2018-03-01 00:00:00', 18, 472, 'Yard 3', 'Pull-out alternator soldering diode and stator coil assemble and install.', '2018-03-01 00:00:00', '0.00', '850.00', '0.00', '850.00', '2018-03-01 08:00:00', '850.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:23:51', '2018-03-01 13:23:51', NULL),
(1821, 'SCW20180301052626', '2018-03-01 00:00:00', 18, 473, 'Yard 3', 'Check up wiring headlight , parking light ,signal light.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '650.00', '2018-03-01 08:00:00', '650.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:27:25', '2018-03-01 13:27:25', NULL),
(1822, 'SCW20180301052738', '2018-03-01 00:00:00', 18, 474, 'Yard 3', 'Pull-out, install new wiper motor repair linkage.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '750.00', '2018-03-02 03:08:46', '750.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:28:43', '2018-03-02 11:08:46', NULL),
(1823, 'SCW20180301052908', '2018-03-01 00:00:00', 18, 95, 'ace cebu', 'Pull-out alternator repair, adjust bracket and install.', '2018-03-01 00:00:00', '0.00', '650.00', '0.00', '750.00', '2018-03-02 03:08:16', '750.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:30:10', '2018-03-02 11:08:16', NULL),
(1824, 'SCW20180301053017', '2018-03-01 00:00:00', 18, 155, 'SRP Batching Plant', 'Check up wiring alternator rewiring and repair AVR.', '2018-03-01 00:00:00', '0.00', '750.00', '0.00', '750.00', '2018-03-01 08:00:00', '750.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 13:31:19', '2018-03-01 13:31:19', NULL),
(1825, 'SCW20180301065052', '2018-03-01 00:00:00', 21, 121, 'MARIGONDON', 'Pull-out 4pcs air tank and air tank tube lines replace air tank bracket and install together with tubing air lines.', '2018-03-01 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-03-01 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:04:57', '2018-03-01 15:04:57', NULL),
(1826, 'SCW20180301070510', '2018-03-01 00:00:00', 21, 121, 'MARIGONDON', 'Pull-out steel tubing , welding and install.', '2018-03-01 00:00:00', '0.00', '1200.00', '0.00', '1200.00', '2018-03-01 08:00:00', '1200.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:06:01', '2018-03-01 15:06:01', NULL),
(1827, 'SCW20180301070928', '2018-03-01 00:00:00', 21, 454, 'Yard 3', 'Pull-out torque rod 6 pcs and 18 pcs bolt replace bushing and install.', '2018-03-01 00:00:00', '0.00', '6500.00', '0.00', '6500.00', '2018-03-01 08:00:00', '6500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:10:57', '2018-03-01 15:10:57', NULL),
(1828, 'SCW20180301071103', '2018-03-01 00:00:00', 21, 454, 'Yard 3', 'Pull-out U bolt and spring set left side intermediate replace trunion bushing and install', '2018-03-01 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-03-01 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:12:17', '2018-03-01 15:12:17', NULL),
(1829, 'SCW20180301071222', '2018-03-01 00:00:00', 21, 454, 'Yard 3', 'Pull-out U bolt and spring left side rear replace trunion  bushing and install.', '2018-03-01 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-03-01 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:14:42', '2018-03-01 15:14:42', NULL),
(1830, 'SCW20180301071616', '2018-03-01 00:00:00', 21, 454, 'Yard 3', 'Pull-out U bolt and spring right side intermediate replace trunion bushing and install.', '2018-03-01 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-03-01 08:00:00', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:17:17', '2018-03-01 15:17:17', NULL),
(1831, 'SCW20180301071725', '2018-03-01 00:00:00', 21, 454, 'Yard 3', 'Pull-out U bolt and spring one set replace trunion \r\nbushing and install.', '2018-03-01 00:00:00', '0.00', '2800.00', '0.00', '2800.00', '2018-03-02 03:17:57', '2800.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:18:29', '2018-03-02 11:17:57', NULL),
(1832, 'SCW20180301072634', '2018-03-01 00:00:00', 9, 5, 'SRP Pond A', 'Check test diagnose problem. Dismount and check clutch  control valve and master clutch. Check steering clutch control. Check direct drive trans power flow.', '2018-03-01 00:00:00', '0.00', '10000.00', '0.00', '10000.00', '2018-03-01 08:00:00', '10000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:33:56', '2018-03-01 15:33:56', NULL),
(1833, 'SCW20180301073403', '2018-03-01 00:00:00', 9, 90, 'DYLA', 'Rob turbocharger assembly.', '2018-03-01 00:00:00', '0.00', '2000.00', '0.00', '2000.00', '2018-03-01 08:00:00', '2000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:34:57', '2018-03-01 15:34:57', NULL),
(1834, 'SCW20180301074709', '2018-03-01 00:00:00', 19, 476, 'CDO Mesaverte', 'Diagnose replace 2 capacitor replace 1 breaker. Recondition running and starting coil. Recondition reactor. Testing and comissioning', '2018-03-01 00:00:00', '0.00', '2000.00', '0.00', '2500.00', '2018-03-02 03:05:18', '2500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:48:51', '2018-03-02 11:05:18', NULL),
(1835, 'SCW20180301074858', '2018-03-01 00:00:00', 19, 475, 'CDO Mesaverte', 'Diagnose, recondition running starting coil. Recondition reactor . Testing and comissioning', '2018-03-01 00:00:00', '0.00', '2000.00', '0.00', '2500.00', '2018-03-02 03:05:53', '2500.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:50:00', '2018-03-02 11:05:53', NULL),
(1836, 'SCW20180301075006', '2018-03-01 00:00:00', 19, 149, 'CDO Mesaverte', 'Installation of all electrical circuit. Troubleshooting switch range sequence of speed hoisting and lowering. Testing and commissioning voltage and amperes monitoring', '2018-03-01 00:00:00', '0.00', '30000.00', '0.00', '30000.00', '2018-03-01 08:00:00', '30000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:52:43', '2018-03-01 15:52:43', NULL),
(1837, 'SCW20180301075346', '2018-03-01 00:00:00', 19, 477, 'CDO Mesaverte', 'Resetting all limit switches trolley limiter ,hoist limiter, load limiter. Clean all areas all cabin and ready for inspection', '2018-03-01 00:00:00', '0.00', '3000.00', '0.00', '3000.00', '2018-03-01 08:00:00', '3000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 15:55:19', '2018-03-01 15:55:19', NULL),
(1838, 'SCW20180301084507', '2018-02-28 00:00:00', 10, 47, 'Sogod', 'Recondition engine , general overhaul. Recondition main hydraulic pump swivel joint recondition.', '2018-02-28 00:00:00', '0.00', '50000.00', '0.00', '45000.00', '2018-02-28 08:00:00', '45000.00', '5000.00', '0', 2, 2, 'in-progress', '2018-03-01 16:46:37', '2018-03-01 16:46:37', NULL),
(1839, 'SCW20180301084716', '2018-03-01 00:00:00', 10, 47, 'Sogod', 'Install upper roller (RH/LH)\r\nReseal track adjuster (RH/LH)', '2018-03-01 00:00:00', '0.00', '15000.00', '0.00', '15000.00', '2018-03-01 08:00:00', '15000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-01 16:48:08', '2018-03-01 16:48:08', NULL),
(1840, 'SCW20180302013507', '2018-03-02 00:00:00', 6, 478, 'CDO Mesaverte', 'Batching Plant CDO PMS July 14,2017', '2018-03-02 00:00:00', '0.00', '8000.00', '0.00', '10000.00', '2018-03-02 03:11:20', '10000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-02 10:03:24', '2018-03-02 11:11:20', NULL),
(1841, 'SCW20180302020329', '2018-03-02 00:00:00', 6, 478, 'CDO Mesaverte', 'CDO Batching Plant -Repaired the cement butterfly valve.', '2018-03-02 00:00:00', '0.00', '1000.00', '0.00', '1000.00', '2018-03-02 08:00:00', '1000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-02 10:04:36', '2018-03-02 10:04:36', NULL),
(1842, 'SCW20180302020441', '2018-03-02 00:00:00', 6, 478, 'CDO Mesaverte', 'CDO Batching Plant Lay-out plant  for transfer of position.', '2018-03-02 00:00:00', '0.00', '3000.00', '0.00', '5000.00', '2018-03-02 03:11:56', '5000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-02 10:05:42', '2018-03-02 11:11:56', NULL);
INSERT INTO `subcontractorworks` (`id`, `transaction_no`, `transaction_date`, `subcontractor`, `equipment`, `project`, `scope_of_work`, `project_start_date`, `percentage_status`, `contract_amount`, `total_previous_paid_amount`, `last_payment_amount`, `payment_update_at`, `total_current_paid_amount`, `total_amount_due_left`, `warranty`, `created_user_id`, `updated_user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1843, 'SCW20180302020546', '2018-03-02 00:00:00', 6, 448, 'SRP Batching Plant', 'SRP Batching Plant- PMS of Batching pLant March 2,2018', '2018-03-02 00:00:00', '0.00', '6000.00', '0.00', '6000.00', '2018-03-02 08:00:00', '6000.00', '0.00', '0', 2, 2, 'in-progress', '2018-03-02 10:06:30', '2018-03-02 10:06:30', NULL),
(1844, 'SCW20180304172403', '2018-02-14 00:00:00', 25, 52, 'hgfhgfjkh', ';\'l;kkljghhtf', '2018-02-14 00:00:00', '0.00', '8000.00', '3000.00', '3000.00', '2018-03-04 18:45:05', NULL, '7000.00', '0', 2, 2, 'in-progress', '2018-03-05 01:24:54', '2018-03-05 02:45:05', NULL),
(1845, 'SCW20180304174649', '2018-03-04 00:00:00', 12, 51, 'Test Test Test', 'te ea tae t ata ta', '2018-03-04 00:00:00', '0.00', '10000.00', '2000.00', '2000.00', '2018-03-04 08:00:00', NULL, '8000.00', '0', 2, 2, 'in-progress', '2018-03-05 01:47:10', '2018-03-05 01:47:10', NULL),
(1846, 'SCW20180304174738', '2018-03-04 00:00:00', 25, 51, 'test test test test', 'test test test testtest test test testtest test test test', '2018-03-04 00:00:00', '0.00', '15000.00', '3000.00', '3000.00', '2018-03-04 08:00:00', NULL, '12000.00', '0', 2, 2, 'in-progress', '2018-03-05 01:47:57', '2018-03-05 01:47:57', NULL),
(1847, 'SCW20180306073447', '2018-03-06 00:00:00', 10, 112, 'MARIGONDON', 'General overhaul.Pull-out engine & bracket Bracket, Evaluate lubrication system,Evaluate fuel system, air intake. Replace parts. Resetting crankshaft & connected rod bearings. Test run.', '2018-03-06 00:00:00', '0.00', '70000.00', '0.00', '20000.00', '2018-03-06 08:26:24', '20000.00', '40000.00', '0', 2, 2, 'in-progress', '2018-03-06 15:40:44', '2018-03-06 16:26:24', NULL),
(1848, 'SCW20180306074538', '2018-02-22 00:00:00', 4, 138, 'MARIGONDON', 'Cowl body repair', '2018-02-22 00:00:00', '0.00', '27000.00', '17000.00', '17000.00', '2018-02-22 08:00:00', NULL, '10000.00', '0', 2, 2, 'in-progress', '2018-03-06 15:46:25', '2018-03-06 15:46:25', NULL),
(1849, 'SCW20180306082849', '2018-03-06 00:00:00', 10, 112, 'MARIGONDON', 'General Overhaul. Pull-out engine & bracket. Eval. lubrication system & fuel system, Resetting crankshaft & rod bearings.Including boom cyl & hydraulic repair.', '2018-03-06 00:00:00', '0.00', '70000.00', '0.00', '20000.00', '2018-03-06 08:00:00', '20000.00', '50000.00', '0', 2, 2, 'in-progress', '2018-03-06 16:30:38', '2018-03-06 16:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcontractorwork_payments`
--

CREATE TABLE `subcontractorwork_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcontractorwork_id` int(10) UNSIGNED NOT NULL,
  `percentage_status` decimal(8,2) NOT NULL DEFAULT '0.00',
  `contract_amount` decimal(8,2) UNSIGNED NOT NULL,
  `previous_paid_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `current_paid_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `date_payment` date DEFAULT NULL,
  `amount_due_left` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcontractorwork_payments`
--

INSERT INTO `subcontractorwork_payments` (`id`, `subcontractorwork_id`, `percentage_status`, `contract_amount`, `previous_paid_amount`, `current_paid_amount`, `date_payment`, `amount_due_left`, `created_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(142, 130, '0.00', '5500.00', '5500.00', '5500.00', '2018-02-08', '0.00', 2, '2018-02-08 16:16:46', '2018-02-08 16:16:46', NULL),
(143, 131, '0.00', '3500.00', '3500.00', '3500.00', '2018-02-08', '0.00', 2, '2018-02-08 16:18:31', '2018-02-08 16:18:31', NULL),
(144, 132, '0.00', '3800.00', '3800.00', '3800.00', '2018-02-08', '0.00', 2, '2018-02-08 16:33:48', '2018-02-08 16:33:48', NULL),
(145, 133, '0.00', '20000.00', '20000.00', '20000.00', '2018-02-08', '0.00', 2, '2018-02-08 16:40:01', '2018-02-08 16:40:01', NULL),
(146, 134, '0.00', '20000.00', '20000.00', '20000.00', '2018-02-08', '0.00', 2, '2018-02-08 16:41:01', '2018-02-08 16:41:01', NULL),
(147, 135, '0.00', '1050.00', '1050.00', '1050.00', '2018-02-08', '0.00', 2, '2018-02-08 16:48:59', '2018-02-08 16:48:59', NULL),
(148, 136, '0.00', '1410.00', '1410.00', '1410.00', '2018-02-08', '0.00', 2, '2018-02-08 16:52:40', '2018-02-08 16:52:40', NULL),
(149, 137, '0.00', '34000.00', '34000.00', '4911.70', '2018-02-08', '0.00', 2, '2018-02-08 16:53:33', '2018-02-15 13:44:44', NULL),
(150, 138, '0.00', '9000.00', '9000.00', '9000.00', '2018-02-08', '0.00', 2, '2018-02-08 16:55:00', '2018-02-08 16:55:00', NULL),
(151, 139, '0.00', '9000.00', '9000.00', '9000.00', '2018-02-08', '0.00', 2, '2018-02-08 16:57:23', '2018-02-08 16:57:23', NULL),
(152, 140, '0.00', '8244.00', '8244.00', '8244.00', '2018-02-08', '0.00', 2, '2018-02-08 17:05:42', '2018-02-08 17:05:42', NULL),
(153, 141, '0.00', '1000.00', '1000.00', '1000.00', '2018-02-08', '0.00', 2, '2018-02-08 17:09:10', '2018-02-08 17:09:10', NULL),
(154, 142, '0.00', '500.00', '500.00', '500.00', '2018-02-08', '0.00', 2, '2018-02-08 17:11:11', '2018-02-08 17:11:11', NULL),
(155, 143, '0.00', '4000.00', '4000.00', '4000.00', '2018-02-08', '0.00', 2, '2018-02-08 17:13:00', '2018-02-08 17:13:00', NULL),
(156, 144, '0.00', '3500.00', '3500.00', '3500.00', '2018-02-08', '0.00', 2, '2018-02-08 17:14:03', '2018-02-08 17:14:03', NULL),
(157, 145, '0.00', '1500.00', '1500.00', '1500.00', '2018-02-08', '0.00', 2, '2018-02-08 17:14:34', '2018-02-08 17:14:34', NULL),
(158, 146, '0.00', '30000.00', '5000.00', '3000.00', '2018-01-29', '25000.00', 2, '2018-02-09 06:16:32', '2018-02-09 06:40:00', NULL),
(159, 146, '0.00', '30000.00', '0.00', '6000.00', '2018-02-08', '19000.00', 2, '2018-02-09 06:17:59', '2018-02-09 06:17:59', NULL),
(160, 146, '0.00', '30000.00', '0.00', '14000.00', '2018-02-08', '0.00', 2, '2018-02-09 06:19:31', '2018-02-09 06:34:53', NULL),
(161, 147, '0.00', '850.00', '850.00', '850.00', '2018-02-09', '0.00', 2, '2018-02-09 14:32:53', '2018-02-09 14:32:53', NULL),
(162, 148, '0.00', '3500.00', '3500.00', '3500.00', '2018-02-09', '0.00', 2, '2018-02-09 14:35:35', '2018-02-09 14:35:35', NULL),
(163, 149, '0.00', '3200.00', '3200.00', '3200.00', '2018-02-09', '0.00', 2, '2018-02-09 14:37:01', '2018-02-09 14:37:01', NULL),
(164, 150, '0.00', '1500.00', '1500.00', '1500.00', '2018-02-09', '0.00', 2, '2018-02-09 14:40:33', '2018-02-09 14:40:33', NULL),
(165, 151, '0.00', '3200.00', '3200.00', '3200.00', '2018-02-09', '0.00', 2, '2018-02-09 14:41:59', '2018-02-09 14:41:59', NULL),
(166, 152, '0.00', '8000.00', '8000.00', '8000.00', '2018-02-12', '0.00', 2, '2018-02-12 10:50:05', '2018-02-12 10:50:05', NULL),
(167, 153, '0.00', '950.00', '950.00', '850.00', '2018-02-12', '0.00', 2, '2018-02-12 13:42:30', '2018-02-21 11:03:22', NULL),
(168, 1712, '0.00', '1200.00', '1200.00', '1200.00', '2018-02-13', '0.00', 2, '2018-02-13 14:52:35', '2018-02-13 14:52:35', NULL),
(169, 1713, '0.00', '10000.00', '5000.00', '3000.00', '2018-02-13', '5000.00', 2, '2018-02-13 18:27:09', '2018-02-21 15:56:02', NULL),
(170, 1714, '0.00', '650.00', '650.00', '650.00', '2018-02-14', '0.00', 2, '2018-02-14 16:58:41', '2018-02-14 16:58:41', NULL),
(171, 1715, '0.00', '650.00', '650.00', '650.00', '2018-02-14', '0.00', 2, '2018-02-14 16:59:22', '2018-02-14 16:59:22', NULL),
(172, 1716, '0.00', '1800.00', '1800.00', '1200.00', '2018-02-14', '0.00', 2, '2018-02-14 17:00:33', '2018-02-21 11:02:09', NULL),
(173, 1717, '0.00', '750.00', '750.00', '750.00', '2018-02-14', '0.00', 2, '2018-02-14 17:01:18', '2018-02-14 17:01:18', NULL),
(174, 1718, '0.00', '1400.00', '1400.00', '1400.00', '2018-02-14', '0.00', 2, '2018-02-14 17:02:59', '2018-02-14 17:02:59', NULL),
(175, 1719, '0.00', '850.00', '850.00', '850.00', '2018-02-14', '0.00', 2, '2018-02-14 17:05:42', '2018-02-24 15:50:28', NULL),
(176, 1720, '0.00', '7000.00', '7000.00', '5000.00', '2018-02-15', '0.00', 2, '2018-02-15 11:41:39', '2018-03-01 10:58:30', NULL),
(177, 1721, '0.00', '8500.00', '8500.00', '5000.00', '2018-02-15', '0.00', 2, '2018-02-15 11:43:44', '2018-03-02 11:03:55', NULL),
(178, 1722, '0.00', '8500.00', '8500.00', '5000.00', '2018-02-15', '0.00', 2, '2018-02-15 11:47:54', '2018-03-02 11:04:38', NULL),
(179, 1723, '0.00', '3000.00', '3000.00', '1500.00', '2018-02-15', '0.00', 2, '2018-02-15 11:49:17', '2018-03-01 10:55:34', NULL),
(180, 1724, '0.00', '4882.50', '4882.50', '4882.50', '2018-02-15', '0.00', 2, '2018-02-15 13:58:39', '2018-02-15 13:58:39', NULL),
(181, 1725, '0.00', '4500.00', '4500.00', '4500.00', '2018-02-15', '0.00', 2, '2018-02-15 14:02:50', '2018-02-15 14:02:50', NULL),
(182, 1726, '0.00', '4800.00', '4800.00', '4800.00', '2018-02-15', '0.00', 2, '2018-02-15 14:04:07', '2018-02-15 14:04:07', NULL),
(183, 1727, '0.00', '4500.00', '4500.00', '4500.00', '2018-02-15', '0.00', 2, '2018-02-15 14:05:12', '2018-02-15 14:05:12', NULL),
(184, 1728, '0.00', '6500.00', '6500.00', '6500.00', '2018-02-15', '0.00', 2, '2018-02-15 14:08:24', '2018-02-15 14:08:24', NULL),
(185, 1729, '0.00', '500.00', '500.00', '500.00', '2018-02-15', '0.00', 2, '2018-02-15 14:14:34', '2018-02-15 14:14:34', NULL),
(186, 1730, '0.00', '9000.00', '4000.00', '4000.00', '2018-01-26', '5000.00', 2, '2018-02-15 14:18:48', '2018-02-15 14:18:48', NULL),
(187, 1731, '0.00', '9000.00', '5000.00', '5000.00', '2018-02-15', '4000.00', 2, '2018-02-15 14:19:58', '2018-02-15 14:19:58', NULL),
(188, 1732, '0.00', '1500.00', '1500.00', '1500.00', '2018-02-15', '0.00', 2, '2018-02-15 14:21:34', '2018-02-15 14:21:34', NULL),
(189, 1733, '0.00', '2900.00', '2900.00', '2900.00', '2018-02-15', '0.00', 2, '2018-02-15 14:39:40', '2018-02-15 14:39:40', NULL),
(190, 1734, '0.00', '2400.00', '2400.00', '2400.00', '2018-02-15', '0.00', 2, '2018-02-15 14:42:25', '2018-02-15 14:42:25', NULL),
(191, 1735, '0.00', '900.00', '900.00', '900.00', '2018-02-15', '0.00', 2, '2018-02-15 14:43:10', '2018-02-15 14:43:10', NULL),
(192, 1736, '0.00', '1200.00', '1200.00', '1200.00', '2018-02-15', '0.00', 2, '2018-02-15 14:43:51', '2018-02-15 14:43:51', NULL),
(193, 1737, '0.00', '2200.00', '2200.00', '2200.00', '2018-02-15', '0.00', 2, '2018-02-15 14:45:14', '2018-02-15 14:45:14', NULL),
(194, 1738, '0.00', '2800.00', '2800.00', '2800.00', '2018-02-15', '0.00', 2, '2018-02-15 14:45:53', '2018-02-15 14:45:53', NULL),
(195, 1739, '0.00', '1905.00', '1905.00', '1905.00', '2018-02-15', '0.00', 2, '2018-02-15 14:51:39', '2018-02-15 14:51:39', NULL),
(196, 1740, '0.00', '4256.00', '4256.00', '4256.00', '2018-02-15', '0.00', 2, '2018-02-15 14:55:58', '2018-02-15 14:55:58', NULL),
(197, 1741, '0.00', '3360.00', '3360.00', '3360.00', '2018-02-15', '0.00', 2, '2018-02-15 14:59:05', '2018-02-15 14:59:05', NULL),
(198, 1742, '0.00', '1680.00', '1680.00', '1680.00', '2018-02-15', '0.00', 2, '2018-02-15 15:00:01', '2018-02-15 15:00:01', NULL),
(199, 1743, '0.00', '1905.00', '1905.00', '1905.00', '2018-02-15', '0.00', 2, '2018-02-15 15:01:49', '2018-02-15 15:01:49', NULL),
(200, 1744, '0.00', '40000.00', '20000.00', '20000.00', '2018-02-15', '20000.00', 2, '2018-02-15 15:08:03', '2018-02-15 15:08:03', NULL),
(205, 1745, '0.00', '5000.00', '5000.00', '5000.00', '2018-02-15', '0.00', 2, '2018-02-15 15:23:27', '2018-02-15 15:23:27', NULL),
(212, 1746, '0.00', '15000.00', '15000.00', '15000.00', '2018-02-15', '0.00', 2, '2018-02-15 17:45:29', '2018-02-15 17:45:29', NULL),
(213, 1747, '0.00', '8000.00', '8000.00', '6000.00', '2018-02-15', '0.00', 2, '2018-02-15 17:46:14', '2018-02-21 10:51:43', NULL),
(214, 1748, '0.00', '9000.00', '4000.00', '4000.00', '2018-01-26', '5000.00', 2, '2018-02-16 11:37:11', '2018-02-16 11:37:11', NULL),
(228, 1749, '0.00', '3000.00', '1000.00', '1000.00', '2018-02-20', '2000.00', 2, '2018-02-21 02:05:00', '2018-02-21 02:05:00', NULL),
(245, 1749, '0.00', '3000.00', '0.00', '1500.00', '2018-02-20', '0.00', 2, '2018-02-21 04:51:26', '2018-02-21 04:51:26', NULL),
(246, 1749, '0.00', '3000.00', '0.00', '1000.00', '2018-02-20', '0.00', 2, '2018-02-21 04:51:43', '2018-02-21 04:53:22', NULL),
(247, 1750, '0.00', '17500.00', '17500.00', '17500.00', '2018-02-21', '0.00', 2, '2018-02-21 10:56:50', '2018-02-21 10:56:50', NULL),
(248, 1751, '0.00', '17500.00', '17500.00', '17500.00', '2018-02-21', '0.00', 2, '2018-02-21 10:57:41', '2018-02-21 10:57:41', NULL),
(249, 1748, '0.00', '9000.00', '0.00', '5000.00', '2018-02-21', '0.00', 2, '2018-02-21 14:17:08', '2018-02-24 16:05:16', NULL),
(250, 1752, '0.00', '12000.00', '3000.00', '3000.00', '2018-02-21', '9000.00', 2, '2018-02-21 14:18:35', '2018-02-21 14:18:35', NULL),
(251, 1752, '0.00', '12000.00', '0.00', '1000.00', '2018-02-21', '0.00', 2, '2018-02-21 14:19:21', '2018-02-21 14:19:21', NULL),
(252, 1753, '0.00', '10000.00', '2000.00', '2000.00', '2018-02-09', '8000.00', 2, '2018-02-21 15:05:25', '2018-02-21 15:05:25', NULL),
(253, 1753, '0.00', '10000.00', '0.00', '4000.00', '2018-02-21', '0.00', 2, '2018-02-21 15:06:29', '2018-02-21 15:06:29', NULL),
(254, 1754, '0.00', '6000.00', '6000.00', '6000.00', '2018-02-21', '0.00', 2, '2018-02-21 15:31:37', '2018-02-21 15:31:37', NULL),
(255, 1755, '0.00', '6000.00', '6000.00', '6000.00', '2018-02-21', '0.00', 2, '2018-02-21 15:35:28', '2018-02-21 15:35:28', NULL),
(256, 1713, '0.00', '10000.00', '0.00', '2000.00', '2018-02-21', '0.00', 2, '2018-02-21 15:56:19', '2018-02-21 15:56:19', NULL),
(257, 1756, '0.00', '19518.00', '19518.00', '19518.00', '2018-02-22', '0.00', 2, '2018-02-22 14:56:41', '2018-02-22 14:56:41', NULL),
(258, 1757, '0.00', '2500.00', '2500.00', '2500.00', '2018-02-22', '0.00', 2, '2018-02-22 15:03:21', '2018-02-22 15:03:21', NULL),
(259, 1758, '0.00', '932.00', '932.00', '932.00', '2018-02-22', '0.00', 2, '2018-02-22 15:05:20', '2018-02-22 15:05:20', NULL),
(260, 1759, '0.00', '15000.00', '15000.00', '2000.00', '2018-02-09', '0.00', 2, '2018-02-24 15:57:03', '2018-02-27 23:54:24', NULL),
(261, 1760, '0.00', '30000.00', '10000.00', '10000.00', '2018-02-15', '20000.00', 2, '2018-02-27 23:56:33', '2018-02-27 23:56:33', NULL),
(262, 1760, '0.00', '30000.00', '0.00', '5000.00', '2018-02-27', '0.00', 2, '2018-02-27 23:57:35', '2018-02-27 23:57:35', NULL),
(263, 1761, '0.00', '4000.00', '4000.00', '3500.00', '2018-02-27', '0.00', 2, '2018-02-28 00:04:38', '2018-02-28 00:05:28', NULL),
(264, 1762, '0.00', '5000.00', '5000.00', '5000.00', '2018-02-28', '0.00', 2, '2018-02-28 10:01:37', '2018-02-28 10:01:37', NULL),
(265, 1763, '0.00', '1800.00', '1800.00', '1800.00', '2018-02-28', '0.00', 2, '2018-02-28 10:19:06', '2018-02-28 10:19:06', NULL),
(266, 1764, '0.00', '6500.00', '6500.00', '6500.00', '2018-02-28', '0.00', 2, '2018-02-28 10:21:51', '2018-02-28 10:21:51', NULL),
(267, 1765, '0.00', '8736.00', '8736.00', '8736.00', '2018-02-28', '0.00', 2, '2018-02-28 10:40:12', '2018-02-28 10:40:12', NULL),
(268, 1766, '0.00', '4882.50', '4882.50', '4882.50', '2018-02-28', '0.00', 2, '2018-02-28 10:44:04', '2018-02-28 10:44:04', NULL),
(269, 1767, '0.00', '30000.00', '30000.00', '30000.00', '2018-02-28', '0.00', 2, '2018-02-28 11:40:12', '2018-02-28 11:40:12', NULL),
(270, 1768, '0.00', '8960.00', '8960.00', '8960.00', '2018-02-28', '0.00', 2, '2018-02-28 11:43:39', '2018-02-28 11:43:39', NULL),
(271, 1769, '0.00', '1680.00', '1680.00', '1680.00', '2018-02-28', '0.00', 2, '2018-02-28 11:44:27', '2018-02-28 11:44:27', NULL),
(272, 1770, '0.00', '360.00', '360.00', '180.00', '2018-02-28', '0.00', 2, '2018-02-28 13:58:16', '2018-03-01 17:19:38', NULL),
(273, 1771, '0.00', '600.00', '600.00', '300.00', '2018-02-28', '0.00', 2, '2018-02-28 13:59:36', '2018-03-01 17:20:28', NULL),
(274, 1772, '0.00', '5500.00', '5500.00', '5500.00', '2018-02-28', '0.00', 2, '2018-02-28 14:01:02', '2018-02-28 14:01:02', NULL),
(275, 1773, '0.00', '350.00', '350.00', '350.00', '2018-02-28', '0.00', 2, '2018-02-28 14:02:07', '2018-02-28 14:02:07', NULL),
(276, 1774, '0.00', '380.00', '380.00', '380.00', '2018-02-28', '0.00', 2, '2018-02-28 14:02:45', '2018-02-28 14:02:45', NULL),
(277, 1775, '0.00', '360.00', '360.00', '360.00', '2018-02-28', '0.00', 2, '2018-02-28 14:04:42', '2018-02-28 14:04:42', NULL),
(278, 1776, '0.00', '380.00', '380.00', '380.00', '2018-02-28', '0.00', 2, '2018-02-28 14:06:14', '2018-02-28 14:06:14', NULL),
(279, 1777, '0.00', '2800.00', '2800.00', '2800.00', '2018-02-28', '0.00', 2, '2018-02-28 14:25:27', '2018-02-28 14:25:27', NULL),
(280, 1778, '0.00', '440.00', '440.00', '440.00', '2018-02-28', '0.00', 2, '2018-02-28 14:27:07', '2018-02-28 14:27:07', NULL),
(281, 1779, '0.00', '1800.00', '1800.00', '1800.00', '2018-02-28', '0.00', 2, '2018-02-28 14:42:11', '2018-02-28 14:42:11', NULL),
(282, 1780, '0.00', '1200.00', '1200.00', '1200.00', '2018-02-28', '0.00', 2, '2018-02-28 14:46:33', '2018-02-28 14:46:33', NULL),
(283, 1781, '0.00', '850.00', '850.00', '850.00', '2018-02-28', '0.00', 2, '2018-02-28 14:47:39', '2018-02-28 14:47:39', NULL),
(284, 1782, '0.00', '3500.00', '3500.00', '3500.00', '2018-02-28', '0.00', 2, '2018-02-28 14:48:48', '2018-02-28 14:48:48', NULL),
(285, 1783, '0.00', '4200.00', '4200.00', '4200.00', '2018-02-28', '0.00', 2, '2018-02-28 14:50:58', '2018-02-28 14:50:58', NULL),
(286, 1784, '0.00', '30000.00', '18000.00', '18000.00', '2018-02-02', '12000.00', 2, '2018-02-28 14:52:45', '2018-02-28 14:53:16', NULL),
(287, 1784, '0.00', '30000.00', '0.00', '12000.00', '2018-02-28', '0.00', 2, '2018-02-28 14:53:37', '2018-02-28 14:53:37', NULL),
(288, 1785, '0.00', '550.00', '550.00', '550.00', '2018-02-28', '0.00', 2, '2018-02-28 14:54:38', '2018-02-28 14:54:38', NULL),
(289, 1786, '0.00', '2800.00', '2800.00', '2800.00', '2018-02-28', '0.00', 2, '2018-02-28 14:55:47', '2018-02-28 14:55:47', NULL),
(290, 1787, '0.00', '380.00', '380.00', '380.00', '2018-02-28', '0.00', 2, '2018-02-28 14:56:38', '2018-02-28 14:56:38', NULL),
(291, 1788, '0.00', '2800.00', '2800.00', '2800.00', '2018-02-28', '0.00', 2, '2018-02-28 14:57:24', '2018-02-28 14:57:24', NULL),
(292, 1789, '0.00', '3200.00', '3200.00', '3200.00', '2018-02-28', '0.00', 2, '2018-02-28 14:59:09', '2018-02-28 14:59:09', NULL),
(293, 1790, '0.00', '2000.00', '2000.00', '2000.00', '2018-03-01', '0.00', 2, '2018-03-01 09:36:09', '2018-03-01 09:36:09', NULL),
(294, 1791, '0.00', '27000.00', '17000.00', '17000.00', '2018-03-01', '10000.00', 2, '2018-03-01 09:37:12', '2018-03-01 09:37:12', NULL),
(295, 1791, '0.00', '27000.00', '0.00', '5000.00', '2018-03-01', '0.00', 2, '2018-03-01 09:38:15', '2018-03-01 09:38:15', NULL),
(296, 1792, '0.00', '2500.00', '2500.00', '2500.00', '2018-03-01', '0.00', 2, '2018-03-01 09:40:51', '2018-03-01 09:40:51', NULL),
(297, 1793, '0.00', '2000.00', '2000.00', '2000.00', '2018-03-01', '0.00', 2, '2018-03-01 09:42:42', '2018-03-01 09:42:42', NULL),
(298, 1794, '0.00', '1500.00', '1500.00', '1500.00', '2018-03-01', '0.00', 2, '2018-03-01 09:45:11', '2018-03-01 09:45:11', NULL),
(299, 1795, '0.00', '1000.00', '1000.00', '1000.00', '2018-03-01', '0.00', 2, '2018-03-01 09:46:03', '2018-03-01 09:46:03', NULL),
(300, 1796, '0.00', '2500.00', '2500.00', '2500.00', '2018-03-01', '0.00', 2, '2018-03-01 09:47:27', '2018-03-01 09:47:27', NULL),
(301, 1797, '0.00', '500.00', '500.00', '500.00', '2018-03-01', '0.00', 2, '2018-03-01 09:48:05', '2018-03-01 09:48:05', NULL),
(302, 1798, '0.00', '27000.00', '17000.00', '17000.00', '2018-02-05', '10000.00', 2, '2018-03-01 09:59:54', '2018-03-01 09:59:54', NULL),
(303, 1798, '0.00', '27000.00', '0.00', '5000.00', '2018-03-01', '0.00', 2, '2018-03-01 10:00:23', '2018-03-01 10:00:23', NULL),
(304, 1799, '0.00', '27000.00', '17000.00', '17000.00', '2018-02-23', '10000.00', 2, '2018-03-01 10:03:52', '2018-03-01 10:03:52', NULL),
(305, 1799, '0.00', '27000.00', '0.00', '5000.00', '2018-03-01', '0.00', 2, '2018-03-01 10:04:34', '2018-03-01 10:04:34', NULL),
(306, 1800, '0.00', '18000.00', '18000.00', '18000.00', '2018-03-01', '0.00', 2, '2018-03-01 10:42:56', '2018-03-01 10:42:56', NULL),
(307, 1801, '0.00', '200.00', '200.00', '200.00', '2018-03-01', '0.00', 2, '2018-03-01 10:43:38', '2018-03-01 10:43:38', NULL),
(308, 1802, '0.00', '200.00', '200.00', '200.00', '2018-03-01', '0.00', 2, '2018-03-01 10:44:28', '2018-03-01 10:44:28', NULL),
(309, 1803, '0.00', '200.00', '200.00', '200.00', '2018-03-01', '0.00', 2, '2018-03-01 10:45:04', '2018-03-01 10:45:04', NULL),
(310, 1804, '0.00', '500.00', '500.00', '500.00', '2018-03-01', '0.00', 2, '2018-03-01 10:45:58', '2018-03-01 10:45:58', NULL),
(311, 1805, '0.00', '650.00', '650.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 11:14:00', '2018-03-01 11:14:00', NULL),
(312, 1806, '0.00', '650.00', '650.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 11:20:00', '2018-03-01 11:20:00', NULL),
(313, 1807, '0.00', '1200.00', '1200.00', '1200.00', '2018-03-01', '0.00', 2, '2018-03-01 11:26:00', '2018-03-01 11:26:00', NULL),
(314, 1808, '0.00', '2500.00', '2500.00', '2500.00', '2018-03-01', '0.00', 2, '2018-03-01 11:30:21', '2018-03-01 11:30:21', NULL),
(315, 1809, '0.00', '650.00', '650.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 11:47:19', '2018-03-01 11:47:19', NULL),
(316, 1810, '0.00', '950.00', '950.00', '950.00', '2018-03-01', '0.00', 2, '2018-03-01 11:49:31', '2018-03-01 11:49:31', NULL),
(317, 1811, '0.00', '1400.00', '1400.00', '1400.00', '2018-03-01', '0.00', 2, '2018-03-01 11:51:25', '2018-03-01 11:51:25', NULL),
(318, 1812, '0.00', '850.00', '850.00', '850.00', '2018-03-01', '0.00', 2, '2018-03-01 11:52:49', '2018-03-01 11:52:49', NULL),
(319, 1813, '0.00', '1800.00', '1800.00', '1200.00', '2018-03-01', '0.00', 2, '2018-03-01 11:53:41', '2018-03-02 11:09:24', NULL),
(320, 1814, '0.00', '650.00', '650.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 11:55:00', '2018-03-01 11:55:00', NULL),
(321, 1815, '0.00', '750.00', '750.00', '750.00', '2018-03-01', '0.00', 2, '2018-03-01 11:56:09', '2018-03-01 11:56:09', NULL),
(322, 1816, '0.00', '650.00', '650.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 11:57:59', '2018-03-01 11:57:59', NULL),
(323, 1817, '0.00', '750.00', '750.00', '750.00', '2018-03-01', '0.00', 2, '2018-03-01 12:00:00', '2018-03-01 12:00:00', NULL),
(324, 1818, '0.00', '3500.00', '3500.00', '3500.00', '2018-03-01', '0.00', 2, '2018-03-01 13:19:28', '2018-03-01 13:19:28', NULL),
(325, 1819, '0.00', '850.00', '850.00', '850.00', '2018-03-01', '0.00', 2, '2018-03-01 13:22:02', '2018-03-01 13:22:02', NULL),
(326, 1820, '0.00', '850.00', '850.00', '850.00', '2018-03-01', '0.00', 2, '2018-03-01 13:23:51', '2018-03-01 13:23:51', NULL),
(327, 1821, '0.00', '650.00', '650.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 13:27:25', '2018-03-01 13:27:25', NULL),
(328, 1822, '0.00', '750.00', '750.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 13:28:43', '2018-03-02 11:08:46', NULL),
(329, 1823, '0.00', '750.00', '750.00', '650.00', '2018-03-01', '0.00', 2, '2018-03-01 13:30:10', '2018-03-02 11:08:16', NULL),
(330, 1824, '0.00', '750.00', '750.00', '750.00', '2018-03-01', '0.00', 2, '2018-03-01 13:31:19', '2018-03-01 13:31:19', NULL),
(331, 1825, '0.00', '2800.00', '2800.00', '2800.00', '2018-03-01', '0.00', 2, '2018-03-01 15:04:57', '2018-03-01 15:04:57', NULL),
(332, 1826, '0.00', '1200.00', '1200.00', '1200.00', '2018-03-01', '0.00', 2, '2018-03-01 15:06:01', '2018-03-01 15:06:01', NULL),
(333, 1827, '0.00', '6500.00', '6500.00', '6500.00', '2018-03-01', '0.00', 2, '2018-03-01 15:10:57', '2018-03-01 15:10:57', NULL),
(334, 1828, '0.00', '2800.00', '2800.00', '2800.00', '2018-03-01', '0.00', 2, '2018-03-01 15:12:17', '2018-03-01 15:12:17', NULL),
(335, 1829, '0.00', '2800.00', '2800.00', '2800.00', '2018-03-01', '0.00', 2, '2018-03-01 15:14:42', '2018-03-01 15:14:42', NULL),
(336, 1830, '0.00', '2800.00', '2800.00', '2800.00', '2018-03-01', '0.00', 2, '2018-03-01 15:17:17', '2018-03-01 15:17:17', NULL),
(337, 1831, '0.00', '2800.00', '2800.00', '2800.00', '2018-03-01', '0.00', 2, '2018-03-01 15:18:29', '2018-03-02 11:17:57', NULL),
(338, 1832, '0.00', '10000.00', '10000.00', '10000.00', '2018-03-01', '0.00', 2, '2018-03-01 15:33:56', '2018-03-01 15:33:56', NULL),
(339, 1833, '0.00', '2000.00', '2000.00', '2000.00', '2018-03-01', '0.00', 2, '2018-03-01 15:34:57', '2018-03-01 15:34:57', NULL),
(340, 1834, '0.00', '2500.00', '2500.00', '2000.00', '2018-03-01', '0.00', 2, '2018-03-01 15:48:51', '2018-03-02 11:05:18', NULL),
(341, 1835, '0.00', '2500.00', '2500.00', '2000.00', '2018-03-01', '0.00', 2, '2018-03-01 15:50:00', '2018-03-02 11:05:53', NULL),
(342, 1836, '0.00', '30000.00', '30000.00', '30000.00', '2018-03-01', '0.00', 2, '2018-03-01 15:52:43', '2018-03-01 15:52:43', NULL),
(343, 1837, '0.00', '3000.00', '3000.00', '3000.00', '2018-03-01', '0.00', 2, '2018-03-01 15:55:19', '2018-03-01 15:55:19', NULL),
(344, 1838, '0.00', '50000.00', '45000.00', '45000.00', '2018-02-28', '5000.00', 2, '2018-03-01 16:46:37', '2018-03-01 16:46:37', NULL),
(345, 1838, '0.00', '50000.00', '0.00', '5000.00', '2018-03-01', '0.00', 2, '2018-03-01 16:47:05', '2018-03-01 16:47:05', NULL),
(346, 1839, '0.00', '15000.00', '15000.00', '15000.00', '2018-03-01', '0.00', 2, '2018-03-01 16:48:08', '2018-03-01 16:48:08', NULL),
(347, 1840, '0.00', '10000.00', '10000.00', '8000.00', '2018-03-02', '0.00', 2, '2018-03-02 10:03:24', '2018-03-02 11:11:20', NULL),
(348, 1841, '0.00', '1000.00', '1000.00', '1000.00', '2018-03-02', '0.00', 2, '2018-03-02 10:04:36', '2018-03-02 10:04:36', NULL),
(349, 1842, '0.00', '5000.00', '5000.00', '3000.00', '2018-03-02', '0.00', 2, '2018-03-02 10:05:42', '2018-03-02 11:11:56', NULL),
(350, 1843, '0.00', '6000.00', '6000.00', '6000.00', '2018-03-02', '0.00', 2, '2018-03-02 10:06:30', '2018-03-02 10:06:30', NULL),
(351, 1844, '0.00', '10000.00', '3000.00', '3000.00', '2018-02-14', '7000.00', 2, '2018-03-05 01:24:54', '2018-03-05 01:24:54', NULL),
(352, 1844, '0.00', '10000.00', '0.00', '5000.00', '2018-03-04', '0.00', 2, '2018-03-05 01:25:26', '2018-03-05 02:45:05', NULL),
(353, 1845, '0.00', '10000.00', '2000.00', '2000.00', '2018-03-04', '8000.00', 2, '2018-03-05 01:47:10', '2018-03-05 01:47:10', NULL),
(354, 1846, '0.00', '15000.00', '3000.00', '3000.00', '2018-03-04', '12000.00', 2, '2018-03-05 01:47:57', '2018-03-05 01:47:57', NULL),
(355, 1847, '0.00', '60000.00', '20000.00', '20000.00', '2018-03-06', '40000.00', 2, '2018-03-06 15:40:44', '2018-03-06 15:40:44', NULL),
(356, 1848, '0.00', '27000.00', '17000.00', '17000.00', '2018-02-22', '10000.00', 2, '2018-03-06 15:46:25', '2018-03-06 15:46:25', NULL),
(357, 1849, '0.00', '70000.00', '20000.00', '20000.00', '2018-03-06', '50000.00', 2, '2018-03-06 16:30:38', '2018-03-06 16:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_oils`
--

CREATE TABLE `type_of_oils` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_of_oils`
--

INSERT INTO `type_of_oils` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Engine Oil (15W40)', '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL),
(2, 'Hydraulic Oil (AW100)', '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL),
(3, 'Gear Oil', '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL),
(4, 'Telluse', '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `login_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `address`, `gender`, `contact_number`, `designation`, `dob`, `status`, `permissions`, `remember_token`, `last_login`, `last_login_ip`, `login_agent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sysadmin@gmail.com', 'sysadmin', '$2y$10$ZQeaoSuA/bC.y3TpDszZeuEFerH3goHmpHlxYxRFjoKzRSeiWgAne', 'sysadmin', 'sysadmin', NULL, NULL, NULL, 'Administrator', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:47', '2017-12-26 16:27:47', NULL),
(2, 'qfriesen@example.net', 'dakay1', '$2y$10$ZQeaoSuA/bC.y3TpDszZeuEFerH3goHmpHlxYxRFjoKzRSeiWgAne', 'Trace', 'Bartell', NULL, NULL, NULL, 'Administrator', NULL, 'active', NULL, 'LULBML28x9DAYN4tlKGpJlbtl79ounZ5uKuEHv8Vh72GnxbRrUNB15Gg0XlV', '2018-03-15 23:28:32', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '2017-12-26 16:27:47', '2018-03-15 23:28:32', NULL),
(3, 'parker92@example.net', 'dakay2', '$2y$10$bh0Rip2jI17E1Ct72AtrnusJEZy/CEGaZepKEWlPvoh2XGirW2P0.', 'Jovany', 'McGlynn', NULL, 'male', 'N/A', 'Godlike', NULL, 'active', '', NULL, '2018-01-12 08:49:55', '192.168.1.228', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '2017-12-26 16:27:48', '2018-01-12 08:49:55', NULL),
(4, 'karianne.hahn@example.com', 'dakay3', '$2y$10$SB3SIvACEvwH8sTY1ijmXOGrZs9hGB1ZYP80BCwuzgynTHrsWI6m6', 'Madilyn', 'Toy', NULL, NULL, NULL, 'Monitoring Clerk', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:48', '2017-12-26 16:27:48', NULL),
(5, 'alphonso96@example.com', 'dakay4', '$2y$10$5Snb/s0NoE6j5WxEcNwV.uNmln2c2ieP8uUSgEHE2ZrENlvgmgOdi', 'Aditya', 'Kutch', NULL, NULL, NULL, 'Monitoring Clerk', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:48', '2017-12-26 16:27:48', NULL),
(6, 'oortiz@example.org', 'dakay5', '$2y$10$oNcZA1W4kgHAL4O9Ie9npux3XkhlIY583E3Bw3w0Sqdte6VZsDrhm', 'Thalia', 'Harris', NULL, NULL, NULL, 'Sub Contractor', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:48', '2017-12-26 16:27:48', NULL),
(7, 'gherman@example.com', 'dakay6', '$2y$10$KOf5VB.FIK96ZjXehvA7QO3EcijUwOf5UtavFSePm7OPD4nVuF0GK', 'Christian', 'Gutkowski', NULL, NULL, NULL, 'Sub Contractor', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:48', '2017-12-26 16:27:48', NULL),
(8, 'oran78@example.net', 'dakay7', '$2y$10$gH29JCqk2UYpX/dmJS2tSuc4fl4MBdE2y79UUa2d6f.E4quOoXbQa', 'Kendall', 'Ratke', NULL, NULL, NULL, 'Guest', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:48', '2017-12-26 16:27:48', NULL),
(9, 'melvina95@example.com', 'dakay8', '$2y$10$JgA49K06izYRLQJIiox2rOivOjGK6jUoDz173pTsCCNVOy91hpvYq', 'Grayson', 'Cormier', NULL, NULL, NULL, 'Guest', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL),
(10, 'sbalistreri@example.net', 'dakay9', '$2y$10$KDaKS8mmZZHoHgywXxafveaZUYEeSGW/44keJLfB.B4UXxdJ3Fnjq', 'Maribel', 'Fay', NULL, NULL, NULL, 'Guest', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL),
(11, 'anibal.veum@example.com', 'dakay10', '$2y$10$xjgYnnvNbSM.abiR3GXy/.MRs55ufFXx.qXid5SlUS2UmVNh5f.vK', 'Carter', 'Schamberger', NULL, NULL, NULL, 'Guest', NULL, 'active', NULL, NULL, NULL, '0.0.0.0', NULL, '2017-12-26 16:27:49', '2017-12-26 16:27:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'dGBxR0DS41eplZyWCKb8XTKz6Dajfg6n', 1, '2017-12-26 16:27:47', '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(2, 2, '2rUzmBBEpJw14q6fmP23qJiMLXxQACrS', 1, '2017-12-26 16:27:47', '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(3, 3, '3fXySuSsHeCYsqvZ1CfvR5sjwWBABdBR', 1, '2017-12-26 16:27:48', '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(4, 4, 'NwhfbwoyRoyxyCioKIyODC6901sKyEDw', 1, '2017-12-26 16:27:48', '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(5, 5, 'UwwMcIyG5dTDexahh2TDHV1ZSKsS0FOQ', 1, '2017-12-26 16:27:48', '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(6, 6, 'SQrxBDUr25abI3pnICsBYgLbLugbw5mC', 1, '2017-12-26 16:27:48', '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(7, 7, '4znevt8KeT8IWmVI8HQxrG3rWOs9v1O9', 1, '2017-12-26 16:27:48', '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(8, 8, 'GhsRMwXGY3AzHO8gaCuUtAarwEddMcuf', 1, '2017-12-26 16:27:48', '2017-12-26 16:27:48', '2017-12-26 16:27:48'),
(9, 9, 'nb97HISve532ASGESW29hdPD47LGX7nh', 1, '2017-12-26 16:27:49', '2017-12-26 16:27:49', '2017-12-26 16:27:49'),
(10, 10, 'D6baYKrpE4ur8BsAdhWoW59XDqPK7jtN', 1, '2017-12-26 16:27:49', '2017-12-26 16:27:49', '2017-12-26 16:27:49'),
(11, 11, 'wwBVw2Jy5itDnRwEMCwSw0ZzyoBxNmh2', 1, '2017-12-26 16:27:49', '2017-12-26 16:27:49', '2017-12-26 16:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_persistences`
--

CREATE TABLE `user_persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_persistences`
--

INSERT INTO `user_persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(49, 3, 'TzmRi5Ude7CXPnhyyp8JFrKGnTGhtgS4', '2018-01-12 08:49:55', '2018-01-12 08:49:55'),
(50, 3, 'cCEZuNraCCGUU3i6osXb60ZRSarUZCUu', '2018-01-12 08:49:55', '2018-01-12 08:49:55'),
(151, 2, 't2vWMK3SyZ7uGnM08SvA0dl8Fe1DsZBs', '2018-02-13 01:11:44', '2018-02-13 01:11:44'),
(152, 2, '81x2SvWMPCdx79emf7HapYT01GjGCpXV', '2018-02-13 01:11:44', '2018-02-13 01:11:44'),
(153, 2, 'O8C4dokZOcPrDdEoryQAx2o5ET881jOl', '2018-02-13 14:26:11', '2018-02-13 14:26:11'),
(154, 2, 'U4PhhCMDnHgWW1sTOIXeDHm0llkRfPqX', '2018-02-13 14:26:11', '2018-02-13 14:26:11'),
(155, 2, 'aSaIUHM5ZmithBMOGJkUNXBH7kBQ4wDR', '2018-02-13 18:22:54', '2018-02-13 18:22:54'),
(156, 2, 'emRIGmLWMkYDbcManlo4EaI1UP4VJ8SE', '2018-02-13 18:22:54', '2018-02-13 18:22:54'),
(157, 2, 'qpeDML9insPYA65XOXEulgR0EQRtDkto', '2018-02-14 16:57:43', '2018-02-14 16:57:43'),
(158, 2, 'oftnRnN7iUPHLf7k55fund7LtCAcNkWm', '2018-02-14 16:57:43', '2018-02-14 16:57:43'),
(159, 2, 'Ov2hDuNQ9iFvf3gUDj1GuE6GrgyDuepS', '2018-02-14 17:20:59', '2018-02-14 17:20:59'),
(160, 2, 'DUER56vpA8RgisXyjKKKmKTimh8ekkUt', '2018-02-14 17:20:59', '2018-02-14 17:20:59'),
(161, 2, 'drej3QalARDscI8cA6cjziInz9P7JMiX', '2018-02-15 06:33:59', '2018-02-15 06:33:59'),
(162, 2, 'Ezy4ZGG2tl66833RkPV4XNDB4YLPkgAy', '2018-02-15 06:33:59', '2018-02-15 06:33:59'),
(163, 2, 'uSpBHRMZt3MwgyjMYTJ8lDqHEmogPKoJ', '2018-02-15 11:34:14', '2018-02-15 11:34:14'),
(164, 2, '5t20xqlo130PlVaXVNrmCCt6H4HuTKXj', '2018-02-15 11:34:14', '2018-02-15 11:34:14'),
(165, 2, 'pxkc9Ls8UngnUxiwt6ucdnJeOYgklMOP', '2018-02-15 15:28:31', '2018-02-15 15:28:31'),
(166, 2, 'NaogIvjNz0cxmAyNPheMG39yysFRKAsa', '2018-02-15 15:28:31', '2018-02-15 15:28:31'),
(167, 2, 'La5ftwnlvMEClAjBQzjvZL3lukHs31P4', '2018-02-16 09:30:40', '2018-02-16 09:30:40'),
(168, 2, 'FI41ahJxKHpYx4EscSj3vpRw8pJu0GxS', '2018-02-16 09:30:40', '2018-02-16 09:30:40'),
(169, 2, '7wlvT7eCQMIYCneFgwHZfcwGnM3vZhoo', '2018-02-16 11:21:57', '2018-02-16 11:21:57'),
(170, 2, 'vsz6spHXkO1YFFRKII5JsJeISmXCTvAb', '2018-02-16 11:21:57', '2018-02-16 11:21:57'),
(171, 2, 'KWBrV1dG8lkNwEOWnOgWcW0h2PemkAT8', '2018-02-17 11:29:51', '2018-02-17 11:29:51'),
(172, 2, 'wVGyjj4C3cJSVY1qZyA74nkUA9kHN4HO', '2018-02-17 11:29:51', '2018-02-17 11:29:51'),
(173, 2, '3QjwTJJ2CffBecRboIfkImNGx2eRZFzD', '2018-02-17 21:09:51', '2018-02-17 21:09:51'),
(174, 2, 'DomALECjdB8ohO0tggOTcVkXdcZy3H4o', '2018-02-17 21:09:51', '2018-02-17 21:09:51'),
(175, 2, 'IjQsN7qkS9wOlWWTEcsHH8QrDRZ7RDcE', '2018-02-17 23:20:24', '2018-02-17 23:20:24'),
(176, 2, 'LKXKvDL8uP0Xczro169tubtVocIKUkfm', '2018-02-17 23:20:24', '2018-02-17 23:20:24'),
(177, 2, 'HQVsbd4KirF0oIovJ5Z0JTiPcmhPlMIf', '2018-02-20 17:09:15', '2018-02-20 17:09:15'),
(178, 2, 'MoepXP7NDlv9dJW0hMrPabl5zb8sEWnl', '2018-02-20 17:09:16', '2018-02-20 17:09:16'),
(179, 2, 'lLZNKuB79yW4Usy0E2UOF31BDXV2T8tD', '2018-02-21 00:53:39', '2018-02-21 00:53:39'),
(180, 2, 'lIi7qTolgpKzN2qAeBaZToIcEdUykuQN', '2018-02-21 00:53:39', '2018-02-21 00:53:39'),
(181, 2, 'Iopjdr8IknStPH7PpIVSxDUxB39NMaBv', '2018-02-21 09:27:38', '2018-02-21 09:27:38'),
(182, 2, 'rEHwptHZo8WNR86jxb3kQnrBZKWFWvgT', '2018-02-21 09:27:38', '2018-02-21 09:27:38'),
(183, 2, 'xCV8rJgHpNJ29kCklnJTVxa0KXVaHKoI', '2018-02-21 10:49:32', '2018-02-21 10:49:32'),
(184, 2, 'gbxRMAlADmvMaxnQTKI0uBqOyTnV2qSK', '2018-02-21 10:49:32', '2018-02-21 10:49:32'),
(185, 2, '9l6zpynb3T2LF14q2mQvInNhHk1W1Dgy', '2018-02-21 13:59:35', '2018-02-21 13:59:35'),
(186, 2, '51CDIrfUzn3xvgS45t1gmfFMQsDIiF7k', '2018-02-21 13:59:35', '2018-02-21 13:59:35'),
(187, 2, '8GJy2bXKPFByJkBIgqSL7EEZdqhzJP9W', '2018-02-21 15:28:01', '2018-02-21 15:28:01'),
(188, 2, '0cXBqY3EriCxfwovJSPfn3gEpiU0uTku', '2018-02-21 15:28:01', '2018-02-21 15:28:01'),
(189, 2, 'LgvsjlqGPN3RziAf2v7Nw1OCg4fJGFd2', '2018-02-22 00:25:21', '2018-02-22 00:25:21'),
(190, 2, 'YirAKGpLWN8S9YllklGrtrLJQMhwSuew', '2018-02-22 00:25:21', '2018-02-22 00:25:21'),
(191, 2, 'CdZj8lnYERShCwys4xJUSehQf74WgH3z', '2018-02-22 11:41:29', '2018-02-22 11:41:29'),
(192, 2, 'C1DBwMX7E8v1VSqH4a2WJ169kG6Hyf6H', '2018-02-22 11:41:29', '2018-02-22 11:41:29'),
(193, 2, 'Mm8usxZ8aoNYXpniGjnPy0uU8yuUfIOq', '2018-02-22 14:51:44', '2018-02-22 14:51:44'),
(194, 2, 'G7COUfa6iYT7xjICgBvRTdvh1vhtsRcH', '2018-02-22 14:51:44', '2018-02-22 14:51:44'),
(195, 2, '6dk3YNMFyIiGnfVKPKWHrJ73dYSMolem', '2018-02-23 09:34:41', '2018-02-23 09:34:41'),
(196, 2, 'CD6djkEgnlWOoWA6WF3i0wrAZm7lVk7j', '2018-02-23 09:34:41', '2018-02-23 09:34:41'),
(197, 2, 'ImV7bRSOELA8QXLOptpxnJI6RBnM0Ak1', '2018-02-24 15:42:49', '2018-02-24 15:42:49'),
(198, 2, '8oKhd3T0ZQU5AboXDpVWGzV6lkT5O4bZ', '2018-02-24 15:42:49', '2018-02-24 15:42:49'),
(199, 2, '0ydNyQ3yUsyrHXiJychDoNNnbyqvhwx9', '2018-02-26 13:26:29', '2018-02-26 13:26:29'),
(200, 2, 'emVbVPFhHNtKnZUydOkD47QSdcJ5JYSS', '2018-02-26 13:26:29', '2018-02-26 13:26:29'),
(201, 2, 'trPUJindA0SA8vlqN5D870ag61JI8eVv', '2018-02-26 22:54:31', '2018-02-26 22:54:31'),
(202, 2, 'rwpZ4HNMjp5Mg3yMufpGYqgzcYhLG8Se', '2018-02-26 22:54:31', '2018-02-26 22:54:31'),
(203, 2, '2Icn4jQt4fFMT5diX0ShXPcM3pHSosKd', '2018-02-27 12:14:07', '2018-02-27 12:14:07'),
(204, 2, '0l6hfthCUcfBZjEjG6ZWWXCBFROMhthr', '2018-02-27 12:14:07', '2018-02-27 12:14:07'),
(205, 2, 'MXDljjpgvGzYbDSsQ9Rmc5djYlPHhDQt', '2018-02-27 23:50:43', '2018-02-27 23:50:43'),
(206, 2, 'ntavqHAf8EMYjXHsw5gFa31WjMRE5wzT', '2018-02-27 23:50:43', '2018-02-27 23:50:43'),
(207, 2, '6rmbfHPzbQAgAxfbhCpQ5LTGgLu42zfC', '2018-02-28 04:09:08', '2018-02-28 04:09:08'),
(208, 2, 'fEpsYe5ylace8u7uLHAWphGZwPPPh7GN', '2018-02-28 04:09:08', '2018-02-28 04:09:08'),
(209, 2, 'TuKll0L3fDO9fhAXY4s7HmfCXjePzV9K', '2018-02-28 09:59:12', '2018-02-28 09:59:12'),
(210, 2, 'LpOxMR3zNmlgeEz3VodHTMSK2ZsqByPG', '2018-02-28 09:59:12', '2018-02-28 09:59:12'),
(211, 2, 'Q9zZPHxwo2FNart6CAFYTNNSCLLY2msl', '2018-02-28 13:51:42', '2018-02-28 13:51:42'),
(212, 2, 'RyZn2EfKoihBbADucr7LFtTnsSqRXTsS', '2018-02-28 13:51:42', '2018-02-28 13:51:42'),
(213, 2, 'vMOvWnGdNp6tbUnb5tCj14FqNISCg8N9', '2018-03-01 09:33:42', '2018-03-01 09:33:42'),
(214, 2, '7ULFUnoHWFPdkBJTeAvUINS5iCJvHF4s', '2018-03-01 09:33:42', '2018-03-01 09:33:42'),
(215, 2, 'xxR1k8A4JaW03OVuDzTWdPC1O06fpQto', '2018-03-01 14:00:37', '2018-03-01 14:00:37'),
(216, 2, 'g0NGEFrhVvZ87w7QdgccHRqMIZMm6qQV', '2018-03-01 14:00:37', '2018-03-01 14:00:37'),
(217, 2, 'qZPMzweGniOaqUBkJjSVlVosd5f9LZYH', '2018-03-01 14:11:07', '2018-03-01 14:11:07'),
(218, 2, '0Ea9JqY1q8gvFd0wlON2gzO0YbkOmVap', '2018-03-01 14:11:07', '2018-03-01 14:11:07'),
(219, 2, 'KymaxzzmgQeC3Z3U3zA7N953KLa2YaV8', '2018-03-02 09:33:22', '2018-03-02 09:33:22'),
(220, 2, 'JYo5eIomYSkdA6bi0RKpRyIBpC7j8KMP', '2018-03-02 09:33:22', '2018-03-02 09:33:22'),
(221, 2, 'U1IKjoq2EIH32G4K0xPo64sqJVuwyFkL', '2018-03-02 09:37:28', '2018-03-02 09:37:28'),
(222, 2, 'qH24L5PpXhYPuIQqsxo4ucdYA9Bqh17q', '2018-03-02 09:37:28', '2018-03-02 09:37:28'),
(223, 2, 'cviPUpIkpOFKBqAwxJJMUUeSZUHJqAwI', '2018-03-02 13:20:42', '2018-03-02 13:20:42'),
(224, 2, 'obyxoFWtKlnsumXKxfutrujGh1tMPaW5', '2018-03-02 13:20:42', '2018-03-02 13:20:42'),
(225, 2, 'QuBvUM3M0WJmHsdBzOdZvy4C6VAx1RRR', '2018-03-02 13:35:13', '2018-03-02 13:35:13'),
(226, 2, 'jvAeLgpXJMmfOEXwCfJ1wzHmVt24qUag', '2018-03-02 13:35:13', '2018-03-02 13:35:13'),
(227, 2, 'QPLFQFd8RbXpXbtbBXW1VrhWQ1tnfXt3', '2018-03-02 21:16:52', '2018-03-02 21:16:52'),
(228, 2, 'FLm2n7d4FcKdt5wH52dFbzVl53SRInqe', '2018-03-02 21:16:52', '2018-03-02 21:16:52'),
(229, 2, 'mVOtw4puYvnElLtRmfeZPfUkYrLHHVfz', '2018-03-03 15:16:38', '2018-03-03 15:16:38'),
(230, 2, 'QXHjPo62NkuTjsKcvRocj4HW23n1vdDs', '2018-03-03 15:16:38', '2018-03-03 15:16:38'),
(231, 2, 'oGY3Ti85PRqVSbgSLZNkV3fbCjdTg42F', '2018-03-03 18:12:00', '2018-03-03 18:12:00'),
(232, 2, 'yoEEa37UTFJpEDWRU6MrNiG4OAooCOq2', '2018-03-03 18:12:00', '2018-03-03 18:12:00'),
(233, 2, 'jNhviuubetZNcXa6XCOPvCJSGsYuDQCV', '2018-03-05 01:17:00', '2018-03-05 01:17:00'),
(234, 2, '05CQowQlbtcH6qiznG6zWL1mnzTEsZ0n', '2018-03-05 01:17:00', '2018-03-05 01:17:00'),
(235, 2, 'oX7j5HgV86uDFcGTVXjRyULw7kgPAmae', '2018-03-05 10:34:37', '2018-03-05 10:34:37'),
(236, 2, 'L5afjUhe7noyPWDiJps2ko3Hv3NQxVCF', '2018-03-05 10:34:37', '2018-03-05 10:34:37'),
(237, 2, 'ytuzGJqZ4xjWJqUcxB5xaKTqK1kYigtG', '2018-03-06 15:34:32', '2018-03-06 15:34:32'),
(238, 2, 'u3ZSHBGQeYfgaYqUxfsPFkQbIbkvKLxK', '2018-03-06 15:34:32', '2018-03-06 15:34:32'),
(239, 2, 'FmhUOe83QRJZmGRexLKWBR7ggpN0YIGy', '2018-03-13 06:22:04', '2018-03-13 06:22:04'),
(240, 2, 'ZxlrfIIGW2k0QdqDVXkiHFIawlPdavwy', '2018-03-13 06:22:04', '2018-03-13 06:22:04'),
(241, 2, 'xkhldswwKbHp7xb3A4V6t5RFgP9rKg8q', '2018-03-14 05:55:18', '2018-03-14 05:55:18'),
(242, 2, '1S651zeC400gF5DDgO8SWpLxXZA7XyN7', '2018-03-14 05:55:18', '2018-03-14 05:55:18'),
(243, 2, '8y6WoqpHHXqy70MIggzTytJPOrpHWLaX', '2018-03-15 23:28:31', '2018-03-15 23:28:31'),
(244, 2, 't0hqBxJPcCIEatY36UV3vwVXP6wtN4JV', '2018-03-15 23:28:32', '2018-03-15 23:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_reminders`
--

CREATE TABLE `user_reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'sysadmin', 'sysadmin', '{\"dashboard.admin.view\":true,\"view.managements\":true,\"manage.users.list\":true,\"manage.users.create\":true,\"manage.users.update\":true,\"manage.locations.list\":true,\"manage.locations.create\":true,\"manage.locations.update\":true,\"manage.locations.delete\":true,\"manage.operator.list\":true,\"manage.operator.create\":true,\"manage.operator.update\":true,\"manage.operator.delete\":true,\"manage.equipment.list\":true,\"manage.equipment.create\":true,\"manage.equipment.update\":true,\"manage.equipment.delete\":true,\"manage.subcontractor.list\":true,\"manage.subcontractor.create\":true,\"manage.subcontractor.update\":true,\"manage.subcontractor.delete\":true}', '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(2, 'godlike', 'godlike', '{\"dashboard.user.view\":true,\"view.managements\":true,\"manage.users.list\":true,\"manage.users.create\":true,\"manage.users.update\":true,\"manage.locations.list\":true,\"manage.locations.create\":true,\"manage.locations.update\":true,\"manage.operator.list\":true,\"manage.operator.create\":true,\"manage.operator.update\":true,\"manage.equipment.list\":true,\"manage.equipment.create\":true,\"manage.equipment.update\":true,\"manage.subcontractor.list\":true,\"manage.subcontractor.create\":true,\"manage.subcontractor.update\":true}', '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(3, 'monitoring-clerk', 'monitoring-clerk', '{\"dashboard.user.view\":true,\"manage.locations.list\":true,\"manage.locations.create\":true,\"manage.locations.update\":true,\"manage.operator.list\":true,\"manage.operator.create\":true,\"manage.operator.update\":true,\"manage.equipment.list\":true,\"manage.equipment.create\":true,\"manage.equipment.update\":true,\"manage.subcontractor.list\":true,\"manage.subcontractor.create\":true,\"manage.subcontractor.update\":true}', '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(4, 'sub-con-clerk', 'sub-con-clerk', '{\"dashboard.user.view\":true,\"manage.locations.list\":true,\"manage.locations.create\":true,\"manage.locations.update\":true,\"manage.operator.list\":true,\"manage.operator.create\":true,\"manage.operator.update\":true,\"manage.equipment.list\":true,\"manage.equipment.create\":true,\"manage.equipment.update\":true,\"manage.subcontractor.list\":true,\"manage.subcontractor.create\":true,\"manage.subcontractor.update\":true}', '2017-12-26 16:27:47', '2017-12-26 16:27:47'),
(5, 'guest', 'guest', '{\"dashboard.user.view\":true,\"manage.locations.list\":true,\"manage.locations.create\":true,\"manage.locations.update\":true,\"manage.operator.list\":true,\"manage.operator.create\":true,\"manage.operator.update\":true,\"manage.equipment.list\":true,\"manage.equipment.create\":true,\"manage.equipment.update\":true,\"manage.subcontractor.list\":true,\"manage.subcontractor.create\":true,\"manage.subcontractor.update\":true}', '2017-12-26 16:27:47', '2017-12-26 16:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_throttle`
--

CREATE TABLE `user_throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_throttle`
--

INSERT INTO `user_throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2018-01-11 07:41:01', '2018-01-11 07:41:01'),
(2, NULL, 'ip', '192.168.1.228', '2018-01-11 07:41:01', '2018-01-11 07:41:01'),
(3, 2, 'user', NULL, '2018-01-11 07:41:01', '2018-01-11 07:41:01'),
(4, NULL, 'global', NULL, '2018-01-11 07:41:15', '2018-01-11 07:41:15'),
(5, NULL, 'ip', '192.168.1.228', '2018-01-11 07:41:15', '2018-01-11 07:41:15'),
(6, 2, 'user', NULL, '2018-01-11 07:41:15', '2018-01-11 07:41:15'),
(7, NULL, 'global', NULL, '2018-01-11 07:41:30', '2018-01-11 07:41:30'),
(8, NULL, 'ip', '192.168.1.228', '2018-01-11 07:41:30', '2018-01-11 07:41:30'),
(9, 2, 'user', NULL, '2018-01-11 07:41:30', '2018-01-11 07:41:30'),
(10, NULL, 'global', NULL, '2018-02-08 16:07:49', '2018-02-08 16:07:49'),
(11, NULL, 'ip', '192.168.1.148', '2018-02-08 16:07:49', '2018-02-08 16:07:49'),
(12, 2, 'user', NULL, '2018-02-08 16:07:49', '2018-02-08 16:07:49'),
(13, NULL, 'global', NULL, '2018-02-08 16:08:38', '2018-02-08 16:08:38'),
(14, NULL, 'ip', '192.168.1.148', '2018-02-08 16:08:38', '2018-02-08 16:08:38'),
(15, 2, 'user', NULL, '2018-02-08 16:08:38', '2018-02-08 16:08:38'),
(16, NULL, 'global', NULL, '2018-02-08 22:20:08', '2018-02-08 22:20:08'),
(17, NULL, 'ip', '192.168.1.228', '2018-02-08 22:20:08', '2018-02-08 22:20:08'),
(18, 2, 'user', NULL, '2018-02-08 22:20:08', '2018-02-08 22:20:08'),
(19, NULL, 'global', NULL, '2018-02-17 11:29:44', '2018-02-17 11:29:44'),
(20, NULL, 'ip', '192.168.1.148', '2018-02-17 11:29:44', '2018-02-17 11:29:44'),
(21, 2, 'user', NULL, '2018-02-17 11:29:44', '2018-02-17 11:29:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_images`
--
ALTER TABLE `equipment_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_monitoring`
--
ALTER TABLE `fuel_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_monitoring_logs`
--
ALTER TABLE `fuel_monitoring_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_projects`
--
ALTER TABLE `fuel_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_name_unique` (`name`);

--
-- Indexes for table `lubricant_monitoring`
--
ALTER TABLE `lubricant_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lubricant_monitoring_logs`
--
ALTER TABLE `lubricant_monitoring_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_name_unique` (`name`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `subcontractors`
--
ALTER TABLE `subcontractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontractorworks`
--
ALTER TABLE `subcontractorworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcontractorworks_equipment_index` (`equipment`);

--
-- Indexes for table `subcontractorwork_payments`
--
ALTER TABLE `subcontractorwork_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_oils`
--
ALTER TABLE `type_of_oils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_persistences`
--
ALTER TABLE `user_persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_persistences_code_unique` (`code`);

--
-- Indexes for table `user_reminders`
--
ALTER TABLE `user_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_roles_slug_unique` (`slug`);

--
-- Indexes for table `user_throttle`
--
ALTER TABLE `user_throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_throttle_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `equipment_images`
--
ALTER TABLE `equipment_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_monitoring`
--
ALTER TABLE `fuel_monitoring`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `fuel_monitoring_logs`
--
ALTER TABLE `fuel_monitoring_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `fuel_projects`
--
ALTER TABLE `fuel_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lubricant_monitoring`
--
ALTER TABLE `lubricant_monitoring`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lubricant_monitoring_logs`
--
ALTER TABLE `lubricant_monitoring_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcontractors`
--
ALTER TABLE `subcontractors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subcontractorworks`
--
ALTER TABLE `subcontractorworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1850;

--
-- AUTO_INCREMENT for table `subcontractorwork_payments`
--
ALTER TABLE `subcontractorwork_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `type_of_oils`
--
ALTER TABLE `type_of_oils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_persistences`
--
ALTER TABLE `user_persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `user_reminders`
--
ALTER TABLE `user_reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_throttle`
--
ALTER TABLE `user_throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
