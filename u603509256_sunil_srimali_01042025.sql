-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2025 at 09:31 AM
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
(32, 'Neon Light', 'neon-light', 'dummy text', 'neon-light.jpg', 1, 'Yes', '2025-04-01 08:11:26', '2025-04-01 08:11:26'),
(33, 'Metal Frame', 'metal-frame', 'dummy text', 'metal-frame.jpg', 1, 'Yes', '2025-04-01 08:11:50', '2025-04-01 08:11:50');

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
  `slug_category` varchar(255) NOT NULL,
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

INSERT INTO `categories` (`id`, `name`, `slug_category`, `image`, `status`, `showHome`, `is_protected`, `created_at`, `updated_at`) VALUES
(266, 'Frames', 'frames', 'frames_1743494699.png', 1, 'Yes', 1, '2025-03-25 04:17:06', '2025-04-01 08:05:00'),
(296, 'NEON', 'neon', 'neon_1743494673.jpeg', 1, 'Yes', 1, '2025-03-27 08:56:31', '2025-04-01 08:04:33'),
(297, 'Shop', 'shop', 'shop_1743494716.jpg', 1, 'Yes', 0, '2025-03-30 06:08:40', '2025-04-01 08:05:16'),
(298, 'T-shirt', 't-shirt', 't-shirt_1743494593.png', 1, 'Yes', 0, '2025-04-01 06:39:43', '2025-04-01 08:03:13');

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
-- Table structure for table `frame_borders`
--

CREATE TABLE `frame_borders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_borders`
--

INSERT INTO `frame_borders` (`id`, `name`, `slug`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mirror Image', 'mirror_image', '0', 'mirror-image.jpg', NULL, NULL),
(2, 'Border Color', 'border_color', '0', 'border-color.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_frames`
--

CREATE TABLE `frame_frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `types` enum('standard','premium','floating') NOT NULL DEFAULT 'standard',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_frames`
--

INSERT INTO `frame_frames` (`id`, `name`, `slug`, `price`, `image`, `types`, `created_at`, `updated_at`) VALUES
(1, 'Golden', 'golden', '798', 'golden.png', 'standard', NULL, NULL),
(2, 'Cherry Style', 'cherry', '998.00', 'cherry-style.png', 'premium', NULL, NULL),
(3, 'Black Floating Frame', 'black_floating', '1798.00', 'black-floating-frame.png', 'floating', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_metals`
--

CREATE TABLE `frame_metals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `shape` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `custom_size_1` varchar(255) DEFAULT NULL,
  `custom_size_2` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_metals`
--

INSERT INTO `frame_metals` (`id`, `name`, `shape`, `size`, `custom_size_1`, `custom_size_2`, `price`, `created_at`, `updated_at`) VALUES
(23, '547863', 'Square', '8', '8', '8', 547863.00, '2025-03-21 05:40:27', '2025-03-21 05:40:27'),
(24, '971287', 'Rectangle', '8', '8', '8', 971287.00, '2025-03-21 05:43:56', '2025-03-21 05:43:56'),
(25, '578359', 'Square', '24', '24', '22', 578359.00, '2025-03-21 05:52:52', '2025-03-21 05:52:52'),
(26, '468220', 'Rectangle', '8', '8', '8', 468220.00, '2025-03-21 05:56:47', '2025-03-21 05:56:47'),
(27, '230886', 'Square', '8', '8', '8', 230886.00, '2025-03-21 06:58:19', '2025-03-21 06:58:19'),
(28, '502614', 'Square', '8', '8', '8', 502614.00, '2025-03-21 07:19:35', '2025-03-21 07:19:35'),
(29, '553866', 'Square', '8', '8', '8', 553866.00, '2025-03-21 07:22:13', '2025-03-21 07:22:13'),
(30, '590154', 'Square', '8', '8', '8', 590154.00, '2025-03-21 07:23:03', '2025-03-21 07:23:03'),
(31, '647883', 'Square', '8', '8', '8', 647883.00, '2025-03-21 07:24:12', '2025-03-21 07:24:12'),
(32, '678475', 'Square', '8', '8', '8', 600.00, '2025-03-21 07:30:55', '2025-03-21 07:30:55'),
(33, '355340', 'Square', '8', '8', '8', 700.00, '2025-03-21 07:31:24', '2025-03-21 07:31:24'),
(34, '205907', 'Square', '8', '8', '8', 600.00, '2025-03-21 07:31:46', '2025-03-21 07:31:46'),
(35, '470811', 'Square', '8', '8', '8', 600.00, '2025-03-21 07:33:20', '2025-03-21 07:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `frame_shapes`
--

CREATE TABLE `frame_shapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `types` enum('canvas','acrylic','metal','wood','others') DEFAULT 'canvas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_shapes`
--

INSERT INTO `frame_shapes` (`id`, `name`, `slug`, `price`, `image`, `types`, `created_at`, `updated_at`) VALUES
(1, 'Single Print', 'wood', 143, 'icon_single_print.png', 'canvas', NULL, NULL),
(2, 'Round Canvas', 'metal', 721, 'round_canvas.png', 'acrylic', NULL, NULL),
(3, 'Triangle Canvas', 'triangle_canvas', 1250, 'round_canvas.png', 'metal', NULL, NULL),
(4, 'Single Print', 'single_print', 355, 'round_canvas.png', 'wood', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_sizes`
--

CREATE TABLE `frame_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `price` int(15) NOT NULL,
  `types` enum('recommended','square','panaromic','large','small') NOT NULL DEFAULT 'recommended',
  `height` int(10) NOT NULL DEFAULT 20,
  `width` int(10) NOT NULL DEFAULT 20,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_sizes`
--

INSERT INTO `frame_sizes` (`id`, `name`, `slug`, `price`, `types`, `height`, `width`, `created_at`, `updated_at`) VALUES
(1, '8\" x 8\"', 'small', 0, 'square', 45, 45, NULL, NULL),
(2, '10\" x 10\"', 'medium', 30, 'square', 47, 47, NULL, NULL),
(3, '16\" x 16\"', 'large', 60, 'square', 49, 49, NULL, NULL),
(4, '24\" x 24\"', 'four', 1066, 'square', 53, 53, NULL, NULL),
(5, '30\" x 30\"', 'five', 1646, 'square', 56, 56, NULL, NULL),
(6, '45\" x 45\"', 'six', 3640, 'square', 64, 64, NULL, NULL),
(7, '11\" x 17\"', 'recommended_01', 379, 'recommended', 32, 50, NULL, NULL),
(8, '22\" x 34\"', 'recommended_02', 1377, 'recommended', 38, 58, NULL, NULL),
(9, '33\" x 51\"', 'recommended_03', 3038, 'recommended', 43, 67, NULL, NULL),
(10, '8\" x 24\"', 'panoromic_01', 396, 'panaromic', 19, 57, NULL, NULL),
(11, '10\" x 40\"', 'panoromic_02', 764, 'panaromic', 17, 70, NULL, NULL),
(12, '12\" x 36\"', 'panoromic_03', 817, 'panaromic', 22, 67, NULL, NULL),
(13, '15\" x 45\"', 'panoromic_04', 1255, 'panaromic', 24, 73, NULL, NULL),
(14, '16\" x 48\"', 'panoromic_05', 1422, 'panaromic', 25, 76, NULL, NULL),
(15, '18\" x 54\"', 'panoromic_06', 1787, 'panaromic', 27, 80, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frame_wraps`
--

CREATE TABLE `frame_wraps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `types` enum('wrap','border') NOT NULL DEFAULT 'wrap',
  `border_color` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frame_wraps`
--

INSERT INTO `frame_wraps` (`id`, `name`, `slug`, `price`, `image`, `types`, `border_color`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Canvas Lite (0.50\")', 'canvas_lite', '110', 'size05.jpg', 'wrap', NULL, NULL, NULL, NULL),
(2, 'Thin Gallery Wrap (0.75\")', 'thin_gallery_wrap', '185.90', 'size75.jpg', 'wrap', NULL, NULL, NULL, NULL),
(3, 'Thick Gallery Wrap (1.5\")', 'thick_gallery_wrap', '223.08', 'size15.jpg', 'wrap', NULL, NULL, NULL, NULL),
(4, 'Hanging Canvas', 'hanging_canvas', '121.55', 'hanging-canvas.jpg', 'wrap', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_displays`
--

CREATE TABLE `hardware_displays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_displays`
--

INSERT INTO `hardware_displays` (`id`, `name`, `slug`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Open Back', 'open_back', '0', NULL, NULL),
(2, 'Dust Cover', 'dust_cover', '49.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_finishings`
--

CREATE TABLE `hardware_finishings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `types` enum('basic','advance') NOT NULL DEFAULT 'basic',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_finishings`
--

INSERT INTO `hardware_finishings` (`id`, `name`, `slug`, `price`, `image`, `types`, `created_at`, `updated_at`) VALUES
(1, 'Original Free', 'original_free', '1000', '0', 'basic', NULL, NULL),
(2, 'Sephia Free', 'sephia_free', '5000', '', 'basic', NULL, NULL),
(3, 'Pixel Painting', 'pixel_painting', '1750', '', 'advance', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_styles`
--

CREATE TABLE `hardware_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_styles`
--

INSERT INTO `hardware_styles` (`id`, `name`, `slug`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hooks for Hanging Free', 'hooks_for_hanging_free', '0', '', NULL, NULL),
(2, 'Ready to Hang Free', 'ready_to_hang_free', '0', '', NULL, NULL),
(3, 'No Hooks Free', 'no_hooks_free', '0', '', NULL, NULL),
(4, 'Sawtooth Hanger', 'sawtooth_hanger', '25.00', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_edits`
--

CREATE TABLE `image_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `frame` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `border` varchar(255) NOT NULL,
  `hardware` varchar(255) NOT NULL,
  `display_option` varchar(255) NOT NULL,
  `lamination` varchar(255) NOT NULL,
  `retouching` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`retouching`)),
  `notes` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laminations`
--

CREATE TABLE `laminations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `class` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laminations`
--

INSERT INTO `laminations` (`id`, `name`, `slug`, `price`, `class`, `created_at`, `updated_at`) VALUES
(1, 'No', 'no', 0, 2, NULL, NULL),
(2, 'Standard', 'standard', 149, 5, NULL, NULL),
(3, 'Premium', 'premium', 249, 5, NULL, NULL);

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
-- Table structure for table `modifications`
--

CREATE TABLE `modifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modifications`
--

INSERT INTO `modifications` (`id`, `name`, `slug`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Red Eye Removal', 'red_eye_removal', 299, NULL, NULL),
(2, 'Dust/Scratch Removal', 'dust_scratch_removal', 0, NULL, NULL),
(3, 'Enhance Color', 'enhance_color', 0, NULL, NULL),
(4, 'Date Stamp Removal', 'date_stamp_Removal', 0, NULL, NULL),
(5, 'Lighten/Darken Image', 'lighten_darken_image', 0, NULL, NULL);

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
(10, 'Photo Mug', 'photo-mug', 'products', '<p>test</p>', '2025-03-28 01:58:42', '2025-03-28 01:58:42'),
(11, 'test', 'test', 'products', '<p><b>test</b></p><p><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAAAAQwAABtbnRyUkdCIFhZWiAAAAAAAAAAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAAHRyWFlaAAABZAAAABRnWFlaAAABeAAAABRiWFlaAAABjAAAABRyVFJDAAABoAAAAChnVFJDAAABoAAAAChiVFJDAAABoAAAACh3dHB0AAAByAAAABRjcHJ0AAAB3AAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAFgAAAAcAHMAUgBHAEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z3BhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABYWVogAAAAAAAA9tYAAQAAAADTLW1sdWMAAAAAAAAAAQAAAAxlblVTAAAAIAAAABwARwBvAG8AZwBsAGUAIABJAG4AYwAuACAAMgAwADEANv/bAEMAAwICAwICAwMDAwQDAwQFCAUFBAQFCgcHBggMCgwMCwoLCw0OEhANDhEOCwsQFhARExQVFRUMDxcYFhQYEhQVFP/bAEMBAwQEBQQFCQUFCRQNCw0UFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFP/AABEIAigC4AMBIgACEQEDEQH/xAAdAAEAAQQDAQAAAAAAAAAAAAAAAgEDBAUGBwgJ/8QAWRAAAgEDAQMHBwkDBwkGAwkAAAIDBAUSBgciMgEIEzFCUmIUI0FxcoKSERUzQ1OissLSJGNzFiFhg5Pi8Ak0REVRVKOz0xgldIGUwzWV8jZGVXWEhZGh8f/EABwBAQACAwEBAQAAAAAAAAAAAAACAwQFBgcBCP/EADMRAQACAgEEAAQDCAEFAQAAAAACAwQSBQYTIjIUI0JSARFiFSQzcoKisvCSQUNT0vLC/9oADAMBAAIRAxEAPwD5VAAAAAAAAAAAAAAAAAAAAAAAAAFcQKgAAAAABXH1AUJ4AAAAAAAAEsCoECWBUAAAAAAAAAUwGBUAUwGBUAUwGBUAUwGBUAQwBMAQBMpgBEEsCIAAAAAAI4+okAIAmRx9QFAAAAAAAAAABEFcSgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABXEqBTEqAAAAAAmAACegACWAwAiCWBUCmBUFcQKAkAKYlCRXH1AQBPH1EsAIFMSoApiMSpXH1AUBXH1DH1AUBXH1DH1AUKYksfUMfUBAEimIFAVxKAAAAAAApgVAEATAEASwIgAAAIEwBAFcfUUAAAAAABRioAiCREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAkUxAqAAAAAAAAVx9RIAAMCYAAAASKKgFCRVUJAQBPAkqAW8fUSwJgCAJlMAIksCoApgVJEQBDAmAIAmAIAmAIAmALTdZQvACyCe6MAmgUxJY+oY+oII4lCQAiCuIxAoAAAAAgCYAgAAAAAgCZHH1AUAAAAAAAAIkiIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAkU5F+UuKoEcfUSwN9R2CNKaKsuk/JQUr8mcaY5zTL/P/ADpH3fE2K+0V5L/Q0OS22z0yd2ev5PKpPhbzf3QOP7vhJ+ybeo1Xc6rHKdUxXFVjhjjX4VUvR6wrsVjqI6OtjXd5Fq6ONvvY5feA0GAwOSLLYrovKktO9mqfRLCzS0/vRt5xfdZvZMC5WKotnKjPyJLBL9FUwt0kcnst+XiA05MuY4FAIEl6hgVAEgAABNVAiqEiWBUCBLAqABIpiVApiMSpXH1AQK4lwAW8SpPDIdEwECmJcwAFvEYlwjj3QI4jEqABTElj6hj6gIAmyEcQKAriVAiQxYmAmgCYAgMCWBECOPqKEwBApiSx9RQCmJQkAIgkAIlMCWJQGqAJkAgAACLdZQmRx9QFAAAAAAoxUARBVigAAAAAAAAAAAAAAAAAAAAAAAAAAAACqgSVDkFJSw2qijuFTGs1RLyfLTUrcPL+8bw/Lwr2m8K72LY7ctfXqs7NyUsKtNUMvEsa7zfp9pi1dbjJdq2WpZeSLkb+ZY14Y14VVfCq4qBYqq2avqJKiokaeaRsmkbiYs5kS9HStK26oFnMkrmyhsk0q7qiSxzRdkDXqbS13Wa3cjx8vIs1JN9NTS70cnteLxLvKYMlLJFxKWc2QDd19sgema4W9mko+Tdlik5POU7N2W7y91u14WNR0RlWy4S22oWeFuRX+THeXJWVuJWXtKbCst0VZTPX21OVYk+npcsmp/F4o/F2eFu8waFkKl3HMjgBAqqEsCYFFQqCQFMRiVJrF3gI4+okXMV/2jEC2S6IuKioSAt4lSeBLACz0ZJYsSWAwAgC7gVAtY+oj0ZebqIgW8MWKk8B0QECDIXMfUSwAxwXsd0i3sgWyBf3e6MQLAJsoCaAJ4EcfUBHEYlQAIkimIFCmBMiBAEymAFvH1FCYAgAAAAAiCRECAJkAgAAAQJkW6wKAAAAABRioAiCrFAAAAAAAAAAAAAAAAAAAAAAAAAKqSXrIqSXrA3tPytR6Uqpfl5Mq2oWnX+HH5xvvNGaQ3d1ZEsdjhT5Po5pm9ppmX8Mamkf0gXKdOlkxOcaZ0y1ay7pxWx0/lFUp6A2b2FZ5IclAzNJ7HblqFWjt1rq7hJHH0ki0lPJMyr3mxUs3TZfJErZQsrLu44n2P5quhbXsj2A2y4ywrTVFdS/O1wqcd5lZcl8WKx47vtDbVzcdLbeLJy3uz8tLR3+VOkp7lAvm6r+ibHi9riX7oHwo1No2SlZvNnA6y2tTtvHuLa/scrdLXeutlzoXpK2BsZI5Oz4vEviPNertGtTtJjGB1LwGXb66agqYp6eTljdeXi+T7rd5fCX661tTyNumDvIBvam3090ppKy3J0bRrlUUK73R/vI+9H95fZ3jTdFmXKOqmpaiOaCRoJo2yWWJsWVjfLS0+oP81WOmujcVMu7HUfw+637vhbs90DjbJgRxM5oGyZXVlZWxZW3cSLRYcIGLj6iSqXOi7pJUxAiqFSZcVALaqTK4klQC3gSxX/aXAq5gW8RiXliVCWK/wC0Czj6ihd6LukujAsFVQvYr/tIsgTW8fUULuDDou8EFnEqXWQiBZwGBcZCgTQwI9FmXSmIFnH1DH1FxuoiBbZCOBeLbIBbwBMBJAYEsCOARRx9RQmAIArj6igFMShIARIF0AWiOPqL5ECyC6yFvH1AUBXH1FAKYlCRRgLb+kEyAQQK5eokRbrAoAAAAAAAARJFGAoAAAAAAAAAAAAAAAAAAAAAFVKEgBNPQQJp6ANlcomShtLNwyUrY/20hrX9Jvbly8k+l7NN8n88MlRSty+8si/8xjSMgG60v/nkZ6c2Xovmzy7p+XoqyM9IbMbjg0LZAfaeg5VufNnoWp23W0zDyrj4adf0nRuzPbBU7O7gsbZVNmmbKaky4f3kfi/Edoc0rUEOuubzbaGds/I1mtc292ez/wAORTyNqaqqNOXiutdVktRQzSU8it3lbED2Lta2QaY5yejIK6jrIVr+SNmt92iTLk5PBIvaXLs9anzE2vbG7po2+V1nvNC1HcKdt6JuFl7LK3aVu8ej9lPODuGynUHTIzV1nqGXyy35cX7yPuyfi7R6u1toXRnOq2e0tdSVEbzfI3kd0iXztLJ2o5F/FG394D4bau0U1O0mMZ1ncrM0Em8p7y207DbvoG/T2m80PQz8m9HKu9HUR/aRt2lPN+rNCtTs2MYHRvRNExeXf3TeXawyQSNumnaBogNxFcae7qsN3z6ZVVY7lGuUi+GRfrF+97XCY9wsdRbljkfo56Wb6GpgbKGT2W73hbeNer9k21ru1RaOk6BlaGT6aCVekjm9pe0BrfJ1/oI+T/0HJForbeWXyORbVVN/o1XJ5lm/dzdn2ZPiNfWWuqtdR5PVU8kE2OWMq8S95e8viA1fRDomMzosiXQAYaxEy/0XZJLT+EDHWLLsksMS90TEvJ2AxyWBe6IhiwESGBex7wx9QFlou8SwJlVQCyMMi90Q6JgMbFivRGV0Q8nYJsXoiLRGZ5P/AEDoMAMHog0RndEpFol7QGDgGi8JlYRp2lHm27St7wGH0Q6Izui7qjoG7rfCBr2iVyPQGc0WHWpDzfeX4gMJqct9GbDBezvkeiIJMHoyLIZzU5baIbH5MMGQ0Slvoxsfkt4EC/jgMRsl21gF1kLePqGyHbUKYlQTffyRBIiEUATIAQBMgAIkimIFsFxkLYQRbrKE39JAAAAAAAAAARKsUAAAAAAAAAAAAAAAAAAACqlQABNPQQJp6AN7QcnLV6budPytvU0kNYq49n6NvxRmmY2+l6hIrvDHPJyx09UrUszd1ZFxy93db3TX1dNJS1E1PMuM0TNG691l4gKW98ahTvDZ3dsOj3jo2FMGOwtE3Topo1yA+sH+Tu2irBf7xpWokXoblTrWU6t6Jo91lX2o2/4ZDnp6Kk0ptF+eIY8aO+Q+UZdlZlxWRfwt7x5U2F7QarReqLLfKRv2i31EdQq5fSY8S+8uS+8fTXbro+i29bDuS4WTk5KqpWnW62xl5d5t3ej95cl9oD5lXC8tTybzHY+w7nC3nZPf1q7bN09HMy+WW2RvN1C/lbusdVasomiyZTgcd7ko6reYD7GU8+gedjs63lWpXk4o+Xdq7dNj938LHhDnB82O9bLbgy1cPl1ombGlukMfm5PC32cnh+E6+2S7abxoG/U92slwkoayPdbtLIvdkXtKfRjZDzg9Jc4KwyWC8QUtNdqiPo6i0Ve9DVL2uhy4vZ4l+8B8g9VbPsGkxjOqb5pKSnkbdPrPt75kdRQLUXjREUlzt+9JJaW3qiH+G31i+Hi9o8Rao2d4NIrQskisysrLvK3dA8n1FtaBt5TH3kY7g1BoNkZsYzg9w01JStwgcfXcNtb79VUVOtK3R1NDll5JUr0kfu933cTXyUTRNwkVRlA3yxWOv4ZJ7LN3ZV8oh+JfOL8LEV0pNUY+R1VvrsuzBWRq3wyYsalXzLmC47wG0bR94i/1TWMveihaT8Jhta6pY+kejqUj7zQtiWY/NN5vd9ndM6luldRKvQV1XBj9nUMv5gNfiqt5zFW8RLFeybpdW3pN350qZd7LGduk/FkS+fppcfKKO3VO99ZRxq3xLiBo+gDRLjunIPL7TP8A5xZ2pv3lvqmX7smSj5ot9auVFdFWT7C5R9C3uyLlH8WIHG2iI+T/ANBurhaKq1zLDWU8kEjLkuXDIveVuFl9kwWQDFWLAdAZkcDSyLGqs8jcKquTMbb+SlVS4tcZILQrb37bJjJ/ZrlJ90Dj/RhkVeLdOQf9w0Df6Zd292lj/M34SK6oqKVma3UtHbfFBDlIv9ZJkwGHQ6culyXpKe3zyx/bsuMfxNulxtPR07KtZeLdTd5YpGqGX+zVvxGLXVlVdJOkrKiWsk708jSfiMXBQNpy09hp+KquVc37injhX4mZm+6W/LLPFlhaZ5+709d+lVNbmqFtpe6E20a+U6t5qx22LtecWSb8UhFtS1S5dFS26D+Fb4d34lNS0pbzA2y6muUUeMVQsW9lu08at+ElJrC+S8V0qfixNLl6iObZAbj+V9+xx+eLhj/4piX8tdQf/jlz/wDWSfqNLk3+wlvf0BL8m0bVt8dcWvFcy91qhmJNrC8Oqq9weVV4VlWOT8SmlbLusRyYglq2y6hqMcZaW31K/v6GNm+JVViTXS21Ct09jiibvUVVJD91ukU0rSsOlI7GreNQWWsyaluE9DJ9lcocl/tI/wAyqYdy09XW2FZpYVko24auBlmhb+sXdMHNWMq33SqtFQ01HUPAzbrY8Mi91l4WXwsNktWvaIisTSsqpGzSd1VyY3VRWWuvj6aWna31S8UVIvmZvdb6NviXwqa+ouMnRtHBjTQ92Pte03ExBfXXH2ki1rmXHpmipv4kyq3w8Rba2r/vlL/af3TGKZn3yX/L+1ky2iqRekWPpY+9CyyL90wMS8srRSLIjNEy9pWxYy2uEdZu1a5M3+kqvnPe7w8jWuXr4tUykWQzqulanxbJZI24ZF4WMNlJRkxrISigRJshFkJILYJkAgECYD5qgCeAwBqgUZC4Rx9QR/JbwLbdZkMhbbqJo6rQKshQIAAAAAAUYqAIgAAAAAAAAAAAAAAAFVKEgAAAE09BAmnoAuKb3UX7Z5HdF5P88j89/wCIj3ZPi3W940Sm/vX7HbbTb1bhh8skX95Nvf8ALWMDUnN9N2Hyd4VqLlR0dZIqtHSTtJlvcOTY4x5eJvhOC8e73jn9Ktsv1x5bhLceWjeo85UUnQSNJl2ujbhZW7OTLiB3Ls/rZKeZYZVaKSNsWVuyx9NuY3tVea0Poi4TfK0eVTbWZuzxSRfmX3j5h6Hlkul4kqmj6LppOkx7p642TvVWuqoayjkaCshkWSGReJWUDnvO+5v38ldSy3y10+Nju0jSKqru09RxNH7LcS+93TxJrLS8lBIzKp9n7U9Dtk2ctS3q3vGtVHyw1EDRsuL/AGkbN8SseAucHsKrtA3mahrI+kp5MmpatV3aiP8AV3lA8V0d3mttRizYnZGk9fSQSQskzRSRsrKytiyt3lOK6s0lJSzMyqcTjlqKCbtAfTvYNz4J6aGmtOuHkuFHuxpd41ynj/jL9YviXe9o712gbD9A84SyJe6Cpp4q2dPM3u2cqtyyeGRfrPe3j5A6f1lJSsqsx3rsj2+3/Z7cVq7FdJKTL6ambehm/iR8LfiA5Ztl5reptmrzSXC3+WWvs3SkVmhb2u1G3tHnjUGz7LLGM+oWy3njaU2g08Vt1RHBYbjMvRtyzcuVFN7zcPst8Rd2m8zzR+v4ZLhpx009XTL0nJyU69JRy/1fZ934QPjpeNBtFljGcTrtJTRM2Kse99qPNe1XoDlkluVnaehX/WFFydLD7zLw+9idJXLQCvljGB5hks01P2THaimTsnf1ds+4vNmnqNn2H1YHTPk8i9kYyd07Wm0B+7MeTQDL9WB1mu52S5mc6m0RIv1Zr5tHyRZboHF16iZs6iyTRdkwWpWi4gMi33aqtsLQrjPRtxUk65Qt7vZbxLixmdLYVbyjoa5m/wByyVVVv43Ey+7l4u0adtwoBtZtUVixtDQ9HaoW7NCvRs3tSfSN8Rp+PJu03EXG6wsTPwhNZ3S2zd02UNpml4VY2lHpWaXiUIOK4MxcWjkl7J2FQ6FZvqzkFHs+y+rCbqFbNNL2TKj0vM/ZO8KPZ9+7NtT7Pv3YHQcej5G7JkR6Lk7p6Aj0HhxRqZUOg+l4Y8vZA89roWTulxdBt9melqXZRcqrdhtNZK37qlkb8ptqXYPqatbGDS95lbw2+b9IHlX+QDd1g2gW7p66Xm2a2fh0Xfv/AJbN+kvf9mTXWP8A9ib5/wDLZP0geO20G2PCY8mhZO6exJObXrSJcm0bflX/APLZv0nH7hsWvVGrNVWG5wL+8oZF/KRlFZGTyXUaNmTssauq05JF2T09XbPuiZlePFu6y4scZu2gGRfoyCWzzrNQSRcSmKysh2xfNHtArN0ZwO6Whqdm3Qk4+/pLLZdkyJomRiMcWbBbFZ3v6Q0TG0htvS9kyPmZseEr7jMjjWSaHeUcZtKi1svZNfNTsjEoyVShKv2Sp6joso3VpaeTiX8y+IjWUvQSY5dLG28rL2lLaegzaV1lj8llbFWbKNm+rb9LHwj5eMmsZCJlTRMjMrqysu6ysY+BPZjSis4hkLjKFUkjqsqpLEyoaeSeRY0XJjJ5Z0t+7TtySVH+8d3+H+ojsujD6pLa21KfkyrJPJvk+q+TKRvd7PvEuWupoPoKNPl5O3UcvSNy+7wmFJk7ZM2WRZZyOqW+vqzeW8VHJ/PydGn8OFF/KV5LtJy7skNPNyf0xL+JTXjMnrFX3rPubH5aGs9DUUn9pH+pfvGLVUUlK3IrrutvKy7ysvhYsGZS13QryxyL0sDcUf5l7rHxDaNns17IWW6zY1tJy07L8nLyNG65Rt3lMJkJxkxpx1WgASVgAAAACjFCrFAAAAAAAAAAAAAACQKKVAAAATIr1kgLnJwt7JvNUsz6grVdeRejZY8V7Kqqr+U0q/R8vsm71VFyRX+r3slkxm5G7ytGrfmA1C9RyjS8XS1CnF+E5Ro9/wBqUD1BsR0vNfr9abXTqvlVdUR08eXekZVX8R9fdL6B0PsB0tHIyU1PypyLHLc6mPOaeT/HZU+RmxW/Np6+Wm6Qb01DUQ1S+1Gyt+U+uG2Wgj2i7G5LlauXypVhju1Lj9YuOX/LZgNXqTnN2WjhdbRSzXCXl5N2SbzMf6jcwXDSHOJ0VLQ1Eaz8ny+epW5caijk7LL+VuFvunhq6X5ol3W3TS2XaldNG36G6WiuehroW3ZI24l7rL2l8LAb3nCc1+87NqmaraFrnYWbzdygj3V8My/Vt908vag0HgzMsZ9RtkHO10vtIpY7Pqlaey3aZejbp/8AMqr2Wbhy7rfExr9rHMo0/q3lkrtIzJYKyTeakkXKkk9ntR+7kvhA+S9Rp+alk3VYyrfUVFEy7zHpraXzc9VbPpJPnuxz01PlitXGvSU7f1i7vxYnUtw0a0W8qgYdj1RNFjkx3pso5yerNm7Rx2i7N5Dlk1vqfOU7e72fdxPPtRaGom4THW7SUrAfUXZ3z3NLakWOHU1NNYKpuTFposqinb4d5fhb2jmlz2N7JtsVHy19JSW+qeXk+X5wskyxt73R7vxKfJqh1r0TfSHLNP7S6q11C1FHXT0dQvDLTTNG3xKB7n1FzBrfO0jWbU00S9mK4UqyfeVl/Cdd3rmGaypeVuWkqrPcOTwztG33lOAaX54e0KyKqpqaWsj7twjWo+8y5feOw7Tz9tXQcnItZQWWu8XRSRt91gOHV/Mr2jU3I3L/ACdSf+DWQt+Y43cuanr6hy6XRtzfH7CHpPwsx6Et/wDlAZP9L0nTS/wLgy/ijOR2/n56dk5fkqdM3CH+DUQyfpA8VXjYjfrRl5bp+50ePF09DIv5Th9doPiXo97un0qt3PT2f3Dl5Fnju9D4pKVXX7rMcjg2kbINpCckNTX2GuZ/q7pTrG3/ABFUD5EXjQbJl5s4DfNLtBlun2I17zNtCa0t8lTp7Kw1ciZQyUz9NS8v9W3Z9llPBG2XYpc9nt+qbTdqXkjnTeWReT5Y5o+zJG3aUDx9WW1om4TFjpWZuE7Ovml2SZt019t0q0s30YTcXodPSVDLuscoteiGfHJTsbTug2bHzZ3fs25t+qdd8kbWexzz07bvlci9HTr/AFjbvwhB56tegM8fNnKrfoBUxyjPe2heYbT0vRzapvfK3epLWv8A7jflU7dodn2yXYvTLNU01ntkyrl5RdZFknb2ek3vhUD57aL5veptYYtZtO11dG31iwssf9o27947w0nzDdWXJVkulRbrHH2lkk8ok+GPd+8d86n552hNPryxW2OuvjryfzeTQ9DH8UmP4Tp7VXP1v1QzLZrPbrVH2WnZqiT8qgdgaf5h+lqBl5bre7hcOX5OGmjjp1/MxziHm0bI9L0yyVtipMV+vulZJ+ZsTxNqnnU671F0i1Wqa6KNvq6RvJ1/4eJ1ZdtoNRXyNJVVUtTJ3p5Gkb7wSfSiW87BtGcnR5aPpm5PsoYZm3fZVi3NznNjljTGlu9Ny8vFjRW2T/pny9qNat2WNfNrKRu0wH1BqufBs1p+TzbXmp/h0OP4mU1dVz9NBxfQ2u+T/wBXCv8A7h8yG1XI3aIrqOZu0H3V9L25/ejeTqsN6/4P/UI8nP8ANIcv+oLx/wDzD+o+bEd5ml7TGdT18ztvMQ2S1fR9Ofrox25OTlsd65P/ACh/6ht6PntbPq3lVWp71Tcrdp6VWXk+GQ+cdDPI/EcoteT4jY1fQ9duOyPW0WNwno5+Tl4orrbm/MmJqL1zaNj21GgllstPS0k3LveU2Kq5P5vaj3l+6eSdPxcJ2No6xXy9XeFNNx1LXJW3ZaRuj6HxNJ2V9obGrqbnKc0W7bJKdrgj8l30/I3RrcI48WjZuFZl7PtcJ4m1lYVpZJMVPuRttnhtHN01NHq6ogq5vmdoaiSNMVmqGXGPFf4mJ8XdoWOUnCRksr8nQ9yi6KZlJW+nyYyL0v7QzErP9IhXZLxbHGhtY5Zp+wyXKohhijykkZVVe8x2lXbEaylt/TRTQVkyrvQKrK3u9443oPGluFHUfYyLJ949FZfz8r+g5POyrKbI6v0N0p09g8hi2SyI+TyndtMtFlunB7pbWiZt09W680pHWU718C731y/mOgtUWbopG3TYYeZ3ouM6k6clgSlF1rIuDEeJTOuFLgxreBjeRls8ssr1lqzpv2ql8o65I8Y5vF3W/KYLJmZVDULFMrPvQsuMi+Et1FO1LUSRvxK2I9UpR2jsxcS9T07VDYrjiu8zNuqql6novKMmZujhXikbs/3iNRVK69DCvR0672PaZu8w2Vaa+UlZquNI2ip/ou07cUn93wmA26XGCxZn1XKUpLOLMXI6Vm7JsKO2tKy7pyah000qruldlsYtljcfZkOGtQMWWpWQ7OXSEkqsqQyM3hXI47drJ5OzbpXHJjJnX8NZTHaUXC2XAJ6DMrKfomMLtGXGWzmJ19uWrPo+XymmkpW4t6SH5O92l95fwqa1i/TztDPHKvFGysXLrByQV08a/Rq277PZPv8A1fJeVezAZSBdbqIljEQAAAAowFQUUMBQAAAAAAAAAAACqgVAAAAqvWBILxgkvUBeQ3V4/arfZ67kXip/JZG/eQtj/wAtozRxnIbLlc7VXWvik5P2ynX95Gu8q+1Hl/ZqBom6jdafqPJ5lbxGn4+ovU8vRSAeitneoeikj3j6pcxvbXFqXSzaIuNQvLX29Wkoelb6Wn7Uf9W33W8J8Y9H3voJI949JbKNotXp+62+42+rekr6WRZIZo23lYD2Hzm9i9Ts81DLcbdDytpqvkZoGXhp5O1C35fD7J5ivFLNEzbrH0n2P7ZdNc4jSD2e7UtN86SU+Ndapfo5V78fh+8v3jo/bLzRa+wSVFw05HJebLvN0C71TTr7P1i+Jd4Dx1S3KalbFju3ZPzpNY7NeSGlpbh84Wlf9W1+Ukar4W4o/d+E68vGjZIGbzZx2agkpWA+iWhuefofVsCU9/il09UPuydOvTUzf1i/mU5HeNg2yba3SctbRUVBlJveXWCoWP8A5e78SnzSp6iRMTeWnUdws1QtRQVk9DULwz00zRt8Sgeqdaf5O6K4cjtp3VfRd2C6UuX/ABI2/KeMucdze9TbA7rR0d+WklhuEbSUtXQyM0c2PEu8qsrLkvxHcds52e1bTUarBqiSujX6u5U8dR95ly+8dN84PbRrDblcaOs1NUQSrQxtDS01JF0MMeXE2O9vNiu9l2QPPFZcpIJG3iNLq2SJuIldrNUMzbpo/mGoy4WA5xQ63b7Q3VPrrvSHV/zXUIvaHRVEXFkB3FDrn94Z0Ous/rDo/wAsmVuIvR3SZe0B39S63X7Q5VY9a9KyryyZKeYYb9MnaOSaf1RJFMuTAe9di+2+57PrvTy09VLPaWb9qt/Sebkj7TKvZbusemudLs8o9qWyf59typUVlsi+cKeZOT6anZflkX4d73T5taJ1W0vR5MfR/mia+TV+zuXT9U6yVNpbo1Vu1Tvw/DvL8IHzmvWlVeZmxMrSOz6ou14paGjpXqaqokWGGCJd6Rm4VO79suzf+QmvbxaOjwpY5ukpW70Lb0f6fdMnYBcbfpPazp243FuSKjjqGVpW4Y8o2jVm95lA9I7IeabprZ9bYbhqZae8XWNekkWf/NIPdbi9pvhOW6r2+2DTEL01np2usyLivQ+bp1979Km02u6IuuuLVTRWuuWJYeVnkopOXGOo7u94fh3jom+bItYUasrWGpn8VNjJ+FgOPa/5wmttQdJHFdPmil+wtvm2/tOL7x0JeqyaoqJKiWaSWZuKWRsmb3jtDUWgdUU+TS6du6r/AOBk/ScFuWiL82WVjua//o5P0gdd3Kobe3v5jjddLJvHZFRs7vkvDZbj/wCjk/SYrbJdRS8NhurezQzfpCbqWqaR8jVzRTP3jvSl2CasrN6LSt5l9m3zfpNpS82LXVUuSaNvGPio2X8QHm1rdUO3CxFbTUP2T1fbuZ1tFrWXHSc8f8eaGP8AExyK3cxraBU8vJyy22gocvtq2Pd+HIDxtHYZsuEzqfTk3dY90Wr/ACf2oZMWrb9aKNe0sCyTMv3VObWrmBWen5Ue4arq5+8tNRxx/eZmIJfnF886fTk3dY3FLpyROLd9o+l1n5m2zOxr0lVSVlzx4mraxlX/AIeJtMNh+y7ly5V0pbJ1/hzTL+JhqbPnrpXZVqTU0iraLDcbnl2qalZl+LhO8tGczXX9zwkr4aOww8vJxVtR0kn9nHl+I761Lz09ndhjaO3tW3p15N3ko6fo4/ikx/CdPav/AMoFd5EZLDY6K2r9tXSNUSfCuKn3xffJ3Ronmj6b0+qTXm5Vd8mTij/zeD4V3vvGy1lt+2bbFLdLb6appZ6qFd212dVZsvEy7q+82R4D1/zmtX62SSO86kqp6dv9GjboYf7OPFfiOlL9r7dbGQ+bPsa5S9nfPOP50N32tzdHUyLQ2mnbKntsDZKrd5m+sbxfCeNtZXzyqSTeLmotYNUZecOA3S6NUM28V7MmNerV3CXpZC9aX84pgzb7GVa8umUjZ6szG8bHa2kajeU9CWeby60U7tvM8eLHm3TLsmJ6B0JN0mn15W7MjHGcjH6n6W6Iu/OUqfui3NPKtRC0b73ZZW7R0vtI055BWSRqvm23o28J2h84+S1zN2VZlb2TD2jWpbnp9503paTe93tGBjT7N0f1Op5nHjynH2fdW8p3yiwZt04vURYt4jsrUVBxbpwO4U+DHcUWbRflrk8bt2Nepn8r0k8UMk0kvSRriyxrxY8O92d0wmQoZDT/AIfjqnVVbVHKq7sUa8Ma8KmK3WXG6iUcDOxL1Vy2sktxxZmyt9taVuEyLbaGlZd05pZdPby5KYtturfcfxkrpI6f050rK2J3Ho/ZqtRDHU1itFS9le1IbHQezxaeGOsuMeK8UcDdrxN+k51NWec8nhx6Th9k5PKzJWS1rfoXgOmKcWuORlR/pToqCltsPJT0sKQIvZjXE6I24W6ji1JI0Eaq0kKtNj9p/jE7uutygslteqffx4Vb6xjzfrq6SVlVUVErZSSNkzFfHRlKzZldZX014McbXy/xdS3hMZGNHJxchuLxLlIxqeNjvIer8n5nlYdguVmXlDZfLliv4SlPTtPLHEi7ztipfu8iy19Qycnm8sV9nk3Sf1MXX5bAIEyHAx9YskW6yhN/SQJoAAAFFDFAAAAAAAAAAAAFVKEgAAAFV6yhMASXhIkwKr1mdR1UlFUQ1EDdFNCyyRt3WUwV6y8rgb2800LyR3ClVVo6zJljT6mT6yP3ez4WU1DJixtbNWxxRyUdZl5DUY9JiuTRt2ZF8S/eXJSxXUElBVNDLi27krRtksitwsrd1gL1vqmgZTszQ+pmiqI946n4Deadr2gqF3u0B7o2U6wqKWopaqlqnpqqFlkjnibFo27ysfT3YJrG6a42e09yu8iT1PLNJDySxpj0ir8nyM3iPjRsv1Hg0O8fVvmUamhvey2qo1bKahrmyX/Ysiqy/mA5rq3Y/oba3TyVjwxctW3Jj84W11WTLxdlveU85bQeZLqKk5ZZtP1VLe4eThgb9nm+9ut8Ru9W3G4aG1ldoKSsnoqqnqJMZIGxZlZsl+6xk27nZ6i06yx3ShpbzCvE30M3xLu/dA8tam2Ram0bI3zvYbjb1789O3R/FwnHVoG7O/7J9A7FzydCXVVjucdwssjbrdPT9NGvvR5fhN3Hf9iGvUbOo0lXNJ/vMcMMn3lVgPm7UW1nXhNHcNP9P9WfTuTYBsdvvI3QWe2Ozb2dFXMv4ZDBquZ9s0qlzioa6Jf9kNfJj+YD5aVWjel+rMNtC/uz6lTcyfZzNyfKvLeYvZrP1KW25j2zt1/zi+f+qj/6YHyprNF4K3mzit20/wCTq26fXSp5iGzmfiqr/wC7VR/9M8xc9HmraX2KaVs98sF2rmasrPI5KG5SRyM3m2bpI8VXhx3vaUD5+VlH0TMauRcGOWXynVGbE4zInnALcaGVSytFIpZxJRpvZAdpaJujIy5Mew+artM/kVtFtNRPNhQ1n7FVZNu9HI263utix4S07X9FMp3toW87saswH0R54GhvL7Bb9UQL56hbyWq/gyNut7rfiPG1ZW+SyHvXZDqOl227FI6W5vyTzNTta7h3ukVeP3lxY8Pa80hWacvlwtdauNVRzNDJ4se173EBznZ9zs9V6EpYbf00F3t8O7HBcFZmjXurIu9+I7ksvPnttSq/OGl6iJu01JVLJ+JVPEVVQSRSGytasmOWQHu+j55mj5fp7XeofZjjb/3DOTngaGbrhvEft0q/9Q8TUqbpldgD2g/PA0Cnou3/AKP+8Yc3PQ2fxcv89PfG9mlX/qHi+qXdNDcnZFYJPb9Vz4tD06+att8n9qGFf/cNVWc/LSsSfJBp+6ycv7ySFPzMeCblXtF2jjNdqVqfLeA+gVZ/lAKGNW5KXSUj+Oe4Kv4YzjVz/wAoFfOVW8k07aoN366aST9J4GqtaMn1hrZteYZecBGL3BdOfbr6qy6Ca1UKt9hR5Y/EzHBL5zuNoN35W5ZdX10fJ3aTGn/5aqeSqjXn7w1dRrpt7zhVstjF6Cvm1y6XlmavvFdXM3F5TVSSfiY4rVa8xyxZV9k6Tm1hJK3EWfnuaobtEZS1ZNdErHa1Zrln+sNDXavaXLzhwuN6ifvGRHQSS8WRjSvjFv6OKssZlw1BNL2mON11VNUd45AtoYl/J7P6tvhKJZbc18HKTgNVSyS8Rq5rdJ3Ts6Sw95cfaMObT3hEcknwsous2oG7psLXQN0inLpNOb3CZ1t0/i3CJXx1V0cRZGxesNKy4nfejoPINM0zPu5ZTN7J1ppfTTXGujp0Xd4pG7qnY+sbrHZrJy08e603mY17q9o5fMs70o1xe7dL437PpszrPWMXGpLl0sjN3myOYWGoju1j6OXeXFoZP8eydU+X5txHPdndU0tNXx91lYryata9mx4XM7mZ25fU6W1RQNS1VRC3FGzRt7p1veoMJGO6tp0CxakuS/vMviU6jvSecY6LEs2jGTxbqHGjTdZX9smm5Y4aJY43p+nkZVZmZ2XHLexXEtVVB0M2KZNGyqy+yy5GdTSZLGstOk/R7qs2XD3fZNpT22Sqk6R95mM6U9XK143e8YuOw2tpTcW2wszLunJqGw+E5dp/R9RcqhYaWnaVu03ZX2mMS3LjF0ODwMrpRjGLjdn082UarGzM26qqvEd3aH2eR2tY6y4xq9RxRwdmP2vEbPTekaHSdO1TUOjVKrvTturH7P6jiOstpPJVcjUdvZoqXhaXhaT+6c/bfZlS7dfq9jweLw+n6Y5Wb/E+mLlt51fHyO1LRyZY7sk6/lMjSz+VNNJ2Y1VTp+G9+I7N2Z1XlVuru8si/hMe2js1trxnKy5DOjs0e06+Y1jUituwrj73aOhNVV+bMdobSnkXUFyVvtmOm9SOzZG84+EYxi8s6tzLJ5Fm33OK1kubMYq9Rck+k5Sh0sXiMvKTNoU5YFlrG6oVxj/iNw/qNW3CbS6+a5VpV+ji4fEzdo1r+kR+4t8fFaKN1EmKEmIgQJkW6yapQAACJIiAAAAAAAAAAAAkUUqAAAEu0VIr1kgBMgnoJgVUuJ6C2pcj6wMqNzf2mT5xtVZQS7zU8LVVKzcUbKytIq+FlybHvKcaU3Vjr/mu5UtUy9LHG3nIu9HwsvwswGHIhkUL9FMpkXK2/NtyqKXLpVjbzcn2i8St7y4sYq7kgHbmg7z5PJHvHu7mbbcoNn+tYY7hU9FZboq0tUzNuwtl5uT3W4vCzHzb0/cmpWXeO7NC6t6Jo/OAfX/nAbK6jV1Gt/scfT3OnTGamj/0qPw+JfvKeNr1Kz5LvZLu4sdkc2HniLp2hpdM6vmkqLPHjHS3HikpV7snej+8vs8Po3XmxDRu2ijW922pipq6pXJLrbWWSOo/iLwt+ID57VyNk2JrZKiZOLhPRWtOanrTTkjNBQrfKXsz23eb3o+L8R1DetG1lrmaGqpZaaZeKKeNo2+8Bw+OtkVslxX2TKj1NcIFxSsnVe6szKXKqzTRdljWtSyZcIHIqfaDqCBcUvVyi9mskX8xlLtJ1M3/AN4Lv/8AMJv1HFVibusZUMDKvCBsq7aDqh1bHUV5X/8AcJv1HXesq+6X6RZrncKy4SRrirVdRJMyr4cmOcNQM68LGluVoaVujjXpZG7K7zAdF362tkxxGsp+iY7q1po25WPo/nG21lv6Zekh8rp5IekXvLku8dX3alwZt0DjeO8XSbJgRXfAyrbK0Uynbmh7i2Ua5HUdHF5xTs7QtK3TRge8+ZxtDbTWrltlVLjbrwiwtlwrMv0bfiX3lO1udHsyWqq6XU1LDuzY09Zj3l+jb8vuqeVNnKNF0LKzKy7yt3T6H6ejbXmz+j5L7RvE9bT8i1EUm6zeLk7uXEB4So9kt21XXeS2i2z11R3Y14fabhX3jtPSPMkvVUqzXy8UtoX7Cmj8ok+LdX8R37rHafo3Y1bPIVWLkqI13bbQKvSe03d9pjzNtA55mqa+SWO0ctNYaXl4eiXppvib8qgd0WnmbaNoouTkrLjd66TvdNHGvwqps5OaToKePHkW6w/0rWN8v3lPDd+256mvDty1upLrUt4qyTH4cjRx7VbpE2SXauVvDVSfqA9tXzmWWKqy+bdQ3Gj5eytRHHOv5TqDXHM51vZlkktvJSagp13v2STo5v7OT8rHW2m+c1raxSRtSaquOK/VVM3lC/DJkd16F58txiaOHUtrprnD9vQt0Mvwtut90JPJ2rNEXKzVk1HX0dTQ1UfFBUxtHIvusdY6g05UJlusfXS2as2a84W18tDJyUdzfH5fIq5OjqovEva5PaVjz/tn5lNTQwz3DRzvdaXk3mts3+cR/wANvrPZ4vaA+Yt6tdRTs3EcTrEmiZt5j0xq7QLU8k0ctO0U0bMskbLiyt3WU6h1FpRqdm82VSWxdYySzZbzCGKSXtG6qrMyScJlW+0Nlwldk9W1xsaV0mDR2lnZTklvsPeU3Vl05JVTRxxRtLI3ZU7VsGjKSzxrNVYT1K729wxmgys6NL1jgOlrs+XjHx+5wew6Aq69Fl5UWngb62X8qnNrfoC2UfJlNyNVcv8AtkbFS3fteU9BlHSKs8n2rcK/qOAXnV9VXcrclRUNIvd4V+E1GuVlfpi9DlLhODjrGPes/t/3/k7Qaq0/ad1Wo4GXuqrMRbXNlibFaj4Y2Oj5r94jFa/eIvjx33SYUutJV+NNcYu+l1RYa/deogbL7eP9SiTTlhu65JT0zeKmbH8J0LHfsO0bi13vzityMyt4SqXHyr8q5L6ura8qWuVTGX+/1Oya7ZrB8rctHO3y9yX9RiUmhKhqjo5I+gReJ2J2LV1TyYpNJ08fi4viOaXOs5aChkn5OTPlUxJTyK/GTp8bB4rOj8RXHXX2iw+RLbpG2szeai7TdqRjp7V2qprzcmqH3V4Y4+6pstWXmaskaSeRmb8J1zXVrPMbDExtfmS9nGdQ833IxxceOtcW+p61mbiO1NlqNy01c3ZyjX8R07a0Z2U7v2bUfkmn+WZvrpmb3V3SOd41relIyuzoy+3Z11tSl6XUlw8LKv3VOobsmch2RravWsu1dMrbskzN9469roulmNri+NcXC8/L4jKslH6pSWbXQdKx21s32fR6gaSSdmipYccmXiZu6cHsNtzxPQuzmiSh0rDytu9MzSN+H8ph8hfKuPi33SXEV5WR86PjHyKLZvZKHeaB5FX7eXdLtx1bY9L07QxNGzLwwUyr/wDSda36+STzTSNMzKzM2LMcDvF+wyMGGHK7+JJ12V1Hj8bGUcOmMXLNZbQ6q/Ni7dBSrwwLw+93jr2uvmcnEamuu7SsYcOVQxvqsaNcXkvIczdnWbSltJyy21rSsp3Fsir+jraqlbhmjyX2l/8AqOn9P0TPidpaHp6iK8UslPDJK0ci5Y93tGvzIxlGUXY9Mysryq7ENsds6C7rUY+bqI1b3l3f0nRGoouI9P7Y6VW0xDUNxQ1GK+8rHmTUTrkxbxktq4sPrjGjTmWfq8nB5tyQr2SdV9KW14TpHhco+TLr/OwUk3aaPo293d/Dia5/SbOXes8PhqJPwqa6Q+xfL1lusoVYoWMVB/SH9JJuoiFSAAJoBRipRgKAAAAAAAAAACqlSilQAAAqvWSIr1kgCegmQT0EwKqXELalxPQBcXrMyFzDUvRvvAcmjX53sqsu9WW9cWX7Sn739WzfC3hNWy5+0XLbWzUFRHUQNjNG2Stxf4U2FdRQyxeXUUeNGzKskHF5LI3Z9nut7vEoGHDL0THKtP3xoGXeOJshkU8rRKB31pPW7RNH5w9M7GtuV/0ZOsllvEtCrNlJBllDJ7Ubbp4Gtd5kp5F3jtzQusmikjykA+w+xDnA1m0y58lquVvpoKroWm5KimduRWxx7LevvHZWprzpinnjodQNR5SLnGlbDkrL7y4nzy5uW1eHSus7HcppsKeObGo/htut91svdPc22zTTag0vFdKFOSaoospPkj3uWSFuLH7rAQrdl+yjVHJyyParDPl2qWZY/wDlspqKjmlbMa7Jo7TPHl9hXyfqPNN+ljlVm3WOu7pW1FLMzRTSxezIygezf+xns6+X6C5/+ub9JnQ80zZjR4tLa55OVd7z9fJ+o8FVGpron+sKz/1En6jU1V+rKht+aWVv3kjMB9E02VbGtNcnSTW3TsHKvarapZP+YxjVO2/Yzs/Xleludlp5OTsWek6R+X+zU+dMlyk7q/CauuqJpVb5WYDvPnoc5zTG2PTVpsNgttSy0dV5VJcq+NY24WXo41yZsWy3sseFTwpenV5GOxr5TtKrHAbtRYZAcSm4ikK5sXqqnwYyLfS9LIu6BtLHa2qJF3TubQent6NsTiejbD0rLunsfmrbEl2galWath/7jtuM1VlwzN2Yfe7Xh9oDuTmv7BlahpdVX+n8y3nLfRSr9J++Ze73V97um727c5WHTrVVi01UL5XHlHVV6b3Rt2lj8Xi7Jlc5nbTybPLIumbLNyQXiqh89JDu+Rw8O73Wbs91fdPnzrLWTRLIqsByTWW0ZpZJmeoaSRmyZmbJmY6jvmvM5G84cR1FquSeRt5jhdZdJJWbeA5pVa3bLiMNdaNlxHB2dn4i2zME3ZVLrfFvpDklr15vL5w6P6dkYzKW6SRNuswHqLTuv2imhkiqGimjbKOSNsWVvCx692Lc8aqoeSC16xaS62/hW5LyZVMf8RfrF+97R8xLTqiSBlyZjsrTOt283lJ94Gr6p7VNhmltvdijvNqqKaG6TQ5U12pt6OoX0LNjxe1xL90+e21LZHctG3yqtN3oWo66HiXiVl7LK3aXxHZmwrnGXTZlclaCTy6zzNlVW1m3ZPEvdk/wx7K1XpTSfOe2fQVlFURyMys1HcFXztLJ2o2X8S/3WISWVy1l5PkLdtGrFI26WbbpKSeqWGKPJm+6d7bSdnly0NqSqst3pfJq6nb3ZF7Mit2lY4tyR0dnoZpWdVVd5n+TeY5vkMrs+MfZ7d0jwXx8fiLPGmPtJjW+10Olrc0nKyru+cnbtHCNU6zet5Gij5egpO73vaMbVOqpLjKzcrYwr9HF3Tru8XnPLeMHGw5Sl3LPZ1POdSV11/CYPjTH+5mXK/YM28cZrr2zs28a2sr2dm3jVySs50EKoxePZPI2WS8Wwmu7d4xWuMneMViLIX6xaqV9kmct0Y21rvLJIuTHG+EvUsuEhCyuOrJxsuyMnb1hvO6u9vHdU7fPGnXlTeaWn6RfaPM9hr2THeO9NmmoFqqNre7ecj85H4l7SnLchVr8yP0veekORjfKWLd/3IuA3xWlVjiMltZ5juLV2lWpqpqiJf2WRsv4bd042thzbhL6r467NbyHD2fESrsaGx2iSomjjRcpGbFfaO6brMumNLPFE29FD0Mfib/G8afROnlpW5a+VeHdj9rvGPrusaulWlT6GHi8TGvtn8RdGLsuOxf2TgWXy9peMXUl4iZ2bE08NtaWThOaVVtybhMqx6SqrpUY08LN3mbhX3jad+NcXnn7OsyrtYx2YOmbDJW1UNPAuUkjY+z4jt3U9bDpjSckcTYt0fk8PtF2y2Gg0lQyVEsi9Jj56pbsr3VOp9omtPn6s3MlpYd2FfzMaryzLv0xd/rX03x8u5/GscNvl34t44HdLi0sjbxsrxX5sxx1vOyHVVV6vBuRypXWaxXqdWqGOTWW0Zsu6YNltubLunbGz7RzX24LG2SU8e9M3h7pRk3xri2fD8ZZmXRrjHyk2+z7Z+1yRaqqyioV+KT2Tsi6ags+jqVYcViZV3aaBd7/AB7Rjas1JFpK1RU9Msa1LLjDH2Y17x0Tfr80rSSPIzSNvMzNvMc/CuzMltZ6vZcjMxemqfh8fys+qTcbQ9oE2osY+XGClj3o4Fbtd5jpu8VXSyMZ12uzSs28cbqKjpTp8aiNcdYvCec5ezOulZZLaTDqN9i2vCXm3xDTtUSRxouUjNipsnD67SXapuWO20sfekkk/Cv5TAkNhdZuSSo5EX5WSFViX3f8Ma9uo+xQv9loiSKN1ljDRbqIkyAQQBVusoTVBRioAiCREAAAAAAAACqlSilQAAAqvWSIrxEgCegmQJgVUuJ6C2vWXALiko9xiKkl4gM6NzaWu5TUEzTRYtu9G0ci5LIvaVl7SmlVzMp33QORNa47orTWlWZl3pLezZTR+JftF+8va7xrccuEjTyskkciMyyK2SsrYsrHIGqm1HR1EkscfzpTr03TquLVEfay7zLxZcWOWWQGhi3N45Jp+4tTzLixo8d0vUcvRSAeitA6yanaPzh9Heahzm6K5W2h0hqWsWCoj5Fit1bO+KyL2YWbvd1u1wnyI0/e2p2XeO4NJ616JY1aQD6o7Wubf89yT3TSjRU1RJvSW2ZsY5G/dt9X7PD7J5O11pC+aVqmp73a6q2SdnymPFW9luFvdNvsZ55eo9EU1Pb6+RdQWePdWCrkbpo17sc35WyPUemudps01tRrT3SZrQ0i71NdqfKNveXJfixA8F1VPJ3TX+QSStwn0dm2ebGtdNyzRUWnKx5N7KgqFjbl/s2Us/8AZR2as2SWqdVbuV0mP4gPnhHZJpeyXptLzdHkyn0XoebLs7o3/ms8k3hlq5G/MbaTQuzzQ8STT2izW9eX+bkkqo1ZuX2csgPmBHsvv2p6jyezWeuuszdmip2k/CdZbQdE3PSF1qLdeLbUWuvhx6Smq42jkXLh3T606k5zWgtFUrR0zVFd0a7sNtpcV+JsVPnlztdsa7aNbreEt3Ja6WlpVo6eN2ykZVZmykbvZM3sgeVq6DBmNpp+g6WZd0xa7F5jl2i6DpZFyUDtDQNhaWSGNI2lkZlVVXtN3T6c6StFt5vOxdnrFTleipmqqzlX6+obs/FjGv8A5HkjmdaDXUu062zSw9JS2uNrhJl3l3Y/vMvwncPPY170FPatLwSej5wqvwxr+JvhA8mbUteVmoLvcLtcJukrqyRppG8XdXwrwnnXVl+aomZcjnGurz9JvHS94rGlmbeAwayqaWRsjD4yTdZQJoN1EX9JJuoiBbbqIt1FxusttvhKKUdQ0TG6tN5ankXeNCFlZCpc7k03rBoscmPROwXnL1uyLUS1keVZaarFbhb8vpl7y92Rez8J4kobs0GO8ciodUNEvEQThGMvZ7052fOE0PtSn03PYJaqomo0m8onkpehxWTHkWPe3mZWVvCeR9Xaq8sbdbGNeFThdRqpmX6Q4/cr50uW8a6zFrld3vqd5jc/lY3Gx4uMvlx/+vJK8XfNm3jitZWMzNvFyqqulY1sm+ZcYatDflyukts7OW8fUSf0gmwYoAmQC2MVpuMuRvgwYt9s+SWxbi31mLHONP35qWaGaKRlkjbJWXsnWcMuLG4obk0TLvGDbVs6Pj86WPKMovT+m9cUd7p1hq2jgqMcWy+jkN22n6F2y5I8F8Lbp53sd53l3js7TN7ZGj842Ktw5HK34vbl8t73xHUMc6Ma8qO36nYVU3ktLjEuPZXwnD6y3NPJiis0jHM5Y1qYlXLd4jHnnpbNTtJKyxL95jX1z19XZ5mL8RL5ktYxaC2aFhyWav8AO/uF4feL961jadNweTx8iySR7q00HCvtd04hq3aDUTq0NMzUtP4W3m946xul84t42dWLZd5WOJzudxeMjKvBj5fc5Nq7XVVfGbp5FWFeGBeFTre7XfNm3jHuF36XtHH6qqZ2OgoojX6vHuT5ezKlKUpbI1lR0rFy30/SsYLb7G+scWbKZkvGLl6I965yrT9Bnjuno3T9sg0fpblefdZY+mqG8Xd/KdTbMbQtfqKjjZco426Rvd3jn21W6NS22no+Rvpm6ST2V/vfhOYzJSusjS996dqjgYNmfL2j4xdZ6w1HNdKyoqpW3pG4e6vdOsb1dGdm3jkGoK3iOv66XOQ3eLVGMXkvOchZZZLaTHqKhmYx23yTbxep6WaqbGKNm73dU23q4OW1kmPj6jM5V+boOXlbk/apF3V+zXve0xcbkgoOT+ZlqKjvfVx/qb7prah2dmZmZmbvEvZCUe3/ADLMhbbqJkT6wZLTdZFi4/pLbE1ElCBMg/pJKwgTIE0ZAACACjFAAAAAAAAAKqVIkgAAAEyBMATIJ6CYFYy4RjJAXFLkfWQJx9YF5esvRtulgvqBlU8psqOtkoKqGogbGaNslbE1MPWZUbgcguVLDitdRrjQzNj0X+7ydqP9PeX2WMGNN7IvW2vaiZso1np5lxmgbhkX8rd1uyZVVbVip/LKWRqm3s2PSdqFu7IvZb7rdkDHp6homU5Ja781PjvHGVTeLy5IB25Y9atEq+cObWvXnD5w88w1UkWOLGypb9NE3EwHpSl1ur4tkpyyx7QZEZf2h/7RjynDq2SLtG+tet5IpF3gPeGzjafWWK70dxoqplqKdslybdbvK3hY9rZ2rbZs6SWnbkXyhco27VNUL6P8dk+Rui9ftkvnD2bzTNtXzJqyGy103/dl4ZYd5t2Oo+rb3uH4QOBbTqOotNXWUNXH0FZTyNHJH3WU8u6+fzkh9Feels5ZYKXV1FHuyY0tww731cn5fhPnprqgbpJGxA6n46w7S0PS/RnWa07LcN7vHbmh03YwPobzFNP8lPpvUV45VX5ZqiOjjbwxrk3/ADFOgOdJqpr7tS1NUcjZRw1Hkcfsxr0f4lY9Y8zql5KfYxSyL1zV1RJy/Eq/lPBW1Sv8svV2qMmbpqqaTe8UjAdD64rcmkOsaqXORjnGtJfOSHAZG3mCahRnKkG6gKkH9JMg/pAtsUK+0RbqILIov6S2xJusixFYjlgPKGThyDdRaCcVWrJCzJUMwbhYgQXxWm8RFusuN1FtusL4xQIFxShBfGIWm6y43UWj5JKIWm4y826pbbqK18USSyshEi3WFsfFvLPXski7x2Vpu6YY7x1LbXxkU7AsMuOJrsmEXZ8LfKMnoyx1TVVhp514uj+8p1rqK+STs0ksjMxzrQb9Lpmn9pl+8dO6kqmSSZe6zKc1jQ+dKL2nnMqUcGmz7o/+ri+orzvMcPrLk0uW8ZV+nbI4+2TnVVVxjF4HyGXKywknZiy/pL0cWbGVHbWlMnbVqI1SsYKrm3CcmsNPwlmjszZLunMLLZsMd0xLbY6t5xuDZ3HY2x2D/vqZu7Tt+JS5tglb54jXu06/iYzNmdP5LeG8ULflMXbFFhdKeTvU/wCZjnNtsp7XKvt9P6/qdG6gl4jhNQ3nDmWon4jhs/0nKdZR6vz7yv8AEW2XdMyu/ZYVpOTl3VxeT+lmX8pit1GTc+TKWKT7SGPl+7j+Uyml/DxjJhP6THcvN1llybEsWgAGKg/pIt1lxuoi/pJq5LRB/STKN1ElCJFuskH9IRQABNBRihVigAAAAAAAAAkRKqBUAACaeggTAEyCegmBWMuFtS4BMnGQJxgXl31L5jRmQvUBehcyI23jFjMleyBlxy4G0tdyqLbN01PJg2OLKy5LIvdZW3WXwmlVzKhl3cQOTRwW27tlBIlqrPsJ2/Zm9mT6v2W3fEY9wtdVa5FjrKeSBm4cuGT2W4W901sMu8ba33ustcLQ09Q3k7bzU0qrJC39W26BZXxElTM2nzpa63Hyq0+TSdqW2zdGv9nJkvw4lxbbZ6j6C8NA3drqVl+9HkBqccC9G+DGVUWloqNqpKilqYVZVk6CbJo8uHJcTDbwgc00rdmikXeO/tB35kaFuSRlZd5WXiU8v2uq6KRTt7Qt5xaPeA+vuiLtR7fdhfLDXcqtNWUrUVZ/N9HUL9Z8WMh83tpWkqizXKuoayFoqylmaGZe6ytix6f5kO0haDU1Vpuok8xdo+mhy7NRGv5ly+Elz0NmXkGqotRU8f7HeI8ZsV4aiNfzLi3usB87K63dFXcPaOfaN3GjGotLstUzKpnabtEkUi7oH0x5nU6zbE6NV4oq6ojb+0y/MeBNp1L5LdrlD9nUTR/DIx7W5kF0d9E3u1P10tctRyL4ZI/1R8p5f5y2l5LJtM1VS9HhH5dJNH7MnnF/EB491omDMcBbrOzNcUTK0h1nMuEjBMYtkmciBJuots29iSLeQBnIt1FSD+kgsii3WRYqQbqIrEX9JbbqJN1kWILYxW3IE39JFtwL4xW26i2yF0tNxBfFQAEF60/pHAobfYP6SEk4rbdZQq3WUIr4xQD+kmUbhCyMWRbV88pz6xrwnCbXFnIp2BY4sMTXZMnW8RX5O8tAp0Wl6f2mb7x0jqRs5Jm7zMd52tfmnR0bNu9HStJ93I6Cvj8RocPyslJ671L8vBx6f0/+rgd635GNfT0rO3Cbaui6WQzLTa82XdOj21i8U7HeuY9DaM24TkVDYc8d05RpLRdRe6pYYFVVX6SVuGNTuG16fs+kaLpndEZeKpn4vd/umoycyNfi9I4fpmWVHvWeMfudUWnZpdqzFo6GSJW7Unm/xHLaDZdVwqvSz00XxMbS6bUaKnZko6Zp2+0lbFTj1VtauHI25HTRr7ORr98qx1kaODwfaUpOYWHSE1ouEdQ1VG6rluqrbxxPbbPCkltXLz3RyZL4d3+8aOu2tXjo8VqkTxLCp13qTUtRdJpJqiaSeZuJpGyYuoxrO53LGt5fnsGODLFxY+zjd+lzZji8/wBJym2uFV0rMaluI6qEdXgeZPuWKGRXb0VH/A5PxMWOEyrnuTxx9XRQrH/54734i1gfTJq2LcnUXJOMi3CWxYEllihVih9UKN1ESTdREmoktsRbqJN1kW6iShEABFAFW6yhNBRihVigEiIAAAAAAAKqUKqBUAACZAmnoAJ6CZBPQTAqpcT0FtSS9YF0nGQKqBeXiLyegx09BkAXo+HkLkfFyFleouLxKBkJ6C8vCWS8vCBkQymVHKYMfFyGQrgbBZVcyI33TWqxkU8oG+sNVHFXdHUNjS1CtTzeFW7Xuti3umPVQSUVVNTzrjNCzRyL4lMNXN1dn8vpaW5ccjL5PUfxI13W96PH4WAwYWwOZaVunk80e8cJXhNha63oJl3gPWGy/WlRZLpb7hSTdHWUsyzQyd1lbJT6bSx2fnG7IY5I35I0uEPSRtxNS1K/pbJfEp8adI6l8nZcmPXvNr5yVRsur2jmWStslYy+VUitvK32kfi/EBga82bXDS9+qLXdaNqashbeXssveXvL4jV2nS6pIu6fQenqtAbe9Po0clDfYscuRcsamn/9yM4nV81HTfS8jUVzuFJyemOTkjl/KB1zzWKz+Tms2o+XdhuVO0P9Yu8v5viLPPT0NyfPVvvscfmq6n8nkb95Hw/db7p29YebzS2KupauG+1PTU8iyRstOq7ynJNtWhv5faAuVBGuVZCvlFL/ABF7PvLkvvAfHzaFaOiaTdOk7pT9FMx6s2lWH6bdY846otfRVEm6E3EW6yORKZWRiyElyRy3lvBmLeQkRXH9JFuIM5Aqkmr2SLdQzIv6QmgUz7QZ8C3mQZEYj+ktsGcizhfFUsk39JTslcl0USjBQx9WxUIEm6iJUtigUUMFC+IwVc2HaM6ho2lYhKTJhDaTZWWl3lOytJ2ny+upadV+kZV93tHGdP2hnx3TufZ7YvJImr5V4l6OH8zGhzL9YvWemuMlkXRj9LYbQa9aDTbRR7rTMsar4ToK9S5sx2VtLvPllyaFG8zTr0a+12jquubpZCjBr1rbLqjK+IypRj6x8Wtho+lkOcaT05JcayGngXzkjfD4jS2mjzZTvfQunlslo8smXComXJsvq4/8bxblX9uLB6e4j4zI8vX6mci2/Q9g3eFfimkOqNUarqLpUNNUSezGvCq+EzNdaqa7VzMrfs8e7Cv5jq29Xlt7eKMXG+qXs3XP81GP7vj+NcWwuF+wy3jS1F+8Rx2qr2lbiMFp2Y3kaIvJL+TslJvqq8s3aNXUV7SmCzsR/nMmMIxaizJss9iR82LZLAlDTyTyYouTfhLWsltKS7QRK8nLM6+Zh843i7q+8xhTStKzScrbzNkxm1cyrH5PC3m1bJm+0bvGubgJRRt8Y6rbEW4STEW4S5r5LREr2SgUKN1ESTdREmqktt1kW6iTdZFuokxkQABFusoVbrKE1SjFCrFAAAAAAAAABVShVQKgAATT0ECq9YEiZAmBVSpRSoF4qpFeEkoEl6zIXrMYvr1AXoy4vEWULigZJdVzHVy9H1AZEfWXFcx16y9mBlL1FyNzHjbdLiuBnQubyy1EbtNQ1EnRUtYqxtK3DHIv0cnxbreFmONq5mRvmq5AZkkUkE0kM8bRTRsyyK3ZZSKvixsM/n6ly/1lTx4sv+8Rr2vaVfiX2TWAb+13RoGXeOwtN6wanx84dRq+JmUtxkibiA9Oad2kzUE0c1PVPBMvDLHJiy+8p29Y+dFrajWNU1dc8V4VlqOk/EeH6PVDRdo3lHrplx84wHvq2857WFfisupqxvZZV/Cp6E5uG2eXVVxqrBd66SprJf2ilmmkyZseKP8AN8R8rdP7Q26RfOHc2gdpdVbrlR11FVNBWUsizQyL2WUD0Rzvdkv8mdSSXijhb5puzNJuruw1Haj97iX3u6eG9cacwkkbE+uunbzp/nLbJGiqlVfKI+hqoY+KkqV7S/iXwnz92y7K6/RN/rrRcYcainbdlVd2aPsyL4WA8ZXagaKRt00rbjHamrNONE0m6db3CjaKRt0LWGzlvLeDbhEC6Wn9IzDMVLkcvUGcixby3gnEf0kW4ShSRxJfFQo3CRzD+kgtii3WUKZFSC6KilCRazPklsUm6iIIt1la+KLBRjmZ1PS54kJeLKhHaS3T0rSyHKrHac2XdLNrtLOy7p2NpHTM1yqlhiX2m7Kqa2+/WLteI4yzIsjGMW20bpVq+ZVxxjX6Ru6p2Hd6tbTa+jgXGTHGNV7JciipdO2xY14V+KRiXLJR3mjbk4l+8pyttvcltL1foLBwI4GP8PXL5knTGoImdmOJ+QM83Cdrao0vNQSZN52nbhk/KxxlbNvcJt6rY6vNc7jbO9rKK/oLTvJc7rDySLlTx+ck9nunOdo1/wCShtq0ULYyVO9Jj2YzL0LaEt9oaVt2So3svCv+GOr9b31rjdKqoy82zYx+yvCYkf3jI/ldJZ+XD8VrH+JZ/i4dfrlxHBbhVdKzG4vlZmzbxxmZszpaq9YvEeRyZWWLbPkR7W8XFMvkbkt0a/Jj5VJvMzLl0a932jLaDXZgNv8ACXI6Col4KeVl73Rl5rvWf71L7rYmLNUST/SySS+02QR+WyPIYqfk/ap0X91F5yT9Klqorc05YYI+gh7S5ZM3tMY5akcnGKic/tJH3THbrLjcJaLWDJRiLdRUg/pJsaSBEkRChRuoiH9IJqpLbEW6ipB/SSYwAAiP6SBN/SQJoKMUKsUAqxQAAAAAAAAACQAAFV6yhVesCRMgSXhAqSIkgJp6CZBeAkvUBMuq/eLBNeEDIj4uUuliNt4uJ6AMheAuRllesuRvvAZCvvF7Mx8y4rgZEZeXqMVPQXMgMkyY5TDVy5G4Gyp52ikjkSRopFbJWVsWVjdYQ6gbJGSmujcUbebjqG7y9lZPDwt2e6cZjlwMpWzUDMmikpZpIZ45Ipo2xaOVcWVvEpbVzYUuoWaFae408dzp41xj6RsZo18MnF7rZL4S81Ba63FqO5eRs31Fyjxx/rI8l+JVCbVv6QrMvaNt/JK7SrlT0/ly96hkjqPwsamaKSlmaOWN4pF4llXFlCDYW+vaKRd47M0fqVomjyY6hywY3FnujQSLvAe8ubtt1rNmWpYbhFlU2+bGOupMvpo/D4l7P949vbS9n2n+cbs/o7jbKiHlrGh6a23H5P5170cnh7LL2WPkLo/VvRNH5w9g82bnIVGzi5JS1kklXpusb9qpk3mhb7aPxd5e0B03tI2e1djuVXQV9I9LW03KySwyLvcjHQmqtMtBI2Kn2L2y7H7Ht60tBebPPT/OvJF0lFcI+XzdRH9m/wDtX+nst/5nzp2i7Oqyy3GroLhSPSVsDdHLDIu8rBN5KrqJomY17dZ2hqjSjU7N5s6/rqBombdIJRa1iOYkXAss5FZFcZi2w5X7xFuoLYxMyL+kEW6yC+Jl6iORQo3UFsVSPaJFGcguiqQ7AAWxQKr50lhkZ1HRZsuKlUpasyquUkaWjZ8TkVrtGbLul602nh3TsTSOj5rtMqovRQr9JL3f7xrL741xdxxHEWZFkYxj5MfSukprpULHEuCrxStwxnanI1v0fZ+X+bGL70jEama36PtKL8mKLwovFIx1LqrVs10qGmnb2VXhU5/5mZL9L2H916ax/uul/a3l21fJX1TTSth3VXhVTHodVSU9QskEmMinWddfmy4i3R35uRuI2UcXxcHLqCyV223k9L2i70uqrWyuq5cM0Xd8RoKrT8kFwjpVXJZG83J3lOudM6wmtdVHUQNvLxK3Cy907Vo9pNjnpVkmmalk7UbRs3w4monRZTLx9XpGHyeHy1MfiJa2RZer69bJpmRY91pF8nj/AMeyee9QV/FvHMtoGuVv1V5jKKlh3Y1bteI6pvVyzy3jZYNEox8nC9UcvXkXa0y8YtLcqjpZGNexcmbNi32joYx1eRWS2kyaKFXkaR/o4l6Rl73dX3mMSSVp5GkdsmZsmYzJv2e3xx9qZukb2V3V/MYIRs8Y6os+DFtnJMW3LWHKSnaIM5PslpuolFjSkiQJv6SBNjyC0/pJkH9JNTJAiVYoFCDcYBFusmokgQf0kyD+kkoAAEUW6yhVusoTQUYoVYoAAAAAAAAAAAEgUUqAKr1lCq8QEiS9REATAAE4yRbj4y4BMmrlteokoFxPQZBi5eovL1AXlcuK28WVYmBlE14DHVi5G28BkL1lws5kwMmN90krGOrFxXAysvUXI5TFViSvvBNnRy94yM/Ea7LxF1ZQgzlfey3cu8banf57p46NmyroVxpWb65fsfa7vw904+tRvF5XAvlFlaJjYSP8/RtUL/8AEo1ymi/3hftF8XeXtcXeNS3WBySz3lqeRd47W0frJomVWkOh45WQ31nvkkEi7wTfRjm3c5qr2a1S0dWz12m6hspqZeKFvtI/F3l7XtHrLadsl0vziNJ092tdVB5a0OVDdYN5WXuSeH7y/dPkTpHWTIyq0h6n5vnOPumzC5K0MnLXWeoZfKrazbreKPuyfi7QHAtqmyW5aSvFVa7vQyUddDxK3Cy9llbtL4joHVWkmp2bGM+yt6sOhuc9oSKoglWo5OXk/Z6uPkxqaGTtKy/iRt1v/wCzwXtv2CXnZzd2obrS5wyZeT1sa+ZqF8Ld7wgeGLpa2p2bdNLNFgx3hqrRTRNI3RnV94sclOzbpUui4yQL81O0TGOzhbFLL1FtnI5huAjJfEzDMQB8XK5eooAQTimF3gq5myoaBpWXdISlqzKqpWSRo6NpeycqtNmzx3S9abNljunZujtDctdyLU1KtFRr8Un901GTkxri9D4Xg7syyMa4sPSGjHurrK3mqNeKXveFTn90utDpO1rGsS5KvmYF7XiYt6j1JSaZpEghVPKORfNwLwxr4jp3UGo5KqaSaeRpZG4mY0cYWZktper1e/KxenKezR5W/VL7WRqbVE1yqJKieTKRvur3VOA3a7Zs28W7pd2duI4/VVTMdBVRq8d5HlbMiyUpSKqqZ2Iw1WHaMVnzKGZq5ruS22b+ju3Rdo2Hz9u8Rw9ZcSXTsVSqjJsIZ1lbfVl26XtGlqqrpWMdpWLe85ONeqi3JlZ7JN1kqenaqmjhXdybi7pbYy+X9ipWX/SJl+GP+9+H2ixjR8vZZrahaioZuTlxjXdjXwrwmNI5JnLLBROW0tlCD+kmWSbFlJVuEslyRy2WqJIt1kWKlGCiShabrLpZJRUyUYoVYi3CfWOiRk4eUkW5CauShAmQJKAAE0UW6ygAQUYoAAAAAAAAAAAAFVKlFKgAABMBPQABMgSXqAqTVyBVQLy9RUgrEwJF2Ms5El4gL5dVzHV+8XFbNQMhXJKxZV94mBkq5cVzHjfdLiuBeVy4Y+ZcUDIVyWXqMdXwLmYTZGZJZTHVyWXqCC+X45cDFV8wsqqE2wp6hopI5IpGikVslZWxZWNpMi3mOSqpo1irFXKopolxVl+0jX8S9niXd4dHG5kQ1UlPNHNFI0UkbZKytiysBFmYks+DG0mihu9HUVkSrBVQr0lRGq4xyLlj0i91smXJfeXumjbqA5Faby0Ei7x2dpPWTRMvnDpGOXe3TkFnr5IpFxYjKWqUI7Pb2xbbheNn95huNmrOiZsVmppN6GoXuyL/AIZT3/o/Xejecrouot1XSxPNyx/JVWmp5fOQt9pG34ZFPj5o29yIy7x3/s+1nV2Ktpa+hq5aSrgbKOaNsWUo7sYtrHjbLI+LtDnA81yv0A81dRK9z06zfKtXj5yn8My/m4W8J5K1doPDpPNn1A2Oc6HT+0hI9P6gkgo7069F59eXkp67vY5cnyZeD4Tr7nB80fk5KeovujKXlnpuXzlRaF3mj8UPeXw8Xd7ohON0dq5bKsrEyuPt7GZXKuf6nygv2nJKWRt04jWUrRNieoNZaI+kbozpnUWl2p5G82WMaLrnLAizmdXUDRMxr2QjJkxVBB/SRXrPicVzMvRxZkY4sjcW+g6VlK5S1Z1FUrJFDbmlZd05dZ7Lwsylyz2bh3Tt3R+ikpYo624R/wA/FHA34m/SaTKyo1xencBwF2bZrGLE0foZeVI6qvjxh4lg73teE3eqdYw2ONoKXFqrh8MZjaw1stAslLRSee4ZJ17Ps+I6dvV8xy3jT1UWZUu5Y9I5DlcXg8f4Pj/b6pMi+X5pWkZ5GaRt5mbtHB7ldGlZt4t3K6NKzbxpZqhnbI6OqrV4rnclK6RNUZGPxMOJi5DTtLJii73EZLR7SlIjiaVlVFykbhUVFLJTsua7rcLcSt7LF6adYlaGDeVvpJe9/dLcNbJTqyxt5tuKNlyVvdI+S/5frJYIYGc1RRy8m/TtA37iTd+FiOFD/vE6+1Cv6hsdv7ZMFusKjSsqqrMzcKqZmdCvZqZ28TLGv5iElzfHlWGNKZeXd5ej4m9puIGsY+0holoGylxlqOzFxLH7X6TEklZmZnZmZt5mYoWmckqnNQgzkmctk2NKQRZwzkCUVUlGfeIv6QRbrJsaUlCJVigVSQf0kCbltiaiShRuoqQf0k1QW26y4WhFRJRuoiSbqIklYAH9JNFAoxUowQUAAAAAAAAAAAAACREkAAAFV6yRFeskAAAEyqlCQAvFkmnoAmVVygAulyNyyrklYC9l6i6WSaAXlckWieXqAyFckrGOr7xdAvFVcsr1klYC9l6i5mWcgrgXlcuZqY+XqJKwGVC5kK5gxuZ1LE1VJHDH9JIyxr7TboTbiqfyCy0tHwyVX7ZN7PDCvw5N7ymlc2WpJ1lvldg2UccnQx+zH5tfuqanPJgMinTNjklnosmXE0tti6WRTsDTNraqmhhRcpJGVVUwb56xdVxWH8RZGLk2kbRUVU0ccEeTfhO3LfTrbKTlV5M8F3mbdUw6C30Wk7N8jN8vIu9JJ2pGOD6i1fNWOzcvmo14YlY5GU7M6WsfGL9C0YeD0tjxuyI9zI+mP2/7/wDLtG2XegjqFblxlxbdyPX2wLnYx0q09g1fU8slJux092dsmh8M3eXxdntHzOXWjU830hzDTev85FXpDp8OiOPHWt4d1Jyl3L5Hcypbf/n+V9OtvnNftm1Glmv2mPJ6S/SL0zcit+z1/r7Kt4u12u8fO3aFs2qrNcKyhr6OWkrqdujmgnXFo2PR3Ny51lds/antdzaW56ZZvoMspKXxQ+H938J6k2obItKc43SlPdrZV03LcWhyobxByZK3gk7y+HiU2fs4L1fFnVGlGp2bzZ17cKBoGbdPaG1vY/c9HXustV4oWpK6Hs8SyL2WVu0rd4886s0e1OzebIMqMnUMy4MShiyY2ldaGimbdLlvtzMyriVylq2FFcrJapW+g6VjmVns3DukrHYc8d07g0Zo1LZGldWx+d5N6ONuz4vaNBmZUa4vVunenrs2cfw/BXRmi1t6x1lbH8s/FHA31fibxGPrPXK06yUdBJ4ZJ1/CpLWur+hjko6Jt3hknXteFTp69XdkyNXRjSyJd656Dy/LY/D4/wCz+P8A6pJXi+cWLHC7hcWly3iNwuTOzbxqZJczp6qtXhmdyErpElRm28W+MjxF6liWWaON5FiVuJm7Ja08ZbSSp4GqGbHFVXeZm4VE0649DBksPabtSe1+kuVzNE3k/RtBGu8sXe8Td4xB7MyUu34hBpS22+xFkCruarmXqIs5bZiOXqBsvZFtmIAHcVZ8SBVigVSkg/pBAozkvyR/MYi3UVIE1EpBAq3WUJqVGcoCDhTKSBEkRCsIB/SCaqSLcJArJxlCSiSAACIRbrJECaIUYqAgiAAAAAAAAAAAAAFVKFVAqAABMgVXrAkAAJL1FSBMCRVesipUCZJeoiE9AF0ESqgXI37xcVywTAyCSuWY3LgF0mrFoqu4BeV94uZeox8vUXFl7wF5WJZlnJf9hJXAvK4yLeSklbdCa9G5uNMzrBqC2zOzKsdQsje62X5TQr4TZWuVYq6nZvtFISWVR2lGMkZKjJmZuJt4s8nGpKRMWZW4l3Syv0g2JeLk1h4lO5dlkEcl9p2bsxsy+1idJWefFlO0tB35bXdKWob6NWxb2e0abOjKVcoxem9KX105lNlnrGUXZ+vJmbkp4uzizHVV+eTeO6dQ2j57t0b0zK0y70fiU6su1rbJo3VlkXiVjR8fZHXV6n1biXyyJWfj6y9XVtZLN026Z1nulRBIvEbissObcJZp7M0THSxvjq8St4qyUnY2j9SyI0asx6t5vm367bMbmrQSNV2eZsqq3M27J4l7sni+I8YWWJqeRTtTSd0ZGVch8TFXHg7JPqXqnSej+c1oCGqhlWX5eRvJbgi+eo5O0rL+Jf8A/T537ZNi1x0RfKm13Wl6OdN5ZV5Pljmj7MkbdpTsXZJt0rdk91WtpnepppMVqaDLdqF/K3dY9jXq06Q50uzaOppZOR+R15XpatF89RTdpWX8S9r4WLa8im6WtcvJr8zhs/iK43ZVMo1y+rV8a9RaKaKZvNmtt+mmWbeU9Q7U9ldforUNZaLrS9BVwt7si9mRW7SscAotMR8tTnIvml+8YOZb247Sdh01xks7IjXX9TB0XpNaeOOsqF/hr+Y3F+ruWKFqeFsM+Jvym2klhR+RGkjRuTs5Ylia2UlVyfJj7yscZ3drO5Y/TMOP+FxPhcSX8zqS/RbrYnXd6pWdmO+7xoLkq1ZqaqX2JV/McAv2iK6gyaelbo/tF3lN5jZVf3PJea4LMj5Sr8XS9ZRSZGtkiY7IrrD4TjtdZsOyb6FsZPK8njbIuK4BPQZ1VRMhhsmJfts00q5V+y9DW4xrDKvSw93tL7JGoi6LFkbpYW4W/wAdos5koZ/J2bJeljbiXvf3h+S2Nm3jJbbrLbPgZFRF5Pji2Ubb0bd4w26yMfJCUdZeShRipEl+SOyuRFnDdRE+mwRZ8w3WUJIbBEqxQI7KN1EQRZyaqUlCjDItswVyklmWW6yTdZAKJSAATQQf0gFuRwolJQo3UVIElYAH9IRQABNAIlWKAAAAAAAAAAAAAAAAASBRSoAAATBAmAJL1EQnoAmAAJq5ItE1cC4vUVIKxMCuRJXIAC6XF3yzl6iSsBeV8C5mWiq9YFxXJlokrgXF6yRaJAX1fMqWFcudKBeVi8r7phq+Jejl7JCS2LZXBs6jpl4Zl6T9X3sjDbrMiH9op2h+sj85H4u8v5jHzzUjHx8V8/Ly+5lUdR0TKcwsd3xx3jgqvgZ1LWtE3EV2Q2bDDypUyehtFbReS3xLSVeU9H2ceKP+6dh8vzNqmBWXliqvErYyL+Y8sW299FjvHJKPUeGLLJi3tHM38dtLavxk9t4frKVdPw+VHuV/qd41Ozq3ycu7NPF8LFuLZnb+Tl36id/hU6wp9eXKJVWO5VK/1jEptf3KVcWuVT/aMYnwuV/5HQ/t7p+Xl8L5O3qbRtltyZNDnj2p5C5NqWy2tejSoi3ezTLl+E6JqtTSVDZSzNK3ibI18mpcO0Sjx8rP4klc+s8fFj+448Y/7/S9AQ6uoa2TkVUZV8R3PsJ28TbJ78tTS8jT2uqZVuFFl9MveXuyL2fhPDlLrBopPpDlln1u275w3WNi14/lGPk815jqDL5qMqcizav7fpfWjnC2bSO1jYfLrOCsjVaGl5ayguMXJmzfz/QtyeJt3HssfPy5V8VspXn5f5+6veY0Ng2sXGC0y2l7nVrZZ36V6BZm6Fn7LNHw5fzchx3VOo+SvbkWnySmThy/EYOd+Esq6MdfF1PSdtHA8ZddGza2UtYx+2LAvGpW6ZmaTeZjRtq2SJskmaJvC2Jx2+VsmTHFai6SI29kX14sZNVk85dXL2dyW3abcKXdaZale7OuX3jmFo2kW2vxWqVqORu1xKea4b4y9o3FDqHxGLbx1cvpbrj+scqnx7m0f1PQ100lab/T9PGiQs3DPTdr8p1zqfZ1WWxGl5I+np/t4l/EvZNXYdX1FtkWSlqGjbtL2W907P05tCpbnyLBWY0szbqy/Vt+k1+uRi+vlF2Ub+I6gjrZHt2f2ugLpZMMt04rcKBky3T0/q/Z7T3WGSqt0axVHE0C8Mns91jpK+WRomkVlxZeyxt8XMjc865/py7Al5R/qdasmLEcjaXKl6Jm3TTyLvG6jLZ5lZX25asyldZcqeVsY5OFm+rbvGLNE0TMrriy7rKRy3TIqn8qp46jtfRye12W+H8I9SMto/ysFuoZkmLBNRsmQACOyn85Uoz4FCaGwQf0hmIBHZVusgVYoEZSUbqI5kW6yLBVKSpEFG6gqVIP6QQJq5SVZyBVihJVJRuoiH9ICIQKt1lCaIAUYIKAAAAAAAAAAAAAAAAAACQIlVAqAAAAAmnoBAmBMEE9BMAVUoAJE1YtqVAvAgSVwJKVIlVAuKxLNi0TAvK+Qy9RZLivmBeV8xmWiYF0pkWyYE8vUSVi0VyCbOhnZMWVsWXhYyqhVqI/KIsV+0jXs+L2TVqxkU9Q0EiyI2LKVSiyYzj6ySbqGWBlLFHWfQYxTfYNwt7P6TFkVomZWVlZeJW7JHYlXKK9HVMvCxlR3Zk7TGr9koNdlkZyr9XIY78ydol/KDxHHCnyeIaRZHxlzfSXxm7RiyXRn7Rqi7CmQ0ih8TZYzoa2R24jlFnqpMlxZjQ2uj6VlOdafsebLumNbOMW847DsyLHJrGk0qqcuXSFyqIcvJZPe3TkehtLxWugjrJF/aZFyXL6tTlUcq8vLj8ny/0nIX50tvlv0XxPSlMceMsqXlL6XRl80pNTtjLC0TeJTgt2sLJlunquphp6mLoJlSVW7DHBNVbOeljaagXpF+w7XuluNyPlrY1vMdG+MrMXy/yeaayjkiYw1qpImOxrxp7FmXHFlOI3Cx4M2KnSwtjJ4pl8fdjy8VmhvLRMu8cws98zx3jrualkp23VNha55EYW1xktw8y6mzWT0XoTWfRtHQVkmdM27HI31fh9kydp2klqqdrpTLhIv+cL3vEdW2OdmVcjvLSVwW96e6Kp860a9DJl2l/+k5XJr+Fs71b3jhcmPNYcuPyv6XmW/W3Bm3ThNcmDHbmtLR823CspW+pkZTq+8RYM2J0uNZtF4dzWJ8PZKMmnVzOoX6VZqf7SPd9pd5f8eI1q8RlW+Xoq6nk7si/iM6Tl6peSyz5Fov1UXk80kfdZl+8Y7CKMvEyGRQg28WKNgECmQR/NLL1EWcZFsIBFuslmQAAFMgqRbcIh/SH9JNXJFusoCjEnxQAg/pCkD+kEAiAAmgFGKkQAAAAAAAAAAAAAAAAAAAFVKACQAAAAAVXrKACZJeoiAJgpmVAEiJVQJL1kiBNPQBJeoqQJL1ASyKkQBdHAQK5eoC8r5lSxl6iWYGQCzmxJZQL2ZUsM7ElfvBPVczLiuWQBlK+ZmR3JnXo6iNamNVxXLiX2WNWrl5WKpRXV2yi2HRUc/wBFUNA3dqV/Mv6SXzTUP9Eqz/wJFkNfmTI6r965e0V9qOoTLOnlXHi82xjGXbWzrqdWyxZseLvGG3i4j4SjHXaKOZnUaZsYJnUL4MfZFXs7A0Hpqq1HdI6OjVWkbebJsVVe8x25R6IrLJIq1Ea4/ax7ynU+gdQ1FhuUdVSsqzLu728rL3WPRGmtXUuooFjZVp6tl+j7LeycryE7q5bR9X6A6Ow+Lysft2S1u/tb6FP2ONV+zKQcfulxV6Hk5F5OEgrL5RunNRl7Pc5R1lXKTW6gqPJ8fZNVRawSnk6Ot34/tF4lLmtuRoaWCTk8SnV1wu3RM28bKiiN1fk4jl+Ts47LlKEnbN90xbtU061CMqTMu7Uwb2Xtd46q1JoiqtEmNRD5vsyrvKxGw63qrNUZU83m24o24WOz7Jrq0XyPoajGlkbdaKfhb3i394w/1Ra+UuJ6ij5fLu/y/wB/5OgqzT3hMWnseMnCehbns7tVz85BlRs32e8vwmkfZTJHJuVkLL4o2MyPI1yc5f0Xl12eMdnX9po+iO1dnVPItJWSMrdEzKqlLfs3p6dlaqqmk8MS4mVqfVVv0bbfJ6fovKlXGGmXs+JjX33/ABHy6/J1/FcZLh/3zMlrGLqnapURtqa5YdllX3lVTpu+S5sxy7Ul3aomkkdspGbJm7xwO5VGTHT4sO3GMXhPUOZHKyLLI/VJrc/OF6PekVV4mYxu0ZtrVWuFPlwq2Teyu8bOTiYeUtS5f/EKv+M34jDbqJSS9KzSNxM2RZbrEUbLNpbKAET6oACAAAgAKMMihNDYKN1DMiFcpBHL1BusoSVqMUAAEAAqRbrKAE0AAAUYoAAAAAAAAAAAAAAAAAAAAAAAVUqRKqBUAAAABVeskQJp6AAAAmCBMCqlSJICYIEwJggTAAACQIkgKr1kiBVXAuK5MtDMC6Vy9RFXKgTBAp0gFzpcC4spjs+YXrIarY+LOV8d5W3jKuC51HTcn0dQvSL+ZfiyNbG5nU8qywtTysq72Ucrdlv0sVyZNcto6sdlJQy49ojIrRSMrqysvErEeEkj6ycks9y6Jl3jsjTuo8GXeOl4ajBsjfWu8tEy7xg30dyLp+K5WWLJ610pq+O7wxw1En7T2X+0/vG+q+Xybk6bk4e0eatO6owx3juPSm0Knq41pbhIqdlZ2/N+o5HJw5Uy2i/SHB9SU8hTGnKlrL6ZN/rGk8psVU673R/JIp0DqCo6KRj0l0KtTNBytlC6uq+yeW9SVS9JIqsZHGeW0Ws64j2413fdH/Fp2uzRTcRtKHUOHaOI1UsMCrJOrt0mWKxNju94xZazydo2SRmhkXJWbi946TtRk8MjyFlMnb1p15XW1V8lrpYl7uW78Jv12u3fkVV5ZoG8TRKdFR3tk7Re/lD4jDswa5e0XRY/VeVRHWF0o/1O3rptQvFZGyyVzRR92Dzf4Tg901D0uTZb3eOJzX5n7Rr6i6NL2i+rDjX6xa/O6huyv4lkpM65XLpWbeNDUS5CSdn4i2noNjGOrjLb5XSF4DOp26Cjmmx3pPMx/m+7+Ix6eBqibFcV7TM3Cq94lWTrLIqpksMa4x5fi94+oR8fJit1kWcM5HM+6saUlSjdRFmI5eokbJP6SBVnI5BHZUESDMDZJnIgEkAjl6iRbZwgqUYqRAFG6ipAIBFusN1lCaIAAgFGDFAAAAAAAAAAAAAAAAAAAAAAAAABIiAJAopUAAAAAAmCK9ZIAAAJki0TAkCIAuggVVwLoLWXqLiuBUAAVyKkSQArl6igAmM+6QATTzyBAATGZHL1EswLiyl5ZVcxSSuEoybaOeOojWOoy3d1Z14l/UpZqKVqfFslljbhkXhYw427JlU9R0WSsvSwtxRf47RVrqyY2Rl4yQKxy4MXKin6JVkRulhbhb8reIx28JBDyjJvLbdGiZd45RQ6jZV4jrtZWQyI6xl7RXZVGTcY3IWY7tiPaNdKO3yUdPcJ4KeRcWiWTdOF3K6dLlvGh+cm7xjyVTMVV40a/VnZPNXZUYxsltqzpq+GWNY6iN2VeFomxZfDwmDVVflEi4r0carjGvdUx2YGVGLSytlYMzd4hkxdaKRFVmjdVbhbEt5eo+KJRkpkwKqjStiuTN4TMS0VXLyfK8fQR96ZujX7x921WxhKXqwjJpaWSqZsV3V3mkbhVfEX8KOk+kkark7kO7H8X6SxVV8lUqruxwrwxx7qqfEtYx9kqirjijaGDLo+0zbrSf3fCYbPmRZy2zk4xUTnsk/pI5eooCSoBRigAFMyIAAjl6ggkMyAAo2+xQAIABB/SEdgAgTQAAAAKMBUiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAkRJAAAAAAAqvWUAEwRXrJAAABMECYAAASBErkBUmQAEyZAATJFomAK5FABXIZFABIESuQTVBTIqBNWLiylgqrgZ1LWtT5bqtG27JG3Cxekp1dGmp8njXiVuKP2vD4jXq+JehnkgkWSKRopF4WUqlFkxnGUdZDMQM7paWr+mXyWb7WFd1vaX9PwlPmiaXlyp+jq1/ctl93iI7LO1KXr5MIp/OXpKWaJsZIXVvErKXobXWSrlyU8iR96Tza/ExKUkYwlLx1Y5epKdeVemm/zdfikbuqXVWlpFylk8pk+zj4feb9PxGNUVUlU2T47u6qruqq+Egt1jX7LzXeszZkqJYvDEzKq+6W2r6hmyaZmbvMYrORZj7qhK+X3M752rMcfKpVXuq2Jjs7M2TMzN3mMYrl6iWqMrZS9lxnIsxApiS1VbDOUBTMJKkMwAGYzIt1lAr2AAH0AAQUyKFcShMACDMEQEcvUUCCrdZQAAAABEkUxAoCREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqpUiVUCoAAAAATIACYCegAAABMECS9QFQABXIqRAEiuXqI5FQJggVy9QEsyZAATBAlmBUFMyoAkRAFcipEBNIqvWUKZAXMyZYyGRDVL82R0jfaN8RFnZ+JsvaYs5DIapdxczIs5HIoNUfzVyKkQTRSBDMZgSyGRQAAUzIgH9JAmRy9QEsyOXqKAJAAAAozlvMIrpEgRbrBskzEAAgAAAAAAAApiGDFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqpUiSAAAAAABVesoAJgjl6iQAAASzKkABMAACREAVyKkQBIrl6iORUCeYIACYI5eoZeoCRLMjmAJZjMiAJZjMiAJZlSACaZTMiAJZkcwMwAI5eoZeoCQIACuXqKAACuXqKAAAUyAqUyKACuRFnIgIAGZAAAAAAAAAAAABRipEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACQIkgAAAAAAAAJggVy9QEgAAAAEwQJZgVAAAAASKZFABIEQBIFMhkBUFMhkBUFMhkBUFMhkBUFMhkBUFMhkBUFMhkE1QAABTIoBIpkUAAFMyIDMAjl6ggkRy9RQAAAAAAAAAAAAAIgSIgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABVSpErkBUAAAAAAAAmQAEwRy9RIAAAAAAlmVIACYIZkswKgAAAAAAAAAAAAAAAAAAAAAKZkcwJlMyIAZgAAAAABHL1ASIAAAAAAAAAACjDIoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEgAAAAAAAAAAAAFcvUSAAAAAAAAAAAAAMwAJZjMABmMwAGYzAAZjMACOYAAAAAAAAAAAAARy9QAFAAAAAAAAAAAAAEQAAAAAAAAAAAAAAAAAAAAAAAAAB//2Q==\" data-filename=\"69f74b9bd69496194ba17276720f5db8.jpg\" style=\"width: 736px;\"></p>', '2025-04-01 08:13:25', '2025-04-01 08:14:31');

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
  `product_type` enum('Default','Neon','Metal') DEFAULT 'Default',
  `metal_type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
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

INSERT INTO `products` (`id`, `name`, `slug`, `product_type`, `metal_type`, `size`, `sizes`, `color`, `colors`, `font`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(395, 'Customize Neon', 'customize-neon', 'Neon', 't_shirt', NULL, NULL, NULL, NULL, NULL, '<p>Test2</p>', 'test', 'test', '373', 600.00, NULL, 296, 57, NULL, 'No', 'woodframe_001', NULL, 'Yes', 92, 1, '2025-03-26 09:55:53', '2025-03-29 07:39:56'),
(497, 'Custom Print', 'custom-print', 'Metal', 'canvas', NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'te', 'te', '', 800.00, NULL, 266, 51, NULL, 'No', NULL, NULL, 'Yes', 10, 1, '2025-03-29 07:16:51', '2025-03-31 04:51:57'),
(506, 'Magic Mug', 'magic-mug', 'Default', 't_shirt', NULL, '\"[\\\"Small\\\",\\\"Medium\\\",\\\"Large\\\"]\"', NULL, '\"[\\\"Red\\\",\\\"Blue\\\",\\\"Black\\\"]\"', NULL, '<p>Magic Mug</p>', 'Short Description for Magic Mug', 'test', '', 700.00, NULL, 298, 61, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-01 06:47:28', '2025-04-01 06:47:28'),
(507, 'Synthetic Frame', 'synthetic-frame', 'Metal', 't_shirt', NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 5000.00, 8000.00, 266, 62, NULL, 'Yes', NULL, NULL, 'Yes', 100, 1, '2025-04-01 07:20:41', '2025-04-01 08:18:31'),
(508, 'Testing', 'testing', 'Default', 't_shirt', NULL, '\"[\\\"Small\\\"]\"', NULL, '\"[\\\"Red\\\"]\"', NULL, '<p>tes</p>', 'test', 'test', '507,506', 700.00, NULL, 297, 65, NULL, 'No', NULL, NULL, 'Yes', 100, 1, '2025-04-01 08:08:53', '2025-04-01 08:08:53');

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
(445, 497, 'custom-print_1_1743252411.JPG', NULL, NULL, NULL, NULL, NULL, '2025-03-29 07:16:51', '2025-03-29 07:16:51'),
(450, 506, 'magic-mug_1_1743490048.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-01 06:47:28', '2025-04-01 06:47:28'),
(451, 507, NULL, NULL, NULL, 'synthetic-frame_4_1743492768.webp', NULL, NULL, '2025-04-01 07:20:41', '2025-04-01 07:37:23'),
(452, 508, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 08:08:53', '2025-04-01 08:08:53');

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
-- Table structure for table `sample_products`
--

CREATE TABLE `sample_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sizes`)),
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`colors`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `slug_sub_category` varchar(255) NOT NULL,
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

INSERT INTO `sub_categories` (`id`, `name`, `slug_sub_category`, `image`, `status`, `showHome`, `category_id`, `created_at`, `updated_at`) VALUES
(51, 'Metal Prints', 'metal-prints', '_1743252178.JPG', 1, 'Yes', 266, '2025-03-25 04:17:20', '2025-03-29 07:12:58'),
(53, 'Canvas Print', 'canvas-print', '_1743080632.jpg', 1, 'Yes', 266, '2025-03-26 06:09:30', '2025-03-27 07:33:52'),
(54, 'Woods', 'woods', '_1743494730.jpg', 1, 'Yes', 266, '2025-03-26 09:54:38', '2025-04-01 08:05:30'),
(57, 'Customize Neon', 'customize-neon', '_1743494742.jpg', 1, 'Yes', 296, '2025-03-27 08:56:50', '2025-04-01 08:05:42'),
(61, 'Magic Mug', 'magic-mug', '_1743494552.jpg', 1, 'Yes', 297, '2025-04-01 06:43:02', '2025-04-01 08:02:32'),
(62, 'Photo Frame', 'photo-frame', '_1743492577.jpg', 1, 'No', 266, '2025-04-01 07:16:26', '2025-04-01 07:29:38'),
(63, 'Acrylic', 'acrylic', 'photo-frame_1743493700.jpg', 1, 'Yes', 266, '2025-04-01 07:48:20', '2025-04-01 07:48:43'),
(64, 'Keychain', 'keychain', 'keychain_1743494400.webp', 1, 'Yes', 297, '2025-04-01 08:00:00', '2025-04-01 08:00:00'),
(65, 'Calendar', 'calendar', 'calendar_1743494450.webp', 1, 'Yes', 297, '2025-04-01 08:00:50', '2025-04-01 08:00:50'),
(66, 'Moon Lamp', 'moon-lamp', 'moon-lamp_1743494469.jpg', 1, 'Yes', 297, '2025-04-01 08:01:09', '2025-04-01 08:01:09'),
(67, 'Mouse Pad', 'mouse-pad', 'mouse-pad_1743494494.webp', 1, 'Yes', 297, '2025-04-01 08:01:34', '2025-04-01 08:01:34'),
(68, 'T-shirt', 't-shirt', 't-shirt_1743494784.png', 1, 'Yes', 298, '2025-04-01 08:06:25', '2025-04-01 08:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_images`
--

INSERT INTO `temp_images` (`id`, `name`, `created_at`, `updated_at`) VALUES
(573, '1743058156.jpg', '2025-03-27 01:19:16', '2025-03-27 01:19:16'),
(574, '1743065181.JPG', '2025-03-27 03:16:21', '2025-03-27 03:16:21'),
(575, '1743065184.JPG', '2025-03-27 03:16:24', '2025-03-27 03:16:24'),
(576, '1743065186.JPG', '2025-03-27 03:16:26', '2025-03-27 03:16:26'),
(577, '1743082055.png', '2025-03-27 07:57:35', '2025-03-27 07:57:35'),
(578, '1743082056.png', '2025-03-27 07:57:36', '2025-03-27 07:57:36'),
(579, '1743082073.jpg', '2025-03-27 07:57:53', '2025-03-27 07:57:53'),
(580, '1743082335.png', '2025-03-27 08:02:15', '2025-03-27 08:02:15'),
(581, '1743082335.png', '2025-03-27 08:02:15', '2025-03-27 08:02:15');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `status`, `role`, `email_verified_at`, `password`, `remember_token`, `is_protected`, `created_at`, `updated_at`) VALUES
(7, 'Mukesh', 'Bhavsar', 'mukeshbhavsar210@gmail.com', NULL, 1, 2, NULL, '$2y$10$atts/65kfJw0YoA6jw3f2.U0XsNfRera0pwSXdTRmdlQHmvpAIHK2', NULL, 1, '2023-12-19 07:11:37', '2023-12-19 07:11:37'),
(30, 'Dhruv', 'Bhavsar', 'dhruvbhavsar210@gmail.com', NULL, 1, 1, NULL, '$2y$10$CINsltt2MKGU/BTfWGEQgex3wlwhdvt9.uLROJuwhZ48SezK.b1ia', NULL, 0, '2025-02-17 01:03:07', '2025-03-31 02:03:54'),
(42, 'Priyanka', 'Bhavsar', 'p.bhavsar2610@gmail.com', '9978835005', 1, 1, '2025-04-01 09:09:37', '$2y$10$i0lNwP72glwfIXF21kS1De70nud8aVkaad65jCJyn9ApB62JUlrG2', NULL, 0, '2025-04-01 09:09:11', '2025-04-01 09:09:37');

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
-- Indexes for table `frame_borders`
--
ALTER TABLE `frame_borders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_frames`
--
ALTER TABLE `frame_frames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_metals`
--
ALTER TABLE `frame_metals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_shapes`
--
ALTER TABLE `frame_shapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_sizes`
--
ALTER TABLE `frame_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_wraps`
--
ALTER TABLE `frame_wraps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_displays`
--
ALTER TABLE `hardware_displays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_finishings`
--
ALTER TABLE `hardware_finishings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_styles`
--
ALTER TABLE `hardware_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_edits`
--
ALTER TABLE `image_edits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laminations`
--
ALTER TABLE `laminations`
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
-- Indexes for table `modifications`
--
ALTER TABLE `modifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sample_products`
--
ALTER TABLE `sample_products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

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
-- AUTO_INCREMENT for table `frame_borders`
--
ALTER TABLE `frame_borders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `frame_frames`
--
ALTER TABLE `frame_frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frame_metals`
--
ALTER TABLE `frame_metals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `frame_shapes`
--
ALTER TABLE `frame_shapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frame_sizes`
--
ALTER TABLE `frame_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `frame_wraps`
--
ALTER TABLE `frame_wraps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hardware_displays`
--
ALTER TABLE `hardware_displays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hardware_finishings`
--
ALTER TABLE `hardware_finishings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hardware_styles`
--
ALTER TABLE `hardware_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image_edits`
--
ALTER TABLE `image_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laminations`
--
ALTER TABLE `laminations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `modifications`
--
ALTER TABLE `modifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;

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
-- AUTO_INCREMENT for table `sample_products`
--
ALTER TABLE `sample_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

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
