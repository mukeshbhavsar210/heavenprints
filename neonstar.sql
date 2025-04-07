-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 03:00 PM
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
(9, 30, 'Dhruv', 'Bhavsar', '09978835005', 'dhruvbhavsar210@gmail.com', 1, 'Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms, Keerthi Royal Palms,', NULL, 'Banglore', '560100', 'I want ', '2025-03-26 23:38:23', '2025-04-07 04:47:58');

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
(138, 520, 'Acrylic', 'Square', '10\" x 10\"', '1143.00', NULL, NULL, '2025-04-07 07:08:37', '2025-04-07 07:08:37'),
(139, 521, 'Canvas', 'Square', '8\" x 8\"', '1134.00', NULL, NULL, '2025-04-07 07:16:15', '2025-04-07 07:16:15');

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
(8, 'Others', 'Yes', '2025-04-01 23:27:01', '2025-04-01 23:27:01');

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
(23, 'test', 'Square', '8', '8', '8', 547863.00, '2025-03-21 05:40:27', '2025-04-01 23:04:13'),
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
(2, 'Round Canvas', 'metal', 721, 'round_canvas.png', 'canvas', NULL, NULL),
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
(1, 'Original Free', 'original_free', '0', 'sepia.jpg', 'basic', NULL, NULL),
(2, 'Sephia Free', 'sephia_free', '0', 'sepia.jpg', 'basic', NULL, NULL),
(3, 'Grey Scale', 'grey-scale', '0', 'grayscale.jpg', 'basic', NULL, NULL);

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
(1, 'Hooks for Hanging Free', 'hooks_for_hanging_free', '0', 'hooks-for-hanging.jpg', NULL, NULL),
(2, 'Ready to Hang Free', 'ready_to_hang_free', '0', 'ready-to-hang.jpg', NULL, NULL),
(3, 'No Hooks Free', 'no_hooks_free', '0', 'no-hooks.jpg', NULL, NULL),
(4, 'Sawtooth Hanger', 'sawtooth_hanger', '25.00', 'sawtooth-hanger.jpg', NULL, NULL),
(5, 'Easel Back', 'easel-back', '49.00', 'easel-back.jpg', NULL, NULL),
(6, 'Nail Free Hook', 'nail-free-hook', '49.00', 'nail-free-hook.jpg', NULL, NULL);

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
(69, '2025_03_31_064152_create_password_resets_table', 60),
(70, '2025_04_01_103631_add_otp_to_users_table', 61),
(71, '2025_04_02_042506_create_frame_materials_table', 62),
(72, '2025_04_02_052554_create_colors_table', 63),
(73, '2025_04_02_074223_create_sizes_table', 64),
(74, '2025_04_05_050623_create_custom_totals_table', 65);

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
(395, 'Customize Neon', 'customize-neon', 'Neon', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Test2</p>', 'test', 'test', '373', 600.00, NULL, 296, 57, NULL, 'No', 'woodframe_001', NULL, 'Yes', 90, 1, '2025-03-26 09:55:53', '2025-04-07 04:53:41'),
(504, 'Common', 'common', 'Default', 't_shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 700.00, NULL, 297, 60, NULL, 'No', 'metalframe_001', NULL, 'Yes', 100, 1, '2025-03-31 05:51:08', '2025-03-31 05:55:57'),
(505, 'Tshirt', 'tshirt', 'Default', 't_shirt', NULL, '\"[\\\"Small\\\",\\\"Medium\\\"]\"', NULL, '\"[\\\"Red\\\",\\\"Blue\\\"]\"', NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 800.00, NULL, 297, 60, NULL, 'No', 'metalframe_0012', NULL, 'Yes', 50, 1, '2025-03-31 05:54:23', '2025-03-31 05:54:23'),
(519, 'test', 'test', 'Default', 't_shirt', NULL, NULL, NULL, '\"[\\\"Red\\\",\\\"Blue\\\",\\\"Black\\\"]\"', NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 800.00, NULL, 297, 60, NULL, 'No', NULL, NULL, 'Yes', 99, 1, '2025-04-02 00:25:08', '2025-04-06 20:11:56'),
(520, 'Mouse Pad', 'mouse-pad', 'Customize', 'Acrylic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 700.00, NULL, 298, 61, NULL, 'No', 'metalframe_001', NULL, 'Yes', 93, 1, '2025-04-06 20:35:09', '2025-04-07 07:08:27'),
(521, 'Key Chain', 'key-chain', 'Customize', 'Canvas', NULL, '\"null\"', NULL, '\"null\"', NULL, NULL, NULL, '<p>test</p>', 'test', 'test', '', 700.00, NULL, 298, 61, NULL, 'No', 'metalframe_001', NULL, 'Yes', 96, 1, '2025-04-06 20:44:43', '2025-04-07 04:48:54');

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
(465, 521, 'key-chain_1_1743992083.jpg', NULL, NULL, NULL, NULL, NULL, '2025-04-06 20:44:44', '2025-04-06 20:44:44');

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
(51, 'Metal Prints', 'metal-prints', '_1743252178.JPG', 1, 'Yes', 298, '2025-03-25 04:17:20', '2025-04-06 21:18:30'),
(53, 'Canvas Print', 'canvas-print', '_1743080632.jpg', 1, 'Yes', 298, '2025-03-26 06:09:30', '2025-04-06 21:18:43'),
(54, 'Woods', 'woods', '_1743080624.jpg', 1, 'Yes', 298, '2025-03-26 09:54:38', '2025-04-06 21:18:53'),
(57, 'Customize Neon', 'customize-neon', 'neon_1743085610.jpg', 1, 'Yes', 296, '2025-03-27 08:56:50', '2025-03-27 09:09:30'),
(60, 'Common', 'common', 'common_1743420036.png', 1, 'Yes', 297, '2025-03-31 05:50:36', '2025-03-31 05:50:36'),
(61, 'Customize Products', 'customize-products', 'customize-products_1743990448.jpg', 1, 'Yes', 298, '2025-04-06 20:17:30', '2025-04-06 20:17:30');

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
-- Indexes for table `frame_materials`
--
ALTER TABLE `frame_materials`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

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
-- AUTO_INCREMENT for table `custom_totals`
--
ALTER TABLE `custom_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
-- AUTO_INCREMENT for table `frame_materials`
--
ALTER TABLE `frame_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `modifications`
--
ALTER TABLE `modifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
