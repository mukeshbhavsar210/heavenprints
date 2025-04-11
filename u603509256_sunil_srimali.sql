-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2025 at 04:59 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u603509256_sunil_srimali`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `banner_slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` varchar(255) NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `banner_slug`, `description`, `image`, `status`, `showHome`, `created_at`, `updated_at`) VALUES
(36, 'Neon light', 'neon-light', NULL, 'neon-light.jpg', 1, 'Yes', '2025-04-04 18:24:35', '2025-04-04 18:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_protected` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `showHome`, `is_protected`, `created_at`, `updated_at`) VALUES
(266, 'Customize', 'customize', 'frames_1743502249.jpg', 1, 'Yes', 1, '2025-03-25 04:17:06', '2025-04-07 11:35:26'),
(296, 'NEON', 'neon', 'neon_1743494673.jpeg', 1, 'Yes', 1, '2025-03-27 08:56:31', '2025-04-01 08:04:33'),
(297, 'Shop', 'shop', 'shop_1743494716.jpg', 1, 'Yes', 0, '2025-03-30 06:08:40', '2025-04-01 08:05:16'),
(298, 'T-shirt', 't-shirt', 't-shirt_1743494593.png', 1, 'Yes', 0, '2025-04-01 06:39:43', '2025-04-01 08:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `show` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `show`, `created_at`, `updated_at`) VALUES
(3, 'Blue', '#002aff', 'Yes', '2025-04-02 00:09:07', '2025-04-02 00:09:07'),
(4, 'Black', '#000000', 'Yes', '2025-04-02 00:10:06', '2025-04-02 00:10:06'),
(5, 'Green', '#00b815', 'Yes', '2025-04-02 00:10:18', '2025-04-02 00:10:18'),
(6, 'Orange', '#d67d00', 'Yes', '2025-04-02 00:10:31', '2025-04-02 00:10:31'),
(7, 'Red', '#ff0000', 'Yes', '2025-04-02 06:07:03', '2025-04-02 06:07:03'),
(8, 'Grey', '#8f8f8f', 'Yes', '2025-04-02 06:07:29', '2025-04-02 06:07:29'),
(9, 'Light Green', '#63fdb5', 'Yes', '2025-04-05 15:45:39', '2025-04-05 15:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', 'GJ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `mobile`, `email`, `country_id`, `address`, `apartment`, `city`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(9, 30, 'Mukesh', 'Bhavsar', '09978835005', 'mukeshbhavsar210@gmail.com', 1, 'Keerthi Royal Palms,', NULL, 'Banglore', '560100', 'I want ', '2025-03-26 23:38:23', '2025-03-29 08:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `custom_totals`
--

CREATE TABLE `custom_totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `shape` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `total` varchar(255) NOT NULL,
  `custom_size_1` varchar(100) DEFAULT NULL,
  `custom_size_2` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_totals`
--

INSERT INTO `custom_totals` (`id`, `product_id`, `name`, `shape`, `size`, `total`, `custom_size_1`, `custom_size_2`, `created_at`, `updated_at`) VALUES
(49, 527, 'Canvas', 'Small', '16x16', '979.00', NULL, NULL, '2025-04-07 13:22:07', '2025-04-07 13:22:07'),
(50, 526, NULL, 'Rectangle', NULL, '936.00', NULL, NULL, '2025-04-07 13:22:16', '2025-04-07 13:22:16'),
(52, 524, NULL, 'Rectangle', '10\" x 10\"', '2172.00', NULL, NULL, '2025-04-07 15:24:52', '2025-04-07 15:24:52'),
(53, 525, NULL, 'Square', '10\" x 10\"', '955.00', NULL, NULL, '2025-04-08 04:56:21', '2025-04-08 04:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `max_uses` varchar(255) DEFAULT NULL,
  `max_uses_user` varchar(255) DEFAULT NULL,
  `type` enum('percent','fixed') NOT NULL DEFAULT 'fixed',
  `discount_amount` double(10,2) NOT NULL,
  `min_amount` double(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `starts_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `frame_materials`
--

CREATE TABLE `frame_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `show` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_materials`
--

INSERT INTO `frame_materials` (`id`, `name`, `show`, `created_at`, `updated_at`) VALUES
(4, 'Canvas', 'Yes', '2025-04-01 23:25:22', '2025-04-01 23:25:22'),
(5, 'Acrylic', 'Yes', '2025-04-01 23:25:42', '2025-04-01 23:25:42'),
(6, 'Metal', 'Yes', '2025-04-01 23:26:50', '2025-04-01 23:26:50'),
(7, 'Wood', 'Yes', '2025-04-01 23:26:56', '2025-04-01 23:26:56'),
(8, 'Others', 'Yes', '2025-04-01 23:27:01', '2025-04-01 23:27:01'),
(9, 'Synthetic', 'Yes', '2025-04-02 06:08:36', '2025-04-02 06:08:36');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_18_051106_alter_users_table', 2),
(6, '2023_11_20_052052_create_categories_table', 3),
(7, '2023_11_20_091142_create_temp_images_table', 4),
(8, '2023_11_20_123339_create_sub_categories_table', 5),
(9, '2023_11_21_045811_create_brands_table', 6),
(10, '2023_11_21_063746_create_products_table', 7),
(11, '2023_11_21_063811_create_product_images_table', 7),
(12, '2023_11_23_101727_alter_categories_table', 8),
(13, '2023_11_23_102759_alter_products_table', 9),
(14, '2023_11_23_103442_alter_sub_categories_table', 10),
(15, '2023_11_24_064315_alter_products_table', 11),
(16, '2023_11_25_072939_create_countries_table', 12),
(17, '2023_11_25_075119_create_orders_table', 13),
(18, '2023_11_25_075155_create_orders_items_table', 13),
(19, '2023_11_25_075250_create_customer_addresses_table', 13),
(20, '2023_11_25_135444_create_shipping_charges_table', 14),
(21, '2023_11_28_090521_create_discount_coupons_table', 15),
(22, '2023_11_28_091637_create_discount_coupons_table', 16),
(23, '2023_11_28_091724_create_discount_coupons_table', 17),
(24, '2023_11_28_092025_create_discount_coupons_table', 18),
(25, '2023_11_28_092115_create_discount_coupons_table', 19),
(26, '2023_11_28_092301_create_discount_coupons_table', 20),
(27, '2023_11_29_084104_alter_orders_table', 21),
(28, '2023_11_29_104758_alter_orders_table', 22),
(29, '2023_11_30_051729_create_wishlists_table', 23),
(30, '2023_12_01_060717_alter_users_table', 24),
(31, '2023_12_01_072404_create_pages_table', 25),
(32, '2023_12_02_111056_create_product_ratings_table', 26),
(33, '2023_12_29_074318_create_payments_table', 27),
(34, '2025_01_15_105251_create_sessions_table', 28),
(35, '2025_02_17_052639_create_role_has_permissions_table', 29),
(36, '2025_02_20_110016_create_states_table', 30),
(37, '2025_02_23_120621_create_neon_products_table', 31),
(38, '2025_02_25_050013_create_frame_sizes_table', 32),
(39, '2025_02_25_050601_create_frame_shapes_table', 33),
(40, '2025_02_25_092227_create_frame_wraps_table', 34),
(41, '2025_02_27_093604_create_generated_svgs_table', 35),
(42, '2025_02_27_100638_create_generated_svgs_table', 36),
(43, '2025_02_27_100813_create_svgs_table', 37),
(44, '2025_03_05_074717_create_svg_customizations_table', 37),
(45, '2025_03_05_075806_create_image_edits_table', 38),
(46, '2025_03_05_093247_create_images_table', 39),
(47, '2025_03_05_093935_create_frame_orders_table', 40),
(48, '2025_03_06_054651_create_frame_orders_table', 41),
(49, '2025_03_06_110409_create_frame_borders_table', 42),
(50, '2025_03_06_125835_create_frame_frames_table', 43),
(51, '2025_03_06_142859_create_hardware_style_datas_table', 44),
(52, '2025_03_06_142935_create_hardware_display_datas_table', 44),
(53, '2025_03_06_143003_create_hardware_finishing_datas_table', 44),
(54, '2025_03_08_105709_create_laminations_table', 45),
(55, '2025_03_08_111532_create_modifications_table', 46),
(56, '2025_03_11_092744_create_payments_table', 47),
(57, '2025_03_11_131139_create_new_payments_table', 48),
(58, '2025_03_11_143013_create_payments_table', 49),
(59, '2025_03_12_102735_create_payments_table', 50),
(60, '2025_03_12_104429_create_payments_table', 51),
(61, '2025_03_12_114935_create_temp_orders_table', 52),
(62, '2025_03_21_072404_create_frame_metals_table', 53),
(63, '2025_03_22_073610_create_settings_table', 54),
(64, '2025_03_23_091739_create_banner_images_table', 55),
(65, '2025_03_23_112712_create_banners_table', 56),
(66, '2025_03_24_095711_create_banners_table', 57),
(67, '2025_03_27_045916_create_countries_table', 58),
(68, '2025_03_28_084007_create_sample_products_table', 59),
(69, '2025_03_31_064152_create_password_resets_table', 60);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 4),
(7, 'App\\Models\\User', 7),
(9, 'App\\Models\\User', 30);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` double(10,2) DEFAULT NULL,
  `shipping` double(10,2) DEFAULT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `coupon_code_id` int(11) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grandtotal` double(10,2) DEFAULT NULL,
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupon_code`, `coupon_code_id`, `discount`, `grandtotal`, `status`, `shipped_date`, `country_id`, `created_at`, `updated_at`) VALUES
(190, 30, 800.00, 50.00, '', NULL, 0.00, 850.00, 'pending', NULL, 1, '2025-03-26 23:38:23', '2025-03-26 23:38:23'),
(191, 30, 18000.00, 50.00, '', NULL, 0.00, 18050.00, 'pending', NULL, 1, '2025-03-27 08:24:19', '2025-03-27 08:24:19'),
(192, 30, 800.00, 50.00, '', NULL, 0.00, 850.00, 'pending', NULL, 1, '2025-03-27 08:25:00', '2025-03-27 08:25:00'),
(193, 30, 800.00, 50.00, '', NULL, 0.00, 850.00, 'pending', NULL, 1, '2025-03-27 08:27:40', '2025-03-27 08:27:40'),
(194, 30, 800.00, 50.00, '', NULL, 0.00, 850.00, 'pending', NULL, 1, '2025-03-27 08:30:39', '2025-03-27 08:30:39'),
(195, 30, 800.00, 50.00, '', NULL, 0.00, 850.00, 'pending', NULL, 1, '2025-03-27 08:32:27', '2025-03-27 08:32:27'),
(196, 30, 18000.00, 50.00, '', NULL, 0.00, 18050.00, 'pending', NULL, 1, '2025-03-27 08:37:04', '2025-03-27 08:37:04'),
(197, 30, 12000.00, 50.00, '', NULL, 0.00, 12050.00, 'pending', NULL, 1, '2025-03-27 08:39:18', '2025-03-27 08:39:18'),
(198, 30, 18000.00, 50.00, '', NULL, 0.00, 18050.00, 'pending', NULL, 1, '2025-03-27 08:51:02', '2025-03-27 08:51:02'),
(199, 30, 700.00, 50.00, '', NULL, 0.00, 750.00, 'pending', NULL, 1, '2025-03-27 22:36:12', '2025-03-27 22:36:12'),
(200, 30, 444.00, 50.00, '', NULL, 0.00, 494.00, 'pending', NULL, 1, '2025-03-27 22:36:51', '2025-03-27 22:36:51'),
(201, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-27 23:34:35', '2025-03-27 23:34:35'),
(202, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-27 23:39:29', '2025-03-27 23:39:29'),
(203, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-27 23:48:17', '2025-03-27 23:48:17'),
(204, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-27 23:58:48', '2025-03-27 23:58:48'),
(205, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-28 00:05:11', '2025-03-28 00:05:11'),
(206, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-28 00:06:47', '2025-03-28 00:06:47'),
(207, 30, 600.00, 50.00, '', NULL, 0.00, 650.00, 'pending', NULL, 1, '2025-03-28 01:10:44', '2025-03-28 01:10:44'),
(208, 30, 12000.00, 50.00, '', NULL, 0.00, 12050.00, 'pending', NULL, 1, '2025-03-29 07:39:56', '2025-03-29 07:39:56'),
(209, 30, 21003.00, 150.00, '', NULL, 0.00, 21153.00, 'pending', NULL, 1, '2025-03-29 08:39:54', '2025-03-29 08:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `font` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `frame` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `border` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `wrap_wrap` varchar(100) DEFAULT NULL,
  `hardware_style` varchar(100) DEFAULT NULL,
  `hardware_display` varchar(100) DEFAULT NULL,
  `lamination` varchar(100) DEFAULT NULL,
  `retouching` varchar(100) DEFAULT NULL,
  `hardware_finishing` varchar(100) DEFAULT NULL,
  `proof` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `category`, `font`, `size`, `color`, `frame`, `image`, `border`, `major`, `wrap_wrap`, `hardware_style`, `hardware_display`, `lamination`, `retouching`, `hardware_finishing`, `proof`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(92, 201, 395, 'Customize Neon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600.00, 600.00, '2025-03-27 23:34:35', '2025-03-27 23:34:35'),
(93, 202, 395, 'Customize Neon', 'NEON Light', 'Classic', 'Large', '#e31e24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600.00, 600.00, '2025-03-27 23:39:29', '2025-03-27 23:39:29'),
(94, 203, 395, 'Customize Neon', 'NEON Light', 'Robo', 'Large', '#62bed3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600.00, 600.00, '2025-03-27 23:48:17', '2025-03-27 23:48:17'),
(95, 204, 395, 'Customize Neon', 'NEON Light', 'Robo', 'Large', '#ffed00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600.00, 600.00, '2025-03-27 23:58:48', '2025-03-27 23:58:48'),
(96, 206, 395, 'Customize Neon', 'Kusum NEON', 'Passionate', 'Large', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600.00, 600.00, '2025-03-28 00:06:47', '2025-03-28 00:06:47'),
(97, 207, 395, 'Customize Neon', 'test - NEON', 'Robo', 'Large', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600.00, 600.00, '2025-03-28 01:10:44', '2025-03-28 01:10:44'),
(98, 208, 395, 'Customize Neon', 'Neon light', 'Passionate', 'Large', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 12000.00, 12000.00, '2025-03-29 07:39:56', '2025-03-29 07:39:56'),
(100, 209, 395, 'Customize Neon', 'Neon light', 'Robo', 'Large', '#ffed00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 12000.00, 12000.00, '2025-03-29 08:39:54', '2025-03-29 08:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `category`, `content`, `created_at`, `updated_at`) VALUES
(2, 'About us', 'about-us', 'about_us', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br></span><br></p>', '2023-12-01 03:33:50', '2023-12-01 03:33:50'),
(3, 'Contact', 'contact-us', 'about_us', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>\r\n                    <address>\r\n                    Mukesh Bhavsar<br>\r\n                    711-2880 Nulla St.<br>\r\n                    Mankato Mississippi 96522<br>\r\n                    <a href=\"tel:+xxxxxxxx\">(XXX) 555-2368</a><br>\r\n                    <a href=\"mailto:jim@rock.com\">jim@rock.com</a>\r\n                    </address>', '2023-12-01 03:44:47', '2024-11-20 23:54:11'),
(4, 'Terms', 'terms', 'about_us', '<p>terms</p>', '2023-12-27 08:59:35', '2023-12-27 08:59:35'),
(5, 'Refer and Earn', 'refer-and-earn', 'insrpiration', '<p>test</p>', '2025-03-28 01:56:33', '2025-03-28 01:56:33'),
(6, 'Pricing and Options', 'pricing-and-options', 'insrpiration', '<p>Test</p>', '2025-03-28 01:56:51', '2025-03-28 01:56:51'),
(7, 'Special Offers', 'special-offers', 'insrpiration', '<p>test</p>', '2025-03-28 01:57:05', '2025-03-28 01:57:05'),
(8, 'Photo Pillows', 'photo-pillows', 'products', '<p>test</p>', '2025-03-28 01:58:16', '2025-03-28 01:58:16'),
(9, 'Photo Calendars', 'photo-calendars', 'products', '<p>test</p>', '2025-03-28 01:58:32', '2025-03-28 01:58:32'),
(10, 'Photo Mug', 'photo-mug', 'products', '<p>test</p>', '2025-03-28 01:58:42', '2025-03-28 01:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mukeshbhavsar210@gmail.com', '$2y$10$KOCdmg/sqkWheKr..z1EnucsirxTcLRZfcidj9ttSoDZuLWLFyyIm', '2025-03-31 01:17:32');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `razorpay_payment_id` varchar(255) DEFAULT NULL,
  `razorpay_order_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'INR',
  `payment_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `product_id`, `razorpay_payment_id`, `razorpay_order_id`, `status`, `amount`, `currency`, `payment_data`, `created_at`, `updated_at`) VALUES
(107, 201, 395, 'pay_QC5Xt1aGp9CggT', 'order_QC5Xo1U8JuQGSn', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QC5Xt1aGp9CggT\\\",\\\"razorpay_order_id\\\":\\\"order_QC5Xo1U8JuQGSn\\\",\\\"razorpay_signature\\\":\\\"60e95b168c2cb8c07b6c697e3c501a714d346eda5755341b0074d61731e6f7d4\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-27 23:34:35', '2025-03-27 23:34:35'),
(108, 202, 395, 'pay_QC5d4VBw0VAK3S', 'order_QC5d0UfhKn3RmB', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QC5d4VBw0VAK3S\\\",\\\"razorpay_order_id\\\":\\\"order_QC5d0UfhKn3RmB\\\",\\\"razorpay_signature\\\":\\\"659553b9ca7f19132f3eb28c1f3e0df76f8631374e9c9e557c89a57b80096c95\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-27 23:39:29', '2025-03-27 23:39:29'),
(109, 203, 395, 'pay_QC5mNAEEJ5nwLv', 'order_QC5mJ36Nc1DL2n', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QC5mNAEEJ5nwLv\\\",\\\"razorpay_order_id\\\":\\\"order_QC5mJ36Nc1DL2n\\\",\\\"razorpay_signature\\\":\\\"91a6d36bb510d6c66fdfa9c099972f93937daec8d4374e4ade086335628ea276\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-27 23:48:17', '2025-03-27 23:48:17'),
(110, 204, 395, 'pay_QC5xTixYGcBXZL', 'order_QC5xOnz7m9Y0Wd', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QC5xTixYGcBXZL\\\",\\\"razorpay_order_id\\\":\\\"order_QC5xOnz7m9Y0Wd\\\",\\\"razorpay_signature\\\":\\\"4a3a21146ed0a5503becea6e96db18434a774b47198603206b44b9a061faf572\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-27 23:58:48', '2025-03-27 23:58:48'),
(111, 206, 395, 'pay_QC65uhURNKjTxS', 'order_QC65qsOcVWtPld', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QC65uhURNKjTxS\\\",\\\"razorpay_order_id\\\":\\\"order_QC65qsOcVWtPld\\\",\\\"razorpay_signature\\\":\\\"8ef5b158aa68bcf277148ff3e026276c050e604bde73ea602a614051c5dfc1b2\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-28 00:06:47', '2025-03-28 00:06:47'),
(112, 207, 395, 'pay_QC7BSqB5HVfDhK', 'order_QC7BLskGu4nkNg', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QC7BSqB5HVfDhK\\\",\\\"razorpay_order_id\\\":\\\"order_QC7BLskGu4nkNg\\\",\\\"razorpay_signature\\\":\\\"6b6d50c3fae3c4d380fc5b7a4fb4df0cff3824016ff85e275bf56c5c80fdec6f\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-28 01:10:44', '2025-03-28 01:10:44'),
(113, 208, 395, 'pay_QCcLgaHh0cu8wu', 'order_QCcLZj9m0l02lM', 'Paid', 12000.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QCcLgaHh0cu8wu\\\",\\\"razorpay_order_id\\\":\\\"order_QCcLZj9m0l02lM\\\",\\\"razorpay_signature\\\":\\\"bc3f44ddf7dc9b5054084bc9df5ebaa8129c54d10562659c074c6dc6ec3d27d1\\\",\\\"amount\\\":1200000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-03-29 07:39:56', '2025-03-29 07:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(21, 'Create user', 'admin', '2025-02-16 23:55:15', '2025-02-17 01:19:00'),
(25, 'Edit users', 'admin', '2025-02-17 01:53:08', '2025-02-17 01:53:08'),
(26, 'Create category', 'admin', '2025-02-17 01:53:24', '2025-02-17 01:53:24');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT 'default',
  `product_type` enum('Default','Customize','Neon') DEFAULT 'Default',
  `metal_type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `width` varchar(100) DEFAULT NULL,
  `font` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `related_products` text DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `compare_price` double(10,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sku` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `track_qty` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `qty` int(11) DEFAULT 5,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `product_type`, `metal_type`, `size`, `sizes`, `color`, `colors`, `height`, `width`, `font`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(395, 'Customize Neon', 'customize-neon', 'Neon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Test2</p>', 'test', 'test', '', 600.00, NULL, 296, 57, NULL, 'Yes', 'woodframe_001', NULL, 'Yes', 92, 1, '2025-03-26 09:55:53', '2025-04-02 08:23:33'),
(509, 'Personlized Mug', 'personlized-mug', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<div class=\"LT6XE\" style=\"display: flow-root; overflow-y: clip; position: relative; overflow-wrap: break-word; max-width: 632px; min-width: 0px; flex: 1 1 0%; color: rgb(0, 29, 53); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 18px;\"><div jsname=\"dvXlsc\" class=\"f5cPye\" data-rl=\"en\" data-lht=\"658\" style=\"letter-spacing: var(--m3t13);\"><div><div class=\"WaaZC\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><div class=\"rPeykc uP58nb\" data-hveid=\"CAwQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQo_EKegQIDBAB\" style=\"margin: 20px 0px 10px; font-size: var(--m3t5); letter-spacing: 0px; line-height: var(--m3t6);\"><span data-huuid=\"554728419806368139\">Here\'s a more detailed explanation:</span></div></div></div><div class=\"WaaZC\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><ul jscontroller=\"M2ABbc\" jsaction=\"jZtoLb:SaHfyb\" data-hveid=\"CDUQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQm_YKegQINRAB\" style=\"margin: 10px 0px 20px; padding: 0px 0px 0px 24px; font-size: var(--m3t7); line-height: var(--m3t8);\"><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 0px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806369926\"><strong>Personalized:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806367791\">This means something is made or adapted to suit a particular person\'s needs or preferences.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"d14ffc3e-aee5-4c60-b663-276f758d49a4\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"d14ffc3e-aee5-4c60-b663-276f758d49a4\" data-uuids=\"554728419806369926,554728419806367791\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CBEQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIERAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806371713\"><strong>Mug:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806369578\">A type of drinking cup, typically made of ceramic or porcelain, with a handle and a wide opening.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"947f4353-a38a-488c-8a1c-8c3dcfdd4909\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"947f4353-a38a-488c-8a1c-8c3dcfdd4909\" data-uuids=\"554728419806371713,554728419806369578\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCwQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQILBAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806369404\"><strong>Personalized Mug:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806371365\">A mug that is customized with something specific, such as:</span><ul jscontroller=\"M2ABbc\" jsaction=\"jZtoLb:SaHfyb\" data-hveid=\"CDEQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQm_YKegQIMRAB\" style=\"margin-top: 8px !important; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px 0px 0px 24px; font-size: var(--m3t7) !important; line-height: var(--m3t8) !important;\"><li style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806369056\"><strong>Name:</strong>&nbsp;</span><span data-huuid=\"554728419806371017\">The recipient\'s name or a nickname.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"a8b5a825-6a5c-46bc-98f0-a09d331b7285\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"a8b5a825-6a5c-46bc-98f0-a09d331b7285\" data-uuids=\"554728419806369056,554728419806371017\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CC0QAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQILRAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li><li style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806370843\"><strong>Photo:</strong>&nbsp;</span><span data-huuid=\"554728419806368708\">A picture of a loved one, a special memory, or a favorite image.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"47336aed-c79a-4667-987a-5dd558297c7c\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"47336aed-c79a-4667-987a-5dd558297c7c\" data-uuids=\"554728419806370843,554728419806368708\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCAQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIIBAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li><li style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806368534\"><strong>Design:</strong>&nbsp;</span><span data-huuid=\"554728419806370495\">A unique pattern, quote, or illustration.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"e814554e-3062-4d2b-a9db-35ab38b23d5e\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"e814554e-3062-4d2b-a9db-35ab38b23d5e\" data-uuids=\"554728419806368534,554728419806370495\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCYQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIJhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li><li style=\"margin: 0px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806370321\"><strong>Custom Definition:</strong>&nbsp;</span><span data-huuid=\"554728419806368186\">A personalized definition of a name or a person.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"1b5bd68f-bc59-47be-bbff-c58fa6da99f0\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"1b5bd68f-bc59-47be-bbff-c58fa6da99f0\" data-uuids=\"554728419806370321,554728419806368186\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCoQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIKhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li></ul></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806368012\"><strong>Purpose:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806369973\">Personalized mugs are often given as gifts for special occasions or to show appreciation for someone.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"979d75b8-4d4c-4b33-aa32-a87a58d5cf39\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;</span></span></span></div></div></div></div></li></ul></div></div></div></div></div>', 'A \"personalized mug\" in refers to a mug that has been customized or made unique with specific details, like a name, a photo, or a special design, often as a gift or a keepsake.', NULL, '509,510', 280.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-02 17:05:54', '2025-04-07 15:44:06'),
(510, 'Magic Mug', 'magic-mug', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<div class=\"WaaZC\" style=\"color: rgb(0, 29, 53); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 18px;\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><div class=\"rPeykc uP58nb\" data-hveid=\"CAMQAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Qo_EKegQIAxAB\" style=\"margin: 20px 0px 10px; font-size: var(--m3t5); letter-spacing: 0px; line-height: var(--m3t6);\"><span data-huuid=\"513628392670010182\">Here\'s a more detailed explanation:</span></div></div></div><div class=\"WaaZC\" style=\"color: rgb(0, 29, 53); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 18px;\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><ul jscontroller=\"M2ABbc\" jsaction=\"jZtoLb:SaHfyb\" data-hveid=\"CCQQAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Qm_YKegQIJBAB\" style=\"margin: 10px 0px 20px; padding: 0px 0px 0px 24px; font-size: var(--m3t7); line-height: var(--m3t8);\"><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 0px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670009787\"><strong>How it works:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670008290\">Magic mugs are coated with a special type of paint called thermochromic ink, which is sensitive to temperature.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"c3d71eb5-49ce-455a-b78c-465bd9a61fc4\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"c3d71eb5-49ce-455a-b78c-465bd9a61fc4\" data-uuids=\"513628392670009787,513628392670008290\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CB4QAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIHhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670009392\"><strong>The \"magic\":</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670007895\">When a hot liquid is poured into the mug, the temperature change causes the thermochromic ink to change color, revealing a hidden image or design underneath.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"fb520e3e-862e-44d3-9700-231fadd36f65\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"fb520e3e-862e-44d3-9700-231fadd36f65\" data-uuids=\"513628392670009392,513628392670007895\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CB0QAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIHRAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670008997\"><strong>Other names:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670007500\">Magic mugs are also known as heat-changing, transforming, or disappearing mugs.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"c00585cc-8311-46f0-9f18-4a1d63d500c8\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"c00585cc-8311-46f0-9f18-4a1d63d500c8\" data-uuids=\"513628392670008997,513628392670007500\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CB8QAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIHxAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670008602\"><strong>Customization:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670011201\">Magic mugs are often personalized with photos, designs, or messages, making them a unique and fun gift option.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"a9a04b91-a0fc-4dcd-80d1-872d64b42b59\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"a9a04b91-a0fc-4dcd-80d1-872d64b42b59\" data-uuids=\"513628392670008602,513628392670011201\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CBoQAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIGhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670008207\"><strong>Material:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670010806\">They are usually made of ceramic or other materials with low thermal conductivity.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"f4ccab0d-ab24-442e-bc81-0a8f227e4abf\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;</span></span></span></div></div></div></div></li></ul></div></div>', 'A \"magic mug\" is a mug that changes color or reveals a hidden image when filled with a hot liquid, using thermochromic ink that is sensitive to temperature changes.', NULL, '509', 389.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-02 17:23:09', '2025-04-02 17:26:34'),
(512, 'Mouse Pad', 'mouse-pad', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>details : Add a touch of design and elegance to your workspace with personalised mouse pads</p><p>Want to elevate the look of your desk? Custom Mouse pads for laptop or desktops are a great way to reflect your personality and add a bit of branding to your workspace. Add your memorable photo or choose from readymade templates or design options and start customising a mouse pad online. With our full-color printing, your photos will come out looking great.</p><p><br></p><p>A good quality printed mousepad by Vistaprint can certainly be a great gifting option to employees, clients, friends and family. Mouse pads with company logo, image and message are an ideal corporate gift that keep your brand on top of your client’s mind.</p><p><br></p><p>We use dye-sublimation technique for mouse mat printing, which gives a permanent and durable print output. The mouse pad has a rubber anti-slip bottom which provides adequate grip when the pad is placed on your office/study table / any other surface near your laptop. The top of the surface has a fabric finish for precise mouse control and better glide. High-quality top and bottom surfaces of the personalized mouse pad makes it ideal for daily and long usage.</p><p><br></p><p>It is quite easy to print your mouse pad design online at Vistaprint. After you have selected the type of mouse mat, start customizing it by adding your name, message or image or choose from hundreds of readymade templates or design options. You can also choose from color and theme options. Next, sit back and relax while we print your unique personalised mouse pad!</p><p><br></p><p>For Bulk orders exceeding Rs. 10,000 in value, contact our Customer Care for any assistance.</p><p><br></p><p>Premium Quality at Best Price</p><p><br></p><p>Even Low Quantities @ Best Prices - We offer low/ single product quantities at affordable prices.</p><p>High quality products and Easy design - Our wide selection of high-quality products and online design tools make it easy for you to customize and order your favourite products</p><p>Creative ways to use your Custom Mouse Pads.</p><p><br></p><p>Are you looking for something specific? Check out these on-trend templates for top industries – Accounting &amp; Tax Advice, Web Design &amp; Hosting, Information &amp; Technology, Modern &amp; Simple, Travel &amp; Accommodation, Cosmetics &amp; Perfume, Finance &amp; Insurance, Furniture &amp; Home Goods, Software Development and More.</p><p><br></p><p>Vistaprint India customizes all its products in facilities located within India. Some of our raw materials, intermediate components, and consumables used in the manufacturing of the final product could be from one or more countries. As we follow Global Sourcing, one product is likely to have a different country of origin depending on the batch sold.</p><p><br></p><p>Country of origin: China</p><p><br></p><p>Vistaprint offers Custom Mouse Pads design templates in assorted styles.</p><p>Mouse pads</p><p>Related products</p>', 'Custom Mouse Pads\r\nProfessional and practical, custom mouse pads are a great gift for customers, employees or family.\r\nPersonalise with a photo, logo or message\r\nWith dye-sublimation printing, a smooth feel and rounded corners', NULL, '512', 199.00, NULL, 297, 67, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 16:50:25', '2025-04-03 16:51:50'),
(513, 'Personalized Moon Lamp', 'personalized-moon-lamp', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><span style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">Moon lamps with a photo are a unique and personalized item</span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">&nbsp;that can make a great gift or decoration for your home. Moon lamps come with pre-designed images</span></p><p><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">moon lamps can be used for a variety of purposes, such as&nbsp;</span><span style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">providing ambient lighting in a bedroom or living room</span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">, serving as a night light for children</span></p><p><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">Illuminate special occasions with our enchanting Moon Light Lamp.&nbsp;</span><span style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">Customize with names, messages, and photos</span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">&nbsp;for a unique and heartfelt gift.</span></p><p><span style=\"background-color: rgb(243, 245, 246);\"><font color=\"#474747\" face=\"Arial, sans-serif\"><span style=\"font-size: 14px;\">Discover the magic of personalization with the HM3Design Personalized 3D Moon Night Lamp. This enchanting lamp allows you to turn your favorite photo and heartfelt message into a glowing memory that will shine through the years.</span></font></span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\"></span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\"></span></p>', 'The best way to express your feelings through this eye gazing piece is a perfect Personalized Gift for Anniversary, Wedding, Engagement, Valentine, Birthday', NULL, '513', 999.00, NULL, 297, 66, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 17:23:04', '2025-04-03 17:23:45'),
(514, 'Key-Chain', 'key-chain', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Here\'s a more detailed breakdown:</p><p>Meaning and Purpose:</p><p>Keepsake and Reminders: Personalized keychains can act as a tangible reminder of a special memory, relationship, or event.&nbsp;</p><p>Sentimental Value: They can hold significant emotional meaning, representing shared experiences, inside jokes, or a special bond.&nbsp;</p><p>Practical Function: Beyond their sentimental value, keychains serve the practical purpose of holding and organizing keys.&nbsp;</p><p>Gifts: Personalized keychains are a popular choice for gifts, suitable for various occasions and recipients.&nbsp;</p><p>Promotional Items: Businesses and organizations can use personalized keychains as promotional items to increase brand visibility.&nbsp;</p><p>Customization Options:</p><p>Name or Initials: Keychains can be personalized with a name, initials, or a special phrase.&nbsp;</p><p>Photos: You can add a photo to the keychain to create a unique and personal keepsake.&nbsp;</p><p>Designs: Keychains can be customized with various designs, logos, or symbols.&nbsp;</p><p>Materials: Keychains come in various materials, such as metal, leather, or wood, allowing for a range of styles and aesthetics.&nbsp;</p><p>Benefits of Gifting a Personalized Keychain:</p><p>Thoughtful and Personal: A personalized keychain demonstrates care and thoughtfulness, making it a special and memorable gift.&nbsp;</p><p>Versatile Gift: Keychains are a versatile gift option, suitable for people of all ages and interests.&nbsp;</p><p>Affordable and Practical: Personalized keychains are often affordable and practical, making them a great gift for any occasion.&nbsp;</p><p>Daily Reminder: The recipient will use the keychain daily, serving as a constant reminder of the gift and the giver.</p>', 'A personalized keychain, whether with a name, photo, or design, becomes a unique and meaningful gift, serving as a keepsake, a reminder of a special connection, or a practical tool for organizing keys', NULL, '514', 150.00, NULL, 297, 64, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 17:44:52', '2025-04-05 19:24:49'),
(515, 'Printed Mouse pad', 'printed-mouse-pad', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'brings you an opportunity to customise your very own mouse pad with your best photos, logo, caption or brand name. With our printing technique', NULL, '512', 205.00, NULL, 297, 67, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:03:05', '2025-04-07 13:03:11'),
(516, 'Gaming Mouse Pad', 'gaming-mouse-pad', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Personalized/Customized Gaming Mouse Pad for Laptop/Computer and Water Resistance Coating Natural Rubber Non Slippery Rubber Base (You Think I Print)', NULL, '512,515', 209.00, NULL, 297, 67, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:09:19', '2025-04-03 18:13:10'),
(517, 'Love Couple Moon Lamp', 'love-couple-moon-lamp', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Love Moon Couple for Gift, Decoration, Night Lamp, Love Proposal, Valentine Fift, Home Decor', NULL, '513', 1080.00, NULL, 297, 66, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:17:13', '2025-04-03 18:19:23'),
(518, 'Paint Your Own Moon Decorative Lamp', 'paint-your-own-moon-decorative-lamp', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shop Paint Your Own Moon Lamp Kit Cool Gifts Diy 3d at best prices at Desertcart INDIA. ✓', NULL, '513,517', 1080.00, NULL, 297, 66, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:29:03', '2025-04-07 12:58:42'),
(519, 'Metal Panel Photo Prints', 'metal-panel-photo-prints', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Here\'s a more detailed breakdown:</p><p>What they are:</p><p>Metal prints are images printed directly onto a metal surface, typically aluminum, using a special printing process.&nbsp;</p><p>Why they are used:</p><p>Modern and Sleek Look: They offer a contemporary and stylish way to display photos and artwork.&nbsp;</p><p>Durability: Metal prints are known for their durability, scratch resistance, and resistance to fading, making them a long-lasting option.&nbsp;</p><p>Vibrant Colors: They produce vibrant and high-definition images with rich color saturation.&nbsp;</p><p>No Glare: Metal prints often have a matte finish, which helps to reduce glare and reflections.&nbsp;</p><p>Versatility: They can be used for various purposes, including home decor, office spaces, and unique gifts.&nbsp;</p><p>Easy to Hang: Metal prints are lightweight and easy to hang, and they don\'t require additional framing.&nbsp;</p><p>Where to use them:</p><p>Home Decor: Metal prints can be used to decorate walls, create gallery walls, or add a focal point to a room.&nbsp;</p><p>Office Spaces: They can add a touch of elegance and sophistication to office environments.&nbsp;</p><p>Gifts: Metal prints make unique and memorable gifts for special occasions.&nbsp;</p><p>Bathrooms: They are waterproof and ideal for bathrooms, where moisture buildup is a concern.&nbsp;</p><p>Outdoor Spaces: Metal prints are weather-resistant and can be used in outdoor spaces like patios or balconies.&nbsp;</p><p>Types of Metal Prints:</p><p>Aluminum Prints: A common type of metal print using aluminum panels.&nbsp;</p><p>HD Metal Prints: Known for their high-definition image quality.&nbsp;</p><p>Brushed Aluminum Prints: Offer a subtle metallic sheen.&nbsp;</p><p>DiBond Prints: A type of metal print where the print is bonded to a metal core.</p>', 'Metal printed frames, also known as metal photo prints or aluminum prints, are used to display photos and artwork, offering a modern, durable, and vibrant alternative to traditional framed prints', NULL, '519', 512.00, NULL, 266, 51, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:42:16', '2025-04-07 11:38:35'),
(521, 'Elegant Thin Metal Frame for Posters & Photos', 'elegant-thin-metal-frame-for-posters-photos', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>The Advantages. Metal frames are popular for their light weight and sleek looks. Add a few more attractive features and you get your perfect pair of glasses.</p><p>Structural metal stud framing refers to the construction of walls and planes using cold-formed steel components. There are two main components of metal stud framing, a stud and a track. Heavier gauge metal studs are used in load bearing walls and structural applications such as exterior walls.</p><p><br></p>', NULL, NULL, '519', 3456.00, NULL, 266, 51, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 17:53:56', '2025-04-07 11:38:20'),
(522, 'Metal Poster Frame | Aluminum Frame for Pictures & Photos', 'metal-poster-frame-aluminum-frame-for-pictures-photos', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>What are you framing?</p><p>Upload a digital photo for us to print and frame or share a photo of your physical piece to mail in or drop off at a store.</p><p><font color=\"#001d35\" face=\"Google Sans, Arial, sans-serif\"><span style=\"font-size: 18px;\">Metal prints are personalized, frameless art pieces printed on aluminum, offering durability, vibrant colors, and a modern look, suitable for various purposes like home decor, gifts, and even outdoor signage</span></font></p>', NULL, NULL, '519,521', 2560.00, NULL, 266, 51, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:06:43', '2025-04-07 11:38:13'),
(523, 'Custom Metal Prints', 'custom-metal-prints', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><br></p><p>Your memories get better with quality and colour!</p><p><br></p><p>Metal prints are a premium quality photo prints on metal that allows displaying your favourite photos with the least glare and best vibrancy in colours even from a distance. You can print anything on custom metal prints from pictures from your holidays to birthday parties or anniversary pictures. You can also gift some memories printed on metal prints to stand out from the generic ones.</p><p><br></p><p>Customising options are varying with us; hence they make your interior look splendid and striking even if you have coloured walls. To make things more eye-catching, you can choose brightly coloured photos to print on metal photo prints to stand out from the coloured walls</p>', NULL, NULL, '519,521,522', 4800.00, NULL, 266, 51, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:15:50', '2025-04-07 11:38:07');
INSERT INTO `products` (`id`, `name`, `slug`, `product_type`, `metal_type`, `size`, `sizes`, `color`, `colors`, `height`, `width`, `font`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(524, 'Acrylic Photo Prints', 'acrylic-photo-prints', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Create Stunning Acrylic Photo Prints for Home or Office.</p><p>Showcase your favourite photos with our premium custom acrylic photo prints, meticulously crafted to highlight the vibrant details and rich colours of your images. Perfect for adding a touch of elegance to both home and office spaces, these acrylic picture prints offer a sleek, modern finish that seamlessly complements any décor. With our easy-to-use online acrylic photo printing service, you can personalise your prints to suit your unique style, making them not only a striking addition to your walls but also a thoughtful and personalised gift for loved ones. The thick, durable acrylic material ensures that your photos remain vivid and sharp for years, while adhesive tapes on the back ensure simple and secure mounting. Preserve your memories with custom acrylic photo prints that are as lasting as they are stunning.</p><p><br></p><p>Product Care Guidelines</p><p><br></p><p>Acrylic Photo prints are provided with a transparent protective layer on the print to avoid scratches or damage during transit. Please peel off the paper before use.</p><p>Acrylic Photo prints are provided with adhesive tapes at the back for easy mounting on a wall or a plain surface.</p><p>Use a dust-free cloth to wipe the acrylic prints. The use of normal cloth may lead to scratches.</p><p>Vistaprint India customizes all its products in facilities located within India. Some of our raw materials, intermediate components, and consumables used in the manufacturing of the final product could be from one or more countries. As we follow Global Sourcing, one product is likely to have a different country of origin depending on the batch sold.</p>', NULL, NULL, '', 1728.00, NULL, 266, 63, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:22:39', '2025-04-07 11:37:59'),
(525, 'Acrylic photo print personalized', 'acrylic-photo-print-personalized', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Acrylic is a glass alternative that has gained popularity as a framing material. You may know it as Acrylite® or Plexiglas®, which are brands of the same thermoplastic scientifically known as Polymethyl Methacrylate (aka PMMA). It\'s hard, flexible, lightweight, and even recyclable.</p>', NULL, NULL, '524,525,527,526', 512.00, NULL, 266, 63, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:28:58', '2025-04-07 12:36:37'),
(526, 'Customised Premium  Acrylic Wall Photo Print', 'customised-premium-acrylic-wall-photo-print', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Acrylic photo prints, available online in India, offer a modern, durable way to display photos with a glossy, vibrant finish, often by printing directly onto or mounting onto acrylic sheets.&nbsp;</p>', NULL, NULL, '524,525', 512.00, NULL, 266, 63, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:34:29', '2025-04-07 12:33:45'),
(527, 'Acrylic Prints', 'acrylic-prints', 'Customize', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Acrylic prints shine beautifully, displaying the full depth and sharp detail of your photos.</p><p>We handcraft each print with care using the highest quality materials. Printing behind thick acrylic glass sheets protects your photos from dust, scratches and UV - they will last for years!</p><p>Free hanging system included.</p><p>Shipped in protective packaging to ensure no damage during transportation.</p>', NULL, NULL, '524,525,526', 512.00, NULL, 266, 63, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:40:06', '2025-04-07 13:20:56'),
(530, 'Canvas Personlized Prints', 'canvas-personlized-prints', 'Customize', 't_shirt', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>A canvas print is a digital image or photograph printed onto a canvas material, often stretched and gallery-wrapped onto a frame for display, offering a textured, artistic appearance and durability.&nbsp;</p><p>Here\'s a more detailed explanation:</p><p>What is a Canvas Print?</p><p>Material:</p><p>Canvas prints are made by printing an image onto a canvas material, typically a blend of cotton and polyester, which is then stretched over a wooden frame.&nbsp;</p><p>Printing Process:</p><p>The image is printed using a high-quality inkjet printer, ensuring vibrant colors and sharp details.&nbsp;</p><p>Stretching and Wrapping:</p><p>Once printed, the canvas is stretched and secured over a wooden frame, creating a gallery-wrapped look where the canvas wraps around the sides of the frame.&nbsp;</p><p>Frameless or Framed:</p><p>You can choose between frameless (gallery-wrapped) or framed canvas prints, with the latter offering a more traditional look.&nbsp;</p><p>Benefits:</p><p>Texture and Depth: Canvas prints add a unique texture and depth to your wall art, unlike traditional paper or cardstock prints.&nbsp;</p><p>Durability: Canvas is a durable material, making canvas prints long-lasting and resistant to fading or damage.&nbsp;</p><p>Versatility: Canvas prints can be used to display photographs, artwork, or other images, and are suitable for both home and office decor.&nbsp;</p><p>Personalization: Canvas prints can be customized with your own images, making them a great way to create personalized gifts or unique wall art.&nbsp;</p><p>Types of Canvas:</p><p>100% Cotton Canvas: Known for its natural texture and durability.&nbsp;</p><p>Cotton-Effect Polyester Canvas: Offers a more affordable option with a similar look and feel to cotton canvas.&nbsp;</p><p>Gallery Wrap: The canvas is stretched and wrapped around the sides of the frame, creating a seamless, frameless look.&nbsp;</p><p>Framed Canvas: The canvas is stretched and secured within a traditional frame.&nbsp;</p><p>Care and Maintenance:</p><p>Canvas prints are relatively easy to care for. You can simply wipe them down with a damp cloth to remove dust or dirt.&nbsp;</p>', NULL, NULL, '', 512.00, NULL, 266, 53, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 14:44:24', '2025-04-07 14:44:24'),
(531, 'Custom Photo to Canvas', 'custom-photo-to-canvas', 'Customize', 't_shirt', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>A canvas print is the result of an image printed onto canvas which is often stretched, or gallery-wrapped, onto a frame and displayed. Canvas prints are used as the final output in an art piece, or as a way to reproduce other forms of art.</p>', NULL, NULL, '530', 320.00, NULL, 266, 53, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 14:49:33', '2025-04-07 14:49:33'),
(532, 'Canvas Wall Art On Canvas', 'canvas-wall-art-on-canvas', 'Customize', NULL, NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>What Is a Canvas Print? Your Complete Guide to Canvas</p><p>In recent years, canvas prints have become increasingly popular as a unique and stylish way to display artwork and photographs. If you\'re curious about what a canvas print is and how it can enhance your home or office decor, you\'ve come to the right place. This comprehensive guide covers everything you need to know about canvas prints, from their basic definition to their advantages, care tips, and even a handy buying guide. So, let\'s dive in and explore the wonderful world of canvas prints!</p>', NULL, NULL, '530,531', 320.00, NULL, 266, 53, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 15:05:37', '2025-04-07 15:09:46'),
(533, 'MEMORYWALL Canvas Print Personalized With Your Photos', 'memorywall-canvas-print-personalized-with-your-photos', 'Customize', 't_shirt', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>Personalise any space with photo canvas prints.</p><p>Ready to put a personal touch on any (and every) space you want? Our photo canvas prints feature vibrant, fade-resistant digital printing and they’re mounted on a sturdy wooden frame. The frame is easy to hang due to the pre-installed hook at the back. So, what are you waiting for? Create the piece of art your wall’s been missing.</p><p><br></p><p>For yourself: Preserve your photo memories at home or in office. Decorate your home or office walls with pictures of your memories. They are the best way to create long lasting memories from the pictures you love.</p><p><br></p><p>For gifting: Photo Canvas Prints are an ideal gift for your loved ones. Canvas Prints make great gifts for any occasion: be it birthdays, anniversaries, housewarming parties or farewells. Upload a single photo or create a collage and create a personalised Canvas Print online in minutes.</p><p><br></p><p>To start creating your canvas prints online, pick your canvas size and orientation, and then explore our gallery of fully customisable design options. Once you’ve found a design that you like, make it yours by adding your favorite pictures, and choosing the options that work best for you, and we will take care of the rest using vibrant, high-quality printing to create a piece that can be treasured for years to come.</p><p><br></p><p><br></p>', NULL, NULL, '530,531,532', 320.00, NULL, 266, 53, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 15:33:57', '2025-04-07 15:33:57'),
(534, 'Personalized photo mug with a long-lasting design.', 'personalized-photo-mug-with-a-long-lasting-design', 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Custom coffee mugs, also known as cup photo prints, make an ideal gifting option for your near and dear ones on special occasions. With mug printing, you can personalize a magic mug with a photo to feature a cherished memory, a favorite quote, or even a company logo. These unique photo cup gifts not only serve as memorable keepsakes but also add a personal touch to everyday coffee rituals. Choose coffee mug printing for the perfect cup printing solution, offering a blend of practicality and sentiment.</p>', NULL, NULL, '510,509', 280.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 15:58:47', '2025-04-07 15:58:47'),
(535, 'Personalized Sip And Celebrate Birthday Mug', 'personalized-sip-and-celebrate-birthday-mug', 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Make every birthday brew extra special with this personalized enamel coffee mug. Meticulously crafted from high-quality stainless steel, this durable and lightweight mug is perfect for sipping in style. The front features the cheerful words Happy Birthday, Sip and Celebrate, while the back showcases a customized image, making it a one-of-a-kind keepsake. Whether it is for morning coffee, evening tea, or a travel-friendly cup of joy, this mug is the perfect way to celebrate another year of happiness. Personalize it with a picture and gift it to a loved one or treat yourself.</p><div><br></div>', NULL, NULL, '509,534', 280.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:19:07', '2025-04-07 16:19:07'),
(536, 'Capture The Moment Personalized Birthday Surprise', 'capture-the-moment-personalized-birthday-surprise', 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Surprise your Loved Ones by Gifting Photo Mugs/Cup Online from IGP. Customized your Photo Mug with text, quotes and photo printed on it.', NULL, NULL, '509,534,535', 280.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:25:46', '2025-04-07 16:25:46'),
(537, 'Printing Personalised Magic Mug', 'printing-personalised-magic-mug', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Surprise your loved ones with Zoomin\'s custom magic mugs. Personalize photo mugs that reveal your image with heat. Unique, affordable, and made in India.</p>', NULL, NULL, '510', 380.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:33:08', '2025-04-07 16:34:09'),
(538, 'Custom Magic Mug', 'custom-magic-mug', 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Colour-changing magic photo mugs for personal and professional gifting!</p><p>You can use these beautiful magical mugs for any occasion or event. Make your family and friends spend every moment with that mug whenever a hidden photo is revealed. Delight them with magic!</p>', NULL, NULL, '510,537', 380.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:38:05', '2025-04-07 16:38:05'),
(539, 'Custom Magic Mug Gift', 'custom-magic-mug-gift', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Customised/Personalized Magic Mug Gift with Custom Photos Add Logo,Text for Birthday,Anniversary and Wedding Gifts Ceramic Magic Mug</p>', NULL, NULL, '510,537,538', 380.00, NULL, 297, 69, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:46:49', '2025-04-07 16:48:02'),
(540, 'Personalized Photo Mug BLACK PATCH COFFEE MUG', NULL, 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>These patch mugs are not merely containers for beverages but serve as personalized keepsakes, memorable gifts, or branded merchandise. The versatility of design possibilities allows for the creation of unique, one-of-a-kind pieces that resonate with individual tastes and preferences.</p>', NULL, NULL, '', 393.00, NULL, 297, NULL, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 18:03:28', '2025-04-07 18:03:28'),
(541, 'Personalized Photo Mug BLACK PATCH COFFEE MUG', NULL, 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>These patch mugs are not merely containers for beverages but serve as personalized keepsakes, memorable gifts, or branded merchandise. The versatility of design possibilities allows for the creation of unique, one-of-a-kind pieces that resonate with individual tastes and preferences.</p>', NULL, NULL, '', 393.00, NULL, 297, NULL, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-07 18:03:33', '2025-04-07 18:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image1`, `image2`, `image3`, `image4`, `image5`, `sort_order`, `created_at`, `updated_at`) VALUES
(444, 395, 'customize-neon_1_1743248453.JPG', 'customize-neon_2_1743248454.JPG', 'customize-neon_3_1743248456.JPG', 'customize-neon_4_1743248456.JPG', 'customize-neon_5_1743248457.JPG', NULL, '2025-03-29 06:10:59', '2025-03-29 06:10:59'),
(453, 509, 'personlized-mug_1_1744040646.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-02 17:05:54', '2025-04-07 15:44:06'),
(454, 510, 'magic-mug_1_1744044687.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-02 17:23:09', '2025-04-07 16:51:28'),
(456, 512, 'mouse-pad_1_1744032242.png', NULL, NULL, NULL, NULL, NULL, '2025-04-03 16:50:25', '2025-04-07 13:24:02'),
(457, 513, 'personalized-moon-lamp_1_1744032179.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-03 17:23:04', '2025-04-07 13:22:59'),
(458, 514, 'key-chain_1_1744031734.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-03 17:44:53', '2025-04-07 13:15:34'),
(459, 515, 'printed-mouse-pad_1_1744031657.jpg', 'printed-mouse-pad_2_1744031657.webp', NULL, NULL, NULL, NULL, '2025-04-03 18:03:06', '2025-04-07 13:14:18'),
(460, 516, 'gaming-mouse-pad_1_1744030925.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-03 18:09:19', '2025-04-07 13:02:05'),
(461, 517, 'love-couple-moon-lamp_1_1744030759.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-03 18:17:13', '2025-04-07 12:59:19'),
(462, 518, 'paint-your-own-moon-decorative-lamp_1_1744030722.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-03 18:29:03', '2025-04-07 12:58:42'),
(463, 519, 'metal-panel-photo-prints_1_1744030597.JPG', 'metal-panel-photo-prints_2_1744030598.jpg', 'metal-panel-photo-prints_3_1744030598.jpg', NULL, NULL, NULL, '2025-04-03 18:42:16', '2025-04-07 12:56:38'),
(465, 521, 'elegant-thin-metal-frame-for-posters-photos_1_1744030460.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-05 17:53:56', '2025-04-07 12:54:20'),
(466, 522, 'metal-poster-frame-aluminum-frame-for-pictures-photos_1_1744030171.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-05 18:06:43', '2025-04-07 12:49:31'),
(467, 523, 'custom-metal-prints_1_1744029762.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-05 18:15:50', '2025-04-07 12:42:42'),
(468, 524, 'acrylic-photo-prints_1_1744028506.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-05 18:22:39', '2025-04-07 12:21:46'),
(469, 525, 'acrylic-photo-print-personalized_1_1744029397.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-05 18:28:59', '2025-04-07 12:36:37'),
(470, 526, 'customised-premium-acrylic-wall-photo-print_1_1744029225.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-05 18:34:29', '2025-04-07 12:33:45'),
(471, 527, 'acrylic-prints_1_1744028847.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-05 18:40:07', '2025-04-07 12:27:28'),
(474, 530, 'canvas-personlized-prints_1_1744037064.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-07 14:44:24', '2025-04-07 14:44:24'),
(475, 531, 'custom-photo-to-canvas_1_1744037373.JPG', NULL, NULL, NULL, NULL, NULL, '2025-04-07 14:49:33', '2025-04-07 14:49:33'),
(476, 532, 'canvas-wall-art-on-canvas_1_1744038337.JPG', NULL, NULL, NULL, NULL, NULL, '2025-04-07 15:05:37', '2025-04-07 15:05:37'),
(477, 533, 'memorywall-canvas-print-personalized-with-your-photos_1_1744040037.JPG', NULL, NULL, NULL, NULL, NULL, '2025-04-07 15:33:58', '2025-04-07 15:33:58'),
(478, 534, 'personalized-photo-mug-with-a-long-lasting-design_1_1744041527.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-07 15:58:47', '2025-04-07 15:58:47'),
(479, 535, 'personalized-sip-and-celebrate-birthday-mug_1_1744042747.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:19:07', '2025-04-07 16:19:07'),
(480, 536, 'capture-the-moment-personalized-birthday-surprise_1_1744043146.png', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:25:47', '2025-04-07 16:25:47'),
(481, 537, 'printing-personalised-magic-mug_1_1744043649.png', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:33:08', '2025-04-07 16:34:09'),
(482, 538, 'custom-magic-mug_1_1744043885.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:38:05', '2025-04-07 16:38:05'),
(483, 539, 'custom-magic-mug-gift_1_1744044482.png', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:46:49', '2025-04-07 16:48:03'),
(484, 540, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 18:03:28', '2025-04-07 18:03:28'),
(485, 541, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 18:03:33', '2025-04-07 18:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` double(3,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2025-02-17 04:50:22', '2025-02-17 01:52:39'),
(7, 'Super Admin', 'admin', '2025-02-17 00:04:26', '2025-02-17 00:04:26'),
(9, 'Editor', 'admin', '2025-02-17 01:55:01', '2025-02-17 01:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(26, 1),
(21, 1),
(25, 1),
(26, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `business_line` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `business_line`, `description`, `image`, `phone`, `whatsapp`, `email`, `address`, `facebook`, `instagram`, `twitter`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'Heaven Prints', 'Customized Neon and Frames', 'Hello', 'Heaven Prints.jpg', '9924489907', '9924489907', 'info@heavenprints.in', '2005 delhi chakla  ,Shahpur  Ahmedabad', 'https://www.facebook.com/', 'https://www.instagram.com/heaven__prints?igsh=MXVkZWgzZzQ4NHEzeA==', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, '2025-04-01 07:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(19, '1', 50.00, '2025-02-20 05:35:38', '2025-02-20 05:35:38'),
(23, '6', 100.00, '2025-03-26 07:47:09', '2025-03-26 07:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `show` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `show`, `created_at`, `updated_at`) VALUES
(2, 'Small', 'Yes', '2025-04-02 02:20:14', '2025-04-02 02:20:14'),
(3, 'Medium', 'Yes', '2025-04-02 02:20:25', '2025-04-02 02:20:25'),
(4, 'Large', 'Yes', '2025-04-02 02:20:31', '2025-04-02 02:20:31'),
(5, 'XL', 'Yes', '2025-04-02 02:20:38', '2025-04-02 02:20:38'),
(6, 'XXL', 'Yes', '2025-04-02 02:20:43', '2025-04-02 02:20:43'),
(7, 'XXXL', 'Yes', '2025-04-02 02:20:52', '2025-04-02 02:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 'AP', NULL, NULL),
(2, 'Arunachal Pradesh', 'AR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `image`, `status`, `showHome`, `category_id`, `created_at`, `updated_at`) VALUES
(51, 'Metal Prints', 'metal-prints', '_1743879581.jpeg', 1, 'Yes', 266, '2025-03-25 04:17:20', '2025-04-05 18:59:41'),
(53, 'Canvas Print', 'canvas-print', '_1743864809.jpg', 1, 'Yes', 266, '2025-03-26 06:09:30', '2025-04-05 14:53:29'),
(54, 'Woods', 'woods', '_1743494730.jpg', 1, 'Yes', 297, '2025-03-26 09:54:38', '2025-04-01 11:28:06'),
(57, 'Customize Neon', 'customize-neon', '_1743494742.jpg', 1, 'Yes', 296, '2025-03-27 08:56:50', '2025-04-01 08:05:42'),
(62, 'Photo Frame', 'photo-frame', '_1743492577.jpg', 1, 'No', 266, '2025-04-01 07:16:26', '2025-04-01 07:29:38'),
(63, 'Acrylic', 'acrylic', 'photo-frame_1743493700.jpg', 1, 'Yes', 266, '2025-04-01 07:48:20', '2025-04-01 07:48:43'),
(64, 'Keychain', 'keychain', 'keychain_1743494400.webp', 1, 'Yes', 297, '2025-04-01 08:00:00', '2025-04-01 08:00:00'),
(65, 'Calendar', 'calendar', 'calendar_1743494450.webp', 1, 'Yes', 297, '2025-04-01 08:00:50', '2025-04-01 08:00:50'),
(66, 'Moon Lamp', 'moon-lamp', 'moon-lamp_1743494469.jpg', 1, 'Yes', 297, '2025-04-01 08:01:09', '2025-04-01 08:01:09'),
(67, 'Mouse Pad', 'mouse-pad', 'mouse-pad_1743494494.webp', 1, 'Yes', 297, '2025-04-01 08:01:34', '2025-04-01 08:01:34'),
(68, 'T-shirt', 't-shirt', 't-shirt_1743494784.png', 1, 'Yes', 298, '2025-04-01 08:06:25', '2025-04-01 08:06:25'),
(69, 'Mug', 'mug', 'personlized-mug_1743613848.jpeg', 1, 'Yes', 297, '2025-04-02 17:10:48', '2025-04-02 17:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT 0,
  `otp` varchar(255) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `status`, `role`, `email_verified_at`, `password`, `remember_token`, `is_protected`, `otp`, `otp_expires_at`, `created_at`, `updated_at`) VALUES
(7, 'Mukesh', 'Bhavsar', 'mukeshbhavsar210@gmail.com', NULL, 1, 2, NULL, '$2y$10$atts/65kfJw0YoA6jw3f2.U0XsNfRera0pwSXdTRmdlQHmvpAIHK2', NULL, 1, NULL, NULL, '2023-12-19 07:11:37', '2023-12-19 07:11:37'),
(30, 'Dhruv', 'Bhavsar', 'dhruvbhavsar210@gmail.com', NULL, 1, 1, NULL, '$2y$10$CINsltt2MKGU/BTfWGEQgex3wlwhdvt9.uLROJuwhZ48SezK.b1ia', NULL, 0, NULL, NULL, '2025-02-17 01:03:07', '2025-03-31 02:03:54'),
(42, 'Priyanka', 'Bhavsar', 'p.bhavsar2610@gmail.com', '9978835005', 1, 1, '2025-04-01 09:09:37', '$2y$10$i0lNwP72glwfIXF21kS1De70nud8aVkaad65jCJyn9ApB62JUlrG2', NULL, 0, NULL, NULL, '2025-04-01 09:09:11', '2025-04-01 09:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_user_id_foreign` (`user_id`),
  ADD KEY `customer_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `custom_totals`
--
ALTER TABLE `custom_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frame_materials`
--
ALTER TABLE `frame_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_razorpay_payment_id_unique` (`razorpay_payment_id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_product_id_foreign` (`product_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `custom_totals`
--
ALTER TABLE `custom_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frame_materials`
--
ALTER TABLE `frame_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
