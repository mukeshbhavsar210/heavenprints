-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 04:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neonstar`
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
(32, 'Tshirt', 'tshirt', 'test', 'tshirt.jpg', 1, 'Yes', '2025-04-02 04:37:15', '2025-04-02 04:37:16'),
(33, 'test', 'test', 'test', 'test.png', 1, 'Yes', '2025-04-02 06:21:24', '2025-04-02 06:21:25');

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
(296, 'NEON', 'neon', 'customize_1743085591.png', 1, 'Yes', 0, '2025-03-27 08:56:31', '2025-04-01 06:22:57'),
(297, 'Shop', 'shop', 'neon_1743334717.png', 1, 'Yes', 0, '2025-03-30 06:08:40', '2025-03-31 03:18:42'),
(298, 'Customize', 'customize', 'customize_1743990247.jpg', 1, 'Yes', 0, '2025-04-06 20:14:09', '2025-04-06 20:14:09');

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
(1, 'Red', 'ff0000', 'Yes', '2025-04-02 00:02:40', '2025-04-02 00:02:40'),
(3, 'Blue', '#002aff', 'Yes', '2025-04-02 00:09:07', '2025-04-02 00:09:07'),
(4, 'Black', '#000000', 'Yes', '2025-04-02 00:10:06', '2025-04-02 00:10:06'),
(5, 'Green', '#00b815', 'Yes', '2025-04-02 00:10:18', '2025-04-02 00:10:18'),
(6, 'Orange', '#d67d00', 'Yes', '2025-04-02 00:10:31', '2025-04-02 00:10:31');

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
(9, 30, 'Dhruv', 'Bhavsar', '09978835005', 'dhruvbhavsar210@gmail.com', 1, 'Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,', NULL, 'Banglore', '560100', 'I want ', '2025-03-26 23:38:23', '2025-04-10 01:14:26');

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
(69, '2025_03_31_064152_create_password_resets_table', 60),
(70, '2025_04_01_103631_add_otp_to_users_table', 61),
(71, '2025_04_02_042506_create_frame_materials_table', 62),
(72, '2025_04_02_052554_create_colors_table', 63),
(73, '2025_04_02_074223_create_sizes_table', 64),
(74, '2025_04_05_050623_create_custom_totals_table', 65),
(75, '2025_04_11_103519_create_orders_table', 66);

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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_code_id` int(11) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grandtotal` double(10,2) NOT NULL,
  `shipped_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `country_id`, `subtotal`, `shipping`, `coupon_code`, `coupon_code_id`, `discount`, `grandtotal`, `shipped_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 30, 520, 1, 800.00, 50.00, '', NULL, 0.00, 850.00, '2025-04-11 13:32:36', 'pending', '2025-04-11 08:02:36', '2025-04-11 08:02:36');

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
  `selected_product` varchar(255) DEFAULT NULL,
  `selected_product_name` varchar(255) DEFAULT NULL,
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

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `category`, `font`, `size`, `color`, `selected_product`, `selected_product_name`, `frame`, `image`, `border`, `major`, `wrap_wrap`, `hardware_style`, `hardware_display`, `lamination`, `retouching`, `hardware_finishing`, `proof`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(115, 225, 519, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 800.00, 800.00, '2025-04-09 08:24:25', '2025-04-09 08:24:25'),
(116, 226, 519, 'test', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 800.00, 800.00, '2025-04-09 08:25:35', '2025-04-09 08:25:35'),
(117, 227, 519, 'test', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 800.00, 800.00, '2025-04-09 08:26:08', '2025-04-09 08:26:08'),
(118, 228, 395, 'Customize Neon', 'Neon light', 'Passionate', 'Large', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9000.00, 9000.00, '2025-04-09 08:27:58', '2025-04-09 08:27:58'),
(119, 229, 520, 'Mouse Pad', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, '1744202047.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 287.00, 287.00, '2025-04-09 08:29:05', '2025-04-09 08:29:05'),
(120, 230, 521, 'Key Chain', 'Customize', NULL, NULL, NULL, NULL, NULL, NULL, '1744202047.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 223.00, 223.00, '2025-04-09 08:30:14', '2025-04-09 08:30:14'),
(121, 231, 520, 'Mouse Pad', 'Customize', NULL, '1', NULL, 'magic_mug.jpg', 'Mug', NULL, '1744202047.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 223.00, 223.00, '2025-04-09 08:36:37', '2025-04-09 08:36:37'),
(122, 232, 520, 'Mouse Pad', 'Customize', NULL, '1', NULL, NULL, NULL, NULL, '1744202047.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1257.30, 1257.30, '2025-04-09 08:52:31', '2025-04-09 08:52:31'),
(123, 234, 520, 'Mouse Pad', 'Customize', NULL, '1', NULL, 'magic_mug.jpg', 'Mug', 'Golden', '1744202047.jpg', 'Border Color Free', NULL, 'Canvas Lite (0.50\")', 'No Hooks Free', 'Dust Cover', 'Premium', '[\"Dust\\/Scratch Removal\",\"Date Stamp Removal\"]', NULL, NULL, 1, 1881.00, 1881.00, '2025-04-09 08:59:14', '2025-04-09 08:59:14'),
(124, 235, 521, 'Key Chain', 'Customize', NULL, '1', NULL, 'magic_mug.jpg', 'Mug', NULL, '1744202047.jpg', NULL, 'test world mukesh', NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 154.00, 154.00, '2025-04-09 09:09:23', '2025-04-09 09:09:23'),
(125, 236, 519, 'test', 'Default', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 800.00, 800.00, '2025-04-09 10:18:53', '2025-04-09 10:18:53'),
(126, 237, 395, 'Customize Neon', 'Neon light', 'Robo', '1', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 12000.00, 12000.00, '2025-04-10 01:14:26', '2025-04-10 01:14:26'),
(127, 239, 519, 'test', 'Default', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 800.00, 800.00, '2025-04-10 01:21:59', '2025-04-10 01:21:59'),
(128, 240, 520, 'Mouse Pad', 'Customize', NULL, '0', NULL, 'key-chain_1_1743992083.jpg', 'Key Chain', NULL, 'No image found', NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 700.00, 700.00, '2025-04-10 22:35:45', '2025-04-10 22:35:45'),
(129, 241, 519, 'test', 'Customize', NULL, '0', NULL, 'customize-neon_1_1743248453.JPG', 'Customize Neon', NULL, '1744344359.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 600.00, 600.00, '2025-04-10 22:36:26', '2025-04-10 22:36:26'),
(130, 242, 395, 'Customize Neon', 'Neon light', 'Passionate', '1', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 12000.00, 12000.00, '2025-04-10 22:37:04', '2025-04-10 22:37:04'),
(131, 243, 521, 'Key Chain', 'Customize', NULL, '0', NULL, NULL, NULL, NULL, '1744344359.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 1257.30, 1257.30, '2025-04-10 22:37:44', '2025-04-10 22:37:44'),
(132, 244, 521, 'Key Chain', 'Customize', NULL, '1', NULL, NULL, NULL, NULL, '1744344359.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 1101.27, 1101.27, '2025-04-10 22:38:25', '2025-04-10 22:38:25'),
(133, 245, 520, 'Mouse Pad', 'Customize', NULL, '0', NULL, 'customize-neon_1_1743248453.JPG', 'Customize Neon', NULL, '1744367613.png', NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 600.00, 600.00, '2025-04-11 05:04:16', '2025-04-11 05:04:16'),
(136, 3, 520, 'Mouse Pad', 'Customize', NULL, '0', NULL, 'test_1_1743573308.jpg', 'test', NULL, '1744367613.png', NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 800.00, 800.00, '2025-04-11 08:02:36', '2025-04-11 08:02:36');

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
(126, 225, 519, 'pay_QGyz092Lrrh5CJ', 'order_QGyyvxUQ1fzELF', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGyz092Lrrh5CJ\\\",\\\"razorpay_order_id\\\":\\\"order_QGyyvxUQ1fzELF\\\",\\\"razorpay_signature\\\":\\\"fb22d63c7d18e6eb013d34bd71b5ef18ec59519857ba7dd3ca7e19508f1acebf\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:24:25', '2025-04-09 08:24:25'),
(127, 226, 519, 'pay_QGz0EOKDANSBSV', 'order_QGz0APklQmHmv1', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGz0EOKDANSBSV\\\",\\\"razorpay_order_id\\\":\\\"order_QGz0APklQmHmv1\\\",\\\"razorpay_signature\\\":\\\"6567b935790c7edbbd07c4448f0ef1ad590760ad8a1aee1e460264aa62f3d028\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:25:35', '2025-04-09 08:25:35'),
(128, 227, 519, 'pay_QGz0ozLWFNwDer', 'order_QGz0lExBm2LT5w', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGz0ozLWFNwDer\\\",\\\"razorpay_order_id\\\":\\\"order_QGz0lExBm2LT5w\\\",\\\"razorpay_signature\\\":\\\"96cc772bb1bd0d075417b016845c923c5bc9bb0632614b0fdb783b05149c86cb\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:26:08', '2025-04-09 08:26:08'),
(129, 228, 395, 'pay_QGz2ki8wZfu1Iq', 'order_QGz2gVsmYQHRKG', 'Paid', 9000.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGz2ki8wZfu1Iq\\\",\\\"razorpay_order_id\\\":\\\"order_QGz2gVsmYQHRKG\\\",\\\"razorpay_signature\\\":\\\"00b7f7475815d0a2020a2275964ec3c7baaae620a646e79c72b1e79fbf6f4361\\\",\\\"amount\\\":900000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:27:58', '2025-04-09 08:27:58'),
(130, 229, 520, 'pay_QGz3w4RG0QJbgt', 'order_QGz3sFnw6P0aJl', 'Paid', 287.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGz3w4RG0QJbgt\\\",\\\"razorpay_order_id\\\":\\\"order_QGz3sFnw6P0aJl\\\",\\\"razorpay_signature\\\":\\\"62e9d96340879f6948822c6f1c480a2b01d6aa3ee697aa7292f35e9830851448\\\",\\\"amount\\\":28700,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:29:05', '2025-04-09 08:29:05'),
(131, 230, 521, 'pay_QGz59A08LgFM3V', 'order_QGz53twyplIEoH', 'Paid', 223.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGz59A08LgFM3V\\\",\\\"razorpay_order_id\\\":\\\"order_QGz53twyplIEoH\\\",\\\"razorpay_signature\\\":\\\"ac4296d1a49010416dd6a17ff509c5cf22f1bdb817aea0a27529ffd68aecf762\\\",\\\"amount\\\":22300,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:30:15', '2025-04-09 08:30:15'),
(132, 231, 520, 'pay_QGzBtNfeL5jSsM', 'order_QGzBpAm7MOTlNa', 'Paid', 223.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGzBtNfeL5jSsM\\\",\\\"razorpay_order_id\\\":\\\"order_QGzBpAm7MOTlNa\\\",\\\"razorpay_signature\\\":\\\"cfbef0f047f88d1a00797b7ad289cb70a3323d37da1df80caf7d0dd7ecf0ab71\\\",\\\"amount\\\":22300,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:36:37', '2025-04-09 08:36:37'),
(133, 232, 520, 'pay_QGzSfUvdjV317i', 'order_QGzSaqNfJ3PiSQ', 'Paid', 1257.30, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGzSfUvdjV317i\\\",\\\"razorpay_order_id\\\":\\\"order_QGzSaqNfJ3PiSQ\\\",\\\"razorpay_signature\\\":\\\"15790cf41a4813f4e1d8c3827149d3e38d5d2c005be9004d45e8c32e20e4b8b8\\\",\\\"amount\\\":125730,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:52:31', '2025-04-09 08:52:31'),
(134, 234, 520, 'pay_QGzZlicCDO6GcU', 'order_QGzZhPR15VSGxM', 'Paid', 1881.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGzZlicCDO6GcU\\\",\\\"razorpay_order_id\\\":\\\"order_QGzZhPR15VSGxM\\\",\\\"razorpay_signature\\\":\\\"f28134fd6f434caf8643394212b6ab7e0741130453db04e965057f28ead2aabb\\\",\\\"amount\\\":188100,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 08:59:14', '2025-04-09 08:59:14'),
(135, 235, 521, 'pay_QGzkU8QCQPu1vw', 'order_QGzkPNsfKwAs0W', 'Paid', 154.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QGzkU8QCQPu1vw\\\",\\\"razorpay_order_id\\\":\\\"order_QGzkPNsfKwAs0W\\\",\\\"razorpay_signature\\\":\\\"2d5bda1e33b9c9546d9dad27f38bcb0e2fa65b2638810072ed762e83d1a01715\\\",\\\"amount\\\":15400,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 09:09:23', '2025-04-09 09:09:23'),
(136, 236, 519, 'pay_QH0vu17Z7TPawT', 'order_QH0vptx05LWEuG', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QH0vu17Z7TPawT\\\",\\\"razorpay_order_id\\\":\\\"order_QH0vptx05LWEuG\\\",\\\"razorpay_signature\\\":\\\"731843c6391ad7382ef0d6b0178004b1fb0ed3984005ed0031bbcf7782631746\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Mukesh\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"mukeshbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-09 10:18:53', '2025-04-09 10:18:53'),
(137, 237, 395, 'pay_QHGBvMszPDeSV8', 'order_QHGBqdr92qJL9y', 'Paid', 12000.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHGBvMszPDeSV8\\\",\\\"razorpay_order_id\\\":\\\"order_QHGBqdr92qJL9y\\\",\\\"razorpay_signature\\\":\\\"c1dad08b3fe9327d5fcb150abf9d608352730c0ffaeb1be041e09f865ddd35cb\\\",\\\"amount\\\":1200000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 01:14:27', '2025-04-10 01:14:27'),
(138, 239, 519, 'pay_QHGJtiUpCPB8Gx', 'order_QHGJpSVfCBxBER', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHGJtiUpCPB8Gx\\\",\\\"razorpay_order_id\\\":\\\"order_QHGJpSVfCBxBER\\\",\\\"razorpay_signature\\\":\\\"1dc22b6834d2093c823413e90a898e17e790ee706943fb8c799701dfc33fd6bd\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 01:21:59', '2025-04-10 01:21:59'),
(139, 240, 520, 'pay_QHc1OMwsYwo9jX', 'order_QHc1G3saF9roRj', 'Paid', 700.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHc1OMwsYwo9jX\\\",\\\"razorpay_order_id\\\":\\\"order_QHc1G3saF9roRj\\\",\\\"razorpay_signature\\\":\\\"61aba5c6d1433c61a690de3bfe8749eb024871372fb1ea59338c21e93b617bdf\\\",\\\"amount\\\":70000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 22:35:46', '2025-04-10 22:35:46'),
(140, 241, 519, 'pay_QHc282rfbbBxYD', 'order_QHc23gzd2fOk6U', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHc282rfbbBxYD\\\",\\\"razorpay_order_id\\\":\\\"order_QHc23gzd2fOk6U\\\",\\\"razorpay_signature\\\":\\\"99d237a6a377a0f5009432f395cc649c2eb9793142deea13ae86197da3ab04bd\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 22:36:26', '2025-04-10 22:36:26'),
(141, 242, 395, 'pay_QHc2nZaYorocRY', 'order_QHc2hvi7q0h0F6', 'Paid', 12000.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHc2nZaYorocRY\\\",\\\"razorpay_order_id\\\":\\\"order_QHc2hvi7q0h0F6\\\",\\\"razorpay_signature\\\":\\\"eda06329f3c587eebf8379ca32153bc68d23f71ea7a0fa39a03167ef58b6bd85\\\",\\\"amount\\\":1200000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 22:37:04', '2025-04-10 22:37:04'),
(142, 243, 521, 'pay_QHc3VH0ncBUfhw', 'order_QHc3QXdMHCS6Cc', 'Paid', 1257.30, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHc3VH0ncBUfhw\\\",\\\"razorpay_order_id\\\":\\\"order_QHc3QXdMHCS6Cc\\\",\\\"razorpay_signature\\\":\\\"17ce9da809781b8e8b28576e03f856e149e462c08a8316fa9288d77f9853506c\\\",\\\"amount\\\":125730,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 22:37:44', '2025-04-10 22:37:44'),
(143, 244, 521, 'pay_QHc4DrGsVlSKUj', 'order_QHc49CjRfzfKj2', 'Paid', 1101.27, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHc4DrGsVlSKUj\\\",\\\"razorpay_order_id\\\":\\\"order_QHc49CjRfzfKj2\\\",\\\"razorpay_signature\\\":\\\"e425caae8ae1ac702d37b1ac09ec7c0edad8a815f034413376726fd397cd9af6\\\",\\\"amount\\\":110127,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-10 22:38:25', '2025-04-10 22:38:25'),
(144, 245, 520, 'pay_QHidoKx3rA2w11', 'order_QHidhgKKS4h4S4', 'Paid', 600.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHidoKx3rA2w11\\\",\\\"razorpay_order_id\\\":\\\"order_QHidhgKKS4h4S4\\\",\\\"razorpay_signature\\\":\\\"7fa1c7075cbf178fb9ba40bb0e6f73f5cb5e9766806d58ce39150c53e71a270f\\\",\\\"amount\\\":60000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-11 05:04:16', '2025-04-11 05:04:16'),
(147, 3, 520, 'pay_QHlgBcQ61c2pzv', 'order_QHlg5BnIniytbD', 'Paid', 800.00, 'INR', '\"{\\\"razorpay_payment_id\\\":\\\"pay_QHlgBcQ61c2pzv\\\",\\\"razorpay_order_id\\\":\\\"order_QHlg5BnIniytbD\\\",\\\"razorpay_signature\\\":\\\"9e6e2824e04320c4b049c9bbd074605c33f1bcadfcf62205cd42568e66c617bc\\\",\\\"amount\\\":80000,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09978835005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Banglore\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"560100\\\"}\"', '2025-04-11 08:02:36', '2025-04-11 08:02:36');

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
  `slug` varchar(255) DEFAULT NULL,
  `product_type` varchar(100) NOT NULL DEFAULT 'Default',
  `metal_type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `width` varchar(20) DEFAULT NULL,
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
(395, 'Customize Neon', 'customize-neon', 'Neon', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Test2</p>', 'test', 'test', '373', 600.00, NULL, 296, 57, NULL, 'No', 'woodframe_001', NULL, 'Yes', 86, 1, '2025-03-26 09:55:53', '2025-04-11 05:25:08'),
(504, 'Common', 'common', 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 700.00, NULL, 297, 60, NULL, 'No', 'metalframe_001', NULL, 'Yes', 100, 1, '2025-03-31 05:51:08', '2025-03-31 05:55:57'),
(505, 'Tshirt', 'tshirt', 'Customize', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 800.00, NULL, 297, 60, NULL, 'No', 'metalframe_0012', NULL, 'Yes', 50, 1, '2025-03-31 05:54:23', '2025-04-09 22:18:20'),
(519, 'test', 'test', 'Customize', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 800.00, NULL, 297, 60, NULL, 'No', NULL, NULL, 'Yes', 93, 1, '2025-04-02 00:25:08', '2025-04-10 22:36:26'),
(520, 'Mouse Pad', 'mouse-pad', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 700.00, NULL, 298, 61, NULL, 'No', 'metalframe_001', NULL, 'Yes', 84, 1, '2025-04-06 20:35:09', '2025-04-11 08:02:36'),
(521, 'Key Chain', 'key-chain', 'Customize', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 700.00, NULL, 298, 61, NULL, 'No', 'metalframe_001', NULL, 'Yes', 91, 1, '2025-04-06 20:44:43', '2025-04-10 22:38:25'),
(525, 'Mukesh Bhavsar', 'mukesh-bhavsar', 'Default', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>t</p>', 't', 't', '', 700.00, NULL, 298, 53, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-10 19:25:36', '2025-04-10 19:25:36');

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
(448, 504, 'common_1_1743420068.jpg', NULL, NULL, NULL, NULL, NULL, '2025-03-31 05:51:09', '2025-03-31 05:51:09'),
(449, 505, 'tshirt_1_1743420263.jpg', NULL, NULL, NULL, NULL, NULL, '2025-03-31 05:54:24', '2025-03-31 05:54:24'),
(463, 519, 'test_1_1743573308.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-02 00:25:08', '2025-04-02 00:25:08'),
(464, 520, 'mouse-pad_1_1743991509.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-06 20:35:09', '2025-04-06 20:35:09'),
(465, 521, 'key-chain_1_1743992083.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-06 20:44:44', '2025-04-06 20:44:44'),
(469, 525, 'mukesh-bhavsar_1_1744332936.png', NULL, NULL, NULL, NULL, NULL, '2025-04-10 19:25:40', '2025-04-10 19:25:40');

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
(1, 'Heaven Prints', 'Customized Neon and Frames', 'Hello', 'Heaven Prints.jpg', '9924489907', '9924489907', 'info@heavenprints.in', 'Shahpur, Ahmedabad', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, '2025-04-04 23:10:12');

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
(51, 'Metal Prints', 'metal-prints', '_1743252178.JPG', 1, 'Yes', 298, '2025-03-25 04:17:20', '2025-04-06 21:18:30'),
(53, 'Canvas Print', 'canvas-print', '_1743080632.jpg', 1, 'Yes', 298, '2025-03-26 06:09:30', '2025-04-06 21:18:43'),
(54, 'Woods', 'woods', '_1743080624.jpg', 1, 'Yes', 298, '2025-03-26 09:54:38', '2025-04-06 21:18:53'),
(57, 'Customize Neon', 'customize-neon', 'neon_1743085610.jpg', 1, 'Yes', 296, '2025-03-27 08:56:50', '2025-03-27 09:09:30'),
(60, 'Common', 'common', '_1744087955.jpg', 1, 'Yes', 297, '2025-03-31 05:50:36', '2025-04-07 23:22:35'),
(61, 'Customize Products', 'customize-products', 'customize-products_1743990448.jpg', 1, 'Yes', 298, '2025-04-06 20:17:30', '2025-04-06 20:17:30');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `status`, `role`, `email_verified_at`, `password`, `remember_token`, `is_protected`, `created_at`, `updated_at`, `otp`, `otp_expires_at`) VALUES
(7, 'Mukesh', 'Bhavsar', 'mukeshbhavsar210@gmail.com', NULL, 1, 2, NULL, '$2y$10$atts/65kfJw0YoA6jw3f2.U0XsNfRera0pwSXdTRmdlQHmvpAIHK2', NULL, 1, '2023-12-19 07:11:37', '2023-12-19 07:11:37', NULL, NULL),
(30, 'Dhruv', 'Bhavsar', 'dhruvbhavsar210@gmail.com', NULL, 1, 1, NULL, '$2y$10$CINsltt2MKGU/BTfWGEQgex3wlwhdvt9.uLROJuwhZ48SezK.b1ia', NULL, 0, '2025-02-17 01:03:07', '2025-03-31 02:03:54', NULL, NULL),
(38, 'Priyanka', 'Bhavsar', 'p.bhavsar2610@gmail.com', '09978835005', 1, 2, NULL, '$2y$10$mdQmbXEsrP39cT0gXXoaEeP7Pr3mX.Ex81j5avMRs4uZrjD3CopQe', NULL, 0, '2025-03-31 04:38:32', '2025-03-31 04:38:32', NULL, NULL),
(39, 'Jay', 'Shrimali', 'jay@gmail.com', '9978812345', 1, 1, NULL, '$2y$10$OZwZ23bg01WA.1t3ZnSnnOBZa.500oyrNwxv9AiXIkYbfkpvvGsJi', NULL, 0, '2025-04-01 22:30:27', '2025-04-01 22:30:27', NULL, NULL);

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
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(47, 30, 521, '2025-04-11 05:54:58', '2025-04-11 05:54:58'),
(48, 30, 525, '2025-04-11 05:55:22', '2025-04-11 05:55:22');

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
  ADD KEY `orders_product_id_foreign` (`product_id`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
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
