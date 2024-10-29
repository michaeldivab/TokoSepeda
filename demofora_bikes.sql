-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2024 at 07:03 PM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demofora_bikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `assemblies`
--

CREATE TABLE `assemblies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bike_id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_username` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_username`, `bank_name`, `bank_no`, `created_at`, `updated_at`) VALUES
(1, 'test name', 'BCA', '13131313123123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(10) DEFAULT NULL,
  `price_discount` int(20) DEFAULT NULL,
  `color` text DEFAULT NULL,
  `share` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `weight` int(11) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ordercount` int(11) NOT NULL DEFAULT 0,
  `viewcount` int(11) NOT NULL DEFAULT 0,
  `reviewcount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `stock`, `price`, `discount`, `price_discount`, `color`, `share`, `type`, `brand`, `img`, `name`, `description`, `weight`, `user_id`, `ordercount`, `viewcount`, `reviewcount`, `created_at`, `updated_at`) VALUES
(1, 1, 18000, 10, 18000, 'kuning - hijau', 0, 'Sepeda Gunung', 'United Bike', 'images/product/bikes/bikes.jpg', 'test', 'test', 1000, 1, 0, 35, 4, '2024-10-07 05:22:11', '2024-10-25 18:51:50'),
(2, 0, 500000, NULL, NULL, NULL, 0, 'road', 'adidas', 'images/product/bikes/bikes.jpg', 'test', 'test', 2000, 1, 0, 1, 0, '2024-10-07 05:22:11', '2024-10-25 17:54:35'),
(3, 1, 18000, 10, 18000, 'kuning - hijau', 0, 'Sepeda Gunung', 'United Bike', 'images/product/bikes/bikes.jpg', 'test', 'test', 1000, 1, 0, 30, 0, '2024-10-07 05:22:11', '2024-10-23 06:02:56'),
(4, 0, 500000, NULL, NULL, NULL, 0, 'road', 'adidas', 'images/product/bikes/bikes.jpg', 'test', 'test', 2000, 1, 0, 3, 0, '2024-10-07 05:22:11', '2024-10-25 17:54:58'),
(5, 1, 18000, 10, 18000, 'kuning - hijau', 0, 'Sepeda Gunung', 'United Bike', 'images/product/bikes/bikes.jpg', 'test', 'test', 1000, 1, 0, 30, 0, '2024-10-07 05:22:11', '2024-10-23 06:02:56'),
(6, 0, 500000, NULL, NULL, NULL, 0, 'road', 'adidas', 'images/product/bikes/bikes.jpg', 'test', 'test', 2000, 1, 0, 0, 0, '2024-10-07 05:22:11', '2024-10-15 09:21:48'),
(7, 1, 18000, 10, 18000, 'kuning - hijau', 0, 'Sepeda Gunung', 'United Bike', 'images/product/bikes/bikes.jpg', 'test', 'test', 1000, 1, 0, 30, 0, '2024-10-07 05:22:11', '2024-10-23 06:02:56'),
(8, 0, 500000, NULL, NULL, NULL, 0, 'road', 'adidas', 'images/product/bikes/bikes.jpg', 'test', 'test', 2000, 1, 0, 0, 0, '2024-10-07 05:22:11', '2024-10-15 09:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `type`, `name`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kabupaten', 'Kabupaten Badung', '80351', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(2, 1, 'Kabupaten', 'Kabupaten Bangli', '80619', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(3, 1, 'Kabupaten', 'Kabupaten Buleleng', '81111', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(4, 1, 'Kota', 'Kota Denpasar', '80227', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(5, 1, 'Kabupaten', 'Kabupaten Gianyar', '80519', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(6, 1, 'Kabupaten', 'Kabupaten Jembrana', '82251', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(7, 1, 'Kabupaten', 'Kabupaten Karangasem', '80819', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(8, 1, 'Kabupaten', 'Kabupaten Klungkung', '80719', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(9, 1, 'Kabupaten', 'Kabupaten Tabanan', '82119', '2024-10-15 07:51:53', '2024-10-15 07:51:53'),
(10, 2, 'Kabupaten', 'Kabupaten Bangka', '33212', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(11, 2, 'Kabupaten', 'Kabupaten Bangka Barat', '33315', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(12, 2, 'Kabupaten', 'Kabupaten Bangka Selatan', '33719', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(13, 2, 'Kabupaten', 'Kabupaten Bangka Tengah', '33613', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(14, 2, 'Kabupaten', 'Kabupaten Belitung', '33419', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(15, 2, 'Kabupaten', 'Kabupaten Belitung Timur', '33519', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(16, 2, 'Kota', 'Kota Pangkal Pinang', '33115', '2024-10-15 07:51:55', '2024-10-15 07:51:55'),
(17, 3, 'Kota', 'Kota Cilegon', '42417', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(18, 3, 'Kabupaten', 'Kabupaten Lebak', '42319', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(19, 3, 'Kabupaten', 'Kabupaten Pandeglang', '42212', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(20, 3, 'Kabupaten', 'Kabupaten Serang', '42182', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(21, 3, 'Kota', 'Kota Serang', '42111', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(22, 3, 'Kabupaten', 'Kabupaten Tangerang', '15914', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(23, 3, 'Kota', 'Kota Tangerang', '15111', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(24, 3, 'Kota', 'Kota Tangerang Selatan', '15435', '2024-10-15 07:51:56', '2024-10-15 07:51:56'),
(25, 4, 'Kota', 'Kota Bengkulu', '38229', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(26, 4, 'Kabupaten', 'Kabupaten Bengkulu Selatan', '38519', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(27, 4, 'Kabupaten', 'Kabupaten Bengkulu Tengah', '38319', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(28, 4, 'Kabupaten', 'Kabupaten Bengkulu Utara', '38619', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(29, 4, 'Kabupaten', 'Kabupaten Kaur', '38911', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(30, 4, 'Kabupaten', 'Kabupaten Kepahiang', '39319', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(31, 4, 'Kabupaten', 'Kabupaten Lebong', '39264', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(32, 4, 'Kabupaten', 'Kabupaten Muko Muko', '38715', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(33, 4, 'Kabupaten', 'Kabupaten Rejang Lebong', '39112', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(34, 4, 'Kabupaten', 'Kabupaten Seluma', '38811', '2024-10-15 07:51:57', '2024-10-15 07:51:57'),
(35, 5, 'Kabupaten', 'Kabupaten Bantul', '55715', '2024-10-15 07:51:59', '2024-10-15 07:51:59'),
(36, 5, 'Kabupaten', 'Kabupaten Gunung Kidul', '55812', '2024-10-15 07:51:59', '2024-10-15 07:51:59'),
(37, 5, 'Kabupaten', 'Kabupaten Kulon Progo', '55611', '2024-10-15 07:51:59', '2024-10-15 07:51:59'),
(38, 5, 'Kabupaten', 'Kabupaten Sleman', '55513', '2024-10-15 07:51:59', '2024-10-15 07:51:59'),
(39, 5, 'Kota', 'Kota Yogyakarta', '55111', '2024-10-15 07:51:59', '2024-10-15 07:51:59'),
(40, 6, 'Kota', 'Kota Jakarta Barat', '11220', '2024-10-15 07:52:00', '2024-10-15 07:52:00'),
(41, 6, 'Kota', 'Kota Jakarta Pusat', '10540', '2024-10-15 07:52:00', '2024-10-15 07:52:00'),
(42, 6, 'Kota', 'Kota Jakarta Selatan', '12230', '2024-10-15 07:52:00', '2024-10-15 07:52:00'),
(43, 6, 'Kota', 'Kota Jakarta Timur', '13330', '2024-10-15 07:52:00', '2024-10-15 07:52:00'),
(44, 6, 'Kota', 'Kota Jakarta Utara', '14140', '2024-10-15 07:52:00', '2024-10-15 07:52:00'),
(45, 6, 'Kabupaten', 'Kabupaten Kepulauan Seribu', '14550', '2024-10-15 07:52:00', '2024-10-15 07:52:00'),
(46, 7, 'Kabupaten', 'Kabupaten Boalemo', '96319', '2024-10-15 07:52:01', '2024-10-15 07:52:01'),
(47, 7, 'Kabupaten', 'Kabupaten Bone Bolango', '96511', '2024-10-15 07:52:01', '2024-10-15 07:52:01'),
(48, 7, 'Kabupaten', 'Kabupaten Gorontalo', '96218', '2024-10-15 07:52:01', '2024-10-15 07:52:01'),
(49, 7, 'Kota', 'Kota Gorontalo', '96115', '2024-10-15 07:52:01', '2024-10-15 07:52:01'),
(50, 7, 'Kabupaten', 'Kabupaten Gorontalo Utara', '96611', '2024-10-15 07:52:01', '2024-10-15 07:52:01'),
(51, 7, 'Kabupaten', 'Kabupaten Pohuwato', '96419', '2024-10-15 07:52:01', '2024-10-15 07:52:01'),
(52, 8, 'Kabupaten', 'Kabupaten Batang Hari', '36613', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(53, 8, 'Kabupaten', 'Kabupaten Bungo', '37216', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(54, 8, 'Kota', 'Kota Jambi', '36111', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(55, 8, 'Kabupaten', 'Kabupaten Kerinci', '37167', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(56, 8, 'Kabupaten', 'Kabupaten Merangin', '37319', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(57, 8, 'Kabupaten', 'Kabupaten Muaro Jambi', '36311', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(58, 8, 'Kabupaten', 'Kabupaten Sarolangun', '37419', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(59, 8, 'Kota', 'Kota Sungaipenuh', '37113', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(60, 8, 'Kabupaten', 'Kabupaten Tanjung Jabung Barat', '36513', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(61, 8, 'Kabupaten', 'Kabupaten Tanjung Jabung Timur', '36719', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(62, 8, 'Kabupaten', 'Kabupaten Tebo', '37519', '2024-10-15 07:52:03', '2024-10-15 07:52:03'),
(63, 9, 'Kabupaten', 'Kabupaten Bandung', '40311', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(64, 9, 'Kota', 'Kota Bandung', '40111', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(65, 9, 'Kabupaten', 'Kabupaten Bandung Barat', '40721', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(66, 9, 'Kota', 'Kota Banjar', '46311', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(67, 9, 'Kabupaten', 'Kabupaten Bekasi', '17837', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(68, 9, 'Kota', 'Kota Bekasi', '17121', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(69, 9, 'Kabupaten', 'Kabupaten Bogor', '16911', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(70, 9, 'Kota', 'Kota Bogor', '16119', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(71, 9, 'Kabupaten', 'Kabupaten Ciamis', '46211', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(72, 9, 'Kabupaten', 'Kabupaten Cianjur', '43217', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(73, 9, 'Kota', 'Kota Cimahi', '40512', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(74, 9, 'Kabupaten', 'Kabupaten Cirebon', '45611', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(75, 9, 'Kota', 'Kota Cirebon', '45116', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(76, 9, 'Kota', 'Kota Depok', '16416', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(77, 9, 'Kabupaten', 'Kabupaten Garut', '44126', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(78, 9, 'Kabupaten', 'Kabupaten Indramayu', '45214', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(79, 9, 'Kabupaten', 'Kabupaten Karawang', '41311', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(80, 9, 'Kabupaten', 'Kabupaten Kuningan', '45511', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(81, 9, 'Kabupaten', 'Kabupaten Majalengka', '45412', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(82, 9, 'Kabupaten', 'Kabupaten Pangandaran', '46511', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(83, 9, 'Kabupaten', 'Kabupaten Purwakarta', '41119', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(84, 9, 'Kabupaten', 'Kabupaten Subang', '41215', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(85, 9, 'Kabupaten', 'Kabupaten Sukabumi', '43311', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(86, 9, 'Kota', 'Kota Sukabumi', '43114', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(87, 9, 'Kabupaten', 'Kabupaten Sumedang', '45326', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(88, 9, 'Kabupaten', 'Kabupaten Tasikmalaya', '46411', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(89, 9, 'Kota', 'Kota Tasikmalaya', '46116', '2024-10-15 07:52:04', '2024-10-15 07:52:04'),
(90, 10, 'Kabupaten', 'Kabupaten Banjarnegara', '53419', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(91, 10, 'Kabupaten', 'Kabupaten Banyumas', '53114', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(92, 10, 'Kabupaten', 'Kabupaten Batang', '51211', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(93, 10, 'Kabupaten', 'Kabupaten Blora', '58219', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(94, 10, 'Kabupaten', 'Kabupaten Boyolali', '57312', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(95, 10, 'Kabupaten', 'Kabupaten Brebes', '52212', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(96, 10, 'Kabupaten', 'Kabupaten Cilacap', '53211', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(97, 10, 'Kabupaten', 'Kabupaten Demak', '59519', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(98, 10, 'Kabupaten', 'Kabupaten Grobogan', '58111', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(99, 10, 'Kabupaten', 'Kabupaten Jepara', '59419', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(100, 10, 'Kabupaten', 'Kabupaten Karanganyar', '57718', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(101, 10, 'Kabupaten', 'Kabupaten Kebumen', '54319', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(102, 10, 'Kabupaten', 'Kabupaten Kendal', '51314', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(103, 10, 'Kabupaten', 'Kabupaten Klaten', '57411', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(104, 10, 'Kabupaten', 'Kabupaten Kudus', '59311', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(105, 10, 'Kabupaten', 'Kabupaten Magelang', '56519', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(106, 10, 'Kota', 'Kota Magelang', '56133', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(107, 10, 'Kabupaten', 'Kabupaten Pati', '59114', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(108, 10, 'Kabupaten', 'Kabupaten Pekalongan', '51161', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(109, 10, 'Kota', 'Kota Pekalongan', '51122', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(110, 10, 'Kabupaten', 'Kabupaten Pemalang', '52319', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(111, 10, 'Kabupaten', 'Kabupaten Purbalingga', '53312', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(112, 10, 'Kabupaten', 'Kabupaten Purworejo', '54111', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(113, 10, 'Kabupaten', 'Kabupaten Rembang', '59219', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(114, 10, 'Kota', 'Kota Salatiga', '50711', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(115, 10, 'Kabupaten', 'Kabupaten Semarang', '50511', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(116, 10, 'Kota', 'Kota Semarang', '50135', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(117, 10, 'Kabupaten', 'Kabupaten Sragen', '57211', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(118, 10, 'Kabupaten', 'Kabupaten Sukoharjo', '57514', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(119, 10, 'Kota', 'Kota Surakarta (Solo)', '57113', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(120, 10, 'Kabupaten', 'Kabupaten Tegal', '52419', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(121, 10, 'Kota', 'Kota Tegal', '52114', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(122, 10, 'Kabupaten', 'Kabupaten Temanggung', '56212', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(123, 10, 'Kabupaten', 'Kabupaten Wonogiri', '57619', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(124, 10, 'Kabupaten', 'Kabupaten Wonosobo', '56311', '2024-10-15 07:52:05', '2024-10-15 07:52:05'),
(125, 11, 'Kabupaten', 'Kabupaten Bangkalan', '69118', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(126, 11, 'Kabupaten', 'Kabupaten Banyuwangi', '68416', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(127, 11, 'Kota', 'Kota Batu', '65311', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(128, 11, 'Kabupaten', 'Kabupaten Blitar', '66171', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(129, 11, 'Kota', 'Kota Blitar', '66124', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(130, 11, 'Kabupaten', 'Kabupaten Bojonegoro', '62119', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(131, 11, 'Kabupaten', 'Kabupaten Bondowoso', '68219', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(132, 11, 'Kabupaten', 'Kabupaten Gresik', '61115', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(133, 11, 'Kabupaten', 'Kabupaten Jember', '68113', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(134, 11, 'Kabupaten', 'Kabupaten Jombang', '61415', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(135, 11, 'Kabupaten', 'Kabupaten Kediri', '64184', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(136, 11, 'Kota', 'Kota Kediri', '64125', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(137, 11, 'Kabupaten', 'Kabupaten Lamongan', '64125', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(138, 11, 'Kabupaten', 'Kabupaten Lumajang', '67319', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(139, 11, 'Kabupaten', 'Kabupaten Madiun', '63153', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(140, 11, 'Kota', 'Kota Madiun', '63122', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(141, 11, 'Kabupaten', 'Kabupaten Magetan', '63314', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(142, 11, 'Kota', 'Kota Malang', '65112', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(143, 11, 'Kabupaten', 'Kabupaten Malang', '65163', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(144, 11, 'Kabupaten', 'Kabupaten Mojokerto', '61382', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(145, 11, 'Kota', 'Kota Mojokerto', '61316', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(146, 11, 'Kabupaten', 'Kabupaten Nganjuk', '64414', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(147, 11, 'Kabupaten', 'Kabupaten Ngawi', '63219', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(148, 11, 'Kabupaten', 'Kabupaten Pacitan', '63512', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(149, 11, 'Kabupaten', 'Kabupaten Pamekasan', '69319', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(150, 11, 'Kabupaten', 'Kabupaten Pasuruan', '67153', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(151, 11, 'Kota', 'Kota Pasuruan', '67118', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(152, 11, 'Kabupaten', 'Kabupaten Ponorogo', '63411', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(153, 11, 'Kabupaten', 'Kabupaten Probolinggo', '67282', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(154, 11, 'Kota', 'Kota Probolinggo', '67215', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(155, 11, 'Kabupaten', 'Kabupaten Sampang', '69219', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(156, 11, 'Kabupaten', 'Kabupaten Sidoarjo', '61219', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(157, 11, 'Kabupaten', 'Kabupaten Situbondo', '68316', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(158, 11, 'Kabupaten', 'Kabupaten Sumenep', '69413', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(159, 11, 'Kota', 'Kota Surabaya', '60119', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(160, 11, 'Kabupaten', 'Kabupaten Trenggalek', '66312', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(161, 11, 'Kabupaten', 'Kabupaten Tuban', '62319', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(162, 11, 'Kabupaten', 'Kabupaten Tulungagung', '66212', '2024-10-15 07:52:06', '2024-10-15 07:52:06'),
(163, 12, 'Kabupaten', 'Kabupaten Bengkayang', '79213', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(164, 12, 'Kabupaten', 'Kabupaten Kapuas Hulu', '78719', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(165, 12, 'Kabupaten', 'Kabupaten Kayong Utara', '78852', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(166, 12, 'Kabupaten', 'Kabupaten Ketapang', '78874', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(167, 12, 'Kabupaten', 'Kabupaten Kubu Raya', '78311', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(168, 12, 'Kabupaten', 'Kabupaten Landak', '78319', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(169, 12, 'Kabupaten', 'Kabupaten Melawi', '78619', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(170, 12, 'Kabupaten', 'Kabupaten Pontianak', '78971', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(171, 12, 'Kota', 'Kota Pontianak', '78112', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(172, 12, 'Kabupaten', 'Kabupaten Sambas', '79453', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(173, 12, 'Kabupaten', 'Kabupaten Sanggau', '78557', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(174, 12, 'Kabupaten', 'Kabupaten Sekadau', '79583', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(175, 12, 'Kota', 'Kota Singkawang', '79117', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(176, 12, 'Kabupaten', 'Kabupaten Sintang', '78619', '2024-10-15 07:52:08', '2024-10-15 07:52:08'),
(177, 13, 'Kabupaten', 'Kabupaten Balangan', '71611', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(178, 13, 'Kabupaten', 'Kabupaten Banjar', '70619', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(179, 13, 'Kota', 'Kota Banjarbaru', '70712', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(180, 13, 'Kota', 'Kota Banjarmasin', '70117', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(181, 13, 'Kabupaten', 'Kabupaten Barito Kuala', '70511', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(182, 13, 'Kabupaten', 'Kabupaten Hulu Sungai Selatan', '71212', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(183, 13, 'Kabupaten', 'Kabupaten Hulu Sungai Tengah', '71313', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(184, 13, 'Kabupaten', 'Kabupaten Hulu Sungai Utara', '71419', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(185, 13, 'Kabupaten', 'Kabupaten Kotabaru', '72119', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(186, 13, 'Kabupaten', 'Kabupaten Tabalong', '71513', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(187, 13, 'Kabupaten', 'Kabupaten Tanah Bumbu', '72211', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(188, 13, 'Kabupaten', 'Kabupaten Tanah Laut', '70811', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(189, 13, 'Kabupaten', 'Kabupaten Tapin', '71119', '2024-10-15 07:52:09', '2024-10-15 07:52:09'),
(190, 14, 'Kabupaten', 'Kabupaten Barito Selatan', '73711', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(191, 14, 'Kabupaten', 'Kabupaten Barito Timur', '73671', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(192, 14, 'Kabupaten', 'Kabupaten Barito Utara', '73881', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(193, 14, 'Kabupaten', 'Kabupaten Gunung Mas', '74511', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(194, 14, 'Kabupaten', 'Kabupaten Kapuas', '73583', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(195, 14, 'Kabupaten', 'Kabupaten Katingan', '74411', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(196, 14, 'Kabupaten', 'Kabupaten Kotawaringin Barat', '74119', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(197, 14, 'Kabupaten', 'Kabupaten Kotawaringin Timur', '74364', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(198, 14, 'Kabupaten', 'Kabupaten Lamandau', '74611', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(199, 14, 'Kabupaten', 'Kabupaten Murung Raya', '73911', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(200, 14, 'Kota', 'Kota Palangka Raya', '73112', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(201, 14, 'Kabupaten', 'Kabupaten Pulang Pisau', '74811', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(202, 14, 'Kabupaten', 'Kabupaten Seruyan', '74211', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(203, 14, 'Kabupaten', 'Kabupaten Sukamara', '74712', '2024-10-15 07:52:10', '2024-10-15 07:52:10'),
(204, 15, 'Kota', 'Kota Balikpapan', '76111', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(205, 15, 'Kabupaten', 'Kabupaten Berau', '77311', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(206, 15, 'Kota', 'Kota Bontang', '75313', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(207, 15, 'Kabupaten', 'Kabupaten Kutai Barat', '75711', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(208, 15, 'Kabupaten', 'Kabupaten Kutai Kartanegara', '75511', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(209, 15, 'Kabupaten', 'Kabupaten Kutai Timur', '75611', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(210, 15, 'Kabupaten', 'Kabupaten Paser', '76211', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(211, 15, 'Kabupaten', 'Kabupaten Penajam Paser Utara', '76311', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(212, 15, 'Kota', 'Kota Samarinda', '75133', '2024-10-15 07:52:12', '2024-10-15 07:52:12'),
(213, 16, 'Kabupaten', 'Kabupaten Bulungan (Bulongan)', '77211', '2024-10-15 07:52:13', '2024-10-15 07:52:13'),
(214, 16, 'Kabupaten', 'Kabupaten Malinau', '77511', '2024-10-15 07:52:13', '2024-10-15 07:52:13'),
(215, 16, 'Kabupaten', 'Kabupaten Nunukan', '77421', '2024-10-15 07:52:13', '2024-10-15 07:52:13'),
(216, 16, 'Kabupaten', 'Kabupaten Tana Tidung', '77611', '2024-10-15 07:52:13', '2024-10-15 07:52:13'),
(217, 16, 'Kota', 'Kota Tarakan', '77114', '2024-10-15 07:52:13', '2024-10-15 07:52:13'),
(218, 17, 'Kota', 'Kota Batam', '29413', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(219, 17, 'Kabupaten', 'Kabupaten Bintan', '29135', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(220, 17, 'Kabupaten', 'Kabupaten Karimun', '29611', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(221, 17, 'Kabupaten', 'Kabupaten Kepulauan Anambas', '29991', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(222, 17, 'Kabupaten', 'Kabupaten Lingga', '29811', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(223, 17, 'Kabupaten', 'Kabupaten Natuna', '29711', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(224, 17, 'Kota', 'Kota Tanjung Pinang', '29111', '2024-10-15 07:52:14', '2024-10-15 07:52:14'),
(225, 18, 'Kota', 'Kota Bandar Lampung', '35139', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(226, 18, 'Kabupaten', 'Kabupaten Lampung Barat', '34814', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(227, 18, 'Kabupaten', 'Kabupaten Lampung Selatan', '35511', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(228, 18, 'Kabupaten', 'Kabupaten Lampung Tengah', '34212', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(229, 18, 'Kabupaten', 'Kabupaten Lampung Timur', '34319', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(230, 18, 'Kabupaten', 'Kabupaten Lampung Utara', '34516', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(231, 18, 'Kabupaten', 'Kabupaten Mesuji', '34911', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(232, 18, 'Kota', 'Kota Metro', '34111', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(233, 18, 'Kabupaten', 'Kabupaten Pesawaran', '35312', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(234, 18, 'Kabupaten', 'Kabupaten Pesisir Barat', '35974', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(235, 18, 'Kabupaten', 'Kabupaten Pringsewu', '35719', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(236, 18, 'Kabupaten', 'Kabupaten Tanggamus', '35619', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(237, 18, 'Kabupaten', 'Kabupaten Tulang Bawang', '34613', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(238, 18, 'Kabupaten', 'Kabupaten Tulang Bawang Barat', '34419', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(239, 18, 'Kabupaten', 'Kabupaten Way Kanan', '34711', '2024-10-15 07:52:15', '2024-10-15 07:52:15'),
(240, 19, 'Kota', 'Kota Ambon', '97222', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(241, 19, 'Kabupaten', 'Kabupaten Buru', '97371', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(242, 19, 'Kabupaten', 'Kabupaten Buru Selatan', '97351', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(243, 19, 'Kabupaten', 'Kabupaten Kepulauan Aru', '97681', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(244, 19, 'Kabupaten', 'Kabupaten Maluku Barat Daya', '97451', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(245, 19, 'Kabupaten', 'Kabupaten Maluku Tengah', '97513', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(246, 19, 'Kabupaten', 'Kabupaten Maluku Tenggara', '97651', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(247, 19, 'Kabupaten', 'Kabupaten Maluku Tenggara Barat', '97465', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(248, 19, 'Kabupaten', 'Kabupaten Seram Bagian Barat', '97561', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(249, 19, 'Kabupaten', 'Kabupaten Seram Bagian Timur', '97581', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(250, 19, 'Kota', 'Kota Tual', '97612', '2024-10-15 07:52:17', '2024-10-15 07:52:17'),
(251, 20, 'Kabupaten', 'Kabupaten Halmahera Barat', '97757', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(252, 20, 'Kabupaten', 'Kabupaten Halmahera Selatan', '97911', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(253, 20, 'Kabupaten', 'Kabupaten Halmahera Tengah', '97853', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(254, 20, 'Kabupaten', 'Kabupaten Halmahera Timur', '97862', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(255, 20, 'Kabupaten', 'Kabupaten Halmahera Utara', '97762', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(256, 20, 'Kabupaten', 'Kabupaten Kepulauan Sula', '97995', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(257, 20, 'Kabupaten', 'Kabupaten Pulau Morotai', '97771', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(258, 20, 'Kota', 'Kota Ternate', '97714', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(259, 20, 'Kota', 'Kota Tidore Kepulauan', '97815', '2024-10-15 07:52:18', '2024-10-15 07:52:18'),
(260, 21, 'Kabupaten', 'Kabupaten Aceh Barat', '23681', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(261, 21, 'Kabupaten', 'Kabupaten Aceh Barat Daya', '23764', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(262, 21, 'Kabupaten', 'Kabupaten Aceh Besar', '23951', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(263, 21, 'Kabupaten', 'Kabupaten Aceh Jaya', '23654', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(264, 21, 'Kabupaten', 'Kabupaten Aceh Selatan', '23719', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(265, 21, 'Kabupaten', 'Kabupaten Aceh Singkil', '24785', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(266, 21, 'Kabupaten', 'Kabupaten Aceh Tamiang', '24476', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(267, 21, 'Kabupaten', 'Kabupaten Aceh Tengah', '24511', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(268, 21, 'Kabupaten', 'Kabupaten Aceh Tenggara', '24611', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(269, 21, 'Kabupaten', 'Kabupaten Aceh Timur', '24454', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(270, 21, 'Kabupaten', 'Kabupaten Aceh Utara', '24382', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(271, 21, 'Kota', 'Kota Banda Aceh', '23238', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(272, 21, 'Kabupaten', 'Kabupaten Bener Meriah', '24581', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(273, 21, 'Kabupaten', 'Kabupaten Bireuen', '24219', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(274, 21, 'Kabupaten', 'Kabupaten Gayo Lues', '24653', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(275, 21, 'Kota', 'Kota Langsa', '24412', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(276, 21, 'Kota', 'Kota Lhokseumawe', '24352', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(277, 21, 'Kabupaten', 'Kabupaten Nagan Raya', '23674', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(278, 21, 'Kabupaten', 'Kabupaten Pidie', '24116', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(279, 21, 'Kabupaten', 'Kabupaten Pidie Jaya', '24186', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(280, 21, 'Kota', 'Kota Sabang', '23512', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(281, 21, 'Kabupaten', 'Kabupaten Simeulue', '23891', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(282, 21, 'Kota', 'Kota Subulussalam', '24882', '2024-10-15 07:52:19', '2024-10-15 07:52:19'),
(283, 22, 'Kabupaten', 'Kabupaten Bima', '84171', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(284, 22, 'Kota', 'Kota Bima', '84139', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(285, 22, 'Kabupaten', 'Kabupaten Dompu', '84217', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(286, 22, 'Kabupaten', 'Kabupaten Lombok Barat', '83311', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(287, 22, 'Kabupaten', 'Kabupaten Lombok Tengah', '83511', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(288, 22, 'Kabupaten', 'Kabupaten Lombok Timur', '83612', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(289, 22, 'Kabupaten', 'Kabupaten Lombok Utara', '83711', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(290, 22, 'Kota', 'Kota Mataram', '83131', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(291, 22, 'Kabupaten', 'Kabupaten Sumbawa', '84315', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(292, 22, 'Kabupaten', 'Kabupaten Sumbawa Barat', '84419', '2024-10-15 07:52:21', '2024-10-15 07:52:21'),
(293, 23, 'Kabupaten', 'Kabupaten Alor', '85811', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(294, 23, 'Kabupaten', 'Kabupaten Belu', '85711', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(295, 23, 'Kabupaten', 'Kabupaten Ende', '86351', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(296, 23, 'Kabupaten', 'Kabupaten Flores Timur', '86213', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(297, 23, 'Kabupaten', 'Kabupaten Kupang', '85362', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(298, 23, 'Kota', 'Kota Kupang', '85119', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(299, 23, 'Kabupaten', 'Kabupaten Lembata', '86611', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(300, 23, 'Kabupaten', 'Kabupaten Manggarai', '86551', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(301, 23, 'Kabupaten', 'Kabupaten Manggarai Barat', '86711', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(302, 23, 'Kabupaten', 'Kabupaten Manggarai Timur', '86811', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(303, 23, 'Kabupaten', 'Kabupaten Nagekeo', '86911', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(304, 23, 'Kabupaten', 'Kabupaten Ngada', '86413', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(305, 23, 'Kabupaten', 'Kabupaten Rote Ndao', '85982', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(306, 23, 'Kabupaten', 'Kabupaten Sabu Raijua', '85391', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(307, 23, 'Kabupaten', 'Kabupaten Sikka', '86121', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(308, 23, 'Kabupaten', 'Kabupaten Sumba Barat', '87219', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(309, 23, 'Kabupaten', 'Kabupaten Sumba Barat Daya', '87453', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(310, 23, 'Kabupaten', 'Kabupaten Sumba Tengah', '87358', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(311, 23, 'Kabupaten', 'Kabupaten Sumba Timur', '87112', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(312, 23, 'Kabupaten', 'Kabupaten Timor Tengah Selatan', '85562', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(313, 23, 'Kabupaten', 'Kabupaten Timor Tengah Utara', '85612', '2024-10-15 07:52:22', '2024-10-15 07:52:22'),
(314, 24, 'Kabupaten', 'Kabupaten Asmat', '99777', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(315, 24, 'Kabupaten', 'Kabupaten Biak Numfor', '98119', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(316, 24, 'Kabupaten', 'Kabupaten Boven Digoel', '99662', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(317, 24, 'Kabupaten', 'Kabupaten Deiyai (Deliyai)', '98784', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(318, 24, 'Kabupaten', 'Kabupaten Dogiyai', '98866', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(319, 24, 'Kabupaten', 'Kabupaten Intan Jaya', '98771', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(320, 24, 'Kabupaten', 'Kabupaten Jayapura', '99352', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(321, 24, 'Kota', 'Kota Jayapura', '99114', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(322, 24, 'Kabupaten', 'Kabupaten Jayawijaya', '99511', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(323, 24, 'Kabupaten', 'Kabupaten Keerom', '99461', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(324, 24, 'Kabupaten', 'Kabupaten Kepulauan Yapen (Yapen Waropen)', '98211', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(325, 24, 'Kabupaten', 'Kabupaten Lanny Jaya', '99531', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(326, 24, 'Kabupaten', 'Kabupaten Mamberamo Raya', '99381', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(327, 24, 'Kabupaten', 'Kabupaten Mamberamo Tengah', '99553', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(328, 24, 'Kabupaten', 'Kabupaten Mappi', '99853', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(329, 24, 'Kabupaten', 'Kabupaten Merauke', '99613', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(330, 24, 'Kabupaten', 'Kabupaten Mimika', '99962', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(331, 24, 'Kabupaten', 'Kabupaten Nabire', '98816', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(332, 24, 'Kabupaten', 'Kabupaten Nduga', '99541', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(333, 24, 'Kabupaten', 'Kabupaten Paniai', '98765', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(334, 24, 'Kabupaten', 'Kabupaten Pegunungan Bintang', '99573', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(335, 24, 'Kabupaten', 'Kabupaten Puncak', '98981', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(336, 24, 'Kabupaten', 'Kabupaten Puncak Jaya', '98979', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(337, 24, 'Kabupaten', 'Kabupaten Sarmi', '99373', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(338, 24, 'Kabupaten', 'Kabupaten Supiori', '98164', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(339, 24, 'Kabupaten', 'Kabupaten Tolikara', '99411', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(340, 24, 'Kabupaten', 'Kabupaten Waropen', '98269', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(341, 24, 'Kabupaten', 'Kabupaten Yahukimo', '99041', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(342, 24, 'Kabupaten', 'Kabupaten Yalimo', '99481', '2024-10-15 07:52:23', '2024-10-15 07:52:23'),
(343, 25, 'Kabupaten', 'Kabupaten Fakfak', '98651', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(344, 25, 'Kabupaten', 'Kabupaten Kaimana', '98671', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(345, 25, 'Kabupaten', 'Kabupaten Manokwari', '98311', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(346, 25, 'Kabupaten', 'Kabupaten Manokwari Selatan', '98355', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(347, 25, 'Kabupaten', 'Kabupaten Maybrat', '98051', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(348, 25, 'Kabupaten', 'Kabupaten Pegunungan Arfak', '98354', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(349, 25, 'Kabupaten', 'Kabupaten Raja Ampat', '98489', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(350, 25, 'Kabupaten', 'Kabupaten Sorong', '98431', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(351, 25, 'Kota', 'Kota Sorong', '98411', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(352, 25, 'Kabupaten', 'Kabupaten Sorong Selatan', '98454', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(353, 25, 'Kabupaten', 'Kabupaten Tambrauw', '98475', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(354, 25, 'Kabupaten', 'Kabupaten Teluk Bintuni', '98551', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(355, 25, 'Kabupaten', 'Kabupaten Teluk Wondama', '98591', '2024-10-15 07:52:24', '2024-10-15 07:52:24'),
(356, 26, 'Kabupaten', 'Kabupaten Bengkalis', '28719', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(357, 26, 'Kota', 'Kota Dumai', '28811', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(358, 26, 'Kabupaten', 'Kabupaten Indragiri Hilir', '29212', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(359, 26, 'Kabupaten', 'Kabupaten Indragiri Hulu', '29319', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(360, 26, 'Kabupaten', 'Kabupaten Kampar', '28411', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(361, 26, 'Kabupaten', 'Kabupaten Kepulauan Meranti', '28791', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(362, 26, 'Kabupaten', 'Kabupaten Kuantan Singingi', '29519', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(363, 26, 'Kota', 'Kota Pekanbaru', '28112', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(364, 26, 'Kabupaten', 'Kabupaten Pelalawan', '28311', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(365, 26, 'Kabupaten', 'Kabupaten Rokan Hilir', '28992', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(366, 26, 'Kabupaten', 'Kabupaten Rokan Hulu', '28511', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(367, 26, 'Kabupaten', 'Kabupaten Siak', '28623', '2024-10-15 07:52:26', '2024-10-15 07:52:26'),
(368, 27, 'Kabupaten', 'Kabupaten Majene', '91411', '2024-10-15 07:52:27', '2024-10-15 07:52:27'),
(369, 27, 'Kabupaten', 'Kabupaten Mamasa', '91362', '2024-10-15 07:52:27', '2024-10-15 07:52:27'),
(370, 27, 'Kabupaten', 'Kabupaten Mamuju', '91519', '2024-10-15 07:52:27', '2024-10-15 07:52:27'),
(371, 27, 'Kabupaten', 'Kabupaten Mamuju Utara', '91571', '2024-10-15 07:52:27', '2024-10-15 07:52:27'),
(372, 27, 'Kabupaten', 'Kabupaten Polewali Mandar', '91311', '2024-10-15 07:52:27', '2024-10-15 07:52:27'),
(373, 28, 'Kabupaten', 'Kabupaten Bantaeng', '92411', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(374, 28, 'Kabupaten', 'Kabupaten Barru', '90719', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(375, 28, 'Kabupaten', 'Kabupaten Bone', '92713', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(376, 28, 'Kabupaten', 'Kabupaten Bulukumba', '92511', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(377, 28, 'Kabupaten', 'Kabupaten Enrekang', '91719', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(378, 28, 'Kabupaten', 'Kabupaten Gowa', '92111', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(379, 28, 'Kabupaten', 'Kabupaten Jeneponto', '92319', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(380, 28, 'Kabupaten', 'Kabupaten Luwu', '91994', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(381, 28, 'Kabupaten', 'Kabupaten Luwu Timur', '92981', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(382, 28, 'Kabupaten', 'Kabupaten Luwu Utara', '92911', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(383, 28, 'Kota', 'Kota Makassar', '90111', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(384, 28, 'Kabupaten', 'Kabupaten Maros', '90511', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(385, 28, 'Kota', 'Kota Palopo', '91911', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(386, 28, 'Kabupaten', 'Kabupaten Pangkajene Kepulauan', '90611', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(387, 28, 'Kota', 'Kota Parepare', '91123', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(388, 28, 'Kabupaten', 'Kabupaten Pinrang', '91251', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(389, 28, 'Kabupaten', 'Kabupaten Selayar (Kepulauan Selayar)', '92812', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(390, 28, 'Kabupaten', 'Kabupaten Sidenreng Rappang/Rapang', '91613', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(391, 28, 'Kabupaten', 'Kabupaten Sinjai', '92615', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(392, 28, 'Kabupaten', 'Kabupaten Soppeng', '90812', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(393, 28, 'Kabupaten', 'Kabupaten Takalar', '92212', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(394, 28, 'Kabupaten', 'Kabupaten Tana Toraja', '91819', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(395, 28, 'Kabupaten', 'Kabupaten Toraja Utara', '91831', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(396, 28, 'Kabupaten', 'Kabupaten Wajo', '90911', '2024-10-15 07:52:28', '2024-10-15 07:52:28'),
(397, 29, 'Kabupaten', 'Kabupaten Banggai', '94711', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(398, 29, 'Kabupaten', 'Kabupaten Banggai Kepulauan', '94881', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(399, 29, 'Kabupaten', 'Kabupaten Buol', '94564', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(400, 29, 'Kabupaten', 'Kabupaten Donggala', '94341', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(401, 29, 'Kabupaten', 'Kabupaten Morowali', '94911', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(402, 29, 'Kota', 'Kota Palu', '94111', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(403, 29, 'Kabupaten', 'Kabupaten Parigi Moutong', '94411', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(404, 29, 'Kabupaten', 'Kabupaten Poso', '94615', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(405, 29, 'Kabupaten', 'Kabupaten Sigi', '94364', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(406, 29, 'Kabupaten', 'Kabupaten Tojo Una-Una', '94683', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(407, 29, 'Kabupaten', 'Kabupaten Toli-Toli', '94542', '2024-10-15 07:52:30', '2024-10-15 07:52:30'),
(408, 30, 'Kota', 'Kota Bau-Bau', '93719', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(409, 30, 'Kabupaten', 'Kabupaten Bombana', '93771', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(410, 30, 'Kabupaten', 'Kabupaten Buton', '93754', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(411, 30, 'Kabupaten', 'Kabupaten Buton Utara', '93745', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(412, 30, 'Kota', 'Kota Kendari', '93126', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(413, 30, 'Kabupaten', 'Kabupaten Kolaka', '93511', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(414, 30, 'Kabupaten', 'Kabupaten Kolaka Utara', '93911', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(415, 30, 'Kabupaten', 'Kabupaten Konawe', '93411', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(416, 30, 'Kabupaten', 'Kabupaten Konawe Selatan', '93811', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(417, 30, 'Kabupaten', 'Kabupaten Konawe Utara', '93311', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(418, 30, 'Kabupaten', 'Kabupaten Muna', '93611', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(419, 30, 'Kabupaten', 'Kabupaten Wakatobi', '93791', '2024-10-15 07:52:31', '2024-10-15 07:52:31'),
(420, 31, 'Kota', 'Kota Bitung', '95512', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(421, 31, 'Kabupaten', 'Kabupaten Bolaang Mongondow (Bolmong)', '95755', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(422, 31, 'Kabupaten', 'Kabupaten Bolaang Mongondow Selatan', '95774', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(423, 31, 'Kabupaten', 'Kabupaten Bolaang Mongondow Timur', '95783', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(424, 31, 'Kabupaten', 'Kabupaten Bolaang Mongondow Utara', '95765', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(425, 31, 'Kabupaten', 'Kabupaten Kepulauan Sangihe', '95819', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(426, 31, 'Kabupaten', 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(427, 31, 'Kabupaten', 'Kabupaten Kepulauan Talaud', '95885', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(428, 31, 'Kota', 'Kota Kotamobagu', '95711', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(429, 31, 'Kota', 'Kota Manado', '95247', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(430, 31, 'Kabupaten', 'Kabupaten Minahasa', '95614', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(431, 31, 'Kabupaten', 'Kabupaten Minahasa Selatan', '95914', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(432, 31, 'Kabupaten', 'Kabupaten Minahasa Tenggara', '95995', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(433, 31, 'Kabupaten', 'Kabupaten Minahasa Utara', '95316', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(434, 31, 'Kota', 'Kota Tomohon', '95416', '2024-10-15 07:52:32', '2024-10-15 07:52:32'),
(435, 32, 'Kabupaten', 'Kabupaten Agam', '26411', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(436, 32, 'Kota', 'Kota Bukittinggi', '26115', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(437, 32, 'Kabupaten', 'Kabupaten Dharmasraya', '27612', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(438, 32, 'Kabupaten', 'Kabupaten Kepulauan Mentawai', '25771', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(439, 32, 'Kabupaten', 'Kabupaten Lima Puluh Koto/Kota', '26671', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(440, 32, 'Kota', 'Kota Padang', '25112', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(441, 32, 'Kota', 'Kota Padang Panjang', '27122', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(442, 32, 'Kabupaten', 'Kabupaten Padang Pariaman', '25583', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(443, 32, 'Kota', 'Kota Pariaman', '25511', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(444, 32, 'Kabupaten', 'Kabupaten Pasaman', '26318', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(445, 32, 'Kabupaten', 'Kabupaten Pasaman Barat', '26511', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(446, 32, 'Kota', 'Kota Payakumbuh', '26213', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(447, 32, 'Kabupaten', 'Kabupaten Pesisir Selatan', '25611', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(448, 32, 'Kota', 'Kota Sawah Lunto', '27416', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(449, 32, 'Kabupaten', 'Kabupaten Sijunjung (Sawah Lunto Sijunjung)', '27511', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(450, 32, 'Kabupaten', 'Kabupaten Solok', '27365', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(451, 32, 'Kota', 'Kota Solok', '27315', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(452, 32, 'Kabupaten', 'Kabupaten Solok Selatan', '27779', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(453, 32, 'Kabupaten', 'Kabupaten Tanah Datar', '27211', '2024-10-15 07:52:33', '2024-10-15 07:52:33'),
(454, 33, 'Kabupaten', 'Kabupaten Banyuasin', '30911', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(455, 33, 'Kabupaten', 'Kabupaten Empat Lawang', '31811', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(456, 33, 'Kabupaten', 'Kabupaten Lahat', '31419', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(457, 33, 'Kota', 'Kota Lubuk Linggau', '31614', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(458, 33, 'Kabupaten', 'Kabupaten Muara Enim', '31315', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(459, 33, 'Kabupaten', 'Kabupaten Musi Banyuasin', '30719', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(460, 33, 'Kabupaten', 'Kabupaten Musi Rawas', '31661', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(461, 33, 'Kabupaten', 'Kabupaten Ogan Ilir', '30811', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(462, 33, 'Kabupaten', 'Kabupaten Ogan Komering Ilir', '30618', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(463, 33, 'Kabupaten', 'Kabupaten Ogan Komering Ulu', '32112', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(464, 33, 'Kabupaten', 'Kabupaten Ogan Komering Ulu Selatan', '32211', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(465, 33, 'Kabupaten', 'Kabupaten Ogan Komering Ulu Timur', '32312', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(466, 33, 'Kota', 'Kota Pagar Alam', '31512', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(467, 33, 'Kota', 'Kota Palembang', '30111', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(468, 33, 'Kota', 'Kota Prabumulih', '31121', '2024-10-15 07:52:35', '2024-10-15 07:52:35'),
(469, 34, 'Kabupaten', 'Kabupaten Asahan', '21214', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(470, 34, 'Kabupaten', 'Kabupaten Batu Bara', '21655', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(471, 34, 'Kota', 'Kota Binjai', '20712', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(472, 34, 'Kabupaten', 'Kabupaten Dairi', '22211', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(473, 34, 'Kabupaten', 'Kabupaten Deli Serdang', '20511', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(474, 34, 'Kota', 'Kota Gunungsitoli', '22813', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(475, 34, 'Kabupaten', 'Kabupaten Humbang Hasundutan', '22457', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(476, 34, 'Kabupaten', 'Kabupaten Karo', '22119', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(477, 34, 'Kabupaten', 'Kabupaten Labuhan Batu', '21412', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(478, 34, 'Kabupaten', 'Kabupaten Labuhan Batu Selatan', '21511', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(479, 34, 'Kabupaten', 'Kabupaten Labuhan Batu Utara', '21711', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(480, 34, 'Kabupaten', 'Kabupaten Langkat', '20811', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(481, 34, 'Kabupaten', 'Kabupaten Mandailing Natal', '22916', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(482, 34, 'Kota', 'Kota Medan', '20228', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(483, 34, 'Kabupaten', 'Kabupaten Nias', '22876', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(484, 34, 'Kabupaten', 'Kabupaten Nias Barat', '22895', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(485, 34, 'Kabupaten', 'Kabupaten Nias Selatan', '22865', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(486, 34, 'Kabupaten', 'Kabupaten Nias Utara', '22856', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(487, 34, 'Kabupaten', 'Kabupaten Padang Lawas', '22763', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(488, 34, 'Kabupaten', 'Kabupaten Padang Lawas Utara', '22753', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(489, 34, 'Kota', 'Kota Padang Sidempuan', '22727', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(490, 34, 'Kabupaten', 'Kabupaten Pakpak Bharat', '22272', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(491, 34, 'Kota', 'Kota Pematang Siantar', '21126', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(492, 34, 'Kabupaten', 'Kabupaten Samosir', '22392', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(493, 34, 'Kabupaten', 'Kabupaten Serdang Bedagai', '20915', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(494, 34, 'Kota', 'Kota Sibolga', '22522', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(495, 34, 'Kabupaten', 'Kabupaten Simalungun', '21162', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(496, 34, 'Kota', 'Kota Tanjung Balai', '21321', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(497, 34, 'Kabupaten', 'Kabupaten Tapanuli Selatan', '22742', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(498, 34, 'Kabupaten', 'Kabupaten Tapanuli Tengah', '22611', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(499, 34, 'Kabupaten', 'Kabupaten Tapanuli Utara', '22414', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(500, 34, 'Kota', 'Kota Tebing Tinggi', '20632', '2024-10-15 07:52:36', '2024-10-15 07:52:36'),
(501, 34, 'Kabupaten', 'Kabupaten Toba Samosir', '22316', '2024-10-15 07:52:36', '2024-10-15 07:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `bike_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `quantity`, `bike_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-10-08 20:36:26', '2024-10-08 20:36:26'),
(2, 1, 2, 2, '2024-10-15 09:21:47', '2024-10-15 09:21:47'),
(3, 2, 1, 3, '2024-10-23 14:36:11', '2024-10-23 14:36:11'),
(4, 1, 4, 3, '2024-10-23 14:36:11', '2024-10-23 14:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_13_232909_add_fields_to_users_table', 1),
(7, '2023_03_13_235515_add_bikes_table', 1),
(8, '2023_03_14_000834_add_reviews_table', 1),
(9, '2023_03_14_003805_add_orders_table', 1),
(10, '2023_03_14_004215_add_items_table', 1),
(11, '2023_03_14_004532_add_parts_table', 1),
(12, '2023_03_14_010620_add_assemblys_table', 1),
(13, '2024_10_13_200619_create_banks_table', 2),
(14, '2024_10_15_143624_create_provinces_table', 3),
(15, '2024_10_15_143630_create_cities_table', 3),
(16, '2024_10_23_090054_create_whishlists_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `jasa_kirim` varchar(191) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_image` varchar(191) DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `payment_notes` text DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `resi` varchar(191) DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `ongkir`, `jasa_kirim`, `address`, `user_id`, `payment_image`, `payment_status`, `payment_notes`, `payment_date`, `resi`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 200000, 2000, NULL, 'surabaya', 2, 'images/product/transfers/f8TPEP6oxoBDN6aSuLxbpCTlrqKZFr76IC9I2trW.jpg', 2, NULL, NULL, NULL, 2, '2024-10-08 20:36:25', '2024-10-21 12:54:40'),
(2, 500000, 615000, 'jne - JTR', 'surabaya', 2, NULL, 0, NULL, NULL, NULL, 0, '2024-10-15 09:21:47', '2024-10-15 09:21:47'),
(3, 536000, 615000, 'jne - JTR', 'surabaya', 2, NULL, 0, NULL, NULL, NULL, 0, '2024-10-23 14:36:11', '2024-10-23 14:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bali', '2024-10-15 07:51:48', '2024-10-15 07:51:48'),
(2, 'Bangka Belitung', '2024-10-15 07:51:48', '2024-10-15 07:51:48'),
(3, 'Banten', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(4, 'Bengkulu', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(5, 'DI Yogyakarta', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(6, 'DKI Jakarta', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(7, 'Gorontalo', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(8, 'Jambi', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(9, 'Jawa Barat', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(10, 'Jawa Tengah', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(11, 'Jawa Timur', '2024-10-15 07:51:49', '2024-10-15 07:51:49'),
(12, 'Kalimantan Barat', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(13, 'Kalimantan Selatan', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(14, 'Kalimantan Tengah', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(15, 'Kalimantan Timur', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(16, 'Kalimantan Utara', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(17, 'Kepulauan Riau', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(18, 'Lampung', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(19, 'Maluku', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(20, 'Maluku Utara', '2024-10-15 07:51:50', '2024-10-15 07:51:50'),
(21, 'Nanggroe Aceh Darussalam (NAD)', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(22, 'Nusa Tenggara Barat (NTB)', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(23, 'Nusa Tenggara Timur (NTT)', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(24, 'Papua', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(25, 'Papua Barat', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(26, 'Riau', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(27, 'Sulawesi Barat', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(28, 'Sulawesi Selatan', '2024-10-15 07:51:51', '2024-10-15 07:51:51'),
(29, 'Sulawesi Tengah', '2024-10-15 07:51:52', '2024-10-15 07:51:52'),
(30, 'Sulawesi Tenggara', '2024-10-15 07:51:52', '2024-10-15 07:51:52'),
(31, 'Sulawesi Utara', '2024-10-15 07:51:52', '2024-10-15 07:51:52'),
(32, 'Sumatera Barat', '2024-10-15 07:51:52', '2024-10-15 07:51:52'),
(33, 'Sumatera Selatan', '2024-10-15 07:51:52', '2024-10-15 07:51:52'),
(34, 'Sumatera Utara', '2024-10-15 07:51:52', '2024-10-15 07:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bike_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `stars`, `description`, `user_id`, `bike_id`, `created_at`, `updated_at`) VALUES
(2, 4, 'test', 2, 1, '2024-10-23 05:47:49', '2024-10-23 05:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT '-',
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `address`, `phone`, `balance`) VALUES
(1, 'admin', 'admin@example.com', '2024-10-07 12:14:04', '$2y$10$Xk53Vc2MQjF.8JMZH2wmueDS.UUbQ0UGrPuvtHoD7np3x9CSSCivC', NULL, NULL, NULL, 'admin', '', '-', 0),
(2, 'user', 'user@example.com', NULL, '$2y$10$oX5VTpcil5ef4Ez7Zv14Iuf/Rd8Z7eVEhrXW89TRqjxMpULMCb/i.', NULL, '2024-10-08 20:31:19', '2024-10-08 20:31:19', 'user', 'surabaya', '-', 1000),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$bBuvf7Htvdxr9YXcjEyK4uBP75S73syZKqPl.jwJ/VKPbtNbEN7ae', NULL, '2024-10-16 01:37:14', '2024-10-16 01:37:14', 'user', 'surabaya', '-', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `whishlists`
--

CREATE TABLE `whishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `bikeid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whishlists`
--

INSERT INTO `whishlists` (`id`, `userid`, `bikeid`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-10-23 02:41:08', '2024-10-23 02:41:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assemblies`
--
ALTER TABLE `assemblies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assemblies_bike_id_foreign` (`bike_id`),
  ADD KEY `assemblies_part_id_foreign` (`part_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bikes_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_bike_id_foreign` (`bike_id`),
  ADD KEY `items_order_id_foreign` (`order_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_bike_id_foreign` (`bike_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whishlists`
--
ALTER TABLE `whishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assemblies`
--
ALTER TABLE `assemblies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whishlists`
--
ALTER TABLE `whishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assemblies`
--
ALTER TABLE `assemblies`
  ADD CONSTRAINT `assemblies_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `assemblies_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`);

--
-- Constraints for table `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
