-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2025 at 07:58 AM
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
  `showHome` varchar(255) NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `banner_slug`, `description`, `image`, `showHome`, `created_at`, `updated_at`) VALUES
(37, 'Personalized Gift', 'personalized-gift', NULL, 'personalized-gift.jpg', 'Yes', '2025-04-08 11:43:47', '2025-04-08 11:43:48');

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
(9, 'Light Green', '#63fdb5', 'Yes', '2025-04-05 15:45:39', '2025-04-05 15:45:39'),
(10, 'White', '#fafafa', 'Yes', '2025-04-13 12:13:41', '2025-04-13 12:13:41');

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
(1, 'Gujarat', 'GJ', NULL, NULL),
(2, 'Karnataka', 'KA', NULL, NULL),
(3, 'Other state', 'OS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `apartment` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `delivery_at` enum('home','office') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `country_id`, `address`, `apartment`, `city`, `zip`, `notes`, `type`, `delivery_at`, `created_at`, `updated_at`) VALUES
(1, 30, 1, 'Shlok Heights', 'Shlok heights', 'Ahmedabad', '380019', NULL, 'home', 'home', NULL, NULL),
(20, 46, 1, 'B-1003, Shlok heights, Mansarovar road, Next to Mirada Hall', 'Shlok', 'Ahmedabad', '382424', NULL, 'home', NULL, '2025-04-15 12:31:12', '2025-04-15 12:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `customizes`
--

CREATE TABLE `customizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customizes`
--

INSERT INTO `customizes` (`id`, `name`, `price`, `image`, `category`, `type`, `created_at`, `updated_at`) VALUES
(5, 'Square', '700', NULL, 'first', 'shape', '2025-04-17 05:22:21', '2025-04-17 05:22:21');

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
(64, 524, NULL, 'Square', '10\" x 10\"', '2171.00', NULL, NULL, '2025-04-08 14:14:15', '2025-04-08 14:14:15'),
(65, 521, NULL, NULL, NULL, '599.00', NULL, NULL, '2025-04-09 04:31:43', '2025-04-09 04:31:43'),
(66, 525, NULL, 'Square', '10\" x 10\"', '955.00', NULL, NULL, '2025-04-09 05:15:34', '2025-04-09 05:15:34');

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

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`id`, `code`, `name`, `description`, `max_uses`, `max_uses_user`, `type`, `discount_amount`, `min_amount`, `status`, `starts_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(11, 'HEAVEN99', 'Holi Celerbration', 'Holi Celebration Coupon', '100', '5', 'fixed', 99.00, 1000.00, 1, '2025-04-10 12:01:48', '2025-04-30 05:00:52', '2025-04-10 06:32:02', '2025-04-14 06:34:31');

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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_code_id` int(11) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `grandtotal` double(10,2) NOT NULL,
  `shipped_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `country_id`, `subtotal`, `shipping`, `coupon_code`, `coupon_code_id`, `discount`, `qty`, `price`, `grandtotal`, `shipped_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 46, 514, 1, 1.00, 0.00, '', NULL, 0.00, NULL, NULL, 1.00, '2025-04-13 07:31:58', 'pending', '2025-04-13 07:31:58', '2025-04-13 07:31:58'),
(3, 46, 514, 1, 1.00, 0.00, '', NULL, 0.00, NULL, NULL, 1.00, '2025-04-13 07:35:57', 'pending', '2025-04-13 07:35:57', '2025-04-13 07:35:57'),
(4, 46, 514, 1, 1.00, 0.00, '', NULL, 0.00, 1, 1.00, 1.00, '2025-04-15 11:23:34', 'pending', '2025-04-15 11:23:34', '2025-04-15 11:23:34');

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
  `selected_product` varchar(100) DEFAULT NULL,
  `selected_product_name` varchar(100) DEFAULT NULL,
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
(102, 3, 514, 'Key-Chain', 'Default', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 1.00, 1.00, '2025-04-13 07:35:57', '2025-04-13 07:35:57'),
(103, 4, 514, 'Key-Chain', 'Default', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 1, 1.00, 1.00, '2025-04-15 11:23:34', '2025-04-15 11:23:34');

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
  `payment_mode` varchar(255) DEFAULT NULL,
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

INSERT INTO `payments` (`id`, `order_id`, `product_id`, `razorpay_payment_id`, `razorpay_order_id`, `payment_mode`, `status`, `amount`, `currency`, `payment_data`, `created_at`, `updated_at`) VALUES
(115, 2, 514, 'pay_QISavr1NllNDhc', 'order_QISatNd5ruZpkf', 'Online', 'Paid', 1.00, 'INR', '\"{\\\"razorpay_order_id\\\":\\\"order_QISatNd5ruZpkf\\\",\\\"razorpay_payment_id\\\":\\\"pay_QISavr1NllNDhc\\\",\\\"razorpay_signature\\\":\\\"190155a9e77431a9c53ca6f1e6217830759da58ab8efaadd78252ac93f0e181b\\\",\\\"amount\\\":100,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-04-13 07:31:58', '2025-04-13 07:31:58'),
(116, 3, 514, 'pay_QISfKgyrlZhir5', 'order_QISfILcox93aYm', 'Online', 'Paid', 1.00, 'INR', '\"{\\\"razorpay_order_id\\\":\\\"order_QISfILcox93aYm\\\",\\\"razorpay_payment_id\\\":\\\"pay_QISfKgyrlZhir5\\\",\\\"razorpay_signature\\\":\\\"068f131e618e9a0fc8ff8670e6c2ce467fb1f8b5a2d554f37776bb0175eb6dd0\\\",\\\"amount\\\":100,\\\"first_name\\\":\\\"Dhruv\\\",\\\"last_name\\\":\\\"Bhavsar\\\",\\\"email\\\":\\\"dhruvbhavsar210@gmail.com\\\",\\\"mobile\\\":\\\"09916235005\\\",\\\"address\\\":\\\"Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,\\\",\\\"order_notes\\\":null,\\\"apartment\\\":null,\\\"city\\\":\\\"Ahmedabad\\\",\\\"country\\\":\\\"1\\\",\\\"zip\\\":\\\"382424\\\"}\"', '2025-04-13 07:35:57', '2025-04-13 07:35:57'),
(117, 4, 514, 'pay_QJJbqdsOFdm3PH', 'order_QJJbkXc6aFwLgy', 'Online', 'Paid', 1.00, 'INR', '\"{\\\"razorpay_order_id\\\":\\\"order_QJJbkXc6aFwLgy\\\",\\\"razorpay_payment_id\\\":\\\"pay_QJJbqdsOFdm3PH\\\",\\\"razorpay_signature\\\":\\\"b8ed1c581580d549f82599c86ff5a509d021722a9691891e96e01e98458caff1\\\",\\\"amount\\\":100,\\\"address_type\\\":\\\"home\\\",\\\"order_notes\\\":\\\"I want my order at home\\\",\\\"country\\\":\\\"1\\\"}\"', '2025-04-15 11:23:34', '2025-04-15 11:23:34');

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
  `product_type` varchar(100) NOT NULL DEFAULT 'Default',
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
(395, 'Customize Neon', 'customize-neon', 'Neon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Test2</p>', 'test', 'test', '', 600.00, NULL, 296, 57, NULL, 'No', 'woodframe_001', NULL, 'Yes', 92, 1, '2025-03-26 09:55:53', '2025-04-02 08:23:33'),
(509, 'Personlized Mug', 'personlized-mug', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<div class=\"LT6XE\" style=\"display: flow-root; overflow-y: clip; position: relative; overflow-wrap: break-word; max-width: 632px; min-width: 0px; flex: 1 1 0%; color: rgb(0, 29, 53); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 18px;\"><div jsname=\"dvXlsc\" class=\"f5cPye\" data-rl=\"en\" data-lht=\"658\" style=\"letter-spacing: var(--m3t13);\"><div><div class=\"WaaZC\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><div class=\"rPeykc uP58nb\" data-hveid=\"CAwQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQo_EKegQIDBAB\" style=\"margin: 20px 0px 10px; font-size: var(--m3t5); letter-spacing: 0px; line-height: var(--m3t6);\"><span data-huuid=\"554728419806368139\">Here\'s a more detailed explanation:</span></div></div></div><div class=\"WaaZC\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><ul jscontroller=\"M2ABbc\" jsaction=\"jZtoLb:SaHfyb\" data-hveid=\"CDUQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQm_YKegQINRAB\" style=\"margin: 10px 0px 20px; padding: 0px 0px 0px 24px; font-size: var(--m3t7); line-height: var(--m3t8);\"><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 0px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806369926\"><strong>Personalized:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806367791\">This means something is made or adapted to suit a particular person\'s needs or preferences.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"d14ffc3e-aee5-4c60-b663-276f758d49a4\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"d14ffc3e-aee5-4c60-b663-276f758d49a4\" data-uuids=\"554728419806369926,554728419806367791\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CBEQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIERAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806371713\"><strong>Mug:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806369578\">A type of drinking cup, typically made of ceramic or porcelain, with a handle and a wide opening.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"947f4353-a38a-488c-8a1c-8c3dcfdd4909\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"947f4353-a38a-488c-8a1c-8c3dcfdd4909\" data-uuids=\"554728419806371713,554728419806369578\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCwQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQILBAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806369404\"><strong>Personalized Mug:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806371365\">A mug that is customized with something specific, such as:</span><ul jscontroller=\"M2ABbc\" jsaction=\"jZtoLb:SaHfyb\" data-hveid=\"CDEQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQm_YKegQIMRAB\" style=\"margin-top: 8px !important; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px 0px 0px 24px; font-size: var(--m3t7) !important; line-height: var(--m3t8) !important;\"><li style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806369056\"><strong>Name:</strong>&nbsp;</span><span data-huuid=\"554728419806371017\">The recipient\'s name or a nickname.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"a8b5a825-6a5c-46bc-98f0-a09d331b7285\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"a8b5a825-6a5c-46bc-98f0-a09d331b7285\" data-uuids=\"554728419806369056,554728419806371017\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CC0QAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQILRAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li><li style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806370843\"><strong>Photo:</strong>&nbsp;</span><span data-huuid=\"554728419806368708\">A picture of a loved one, a special memory, or a favorite image.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"47336aed-c79a-4667-987a-5dd558297c7c\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"47336aed-c79a-4667-987a-5dd558297c7c\" data-uuids=\"554728419806370843,554728419806368708\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCAQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIIBAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li><li style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806368534\"><strong>Design:</strong>&nbsp;</span><span data-huuid=\"554728419806370495\">A unique pattern, quote, or illustration.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"e814554e-3062-4d2b-a9db-35ab38b23d5e\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"e814554e-3062-4d2b-a9db-35ab38b23d5e\" data-uuids=\"554728419806368534,554728419806370495\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCYQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIJhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li><li style=\"margin: 0px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: disc;\"><span data-huuid=\"554728419806370321\"><strong>Custom Definition:</strong>&nbsp;</span><span data-huuid=\"554728419806368186\">A personalized definition of a name or a person.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"1b5bd68f-bc59-47be-bbff-c58fa6da99f0\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"1b5bd68f-bc59-47be-bbff-c58fa6da99f0\" data-uuids=\"554728419806370321,554728419806368186\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CCoQAQ\" data-ved=\"2ahUKEwjR7LzR57mMAxU-R2wGHfcDA-kQ3fYKegQIKhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></li></ul></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"554728419806368012\"><strong>Purpose:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"554728419806369973\">Personalized mugs are often given as gifts for special occasions or to show appreciation for someone.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"979d75b8-4d4c-4b33-aa32-a87a58d5cf39\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;</span></span></span></div></div></div></div></li></ul></div></div></div></div></div>', 'A \"personalized mug\" in refers to a mug that has been customized or made unique with specific details, like a name, a photo, or a special design, often as a gift or a keepsake.', NULL, '509,510', 185.00, 275.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-02 17:05:54', '2025-04-15 17:28:11'),
(510, 'Magic Mug', 'magic-mug', 'Customize', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<div class=\"WaaZC\" style=\"color: rgb(0, 29, 53); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 18px;\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><div class=\"rPeykc uP58nb\" data-hveid=\"CAMQAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Qo_EKegQIAxAB\" style=\"margin: 20px 0px 10px; font-size: var(--m3t5); letter-spacing: 0px; line-height: var(--m3t6);\"><span data-huuid=\"513628392670010182\">Here\'s a more detailed explanation:</span></div></div></div><div class=\"WaaZC\" style=\"color: rgb(0, 29, 53); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 18px;\"><div class=\"RJPOee EIJn2\" style=\"animation: auto ease 0s 1 normal none running none !important; color: var(--m3c11);\"><ul jscontroller=\"M2ABbc\" jsaction=\"jZtoLb:SaHfyb\" data-hveid=\"CCQQAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Qm_YKegQIJBAB\" style=\"margin: 10px 0px 20px; padding: 0px 0px 0px 24px; font-size: var(--m3t7); line-height: var(--m3t8);\"><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 0px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670009787\"><strong>How it works:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670008290\">Magic mugs are coated with a special type of paint called thermochromic ink, which is sensitive to temperature.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"c3d71eb5-49ce-455a-b78c-465bd9a61fc4\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"c3d71eb5-49ce-455a-b78c-465bd9a61fc4\" data-uuids=\"513628392670009787,513628392670008290\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CB4QAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIHhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670009392\"><strong>The \"magic\":</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670007895\">When a hot liquid is poured into the mug, the temperature change causes the thermochromic ink to change color, revealing a hidden image or design underneath.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"fb520e3e-862e-44d3-9700-231fadd36f65\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"fb520e3e-862e-44d3-9700-231fadd36f65\" data-uuids=\"513628392670009392,513628392670007895\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CB0QAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIHRAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670008997\"><strong>Other names:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670007500\">Magic mugs are also known as heat-changing, transforming, or disappearing mugs.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"c00585cc-8311-46f0-9f18-4a1d63d500c8\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"c00585cc-8311-46f0-9f18-4a1d63d500c8\" data-uuids=\"513628392670008997,513628392670007500\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CB8QAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIHxAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px 0px 8px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670008602\"><strong>Customization:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670011201\">Magic mugs are often personalized with photos, designs, or messages, making them a unique and fun gift option.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"a9a04b91-a0fc-4dcd-80d1-872d64b42b59\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;<div class=\"NPrrbc\" data-cid=\"a9a04b91-a0fc-4dcd-80d1-872d64b42b59\" data-uuids=\"513628392670008602,513628392670011201\" style=\"margin-right: 6px; display: inline-flex;\"><div jsname=\"HtgYJd\" class=\"BMebGe btku5b fCrZyc LwdV0e FR7ZSc OJeuxf\" aria-label=\"View related links\" role=\"button\" tabindex=\"0\" jsaction=\"KjsqPd\" data-hveid=\"CBoQAQ\" data-ved=\"2ahUKEwjX5tvw7bmMAxV8T2cHHa47De4Q3fYKegQIGhAB\" style=\"display: inline-block; vertical-align: middle; outline: 0px; -webkit-tap-highlight-color: transparent; color: var(--rrJJUc);\"><div class=\"niO4u\" style=\"display: flex; justify-content: center; position: relative; align-items: stretch; width: 28px; background-color: transparent; border-radius: 9999px; margin: 0px auto; outline: transparent solid 1px; outline-offset: -1px; height: 20px; min-height: 20px;\"><div class=\"kHtcsd\" style=\"display: flex; align-items: center; justify-content: center; width: 28px; border-radius: 9999px; height: 20px;\"><span class=\"d3o3Ad gJdC8e Hkv2Pe\" style=\"color: rgb(11, 87, 208); background: unset !important; display: flex; align-items: center; margin: 0px;\"><span class=\"iPjmzb Sorfoc gNGSDf\" style=\"display: flex; height: unset; rotate: 135deg;\"><span class=\"z1asCe Sb7k4e\" style=\"display: inline-block; fill: currentcolor; height: 18px; line-height: 18px; position: relative; width: 18px;\"><svg focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z\"></path></svg></span></span></span></div></div></div></div></span></span></span></div></div></div></div></li><li class=\"K3KsMc\" style=\"margin: 0px; padding: 0px 0px 0px 4px; list-style-position: inherit; list-style-image: inherit; list-style-type: none;\"><div class=\"zMgcWd dSKvsb\" data-il=\"\" style=\"padding-bottom: 0px; padding-top: 8px; border-bottom: none; margin-left: -28px;\"><div data-crb-p=\"\"><div class=\"xFTqob\" style=\"flex: 1 1 0%; min-width: 0px;\"><div class=\"Gur8Ad\" style=\"font-size: var(--m3t11); line-height: var(--m3t12); overflow: hidden; padding-bottom: 4px; transition: transform 200ms cubic-bezier(0.2, 0, 0, 1);\"><span data-huuid=\"513628392670008207\"><strong>Material:</strong></span></div><div class=\"vM0jzc\" style=\"color: var(--m3c10); font-size: var(--m3t7); letter-spacing: 0.1px; line-height: var(--m3t8);\"><span data-huuid=\"513628392670010806\">They are usually made of ceramic or other materials with low thermal conductivity.<span jscontroller=\"JHnpme\" class=\"pjBG2e\" data-cid=\"f4ccab0d-ab24-442e-bc81-0a8f227e4abf\" jsaction=\"rcuQ6b:npT2md\"><span class=\"UV3uM\" style=\"text-wrap-mode: nowrap;\">&nbsp;</span></span></span></div></div></div></div></li></ul></div></div>', 'A \"magic mug\" is a mug that changes color or reveals a hidden image when filled with a hot liquid, using thermochromic ink that is sensitive to temperature changes.', NULL, '509', 299.00, 399.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-02 17:23:09', '2025-04-15 17:27:35'),
(512, 'Mouse Pad', 'mouse-pad', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>details : Add a touch of design and elegance to your workspace with personalised mouse pads</p><p>Want to elevate the look of your desk? Custom Mouse pads for laptop or desktops are a great way to reflect your personality and add a bit of branding to your workspace. Add your memorable photo or choose from readymade templates or design options and start customising a mouse pad online. With our full-color printing, your photos will come out looking great.</p><p><br></p><p>A good quality printed mousepad by Vistaprint can certainly be a great gifting option to employees, clients, friends and family. Mouse pads with company logo, image and message are an ideal corporate gift that keep your brand on top of your client’s mind.</p><p><br></p><p>We use dye-sublimation technique for mouse mat printing, which gives a permanent and durable print output. The mouse pad has a rubber anti-slip bottom which provides adequate grip when the pad is placed on your office/study table / any other surface near your laptop. The top of the surface has a fabric finish for precise mouse control and better glide. High-quality top and bottom surfaces of the personalized mouse pad makes it ideal for daily and long usage.</p><p><br></p><p>It is quite easy to print your mouse pad design online at Vistaprint. After you have selected the type of mouse mat, start customizing it by adding your name, message or image or choose from hundreds of readymade templates or design options. You can also choose from color and theme options. Next, sit back and relax while we print your unique personalised mouse pad!</p><p><br></p><p>For Bulk orders exceeding Rs. 10,000 in value, contact our Customer Care for any assistance.</p><p><br></p><p>Premium Quality at Best Price</p><p><br></p><p>Even Low Quantities @ Best Prices - We offer low/ single product quantities at affordable prices.</p><p>High quality products and Easy design - Our wide selection of high-quality products and online design tools make it easy for you to customize and order your favourite products</p><p>Creative ways to use your Custom Mouse Pads.</p><p><br></p><p>Are you looking for something specific? Check out these on-trend templates for top industries – Accounting &amp; Tax Advice, Web Design &amp; Hosting, Information &amp; Technology, Modern &amp; Simple, Travel &amp; Accommodation, Cosmetics &amp; Perfume, Finance &amp; Insurance, Furniture &amp; Home Goods, Software Development and More.</p><p><br></p><p>Vistaprint India customizes all its products in facilities located within India. Some of our raw materials, intermediate components, and consumables used in the manufacturing of the final product could be from one or more countries. As we follow Global Sourcing, one product is likely to have a different country of origin depending on the batch sold.</p><p><br></p><p>Country of origin: China</p><p><br></p><p>Vistaprint offers Custom Mouse Pads design templates in assorted styles.</p><p>Mouse pads</p><p>Related products</p>', 'Custom Mouse Pads\r\nProfessional and practical, custom mouse pads are a great gift for customers, employees or family.\r\nPersonalise with a photo, logo or message\r\nWith dye-sublimation printing, a smooth feel and rounded corners', NULL, '512', 199.00, 299.00, 297, 67, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 16:50:25', '2025-04-08 18:09:26'),
(513, 'Personalized Moon Lamp', 'personalized-moon-lamp', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><span style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">Moon lamps with a photo are a unique and personalized item</span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">&nbsp;that can make a great gift or decoration for your home. Moon lamps come with pre-designed images</span></p><p><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">moon lamps can be used for a variety of purposes, such as&nbsp;</span><span style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">providing ambient lighting in a bedroom or living room</span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">, serving as a night light for children</span></p><p><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">Illuminate special occasions with our enchanting Moon Light Lamp.&nbsp;</span><span style=\"font-weight: bold; color: rgb(118, 118, 118); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">Customize with names, messages, and photos</span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\">&nbsp;for a unique and heartfelt gift.</span></p><p><span style=\"background-color: rgb(243, 245, 246);\"><font color=\"#474747\" face=\"Arial, sans-serif\"><span style=\"font-size: 14px;\">Discover the magic of personalization with the HM3Design Personalized 3D Moon Night Lamp. This enchanting lamp allows you to turn your favorite photo and heartfelt message into a glowing memory that will shine through the years.</span></font></span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\"></span><span style=\"color: rgb(71, 71, 71); font-family: Arial, sans-serif; font-size: 14px; background-color: rgb(243, 245, 246);\"></span></p>', 'The best way to express your feelings through this eye gazing piece is a perfect Personalized Gift for Anniversary, Wedding, Engagement, Valentine, Birthday', NULL, '513', 999.00, 1099.00, 297, 66, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 17:23:04', '2025-04-13 13:29:00'),
(514, 'Key-Chain', 'key-chain', 'Customize', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Here\'s a more detailed breakdown:</p><p>Meaning and Purpose:</p><p>Keepsake and Reminders: Personalized keychains can act as a tangible reminder of a special memory, relationship, or event.&nbsp;</p><p>Sentimental Value: They can hold significant emotional meaning, representing shared experiences, inside jokes, or a special bond.&nbsp;</p><p>Practical Function: Beyond their sentimental value, keychains serve the practical purpose of holding and organizing keys.&nbsp;</p><p>Gifts: Personalized keychains are a popular choice for gifts, suitable for various occasions and recipients.&nbsp;</p><p>Promotional Items: Businesses and organizations can use personalized keychains as promotional items to increase brand visibility.&nbsp;</p><p>Customization Options:</p><p>Name or Initials: Keychains can be personalized with a name, initials, or a special phrase.&nbsp;</p><p>Photos: You can add a photo to the keychain to create a unique and personal keepsake.&nbsp;</p><p>Designs: Keychains can be customized with various designs, logos, or symbols.&nbsp;</p><p>Materials: Keychains come in various materials, such as metal, leather, or wood, allowing for a range of styles and aesthetics.&nbsp;</p><p>Benefits of Gifting a Personalized Keychain:</p><p>Thoughtful and Personal: A personalized keychain demonstrates care and thoughtfulness, making it a special and memorable gift.&nbsp;</p><p>Versatile Gift: Keychains are a versatile gift option, suitable for people of all ages and interests.&nbsp;</p><p>Affordable and Practical: Personalized keychains are often affordable and practical, making them a great gift for any occasion.&nbsp;</p><p>Daily Reminder: The recipient will use the keychain daily, serving as a constant reminder of the gift and the giver.</p>', 'A personalized keychain, whether with a name, photo, or design, becomes a unique and meaningful gift, serving as a keepsake, a reminder of a special connection, or a practical tool for organizing keys', NULL, '514', 128.00, 159.00, 297, 64, NULL, 'No', NULL, NULL, 'Yes', 95, 1, '2025-04-03 17:44:52', '2025-04-15 17:35:39'),
(515, 'Printed Mouse pad', 'printed-mouse-pad', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'brings you an opportunity to customise your very own mouse pad with your best photos, logo, caption or brand name. With our printing technique', NULL, '512', 189.00, 289.00, 297, 67, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:03:05', '2025-04-15 17:38:38'),
(516, 'Gaming Mouse Pad', 'gaming-mouse-pad', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Personalized/Customized Gaming Mouse Pad for Laptop/Computer and Water Resistance Coating Natural Rubber Non Slippery Rubber Base (You Think I Print)</p>', '<br>', NULL, '512,515', 199.00, 299.00, 297, 67, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:09:19', '2025-04-15 17:38:06'),
(517, 'Love Couple Moon Lamp', 'love-couple-moon-lamp', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Love Moon Couple for Gift, Decoration, Night Lamp, Love Proposal, Valentine Fift, Home Decor</p>', '<br>', NULL, '513', 1099.00, 1199.00, 297, 66, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:17:13', '2025-04-15 17:42:17'),
(518, 'Paint Your Own Moon Decorative Lamp', 'paint-your-own-moon-decorative-lamp', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shop Paint Your Own Moon Lamp Kit Cool Gifts Diy 3d at best prices at Desertcart INDIA. ✓', NULL, '513,517', 1080.00, 1199.00, 297, 66, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:29:03', '2025-04-13 13:27:01'),
(519, 'Metal Panel Photo Prints', 'metal-panel-photo-prints', 'Default', 'Metal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Here\'s a more detailed breakdown:</p><p>What they are:</p><p>Metal prints are images printed directly onto a metal surface, typically aluminum, using a special printing process.&nbsp;</p><p>Why they are used:</p><p>Modern and Sleek Look: They offer a contemporary and stylish way to display photos and artwork.&nbsp;</p><p>Durability: Metal prints are known for their durability, scratch resistance, and resistance to fading, making them a long-lasting option.&nbsp;</p><p>Vibrant Colors: They produce vibrant and high-definition images with rich color saturation.&nbsp;</p><p>No Glare: Metal prints often have a matte finish, which helps to reduce glare and reflections.&nbsp;</p><p>Versatility: They can be used for various purposes, including home decor, office spaces, and unique gifts.&nbsp;</p><p>Easy to Hang: Metal prints are lightweight and easy to hang, and they don\'t require additional framing.&nbsp;</p><p>Where to use them:</p><p>Home Decor: Metal prints can be used to decorate walls, create gallery walls, or add a focal point to a room.&nbsp;</p><p>Office Spaces: They can add a touch of elegance and sophistication to office environments.&nbsp;</p><p>Gifts: Metal prints make unique and memorable gifts for special occasions.&nbsp;</p><p>Bathrooms: They are waterproof and ideal for bathrooms, where moisture buildup is a concern.&nbsp;</p><p>Outdoor Spaces: Metal prints are weather-resistant and can be used in outdoor spaces like patios or balconies.&nbsp;</p><p>Types of Metal Prints:</p><p>Aluminum Prints: A common type of metal print using aluminum panels.&nbsp;</p><p>HD Metal Prints: Known for their high-definition image quality.&nbsp;</p><p>Brushed Aluminum Prints: Offer a subtle metallic sheen.&nbsp;</p><p>DiBond Prints: A type of metal print where the print is bonded to a metal core.</p>', 'Metal printed frames, also known as metal photo prints or aluminum prints, are used to display photos and artwork, offering a modern, durable, and vibrant alternative to traditional framed prints', NULL, '519', 512.00, 599.00, 266, 51, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-03 18:42:16', '2025-04-13 13:26:26'),
(521, 'Elegant Thin Metal Frame for Posters & Photos', 'elegant-thin-metal-frame-for-posters-photos', 'Default', 'Metal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>The Advantages. Metal frames are popular for their light weight and sleek looks. Add a few more attractive features and you get your perfect pair of glasses.</p><p>Structural metal stud framing refers to the construction of walls and planes using cold-formed steel components. There are two main components of metal stud framing, a stud and a track. Heavier gauge metal studs are used in load bearing walls and structural applications such as exterior walls.</p><p><br></p>', NULL, NULL, '519', 599.00, 829.00, 266, 51, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 17:53:56', '2025-04-13 13:26:03'),
(522, 'Metal Poster Frame | Aluminum Frame for Pictures & Photos', 'metal-poster-frame-aluminum-frame-for-pictures-photos', 'Default', 'Metal', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>What are you framing?</p><p>Upload a digital photo for us to print and frame or share a photo of your physical piece to mail in or drop off at a store.</p><p><font color=\"#001d35\" face=\"Google Sans, Arial, sans-serif\"><span style=\"font-size: 18px;\">Metal prints are personalized, frameless art pieces printed on aluminum, offering durability, vibrant colors, and a modern look, suitable for various purposes like home decor, gifts, and even outdoor signage</span></font></p>', NULL, NULL, '519,521', 521.00, 805.00, 266, 51, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:06:43', '2025-04-13 13:25:41'),
(523, 'Custom Metal Prints', 'custom-metal-prints', 'Default', 'Metal', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p><br></p><p>Your memories get better with quality and colour!</p><p><br></p><p>Metal prints are a premium quality photo prints on metal that allows displaying your favourite photos with the least glare and best vibrancy in colours even from a distance. You can print anything on custom metal prints from pictures from your holidays to birthday parties or anniversary pictures. You can also gift some memories printed on metal prints to stand out from the generic ones.</p><p><br></p><p>Customising options are varying with us; hence they make your interior look splendid and striking even if you have coloured walls. To make things more eye-catching, you can choose brightly coloured photos to print on metal photo prints to stand out from the coloured walls</p>', NULL, NULL, '519,521,522', 512.00, 799.00, 266, 51, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:15:50', '2025-04-13 13:25:07');
INSERT INTO `products` (`id`, `name`, `slug`, `product_type`, `metal_type`, `size`, `sizes`, `color`, `colors`, `height`, `width`, `font`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(524, 'Acrylic Photo Prints', 'acrylic-photo-prints', 'Default', 'Acrylic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Create Stunning Acrylic Photo Prints for Home or Office.</p><p>Showcase your favourite photos with our premium custom acrylic photo prints, meticulously crafted to highlight the vibrant details and rich colours of your images. Perfect for adding a touch of elegance to both home and office spaces, these acrylic picture prints offer a sleek, modern finish that seamlessly complements any décor. With our easy-to-use online acrylic photo printing service, you can personalise your prints to suit your unique style, making them not only a striking addition to your walls but also a thoughtful and personalised gift for loved ones. The thick, durable acrylic material ensures that your photos remain vivid and sharp for years, while adhesive tapes on the back ensure simple and secure mounting. Preserve your memories with custom acrylic photo prints that are as lasting as they are stunning.</p><p><br></p><p>Product Care Guidelines</p><p><br></p><p>Acrylic Photo prints are provided with a transparent protective layer on the print to avoid scratches or damage during transit. Please peel off the paper before use.</p><p>Acrylic Photo prints are provided with adhesive tapes at the back for easy mounting on a wall or a plain surface.</p><p>Use a dust-free cloth to wipe the acrylic prints. The use of normal cloth may lead to scratches.</p><p>Vistaprint India customizes all its products in facilities located within India. Some of our raw materials, intermediate components, and consumables used in the manufacturing of the final product could be from one or more countries. As we follow Global Sourcing, one product is likely to have a different country of origin depending on the batch sold.</p>', NULL, NULL, '', 599.00, 799.00, 266, 63, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:22:39', '2025-04-09 07:04:38'),
(525, 'Acrylic photo print personalized', 'acrylic-photo-print-personalized', 'Default', 'Acrylic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Acrylic is a glass alternative that has gained popularity as a framing material. You may know it as Acrylite® or Plexiglas®, which are brands of the same thermoplastic scientifically known as Polymethyl Methacrylate (aka PMMA). It\'s hard, flexible, lightweight, and even recyclable.</p>', NULL, NULL, '524,525,526,527', 512.00, 599.00, 266, 63, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:28:58', '2025-04-13 13:23:31'),
(526, 'Customised Premium  Acrylic Wall Photo Print', 'customised-premium-acrylic-wall-photo-print', 'Default', 'Acrylic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Acrylic photo prints, available online in India, offer a modern, durable way to display photos with a glossy, vibrant finish, often by printing directly onto or mounting onto acrylic sheets.&nbsp;</p>', NULL, NULL, '524,525', 512.00, 599.00, 266, 63, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:34:29', '2025-04-13 13:22:44'),
(527, 'Acrylic Prints', 'acrylic-prints', 'Default', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Acrylic prints shine beautifully, displaying the full depth and sharp detail of your photos.</p><p>We handcraft each print with care using the highest quality materials. Printing behind thick acrylic glass sheets protects your photos from dust, scratches and UV - they will last for years!</p><p>Free hanging system included.</p><p>Shipped in protective packaging to ensure no damage during transportation.</p>', NULL, NULL, '524,525,526', 512.00, 599.00, 266, 63, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-05 18:40:06', '2025-04-13 13:22:02'),
(530, 'Canvas Personlized Prints', 'canvas-personlized-prints', 'Default', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A canvas print is a digital image or photograph printed onto a canvas material, often stretched and gallery-wrapped onto a frame for display, offering a textured, artistic appearance and durability.&nbsp;</p><p>Here\'s a more detailed explanation:</p><p>What is a Canvas Print?</p><p>Material:</p><p>Canvas prints are made by printing an image onto a canvas material, typically a blend of cotton and polyester, which is then stretched over a wooden frame.&nbsp;</p><p>Printing Process:</p><p>The image is printed using a high-quality inkjet printer, ensuring vibrant colors and sharp details.&nbsp;</p><p>Stretching and Wrapping:</p><p>Once printed, the canvas is stretched and secured over a wooden frame, creating a gallery-wrapped look where the canvas wraps around the sides of the frame.&nbsp;</p><p>Frameless or Framed:</p><p>You can choose between frameless (gallery-wrapped) or framed canvas prints, with the latter offering a more traditional look.&nbsp;</p><p>Benefits:</p><p>Texture and Depth: Canvas prints add a unique texture and depth to your wall art, unlike traditional paper or cardstock prints.&nbsp;</p><p>Durability: Canvas is a durable material, making canvas prints long-lasting and resistant to fading or damage.&nbsp;</p><p>Versatility: Canvas prints can be used to display photographs, artwork, or other images, and are suitable for both home and office decor.&nbsp;</p><p>Personalization: Canvas prints can be customized with your own images, making them a great way to create personalized gifts or unique wall art.&nbsp;</p><p>Types of Canvas:</p><p>100% Cotton Canvas: Known for its natural texture and durability.&nbsp;</p><p>Cotton-Effect Polyester Canvas: Offers a more affordable option with a similar look and feel to cotton canvas.&nbsp;</p><p>Gallery Wrap: The canvas is stretched and wrapped around the sides of the frame, creating a seamless, frameless look.&nbsp;</p><p>Framed Canvas: The canvas is stretched and secured within a traditional frame.&nbsp;</p><p>Care and Maintenance:</p><p>Canvas prints are relatively easy to care for. You can simply wipe them down with a damp cloth to remove dust or dirt.&nbsp;</p>', NULL, NULL, '', 512.00, 599.00, 266, 53, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 14:44:24', '2025-04-13 13:21:37'),
(531, 'Custom Photo to Canvas', 'custom-photo-to-canvas', 'Default', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A canvas print is the result of an image printed onto canvas which is often stretched, or gallery-wrapped, onto a frame and displayed. Canvas prints are used as the final output in an art piece, or as a way to reproduce other forms of art.</p>', NULL, NULL, '530', 320.00, 420.00, 266, 53, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 14:49:33', '2025-04-13 13:21:12'),
(532, 'Canvas Wall Art On Canvas', 'canvas-wall-art-on-canvas', 'Default', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>What Is a Canvas Print? Your Complete Guide to Canvas</p><p>In recent years, canvas prints have become increasingly popular as a unique and stylish way to display artwork and photographs. If you\'re curious about what a canvas print is and how it can enhance your home or office decor, you\'ve come to the right place. This comprehensive guide covers everything you need to know about canvas prints, from their basic definition to their advantages, care tips, and even a handy buying guide. So, let\'s dive in and explore the wonderful world of canvas prints!</p>', NULL, NULL, '530,531', 320.00, 420.00, 266, 53, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 15:05:37', '2025-04-13 13:20:45'),
(533, 'MEMORYWALL Canvas Print Personalized With Your Photos', 'memorywall-canvas-print-personalized-with-your-photos', 'Default', 'Canvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Personalise any space with photo canvas prints.</p><p>Ready to put a personal touch on any (and every) space you want? Our photo canvas prints feature vibrant, fade-resistant digital printing and they’re mounted on a sturdy wooden frame. The frame is easy to hang due to the pre-installed hook at the back. So, what are you waiting for? Create the piece of art your wall’s been missing.</p><p><br></p><p>For yourself: Preserve your photo memories at home or in office. Decorate your home or office walls with pictures of your memories. They are the best way to create long lasting memories from the pictures you love.</p><p><br></p><p>For gifting: Photo Canvas Prints are an ideal gift for your loved ones. Canvas Prints make great gifts for any occasion: be it birthdays, anniversaries, housewarming parties or farewells. Upload a single photo or create a collage and create a personalised Canvas Print online in minutes.</p><p><br></p><p>To start creating your canvas prints online, pick your canvas size and orientation, and then explore our gallery of fully customisable design options. Once you’ve found a design that you like, make it yours by adding your favorite pictures, and choosing the options that work best for you, and we will take care of the rest using vibrant, high-quality printing to create a piece that can be treasured for years to come.</p><p><br></p><p><br></p>', NULL, NULL, '530,531,532', 320.00, 420.00, 266, 53, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 15:33:57', '2025-04-13 13:19:39'),
(534, 'Personalized photo mug with a long-lasting design.', 'personalized-photo-mug-with-a-long-lasting-design', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Custom coffee mugs, also known as cup photo prints, make an ideal gifting option for your near and dear ones on special occasions. With mug printing, you can personalize a magic mug with a photo to feature a cherished memory, a favorite quote, or even a company logo. These unique photo cup gifts not only serve as memorable keepsakes but also add a personal touch to everyday coffee rituals. Choose coffee mug printing for the perfect cup printing solution, offering a blend of practicality and sentiment.</p>', NULL, NULL, '509,510', 199.00, 299.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 15:58:47', '2025-04-15 17:27:07'),
(535, 'Personalized Sip And Celebrate Birthday Mug', 'personalized-sip-and-celebrate-birthday-mug', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Make every birthday brew extra special with this personalized enamel coffee mug. Meticulously crafted from high-quality stainless steel, this durable and lightweight mug is perfect for sipping in style. The front features the cheerful words Happy Birthday, Sip and Celebrate, while the back showcases a customized image, making it a one-of-a-kind keepsake. Whether it is for morning coffee, evening tea, or a travel-friendly cup of joy, this mug is the perfect way to celebrate another year of happiness. Personalize it with a picture and gift it to a loved one or treat yourself.</p><div><br></div>', NULL, NULL, '509,534', 199.00, 299.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:19:07', '2025-04-15 17:26:37'),
(536, 'Capture The Moment Personalized Birthday Surprise', 'capture-the-moment-personalized-birthday-surprise', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Surprise your Loved Ones by Gifting Photo Mugs/Cup Online from IGP. Customized your Photo Mug with text, quotes and photo printed on it.', NULL, NULL, '509,534,535', 280.00, 380.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:25:46', '2025-04-13 13:16:42'),
(537, 'Printing Personalised Magic Mug', 'printing-personalised-magic-mug', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Surprise your loved ones with Zoomin\'s custom magic mugs. Personalize photo mugs that reveal your image with heat. Unique, affordable, and made in India.</p>', NULL, NULL, '510', 290.00, 390.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:33:08', '2025-04-15 17:25:53'),
(538, 'Custom Magic Mug', 'custom-magic-mug', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Colour-changing magic photo mugs for personal and professional gifting!</p><p>You can use these beautiful magical mugs for any occasion or event. Make your family and friends spend every moment with that mug whenever a hidden photo is revealed. Delight them with magic!</p>', NULL, NULL, '510,537', 280.00, 375.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:38:05', '2025-04-15 17:25:11'),
(539, 'Custom Magic Mug Gift', 'custom-magic-mug-gift', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Customised/Personalized Magic Mug Gift with Custom Photos Add Logo,Text for Birthday,Anniversary and Wedding Gifts Ceramic Magic Mug</p>', NULL, NULL, '510,537,538', 299.00, 399.00, 297, 69, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-07 16:46:49', '2025-04-15 17:24:36'),
(542, 'Customize Photo Frame', 'customize-photo-frame', 'Customize', 'Synthetic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A photo frame is a protective and decorative edging used to display and preserve photographs, paintings, or other artwork, enhancing their visual appeal and integrating them into a space.&nbsp;</p><p>Framing in photography refers to the process of composing a picture. It involves choosing what you\'ll include in the frame and what you\'ll leave out. The goal is to create a pleasing composition that directs the viewer\'s attention to the subject matter.</p>', NULL, NULL, '', 799.00, 819.00, 266, 62, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 07:24:27', '2025-04-13 13:04:57'),
(543, 'Gallery Frame', 'gallery-frame', 'Default', 'Synthetic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Gallery frames use a mat to create an elevated frame-in-frame effect that you might often see in a museum photography installation. Our real hardwood Gallery Frames bring this same aesthetic, plus a touch of mid-century modern design, to any room in your home.</p><p>Here\'s a more detailed explanation:</p><p>Function:</p><p>Protection:</p><p>Photo frames safeguard delicate prints and artwork from light damage, moisture, and handling.&nbsp;</p><p>Presentation:</p><p>They enhance the aesthetic appeal of displayed items, making them stand out and integrate them into a room\'s decor.&nbsp;</p><p>Preservation:</p><p>Frames help preserve cherished memories and artwork, ensuring they last for years.&nbsp;</p><p>Decoration:</p><p>They can be used to add personal touches to a space, showcasing loved ones, travel memories, or favorite artwork.&nbsp;</p><p>Types:</p><p>Traditional Frames:</p><p>These are made from materials like wood, metal, or plastic and are designed to hold prints or photographs.&nbsp;</p><p>Digital Photo Frames:</p><p>These electronic devices display photos in a slideshow format, often with features like memory card slots, internal storage, and internet connectivity.&nbsp;</p><p>Custom Frames:</p><p>These are designed to fit specific artwork or photos, often with custom mats and backing materials.&nbsp;</p><p><br></p>', NULL, NULL, '542', 799.00, 819.00, 266, 62, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 07:33:49', '2025-04-13 13:04:29'),
(544, 'Gift Photo Frame', 'gift-photo-frame', 'Default', 'Synthetic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Photo Frames make photographs more beautiful than already are. They\'re good for disaplay on walls, tabletops, and shelves .</p><p>We truly believe that memories are the most priceless treasures that we accumulate throughout our lives. Photo frames are a charming way to preserve these priceless memories and give a tangible aspect to golden moments. In addition to being beautiful memorabilia, photo frames can effectively accentuate the interior decor of your home. They can become an anchor point for holding together the appeal of a space and making it look aesthetically pleasing.&nbsp;</p>', NULL, NULL, '542', 799.00, 829.00, 266, 62, NULL, 'No', NULL, NULL, 'Yes', 98, 1, '2025-04-08 07:41:52', '2025-04-13 13:04:00'),
(545, 'Family Photo Frame - Personalized Photo Collage Frame For Home Decor', 'family-photo-frame-personalized-photo-collage-frame-for-home-decor', 'Default', 'Synthetic', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>Use the app to create family collages with multiple photos, and share them with your loved ones. Express your bond with family love frames and make every memory ...</p><p>&nbsp;A family photo collage is an excellent way of picturing the whole family. This way, every family member has his or her own photo in the collage.</p>', NULL, NULL, '542,544', 712.00, 829.00, 266, 62, NULL, 'No', NULL, NULL, 'Yes', 99, 1, '2025-04-08 08:39:23', '2025-04-13 13:03:23'),
(546, 'Love Photo Frame', 'love-photo-frame', 'Default', 'Synthetic', NULL, NULL, NULL, NULL, '8', '8', NULL, '<p>Welcome to our collection of love photo frames! A picture is worth a thousand words and with our exquisite love frames, you can make your memories truly unforgettable. Whether you\'re looking for a special gift for your significant other, or a decorative piece to showcase in your home, we have the perfect frame for you. Our frames come in a variety of styles, sizes and colors, making it easy for you to find the perfect match for your photo. With our love photo frames, you can proudly display your affection and cherish your memories for years to come. Browse our collection today and find the perfect frame to celebrate your love!</p>', NULL, NULL, '542,544,545', 712.00, 899.00, 266, 62, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 08:51:27', '2025-04-13 13:02:55'),
(547, 'Printed Desk Pad', NULL, 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Desk pads with printed designs are a great way to keep your brand in front of your customers\' minds. They are an essential item for their desks, where you can print your logo, branding, calendar, or lines on them to give them a personalized touch.</p>', NULL, NULL, '512', 385.00, 419.00, 297, 67, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 09:08:54', '2025-04-15 17:40:50'),
(548, 'Personalized Photo Desk Pad', 'personalized-photo-desk-pad', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Photo Collage Desk Mat, Custom Text Desk Pad, Photo Mouse Pad, Personalized Large Mouse Pad, Gift for Family, Birthday Gift</p><p>Personalize your workspace with this custom photo desk mat. The vibrant colors and durable material make it perfect for writers, artists, and anyone who spends time a</p>', NULL, NULL, '512,515,516', 399.00, 419.00, 297, 67, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 09:16:12', '2025-04-13 13:01:15'),
(549, 'Heaven Colourful Wings LED Neon Art', 'heaven-colourful-wings-led-neon-art', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Neon wings are usually crafted as two large, symmetrical wings with light tubes in colors like white, blue, purple, or pink. They often include gradient lighting effect</p><p>A Neon Sign Board is a perfect combination of Class and Quirk. Place this customized Neon Glow Board in your Bedroom, Bar, or living room and change the Vibe completely. Give your restaurant a Pinteresty Insta-friendly photo booth with these colorful neon wings</p><p><br></p>', NULL, NULL, '395', 6999.00, NULL, 297, 75, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 09:31:50', '2025-04-13 13:00:37'),
(550, 'Love Neon Light', 'love-neon-light', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A \"Love Neon Light\" is a decorative LED sign shaped like the word \"LOVE\", designed to create a romantic and warm atmosphere, often used for room decor, parties, and gifting. It can be powered by batteries or USB and features a low-voltage design for safety.&nbsp;</p><p>Here\'s a more detailed breakdown of what \"Love Neon Light\" means and how to use it:</p><p>What it is:</p><p>Decorative Lighting:</p><p>These signs are designed to add a touch of romance and warmth to any space.&nbsp;</p><p>\"LOVE\" Shape:</p><p>The sign is shaped in the form of the word \"LOVE\", making it a clear and direct expression of affection.&nbsp;</p><p>LED Technology:</p><p>They use LED technology, which means they are energy-efficient and have a long lifespan.&nbsp;</p><p>Various Colors:</p><p>They come in a variety of colors, allowing for personalization and matching different decor styles.&nbsp;</p><p>Romantic Atmosphere:</p><p>They are often used to create a romantic and intimate ambiance, perfect for date nights, weddings, or anniversaries.&nbsp;</p>', NULL, NULL, '395,549', 3999.00, NULL, 297, 75, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 09:36:07', '2025-04-13 12:59:31'),
(551, 'Lord Ganesha Neon Sign', 'lord-ganesha-neon-sign', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Add spiritual charm to your space with the Lord Ganesha Neon Sign&nbsp; from Sparky Neon. Featuring the image of Lord Ganesha , this neon sign brings a peaceful and devotional vibe to any home or prayer space. The glowing light creates a serene atmosphere, perfect for meditation or daily&nbsp;</p>', NULL, NULL, '395,549,550', 3999.00, NULL, 297, 75, NULL, 'No', NULL, NULL, 'Yes', 103, 1, '2025-04-08 09:44:46', '2025-04-13 12:58:49'),
(552, 'This Is Our Happy Place neon sign - Neon Vibes', 'this-is-our-happy-place-neon-sign-neon-vibes', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Create a haven of happiness with our delightful \"This is Our Happy Place\" LED neon sign. This heart-warming design captures the essence of joy and togetherness, making it a perfect addition to spaces that celebrate shared moments and cherished memories.</p>', NULL, NULL, '395,549,550,551', 8499.00, NULL, 297, 75, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 09:50:44', '2025-04-13 12:58:07'),
(553, 'Happy Birthday Party Decoration Neon Sign Light', 'happy-birthday-party-decoration-neon-sign-light', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Happy Birthday&nbsp; Neon Sign/Lights Neon LED Light, Decorative Light for Room, Bedroom, Party and Bar&nbsp;</p><div>The happy birthday neon light can create a happy atmosphere for birthday party decor, popular with people and attract people’s attention, perfect for all styles of pa</div>', NULL, NULL, '395,549,551,552', 3999.00, NULL, 297, 75, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:03:49', '2025-04-13 12:57:05'),
(554, 'Personalised Couple Pillow|', 'personalised-couple-pillow', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A pretty printed with filler cushion. Soft, snuggly personalised these make great gifts for any special occasions such as birthday, anniversary, valentine\'s day etc.&nbsp;</p><p>custom photo throw pillow to your furniture will instantly update your room\'s decor.</p>', NULL, NULL, '554,555,556,557,558,559', 399.00, 499.00, 297, 70, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:19:56', '2025-04-15 17:32:14'),
(555, 'Personalised Family Pillow|', 'personalised-family-pillow', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Perfect for showcasing your favorite family photos, personalized monograms, and adding a splash of color to any room. Any customization will be printed on both sides of the machine washable cover.</p><p>As the name suggests, a personalized cushion is a cushion or pillow case that has been printed with any photo of your choice, making it completely unique and personal</p>', NULL, NULL, '554', 375.00, 475.00, 297, 70, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:25:53', '2025-04-15 17:31:44'),
(556, 'Lovely Pillow For Your Love', 'lovely-pillow-for-your-love', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A cuddly token of affection is all you need for the sake of the precious memories spent together! Let love tie you and your boo to a beautiful gift like this customized cushion forever and forever. Have a sweet shot of you to show the kind of affection between you both.</p><div><br></div>', NULL, NULL, '554,555', 390.00, 485.00, 297, 70, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:44:01', '2025-04-15 17:31:14'),
(557, 'Photo Square Pillow', 'photo-square-pillow', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Square pillow square Pillow For Gift For Love square Pillow With Photo square Pillow Big Size square Pillow Pink square Pillow</p>', NULL, NULL, '554,555,556', 389.00, 489.00, 297, 70, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:45:55', '2025-04-15 17:30:37'),
(558, 'Customized Square Shape Pillow with Photo', 'customized-square-shape-pillow-with-photo', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Personalize it​​ The pillow customizer lets you experiment looks and arrange your pictures creatively.</p>', NULL, NULL, '554,555,556,557', 380.00, 475.00, 297, 70, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:48:12', '2025-04-15 17:30:00'),
(559, 'Custom Heart Shap Photo Pillow', 'custom-heart-shap-photo-pillow', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>This uniquely shaped cushion is the replica of a heart that will make the space more romantic for you and your partner. You can personalize this pillow with a photograph from your wedding day, the pre-wedding photoshoot, or any other random picture that is special for you both.</p><p><br></p>', NULL, NULL, '554,555,556,557,558', 399.00, 499.00, 297, 70, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 10:51:09', '2025-04-15 17:29:36'),
(560, 'Personalised Family Calender|', 'personalised-family-calender', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A family photo printed calendar is a personalized, year-long keepsake that allows you to showcase cherished family photos alongside a practical calendar, marking important dates and events.&nbsp;</p><p>Here\'s a more detailed description:</p><p>Functionality:</p><p>Personalized Keepsake:</p><p>It\'s a gift that keeps on giving, showcasing your family\'s memories throughout the year.&nbsp;</p><p>Practical Calendar:</p><p>It serves as a functional tool for tracking birthdays, anniversaries, holidays, and other important dates.&nbsp;</p><p>Customizable:</p><p>You can personalize the calendar with your own photos, themes, and layouts.&nbsp;</p><p>Wall or Desk Calendar:</p><p>You can choose between a large wall calendar for families to keep track of schedules or a smaller desk calendar for those working remotely.&nbsp;</p><p>Design Options:</p><p>You can choose from various layout options, including single photos per month or collages.&nbsp;</p>', NULL, NULL, '', 395.00, 480.00, 297, 65, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 11:11:19', '2025-04-15 17:47:41'),
(561, 'Personalized calendar', 'personalized-calendar', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Personalized calendars are a wonderful way to make every day special. Simply upload your favorite photo, or a selection of photos for a collage, and select your design. The result is a thoughtful gift for any occasion, and&nbsp;</p>', NULL, NULL, '560', 389.00, 499.00, 297, 65, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 11:13:30', '2025-04-15 17:47:11'),
(562, 'Customised Photo Calendars', 'customised-photo-calendars', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Brighten up your home or office space with personalised photo calendars. These photo calendars are perfect for adding and marking significant dates, events, public holidays, birthdays, anniversaries, and more. Custom photo calendars can be a great corporate giveaway to employees and an ideal welcome/onboarding gift for new clients and customers when printed with your business logo and name. Additionally, add memorable photos on these custom calendars, &amp; it will delight your friends &amp; family. So, start designing by choosing from our range of calendar types like - wall calendars, desk calendars, poster calendars, and pocket calendars - designs, themes, &amp; patterns that match your needs and print your photo calendars today!</p>', NULL, NULL, '560,561', 388.00, 499.00, 297, 65, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 11:18:28', '2025-04-15 17:46:32'),
(563, 'Desk Photo Calendar With Your Best Memories', 'desk-photo-calendar-with-your-best-memories', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>A&nbsp;<span style=\"font-size: 1rem;\">desk</span><span style=\"font-size: 1rem;\">&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">Photo calendar with your best memories of the year. Add your photos to create your&nbsp;</span><span style=\"font-size: 1rem;\">desk</span><span style=\"font-size: 1rem;\">&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">photo calendar.&nbsp;</span></p><p>A desk photo print calendar is a compact, stand-up calendar, often personalized with photos, designed for use on desks or workstations, allowing users to keep track of dates and important events while also displaying cherished memories.&nbsp;</p><div><br></div><p>Create your own personalised calendar with this double photo design, where you can add two photos side by side for each month of the year. You can also add two cover&nbsp;</p>', NULL, NULL, '560,561,562', 399.00, 499.00, 297, 65, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 11:27:07', '2025-04-15 17:40:25'),
(564, 'Personalized Table Calendars for Every Space', 'personalized-table-calendars-for-every-space', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Personalized Table Calendars for Every Space</p><p>Our table top calendar options are perfect for adding a personal touch to any home or office desk. Whether you need a photo calendar or a professional desk calendar,&nbsp;</p><p>Perfect Calendars for Home and Office</p><p>Whether you\'re seeking a high-quality custom daily desktop calendar for your desk or a decorative wall calendar, we offer the best options to keep you organized throu</p>', NULL, NULL, '560,561,562,563', 385.00, 475.00, 297, 65, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 11:32:59', '2025-04-15 17:46:11'),
(565, 'Photo Print On Wood', 'photo-print-on-wood', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Customised Wooden Photo Frame with Engraved Photo &amp; Message Tabletop, Rectangular photo Plaque best Gift for Best Friends Birthday, Anniversary</p><p>Photo printing on wood is exactly what it sounds like – we take digital photos and print them directly on natural wood. The image is literally printed directly onto the natural wood surface, providing a richer, more vibrant result. Natural wood makes for a great media for printing because every print is unique. Like a fingerprint, no two sheets of natural wood have the same grain texture and veins, so every print – regardless if the same image is used – becomes a unique piece of art.</p><p><br></p><p>The natural color of wood also makes for a great frame, and as result we offer our photo wood prints two ways – edge-to-edge with no margin or centered with margin. Image should be atleast 300 DPI. Depending upon the dimensions of the image we can go for portrait or landscape mode of printing. Create your own prints on Wood. Snap a photo with your phone or camera and upload it and leave the rest to us.</p>', NULL, NULL, '', 780.00, 890.00, 297, 54, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 15:48:36', '2025-04-15 17:44:34'),
(566, 'Engraved Photo On Wood', 'engraved-photo-on-wood', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Make your own carved wooden poster by engraving a photo on wood and adding a personal message. These custom wood carved picture frames are the best wooden ...</p><div>Laser Engraved Photos and text on Steem Beech Timber Wood with stunning detail. Engraved pictures make a great, lasting gift for generations. Design yours ...</div>', NULL, NULL, '565', 785.00, 860.00, 297, 54, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 15:55:39', '2025-04-15 17:44:09'),
(567, 'Customised Engraved Wooden Photo Frame', 'customised-engraved-wooden-photo-frame', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Customised Engraved Wooden Photo Frame – Personalized Wooden Photo Frame for Birthdays, Special Occasions &amp; Unique Gifts – Custom Wooden Frame Online</p><p>Skillfully crafted from high-quality wood, this personalized photo frame adds a rustic touch to any room, making it the perfect gift for birthdays, anniversaries, or special occasions. Whether you’re looking to celebrate a memorable moment or create a unique home decor piece, this frame is designed to showcase your favorite photos in an elegant, meaningful way.</p><p><br></p><p>This engraved wooden photo frame can be customized with any text, making it the perfect gift for loved ones or a special treat for yourself. Add names, dates, or special messages to make it truly unique. Available online, it’s an ideal choice for those seeking a meaningful, personalized gift.</p><p><br></p><p>Key Features:</p><p><br></p><p>Fully Customizable Engraving: Personalize your wooden photo frame with names, dates, heartfelt messages, or even a short quote to make it truly unique. Whether it’s for a loved one or a keepsake for yourself, the engraving adds a personal and sentimental touch.</p><p><br></p><p>Premium Quality Wooden Craftsmanship: Made from high-quality, durable wood, this photo frame is designed to last for years while maintaining its rustic charm. The smooth finish and sturdy construction ensure that your cherished memories are displayed elegantly.</p><p><br></p><p>A Thoughtful &amp; Memorable Gift: Looking for a unique and meaningful gift? This customized wooden photo frame is perfect for birthdays, anniversaries, weddings, housewarmings, and other special occasions. Surprise your loved ones with a gift that captures and preserves their most treasured moments.</p><p><br></p><p>Expertly Engraved with Fine Detailing: The engraving is done with precision to create clear, intricate details that enhance the beauty of your photo frame. The carefully etched designs and inscriptions add sophistication, making this frame stand out in any setting.</p><p><br></p><p>Perfect Size for Display: Measuring 9×7 inches, this frame is ideal for showcasing standard-size photos. It fits beautifully on tabletops, office desks, bedside tables, or mounted on a wall, making it a versatile addition to any space.</p><p><br></p><p>Enhances Home &amp; Office Décor: The warm wooden tones and personalized engraving make this frame a stylish piece of decor. Whether placed in your living room, bedroom, office, or prayer space, it adds a touch of elegance and warmth to the surroundings.</p><p><br></p><p>Easy &amp; Hassle-Free Online Customization: Customize your frame effortlessly through our user-friendly online platform. Simply upload your desired text or message, preview your design, and place your order—all from the comfort of your home.</p><p><br></p><p>Secure &amp; Damage-Free Packaging: We take extra care to package your customized wooden photo frame securely, ensuring it reaches you in perfect condition without any damage.</p><p><br></p><p>Eco-Friendly &amp; Sustainable Choice: Crafted from responsibly sourced wood, this frame is an environmentally friendly alternative to plastic or synthetic materials. Make a greener choice while preserving your beautiful memories.</p><p><br></p><p>Why Choose Our Customised Wooden Photo Frame?</p><p>Meaningful Gift: The engraved wooden photo frame adds a personal touch to any occasion. Perfect for friends, family, or colleagues, this frame is a thoughtful way to celebrate milestones and create lasting memories.</p><p><br></p><p>Crafted with Care: Each frame is handcrafted with attention to detail, ensuring a high-quality product that will stand the test of time.</p><p><br></p><p>Eco-Friendly Materials: Made with sustainably sourced wood, this frame is an environmentally responsible choice for your home decor or gifting needs.</p>', NULL, NULL, '565,566', 819.00, 909.00, 297, 54, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 16:06:02', '2025-04-15 17:43:40'),
(568, 'Personalised Rectangular Wood Engraved Photo Frame', 'personalised-rectangular-wood-engraved-photo-frame', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Marquetry is a technique for creating imagery or decorative arts and motifs on a wooden surface of furniture through contrasting and spectacular design. The process entails precisely cutting fine wood veneers of various shades and grain types that are then perfectly pieced together like a jigsaw puzzle.</p><p>Printing on wooden blocks creates a unique, organic photo that stands the test of time and gives your image a special effect. With this process, your image fuses with the wood, and you see the grain through the ink. No two prints are alike due to the revealed grain.</p>', NULL, NULL, '565,566,567', 799.00, 899.00, 297, 54, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 16:15:19', '2025-04-13 12:36:31'),
(569, 'Custom Photo Keychains', 'custom-photo-keychains', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>An ideal and memorable photo gift for your loved ones, a 2 sided personalized photo keychain india carrying their favourite memory.</p>', NULL, NULL, '514', 129.00, 159.00, 297, 64, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 16:23:22', '2025-04-15 17:35:01'),
(570, 'Customized Photo Keychain Reflects Your Love & Interest', 'customized-photo-keychain-reflects-your-love-interest', 'Default', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Key chain is a essential daily use accessory that safely holds your keys. Key chains are usually made of Wood, plastic or metal. Buy photo key chain online at best price with us.</p><p><br></p><p>Now a days customized key chains are in trend. You can customize the key chain with your Photos, Text or Designs.</p><p><br></p><p>Customized Photo Key chain Reflects Your Love &amp; Interest :</p><p>Personalized photo key chain not only keep your keys safe &amp; protected but also reflects your love &amp; interest. You can simply upload your image and we’ll print it on Key chain for you.</p><p><br></p><p>Follow these simple &amp; easy steps to design your Custom Photo Keychain :</p><p><br></p><p>Choose the shape &amp; design of the Personalized key chain Here.</p><p>Upload your high quality Image.</p>', NULL, NULL, '514,569', 129.00, 159.00, 297, 64, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 16:27:42', '2025-04-15 17:37:18'),
(572, 'Custom Printed  T-shirts', 'custom-printed-t-shirts', 'Default', 'Others', NULL, '\"[\\\"Medium\\\",\\\"Large\\\",\\\"XL\\\"]\"', NULL, '\"[\\\"Black\\\",\\\"White\\\"]\"', NULL, NULL, NULL, '<p>Create your own T-shirt printing online and personalised t-shirt available only at Vistaprint. Customise t-shirt with logo, photo or message. Design your own t-shirt online ...</p>', NULL, NULL, '', 599.00, 699.00, 298, 68, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 18:58:05', '2025-04-15 17:23:39'),
(573, 'T Shirt Printing', 't-shirt-printing', 'Default', 'Others', NULL, '\"[\\\"Medium\\\",\\\"Large\\\",\\\"XL\\\"]\"', NULL, '\"[\\\"Black\\\",\\\"White\\\"]\"', NULL, NULL, NULL, '<p>T-shirt printing, otherwise known as screen printing, is a simple and inexpensive method of printing your own custom designs or logos onto a t-shirt. Whether you’re looking to create a brand new fashion label with your own designs or want to create memorable shirts for a specific event, there are a number of unique options available that can help you realize your goals.</p><p><br></p>', NULL, NULL, '572', 590.00, 688.00, 298, 68, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 19:02:09', '2025-04-15 17:23:16'),
(574, 'Anime T Shirts - Buy Cool Anime Merchandise Online', 'anime-t-shirts-buy-cool-anime-merchandise-online', 'Default', 'Others', NULL, '\"[\\\"Medium\\\",\\\"Large\\\",\\\"XL\\\"]\"', NULL, '\"[\\\"Black\\\",\\\"White\\\"]\"', NULL, NULL, NULL, '<p>The standout feature of these t-shirts is the anime print. The vibrant and detailed design captures the essence of the characters and the captivating world of the anime. Whether you\'re a fan of anime, or any other beloved character from the series, these t-shirts allow you to proudly display your love for anime</p>', NULL, NULL, '572', 583.00, 675.00, 298, 68, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 19:09:29', '2025-04-15 17:22:38'),
(575, 'Black - Oversized Back Printed Round Neck Anime', 'black-oversized-back-printed-round-neck-anime', 'Customize', 'Others', NULL, '\"[\\\"Medium\\\",\\\"Large\\\",\\\"XL\\\"]\"', NULL, '\"[\\\"Black\\\",\\\"White\\\"]\"', NULL, NULL, NULL, '<p>Product Details​​ Made from soft cotton Blend, this oversized T-shirt gets a delicious upgrade from a graphic print on the back.</p>', NULL, NULL, '572,574', 599.00, 699.00, 298, 68, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-08 19:18:05', '2025-04-15 17:22:11');

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
(486, 542, 'customize-photo-frame_1_1744097067.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-08 07:24:27', '2025-04-08 07:24:27'),
(487, 543, 'gallery-frame_1_1744097629.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-08 07:33:49', '2025-04-08 07:33:49'),
(488, 544, 'gift-photo-frame_1_1744100818.png', NULL, NULL, NULL, NULL, NULL, '2025-04-08 07:41:53', '2025-04-08 08:26:59'),
(489, 545, 'family-photo-frame-personalized-photo-collage-frame-for-home-decor_1_1744101563.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 08:39:24', '2025-04-08 08:39:24'),
(490, 546, 'love-photo-frame_1_1744102287.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 08:51:27', '2025-04-08 08:51:27'),
(491, 547, '_1_1744103334.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 09:08:54', '2025-04-08 09:08:54'),
(492, 548, 'personalized-photo-desk-pad_1_1744103772.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 09:16:12', '2025-04-08 09:16:12'),
(493, 549, 'heaven-colourful-wings-led-neon-art_1_1744104710.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 09:31:50', '2025-04-08 09:31:50'),
(494, 550, 'love-neon-light_1_1744104967.jpeg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 09:36:07', '2025-04-08 09:36:07'),
(495, 551, 'lord-ganesha-neon-sign_1_1744105486.jpeg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 09:44:46', '2025-04-08 09:44:46'),
(496, 552, 'this-is-our-happy-place-neon-sign-neon-vibes_1_1744105844.jpeg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 09:50:44', '2025-04-08 09:50:44'),
(497, 553, 'happy-birthday-party-decoration-neon-sign-light_1_1744106629.jpeg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:03:49', '2025-04-08 10:03:49'),
(498, 554, 'personalised-couple-pillow_1_1744107723.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:19:56', '2025-04-08 10:22:04'),
(499, 555, 'personalised-family-pillow_1_1744107992.png', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:25:53', '2025-04-08 10:26:33'),
(500, 556, 'lovely-pillow-for-your-love_1_1744109041.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:44:02', '2025-04-08 10:44:02'),
(501, 557, 'photo-square-pillow_1_1744109155.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:45:55', '2025-04-08 10:45:55'),
(502, 558, 'customized-square-shape-pillow-with-photo_1_1744109292.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:48:12', '2025-04-08 10:48:12'),
(503, 559, 'custom-heart-shap-photo-pillow_1_1744109469.png', NULL, NULL, NULL, NULL, NULL, '2025-04-08 10:51:10', '2025-04-08 10:51:10'),
(504, 560, 'personalised-family-calender_1_1744110679.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 11:11:19', '2025-04-08 11:11:19'),
(505, 561, 'personalized-calendar_1_1744110810.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 11:13:31', '2025-04-08 11:13:31'),
(506, 562, 'customised-photo-calendars_1_1744111108.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 11:18:28', '2025-04-08 11:18:28'),
(507, 563, 'desk-photo-calendar-with-your-best-memories_1_1744111627.png', 'desk-photo-calendar-with-your-best-memories_2_1744111628.jpg', NULL, NULL, NULL, NULL, '2025-04-08 11:27:08', '2025-04-08 11:27:08'),
(508, 564, 'personalized-table-calendars-for-every-space_1_1744111979.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-08 11:32:59', '2025-04-08 11:32:59'),
(509, 565, 'photo-print-on-wood_1_1744127316.webp', NULL, NULL, NULL, NULL, NULL, '2025-04-08 15:48:36', '2025-04-08 15:48:36'),
(510, 566, 'engraved-photo-on-wood_1_1744127783.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 15:55:39', '2025-04-08 15:56:23'),
(511, 567, 'customised-engraved-wooden-photo-frame_1_1744128362.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 16:06:02', '2025-04-08 16:06:02'),
(512, 568, 'personalised-rectangular-wood-engraved-photo-frame_1_1744128919.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 16:15:19', '2025-04-08 16:15:19'),
(513, 569, 'custom-photo-keychains_1_1744129402.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 16:23:22', '2025-04-08 16:23:22'),
(514, 570, 'customized-photo-key-chain-reflects-your-love-interest_1_1744129662.png', NULL, NULL, NULL, NULL, NULL, '2025-04-08 16:27:43', '2025-04-08 16:27:43'),
(516, 572, 'custom-printed-t-shirts_1_1744138685.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 18:58:06', '2025-04-08 18:58:06'),
(517, 573, 't-shirt-printing_1_1744138929.JPG', NULL, NULL, NULL, NULL, NULL, '2025-04-08 19:02:10', '2025-04-08 19:02:10'),
(518, 574, 'anime-t-shirts-buy-cool-anime-merchandise-online_1_1744139369.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-08 19:09:29', '2025-04-08 19:09:29'),
(519, 575, 'black-oversized-back-printed-round-neck-anime_1_1744139885.JPG', NULL, NULL, NULL, NULL, NULL, '2025-04-08 19:18:05', '2025-04-08 19:18:05');

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
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `primary_color` varchar(20) DEFAULT NULL,
  `secondary_color` varchar(20) DEFAULT NULL,
  `link_color` varchar(20) DEFAULT NULL,
  `background_color` varchar(20) DEFAULT NULL,
  `text_color` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
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

INSERT INTO `settings` (`id`, `name`, `business_line`, `image`, `phone`, `whatsapp`, `email`, `address`, `primary_color`, `secondary_color`, `link_color`, `background_color`, `text_color`, `is_active`, `facebook`, `instagram`, `twitter`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'Heaven Prints', 'Customized Neon and Frames', 'Heaven Prints.jpg', '9924489907', '9924489907', 'info@heavenprints.in', '2005 delhi chakla  ,Shahpur  Ahmedabad', '#0d6efd', '#000000', '#404040', '#ffffff', '#424242', 1, 'https://www.facebook.com/', 'https://www.instagram.com/heaven__prints?igsh=MXVkZWgzZzQ4NHEzeA==', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, '2025-04-17 07:52:58');

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
(2, '2', 50.00, NULL, NULL),
(19, '1', 0.00, '2025-02-20 05:35:38', '2025-02-20 05:35:38'),
(23, '3', 100.00, '2025-03-26 07:47:09', '2025-03-26 07:47:09');

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
(51, 'Metal Prints', 'metal-prints', '_1744132117.jpg', 1, 'Yes', 266, '2025-03-25 04:17:20', '2025-04-08 17:08:37'),
(53, 'Canvas Print', 'canvas-print', '_1744132313.jpg', 1, 'Yes', 266, '2025-03-26 06:09:30', '2025-04-08 17:11:53'),
(54, 'Woods', 'woods', '_1743494730.jpg', 1, 'Yes', 297, '2025-03-26 09:54:38', '2025-04-01 11:28:06'),
(57, 'Customize Neon', 'customize-neon', '_1743494742.jpg', 1, 'Yes', 296, '2025-03-27 08:56:50', '2025-04-01 08:05:42'),
(62, 'Photo Frame', 'photo-frame', '_1744132186.jpg', 1, 'No', 266, '2025-04-01 07:16:26', '2025-04-08 17:09:46'),
(63, 'Acrylic', 'acrylic', '_1744132242.jpg', 1, 'Yes', 266, '2025-04-01 07:48:20', '2025-04-08 17:10:43'),
(64, 'Keychain', 'keychain', 'keychain_1743494400.webp', 1, 'Yes', 297, '2025-04-01 08:00:00', '2025-04-01 08:00:00'),
(65, 'Calendar', 'calendar', 'calendar_1743494450.webp', 1, 'Yes', 297, '2025-04-01 08:00:50', '2025-04-01 08:00:50'),
(66, 'Moon Lamp', 'moon-lamp', 'moon-lamp_1743494469.jpg', 1, 'Yes', 297, '2025-04-01 08:01:09', '2025-04-01 08:01:09'),
(67, 'Mouse Pad', 'mouse-pad', 'mouse-pad_1743494494.webp', 1, 'Yes', 297, '2025-04-01 08:01:34', '2025-04-01 08:01:34'),
(68, 'T-shirt', 't-shirt', 't-shirt_1743494784.png', 1, 'Yes', 298, '2025-04-01 08:06:25', '2025-04-01 08:06:25'),
(69, 'Mug', 'mug', 'personlized-mug_1743613848.jpeg', 1, 'Yes', 297, '2025-04-02 17:10:48', '2025-04-02 17:18:33'),
(70, 'Custom Pillow', 'custom-pillow', 'custom-pillow_1744106838.webp', 1, 'Yes', 297, '2025-04-08 10:07:18', '2025-04-08 10:07:18'),
(75, 'Neon Sign', 'neon-sign', 'neon-sign_1744548887.jpg', 1, 'Yes', 297, '2025-04-13 12:54:47', '2025-04-13 12:54:47');

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
(7, 'Jay', 'Shrimali', 'info@heavenprints.in', NULL, 1, 2, NULL, '$2y$10$de3VuxcwbE11EUCw.7rXKuL0A.93JoTFDovYR5.qtfpWEHxXJtfBe', NULL, 1, NULL, NULL, '2023-12-19 07:11:37', '2025-04-13 15:45:22'),
(30, 'Dhruv', 'Bhavsar', 'neonstar2112@gmail.com', NULL, 1, 1, NULL, '$2y$10$CINsltt2MKGU/BTfWGEQgex3wlwhdvt9.uLROJuwhZ48SezK.b1ia', NULL, 0, NULL, NULL, '2025-02-17 01:03:07', '2025-03-31 02:03:54'),
(45, 'Priyanka', 'Bhavsar', 'p.bhavsar2610@gmail.com', '9978812345', 1, 1, NULL, '$2y$10$boZzhsTwkwbgEmPIQcuOreVJVXBVhLmQiOyAdk0FSwlBbNv46XB1y', NULL, 0, NULL, NULL, '2025-04-13 06:01:39', '2025-04-13 06:02:17'),
(46, 'Mukesh', 'Bhavsar', 'mukeshbhavsar210@gmail.com', '9978812345', 1, 1, NULL, '$2y$10$ZRsX8ikY77uFMZjQnE5soeoDnSs6/JGyosGMQtZ4rILvLUQQ5EeJm', NULL, 0, NULL, NULL, '2025-04-13 06:06:06', '2025-04-16 08:42:41');

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
(47, 30, 575, '2025-04-11 11:28:44', '2025-04-11 11:28:44'),
(48, 30, 573, '2025-04-11 11:28:52', '2025-04-11 11:28:52');

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
-- Indexes for table `customizes`
--
ALTER TABLE `customizes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customizes`
--
ALTER TABLE `customizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `custom_totals`
--
ALTER TABLE `custom_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
